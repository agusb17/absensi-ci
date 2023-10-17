<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    body {
        background-image: url('https://media.gettyimages.com/id/1318919777/pt/v%C3%ADdeo/4k-network-digital-background.jpg?s=640x640&k=20&c=rShWdt2hp1jpk9Y7IrLjEkBmAv4DcQyI1zIt5tv-xP8=');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .card-title {
        color: #fff;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.3);
        padding: 20px;
    }

    .logo {
        max-width: 200px;
        height: auto;
        display: block;
        margin: 0 auto 40px;
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
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="https://binusasmg.sch.id/ppdb/logobinusa.png" alt="Logo" class="mb-4 logo">
                            <h2 class="card-title text-center">Sign In</h2>
                            <form action="<?php echo base_url(); ?>Auth/process_login" method="post" method="post">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <span class="text-center">Password Minimal 8 Karakter </span>
                                <div class="mb-3 position-relative">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                    <span class="fa fa-fw fa-eye-slash field-icon toggle-password"
                                        onclick="togglePassword()"></span>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <!-- Menampilkan pesan kesalahan jika ada -->
                            <?php if(isset($login_error)): ?>
                            <div class="alert alert-danger mt-3">
                                <?= $login_error; ?>
                            </div>
                            <?php endif; ?>
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