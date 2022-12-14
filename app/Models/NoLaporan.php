<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoLaporan extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function format_laporan()
    {
        return [
            'laporan' => [
                'format' => function (){
                    return 'WBS/' .date('Y.m.d'). '/' .$this->branch. '?';
                },
                'length' => 4
                ]
            ];
    }
}
