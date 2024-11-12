
<?php
// Database connection (replace with your actual database connection details)
include './db.connection/db_connection.php';

// Get blog ID from URL
$blog_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($blog_id > 0) {
  // Fetch blog data
  $stmt = $conn->prepare("SELECT title, main_content, full_content, title_image, main_image, video FROM blogs WHERE id = ?");
  $stmt->bind_param("i", $blog_id);
  $stmt->execute();
  $stmt->bind_result($title, $main_content, $full_content, $title_image, $main_image, $video);
  $stmt->fetch();
  $stmt->close();
} else {
  echo "Invalid blog ID.";
  exit;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="title" content="Contact Dr. Subhash's Plastic Surgery Clinic in Kakinada | Schedule Your Consultation Today"
	>
	<meta name="description" content="Get in touch with Dr. Subhash's Plastic Surgery in Kakinada. Schedule a consultation with our expert team for personalized advice on cosmetic and reconstructive procedures. Reach out today to embark on your journey towards transformative and aesthetic enhancements."
	>
	<meta name="keywords" content="best plastic surgery in kakinada	
	best plastic surgery hospitals in kakinada	
	best plastic surgeon in kakinada	
	plastic surgeon in kakinada	
	">
	 
	<meta name="author" content="websmirno.site">
	<meta name="format-detection" content="telephone=no">
	<title>Center for Plastic Surgery | Dr.P.S Subhash</title>
	<!-- Stylesheets -->
	<link href="vendor/slick/slick.css" rel="stylesheet">
	<link href="vendor/animate/animate.min.css" rel="stylesheet">
	<link href="icon-styles/style.css" rel="stylesheet">
	<link href="vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  	<link href="color/color.css" rel="stylesheet">
	<!--Favicon-->
	<link rel="icon" href="images/content/Subhash.webp" type="image/x-icon">
	<!-- Google Fonts -->
	<link href="fonts.googleapis.com/css9425.css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	<link href="fonts.googleapis.com/cssd5a5.css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<!-- Google map -->
	<script src="maps.googleapis.com/maps/api/js0333?key=AIzaSyCiFdr5Z0WRIXKUOqoRRvzRQ5SkzhkUVjk"></script>
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="shop-page layout-landing">
	
<!--header-->	
	<!-- <div class="settings-panel">
		<div class="settings-panel-buy-now">
			<a href="themeforest.net/item/medin-medical-clinic-html-template/225644381cdb.html?s_rank=1" target="_blank" class="settings-panel-btn btn-primary">
				<img src="color/icon-cart.png" alt=""> Purchase Now
			</a>
		</div>
		<div class="settings-panel-colorswatch js-settings-panel-item">
			<div class="settings-panel-btn btn-primary js-settings-panel-btn">
				<img src="color/icon-settings.png" alt="">
			</div>
			<div class="settings-panel-inside">
				<a href="#" class="colorswatch1 active js-swatch-color"></a>
				<a href="#" class="colorswatch2 js-swatch-color" data-color="1"></a>
				<a href="#" class="colorswatch3 js-swatch-color" data-color="2"></a>
				<a href="#" class="colorswatch4 js-swatch-color" data-color="3"></a>
				<a href="#" class="colorswatch5 js-swatch-color" data-color="4"></a>
				<a href="#" class="colorswatch6 js-swatch-color" data-color="5"></a>
				<div class="clearfix"></div>
				<div class="title">Color</div>
			</div>
		</div>
		<div class="settings-panel-layout js-settings-panel-item">
			<div class="settings-panel-btn btn-primary js-settings-panel-btn">
				<img src="color/icon-layout.png" alt="">
			</div>
			<div class="settings-panel-inside">
				<a href="http://websmirno.site/medin/html/dentco-html/"><img src="color/screen-layout-1.png" alt=""></a>
				<a href="http://websmirno.site/medin/html/surgery-html/"><img src="color/screen-layout-2.png" alt=""></a>
				<a href="http://websmirno.site/medin/html/medol-html/"><img src="color/screen-layout-3.png" alt=""></a>
        <a href="index.html" class="active"><img src="color/screen-layout-4.png" alt=""></a>        <a href="http://websmirno.site/medin/html/medeye-html/"><img src="color/screen-layout-5.png" alt=""></a>
        <a href="http://websmirno.site/medin/html/medlab-html/"><img src="color/screen-layout-6.png" alt=""></a><a href="http://websmirno.site/medin/html/weightloss-html/"><img src="color/screen-layout-7.png" alt=""></a>
			</div>
		</div>
	</div> -->
<!--header-->

<header class="header">
	<div class="header-quickLinks js-header-quickLinks d-lg-none">
		<div class="quickLinks-top js-quickLinks-top"></div>
		<div class="js-quickLinks-wrap-m">
		</div>
	</div>
	<div class="header-topline d-none d-lg-flex">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-auto d-flex align-items-center">
					<!-- <div class="header-info"><i class="icon-placeholder2"></i>2-30-1, Second Floor, Suruchi Sweets Building,<br>Beside Padmapriya Complex, Kakinada</div> -->
					<div class="header-phone"><i class="icon-telephone"></i><a href="tel:9989802260">9989802260</a>,
						<a href="tel:9010236663">9010236663</a>,<a href="tel:8885111587">8885111587</a>
					</div>
					<div class="header-info"><i class="icon-black-envelope"></i><a
							href="mailto:drsubhashplasticsurgeon@gmail.com">drsubhashplasticsurgeon@gmail.com</a>
					</div>
				</div>
				<div class="col-auto ml-auto d-flex align-items-center">
					<span class="header-social">
						<a href="https://www.facebook.com/profile.php?id=100076796080517" target="blank"
							class="hovicon"><i class="fab fa-facebook-f pr-2"></i></a>
						<a href="https://www.instagram.com/for_beayoutiful_you/" target="blank" class="hovicon"><i
								class="fab fa-instagram pr-2"></i></a>
						<a href="https://www.youtube.com/@drsubhashplasticsurgeon" target="blank" class="hovicon"><i
								class="fab fa-youtube"></i></a>

					</span>



				</div>
			</div>
		</div>
	</div>
	<div class="header-content" style="background-color: #ffee9a;">
		<div class="container">
			<div class="row align-items-lg-center">
				<button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
					<span class="icon-menu"></span>
				</button>
				<div class="col-lg-auto col-lg-2 d-flex align-items-lg-center">
					<a href="index.html" class="header-logo"><img src="images/homepage/logo_best_plastic_surgery_hospitals_in_kakinada.png" alt="logo" class="img-fluid"></a>
				</div>
				<div class="col-lg ml-auto header-nav-wrap">
					<div class="header-nav js-header-nav">
						<nav class="navbar navbar-expand-lg btco-hover-menu ">
							<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link link-inside" href="./index.html">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link link-inside" href="./about.html">About Us</a>
									</li>
									<li class="nav-item">
										<a class="nav-link link-inside" href="./services.html">Services</a>
									</li>
									<li class="nav-item">
										<a class="nav-link link-inside" href="./gallery.html">Gallery</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link link-inside" href="https://rinasolutions.in/doctors/kakinada/doctor-details.php?tid=17" target="_blank">Book Appointment</a>
									</li> -->
									<li class="nav-item">
										<a class="nav-link link-inside" href="./contact.html">Contact</a>
									</li>
									<li class="nav-item">
										<a class="nav-link link-inside" href="blogs.php">Blogs</a>
									</li>
									<li class="nav-item">
										<a class="nav-link link-inside" href="machenary.html">Machinery</a>
									</li>
									<li class="nav-item">  
										<a href="https://rinasolutions.in/doctors/kakinada/doctor-details.php?tid=17" target="_blank" class="btn btn-xs btn-gradient pb-1 pt-1 "></i><span>Book Appointment</span></i></a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
					<!-- <div class="header-search">
						<form action="#" class="form-inline">
							<i class="icon-search"></i>
							<input type="text" placeholder="Search">
							<button type="submit"><i class="icon-search"></i></button>
						</form>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</header>

<!--//header-->


<!--section contact-->

<!-- <div class="section" id="contactSection" style="margin: 0px; padding: 40px 0px 0px 0px !important; background:#fff">
    <div class="banner-contact-us">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-6 col-lg-6 order-2 order-sm-1 mt-3 mt-md-0 text-center text-md-right d-flex align-items-end">
                    <img src="images/homepage/get_in_touch.png" alt="banner-callus" class="img-fluid">
                </div>
                <div class="col-sm-6 col-lg-6 order-1 order-sm-2 d-flex">
                    <div class="pt-2 pt-lg-6">
                        <h2 data-title=""><span> <br class="d-lg-none">  <span class="theme-color"></span></span></h2>
                        <h2>Contact US..</h2>
                        <p>We believe in providing the best possible care to all our existing patients and welcome new patients to sample.</p>
                        <form class="contact-form" id="contactForm"  method="post" novalidate="novalidate">
                            <div class="successform">
                                <p>Your message was sent successfully!</p>
                            </div>
                            <div class="errorform">
                                <p>Something went wrong, try refreshing and submitting the form again.</p>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="name" placeholder="Your name*">
                            </div>
                            <div class="row row-sm-space mt-15">
                                <div class="col-sm-6"><input type="text" class="form-control" name="phone" placeholder="Your Phone"></div>
                                <div class="col-sm-6 mt-15 mt-sm-0"><input type="text" class="form-control" name="email" placeholder="Email*"></div>
                            </div>
                            <div class="mt-15">
                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="mt-2 mt-lg-4 text-center text-md-left">
                                <button type="submit" class="btn"><i class="icon-right-arrow"></i><span>Send request</span><i class="icon-right-arrow"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br> -->

<main>
    <!-- ======= Blogs Section ======= -->
    <!-- <div class="page-header bg-more-light tittle-image">
            <?php
            if (!empty($title_image)) {
              $title_image_path = "./admin/uploads/photos/{$title_image}";
              echo "<img class='img-fluid img_sts' src='{$title_image_path}' style='width: 3000px;  ' alt='Title Image'>";
            } else {
              echo "<img class='img-fluid img_sts' src='assets/images/title images2/Deep_vein_thrombosis_title_image_one_stop_vascular_solutions.webp' style='width: 3000px;' alt='Deep_vein_thrombosis_title_image_one_stop_vascular_solutions'>";
            }
            ?>
        </div> -->

    <div class="container blog-detailed blog-detailed-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
      <div class="row">
        <div class="col-lg-8 offset-lg-0 col-sm-8 offset-sm-2 col-10 offset-1 order-lg-1">
          <div class="blog-content">
            <h4 class="blog-title tittle ls-n-20" style="color: #283779; font-weight:800"><?php echo htmlspecialchars($title); ?></h4>

            <p class="main-content" style="text-align: justify;">
              <?php echo $main_content; ?>
            </p>

            <?php
            // Check if video is available
            if (!empty($video)) {
              $video_path = "./admin/uploads/videos/{$video}";
              echo "<video class='main-video img-fluid' controls>
                    <source src='{$video_path}' type='video/mp4'>
                    Your browser does not support the video tag.
                  </video>";
            }
            // If no video, display the image
            elseif (!empty($main_image)) {
              $main_image_path = "./admin/uploads/photos/{$main_image}";
              echo "<img class='main-image img-fluid blog_main_img' src='{$main_image_path}'  alt='Main Image'>";
            }
            ?>

            <div class="full-content">
              <?php echo $full_content; ?>
            </div>
          </div>
        </div>




        <div class="col-lg-4 offset-lg-0 col-sm-8 offset-sm-2 col-10 offset-1 order-lg-2">
          <div class="side-bar">


            <div class="row scrollable-row" style="max-height: 700px; overflow-y: auto;  overflow-x:hidden">
              <?php
              // Fetch all blog data for sidebar
              $conn = new mysqli($servername, $username, $password, $dbname); // Re-establish connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, title, main_image FROM blogs ORDER BY created_at DESC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $sidebar_image_path = !empty($row['main_image']) ? "./admin/uploads/photos/{$row['main_image']}" : "https://mailrelay.com/wp-content/uploads/2018/03/que-es-un-blog-1.png";
                  $title = strlen($row['title']) > 20 ? substr($row['title'], 0, 50) . '...' : $row['title'];

                  echo "
                      <div class='col-5 background_sidebar mb-3'>
                          <figure>
                              <img src='{$sidebar_image_path}' class='w-100 height-auto mt-3 ' alt='Blog Image'>
                          </figure>
                      </div>
                      <div class='col-7   background_sidebar d-flex flex-column justify-content-center mb-3'>
                          <a href='fullblog.php?id={$row['id']}'>
                              <p class='blog-card-text'>{$title}</p>
                          </a>
                      </div>";
                }
              } else {
                echo "<p>No blog posts found.</p>";
              }
              $conn->close();
              ?>
            </div>



          </div>
        </div>


      </div>
    </div>

  </main>


