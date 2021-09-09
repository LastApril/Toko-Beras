<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Ubah User</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Update Data User
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" class="form-control" id="id" placeholder="ID" value="<?= $users['id'] ?>">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= $users['username'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= $users['password'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= $users['nama'] ?>" required>
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