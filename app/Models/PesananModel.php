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

    public function getLaporan($tanggalMulai = null, $tanggalAkhir = null)
    {
        $builder = $this->select('pesanan.*, produk.nama_produk, produk.harga_produk, produk.provider, produk.deskripsi, tb_user.nama_lengkap')
            ->join('produk', 'produk.id_produk = pesanan.id_produk')
            ->join('tb_user', 'tb_user.id_user = pesanan.id_user') // 🔥 join ke tabel user
            ->where('pesanan.status_pesanan', 'selesai');

        if ($tanggalMulai && $tanggalAkhir) {
            $builder->where('pesanan.dibuat >=', $tanggalMulai . ' 00:00:00')
                ->where('pesanan.dibuat <=', $tanggalAkhir . ' 23:59:59');
        }

        return $builder->findAll();
    }

    public function getMonthlySales()
    {
        return $this->select("DATE_FORMAT(dibuat, '%Y-%m') AS bulan, COUNT(*) AS total")
            ->where('status_pesanan', 'selesai')
            ->groupBy('bulan')
            ->orderBy('bulan', 'ASC')
            ->findAll();
    }
}
