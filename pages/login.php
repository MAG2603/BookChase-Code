<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = validate(["username", "password"]);

    if ($data) {

        $username = $data["username"];
        $password = $data["password"];

        $user = query_select("users", [
          "where" => "username = '$username' AND password = '$password'",
        ]);

        $admin = query_select("admin", [
          "where" => "username = '$username' AND password = '$password'",
        ]);

        if ($user) {
          
          $_SESSION['login'] = $user[0];
          header("Location: dashboard");
          exit();

        } else if ($admin) {

          $_SESSION['admin'] = $admin[0];
          header("Location: admin");
          exit();
          // code...
        } else {
          $error = "Username atau password salah!";
        }
  
       
    } else {
        $error = "Username atau password tidak boleh kosong!";
    }
}
?>

 <!doctype html>
<html lang="en">
  <head>
    <title>Halaman Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="mobile.css">
  <style>
    body {
      overflow: hidden;
    }
  </style>
  </head>
  <body  style="">

    <div class="d-flex cont">
      <div class="box p-5 bg-dark" style="background-image: url(file/bg.jpg);">

        <div class="card">
          <div class="card-body">
            
          <div class="d-flex flex-column justify-content-center ">

            <h5 class="mb-0 text-left">Hello Again!</h5>
            <p style="font-size: .8rem;">Masukkan Username Dan Password Untuk Login</p>

          <form style="width: 100%;" action="" method="POST" class="signin-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
              </div>

              <p style="font-size: .8rem;">Belum Punya Akun? <a href="register">Register</a></p>

              <a style="font-size: .65rem;" href="admin/login" class="btn btn-primary">Login To Backoffice</a>
          </form>
          </div>
          
        </div>
        </div>

        <h4 class="text-white mobile-hidden"></h4>
        <a href="admin/login" class="btn btn-primary mobile-hidden">Backoffice</a>
        
      </div>

      <div class="box-2 d-none d-sm-block d-md-block d-lg-block p-3 pl-5 pr-5 bg-white">
        <div class="d-flex flex-column justify-content-center ">

            <h5 class="mb-0 text-left">Hello Again!</h5>
            <p style="font-size: .8rem;">Masukkan Username Dan Password Untuk Login</p>

          <form style="width: 100%;" action="" method="POST" class="signin-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
              </div>

              <p style="font-size: .8rem;">Belum Punya Akun? <a href="register">Register</a></p>
          </form>
          
        </div>
      </div>
    </div>

</body>
<?php if (isset($error)): ?>

  <script>
    alert('<?php echo $error; ?>');
  </script>

<?php endif; ?>
</html>

