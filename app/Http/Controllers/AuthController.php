<?php

namespace App\Http\Controllers;

use App\Mail\SendOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
Use App\Models\Register;
use App\Models\Seting;
use App\Models\Status;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index() {
        $register = Register::all();
        $status = Status::all();
        // dd($status);
        return view('home.register', compact('register', 'status'));
    }


    public function register(Request $request){
        // dd($request->all(''));
        $register = Register::all();
        // $status = Status::all();

        $request->validate([
            'nama' => 'required|min:3|max:25',
            'alamat' => 'required',
            'media' => 'required|in:email,wa',
            'identitas' => 'required',
            'status' => 'required|in:kar,eks',
        ]);

        $email = $request->media == 'email' ? $request->identitas : null;
        $wa = $request->media == 'wa' ? $request->identitas : null;
        // dd($email, $wa, $request->media, $request->identitas );

        if($email != null){
            $check_user = User::where('email', $email)->first();
            if($check_user != null && $check_user->email == 1){
                return response()->json([
                    'success' => false,
                    'message' => 'Email Sudah Terdaftar'
                ], 400);
            }
            $user = User::firstOrCreate([
                'email' => $email,
            ], [
                'name' => $request->nama,
                'alamat' => $request->alamat,
                'metode' => $request->metode,
                'wa' => $wa,
                'is_activated' => 0,
                'status' => $request->status,
            ]);
        }
        if($wa != null){
            $check_user = User::where('wa', $wa)->first();
            if($check_user != null && $check_user->wa == 1){
                return response()->json([
                    'success' => false,
                    'message' => 'WA Sudah Terdaftar'
                ], 400);
            }
            $user = User::firstOrCreate([
                'wa' => $wa,
            ], [
                'name' => $request->nama,
                'alamat' => $request->alamat,
                'metode' => $request->metode,
                'email' => $email,
                'is_activated' => 0,
                'status' => $request->status,
            ]);
        }


        $interval = Seting::where('kode', 'exp')->first();

        $start = CarbonImmutable::now();
        $end = $start->addSeconds((int)$interval->value);
        $token = random_int(100000, 999999);
        // dd($interval, $start, $end, $token);

        Token::create([
            'user_id' => $user->id,
            'metode' => $request->media,
            'start' => $start,
            'end' => $end,
            'token' => $token,
            'status' => 'register'
        ]);

        if (! empty($email) ){
            Mail::to($request->email)->send(new SendOtp($token));
        }
        if (! empty($wa) ){
            $this->SendTokenWa($token, $wa);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Daftar Ke Dalam Sistem'
        ]);
    }

    public function masuk(){

        return redirect('home.login');
    }

    public function verifikasi_register(Request $request){

        $kode_otp = $request->otp;
        if ($request->media == 'wa'){
            $user = User::where('wa', $request->identitas)->first();
            $user_token = Token::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
            if ($kode_otp == $user_token->token){
                $user->update([
                    'is_activated' => 1
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil Daftar Ke Dalam Sistem'
                ]);
            }
        } elseif($request->media == 'email'){
            $user = User::where('email', $request->identitas)->first();
            $user_token = Token::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
            if($kode_otp == $user_token->token){
                $user->update([
                    'is_activated' => 1
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil Daftar Ke Dalam Sistem'
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => 'Kode OTP Salah'
        ],406);
    }

    public function verifikasi_success(Request $request){
        $kode_otp = $request->token_verifikasi;
        if ($request->media_verifikasi == 'wa'){
            $user = User::where('wa', $request->identitas_verifikasi)->first();
            $user_token = Token::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
            // dd('wa',$request->all());
            if(Carbon::now() >= Carbon::parse($user_token->start) && Carbon::now() <= Carbon::parse($user_token->end)){
                if($kode_otp == $user_token->token){
                    Auth::login($user);
                    return redirect('/dashboard');
                }
                return response()->json([
                    'success' => false,
                    'message' => 'Token Salah Silakan Masukan Ulang Token'
                ], 406);
            }
            return response()->json([
                'success' => false,
                'message' => 'Waktu Token Sudah Habis, Silakan Refresh Token'
            ], 406);
        } elseif($request->media_verifikasi == 'email'){
            $user = User::where('email', $request->identitas_verifikasi)->first();
            $user_token = Token::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
            // dd('email',$request->all(), $user, $user_token, $user_token->start);
            if(Carbon::now() >= Carbon::parse($user_token->start) && Carbon::now() <= Carbon::parse($user_token->end)){
                if($kode_otp == $user_token->token){
                    Auth::login($user);
                    return redirect('/dashboard');
                }
                return response()->json([
                    'success' => false,
                    'message' => 'Token Salah Silakan Masukan Ulang Token'
                ], 406);
            }
            return response()->json([
                'success' => false,
                'message' => 'Waktu Token Sudah Habis, Silakan Refresh Token'
            ], 406);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something wrong!, Just Ask Yourself'
        ], 400);
    }

    public function otp_login(Request $request){
        $request->validate([
            'media' => 'required|in:email,wa',
            'identitas' => 'required'
        ]);

        $user = User::where($request->media, $request->identitas)->first();
        if($user == null){
            return response()->json([
                'success' => false,
                'message' => 'User Belum Terdaftar Ke Dalam Sistem, Silakan Daftar Terlebih Dahulu'
            ],401);
        }
        if(!empty($user) && $user->is_activated == 0){
            return response()->json([
                'success' => false,
                'message' => 'User Belum Terverifikasi, Silakan Daftar Ulang Untuk Mendapatkan Kode Verifikasi'
            ], 401);
        }
        if(!empty($user) && $user->is_activated == 1){
            $interval = Seting::where('kode', 'exp')->first();

            $start = CarbonImmutable::now();
            $end = $start->addSeconds((int)$interval->value);
            $token = random_int(100000, 999999);
            // dd($interval, $start, $end, $token);

            Token::create([
                'user_id' => $user->id,
                'metode' => $request->media,
                'start' => $start,
                'end' => $end,
                'token' => $token,
                'status' => 'login'
            ]);

            if ($request->media == 'email' ){
                Mail::to($request->identitas)->send(new SendOtp($token));
            }
            if ($request->media == 'wa'){
                $this->SendTokenWa($token, $request->identitas);
            }
            return response()->json([
                'success' => true,
                'message' => 'Kode Verifikasi Berhasil Dikirim, Silakan Check Media Verifikasi'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Something Wrong!'
        ], 406);
    }

    public function verifikasi_otp_login(Request $request){
        $request->validate([
            'otp' => 'required',
            'media' => 'required|in:wa,email',
            'identitas' => 'required',
        ]);

        $user = User::where($request->media, $request->identitas)->first();
        if($user == null){
            return response()->json([
                'success' => false,
                'message' => 'User Belum Terdaftar Ke Dalam Sistem, Silakan Daftar Terlebih Dahulu'
            ],401);
        }
        if(!empty($user) && $user->is_activated == 0){
            return response()->json([
                'success' => false,
                'message' => 'User Belum Terverifikasi, Silakan Daftar Ulang Untuk Mendapatkan Kode Verifikasi'
            ], 401);
        }
        if(!empty($user) && $user->is_activated == 1){
            $user_token = Token::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
            if(Carbon::now() >= Carbon::parse($user_token->start) && Carbon::now() <= Carbon::parse($user_token->end)){
                if($request->otp == $user_token->token){
                    // Auth::login($user);
                    return response()->json([
                        'success' => true,
                         'message' => 'Berhasil Verifikasi OTP'
                    ]);
                }
                return response()->json([
                    'success' => false,
                    'message' => 'Token Salah Silakan Masukan Ulang Token'
                ], 406);
            }
            return response()->json([
                'success' => false,
                'message' => 'Waktu Token Sudah Habis, Silakan Refresh Token'
            ], 406);
            // return response()
        }
    }

    public function SendTokenWa($kode_otp, $no_wa)
    {
        $curl = curl_init();
        $token = "KXCwBNP19Q3L5O7AlNR3IXGMlZnYjUyCZRkg1uH916uRpIwKaXlNCXc2QvoeeuzH";
        $code_otp = $kode_otp;
        $payload = [
            "data" => [
                [
                    'phone' => $no_wa,
                    'message'=> [
                        'title' => [
                            'type' => 'text',
                            'content' => 'Verification Code',
                        ],
                        'buttons' => [
                            'url' => [
                                'display' => 'Copy',
                                'link' => "https://www.whatsapp.com/otp/copy/".$code_otp,
                            ],
                        ],
                        'content' => "Berikut Kode OTP Anda : $code_otp",
                        'footer' => 'Supported by Whistle Blowing System | PTPN VI',
                    ],
                ]
            ]
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "Content-Type: application/json"
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload) );
        curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/v2/send-template");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        print_r($result);
    }

}
