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

.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

.form-control {
    width: 50%;
    margin-right: 1rem;
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

.data-not-found {
    color: #868e96;
}
</style>


<body>
    <div class="main m-4">
        <div class="container w-75">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Rekap Bulanan</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/rekapPerBulan'); ?>" method="get">
                        <div class="d-flex justify-content-between">
                            <select class="form-control" id="bulan" name="bulan">
                                <option>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <button type="submit" class="btn btn-success">Filter</button>
                            <button type="submit" name="submit" class="btn btn-sm btn-success"
                                formaction="<?php echo base_url('admin/export_bulanan')?>">Export</button>

                        </div>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <div class="table-responsive">
                        <?php if (empty($rekap_harian)): ?>
                        <h5 class="text-center">Tidak ada data dibulan ini.</h5>
                        <p class="text-center">Silahkan pilih Bulan lain.</p>
                        <?php else: ?>
                        <?php foreach ($rekap_bulanan as $data): ?>
                        <table class="table" data-month="<?= $data['bulan'] ?>">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Masuk</th>
                                    <th>Pulang</th>
                                    <th>Keterangan Izin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $data_found = false; ?>
                                <?php foreach ($rekap_harian as $rekap_harian): ?>
                                <?php if (date('n', strtotime($rekap_harian['date'])) == $data['bulan']): ?>
                                <?php $data_found = true; ?>
                                <tr>
                                    <td><?= $rekap_harian['id']; ?></td>
                                    <td><?= $rekap_harian['kegiatan']; ?></td>
                                    <td><?= $rekap_harian['date']; ?></td>
                                    <td><?= $rekap_harian['jam_masuk']; ?></td>
                                    <td><?= $rekap_harian['jam_pulang']; ?></td>
                                    <td>
                                        <?php if(empty($rekap['keterangan_izin']) ): ?>
                                        <span>Masuk</span>
                                        <?php else: ?>
                                        <?= $rekap['keterangan_izin']; ?>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if (!$data_found): ?>
                                <tr>
                                    <td colspan="7">Tidak ada data untuk bulan ini.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>