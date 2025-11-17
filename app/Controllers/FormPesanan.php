<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesananModel;
use App\Models\ProdukModel;

class FormPesanan extends BaseController
{
    public function form()
    {
        // cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu sebelum membeli.');
        }
        $produk = $this->request->getGet('id_voucher');
        return view('form_pesanan', ['id_voucher' => $produk]);
    }

    public function datapesanan()
    {
        $session = session();

        // cek login
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu sebelum melakukan pembelian.');
        }

        $PesananModel = new PesananModel();
        $ProdukModel = new ProdukModel();

        $id_user = $session->get('id_user'); // ✅ ambil dari session
        $id_produk = $this->request->getPost('id_produk');
        $produk = $ProdukModel->find($id_produk);

        if ($produk) {
            $data = [
                'id_produk'      => $id_produk,
                'id_user'        => $id_user,
                'nomor_telepon'  => $this->request->getPost('nomor_telepon'),
                'status_pesanan' => 'pending',
            ];

            $PesananModel->insert($data);

            return redirect()->to('/')->with('success', 'Pesanan berhasil!');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }
    }



    public function tampilantabel()
    {
        $pesananModel = new PesananModel();
        $produk = $pesananModel->getPesananWithProduk();
        return view('data_pesanan', ['produk' => $produk]);
    }

    public function delete($id)
    {
        $Model = new PesananModel();
        $Model->delete($id);

        return redirect()->to('/pesanan'); // balik ke halaman pesanan
    }

    public function update($id)
    {

        $Model = new PesananModel();
        $ProdukModel = new ProdukModel();

        $pesanan = $Model->find($id);
        $produk = $ProdukModel->find($pesanan['id_produk']);

        $Model->update($id, [
            'status_pesanan' => 'selesai'
        ]);

        $ProdukModel->update(
            $produk['id_produk'],
            [
                'stok_produk' => $produk['stok_produk'] - 1
            ]
        );
        return redirect()->to('/pesanan'); // balik ke halaman pesanan
    }
}
