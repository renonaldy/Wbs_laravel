<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        WBS | PTPN VI
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

@include('layout.navbar')

<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                            style="background-image: url('../assets/img/illustrations/wbs_reg.png'); background-size: cover;">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="font-weight-bolder">Login</h4>
                                <p class="mb-0">Silakan LOGIN untuk submit laporan. Jika anda belum memiliki akun/baru
                                    pertama kali melakukan pengaduan silahkan <a href="register"
                                        class="text-primary text-gradient font-weight-bold">Register</a> terlebih dahulu
                                </p>
                            </div>

                            <div class="card-body">
                                <form role="form" id="formVerifikasi">
                                    <div class="input-group input-group-outline mb-4">

                                        <select class="form-control" id="exampleFormControlSelect2" name="media">
                                            <option value="">- Pilih Media Pengiriman Kode Verifikasi (OTP) -
                                            </option>
                                            <option value="email">Email</option>
                                            <option value="wa">Nomor HP/WhatsApp</option>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" class="form-control" maxlength="30"
                                            placeholder="Masukkan Email/Nomor WhatsApp" name="identitas">
                                    </div>

                                    <div class="text-center">
                                        <button type="button" id="btnKirimKodeOTP"
                                            class="btn btn-lg bg-gradient-primary  btn-lg w-100 mt-4 mb-0">Kirim Kode
                                            Verifikasi (OTP)
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    Belum punya akun?
                                    <a href="register" class="text-primary text-gradient font-weight-bold">Register</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="row">

    <!-- Modal -->
    <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalSignTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-center">
                            <h5 class="">Masukkan kode verifikasi (OTP)</h5>
                            <p class="mb-0">Kode verifikasi (OTP) telah dikirim melalui WhatsApp ke Nomor : 0812 XXXX
                                XXX</p>
                        </div>
                        <div class="card-body pb-3">

                            <form class="masuk">
                                <div class="row" id="otp">
                                    <div class="col-sm-2">
                                        <div class="input-group input-group-lg input-group-outline my-3">
                                            <input type="text" maxlength="1"
                                                class="form-control text-center font-weight-bold form-control-lg otpinput"
                                                id="otp1" name="otp1" data-next="otp2">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group input-group-lg input-group-outline my-3">
                                            <input type="text" maxlength="1"
                                                class="form-control text-center font-weight-bold form-control-lg otpinput"
                                                id="otp2" name="otp2" data-next="otp3" data-previous="otp1">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group input-group-lg input-group-outline my-3">
                                            <input type="text" maxlength="1"
                                                class="form-control text-center font-weight-bold form-control-lg otpinput"
                                                id="otp3" name="otp3" data-next="otp4" data-previous="otp2">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group input-group-lg input-group-outline my-3">
                                            <input type="text" maxlength="1"
                                                class="form-control text-center font-weight-bold form-control-lg otpinput"
                                                id="otp4" name="otp4" data-next="otp5" data-previous="otp3">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group input-group-lg input-group-outline my-3">
                                            <input type="text" maxlength="1"
                                                class="form-control text-center font-weight-bold form-control-lg otpinput"
                                                id="otp5" name="otp5" data-next="otp6" data-previous="otp4">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group input-group-lg input-group-outline my-3">
                                            <input type="text" maxlength="1"
                                                class="form-control text-center font-weight-bold form-control-lg otpinput"
                                                id="otp6" name="otp6" data-previous="otp5">
                                        </div>
                                    </div>
                                </div>

                                <p id="wait" class="mt-4 text-sm text-center"> Mohon tunggu <strong><span
                                            id="countdowntimer"></span></strong> detik untuk mengirim ulang.</p>
                                <p id="kode" class="mt-4 text-sm text-center" style="display: none">Tidak
                                    menerima kode verifikasi (OTP)?
                                    <a href="../pages/send-otp.html"
                                        class="text-primary text-gradient font-weight-bold">Kirim ulang </a>(1/3)
                                </p>

                                <div class="text-center">
                                    <button type="button"
                                        class="btn bg-gradient-primary sh btn-lg btn-rounded w-100 mt-4 mb-0"
                                        id="lgn">Login</button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Form untuk login setelah registrasi --}}
{{-- Setelah verifikasi token berhasil --}}
<form action="{{ route('verifikasi_success') }}" id="formVerifikasiSuccess" method="POST">
    {{-- Lakukan login --}}
    @csrf
    {{-- Dengan media verifikasi berdasarkan input nilai media --}}
    <input type="hidden" name="media_verifikasi" id="media_verifikasi">
    {{-- Dengan media verifikasi berdasarkan input nilal identitas --}}
    <input type="hidden" name="identitas_verifikasi" id="identitas_verifikasi">
    {{-- Dengan media verifikasi berdasarkan input nilal token --}}
    <input type="hidden" name="token_verifikasi" id="token_verifikasi">
    {{-- pengisian data dilakukan secara promgramatically di ajax.done bawah kemudian di submit  --}}
    {{-- Mengarahkan ke route verifikasi sukses dengan controller authcontroller verifikasi_sukses --}}
