<?php 

if (!isset($_SESSION['admin'])) {
  header("location: $urlLoginAdmin");
  die;
}

$hal = "daftar";

$data = query_select("buku", ["orderby" => "id_buku DESC"]);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../style-admin.css">
  <title>Daftar Koleksi</title>
  <style>
    .table-container {
      margin: 20px auto;
      background: #f9f9f9;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      font-family: Arial, sans-serif;
    }

    thead th {
      background-color: #4a90e2;
      color: white;
      padding: 10px;
      font-weight: bold;
      text-transform: uppercase;
      width: 200px; 
      text-align: center; 
    }

    tbody td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      color: #333; 
      width: 200px; 
      word-wrap: break-word; 
      text-align: center; 
    }

    tbody td:nth-child(9) {
      text-align: justify; 
    }

    tbody tr:nth-child(even) {
      background-color: #f1f1f1; 
    }

    tbody tr:hover {
      background-color: #e7e7e7; 
    }

    /*button {
    padding: 6px 12px;
    width: 70px; 
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}*/
    button.edit, a.edit {
      width: 70px; 
      background-color: #4caf50; 
      color: white;
      text-decoration: none;
      white-space: nowrap;
      padding: 4px;
      border-radius: 3px;

    }

    button.delete, a.delete {
      width: 70px; 
      background-color: #f44336; 
      color: white;
      text-decoration: none;
      white-space: nowrap;
      padding: 4px;
      border-radius: 3px;

    }

    button.pdf {
      width: 70px; 
      background-color: #ff9800; 
      color: white;
    }

    a.pdf {
      background-color: #ff9800; 
      color: white;
      text-decoration: none;
      white-space: nowrap;
      padding: 4px;
      border-radius: 3px;
    }

    button:hover {
      background-color: #d3d3d3; 
      color: #000;
    }

    img.sampul {
      width: 60px;
      height: auto;
      border-radius: 4px;
      object-fit: cover;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sidebar-mobile button span {
      height: 5px !important;
    }
</style>
</head>
<body>
  <!-- SIDEBAR -->
  <?php 
  require_once "sidebar.php";
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
          <h1>Daftar Koleksi</h1>
          <ul class="breadcrumb">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="daftar-koleksi.html">Daftar Koleksi</a></li>
          </ul>
        </div>
      </div>

      <!-- Table Koleksi -->
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Sampul</th>
              <th>Judul Buku</th>
              <th>Pengarang</th>
              <th>Tahun</th>
              <th>Kota Terbit</th>
              <th>Genre</th>
              <th>ISBN</th>
              <th>Sinopsis</th>
              <th>PDF</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="koleksiTable">
            <!-- Contoh data koleksi 1 -->
            <?php 
            $no = 1;
             ?>
            <?php foreach ($data as $item): ?>

               <tr>
              <td><?php echo $no++ ?></td>
              <td><img src="../file/<?= $item["sampul"] ?>" class="sampul"></td>
              <td><?= $item["judul"] ?></td>
              <td><?= $item["pengarang"] ?></td>
              <td><?= $item["tahun"] ?></td>
              <td><?= $item["kota_terbit"] ?></td>
              <td><?= $item["genre"] ?></td>
              <td><?= $item["isbn"] ?></td>
              <td><?= $item["sinopsis"] ?></td>
              <td>
                <a href="../file/<?= $item["file"] ?>" class="pdf">Lihat PDF</a>
              </td>
              <td>
                <a href="<?= $baseUrl ?>/admin/edit?id=<?= $item['id_buku'] ?>" class="edit">Edit</a>
                <br>
                <br>
                <a onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" href="<?= $baseUrl ?>/admin/hapus?id=<?= $item['id_buku'] ?>" class="delete">Hapus</a>
              </td>
            </tr>
              
            <?php endforeach ?>
           
            <!-- Contoh data koleksi 2 -->
           
          </tbody>
        </table>
      </div>

    </main>
  </section>

  <script src="script.js"></script>
</body>
</html>
