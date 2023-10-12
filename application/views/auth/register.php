<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to top left, #0000ff 0%, #ff33cc 100%);
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 420px;
            background: linear-gradient(to top left, #0000ff 0%, #ff33cc 100%);
            color: #fff;
            border-radius: 10px;
            padding: 20px 40px;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50%;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .remember-forgot label input {
            accent-color: #fff;
            margin-right: 3px;
        }

        .remember-forgot a {
            color: #fff;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }

        .wrapper .register-link {
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px 0 15px;
        }

        .register-link p a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: ;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <form action="">
            <h1>Register</h1>
            <div class="input-box">
                <label for="">username</label>
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="input-box">
                <label for="">email</label>
                <input type="email" placeholder="email" name="email" required>
            </div>
            <div class="input-box">
                <label for="">password</label>
                <input type="password" placeholder="password" name="password" required>
            </div>
            <div class="input-box">
                <label for="">nama depan</label>
                <input type="nama_depan" placeholder="nama depan" name="nama depan" required>
            </div>
            <div class="input-box">
                <label for="">nama belakang</label>
                <input type="nama_belakang" placeholder="nama belakang" name="nama belakang"required>
          </div>
            <button type="submit" class="btn">login</button>
            <div class="register_link">
                <p>sudah punya akun?<a href='login'style=color:white> login</a></p>
            </div>

            <div class="register_link">
                <p>sudah punya akun?<a href='register_admin' style=color:white> register admin</a></p>
            </div>


        </form>

    </div>
</body>

</html>