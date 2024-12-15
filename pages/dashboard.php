<?php
if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$username = $_SESSION["login"]['username'];
$id_user = $_SESSION["login"]['id_user'];

$progress = query_select("progress", ["where" => "id_user = '$id_user'"]);
$recentActivity = query_select("aktivitas", [
    "join" => "buku ON buku.id_buku = aktivitas.id_buku",
    "where" => "aktivitas.id_user = '$id_user'",
    "orderby" => "aktivitas.id_aktivitas DESC",
    "limit" => 3,
]);

$semuaBuku = query_count("buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    

</head>
<body class="bg-gray-100">

    <?php 
        require_once "navbar.php";
     ?>


    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold">Selamat Datang, <?php echo $username; ?>!</h2>
            <p class="mt-2">Ayo membaca lebih banyak buku dan tingkatkan level anda lebih tinggi !</p>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-center">Level Anda</h3>
            <div class="mt-4 text-center">
                <p class="text-4xl font-bold text-orange-500"><?= $progress[0]["level"] ?></p>
                <p class="text-lg">Anda berada di Level <?= $progress[0]["level"] ?> berdasarkan poin Anda: <?= $progress[0]["poin"] ?>.</p>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-center">Poin Anda</h3>
                <div class="mt-4 text-center">
                    <p class="text-6xl font-bold text-orange-500"><?= $progress[0]["poin"] ?></p>
                    <p class="text-lg">Dapatkan lebih banyak poin dengan membaca buku dan berpartisipasi dalam kegiatan!</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-center">Progress Anda</h3>
                <div class="mt-4">
                    <p class="text-center">Baca lebih banyak buku untuk naik level!</p>
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-orange-500 h-2.5 rounded-full" style="width: <?= $progress[0]["persentase"] ?>%"></div>
                        </div>
                        <p class="text-center mt-2"><?= $progress[0]["persentase"] ?>% Progress</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-center">Pencapaian</h3>
                <div class="mt-4 text-center">
                    <p class="font-bold">🎯 Milestone Terbaru Anda</p>
                    <div class="mt-4">
                        <p><strong>Level Capai:</strong> Level <?= $progress[0]["level"] ?></p>
                        <p><strong>Buku Dibaca:</strong> <?= $progress[0]["bookread"] ?> dari <?= $semuaBuku ?> Buku</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold">Aktivitas Terbaru</h3>
            <ul class="mt-4 space-y-2">

                <?php if ($recentActivity): ?>

                    <?php foreach ($recentActivity as $act): ?>

                        <li class="flex justify-between">
                            <span>Baca Buku: <strong><?= $act["judul"] ?></strong></span>
                            <span>+<?= $act["poin_add"] ?> Poin</span>
                        </li>
                        
                    <?php endforeach ?>

                <?php else : ?>
                    
                    <li class="flex justify-between">
                        <span>Belum ada aktivitas</span>
                    </li>
                <?php endif ?>


            </ul>
        </div>
    </div>

</body>
</html>
