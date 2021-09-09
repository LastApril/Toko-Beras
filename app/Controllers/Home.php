<?php

namespace App\Controllers;

use App\Models\model_transaksi;
use App\Models\model_barang;

class Home extends BaseController
{
	public function index()
	{
		$transaksi = new model_transaksi();
		$barang = new model_barang();
		$data['dt'] = $transaksi->findAll();
		$data['dt2'] = $barang->findAll();
		return view('test_conent',$data);
	}
}
