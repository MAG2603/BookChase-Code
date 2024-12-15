<?php
if (!isset($_SESSION['login'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login");
    exit();
}

$data = query_select("progress", [
    "join" => "users on users.id_user = progress.id_user",
    "orderby" => "progress.poin DESC",
    "limit" => 10,
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
   <?php 
   require_once "navbar.php"
    ?>

    <!-- Leaderboard Section -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold">Leaderboard</h2>
            <p class="mt-2">Peringkat berdasarkan poin terbanyak.</p>
        </div>

        <!-- Daftar Pengguna -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md" style="overflow-x: auto;">
            <h3 class="text-xl font-semibold text-center">Top 10 Pengguna</h3>
            <table class="min-w-full mt-4 border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 text-left">Peringkat</th>
                        <th class="py-2 px-4 text-left">Username</th>
                        <th class="py-2 px-4 text-left">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)) : ?>
                        <tr>
                            <td colspan="3" class="text-center py-4">Tidak ada data pengguna.</td>
                        </tr>
                    <?php else: ?>
                        <?php $rank = 1; ?>
                        <?php foreach ($data as $user): ?>
                            <tr class="border-b">
                                <td class="py-2 px-4"><?php echo $rank++; ?></td>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($user['username']); ?></td>
                                <td class="py-2 px-4"><?php echo $user['poin']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
