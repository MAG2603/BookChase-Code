<?php 
session_start();

include "pages/koneksi.php"; // Menghubungkan ke database

$url = isset($_GET["url"]) ? $_GET["url"] : "";
$urlParts = explode("/", $url);

$method = $_SERVER['REQUEST_METHOD'];

$urls = explode("/", $_SERVER["REQUEST_URI"]);
$baseUrl = "/$urls[1]";
// $baseUrl = "/2024/$urls[2]";

if (!empty($urlParts)) {

	$mainUrl = isset($urlParts[0]) ? $urlParts[0] : "";
	$aksi = isset($urlParts[1]) ? $urlParts[1] : "";
	// $aksi_kedua = isset($urlParts[1]) ? $urlParts[1] : "";

	if ($mainUrl == "login") {

		require "pages/login.php";
		die;

	} else if ($mainUrl == "register") {

		require "pages/register.php";
		die;

	} else if ($mainUrl == "logout") {

		session_unset();
		session_destroy();
		$urlLogin = "/$urls[1]/login";
		// $urlLogin = "/2024/$urls[2]/login";
		header("location: $urlLogin"); // Redirect ke halaman login
		die;

	} else if ($mainUrl == "dashboard") {

		require "pages/dashboard.php";
		die;

	} else if ($mainUrl == "book") {

		require "pages/book.php";
		die;

	} else if ($mainUrl == "book-detail") {

		require "pages/book-detail.php";
		die;

	}  else if ($mainUrl == "leaderboard") {

		require "pages/leaderboard.php";
		die;

	} else if ($mainUrl == "admin") {

		$urlLoginAdmin = "/$urls[1]/admin/login";
		// $urlLoginAdmin = "/2024/$urls[2]/admin/login";

		if ($aksi == "login") {

			require "pages/login-admin.php";
			die;

		} else if ($aksi == "") {

			require "pages/admin/index.php";
			die;

		} else if ($aksi == "input") {

			require "pages/admin/input.php";
			die;

		} else if ($aksi == "daftar") {

			require "pages/admin/daftar.php";
			die;

		} else if ($aksi == "edit") {

			require "pages/admin/edit.php";
			die;

		} else if ($aksi == "hapus") {

			$id = $_GET["id"];
			query_delete("buku", "id_buku = '$id'");
			header("location: daftar");
			die;

		} else if ($aksi == "settings") {

			require "pages/admin/settings.php";
			die;

		} else {

			header("location: $urlLoginAdmin"); // Redirect ke halaman 
			die;

		}

	}

	 else {
			header("location: login");
			die;
		}

}  