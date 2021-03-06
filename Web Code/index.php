<?php
	include("PHP/db_connect.php");
	include("PHP/functions.php");
	include("PHP/save.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--Adjusting the page on mobile screen  -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title>Mix Maker</title>
	<!-- Bootstrap Core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/font-Monsterrat.css" rel="stylesheet" type="text/css">
	<link href='css/css-Kaushan.css' rel='stylesheet' type='text/css'>
	<link href='css/DroidSerif-font.css' rel='stylesheet' type='text/css'>
	<link href='css/RobotSlab-font.css' rel='stylesheet' type='text/css'>
	<!-- CSS -->
	<link href="css/jquery.mobile-1.4.5.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="css/themes/mixmakertheme.css" />
	<link href="css/agency.css" rel="stylesheet">
	<link href="css/jumbotron.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/MM.css" rel="stylesheet">
</head>

<body id="page-top" class="index" onload="">
	<!-- Home Page -->
	<div data-role="page" id="pageHome">
		<header style="background-color:#FFFCBA;">
			<img src="img/bannermix.png" alt="" align="center">
			<div class="box">
			</div>
		</header>
		<section id="portfolio" class="home" align="center">
			<div class="container" data-role="controlgroup">
				<div class="row">
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#preset" class="portfolio-link">
							<img src="img/preset.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Preset Drinks</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#custom" class="portfolio-link reset">
							<img src="img/custome.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Custom Drink</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#saved" class="portfolio-link">
							<img src="img/saved.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Saved Drinks</h4>
							<p class="text-muted"></p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- Preset -->
	<div data-role="page" id="preset">
		<header style="background-color:#FFFCBA;">
			<img src="img/bannermix.png" alt="" align="center">
			<div class="box">
			</div>
		</header>
		<section id="portfolio" style="background-color:powderblue;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#PresetModal1" class="portfolio-link" data-toggle="modal">
							<img src="img/Preset_Logo_1.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Big Jumble</h4>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#PresetModal2" class="portfolio-link" data-toggle="modal">
							<img src="img/Preset_Logo_2.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Lemon Wonder</h4>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#PresetModal3" class="portfolio-link" data-toggle="modal">
							<img src="img/Preset_Logo_3.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Pat's Purple Suspense</h4>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#PresetModal4" class="portfolio-link" data-toggle="modal">
							<img src="img/Preset_Logo_4.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Fruity Apple</h4>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#PresetModal5" class="portfolio-link" data-toggle="modal">
							<img src="img/Preset_Logo_5.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>FAU Deluxe</h4>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 portfolio-item">
						<a href="#PresetModal6" class="portfolio-link" data-toggle="modal">
							<img src="img/Preset_Logo_6.png" class="img-responsive" alt="">
							</a>
						<div class="portfolio-caption">
							<h4>Punch Paradise</h4>
						</div>
					</div>
					<div data-role="main" class="ui-content">
						<a href="#pageHome" class=" ui-icon-arrow-l ui-btn-icon-left"></a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- Custom -->
	<div data-role="page" id="custom">
		<header style="background-color:#FFFCBA;">
			<img src="img/bannermix.png" alt="" align="center">
			<div class="box">
			</div>
		</header>
		<div data-role="main" class="ui-content">
			<a href="#pageHome" class=" ui-icon-arrow-l ui-btn-icon-left"></a>
		</div>

		<body>
            <form method="post" action="PHP/save.php">
                <div class="container" id="sliders">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <h1>Custom Drink</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <h3 class="sliderlabel">Apple</h3>
                        </div>
                        <div class="col-sm-6 div-slider">
                            <input type="range" class="slider" id="slider1" value="0" min="0" max="100" data-highlight="true" data-theme="a" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <h3 class="sliderlabel">Fruit Punch</h3>
                        </div>
                        <div class="col-sm-6 div-slider">
                            <input type="range" class="slider" id="slider2" value="0" min="0" max="100" data-highlight="true" data-theme="b" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <h3 class="sliderlabel">Grape</h3>
                        </div>
                        <div class="col-sm-6 div-slider">
                            <input type="range" class="slider" id="slider3" value="0" min="0" max="100" data-highlight="true" data-theme="c" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <h3 class="sliderlabel">Lemonade</h3>
                        </div>
                        <div class="col-sm-6 div-slider">
                            <input type="range" class="slider" id="slider4" value="0" min="0" max="100" data-highlight="true" data-theme="d" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-3 text-center">
                            <button type="button" class="btn btn-primary" id="save" data-theme="e">Save</button>
                        </div>
                        <div class="col-sm-2 text-center">
                            <button type="button" class="btn btn-primary" id="Randomize" data-theme="g">Randomize</button>
                        </div>
                        <div class="col-sm-2 text-center">
                            <button type="button" class="btn btn-primary reset" data-theme="e">Reset</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <audio id="audio" src="sounds/Bubbles_Sound_Effect.mp3" autostart="false" ></audio>
                            <button type="button" class="btn btn-primary" id="MakeDrinkSlider" data-theme="f">Make Drink</button>
                        </div>
                    </div>
                </div>
            </form>
		</body>
	</div>
	<!-- Saved -->
	<div data-role="page" id="saved">
		<header style="background-color:#FFFCBA;">
			<img src="img/bannermix.png" alt="" align="center">
			<div class="box">
			</div>
		</header>
		<section id="portfolio" style="background-color:powderblue;">
			<div class="container">
				<div class="row">
					<?php echo getDrinks($db); ?>
					<div data-role="main" class="ui-content">
						<a href="#pageHome" class=" ui-icon-arrow-l ui-btn-icon-left"></a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- Preset Modals -->
	<!-- Preset Modal 1 -->
	<div class="portfolio-modal modal" id="PresetModal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<!-- Drink Details Go Here -->
								<div class="row">
									<h2>Big Jumble</h2>
								</div>
								<div class="row">
									<img class="img-centered" height="250" src="img/Preset_Logo_1.png" alt="">
								</div>
								<div class="row">
									<p>
										<strong>Drink Description</strong>
									</p>
									<p>
										Have a taste of the rainbow with this great, highly mixed drink and enjoy a huge variety of flavor that will make your taste buds go wild.
									</p>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="MakeDrink(25, 25, 25, 25)" data-theme="f">Make Drink</button>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
									   <button class="btn btn-primary ui-btn ui-btn-e ui-shadow ui-corner-all" data-dismiss="modal" data-theme="e"><i class="fa fa-times"></i> Back</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Preset Modal 2 -->
	<div class="portfolio-modal modal" id="PresetModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<!-- Drink Details Go Here -->
								<div class="row">
									<h2>Lemon Wonder</h2>
								</div>
								<div class="row">
									<img class="img-centered" height="250" src="img/Preset_Logo_2.png" alt="">
								</div>
								<div class="row">
									<p>
										<strong>Drink Description</strong>
									</p>
									<p>
										Enjoy this lemon packed drink with a zest of punch and a tangy grape flavor the whole family will love on a hot day.
									</p>
								</div>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="MakeDrink(0, 35, 20, 45)" data-theme="f">Make Drink</button>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
									   <button class="btn btn-primary ui-btn ui-btn-e ui-shadow ui-corner-all" data-dismiss="modal" data-theme="e"><i class="fa fa-times"></i> Back</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Preset Modal 3 -->
	<div class="portfolio-modal modal" id="PresetModal3" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<!-- Drink Details Go Here -->
								<div class="row">
									<h2>Pat's Purple Suspense</h2>
								</div>
								<div class="row">
									<img class="img-centered" height="250" src="img/Preset_Logo_3.png" alt="">
								</div>
								<div class="row">
									<p>
										<strong>Drink Description</strong>
									</p>
									<p>
										Go crazy for this drink with the best grape flavor you have ever tasted and still get a little bit of the other flavors for some extra kick.
									</p>
								</div>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="MakeDrink(10, 10, 75, 5)" data-theme="f">Make Drink</button>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
									   <button class="btn btn-primary ui-btn ui-btn-e ui-shadow ui-corner-all" data-dismiss="modal" data-theme="e"><i class="fa fa-times"></i> Back</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Preset Modal 4 -->
	<div class="portfolio-modal modal" id="PresetModal4" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<!-- Drink Details Go Here -->
								<div class="row">
									<h2>Fruity Apple</h2>
								</div>
								<div class="row">
									<img class="img-centered" height="250" src="img/Preset_Logo_4.png" alt="">
								</div>
								<div class="row">
									<p>
										<strong>Drink Description</strong>
									</p>
									<p>
										Make this drink your new favorite fruity blend of punch and apple taste without having anything too sour.
									</p>
								</div>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="MakeDrink(50, 50, 0, 0)" data-theme="f">Make Drink</button>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
									   <button class="btn btn-primary ui-btn ui-btn-e ui-shadow ui-corner-all" data-dismiss="modal" data-theme="e"><i class="fa fa-times"></i> Back</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Preset Modal 5 -->
	<div class="portfolio-modal modal" id="PresetModal5" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<!-- Drink Details Go Here -->
								<div class="row">
									<h2>FAU Deluxe</h2>
								</div>
								<div class="row">
									<img class="img-centered" height="250" src="img/Preset_Logo_5.png" alt="">
								</div>
								<div class="row">
									<p>
										<strong>Drink Description</strong>
									</p>
									<p>
										Grab a cup of this amazing, flavorful drink that has everything except for that apple taste.
									</p>
								</div>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="MakeDrink(0, 45, 35, 20)" data-theme="f">Make Drink</button>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
									   <button class="btn btn-primary ui-btn ui-btn-e ui-shadow ui-corner-all" data-dismiss="modal" data-theme="e"><i class="fa fa-times"></i> Back</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Preset Modal 6 -->
	<div class="portfolio-modal modal" id="PresetModal6" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<!-- Drink Details Go Here -->
								<div class="row">
									<h2>Punch Paradise</h2>
								</div>
								<div class="row">
									<img class="img-centered" height="250" src="img/Preset_Logo_6.png" alt="">
								</div>
								<div class="row">
									<p>
										<strong>Drink Description</strong>
									</p>
									<p>
										This drink is a classic favorite if you love fruit punch with a little bit of that apple and grape taste that everyone loves.
									</p>
								</div>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="MakeDrink(20, 60, 20, 0)" data-theme="f">Make Drink</button>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
									   <button class="btn btn-primary ui-btn ui-btn-e ui-shadow ui-corner-all" data-dismiss="modal" data-theme="e"><i class="fa fa-times"></i> Back</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Saved Modals -->
	<?php echo getDrinkModals($db); ?>
	<!-- Scripts -->
	<script src="scripts/jquery-1.12.4.js"></script>
	<script src="scripts/jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Custom Scripts -->
	<script src="scripts/functions.js"></script>
	<!-- Plugin JavaScript -->
	<script src="scripts/jquery.easing.min.js" crossorigin="anonymous"></script>
	<!-- Theme JavaScript -->
	<script src="scripts/agency.js"></script>
</body>

</html>
