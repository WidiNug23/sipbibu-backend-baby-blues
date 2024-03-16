<?php

namespace App\Controllers;

use App\Models\DataIbuModel;

class DataIbuControl extends BaseController
{
    public function signup()
    {
        // Validasi data yang dikirimkan dari form
        $rules = [
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'usia' => 'required|numeric',
            'email' => 'required|valid_email|is_unique[data_ibu.email]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $no_telp = $this->request->getPost('no_telp');
        $alamat = $this->request->getPost('alamat');
        $usia = $this->request->getPost('usia');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Simpan data ke database
        $model = new DataIbuModel();
        $model->save([
            'nama' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'usia' => $usia,
            'email' => $email,
            'password' => $password
        ]);

        // Redirect ke halaman login setelah signup berhasil
        return redirect()->to('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function login()
    {
        // Validasi data yang dikirimkan dari form
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan alamat email
        $model = new DataIbuModel();
        $user = $model->where('email', $email)->first();

        // Periksa apakah pengguna ada dan passwordnya benar
        if ($user && password_verify($password, $user['password'])) {
            // Simpan data pengguna ke sesi
            session()->set('user', $user);

            // Redirect ke halaman dashboard setelah login berhasil
            return redirect()->to('/dashboard');
        } else {
            // Tampilkan pesan kesalahan jika login gagal
            return redirect()->back()->withInput()->with('error', 'Email atau password salah.');
        }
    }

    public function dashboard()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        return view('dashboard_ibu');
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->to('/login');
    }

    public function edit()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $user = session()->get('user');

        return view('edit_data_ibu', ['user' => $user]);
    }

    public function update()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $no_telp = $this->request->getPost('no_telp');
        $alamat = $this->request->getPost('alamat');
        $usia = $this->request->getPost('usia');

        // Lakukan validasi data
        $rules = [
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'usia' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil ID pengguna dari sesi
        $userId = session()->get('user')['id_ibu'];

        // Simpan perubahan data ke database
        $model = new DataIbuModel();
        $data = [
            'nama' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'usia' => $usia
        ];

        $model->update($userId, $data);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->to('/dashboard')->with('success', 'Data berhasil diperbarui.');
    }
}