</form>


<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    var timeleft = 60;
    var downloadTimer = setInterval(function() {
        timeleft--;
        document.getElementById("countdowntimer").textContent = timeleft;
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
            document.getElementById('wait').style.display = 'none';
            document.getElementById('kode').style.display = 'block';
        } else {
            document.getElementById('wait').style.display = 'block';
            document.getElementById('kode').style.display = 'none';
        }
    }, 1000);
    // console.log('tes')
    // $(document).ready(function() {
    //     console.log('berhasil')
    // })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#formVerifikasi').submit(function(e){
            e.preventDefault()
        })

        $('#flexCheckDefault').change(function() {
            if (this.checked) {
                $('#btnKirimKodeOTP').prop('disabled', false);
            } else {
                $('#btnKirimKodeOTP').prop('disabled', true);
            }
        })
        $('#btnKirimKodeOTP').click(function() {
                $.ajax({
                    url: "{{ route('otp_login') }}",
                    method: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        media: $('select[name="media"] option').filter(':selected').val(),
                        identitas: $('input[name="identitas"]').val(),
                    }
                }).done(function() {
                    $('#exampleModalSignUp').modal('show')
                }).fail(function(error) {
                    // alert('Jangan kosongkan data')
                    console.log(error)
                    alert(error.responseJSON.message)
                })
        })

        $('#exampleFormControlSelect2').change(function() {
            let value = $(this).val()
            console.log(value);
            if (value == 'email') {
                $('#identitas').prop("type", "email")
            } else if (value == 'wa') {
                $('#identitas').prop("type", "number")
            }
        })

        $('.masuk').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parents('form'));
                // console.log(e.keycode)

                if (e.keyCode == 8 || e.keyCode == 37) {

                    var prev = parent.find('input#' +
                        $(this).data('previous'));
                    // console.log('jalan', prev);

                    if (prev.length) {
                        $(prev).select();
                    }
                } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e
                        .keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));

                    if (next.length) {
                        $(next).select();
                    } else {
                        if (parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });

        $('#lgn').click(function() {
            let otp1 = $('#otp1').val()
            let otp2 = $('#otp2').val()
            let otp3 = $('#otp3').val()
            let otp4 = $('#otp4').val()
            let otp5 = $('#otp5').val()
            let otp6 = $('#otp6').val()
            let kode_otp = otp1 + otp2 + otp3 + otp4 + otp5 + otp6
            // console.log(kode_otp);
            let media = $('select[name="media"] option').filter(':selected').val()
            let identitas = $('input[name="identitas"]').val()

            $.ajax({
                url: '{{ route('verifikasi_otp_login') }}',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    otp: kode_otp,
                    // user: $('#identitas').val(),
                    media: media,
                    identitas: identitas,
                },

            }).done(function(response) {
                {{-- isi value form verifikasi success diatas --}}
                $('#media_verifikasi').val(media)
                $('#identitas_verifikasi').val(identitas)
                $('#token_verifikasi').val(kode_otp)
                $('#formVerifikasiSuccess').submit()
            }).fail(function(Error) {
                console.log(Error)
            })

        })

    })
</script>




</body>

</html>
