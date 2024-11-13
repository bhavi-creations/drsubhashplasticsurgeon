<?php
include './db.connection/db_connection.php'; // Include your database connection file

// Retrieve service filter from GET request
$service = isset($_GET['service']) ? $_GET['service'] : '';

// Prepare SQL query with optional service filter
$sql = "SELECT id, title, main_content, main_image, created_at FROM blogs";
if (!empty($service)) {
  $sql .= " WHERE service = ?";
}
$sql .= " ORDER BY created_at DESC";

// Initialize statement
$stmt = $conn->prepare($sql);

// Bind parameters if service is set
if (!empty($service)) {
  $stmt->bind_param("s", $service);
}

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en"><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description"
		content="html 5 template, dentist, stomatologist, dental clinic template, medical template, clinic template, surgery clinic theme, plastic surgery template">
	<meta name="author" content="websmirno.site">
	<meta name="format-detection" content="telephone=no">
	<meta name="title"
		content="Dr Subhash Plastic surgeon , Welcome to Dr. Subhash's Plastic Surgery in Kakinada | Transforming Lives with Best Cosmetic and Reconstructive treatments">
	<meta name="keywords" content="best plastic surgery in kakinada,  plastic surgeon in kakinada,abdominoplasty surgery in kakinada, 
	tummy tuck surgery near me,
	tattoo removal in kakinada,
	tattoo removal services in kakinada,
	scar revision near me,
	scar revision treatment in kakinada,
	nose job near me,
	rhinoplasty surgery in kakinada,
	breast augmentation in kakinada,
	liposuction treatment near me,
	obesity treatment in kakinada,
	breast reduction without surgery near me,
	best hospital for breast reduction in kakinada,
	breast lift surgery near me,
	breast lifting treatment in Kakinada,
	gynaecomastia male breast treatment near me, 
	best gynaecomastia treatment near me,
	best plastic surgery in kakinada	
    best plastic surgery hospitals in kakinada	
    best plastic surgeon in kakinada	
    plastic surgeon in kakinada


	 
	
	
	">
	<meta name="description"
		content="Dr Subhash Plastic surgeon, Specialised in transformative cosmetic procedures. Dr. Subhash is dedicated to helping patients achieve their desired aesthetic goals. From facelifts and breast augmentations to body contouring and non-surgical treatments, 
	Welcome to Dr. Subhash's Plastic Surgery Clinic in Kakinada. Our renowned practice offers a wide range of Best Cosmetic and Reconstructive treatments. With a focus on personalized care and transformative results, trust Dr. Subhash for all your plastic surgery needs. Schedule a consultation today ">

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-PETP0PPDPG"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'G-PETP0PPDPG');
	</script>

	<!-- <style>
	 

	 
	@media only screen and (max-width: 767px) {
		.page-content {
			width: auto  ;

		}

		#mainSliderWrapper {
			height: 190px !important; 
		}

		.slide {
			height: 190px !important;  
		}
	}

	/* Medium Screen Styles */
	@media only screen and (min-width: 768px) and (max-width: 991px) {
		.page-content {
			 width: auto !important;
		}

		#mainSliderWrapper {
			height: 400px;  
		}

		.slide {
			height: 400px;  
		}
	}
</style> -->


</head>

