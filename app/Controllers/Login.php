<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    // Tampilkan halaman login
    public function index()
    {
        $session = session();

        // Cek apakah user sudah login
        if ($session->get('logged_in')) {
            // Kalau sudah login, tampilkan view khusus
            $data = [
                'nama_lengkap' => $session->get('nama_lengkap'),
                'username' => $session->get('username'),
            ];
            return view('sudah_login', $data);
        }

        // Kalau belum login, tampilkan form login
        return view('login');
    }

    // Proses login (auth)
    public function auth()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            // Jika username tidak ditemukan
            return redirect()->back()->with('error', 'Akun belum terdaftar! Silahkan daftar dulu');
        }



        if (!password_verify($password, $user['password'])) {
            // Jika password salah
            return redirect()->back()->with('error', 'Password salah.');
        }

        // Jika username & password benar
        $sessionData = [
            'id_user'      => $user['id_user'],
            'nama_lengkap' => $user['nama_lengkap'],
            'username'     => $user['username'],
            'role'         => $user['role'], 
            'logged_in'    => TRUE
        ];
        $session->set($sessionData);

        // arahkan sesuai role
        if ($user['role'] == 'admin') {
            return redirect()->to('/admin');
        } else {
            return redirect()->to('/home');
        }
    }

    // Logout: hapus session
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}