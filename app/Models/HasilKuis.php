<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilKuis extends Model
{
    protected $table            = 'hasilkuis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['total_skor', 'hasil_kesimpulan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
