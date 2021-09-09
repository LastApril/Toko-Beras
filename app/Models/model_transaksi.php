<?php

namespace App\Models;

use CodeIgniter\Model;

class model_transaksi extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_transaksi','id_barang', 'tipe', 'tanggal', 'jumlah', 'total'];
}
