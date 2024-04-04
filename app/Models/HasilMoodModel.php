<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilMoodModel extends Model
{
    protected $table = 'hasil_mood';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_mood_tracker', 'hasil'];
}
