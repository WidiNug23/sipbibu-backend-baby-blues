<?php

namespace App\Models;

use CodeIgniter\Model;

class MoodTrackerModel extends Model
{
    protected $table = 'mood_tracker';
    protected $primaryKey = 'id_emosi';
    protected $allowedFields = ['id_emosi', 'nama_emosi', 'jenis_emosi'];
}
