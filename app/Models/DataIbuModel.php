<?php

namespace App\Models;

use CodeIgniter\Model;

class DataIbuModel extends Model
{
    protected $table = 'data_ibu';
    protected $primaryKey = 'id_ibu';
    protected $allowedFields = ['nama', 'no_telp', 'alamat', 'usia', 'email', 'password'];

    public function updateData($id_ibu, $data)
    {
        return $this->where('id_ibu', $id_ibu)->set($data)->update();
    }
}