<body class="shop-page layout-landing">

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
							<a href="https://www.instagram.com/subhashcenterforplasticsurgery/" target="blank" class="hovicon"><i
									class="fab fa-instagram pr-2"></i></a>
							<a href="https://www.youtube.com/@drsubhashplasticsurgeon" target="blank" class="hovicon"><i
									class="fab fa-youtube"></i></a>

						</span>



					</div>
				</div>
			</div>
		</div>
		<div class="header-content">
			<div class="container">
				<div class="row align-items-lg-center">
					<button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
						<span class="icon-menu"></span>
					</button>
					<div class="col-lg-auto col-lg-2 d-flex align-items-lg-center">
						<a href="index.php" class="header-logo"><img
								src="images/homepage/logo_best_plastic_surgery_hospitals_in_kakinada.png"
								alt="Dr.Subhash logo" class="img-fluid"></a>
					</div>
					<div class="col-lg ml-auto header-nav-wrap">
						<div class="header-nav js-header-nav">
							<nav class="navbar navbar-expand-lg btco-hover-menu ">
								<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
									<ul class="navbar-nav">
										<li class="nav-item">
											<a class="nav-link link-inside" href="index.php">Home</a>
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

										<li class="nav-item">
											<a class="nav-link link-inside" href="./contact.html">Contact</a>
										</li>
										<li class="nav-item">
											<a class="nav-link link-inside" href="./blogs.php">Blogs</a>
										</li>
										<li class="nav-item">
											<a class="nav-link link-inside" href="machenary.html">Machinery</a>
										</li>
										<!-- <li class="nav-item">
										<a class="nav-link link-inside" href="https://rinasolutions.in/doctors/kakinada/doctor-details.php?tid=17" target="_blank"  class="btn btn-xs btn-gradient">Book Appointment</a>
									</li>
										<li> -->
											<a href="https://rinasolutions.in/doctors/kakinada/doctor-details.php?tid=17"
												target="_blank"
												class="btn btn-xs btn-gradient pb-1 pt-1 "></i><span>Book
													Appointment</span></i></a>
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

    <script>
      // jQuery needed to manage hover and click behavior
      $(document).ready(function() {
        // Ensure that the dropdown opens on hover
        $('#servicesDropdown').hover(function() {
          $(this).dropdown('toggle');
        });

        // Make sure the dropdown also works on click
        $('#servicesDropdown').click(function(e) {
          e.stopPropagation(); // Prevents the click from closing the dropdown immediately
          window.location.href = $(this).attr('href'); // Redirect to the link
        });
      });
    </script>
  </header>

  <main>
    <!-- Filter Buttons -->
    <div class="container">
      <div class="filter_buttons redirect_section mt-4">
        <a href="blogs.php?service="><button class="redirect_blog_srivice">All</button></a>
     	<a href="blogs.php?service=Cosmetic Problems"><button class="redirect_blog_srivice">Cosmetic Problems</button></a>
        <a href="blogs.php?service=Plastic Reconstructive Problems"><button class="redirect_blog_srivice">Plastic & Reconstructive Problems</button></a>
       
        
        

      </div>
    </div>
	 


	


    <!-- Blogs Section -->
    <div class="container blog-sidebar-list" style="padding-top: 20px; padding-bottom: 20px;">
      <div class="row">
        <div class="col-lg-12">
          <div class="grid row">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $image_path = !empty($row['main_image']) ? "admin/uploads/photos/{$row['main_image']}" : "default_image.png";
                echo "
                                    <div class='grid-item col-sm-12 col-lg-4 mb-5'>
                                        <div class='post-box card_bg_div_box'>
                                            <figure>
                                                <a href='fullblog.php?id={$row['id']}'>
                                                    <img src='{$image_path}' alt='Blog Image' class='img-fluid blog_box_image'>
                                                </a>
                                            </figure>
                                            <div class='box-content'>
                                                <h5 class='box-title'><a  class='box-title' href='fullblog.php?id={$row['id']}'>" . htmlspecialchars($row['title']) . "</a></h5>
                                                <p class='post-desc  mt-5' style='text-align: justify;'>" . substr(strip_tags($row['main_content']), 0, 90) . "...</p>
                                                <a href='fullblog.php?id={$row['id']}'><button class='blog_main_btn'>Read More..</button></a>
                                            </div>
                                        </div>
                                    </div>";
              }
            } else {
              echo "<p>No blog posts found.</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>





  <!-- ======= Footer ======= -->
  






  <script>
    let currentSlide = 0;

    function moveSlide(step) {
      const slides = document.querySelectorAll('.carousel .slide');
      const totalSlides = slides.length;
      currentSlide = (currentSlide + step + totalSlides) % totalSlides;
      document.querySelector('.carousel').style.transform = `translateX(-${currentSlide * 100}%)`;
    }
  </script>



  <div id="preloader"></div>
  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- Swiper JS -->
  <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

  <!-- JavaScript -->
  <!--Uncomment this line-->
  <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>


</body>

</html>


<?php
// Close the statement and connection
$stmt->close();
$conn->close();
?>

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
											<a href="https://www.instagram.com/subhashcenterforplasticsurgery/" target="blank"
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
								
									<i class="fa-solid fa-hospital"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class=" d-sm-inline ">For emergency
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
				<div class="footer-bottom">
					<div class="container">
						<div class="row text-center text-md-left ">
							<div class="col-sm Terms"> <a href="terms.html"> Terms & conditions </a>  <a href="privacy.html">   Privacy & policy </a></div>
							<div class="col-sm-auto ml-auto brand"><a
								href="https://bhavicreations.com/">Branded By @<img src="images\homepage\bhavi.png "alt="drsubhashplasticsurgeon "  > </a>  
					</div>
				</div>
