<?php require_once dirname(__FILE__) .'/config.php';?>
<!DOCTYPE HTML>
<!--
	Read Only by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Kalkulatory</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><img src="images/malpa.png" alt="" /></span>
					<h1 id="logo"><a href="#">Kamil Połacik</a></h1>
					<p>Aplikacje internetowe<br />
					Laboratoria 3</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one" class="active">Start</a></li>
						<li><a href="#two">Kalkulator</a></li>
						<li><a href="#three">Kalkulator kredytowy</a></li>
					</ul>
				</nav>
				<footer>
					<ul class="icons">
						<li><a href="https://github.com/kvm11l/Aplikacje-Internetowe-zzAI-laboratoria" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="https://github.com/kvm11l/Aplikacje-Internetowe-zzAI-laboratoria" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="https://github.com/kvm11l/Aplikacje-Internetowe-zzAI-laboratoria" class="icon brands fa-github"><span class="label">Github</span></a></li>
					</ul>
				</footer>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="image main" data-position="center">
									<img src="images/tlo.jpg" alt="" />
								</div>
								<div class="container">
									<header class="major">
										<h2>Kalkulatory</h2>
										<p>Wykonywanie obliczeń jeszcze nie było tak proste. Na stronie jest do wyboru:<br />
									</header>
									<p> <a href="#two"> Kalkulator</a> - wykonywanie podstawowych obliczeń matematycznych, takich jak dodawanie, odejmowanie, mnożenie i dzielenie.</p>
									<p> <a href="#three">Kalkulator kredytowy </a> - szacowanie wysokości raty kredytu i całkowitego kosztu zobowiązania na podstawie wprowadzonych danych, takich jak kwota, okres spłaty i oprocentowanie w skali roku.</p>
								</div>
							</section>
						<!-- two -->
							<section id="two">
								<div class="container">
									<?php
									// Dołącz kontroler podstawowego kalkulatora
									include _ROOT_PATH.'/app/calc_basic.php';
									?>
								</div>
							</section>
							
						<!-- three -->
							<section id="three">
								<div class="container">
									<?php
									// Dołącz kontroler kalkulatora
									include _ROOT_PATH.'/app/calc.php';
									?>
								</div>
							</section>

				<!-- Footer -->
					<section id="footer">
						<div class="container">
							<ul class="copyright">
								<li>Kamil Połacik</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>