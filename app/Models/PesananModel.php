<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id_pesanan';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_produk','id_user','nomor_telepon', 'status_pesanan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat'; 
    protected $updatedField  = 'diubah';

    public function getPesananwithProduk()
    {
        return $this->select('pesanan.*, produk.nama_produk')
        ->join('produk', 'produk.id_produk = pesanan.id_produk')
        ->findAll(); 
    }

}