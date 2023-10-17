<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    body {
        background-image: url('https://img.freepik.com/free-vector/realistic-style-technology-particle-background_23-2148426704.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .card-title {
        color: #fff;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.3);
        padding: 5px;
    }

    .logo {
        max-width: 80px;
        height: auto;
        display: block;
        margin: 0 auto 40px;
    }

    label {
        color: white;
    }

    .field-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        user-select: none;
    }
    </style>
</head>

<body>
    <div class="min-vh-100 d-flex align-items-center">
        <div class="container">
            <h1 class="text-center text-light">Register Karyawan</h1>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="<?= base_url('Auth/process_register_karyawan'); ?>"
                                method="post">
                                <div class="col-md-6">
                                    <label for="inputName4" class="form-label">First Name</label>
                                    <input name="first_name" type="first name" class="form-control" id="inputName4">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Last Name</label>
                                    <input name="last_name" type="last_name" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail"
                                        placeholder="Email">
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="inputPassword"
                                        placeholder="Password">
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress2" class="form-label">Username</label>
                                    <input name="username" type="text" class="form-control" id="inputAddress2"
                                        placeholder="Username">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input name="" type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="text-center py-2 col-12">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <span><a class="text-white" href="<?= base_url('auth');?>">Klik di sini bila sudah
                                        memiliki akun</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var icon = document.querySelector(".toggle-password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }
    </script>

</body>

</html>