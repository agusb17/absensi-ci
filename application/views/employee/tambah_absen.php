<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.kegiatan {
    margin-left: 30%;
    margin-right: 10px;
    margin-top: 100px;
}

body {
    background: linear-gradient(to top left, #99ffcc 0%, #99ffcc 100%);
}
</style>

<body>
    <?php $this->load->view('./component/sidebar_karyawan'); ?>
    <div class="kegiatan mb-3">
        <form method="post" action="<?= base_url('employee/save_absensi') ?>">
            <h3>Absensi</h3>
            <br>
            <label for="Kegiatan" class="form-label">Kegiatan :</label>
            <textarea class="form-control" aria-label="With textarea" name="kegiatan"></textarea>
            <button type="submit" class="btn btn-warning mt-4">Masuk</button>
        </form>
    </div>
</body>

</html>