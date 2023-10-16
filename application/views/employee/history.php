<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
.table {
    width: 78%;
    margin-top: 100px;
    margin-left: 280px;
}
</style>

<body>
    <?php $this->load->view('./component/sidebar_karyawan'); ?>
    <table class="table text-center table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kegiatan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Masuk</th>
                <th scope="col">Jam Pulang</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Pulang</th>
                <th scope="col text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($absensi as $row): ?>
            <tr>
                <td><span class="number"><?php echo $i; ?></span></td>
                <td><?php echo $row['kegiatan']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['jam_masuk']; ?></td>
                <td>
                    <span id="jam-pulang-<?php echo $i; ?>">
                        <?php echo $row['jam_pulang']; ?>
                    </span>
                </td>
                <td>
                    <?php if (!empty($row['keterangan_izin'])): ?>
                    <p>Izin</p>
                    <?php else: ?>
                    <p>Masuk</p>
                    <?php endif; ?>
                </td>
                <td>

                    <a href="javascript:setHomeTime(<?php echo $i; ?>);" class="btn btn-success <?php echo !empty(
            $row['keterangan_izin']
        )
            ? 'disabled'
            : ''; ?>">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </td>

                <td><a href="<?php echo base_url('employee/ubah_absensi/') .
                        $row['id']; ?>" type="button" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a> |
                    <button onClick="hapus(<?php echo $row['id']; ?>)" type="button" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg>
                    </button>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
<script>
function setHomeTime(row) {
    var jamPulangElement = document.getElementById('jam-pulang-' + row);
    var pulangButton = document.getElementById('pulangBtn-' + row);

    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    var formattedTime = (hours < 10 ? "0" : "") + hours + ":" + (minutes < 10 ? "0" : "") + minutes + ":" + (
        seconds < 10 ? "0" : "") + seconds;

    jamPulangElement.textContent = formattedTime;

    // Simpan waktu di localStorage
    localStorage.setItem('jamPulang-' + row, formattedTime);


    // Nonaktifkan tombol home setelah ditekan
    var homeButton = document.querySelector('a[href="javascript:setHomeTime(' + row + ');"]');
    homeButton.classList.add('disabled');

    // Nonaktifkan tombol "Pulang" setelah tombol "Home" ditekan
    pulangButton.classList.add('disabled');
    pulangButton.onclick = null;
}

// Cek apakah waktu tersimpan di localStorage saat halaman dimuat
window.addEventListener('load', function() {
    var rows = document.querySelectorAll('[id^=jam-pulang-]');

    rows.forEach(function(jamPulangElement) {
        var row = jamPulangElement.getAttribute('id').replace('jam-pulang-', '');
        var storedTime = localStorage.getItem('jamPulang-' + row);

        if (storedTime) {
            jamPulangElement.textContent = storedTime;

            // Nonaktifkan tombol "Pulang" jika tombol "Home" sudah ditekan
            var pulangButton = document.getElementById('pulangBtn-' + row);
            pulangButton.classList.add('disabled');
            pulangButton.onclick = null;

            // Nonaktifkan tombol "Home" jika tombol "Home" sudah ditekan
            var homeButton = document.querySelector('a[href="javascript:setHomeTime(' + row +
                ');"]');
            homeButton.classList.add('disabled');
            homeButton.onclick = null;
        }
    });
});
</script>
<script>
function hapus(id) {
    if (confirm('Yakin Di Hapus?')) {
        // Jika pengguna mengonfirmasi, maka akan menjalankan perintah hapus
        window.location.href = "<?php echo base_url('employee/hapus/'); ?>" + id;
    }
}
</script>

<script>
function pulang(id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?php echo base_url("employee/pulang/") ?>' + id, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.status === 'true') {
                // Tombol "Pulang" berubah menjadi "Batal Pulang"
                var pulangButton = document.querySelector('a.btn[data-id="' + id + '"]');
                pulangButton.textContent = 'Batal Pulang';
                pulangButton.className = 'btn btn-danger';
                pulangButton.setAttribute('onclick', 'batalPulang(' + id + ');');

                // Update jam pulang dalam tabel
                var jamPulangCell = document.getElementById('jam-pulang-' + id);
                jamPulangCell.textContent = response.jam_pulang;
            }
        }
    };
    xhr.send();
}

function batalPulang(id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?php echo base_url("employee/batal_pulang/") ?>' + id, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.status === 'false') {
                // Tombol "Batal Pulang" berubah kembali menjadi "Pulang"
                var batalPulangButton = document.querySelector('a.btn[data-id="' + id + '"]');
                batalPulangButton.textContent = 'Pulang';
                batalPulangButton.className = 'btn btn-warning';
                batalPulangButton.setAttribute('onclick', 'pulang(' + id + ');');

                // Hapus jam pulang dalam tabel
                var jamPulangCell = document.getElementById('jam-pulang-' + id);
                jamPulangCell.textContent = '';
            }
        }
    };
    xhr.send();
}
</script>


<?php ?>





</html>