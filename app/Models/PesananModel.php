<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id_pesanan';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_produk', 'id_user', 'nomor_telepon', 'status_pesanan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diubah';

    public function getPesananwithProduk()
    {
        return $this->select('pesanan.id_pesanan, pesanan.id_user, pesanan.nomor_telepon, pesanan.status_pesanan, pesanan.dibuat, pesanan.diubah, produk.nama_produk')
            ->join('produk', 'produk.id_produk = pesanan.id_produk')
            ->findAll();
    }

    public function getLaporanHarian()
    {
        return $this->select("DATE(dibuat) as periode, COUNT(*) as total_pesanan, SUM(produk.harga) as total_pendapatan")
            ->join('produk', 'produk.id_produk = pesanan.id_produk')
            ->where('status_pesanan', 'selesai')
            ->groupBy('DATE(dibuat)')
            ->orderBy('periode', 'DESC')
            ->findAll();
    }

    public function getLaporanMingguan()
    {
        return $this->select("YEARWEEK(dibuat) as periode, COUNT(*) as total_pesanan, SUM(produk.harga) as total_pendapatan")
            ->join('produk', 'produk.id_produk = pesanan.id_produk')
            ->where('status_pesanan', 'selesai')
            ->groupBy('YEARWEEK(dibuat)')
            ->orderBy('periode', 'DESC')
            ->findAll();
    }

    public function getLaporanBulanan()
    {
        return $this->select("DATE_FORMAT(dibuat, '%Y-%m') as periode, COUNT(*) as total_pesanan, SUM(produk.harga) as total_pendapatan")
            ->join('produk', 'produk.id_produk = pesanan.id_produk')
            ->where('status_pesanan', 'selesai')
            ->groupBy("DATE_FORMAT(dibuat, '%Y-%m')")
            ->orderBy('periode', 'DESC')
            ->findAll();
    }
}
