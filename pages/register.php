<?php

$error = false;
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $data = validate(["nama", "umur", "username", "password"]);

  if ($data) {

    query_insert("users", $data);
    $id_user = $conn->insert_id;

    $progress = [
      "id_user" => $id_user,
      "poin" => 0,
      "level" => 1,
      "persentase" => 0,
      "bookread" => 0,
    ];

    query_insert("progress", $progress);

    $success = "Akun Berhasil Dibuat, Silahkan Login!";

  } else {

    $error = "Lengkapi Form!";

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
  <style>
    body {
      overflow: hidden;
    }
  </style>
  </head>
  <body class="img js-fullheight" style="background-image: url(file/bg.jpg);">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-2">
          <h2 class="heading-section"></h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">

          <div class="card">
            <div class="card-body">
            
          <div class="login-wrap p-0">
            <h3 class="mb-4 text-dark text-center">Create an account</h3>

            <?php if (($error)): ?>

              <script>
                alert('<?php echo $error; ?>');
              </script>

            <?php endif; ?>

            <?php if (($success)): ?>

              <script>
                alert('<?php echo $success; ?>');

                setTimeout( () => {
                  location.href = 'login';
                }, 3000 );
              </script>

            <?php endif; ?>

            <form action="" method="POST" class="signin-form">

              <style>
                .form-control {
                  background: #fff !important;
                  color: #000 !important;
                  border: 1px solid #eaeaea;
                }

                input.form-control::placeholder {
                 color: #444 !important; 
                }
              </style>
             
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama" id="nama" onkeyup="validateNama()" name="nama" required style="background: #fffcc8; color: #000 !important;">
              </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Umur" id="umur" onkeypress="return hanyaAngka(event)" name="umur" required>
              </div>
               <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" id="username" onkeyup="validateUsername()" name="username" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" id="password" onkeyup="validatePassword()" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
              </div>

               <div class="form-group d-md-flex">
                <div class="w-50" style="opacity: 0;">
                  <label class="checkbox-wrap checkbox-primary">Remember Me
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="w-50 text-md-right">
                  <a href="login" class="text-dark">Sudah Punya Akun? Login</a>
                </div>
            
            </form>
            
          </div>
        </div>
        </div>
          </div>
      </div>
    </div>
  </section>

  <script>
    function validateNama() {
      const namaInput = document.getElementById("nama");
      const namaRegex = /^[a-zA-Z\s]*$/;
      if (!namaRegex.test(namaInput.value)) {
        namaInput.value = namaInput.value.replace(/[^a-zA-Z\s]/g, ""); 
      }
    }

     function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }

    function validateUsername() {
      const usernameInput = document.getElementById("username");
      const usernameRegex = /^[a-zA-Z]*$/; 
      if (!usernameRegex.test(usernameInput.value)) {
        usernameInput.value = usernameInput.value.replace(/[^a-zA-Z]/g, ""); 
      }
    }

    function validatePassword() {
      const passwordInput = document.getElementById("password");
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/;
      updateFeedback(passwordInput.value, passwordRegex, "errorPassword", 
        "Password harus mengandung huruf besar, huruf kecil, dan simbol.");
    }

    function updateFeedback(value, regex, errorId, errorMessage) {
      const errorElement = document.getElementById(errorId);
      if (regex.test(value)) {
        errorElement.textContent = "✓ Valid";
        errorElement.classList.replace("error", "success");
      } else {
        errorElement.textContent = errorMessage;
        errorElement.classList.replace("success", "error");
      }
    }
  </script>

</body>
</html>


        <?php if ( $error ): ?>

          <p style="color: red; text-align: center;"><?= $error; ?></p>

        <?php endif; ?>

        <?php if ( $success ): ?>

          <p style="color: green; text-align: center;"><?= $success; ?></p>

        <?php endif; ?>

        <div class="input-box">
          <input type="text" id="nama" name="nama" required="required" onkeyup="validateNama()" />
          <span>Nama</span>
          <i></i>
        </div>

        <div class="input-box">
          <input type="number" id="umur" name="umur" required="required" onkeypress="return hanyaAngka(event)" />
          <span>Umur</span>
          <i></i>
           <span id="errorUmur" class="error"></span>
        </div>

        <div class="input-box">
          <input type="text" id="username" name="username" required="required" onkeyup="validateUsername()" />
          <span>Username</span>
          <i></i>
        </div>

        <div class="input-box">
          <input type="password" id="password" name="password" required="required" onkeyup="validatePassword()" />
          <span>Password</span>
          <i></i>
        </div>
        <span id="errorPassword" class="error"></span>

        <div class="imp-links">
          <a href="login">Sudah Punya Akun? Sign In</a>
        </div>

        <input type="submit" value="Sign Up" class="btn" />

       
      </form>
    </div>
  </body>
 -->


  

