<?php date_default_timezone_set('Asia/Bangkok'); ?>
<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Ubah Transaksi</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Ubah Data Penjualan
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="id_transaksi" class="col-sm-2 col-form-label">ID Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" placeholder="ID Transaksi" required readonly value="<?= $transaksi['id_transaksi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="nama_barang" name="nama_barang">

                                    <?php foreach ($dt as $data) { ?>
                                        <option value="<?= $data['harga_jual'] ?>" <?php
                                                                                    if ($data['id_barang'] == $transaksi['id_barang']) {
                                                                                        $harga = $data['harga_jual'];
                                                                                        echo "selected = 'selected'";
                                                                                    }
                                                                                    ?>>
                                        <?php echo $data['nama_barang'];
                                    } ?>
                                        </option>
                                </select>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $("#nama_barang").on('change', function() {
                                var harga = $("#nama_barang").val();
                                $("#harga").val(harga);
                            });
                        </script>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" required readonly value="<?= $harga ?>">
                            </div>
                        </div>
                        <script type="text/javascript">
                            function tes() {
                                var harga = $("#harga").val();
                                var jml = $("#jumlah").val();
                                var total = jml * harga;
                                $("#total").val(total);
                            }
                        </script>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah" oninput="tes()" required value="<?= $transaksi['jumlah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total" class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="text" name="total" class="form-control" id="total" placeholder="Total" required readonly value="<?= $total = $transaksi['jumlah'] * $harga ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal" value="<?= $transaksi['tanggal'] ?>" required>
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