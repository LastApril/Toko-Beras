<?php

namespace App\Models;

use CodeIgniter\Model;

class model_barang extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';

    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_barang', 'nama_barang', 'stok', 'harga_beli', 'harga_jual'];
}
