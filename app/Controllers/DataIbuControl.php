<?php

namespace App\Controllers;

use App\Models\DataIbuModel;

class DataIbuControl extends BaseController
{
    public function signup()
    {
        $data = [];

        if ($this->request->getMethod() === 'post') {
            // Validasi data yang dimasukkan oleh pengguna
            $rules = [
                'nama' => 'required',
                'no_telp' => 'required',
                'alamat' => 'required',
                'usia' => 'required|numeric',
                'email' => 'required|valid_email|is_unique[data_ibu.email]',
                'password' => 'required'
            ];

            if (!$this->validate($rules)) {
                // Jika validasi gagal, kembalikan dengan pesan error
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            try {
                // Proses pendaftaran
                $model = new DataIbuModel();
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'no_telp' => $this->request->getPost('no_telp'),
                    'alamat' => $this->request->getPost('alamat'),
                    'usia' => $this->request->getPost('usia'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
                ];

                $model->insert($data);

                // Redirect ke halaman login setelah signup
                return redirect()->to('/login');
            } catch (\Exception $e) {
                // Tangani kesalahan dan tampilkan pesan error
                return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            }
        }

        return view('signup_ibu', $data);
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            // Proses login
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new DataIbuModel();
            $user = $model->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil, simpan data user di session
                session()->set('user', $user);
                // Redirect ke halaman dashboard
                return redirect()->to('/dashboard');
            } else {
                // Login gagal, kembali ke halaman login dengan pesan error
                return redirect()->to('/login')->with('error', 'Email atau password salah');
            }
        }

        return view('login_ibu');
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
    
        $user = session()->get('user');
    
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $noTelp = $this->request->getPost('no_telp');
        $alamat = $this->request->getPost('alamat');
        $usia = $this->request->getPost('usia');
    
        // Validasi data
        $rules = [
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'usia' => 'required|numeric'
        ];
    
        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembalikan dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        try {
            // Update data di database
            $model = new DataIbuModel();
            $model->update($user['id_ibu'], [
                'nama' => $nama,
                'no_telp' => $noTelp,
                'alamat' => $alamat,
                'usia' => $usia
            ]);
    
            // Update data di session
            $user['nama'] = $nama;
            $user['no_telp'] = $noTelp;
            $user['alamat'] = $alamat;
            $user['usia'] = $usia;
            session()->set('user', $user);
    
            // Redirect ke halaman dashboard dengan pesan sukses
            return redirect()->to('/dashboard')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            // Tangani kesalahan dan tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.');
        }
    }
    
    
}
