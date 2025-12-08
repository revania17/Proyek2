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

}