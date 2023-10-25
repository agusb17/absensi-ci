<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
/* Style untuk perangkat seluler */
@media (max-width: 767px) {
    body {
        overflow: auto;
        /* Izinkan discroll */
    }
}

/* Style untuk perangkat desktop */
/* @media (min-width: 768px) {
        body {
            overflow: hidden;
            Larang discroll
        }
    } */

body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>

<body>
    <?php foreach ($user as $user): ?>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src=""><span class="font-weight-bold"><?php echo $user->username; ?></span><span
                        class="text-black-50"><?php echo $user->email; ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <form action="<?php echo base_url(
                            'employee/edit_image'
                        ); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                            <label for="image">Pilih gambar:</label>
                            <input type="file" id="image" name="image" accept="image/*">
                            <button type="submit">Simpan</button>
                        </form>

                    </div>
                    <form action="<?php echo base_url(
                        'admin/edit_profile'
                    ); ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nama Depan</label><input type="text"
                                    class="form-control" placeholder="Nama Depan"
                                    value="<?php echo $user->nama_depan; ?>"></div>
                            <div class="col-md-6"><label class="labels">Nama Belakang</label><input type="text"
                                    class="form-control" value="<?php echo $user->nama_belakang; ?>"
                                    placeholder="Nama Belakang"></div>
                        </div>
                        <div class="row mt-3">

                            <div class="col-md-12"><label class="labels">Password Lama</label><input type="text"
                                    class="form-control" placeholder="Password lama" value=""></div>
                            <div class="col-md-12"><label class="labels">Password Baru</label><input type="text"
                                    class="form-control" placeholder="Password Baru" value=""></div>
                            <div class="col-md-12"><label class="labels">Konfirmasi Password</label><input type="text"
                                    class="form-control" placeholder="Konfirmasi password" value=""></div>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                                Profile</button></div>
                    </form>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
</body>

</html>