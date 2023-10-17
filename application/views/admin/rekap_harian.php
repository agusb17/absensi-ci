<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>">
</head>
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
}

.main {
    margin: 4rem;
}

.container {
    width: 75%;
}

.card {
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}

.card-header {
    background-color: #007bff;
    color: #fff;
    padding: 1rem;
}

.card-body {
    padding: 1.25rem;
}

form {
    margin-bottom: 1.5rem;
}

.input-group {
    margin-bottom: 1rem;
}

.btn-success {
    background-color: #28a745;
    color: #fff;
    border: 1px solid #28a745;
}

hr {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

.table-responsive {
    margin-top: 1.5rem;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

th,
td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

th {
    background-color: #f8f9fa;
}

h5 {
    margin-top: 0;
    margin-bottom: 0.5rem;
}

.text-center {
    text-align: center;
}
</style>


<body>
    <div class="main m-4">
        <div class="container w-75">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Rekap Harian</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/rekapPerHari'); ?>" method="post" class="row g-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Tanggal awal</span>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Tanggal akhir</span>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <div class="table-responsive">
                        <?php if(!empty($perhari)): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kegiatan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jam Masuk</th>
                                    <th scope="col">Jam Pulang</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0;foreach ($perhari as $rekap): $no++ ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $rekap['kegiatan']; ?></td>
                                    <td><?= $rekap['date']; ?></td>
                                    <td><?= $rekap['jam_masuk']; ?></td>
                                    <td><?= $rekap['jam_pulang']; ?></td>
                                    <td><?= $rekap['keterangan_izin']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <h5 class="text-center">Tidak ada data untuk tanggal ini.</h5>
                        <p class="text-cente">Silahkan pilih tanggal lain.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>