<!--footer-->

<div class="footer mt-0  footer-color">
	<div class="container">
		<div class="row py-1 py-md-2 px-lg-0">
			<div class="col-lg-4 footer-col1">
				<div class="row flex-column flex-md-row flex-lg-column">
					<div class="col-md col-lg-auto">
						<div class="footer-logo">
							<img src="images/footer-logo.webp" alt="footer-logo" class="img-fluid w-50"
								style="color: #fff;" alt="Subhash">
						</div>
						<div class="mt-2 mt-lg-0"></div>
						<div class="footer-social d-none d-md-block d-lg-none">


						</div>

						<div class="col-md">
							<div class="footer-text mt-1 mt-lg-2">
								<p>
									M.B.B.S., M.S., M.Ch (Plastic Surgery)<br>
									Fellowship in Microsurgery (Tata Medical Center)<br>
									PLASTIC, COSMETIC AND RECONSTRUCTIVE SURGEON
								</p>
							</div>

							<div class="footer-social d-md-none d-lg-block">
								<a href="https://www.facebook.com/profile.php?id=100076796080517"
									target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
								<a href="https://www.instagram.com/for_beayoutiful_you/" target="blank"
									class="hovicon"><i class="icon-instagram"></i></a>
								<a href="https://www.youtube.com/@drsubhashplasticsurgeon" target="blank"
									class="hovicon"><i class="fab fa-youtube"></i></a>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-lg-4">
				<h3>Follow us</h3>
				<div class="h-decor"></div>
				<button><a href="https://www.crisalix.com/en/directory/dr-subhash-pentapati"
						target="_blank"><img
							src="https://www.crisalix.com/assets/logo/logo-643e060d8bca5d9effb26d7336cb227c217ca65a3691d22a6074718e747b4de8.svg">
						<h3>Book a 3D Crisalix Consultation</h3>
					</a></button>

			</div>
			<div class="col-sm-12 col-lg-4">
				<h3>Our Contact</h3>
				<div class="h-decor"></div>
				<ul class="icn-list">
					<li><i class="icon-placeholder2"></i>
						3rd Floor, Near Subbayya Hotel, Kondayya palem Bridge Road, Ramarao peta, Kakinada
						<br>
						<a href="https://maps.google.com/maps/dir//Dr.+Subhash+Center+for+Plastic+Surgery+Bhanugudi+Jct+Bhanugudi+Junction,+G+O+Colony+Kakinada,+Andhra+Pradesh+533003/@16.9699253,82.237915,16z/data=!4m5!4m4!1m0!1m2!1m1!1s0x3a3829428214b965:0x9d9d08ec0cfc0a45"
							target="_blank" class="btn btn-xs btn-gradient"><i
								class="icon-placeholder2"></i><span>Get directions on the map</span><i
								class="icon-right-arrow"></i></a>
					</li>
					<li>
						<i class="icon-telephone"></i><b>
						<span class="phone">
							<span class="text-nowrap">
							<a href="tel:9989802260">9989802260</a>
							</span>,
						
							<span  class="text-nowrap">
						   <a href="tel:8885111587">8885111587</a>
						   </span>
						</span></b>			 
							
					</li>
					 

					<li>
						<i class="icon-black-envelope"></i><a
							href="mailto:drsubhashplasticsurgeon@gmail.com">drsubhashplasticsurgeon@gmail.com</a>
					</li>
					<i class="fa-solid fa-hospital"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class="d-sm-inline ">For emergency
						cases&nbsp;&nbsp;&nbsp;
				<span  class="text-nowrap">
					<i class="icon-telephone"></i><b>
					<a href="tel:9010236663">9010236663</a>
					</span>
	   </span></b>	

	  
	  </ul>
  </div>
