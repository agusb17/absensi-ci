<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
.kegiatan {
    margin-left: 30%;
    margin-right: 10px;
    margin-top: 100px;
}
</style>

<body>
    <?php $this->load->view('./component/sidebar_karyawan'); ?>
    <div class="kegiatan mb-3">
        <form method="post" action="<?= base_url('employee/aksi_ubah_absensi') ?>">
            <h3>Ubah</h3>
            <br>
            <label for="Kegiatan" class="m-label">Kegiatan :</label>
            <textarea class="form-control" aria-label="With textarea"
                name="kegiatan"><?= $absen['kegiatan'] ?></textarea>
            <input type="hidden" name="id" value="<?= $absen['id'] ?>">
            <button type="submit" class="btn btn-warning mt-4">Ubah</button>
        </form>
    </div>
</body>

</html>