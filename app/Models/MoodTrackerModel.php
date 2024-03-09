<?php

namespace App\Models;

use CodeIgniter\Model;

class MoodTrackerModel extends Model
{
    protected $table = 'mood_tracker';

    public function getAllMoods()
    {
        return $this->findAll();
    }

    public function getSelectedEmotions()
    {
        // Implementasikan logika untuk mendapatkan emosi yang dipilih
        // Sesuaikan dengan struktur database dan kebutuhan aplikasi Anda
        $selectedEmotions = [];

        // Misalnya, kita mengasumsikan ada input POST dengan nama 'selected_emotions'
        // dan nilai berisi array id_emosi yang dipilih
        $selectedEmotionIds = $this->request->getPost('selected_emotions');

        if (!empty($selectedEmotionIds)) {
            // Ambil data nama emosi berdasarkan id_emosi yang dipilih
            $selectedEmotions = $this->whereIn('id_emosi', $selectedEmotionIds)->findAll();
        }

        return $selectedEmotions;
    }
}
