
<style> 
  #content main {
    width: 80%;
    margin-left: auto;
    height: 100vh;
  }

  #sidebar {
  	width: 20%;
  }

  .sidebar-mobile {
		width: 50px;
		background: #fff;
		height: 100vh;
		position: fixed;
		left: 0;
		top: 0;
		display: none;
	}

	.sidebar-mobile button {
		width: 50px;
		height: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		margin-top: 10px;
		background: none;
		border: none;
		position: relative;
		box-sizing: border-box;
	}

	.sidebar-mobile button span {
		display: block !important;
		width: 30px;
		height: 4px;
		background: #f04642 !important;
		margin: 2px;
		border-radius: 2px;
		z-index: 777;
		box-sizing: border-box;

	}

	.navigasi-mobile {
			display: none !important;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			width: 100%;
			background: rgba(0, 0, 0, .7) !important;
			display: flex;
			height: 100vh;
			transform: translateX(-120vw);
			transition: 1s;
		}
		 .sidebar-mobile-navigasi {
		 	display: block !important;
		 	z-index: 777 !important;
		 	width: 40% !important;
		 }

		 .navigasi-mobile .brand .text {
		 	margin-left: -40px !important;
		 	font-size: 1rem !important;
		 }

		 .navigasi-mobile span.text {
		 	font-size: .75rem !important;
		 }

		 .right {
			width: 100%;
			height: 100vh;
			text-align: right;
			padding-right: 30px;
			padding-top: 10px;

		}

		.right button {
			background: none;
			color: #fff;
			padding: 10px;
			font-weight: 700;
			border-radius: 50%;
			width: 30px;
			height: 30px;
			line-height: 7px;
			border: none;
		}

	@media (max-width:  767px) {
		#content main .head-title .left h1 {
    	font-size: 1.7rem;
    }
     #content main {
    	width: 100%;
    	padding-left: 70px;
    	padding-top: 1rem;
    }

    section#sidebar {
    	display: none;
    }

    .sidebar-mobile {
    	display: block;
    }
	}

 @media (max-width: 576px) {

    #content main {
    	width: 100%;
    	padding-left: 70px;
    	padding-top: 1rem;
    }

    

    section#sidebar {
    	display: none;
    }

    .sidebar-mobile {
    	display: block;
    }

    .box-info {
    	display: block;
    }

    .box-info li {
    	width: 100%;
    	margin-bottom: 1rem;

    }

    .box-info li .text h3 {
    	font-size: 1.1rem;
    }

    .box-info li .text p {
    	font-size: 12px;
    }


    #content main .head-title .left h1 {
    	font-size: 1.5rem;
    }

    #content main .head-title {
    	font-size: .7rem;
    }

    #content main .table-container th {
    	font-size: 12px;
    	padding: 4px;
    }

    #content main .table-container td {
    	font-size: 12px;
    }

    #content main .table-container td img {
    	width: 40px;
    }

    .form-group label, .form-group input, .form-group textarea, .form-group select, .toggle-switch span, form button {
    	font-size: 12px;	
    }

  	.form-group {
  		margin-bottom: .1rem;
  	}

    .form-group small {
    	font-size: 10px;	
    	line-height: 4px;
    }


    #content main .btn-submit {
    	font-size: 12px;
    }

    .chart-row {
    	display: flex;
    	flex-direction: column;
    }

    .chart-row h3 {
			font-size: 1.1rem;
    }

    .chart-row .leaderboard-container {
    	width: 100%;
    }

    .chart-row .leaderboard-container span {
    	font-size: 12px;
    }

    .chart-row .chart-container {
    	width: 100%;
    }

    .navigasi-mobile {
    	display: block !important;
    }

    .navigasi-mobile.show {
    	transform: translateX(0);
    }

  }
</style>

<style>
	/*#sidebar {
		background: #f97217 !important;
	}

	#sidebar .side-menu.top li.active a {
  color: #fff !important;
	}

	#sidebar .side-menu.top li a {
  color: #fff !important;
	}

	#sidebar.side-menu li.active {
	  background: #f97217 !important;
	}

	#sidebar .side-menu li.active a {
	  background: #f97217 !important;
	}*/

	#sidebar .brand {
		color: #f04642 !important;
	}

	#sidebar .side-menu.top li.active a {
	  color: #f04642 !important;
	}

	#sidebar .side-menu.top li a:hover {
	  color: #f04642 !important;
	}

	#content main .head-title .left .breadcrumb li a.active {
	  color: #f04642 !important;
	}


	.btn-submit {
		background: #f04642 !important;	
	}

	thead th {
	  background-color: #f04642 !important;	
	  }
</style>
<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-library'></i>
			<span class="text">BookChase</span>
		</a>

		<ul class="side-menu top">
			<li class="<?= $hal == "index" ? "active" : "" ?>">
				<a href="<?= $baseUrl ?>/admin">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li class="<?= $hal == "input" ? "active" : "" ?>">
				<a href="<?= $baseUrl ?>/admin/input">
					<i class='bx bxs-plus-circle'></i>
					<span class="text">Input Koleksi</span>
				</a>
			</li>
			<li class="<?= $hal == "daftar" ? "active" : "" ?>">
				<a href="<?= $baseUrl ?>/admin/daftar">
					<i class='bx bxs-book-alt'></i>
					<span class="text">Daftar Koleksi</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="<?= $baseUrl ?>/admin/settings">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="<?= $baseUrl ?>/logout" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<style>	

	</style>

	<div class="sidebar-mobile">	
		<button onclick="handleShowNavbarMobile()">
			<span></span>
			<span></span>
			<span></span>
		</button>
	</div>

	<style>

		

	</style>

	<div class="navigasi-mobile">
		<section id="sidebar" class="sidebar-mobile-navigasi">
			<a href="#" class="brand">
				<i class='bx bxs-library'></i>
				<span class="text">BookChase</span>
			</a>

			<ul class="side-menu top">
				<li class="<?= $hal == "index" ? "active" : "" ?>">
					<a href="<?= $baseUrl ?>/admin">
						<i class='bx bxs-dashboard'></i>
						<span class="text">Dashboard</span>
					</a>
				</li>

				<li class="<?= $hal == "input" ? "active" : "" ?>">
					<a href="<?= $baseUrl ?>/admin/input">
						<i class='bx bxs-plus-circle'></i>
						<span class="text">Input Koleksi</span>
					</a>
				</li>
				<li class="<?= $hal == "daftar" ? "active" : "" ?>">
					<a href="<?= $baseUrl ?>/admin/daftar">
						<i class='bx bxs-book-alt'></i>
						<span class="text">Daftar Koleksi</span>
					</a>
				</li>
			</ul>

			<ul class="side-menu">
				<li>
					<a href="<?= $baseUrl ?>/admin/settings">
						<i class='bx bxs-cog'></i>
						<span class="text">Settings</span>
					</a>
				</li>
				<li>
					<a href="<?= $baseUrl ?>/logout" class="logout">
						<i class='bx bxs-log-out-circle'></i>
						<span class="text">Logout</span>
					</a>
				</li>
			</ul>
		</section>

		<div class="right">
			<button onclick="handleHiddenNavbarMobile()">x</button>
		</div>
	</div>


	<script>
		let show = false;
		const navigasiMobile = document.querySelector('.navigasi-mobile');
		const handleShowNavbarMobile = () => {
			navigasiMobile.classList.add('show');
		}

		const handleHiddenNavbarMobile = () => {
			navigasiMobile.classList.remove('show');
		}
	</script>

