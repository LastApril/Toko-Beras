<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tambah Barang</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Input Data Barang
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="id_barang" class="col-sm-2 col-form-label">ID Barang</label>
                            <div class="col-sm-10">
                                <input type="text" name="id_barang" class="form-control" id="id_barang" placeholder="ID Barang" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="text" name="stok" class="form-control" id="stok" placeholder="Stok" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga_beli" class="form-control" id="harga_beli" placeholder="Harga Beli" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga_jual" class="form-control" id="harga_jual" placeholder="Harga Jual" required>
                            </div>
                        </div>
                        <div class="form-group row float-right mt-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?= $this->endSection() ?>