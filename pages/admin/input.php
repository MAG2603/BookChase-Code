<?php 

if (!isset($_SESSION['admin'])) {
  header("location: $urlLoginAdmin");
  die;
}

$hal = "input";


$success = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = validate(["judul", "penerbit", "edisi", "no_ddc", "no_panggil", "bahasa", "pengarang", "tahun", "isbn", "kota_terbit", "genre", "sinopsis", "poin"]);

    if ($data && $_FILES['sampul']["name"] && $_FILES['file']["name"]) {

      if ($_FILES['sampul']) {
        $filename = "coverbuku" . time() . "." . pathinfo($_FILES["sampul"]["name"], PATHINFO_EXTENSION);
        $data["sampul"] = $filename;

        $tmp_address = $_FILES["sampul"]['tmp_name'];
        move_uploaded_file($tmp_address, "file/".$filename);
      }

      if ($_FILES['file']) {
        $filename = "Buku" . time() . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $data["file"] = $filename;

        $tmp_address = $_FILES["file"]['tmp_name'];
        move_uploaded_file($tmp_address, "file/".$filename);
      }


        query_insert("buku", $data);
        $success = true;

    } else {
        $error = "Lengkapi Form";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../style-admin.css">
  <title>Input Koleksi</title>

  <style>
      .form-container {
  background: #f4f4f9;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 900px;
  margin: 20px auto;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.form-row {
  display: flex;
  justify-content: space-between;
  gap: 15px;
}

.form-group {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.form-group label {
  font-weight: bold;
  margin-bottom: 5px;
}

.form-group input,
.form-group textarea {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 10px;
  font-size: 14px;
  background-color: #fff;
}

.form-group input:focus,
.form-group textarea:focus {
  border-color: #4caf50;
  outline: none;
}

textarea {
  resize: none;
}

.btn-submit {
  background-color: #4caf50;
  color: #fff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  align-self: flex-start;
}

.btn-submit:hover {
  background-color: #45a049;
}

@media (max-width: 768px) {
  .form-row {
    flex-direction: column;
  }
}

  </style>
</head>
<body>
  <!-- SIDEBAR -->
 <?php 
    require 'sidebar.php';
  ?>

  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
   <!--  <nav>
      <i class='bx bx-menu'></i>
      <a href="#" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num">!</span>
      </a>
      <a href="#" class="profile">
        <img src="img/people.jpg" alt="Profile">
      </a>
    </nav> -->

    <!-- MAIN -->
    <main>
      <div class="head-title">
        <div class="left">
          <h1>Input Koleksi</h1>
          <ul class="breadcrumb">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="input-koleksi.html">Input Koleksi</a></li>
          </ul>
        </div>
      </div>

      <!-- Form Input Koleksi -->
      <div class="form-container">

        <?php if ($success): ?>
          <script>
            alert('Buku Berhasil Ditambah!');
          </script>
        <?php endif ?>

        <form action="" method="POST" enctype="multipart/form-data" class="form">
          <div class="form-row">
            <div class="form-group">
              <label for="judul">Judul Buku</label>
              <input type="text" id="judul" name="judul" placeholder="Masukkan Judul Buku" required>
            </div>
            <div class="form-group">
              <label for="pengarang">Pengarang</label>
              <input type="text" id="pengarang" name="pengarang" placeholder="Masukkan Nama Pengarang" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="penerbit">Penerbit</label>
              <input type="text" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit Buku" required>
            </div>
            <div class="form-group">
              <label for="edisi">Edisi</label>
              <input type="text" id="edisi" name="edisi" placeholder="Masukkan Nama Edisi" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="no_ddc">No. Klas DDC</label>
              <input type="text" id="no_ddc" name="no_ddc" placeholder="Masukkan Klas DDC" required>
            </div>
            <div class="form-group">
              <label for="no_panggil">No. Panggil</label>
              <input type="text" id="no_panggil" name="no_panggil" placeholder="Masukkan No Panggil" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="tahun">Tahun Terbit</label>
              <input type="number" id="tahun" name="tahun" placeholder="Masukkan Tahun Terbit"required>
            </div>
            <div class="form-group">
              <label for="isbn">ISBN</label>
              <input type="text" id="isbn" name="isbn" placeholder="Masukkan ISBN" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="kota">Kota Terbit</label>
              <input type="text" id="kota" name="kota_terbit" placeholder="Masukkan Kota Terbit" required>
            </div>
            <div class="form-group">
              <label for="genre">Genre</label>
              <input type="text" id="genre" name="genre" placeholder="Masukkan Genre Buku" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="poin">Poin</label>
              <input type="number" id="poin" name="poin" placeholder="Masukkan Poin Buku" required>
            </div>
            <div class="form-group">
              <label for="bahasa">Bahasa</label>
              <input type="text" id="bahasa" name="bahasa" placeholder="Masukkan Bahasa Buku" required>
            </div>
          </div>


          <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
            <textarea id="sinopsis" name="sinopsis" rows="4" placeholder="Masukkan Sinopsis Buku" required></textarea>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="foto">Upload Foto Sampul</label>
              <input type="file" id="foto" name="sampul" accept="image/*" required>
            </div>
            <div class="form-group">
              <label for="pdf">Upload File PDF</label>
              <input type="file" id="pdf" name="file" accept="application/pdf" required>
            </div>
          </div>
          <button type="submit" class="btn-submit">Simpan Koleksi</button>
        </form>
      </div>
    </main>
  </section>
</body>
</html>
