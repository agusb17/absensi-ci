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
    background-color: #f3f3f3;
    margin: 0;
    padding: 0;
}

.main {
    margin: 4rem;
}

.container {
    width: 75%;
}

.card {
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #007bff;
    color: #fff;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
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
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
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
    border-collapse: collapse;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    color: #000;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.text-center {
    text-align: center;
    color: #000;
}

h5 {
    margin-top: 0;
    margin-bottom: 0.5rem;
    color: #000;
}

p {
    margin-bottom: 0;
    color: #000;
}
</style>


<body>
    <div class="main m-4">
        <div class="container w-75">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Rekap Mingguan</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/rekapPerMinggu'); ?>" method="post" class="row g-3">
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
                        <?php if (empty($perminggu)): ?>
                        <h5 class="text-center">Tidak ada data diminggu ini ini.</h5>
                        <p class="text-center">Silahkan pilih Minggu lain.</p>
                        <?php else: ?>
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
                                <?php $no=0; foreach ($perminggu as $rekap): $no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $rekap->kegiatan; ?></td>
                                    <td><?= $rekap->date; ?></td>
                                    <td><?= $rekap->jam_masuk; ?></td>
                                    <td><?= $rekap->jam_pulang; ?></td>
                                    <td><?= $rekap->keterangan_izin; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>