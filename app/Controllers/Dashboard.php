<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') != 'admin') {
            return redirect()->to('/login');
        }

        // Initialize data dengan default values
        $data = [
            'title' => 'Dashboard Analitik - Creative Cell',
            'totalUsers' => 0,
            'totalTransactions' => 0,
            'totalRevenue' => 0,
            'bestSellingProduct' => 'Data tidak tersedia',
            'recentTransactions' => [],
            'lowStockProducts' => [],
            'outOfStockProducts' => [],
            'dbError' => false
        ];

        try {
            // Test koneksi database
            $db = \Config\Database::connect();
            
            if (!$db->connect()) {
                throw new \Exception('Koneksi database gagal');
            }

            // Load model
            $produkModel = new ProdukModel();
            
            // Total Users - menggunakan tb_user
            $data['totalUsers'] = $db->table('tb_user')->countAll();
            
            // Total Transactions
            $data['totalTransactions'] = $db->table('pesanan')->countAll();
            
            // Total Revenue
            $revenueResult = $db->table('pesanan')
                ->select('SUM(produk.harga_produk) as total')
                ->join('produk', 'produk.id_produk = pesanan.id_produk')
                ->where('status_pesanan', 'selesai')
                ->get()
                ->getRow();
            $data['totalRevenue'] = $revenueResult->total ?? 0;
            
            // Best Selling Product
            $bestProduct = $db->table('pesanan')
                ->select('produk.nama_produk, COUNT(pesanan.id_produk) as total_terjual')
                ->join('produk', 'produk.id_produk = pesanan.id_produk')
                ->where('status_pesanan', 'selesai')
                ->groupBy('pesanan.id_produk')
                ->orderBy('total_terjual', 'DESC')
                ->limit(1)
                ->get()
                ->getRow();
            
            if ($bestProduct) {
                $data['bestSellingProduct'] = $bestProduct->nama_produk . ' (' . $bestProduct->total_terjual . ' terjual)';
            }
            
            // Recent Transactions
            $data['recentTransactions'] = $db->table('pesanan')
                ->select('pesanan.*, produk.nama_produk, tb_user.nama_lengkap')
                ->join('produk', 'produk.id_produk = pesanan.id_produk')
                ->join('tb_user', 'tb_user.id_user = pesanan.id_user', 'left')
                ->orderBy('pesanan.dibuat', 'DESC')
                ->limit(5)
                ->get()
                ->getResult();

            // Stock notifications
            $data['lowStockProducts'] = $produkModel->getLowStockProducts();
            $data['outOfStockProducts'] = $produkModel->getOutOfStockProducts();

        } catch (\Exception $e) {
            // Set flag error
            $data['dbError'] = true;
            $data['errorMessage'] = $e->getMessage();
        }

        return view('dashboard', $data);
    }
}