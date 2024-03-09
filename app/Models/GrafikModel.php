<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikModel extends Model
{
    protected $table = 'grafik_mood';
    protected $primaryKey = 'id_grafik';
    protected $allowedFields = ['id_ibu', 'id_emosi', 'tgl_grafik', 'jumlah_positif', 'jumlah_negatif', 'jumlah_netral'];

    public function updateJumlahEmosi($tanggal, $emosi)
    {
        foreach ($emosi as $jenisEmosi) {
            $this->where(['tgl_grafik' => $tanggal, 'id_emosi' => $jenisEmosi])->increment('jumlah_' . strtolower($jenisEmosi));
        }
    }
}
