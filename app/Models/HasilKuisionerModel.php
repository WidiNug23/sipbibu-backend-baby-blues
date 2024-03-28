<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilKuisionerModel extends Model
{
    protected $table = 'hasil_kuis'; // Ubah sesuai dengan nama tabel yang digunakan
    protected $allowedFields = ['total_skor', 'hasil_kesimpulan'];
}
