<?php

$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "perpustakaan";  

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function query_select($table, $role = [])
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if (isset($role['join'])) {
    $sql .= " JOIN " . $role['join'];
  }

  if (isset($role['where'])) {
    $sql .= " WHERE " . $role['where'];
  }

  if (isset($role['orderby'])) {
    $sql .= " ORDER BY " . $role['orderby'];
  }

  if (isset($role['limit'])) {
    $sql .= " LIMIT " . $role['limit'];
  }

  $result = mysqli_query($conn, $sql);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function query_find($table, $role = null)
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if ($role) {
    $sql .= " WHERE " . $role;
  }

  $result = mysqli_query($conn, $sql);

  $data = null;
  while ($row = mysqli_fetch_assoc($result)) {
    $data = $row;
  }

  return $data;
}

function query_insert($table, $data)
{
  global $conn;

  $colum = "";
  $value = "";
  $i = 1;
  foreach ($data as $col => $val) {
    $colum .= $col;
    $value .= "'" . $val . "'";
    if ($i != count($data)) {
      $value .= ", ";
      $colum .= ", ";
    }
    $i++;
  }
  unset($i);
  // echo "INSERT INTO $table ($colum) VALUES($value)";
  mysqli_query($conn, "INSERT INTO $table ($colum) VALUES($value)");
  return mysqli_affected_rows($conn);
}

function query_update($table, $data, $where)
{
  global $conn;

  $set = '';
  $i = 1;
  foreach ($data as $col => $val) {
    $set .= $col . " = '" . $val . "' ";
    if ($i != count($data)) {
      $set .= ", ";
    }

    $i++;
  }
  unset($i);

  $sql = "UPDATE $table SET $set WHERE $where";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function query_delete($table, $where)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM $table WHERE $where");
  return mysqli_affected_rows($conn);
}

function query_count($table, $role = [])
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if (isset($role['where'])) {
    $sql .= " WHERE " . $role['where'];
  }

  $result = mysqli_query($conn, $sql);

  return $result->num_rows;
}

function arrayWhere($table, $key, $role = [])
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if (isset($role['join'])) {
    $sql .= " JOIN " . $role['join'];
  }

  if (isset($role['where'])) {
    $sql .= " WHERE " . $role['where'];
  }

  if (isset($role['orderby'])) {
    $sql .= " ORDER BY " . $role['orderby'];
  }

  if (isset($role['limit'])) {
    $sql .= " LIMIT " . $role['limit'];
  }

  $result = mysqli_query($conn, $sql);
  $data = $result;

  $arrayWhere = [];

  foreach ($data as $i => $value) {
    $arrayWhere[$value[$key]][] = $value;
  }

  return $arrayWhere;
}


function validate(array $data)
{
  global $_POST;
  $validated = [];

  if (!isset($_SESSION['form'])) {
    $_SESSION['form'] = [];
  }

  foreach ($data as $key) {
    if (isset($_POST[$key]) && trim($_POST[$key]) != '') {
      $_SESSION['form'][$key] = htmlspecialchars($_POST[$key]);
    }
  }

  foreach ($data as $key) {
    if (isset($_POST[$key]) && trim($_POST[$key]) != '') {
      $validated[$key] = htmlspecialchars($_POST[$key]);
    } else {
      return false;
    }
  }

  return $validated;
}


function addPoints($id_user, $id_buku)
{

  // $cek = query_select("aktivitas", ["where" => "id_user = '$id_user' AND id_buku = '$id_buku'"]);

  // if (!$cek) {

    $buku = query_select("buku", ["where" => "id_buku = '$id_buku'"]);
    $poin = $buku[0]["poin"];

    $userProgress = query_select("progress", ["where" => "id_user = '$id_user'"]);
    $userPoin = $userProgress[0]["poin"];
    $userBookRead = $userProgress[0]["bookread"] + 1;
    $id_progress = $userProgress[0]["id_progress"];

    $userPoin += $poin;
    $newProgress = [
      "poin" => $userPoin,
      "bookread" => $userBookRead,
    ];

    if ($userPoin <= 100) {

      $level = 1;
      $persentase = ($userPoin * 100) / 100;

    } elseif ($userPoin <= 200) {

      $level = 2;
      $persentase = (($userPoin - 100) * 100) / 100;

    } elseif ($userPoin <= 300) {

        $level = 3;
      $persentase = (($userPoin - 200) * 100) / 100;


    } elseif ($userPoin <= 400) {

        $level = 4;
      $persentase = (($userPoin - 300) * 100) / 100;

    } else {

        $level = 5;
      $persentase = (($userPoin - 400) * 100) / 100;

    }

    $newProgress["persentase"] = $persentase;
    $newProgress["level"] = $level;

    query_update("progress", $newProgress, "id_progress = '$id_progress'");
    query_insert("aktivitas", [
      "id_user" => $id_user,
      "id_buku" => $id_buku,
      "poin_add" => $poin,
    ]);

    return true;

}