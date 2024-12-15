<?php 
if (!isset($_SESSION['admin'])) {
  header("location: $urlLoginAdmin");
  die;
}

$hal = "index";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style-admin.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<title>Admin Dashboard</title>
	<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #F5F5F7;
    }

    .box-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        gap: 30px;
    }

    .box-info li {
        flex: 1;
        background: #fff;
        padding: 15px 20px;
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .box-info li i {
        font-size: 2rem;
        color: #4CAF50;
    }

    .box-info li .text h3 {
        margin: 0;
        font-size: 1.5rem;
    }

    .box-info li .text p {
        margin: 0;
        font-size: 0.9rem;
        color: #666;
    }

    .chart-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 20px;
    }

    .chart-container, .leaderboard-container {
        width: 48%; /* Memberikan lebar yang sama antara chart dan leaderboard */
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .chart-container canvas {
        width: 100% !important;
        height: auto !important;
    }

    h3 {
        margin-bottom: 15px;
        color: #333;
        font-size: 1.2em;
    }

    /* Leaderboard styles */
    .leaderboard-container {
        padding-right: 20px;
    }

    .leaderboard h3 {
        margin-bottom: 20px;
        font-size: 1.5em;
    }

    .leaderboard ul {
        list-style: none;
        padding: 0;
    }

    .leaderboard li {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .leaderboard li:last-child {
        border-bottom: none;
    }

    .leaderboard li .rank {
        font-weight: bold;
    }

    .leaderboard li .score {
        color: #4CAF50;
    }
	</style>
</head>
<body>
	<!-- SIDEBAR -->
	<?php 
	require_once "sidebar.php";
	 ?>
	<!-- END SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>

				</div>
			</div>

            <style> 
            </style>

			<ul class="box-info">
				<li>
					<i class='bx bxs-bar-chart-alt-2'></i>
					<span class="text">
						<h3>250</h3>
						<p>Pengunjung Harian</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3>1,200</h3>
						<p>Jumlah Pengguna</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-book'></i>
					<span class="text">
						<h3>850</h3>
						<p>Total Koleksi</p>
					</span>
				</li>
			</ul>
			<div class="chart-row">
				<div class="leaderboard-container">
					<h3>Leaderboard</h3>
					<ul class="leaderboard">
						<li><span class="rank">1</span><span>Aprilita</span><span class="score">5000</span></li>
						<li><span class="rank">2</span><span>Affan</span><span class="score">4500</span></li>
						<li><span class="rank">3</span><span>Denisya</span><span class="score">4000</span></li>
						<li><span class="rank">4</span><span>Inez</span><span class="score">3500</span></li>
						<li><span class="rank">5</span><span>Budi</span><span class="score">3000</span></li>
					</ul>
				</div>
				
				
				<div class="chart-container">
                    <h3>Statistik Pengunjung</h3>
                    <canvas id="visitorStatsChart"></canvas>
                </div>

    <script>
        const ctxVisitorStats = document.getElementById('visitorStatsChart').getContext('2d');
        const visitorStatsChart = new Chart(ctxVisitorStats, {
        type: 'bar',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'], 
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: [150, 230, 180, 220, 250, 190, 300], 
                backgroundColor: [
                    '#FFB3BA', 
                    '#FFDFBA', 
                    '#FFFFBA', 
                    '#BAFFC9', 
                    '#BAE1FF', 
                    '#FFB6C1', 
                    '#D6B3FF'  
                ],
                borderColor: [
                    '#FFB3BA', 
                    '#FFDFBA', 
                    '#FFFFBA', 
                    '#BAFFC9', 
                    '#BAE1FF', 
                    '#FFB6C1', 
                    '#D6B3FF'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50
                    }
                }
            }
        }
    });
	</script>
</body>
</html>