</div>
</div>



				</ul>
			</div>
		</div>
	</div>
	
			
<div class="footer-bottom">
	<div class="container">
	
	   <div class="row text-center text-md-left ">
		   <div class="col-sm Terms"> <a href="terms.html"> Terms & conditions </a>  <a href="privacy.html">   Privacy & policy </a></div>
		   <div class="col-sm-auto ml-auto brand"><a
			   href="https://bhavicreations.com/">Branded By @<img src="images\homepage\bhavi.png "alt="drsubhashplasticsurgeon "  > </a>  
	</div>
	
	</div>

<!--//footer-->

<div class="backToTop js-backToTop">
	<i class="icon icon-up-arrow"></i>
</div>
<div class="modal modal-form modal-form-sm fade" id="modalQuestionForm">
	<div class="modal-dialog">
		<div class="modal-content">
			<button aria-label='Close' class='close' data-dismiss='modal'>
				<i class="icon-error"></i>
			</button>
			<div class="modal-body">
				<div class="modal-form">
					<h3>Ask a Question</h3>
					<form class="mt-15" id="questionForm" method="post" novalidate>
						<div class="successform">
							<p>Your message was sent successfully!</p>
						</div>
						<div class="errorform">
							<p>Something went wrong, try refreshing and submitting the form again.</p>
						</div>
						<div class="input-group">
								<span>
								<i class="icon-user"></i>
							</span>
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Your Name*"/>
						</div>
						<div class="input-group">
								<span>
									<i class="icon-email2"></i>
								</span>
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Your Email*"/>
						</div>
						<div class="input-group">
								<span>
									<i class="icon-smartphone"></i>
								</span>
							<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Your Phone"/>
						</div>
						<textarea name="message" class="form-control" placeholder="Your comment*"></textarea>
						<div class="text-right mt-2">
							<button type="submit" class="btn btn-sm btn-hover-fill">Ask Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-form fade" id="modalBookingForm">
	<div class="modal-dialog">
		<div class="modal-content">
			<button aria-label='Close' class='close' data-dismiss='modal'>
				<i class="icon-error"></i>
			</button>
			<div class="modal-body">
				<div class="modal-form">
					<h3>Book an Appointment</h3>
					<form class="mt-15" id="bookingForm" method="post" novalidate>
						<div class="successform">
							<p>Your message was sent successfully!</p>
						</div>
						<div class="errorform">
							<p>Something went wrong, try refreshing and submitting the form again.</p>
						</div>
						<div class="input-group">
								<span>
								<i class="icon-user"></i>
							</span>
							<input type="text" name="bookingname" class="form-control" autocomplete="off" placeholder="Your Name*"/>
						</div>
						<div class="row row-xs-space mt-1">
							<div class="col-sm-6">
								<div class="input-group">
										<span>
											<i class="icon-email2"></i>
										</span>
									<input type="text" name="bookingemail" class="form-control" autocomplete="off" placeholder="Your Email*"/>
								</div>
							</div>
							<div class="col-sm-6 mt-1 mt-sm-0">
								<div class="input-group">
										<span>
											<i class="icon-smartphone"></i>
										</span>
									<input type="text" name="bookingphone" class="form-control" autocomplete="off" placeholder="Your Phone"/>
								</div>
							</div>
						</div>
						<div class="row row-xs-space mt-1">
							<div class="col-sm-6">
								<div class="input-group">
										<span>
											<i class="icon-birthday"></i>
										</span>
									<input type="text" name="bookingage" class="form-control" autocomplete="off" placeholder="Your age"/>
								</div>
							</div>
						</div>
						<div class="selectWrapper input-group mt-1">
								<span>
									<i class="icon-tooth"></i>
								</span>
							<select name="bookingservice" class="form-control">
								<option selected="selected" disabled="disabled">Select Service</option>
								<option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
								<option value="General Dentistry">General Dentistry</option>
								<option value="Orthodontics">Orthodontics</option>
								<option value="Children`s Dentistry">Children`s Dentistry</option>
								<option value="Dental Implants">Dental Implants</option>
								<option value="Dental Emergency">Dental Emergency</option>
							</select>
						</div>
						<div class="input-group flex-nowrap mt-1">
								<span>
									<i class="icon-calendar2"></i>
								</span>
							<div class="datepicker-wrap">
								<input name="bookingdate" type="text" class="form-control datetimepicker" placeholder="Date" readonly>
							</div>
						</div>
						<div class="input-group flex-nowrap mt-1">
								<span>
									<i class="icon-clock"></i>
								</span>
							<div class="datepicker-wrap">
								<input name="bookingtime" type="text" class="form-control timepicker" placeholder="Time">
							</div>
						</div>
						<textarea name="bookingmessage" class="form-control" placeholder="Your comment"></textarea>
						<div class="text-right mt-2">
							<button type="submit" class="btn btn-sm btn-hover-fill">Book now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Vendors -->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/jquery-migrate/jquery-migrate-3.0.1.min.js"></script>
<script src="vendor/cookie/jquery.cookie.js"></script>
<script src="vendor/bootstrap-datetimepicker/moment.js"></script>
<script src="vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/bootstrap.min.js"></script>
<script src="vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="vendor/waypoints/sticky.min.js"></script>
<script src="vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="vendor/slick/slick.min.js"></script>
<script src="vendor/scroll-with-ease/jquery.scroll-with-ease.min.js"></script>
<script src="vendor/countTo/jquery.countTo.js"></script>
<script src="vendor/form-validation/jquery.form.js"></script>
<script src="vendor/form-validation/jquery.validate.min.js"></script>
<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!-- Custom Scripts -->
<script src="js/app.js"></script>
<script src="color/color.js"></script>
<script src="js/app-shop.js"></script>
<script src="form/forms.js"></script>

</body>
</html>

