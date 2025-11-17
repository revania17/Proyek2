<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_produk', 'harga_produk', 'stok_produk', 'provider', 'deskripsi'];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diubah';

    public function cariProduk($keyword)
    {
    return $this->like ('nama_produk', $keyword)
        ->orLike('deskripsi', $keyword)
        ->orLike('provider', $keyword)
        ->findAll();
    }

    // public function cari_produk(string $keyword)
    // {
    //     // 1. Bersihkan keyword agar aman dari serangan SQL Injection
    //     $sanitizedKeyword = $this->db->escapeLikeString($keyword);

    //     // 2. Bangun Query
    //     return $this->db->table($this->table)
    //                     ->like('nama_produk', $sanitizedKeyword, 'both') // Cari di kolom nama_produk
    //                     ->orLike('provider', $sanitizedKeyword, 'both') // Cari di kolom provider
    //                     ->get()
    //                     ->getResultArray(); // Mengembalikan hasil dalam bentuk array
        
    //     /*
    //     Di dalam query ini, kita mencari di seluruh tabel produk yang nama produknya
    //     atau nama providernya mengandung keyword yang dimasukkan oleh user.
    //     */
    // }

    // public function getByKeyword($keyword)
    // {
    //     return $this->like('provider', $keyword)
    //                 ->orLike('nama', $keyword)
    //                 ->findAll();
    // }
}
