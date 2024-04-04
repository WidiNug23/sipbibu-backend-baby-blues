<?php

namespace App\Controllers;

use App\Models\MoodTrackerModel;
use App\Models\HasilMoodModel;

class MoodTrackerControl extends BaseController
{
    public function index()
    {
        $moodTrackerModel = new MoodTrackerModel();
        $data['moods'] = $moodTrackerModel->findAll();

        return view('mood_tracker', $data);
    }

    public function simpanHasilMood()
    {
        try {
            $moodIds = $this->request->getPost('id_emosi');
    
            // Hapus opsi 'alasan' dari array jika ada
            $moodIds = array_filter($moodIds, function ($moodId) {
                return $moodId !== 'A001'; // Ganti 'A001' dengan nilai id_emosi untuk 'alasan'
            });
    
            if (empty($moodIds)) {
                // Tampilkan alert jika tidak ada emosi yang dipilih
                echo '<script>alert("Pilih setidaknya satu emosi terlebih dahulu.");</script>';
                return redirect()->to('/mood-tracker'); // Atur ulang ke halaman mood tracker
            }
    
            $positifCount = 0;
            $negatifCount = 0;
    
            // Lakukan logika penghitungan hasil mood untuk setiap id emosi yang dipilih
            foreach ($moodIds as $moodId) {
                $jenisEmosi = $this->getJenisEmosiById($moodId);
    
                if ($jenisEmosi == 'positif') {
                    $positifCount++;
                } elseif ($jenisEmosi == 'negatif') {
                    $negatifCount++;
                }
            }
    
            $hasil = $this->hitungHasilMood($positifCount, $negatifCount);
    
            // Simpan hasil mood dan emosi yang dipilih ke dalam database
            $hasilMoodModel = new HasilMoodModel();
            
            // Konversi array $moodIds menjadi string dengan koma sebagai pemisah
            $idMoodTracker = implode(',', $moodIds);
    
            $hasilMoodModel->insert([
                'id_mood_tracker' => $idMoodTracker,
                'hasil' => $hasil,
            ]);
    
            return redirect()->to('/grafik-mood');
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan yang lebih ramah pengguna
            echo '<script>alert("Terjadi kesalahan saat menyimpan hasil mood. Silakan coba lagi.");</script>';
            // Tampilkan pesan kesalahan pada console (untuk debugging)
            dd($e->getMessage());
            return redirect()->to('/mood-tracker');
        }
    }
    


    

    private function getJenisEmosiById($moodId)
    {
        // Mengambil jenis emosi dari database berdasarkan id_emosi
        $moodTrackerModel = new MoodTrackerModel();
        $mood = $moodTrackerModel->find($moodId);

        return ($mood && isset($mood['jenis_emosi'])) ? $mood['jenis_emosi'] : '';
    }

    private function hitungHasilMood($positifCount, $negatifCount)
{
    $selisih = abs($positifCount - $negatifCount);

    if ($positifCount == 1 || $positifCount == 2) {
        return 'Netral';
    } elseif ($positifCount >= 3) {
        return 'Sangat Baik';
    } elseif ($negatifCount == 1 || $negatifCount == 2) {
        return 'Buruk';
    } elseif ($negatifCount >= 3) {
        return 'Sangat Buruk';
    } elseif ($selisih >= 3 && $positifCount > $negatifCount) {
        return 'Baik';
    } elseif ($selisih >= 3 && $negatifCount > $positifCount) {
        return 'Buruk';
    } elseif ($selisih <= 1) {
        return 'Netral';
    } else {
        return 'Netral';
    }
}



    
}
