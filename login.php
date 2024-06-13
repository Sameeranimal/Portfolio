<?php
include 'dbconn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $_POST['email'];
   $password = $_POST['pswd'];
   $sql = "SELECT user_id, password FROM users WHERE Email = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $email);
   $stmt->execute();
   $stmt->store_result();
   $stmt->bind_result($id, $hashed_password);
   if ($stmt->num_rows > 0) {
       $stmt->fetch();
       if (password_verify($password, $hashed_password)) {
           // Start sessie en sla gebruikersinformatie op
           session_start();
           $_SESSION['user_id'] = $id;
           $_SESSION['email'] = $email;
           // Redirect naar index.html
           header("Location: ../index.php");
           exit();
       } else {
           echo "Ongeldig wachtwoord.";
       }
   } else {
       echo "Geen account gevonden met dit emailadres.";
   }
   $stmt->close();
   $conn->close();
}
?>


<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Portfolio</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <div class="header_nav">
          <a class="navbar-brand brand_desktop" href="index.html">
            <img src="../Try this/images/nametag2.png">
          </a>
          <div class="main_nav">
            <div class="top_nav">
              <ul class=" ">
                <li class="">
                  <a class="" href="">
                    <img src="images/telephone.png" alt="" />
                    <span> +31 6 16094415</span>
                  </a>
                </li>
                <li class="">
                  <a class="" href="">
                    <img src="images/mail.png" alt="" />
                    <span>sameera2910@icloud.com</span>
                  </a>
                </li>
                <li class="">
                  <a class="" href="">
                    <img src="images/location.png" alt="" />
                    <span>Gouda</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="bottom_nav">
              <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand brand_mobile" href="index.html">
                  <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="signup.html"> login/signup </a>
                        

                 
                    
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 offset-md-2">
            <div class="slider_heading">
              <h2>
                Sam
              </h2>
            </div>
          </div>
          <div class="col-md-8 mx-auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="box">
                    <div class="detail-box">
                      <h1>
                        ALA Project <br />
                        
                      </h1>
                      <hr />
                     
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="box">
                    <div class="detail-box">
                      <h1>
                        SQL Database training <br />
                        
                      </h1>
                      <hr />
                     
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="box">
                    <div class="detail-box">
                      <h1>
                          SCRUM-method <br />
                        
                      </h1>
                      <hr />
                    
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 ml-auto pr-0">
          <div class="about_container">
            <div class="row">
              <div class="col-lg-3 col-md-5">
                <div class="detail-box">
                  <div class="heading_container">
                    <h2>
                      Team spirit
                    </h2>
                  </div>
                  <p>
                    iusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris iusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquipnisi ut aliquipiusmod tempor incididunt ut labore et
                  </p>
                  <hr />
                  <a href="">
                    Read More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 

  <section class="blog_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 ml-auto">
          <div class="heading_container">
            <h2>
              A little introduction...
            </h2>
           
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 pl-0">
          <div class="box b1">
            <div class="img-box">
              <img src="images/Image (7).jpg" alt="">
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-10 ml-auto">
                <div class="detail-box">
                  <div class="img_date">
                    <h6>
                      About me <br>
                  
                    </h6>
                  </div>
                  <h3>
                    Who am I?
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  </p>
                  <a href="">
                    Read More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 pr-0">
          <div class="box b2">
            <div class="img-box">
              <img src="images/code.jpeg" alt="">
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-10 mr-auto">
                <div class="detail-box">
                  <div class="img_date">
                    <h6>
                      Coding<br>
                    </h6>
                  </div>
                  <h3>
                    Experience
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  </p>
                  <a href="">
                    Read More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end blog section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
          <div class="client_container">
            <div class="heading_container">
              <h2>
                Personal accomplishments
              </h2>
              <p>
                3 accomplishments I am very proud to show you!
              </p>
            </div>
            <div class="client_box-container">
              <div class="carousel-wrap ">
                <div class="owl-carousel">
                  <div class="item">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/MorphéLogo.jpg" alt="" />
                      </div>
                      <div class="detail-box">
                        <h4>
                          Assignment Morphé
                        </h4>
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum </p>
                        <img src="images/check.png" alt="" />
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/hackathon 2024.jpg" alt="" />
                      </div>
                      <div class="detail-box">
                        <h4>
                          Hackathon 2024
                        </h4>
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum </p>
                        <img src="images/check.png" alt="" />
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/MorphéLogo.jpg" alt="" />
                      </div>
                      <div class="detail-box">
                        <h4>
                          Assignment Morphé
                        </h4>
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum </p>
                        <img src="images/check.png" alt="" />
                      </div>
                    </div>
                  </div>
                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <div class="info_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 ml-auto">
          <div class="row info_main-row">
            <div class="col-md-6 pr-0">

           

              <section class="contact_section">
                <h2>
               Contact me
                </h2>
                <form action="">
                  <div>
                    <input type="text" placeholder="Name" />
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" />
                  </div>
                  <div>
                    <input type="email" placeholder="Email" />
                  </div>
                  <div>
                    <input type="text" class="message-box" placeholder="Message" />
                  </div>
                  <div class="d-flex ">
                    <button>
                      SEND
                    </button>
                  </div>
                </form>
                <div class="map_container">
                  <div class="map">
                    <div id="googleMap" style="width:100%;height:300px;"></div>
                  </div>
                </div>
              </section>

              <section class=" footer_section ">
                <div class="social_box">
                  
                <p> Leave a like and follow on social media!</p> 
                  <a href="#">
                    <img src="images/facebook.png" alt="">
                  </a>
                  <a href="#">
                    <img src="images/twitter.png" alt="">
                  </a>
                  <a href="#">
                    <img src="images/linkedin.png" alt="">
                  </a>
                  <a href="#">
                    <img src="images/instagram.png" alt="">
                  </a>
                  <a href="#">
                    <img src="images/youtube.png" alt="">
                  </a>
                </div>
                
              </section>
             

           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style");
    }
  </script>

  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 2
        }
      }
    });


    $(".owl_carousel1").owlCarousel({
      loop: true,
      margin: 25,
      nav: true,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 2
        }
      }
    });
  </script>


  
</body>

</html>