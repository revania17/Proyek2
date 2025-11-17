<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel; 

class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') != 'admin') {
            return redirect()->to('/login');
        }

        // ambil data dari tabel produk
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();

        // kirim ke view 'Admin'
        return view('admin', $data);
    }
}