<?php

namespace App\Controllers;

use App\Models\HasilMoodModel;

class GrafikControl extends BaseController
{
    public function index()
{
    $hasilMoodModel = new HasilMoodModel();
    $data['hasilMood'] = $hasilMoodModel->findAll();

    // Ambil data emosi yang dipilih dari sesi
    $session = session();
    $data['emosiDipilih'] = $session->get('emosi_dipilih');

    return view('grafik_mood', $data);
}

}
