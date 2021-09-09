<?php

namespace App\Controllers;

use App\Models\model_transaksi;
use App\Models\model_barang;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Pemasokan extends BaseController
{
    public function index()
    {
        $transaksi = new model_transaksi();
        $barang = new model_barang();
        $data['dt'] = $transaksi->where('tipe', 'keluar')->findAll();
        $data['dt2'] = $barang->findAll();
        return view('pemasokan', $data);
    }

    public function add()
    {
        $validation =  \Config\Services::validation();
        $barang = new model_barang();
        $transaksi = new model_transaksi();
        $request = \Config\Services::request();
        $data['dt'] = $barang->findAll();
        $validation->setRules([
            'nama_barang'  => 'required',
            'harga'        => 'required',
            'jumlah'        => 'required',
            'total'        => 'required',
            'tanggal'      => 'required'
        ]);
        $tes = $barang->where('harga_jual', $request->getPost('nama_barang'))->first();
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $tgl = date('Y-m-d', strtotime($request->getPost('tanggal')));
            $transaksi->insert([
                'id_barang'     => $tes['id_barang'],
                'tipe'          => "keluar",
                'tanggal'       => $tgl,
                'jumlah'        => $request->getPost('jumlah'),
                'total'    => $request->getPost('total')
            ]);
            return redirect()->to('/pemasokan');
        }
        echo view('add_pemasokan', $data);
    }

    public function edit($id_transaksi)
    {
        $transaksi = new model_transaksi();
        $barang = new model_barang();
        $data['transaksi'] = $transaksi->where('id_transaksi', $id_transaksi)->first();
        $data['dt'] = $barang->findAll();
        $validation =  \Config\Services::validation();
        $request = \Config\Services::request();
        $validation->setRules([
            'nama_barang'  => 'required',
            'harga'        => 'required',
            'jumlah'        => 'required',
            'total'        => 'required',
            'tanggal'      => 'required'
        ]);
        $tes = $barang->where('harga_jual', $request->getPost('nama_barang'))->first();
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $tgl = date('Y-m-d', strtotime($request->getPost('tanggal')));
            $transaksi->update($id_transaksi, [
                'id_barang'     => $tes['id_barang'],
                'tipe'          => "keluar",
                'tanggal'       => $tgl,
                'jumlah'        => $request->getPost('jumlah'),
                'total'    => $request->getPost('total')
            ]);
            return redirect()->to('/pemasokan');
        }
        echo view('edit_pemasokan', $data);
    }

    public function delete($id_transaksi)
    {
        $transaksi = new model_transaksi();
        $transaksi->delete($id_transaksi);
        return redirect()->to('/pemasokan');
    }

    public function cetak()
    {
        $transaksi = new model_transaksi();
        $barang = new model_barang();
        $data['dt'] = $transaksi->where('tipe', 'keluar')->findAll();
        $data['dt2'] = $barang->findAll();
        echo view('cetak_penjualan', $data);
        /*$html = view('cetak_penjualan',$data);
        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dea Venditama');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('invoice.pdf', 'I');*/
    }

    public function excel()
    {
        $transaksi = new model_transaksi();
        $barang = new model_barang();
        $data1 = $transaksi->where('tipe', 'keluar')->findAll();
        $data2 = $barang->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Transaksi');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Total');
        $sheet->setCellValue('F1', 'Tanggal');
        $i = 1;
        $x = 2;
        foreach ($data1 as $dt1) {
            foreach ($data2 as $dt2) {
                if ($dt1['id_barang'] == $dt2['id_barang']) {
                    $sheet->setCellValue('A' . $x, $i++);
                    $sheet->setCellValue('B' . $x, $dt1['id_transaksi']);
                    $sheet->setCellValue('C' . $x, $dt2['nama_barang']);
                    $sheet->setCellValue('D' . $x, $dt1['jumlah']);
                    $sheet->setCellValue('E' . $x, $dt1['total']);
                    $sheet->setCellValue('F' . $x, $dt1['tanggal']);
                    $x++;
                }
            }
        }

        $filename = 'laporan-pemasokan-'. date("Y-m-d");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        #$writer = new Xlsx($spreadsheet);
        ob_end_clean();
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        die;
    }
}
