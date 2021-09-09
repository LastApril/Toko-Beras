<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Transaksi
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Tipe</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dt as $data) {
                                    foreach ($dt2 as $data2) {
                                        if ($data['id_barang'] == $data2['id_barang']) { ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data2['nama_barang']; ?></td>
                                                <td><?php echo $data['jumlah']; ?></td>
                                                <td><?php echo "Rp " . number_format($data['total'], 2, ',', '.'); ?></td>
                                                <td><?php echo $data['tipe']; ?></td>
                                                <td><?php echo $data['tanggal']; ?></td>
                                            </tr>
                                <?php }
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?= $this->endSection() ?>