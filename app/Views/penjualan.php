<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<script>
    document.title = "Toko Beras - Penjualan";
</script>
<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Transaksi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Penjualan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Penjualan
                    <a class="btn btn-primary float-sm-right ml-2" href="<?= base_url('/penjualan/cetak') ?>">Cetak Data</a>
                    <a class="btn btn-primary float-sm-right ml-2" href="<?= base_url('/penjualan/excel') ?>">Export Excel</a>
                    <a class="btn btn-primary float-sm-right" href="<?= base_url('/penjualan/add') ?>">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dt as $data) {
                                    foreach ($dt2 as $data2) {
                                        if ($data['id_barang'] == $data2['id_barang']) { ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data['id_transaksi']; ?></td>
                                                <td><?php echo $data2['nama_barang']; ?></td>
                                                <td><?php echo $data['jumlah']; ?></td>
                                                <td><?php echo "Rp " . number_format($data['total'], 2, ',', '.'); ?></td>
                                                <td><?php echo $data['tanggal']; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?= base_url('/penjualan/' . $data['id_transaksi'] . '/edit') ?>">Edit</a>
                                                    <a class="btn btn-danger" href="#" data-href="<?= base_url('/penjualan/' . $data['id_transaksi'] . '/delete') ?>" onclick="confirmToDelete(this)">Delete</a>
                                                </td>
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
    <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="h2">Are you sure?</h2>
                    <p>The data will be deleted and lost forever</p>
                </div>
                <div class="modal-footer">
                    <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmToDelete(el) {
            $("#delete-button").attr("href", el.dataset.href);
            $("#confirm-dialog").modal('show');
        }
    </script>

    <?= $this->endSection() ?>