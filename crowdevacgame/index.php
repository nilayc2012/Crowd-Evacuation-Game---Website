<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicons-r.gif?v=1.0"> 

    <title>Crowd Evac - Mystic Studios</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/popup.css" rel="stylesheet">

    <!-- Custom Fonts -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="/">Mystic Studios</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
		<?php
			if(!isset($_SESSION['uname']))
			{
		?>
                    <li>
                        <a class="page-scroll" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
		<?php
		}
		else
		{
		?>
                    <li>
                        <a class="page-scroll" href="#" data-toggle="modal" data-target="#logout-modal"><?php echo $_SESSION['fname'] ?> </a>
                    </li>
		<?php
		}
		?>
                    <li>
                        <a class="page-scroll" href="#services">Features</a>
                    </li>
<?php if($_SESSION["uname"] === "admin")
{
?>		<li>
		<a class="page-scroll" href="http://spanky.rutgers.edu/crowdevacgame/logs.php">User Study Logs</a>
                </li>    

<?php
}
?>
		<li>
                        <a class="page-scroll" href="#portfolio">Screenshots</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#demo">Demo</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action="http://spanky.rutgers.edu/crowdevacgame/weblogin.php" method="post">
					<input type="text" name="uname" placeholder="Username" required data-validation-required-message="Please enter your username.">
					<input type="password" name="pwd" placeholder="Password" required data-validation-required-message="Please enter your password.">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				</div>
			</div>
</div>



					
<?php
if(isset($_SESSION['response'])){
?>
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
<h4><?php echo $_SESSION['response'] ?></h4><br>
 <form action="" method="get">
	<input type="submit" name="login" class="login loginmodal-submit" value="Ok">
</form>
</div>					
</div>
<?php
unset($_SESSION['response']);
}
?>



<div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Log Out ?</h1><br>
				  <form action="http://spanky.rutgers.edu/crowdevacgame/logout.php" method="post">
					<input type="submit" name="login" class="login loginmodal-submit" value="Log Out">
				  </form>
					
				</div>
			</div>
</div>

<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Create Your Account</h1><br>
				  <form action="http://spanky.rutgers.edu/crowdevacgame/webregister.php" method="post">
					<input type="email" name="uname" placeholder="Username" required data-validation-required-message="username">
					<input type="password" name="pwd" placeholder="Password" required data-validation-required-message="password">
					<input type="password" name="cpwd" placeholder="Confirm Password" required data-validation-required-message="password">
					<input type="text" name="fname" placeholder="First Name" required data-validation-required-message="fname">
					<input type="text" name="lname" placeholder="Last Name" required data-validation-required-message="lname">
					<input name="age" placeholder="Age" required data-validation-required-message="age." type="number" min="10" max="100">
					<input type="submit" name="login" class="login loginmodal-submit" value="Register">
				  </form>
					
				</div>
			</div>
</div>
    <!-- Header -->
    <header>
    	<div style="background-color: rgba(0, 0, 0, .5);">
	        <div class="container">
	            <div class="intro-text">
	                <div class="intro-heading">Welcome To Crowd Evacuation Games!</div>
			<?php
			if(!isset($_SESSION['uname']))
			{
			?>
	                <a href="#" class="page-scroll btn btn-xl" data-toggle="modal" data-target="#register-modal">Sign Up</a>
			<?php
			}
			else
			{
			if($_SESSION['uname']==='admin')
			{?>
			<a href="http://spanky.rutgers.edu/crowdevacgame/game.html" class="page-scroll btn btn-xl">Play The Game</a>
			<?php
			}
			else
			{
			?>
			<a href="http://spanky.rutgers.edu/crowdevacgame/game.html" class="page-scroll btn btn-xl">Play The Game</a>
			<?php
			}}
			?>
	            </div>
	        </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Features</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-hourglass-1 fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Challenge Yourself</h4>
                    <p class="text-muted">Guide your agents to safety as quickly as possible!</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-building fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Iterate</h4>
                    <p class="text-muted">Make various structural changes to find the evacuation strategy that works best for you.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-heart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Give Back</h4>
                    <p class="text-muted">Contribute to the greater cause of improvde building design and evacaution strategy awareness.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Screenshots Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Screenshots</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    <img src="img/screens/1.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Start menu</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    <img src="img/screens/2.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Level one</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    <img src="img/screens/3.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Level two</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    <img src="img/screens/4.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Place walls in the environment</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    <img src="img/screens/5.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Generate a heatmap</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    <img src="img/screens/6.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Help the agents escape</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="demo">
    	<div class="container" style="text-align: center;">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Demo</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-sm-6 portfolio-item videos">
    				<iframe width="713" height="536" src="https://www.youtube.com/embed/yAe_jbeSB_w" frameborder="0" allowfullscreen></iframe>
				</div>
                <div class="col-md-6 col-sm-6 portfolio-item videos">
    				<iframe width="713" height="536" src="https://www.youtube.com/embed/t03IHbjlbxo" frameborder="0" allowfullscreen></iframe>
				</div>
                <div class="col-md-6 col-sm-6 portfolio-item videos">
    				<iframe width="713" height="536" src="https://www.youtube.com/embed/YOw0LohRA9k" frameborder="0" allowfullscreen></iframe>
				</div>
                <div class="col-md-6 col-sm-6 portfolio-item videos">
    				<iframe width="713" height="536" src="https://www.youtube.com/embed/vDCv-OxO2jo" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
    	</div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Meet the people that made this game possible.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/nilay.png" class="img-responsive img-circle" alt="">
                        <h4>Nilay Chakraborty</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/tanvi.png" class="img-responsive img-circle" alt="">
                        <h4>Tanvi Borkar</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/maxim.png" class="img-responsive img-circle" alt="">
                        <h4>Maxim Torubarov</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/tom.png" class="img-responsive img-circle" alt="">
                        <h4>Thomas Piccirello</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl" id="contactSubmitBtn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Mystic Studios 2016</span>
                </div>
                <script>
                /*
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                */
                </script>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <img class="img-responsive img-centered" src="img/screens/1_Full.JPG" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <img class="img-responsive img-centered" src="img/screens/2_Full.JPG" alt="">
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <img class="img-responsive img-centered" src="img/screens/3_Full.JPG" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <img class="img-responsive img-centered" src="img/screens/4_Full.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <img class="img-responsive img-centered" src="img/screens/5_Full.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <img class="img-responsive img-centered" src="img/screens/6_Full.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
	
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

    <script>
		$(function() {

			// Find all YouTube videos
			var $allVideos = $("iframe[src^='https://www.youtube.com']"),

		    // The element that is fluid width
		    $fluidEl = $("#demo .videos");

			// Figure out and save aspect ratio for each video
			$allVideos.each(function() {

				$(this)
					.data('aspectRatio', this.height / this.width)
					
					// and remove the hard coded width/height
					.removeAttr('height')
					.removeAttr('width');

			});

			// When the window is resized
			// (You'll probably want to debounce this)
			$(window).resize(function() {

				var newWidth = $fluidEl.width();
				
				// Resize all videos according to their own aspect ratio
				$allVideos.each(function() {

					var $el = $(this);
					$el
						.width(newWidth)
						.height(newWidth * $el.data('aspectRatio'));

				});

			// Kick off one resize to fix all videos on page load
			}).resize();

		});
    </script>

</body>

</html>
