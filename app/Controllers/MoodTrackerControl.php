<?php

namespace App\Controllers;

use App\Models\MoodTrackerModel;
use App\Models\GrafikModel;
use CodeIgniter\Controller;

class MoodTrackerControl extends Controller
{
    public function index()
    {
        $model = new MoodTrackerModel();
        $data['moods'] = $model->getAllMoods(); 

        return view('mood_tracker', $data);
    }

    public function lihatGrafik()
{
    $model = new MoodTrackerModel();
    $grafikModel = new GrafikModel();

    $tanggal = date('Y-m-d');
    $emosi = $model->getSelectedEmotions();

    $jumlahPositif = 0;
    $jumlahNegatif = 0;

    foreach ($emosi as $jenisEmosi) {
        if ($jenisEmosi['jenis_emosi'] == 'Positif') {
            $jumlahPositif++;
        } elseif ($jenisEmosi['jenis_emosi'] == 'Negatif') {
            $jumlahNegatif++;
        }
    }

    $grafikModel->updateJumlahEmosi($tanggal, $emosi);

    // Arahkan ke halaman grafik_mood.php
    return redirect()->to('/grafik-mood')->with('tanggal', $tanggal)->with('emosi', $emosi);
}

}
