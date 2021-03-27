<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png" />
  <!-- Author Meta -->
  <meta name="author" content="CodePixar" />
  <!-- Meta Description -->
  <meta name="description" content="" />
  <!-- Meta Keyword -->
  <meta name="keywords" content="" />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>BewtyBlog</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Playfair+Display:700,700i|Itim&display=swap" rel="stylesheet" />
  <!-- CSS !-->
  <link rel="stylesheet" href="css/linearicons.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/nice-select.css" />
  <link rel="stylesheet" href="css/owl.carousel.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="css/main.css" />

</head>

<body>
  <?php
  require_once('db.php');

  $article_id = $_GET['id'];

  // check connection error 
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  } else {
    // connect success, do nothing
  }

  // select data from tables
  $sql = "SELECT articles.id, articles.title, articles.body ,articles.create_ts, 
          articles.authors_id, articles.updatetime, articles.publish_sts, authors.penname 
          FROM articles JOIN authors ON articles.authors_id = authors.id
          WHERE articles.publish_sts = 'Y'
          AND articles.id = $article_id";
  $result = $mysqli->query($sql);
  $row = $result->fetch_object();
  $result2 = $mysqli->query($sql);
  $rowcount = mysqli_num_rows($result);

  if (!$result) {
    echo ("Error: " . $mysqli->error);
  } else {
  ?>
    <!--================ Start Header Area =================-->
    <header class="header-area">
      <div class="container">
        <div class="header-wrap">
          <div class="header-top d-flex justify-content-between align-items-lg-center navbar-expand-lg">
            <div class="col menu-left">
              <a class="nav-link" href="index.php">หน้าแรก</a>

            </div>
            <div class="col-5 text-lg-center mt-2 mt-lg-0">
              <span class="logo-outer">
                ♥
                <span class="logo-inner">
                  <a href="index.php"><img class="mx-auto" src="img/logo.png" alt="" /></a>
                </span>
                ♥
              </span>
            </div>

            <nav class="col navbar navbar-expand-lg justify-content-end">
              <!-- Toggler/collapsibe Button -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="lnr lnr-menu"></span>
              </button>

              <!-- Navbar links -->
              <div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
                <ul class="navbar-nav justify-content-center w-100">
                  <li class="nav-item hide-lg">
                    <a class="nav-link" href="index.php">หน้าแรก</a>
                  </li>

                  <?php if (isset($_SESSION['name'])) { ?>
                    <li class="nav-item">
                      <a href="editauthors.php" class="nav-link">ชื่อผู้เขียน : <?php echo $_SESSION['name']; ?> <span class="ti-pencil"></span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="myarticle.php">บทความของฉัน</a>
                    </li>
                  <?php } else { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!--================ End Header Area =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog_area section-gap single-post-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="main_blog_details">
              <img class="img-fluid" src="img/banner/b1.jpg" alt="">
              <a href="#">
                <h4>
                  <?php echo $row->title; ?>
                </h4>
              </a>
              <div class="user_details">
                <div class="float-left">
                  <a href="index.php">บทความ</a>
                </div>
                <div class="float-right mt-sm-0 mt-3">
                  <div class="media">
                    <div class="media-body">
                      <h5>ผู้เขียน: <?php echo $row->penname; ?> </h5>
                      <p>แก้ไขล่าสุดเมื่อ: <?php echo $row->updatetime; ?></p>
                    </div>

                  </div>
                </div>
              </div>
              <p>
                <?php echo $row->body; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Blog Post Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer-area section-gap">
      <div class="container">
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
          <p class="footer-text m-0">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </footer>

  <?php } ?>
  <!--================ End Footer Area =================-->

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.tabs.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/main.js"></script>
</body>

</html>