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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Devarsh Hospitals</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/deversh/fav.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style1.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS and dependencies -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">

</head>


<body>



  <header id="header">
    <div class="container d-flex align-items-center onlypad  ">
      <div class="logo-text-container d-flex align-items-center" style="z-index: 999;">
        <a href="index.php">
          <img src="assets/img/deversh/Logo.png" class="img-fluid nav_logo_image " alt="">
        </a>
      </div>

      <nav id="navbar" class="navbar order-lg-0">
        <i class="bi bi-list mobile-nav-toggle"></i>
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li class="nav-item ">
            <a class="nav-link scrollto" href="about.php">About</a>
          </li>

          <li class="unique-nav-item" style="--i: 1.1s">
             <a href="#" class="unique-nav-link">Specialties<i class="fas fa-caret-down"></i></a>
             <div class="unique-dropdown">
               <ul class="unique-dropdown-list new_nav_bg">
                 <!-- Column 1 -->
                 <li class="unique-dropdown-item">
                   <a href="urology.php" class="unique-dropdown-link">Urology</a>
                 </li>
                 <li class="unique-dropdown-item">
                   <a href="gynocology.php" class="unique-dropdown-link">Obstetrics & Gynaecology</a>
                 </li>
                 <li class="unique-dropdown-item">
                   <a href="orthopedic.php" class="unique-dropdown-link">Orthopedic</a>
                 </li>
                 <li class="unique-dropdown-item">
                   <a href="paediatrics.php" class="unique-dropdown-link">Paediatrics</a>
                 </li>
                 <li class="unique-dropdown-item">
                   <a href="generalsurgery.php" class="unique-dropdown-link">General Surgery</a>
                 </li>

                 <!-- Column 2 -->
                 <li class="unique-dropdown-item">
                   <a href="cardiology.php" class="unique-dropdown-link">Cardiology</a>
                 </li>
                 <li class="unique-dropdown-item">
                   <a href="neurology.php" class="unique-dropdown-link">Neurology</a>
                 </li>
                 <li class="unique-dropdown-item">
                   <a href="gastroenterology.php" class="unique-dropdown-link">Gastroenterology</a>
                 </li>
                 <li class="unique-dropdown-item">
                   <a href="generalmedicine.php" class="unique-dropdown-link">General Medicine</a>
                 </li>
               </ul>
               <div class="unique-arrow"></div>
             </div>
           </li>



          <li><a class="nav-link scrollto" href="contact.php">Contact Us</a></li>
          <li><a class="nav-link active" href="blogs.php">Blogs</a></li>

          <li><a href="appointment.php" class="appointment-btn scrollto d-lg-none" style="z-index: 999;">
              Appointment
            </a></li>
        </ul>
      </nav>

      <a href="appointment.php" class="appointment-btn scrollto d-none d-lg-block" style="z-index: 999;">
        <div class="d-flex  ">
          <div class="svg_iconjm"> <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
              <path d="M22.9583 4.83331H6.04167C4.70698 4.83331 3.625 5.91529 3.625 7.24998V24.1666C3.625 25.5013 4.70698 26.5833 6.04167 26.5833H22.9583C24.293 26.5833 25.375 25.5013 25.375 24.1666V7.24998C25.375 5.91529 24.293 4.83331 22.9583 4.83331Z" stroke="#3C68A9" stroke-width="2.41667" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M19.3333 2.41669V7.25002" stroke="#3C68A9" stroke-width="2.41667" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M9.66675 2.41669V7.25002" stroke="#3C68A9" stroke-width="2.41667" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M3.625 12.0833H25.375" stroke="#3C68A9" stroke-width="2.41667" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class=""> Book <i class="fa-solid fa-arrow-right"></i><br> Appointment</div>
        </div>
      </a>
    </div>


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




  <!-- ======= Footer ======= -->
  <?php include('./footer.php'); ?>






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