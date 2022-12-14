<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $guarded = [];
    // protected $fillable = [
    //     'jenis_pelanggaran_id',
    //     'kejadian_pertama',
    //     'lokasi',
    //     'tanggal',
    //     'nama_pelapor',
    //     'jabatan1',
    //     'terlibat',
    //     'jabatan2',
    //     'saksi',
    //     'jabatan3',
    //     'kejadian',
    //     'kerugian',
    //     'jumlah_kerugian',
    //     'pernah',
    //     'bukti',
    //     'jabatan_terlapor',
    //     'berbicara',
    //     'jabatan4',
    //     'posisi',
    // ];

    public function terlibat()
    {
        return $this->hasMany(LaporanTerlibat::class);
    }

    public function saksi()
    {
        return $this->hasMany(LaporanSaksi::class);
    }

    public function bukti()
    {
        return $this->hasMany(Bukti::class);
    }
}
