<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
} else {
    //
}
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

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Playfair+Display:700,700i" rel="stylesheet" />
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
    <script src="validation.js"></script>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    require_once('db.php');

    // check connection error 
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        // connect success, do nothing
    }
    // select data from tables
    $auid = $_SESSION['auid'];
    $sql = "SELECT *
            FROM authors
            WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $auid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();

    ?>
    <!--================ Start Header Area =================-->
    <header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-lg-center navbar-expand-lg">
                    <div class="col menu-left">
                        <a href="index.php">?????????????????????</a>

                    </div>
                    <div class="col-5 text-lg-center mt-2 mt-lg-0">
                        <span class="logo-outer">
                            ???
                            <span class="logo-inner">
                                <a href="index.php"><img class="mx-auto" src="img/logo.png" alt="" /></a>
                            </span>
                            ???
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
                                    <a class="nav-link" href="index.php">?????????????????????</a>
                                </li>

                                <li class="nav-item">
                                    <a href="editauthors.php" class="nav-link active">???????????????????????????????????? : <?php echo $_SESSION['name']; ?> <span class="ti-pencil"></span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">??????????????????????????????</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--================ End Header Area =================-->

    <!--================ Start banner Area =================-->
    <section class="contact-page-area section-gap">
        <div class="container">
            <h3 class="mb-30">
                ??????????????????????????????????????????????????????
            </h3>
            <div class="row">

                <form method="post" name="registform" onSubmit="return formValidation();" action="edit_profile.php">
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">?????????????????????????????? <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="text" id="username" class="form-control" name="username" value="<?php echo $row->username ?>" maxlength="45">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">???????????????????????? <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="password" id="passwd" class="form-control" name="passwd" value="" maxlength="45">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">???????????????????????????????????????????????? <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="password" id="conpasswd" class="form-control" name="conpasswd" value="" maxlength="45">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">???????????????????????????????????? <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="text" id="name" class="form-control" name="name" value="<?php echo $row->name ?>" maxlength="45">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">???????????????????????? <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="text" id="penname" class="form-control" name="penname" value="<?php echo $row->penname ?>" maxlength="45">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12 col-form-label text-md-left">??????????????? <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="email" id="email" class="form-control" name="email" value="<?php echo $row->email ?>" maxlength="45">
                        </div>
                    </div>

                    <div class="col-md-12 offset-md-left">
                        <button type="submit" class="btn btn-warning">
                            ??????????????????
                        </button>
                        <a href="myarticle.php">???????????????????????????????????????????????????????????????</a>
                    </div>
                </form>
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