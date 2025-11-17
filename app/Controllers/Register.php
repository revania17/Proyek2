<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('register'); // View register kamu
    }

    public function save()
    {
        $userModel = new UserModel();
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        // Cek konfirmasi password
        if ($password != $confirm_password) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sama.');
        }

        // Simpan user baru
        $userModel->save([
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}