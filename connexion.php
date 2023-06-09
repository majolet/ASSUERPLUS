<?php
  // connexion 
  
  session_start();

  //db connexion
  $bdd= new PDO ('mysql:host=localhost;dbname=assuerplus','root');
  //verification de connexion
  if (!$bdd) {
    die("Connection failed: " );
  }
 ;
  //form sending
  if(isset($_POST['send'])){
  if(!empty($_POST['login'] and !empty($_POST['password']))){
  $login=htmlspecialchars($_POST['login']);
  $password=sha1($_POST['password']);
  $RecupUser=$bdd->prepare('SELECT login,password FROM user_connexion WHERE login=? AND password=?');
  $RecupUser->execute(array($login,$password));
  
  if($RecupUser->rowCount()>0){
      $_SESSION['login']=$login;
      $_SESSION['password']=$password;
      $_SESSION['loggedin'] = true;
      header('location: myaccount.php');
  } else {
    echo "Votre mot de passe ou login est incorrect";
  };
  
    };
   };

   //inscription
   if(isset($_POST['sendinscription'])){
    if(!empty($_POST['newlogin'] and !empty($_POST['newpassword'] and !empty($_POST['email'])))){
    $newlogin=htmlspecialchars($_POST['newlogin']);
    $email=$_POST['email'];
    $newpassword=sha1($_POST['newpassword']);
    $insertUser=$bdd->prepare('INSERT INTO user_connexion(login,password,email) VALUES(?,?,?)');
    $insertUser->execute(array($newlogin,$newpassword,$email));
    
    $_SESSION['newlogin'] = $newlogin;
    $_SESSION['email'] = $email;
    $_SESSION['$newpassword'] = $newpassword;

    //inscription confirmation
    echo "<script>alert(\"votre compe a bien été enregistré, vous pouvez vous connecter !\")</script>";
      }else{
         echo"Veuillez compléter tous les champs";
      };
     };

    ?>
  

<!DOCTYPE html>
<html lang="FR-fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AssuerPlus-connexion</title>

 <!-- New account -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- boostrap -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS File -->

  <link href="././assets/css/styleconnexion.css" rel="stylesheet">
 <link href="assets/css/style.css" rel="stylesheet">
</head>

<!-- ======= Header ======= -->
<header id="header">

  <!-- Navbar -->
  <div class="container" >
    <div class="justify-content-start align-items-center ">
    <a href="index.html" class="logo"><img src="visuels/logo rondtransparent.png" alt="" class="img-fluid"></a>
  </div>
    <nav id="navbar" class="navbar">
      <!-- login Button -->
      <a class="nav-link scrollto" href="#services" onclick="rtn()">Revenir en arrière</a>
      <script>
        function rtn() {
           window.history.back();
        }
        </script>
    </nav>
</header>

<body>
  <!-- ======= connexion modal ======= -->
    <!-- form -->

     <!-- Full screen modal -->
      <form method="post" action="">
        <div class="login-wrap">
          <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Se connecter</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'enregistrer</label>
            <div class="login-form">
              <div class="sign-in-htm">
                <div class="group">
                  <label for="login" class="label">identifiant</label>
                  <input id="login" name="login" type="text" class="input">
                </div>
                <div class="group">
                  <label for="password" class="label">mot de passe</label>
                  <input id="password" name="password" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                  <input id="check" type="checkbox" class="check" checked>
                  <label for="check"><span class="icon"></span> Se souvenir de moi</label>
                </div>
                <div class="group">
                  <input type="submit" class="button" value="Se connecter" name="send">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                  <a href="#forgot">Mot de passe oublié?</a>
                </div>
              </div>
              <div class="sign-up-htm">
                <div class="group">
                  <label for="newlogin" class="label">identifiant</label>
                  <input id="newlogin" name="newlogin" type="text" class="input">
                </div>
                <div class="group">
                  <label for="newpassword" class="label">mot de passe</label>
                  <input id="newpassword" name="newpassword" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                  <label for="confirmpassword" class="label">Répeter mot de passe</label>
                  <input id="confirmpassword" name="confirmpassword" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                  <label for="email" class="label">Adresse Email</label>
                  <input id="email" name="email" type="text" class="input">
                </div>
                <div class="group">
                  <input type="submit" class="button" value="S'enregistrer" name="sendinscription">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                  <label for="tab-1">Déja membre?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
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
     

  
  

</body>

</html>

