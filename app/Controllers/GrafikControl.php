<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class GrafikControl extends Controller
{
    public function index()
    {
        return view('grafik_mood');
    }
}
