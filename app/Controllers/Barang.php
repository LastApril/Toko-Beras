<?php

namespace App\Controllers;

use App\Models\model_barang;

class Barang extends BaseController
{
    public function index(){
        $barang = new model_barang();
        $data['dt'] = $barang->findAll();
        return view('barang',$data);
    }

    public function add()
    {
        $validation =  \Config\Services::validation();
        $barang = new model_barang();
        $request = \Config\Services::request();

        $validation->setRules([
            'id_barang'     => 'required',
            'nama_barang'   => 'required',
            'stok'          => 'required',
            'harga_beli'    => 'required',
            'harga_jual'    => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $barang->insert([
                'id_barang'     => $request->getPost('id_barang'),
                'nama_barang'   => $request->getPost('nama_barang'),
                'stok'          => $request->getPost('stok'),
                'harga_beli'    => $request->getPost('harga_beli'),
                'harga_jual'    => $request->getPost('harga_jual')
            ]);
            return redirect()->to('/barang');
        }
        echo view('add_barang');
    }
    public function edit($id_barang)
    {
        $barang = new model_barang();
        $data['barang'] = $barang->where('id_barang', $id_barang)->first();
        $validation =  \Config\Services::validation();
        $request = \Config\Services::request();
        $validation->setRules([
            'id_barang'     => 'required',
            'nama_barang'   => 'required',
            'stok'          => 'required',
            'harga_beli'    => 'required',
            'harga_jual'    => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $barang->update($id_barang, [
                'nama_barang'   => $request->getPost('nama_barang'),
                'stok'          => $request->getPost('stok'),
                'harga_beli'    => $request->getPost('harga_beli'),
                'harga_jual'    => $request->getPost('harga_jual')
            ]);
            return redirect()->to('/barang');
        }
        echo view('edit_barang', $data);
    }

    public function delete($id_barang)
    {
        $barang = new model_barang();
        $barang->delete($id_barang);
        return redirect()->to('/barang');
    }
}