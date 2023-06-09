<?php
session_start();

//page access
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
	header("Location: index.php");
	exit;
}


?>

<!DOCTYPE html>
<html lang="FR-fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AssuerPlus- mon compte</title>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- boostrap -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <header id="header" class="fixed-top">

      <!-- Navbar -->
      <div class="container" >
        <div class="justify-content-start align-items-center ">
          <a href="index.html" class="logo"><img src="visuels/logo rondtransparent.png" alt="" class="img-fluid"></a>
        </div>
          <nav id="navbar" class="navbar">
            <ul class="justify-content-start align-items-center">
              <li><a class="nav-link scrollto" href="#">Tableau de bord</a></li>
              <li><a class="nav-link scrollto" href="#">Profil</a></li>
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Mes documents</a>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
  
            <!-- login Button -->
            <div id="login"><a href="./deconnexion.php" class="btn-get-started scrollto" >Se déconnecter</a></div>
          </nav>
        </div>
    </header>


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container d-flex  d-xxl-inline ">
        <div class="row">

          <!-- OnlineServices -->
          <div class="col-xxl-6 col-xl-5 col-lg-6 flex-column align-items-stretch justify-content-center py-5 px-lg-5 order-2 order-lg-1 ">
						<p style ><strong>Bienvenue sur votre espace client !</strong></p> 
            <h3>Mes service en ligne</h3>
            <div class="onlineservices ">
              <div><a href="./sinister.php" class="btn-get-started "><img src="./visuels/icons-accident.png" class="rounded mx-auto d-block" alt="..." height="32px" width="32px">déclarer un sinistre </a></div>
              <div><a href="" class="btn-get-started "><img src="./visuels/icons8-signing-a-document-50 (2).png" class="rounded mx-auto d-block" alt="..." height="32px" width="32px">Modifier mes contrats</a></div>
              <div><a href="" class="btn-get-started "><img src="./visuels/icons8-nouveau-document-32.png" class="rounded mx-auto d-block" alt="..." height="32px" width="32px">Documents et attestation</a></div>
              <div><a href="" class="btn-get-started "><img src="./visuels/icons8-bulle-50 (1).png" class="rounded mx-auto d-block" alt="..." height="32px" width="32px">Demander un devis en ligne</a></div>
            </div>
          </div>

          <!-- Picture -->
          <div class="col-xxl-6 col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5 2 order-1 order-lg-2">
            <img src="./visuels/smileguy.jpg" class="img-fluid rounded" alt="...">
      </div>
    </section>


   

  <!-- ======= Footer ======= -->
  <footer id="footer">
 
    <!-- Footerinfo-->
    <div class="footer-top">
      <div class="container justify-content-between">
        <div class="row">

          <div class="col-lg-4 col-md-4 ">
            <h4>AssuerPlus</h4>
            <p>
              <strong>Contact:</strong> +1 2345 6789 <br>
              <strong>Email:</strong> info@AssuerPlus<br>
            </p>
          </div>

          <div class="col-lg-4 col-md-4 footer-links">
            <h4  >Informations Utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Horaires</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">n° speciaux</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">nous contacter</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Conditions d'utilisation</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-4 footer-links">
            <h4>Carrières</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Nos offres</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Postuler</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>AssuerPlus</span></strong>. Tout droits réservés
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!--JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>