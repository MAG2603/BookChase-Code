<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style-admin.css">
  <title>Settings</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
    }

    /* Settings Container */
    .settings-container {
      background: #ffffff;
      padding: 20px;
      margin: 20px auto;
      border-radius: 8px;
      max-width: 900px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
      font-size: 1.2rem;
      color: #333;
      margin-bottom: 15px;
      border-bottom: 2px solid #4CAF50;
      display: inline-block;
      padding-bottom: 5px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
      color: #555;
    }

    input[type="text"],
    input[type="file"],
    input[type="color"],
    input[type="number"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      background-color: #fff;
      box-sizing: border-box;
    }

    input:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: #4CAF50;
    }

    textarea {
      resize: none;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .toggle-switch {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .toggle-switch input[type="checkbox"] {
      display: none;
    }

    .toggle-switch label {
      width: 40px;
      height: 20px;
      background: #ddd;
      border-radius: 20px;
      position: relative;
      cursor: pointer;
    }

    .toggle-switch label::after {
      content: "";
      width: 16px;
      height: 16px;
      background: #fff;
      border-radius: 50%;
      position: absolute;
      top: 2px;
      left: 2px;
      transition: transform 0.3s ease-in-out;
    }

    .toggle-switch input:checked + label {
      background: #4CAF50;
    }

    .toggle-switch input:checked + label::after {
      transform: translateX(20px);
    }

    button.submit {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 12px;
      font-weight: bold;
    }

    button.submit:hover {
      background-color: #45a049;
    }

    @media (max-width: 768px) {
      .settings-container {
        padding: 15px;
      }
      h3 {
        font-size: 1rem;
      }
      label {
        font-size: 0.9rem;
      }
      input,
      textarea,
      select,
      button {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  
  <?php 
    require 'sidebar.php';
  ?>

  <!-- CONTENT -->
  <section id="content">
    
    <main >
    <div class="head-title">
      <div class="left">
        <h1>Pengaturan Website</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Dashboard</a></li>
          <li><i class='bx bx-chevron-right'></i></li>
          <li><a class="active" href="settings.php">Pengaturan</a></li>
        </ul>
      </div>
    </div>
      <div class="settings-container">
        <form>
          <!-- Pengaturan Website -->
          <h3>Pengaturan Website</h3>
          <div class="form-group">
            <label for="website-title">Judul Web</label>
            <input type="text" id="website-title" placeholder="Masukkan judul web...">
          </div>

          <div class="form-group">
            <label for="fav-icon">Fav Icon</label>
            <small>Gunakan file PNG transparan, width dan height sama, misal: 64px x 64px</small>
            <input type="file" id="fav-icon" accept=".png, .jpg, .jpeg">
          </div>

          <div class="form-group">
            <label for="app-logo">Logo</label>
            <small>Gunakan file PNG transparan, lebar maksimal 150px, ukuran minimal 50px x 50px</small>
            <input type="file" id="app-logo" accept=".png, .jpg, .jpeg">
          </div>

          <div class="form-group">
            <label for="footer">Footer</label>
            <textarea id="footer" rows="4" placeholder="Masukkan footer">&#169;2024 BookChase</textarea>
          </div>

          <!-- Pengaturan Layout -->
          <h3>Pengaturan Layout</h3>
          <div class="form-group">
            <label for="layout-color">Warna Layout</label>
            <input type="color" id="layout-color" value="#4CAF50">
          </div>

          <div class="form-group">
            <label for="font-size">Ukuran Font</label>
            <input type="number" id="font-size" placeholder="Masukkan ukuran font (px)" value="16">
          </div>

          <div class="form-group">
            <label for="font-family">Font Family</label>
            <select id="font-family">
              <option value="Arial">Arial</option>
              <option value="Verdana">Verdana</option>
              <option value="Times New Roman">Times New Roman</option>
              <option value="Courier New">Courier New</option>
            </select>
          </div>

          <!-- Pengaturan Bahasa -->
          <h3>Pengaturan Bahasa</h3>
          <div class="form-group">
            <label for="language">Bahasa</label>
            <select id="language">
              <option value="en">English</option>
              <option value="id">Indonesian</option>
              <option value="es">Spanish</option>
              <option value="fr">French</option>
            </select>
          </div>

          <!-- Pengaturan Mode -->
          <h3>Pengaturan Mode</h3>
          <div class="toggle-switch">
            <input type="checkbox" id="dark-mode">
            <label for="dark-mode"></label>
            <span>Dark Mode</span>
          </div>
          <br>
          <button class="submit" type="submit">Simpan Perubahan</button>
        </form>
      </div>
    </main>
  </section>
</body>
</html>
