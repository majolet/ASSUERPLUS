<?php
session_start();

//page access
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
	header("Location: index.php");
	exit;
}

//db connexion
$bdd = new PDO('mysql:host=localhost;dbname=assuerplus', 'root', '');

if (!$bdd) {
	die("Problème de connexion, veuillez réessayer dans quelques minutes: ");

}


//form sending
if(isset($_POST['send'])){
    if(!empty($_POST['customer-surname']) && !empty($_POST['customer-firstname']) && !empty($_POST['driver-surname']) && !empty($_POST['driver-firstame']) && !empty($_POST['carregistration']) && !empty($_POST['date'])){
        $customer_surname = $_POST['customer-surname'];
        $customer_firstname = $_POST['customer-firstname'];
        $adress = $_POST['adress'];
        $phone = $_POST['phone'];
        $driver_surname = $_POST['driver-surname'];
        $driver_firstame = $_POST['driver-firstame'];
        $carregistration = $_POST['carregistration'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $third_parties = $_POST['third-parties'];
        $witness = $_POST['witness'];

        $insertSinister = $bdd->prepare('INSERT INTO sinister (user_firstname, user_lastname, adress, phone, driver_firstname, driver_lastname, car_registration, date, description, thirdparty, witness) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertSinister->execute(array($customer_surname, $customer_firstname, $adress, $phone, $driver_surname, $driver_firstame, $carregistration, $date, $description, $third_parties, $witness));

        $sinisterId = $bdd->lastInsertId();


// Upload and insert images
// Upload and insert images
$imagePaths = [];
$imageErrors = [];

if (!empty($_FILES['images']['name'][0])) {
    $totalFiles = isset($_FILES['images']['name']) ? (is_array($_FILES['images']['name']) ? count($_FILES['images']['name']) : 1) : 0;
    for ($i = 0; $i < $totalFiles; $i++) {
        $imageName = $_FILES['images']['name'][$i];
        $imageTmp = is_array($_FILES['images']['tmp_name']) ? $_FILES['images']['tmp_name'][$i] : $_FILES['images']['tmp_name'];
        $imageSize = is_array($_FILES['images']['size']) ? $_FILES['images']['size'][$i] : $_FILES['images']['size'];
        $imageError = is_array($_FILES['images']['error']) ? $_FILES['images']['error'][$i] : $_FILES['images']['error'];

        if ($imageError === 0) {
            $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

            if (in_array($imageExt, $allowedExtensions)) {
                $newImageName = $customer_firstname . '_' . $customer_surname . '_' . $sinisterId . '_' . uniqid() . '.' . $imageExt;
                $imagePath = './images/images sinistres/' . $newImageName;

                if (move_uploaded_file($imageTmp, $imagePath)) {
                    $imagePaths[] = $imagePath;
                } else {
                    $imageErrors[] = "Erreur lors du téléchargement de l'image {$imageName}";
                }
            } else {
                $imageErrors[] = "Le format de fichier de l'image {$imageName} n'est pas autorisé.";
            }
        } else {
            $imageErrors[] = "Une erreur s'est produite lors du téléchargement de l'image {$imageName}.";
        }
    }

    // Insert image paths into database
    foreach ($imagePaths as $index => $imagePath) {
        $imageName = $_FILES['images']['name'][$index];
        $insertImage = $bdd->prepare('INSERT INTO image_sinister (sinister_id, nom, image) VALUES (?, ?, ?)');
        $newImageName = $customer_firstname . '_' . $customer_surname . '_' . $sinisterId . '_' . uniqid() . '.' . $imageExt;
				$insertImage->execute(array($sinisterId, $newImageName, $imagePath));

    }
}

if (count($imageErrors) === 0) {
    // Succes message and redirect
		echo '<span style="color: green; font-weight: bold;">Votre sinistre a bien été enregistré! Numero de sinistre : ' . $sinisterId . '</span>';
		echo '<script>
    setTimeout(function() {
        window.location.href = "./myaccount.php";
    }, 5000); // Rediriger après 5 secondes (vous pouvez ajuster le délai selon vos besoins)
		</script>';

} else {
    // Display errors
    foreach ($imageErrors as $error) {
        echo $error . '<br>';
    }
    echo "Veuillez compléter tous les champs obligatoires.";
}}};


?>


<!DOCTYPE html>
<html lang="FR-fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AssuerPlus</title>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- boostrap -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS File -->
  <link href="./assets/css/styleformsinister.css" rel="stylesheet">

  <!-- Images Script -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Fonction pour prévisualiser l'image sélectionnée
    function previewImage(input, previewId) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#' + previewId).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

 // check file sizes
 function checkFile(input) {
        var fileType = input.files[0].type;
        var fileSize = input.files[0].size;

        if (fileType.indexOf('image/') !== 0) {
          alert("Le fichier sélectionné n'est pas une image.");
          input.value = '';
        } else if (fileSize > 4 * 1024 * 1024) {
          alert("La taille de l'image sélectionnée dépasse la limite autorisée de 4 Mo.");
          input.value = '';
        }
      }
    // image removing
    function removeImage(inputId, previewId) {
      $('#' + previewId).attr('src', '');
      $('#' + inputId).val('');
    }

    // add file field
    function addImageField() {
      var inputCount = $('.image-input').length;
      var newInput = '<br><input type="file" class="image-input" id="images' + inputCount + '" name="images[]" onchange="previewImage(this, \'images' + inputCount + '-preview\'); checkFileSize(this);"><br><img id="images' + inputCount + '-preview" style="max-width: 300px; max-height: 300px;"><br><button type="button" onclick="removeImage(\'images' + inputCount + '\', \'images' + inputCount + '-preview\');">Supprimer l\'image sélectionnée</button>';

      $('#image-fields').append(newInput);
    }
  </script>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="sticky-top">

    <!-- Navbar -->
    <div class="container" >
      <div class="justify-content-center align-items-center ">
      <a href="index.html" class="logo"><img src="visuels/logo rondtransparent.png" alt="" class="img-fluid"></a>
    </div>
      <nav id="navbar" class="navbar">
        <div class="justify-content-center align-items-center">
          <a href="" ><i class="bi bi-arrow-left-square" id="arrow-icon" onclick="rtn()"></i></a>
					<script>
       		 function rtn() {
           window.history.back();
        	}
        </script>
        <!-- login Button -->
      </div>
        <div id="login" class="justify-content-lg-end"><a href="./deconnexion.php"  class="btn-get-started scrollto" >Se déconnecter</a></div>

        </div>

        </div>
      </nav>
    </div>
  </header>
  
  <!-- ======= Sinister Section ======= -->
    <section id="sinister" class="sinister">
      <div class="container ">
        <div class="section-title">
          <h2>Déclarer un sinistre</h2>
          <p>Notre assurance vous accompagne dans la déclaration de vos sinistre.</p>
        </div>

        <div class="row justify-content-center">
            <form method="post" action="" enctype="multipart/form-data">
							
              <label for="customer-surname"><span style="color: red;">* </span>Nom de l'assuré :</label>
              <input type="text" id="customer-surname" name="customer-surname" required><br><br>
              
              <label for="customer-firstname"><span style="color: red;">* </span>Prénom de l'assuré :</label>
              <input type="text" id="customer-firstname" name="customer-firstname" required><br><br>
              
              <label for="adress"><span style="color: red;">* </span>Adresse de l'assuré :</label>
              <input type="text" id="adress" name="adress" required><br><br>
              
              <label for="phone"><span style="color: red;">* </span>Téléphone de l'assuré :</label>
              <input type="phone" id="phone" name="phone" required><br><br>
              
              <label for="driver-surname"><span style="color: red;">* </span>Nom du conducteur :</label>
              <input type="text" id="driver-surname" name="driver-surname" required><br><br>
              
              <label for="driver-firstame"><span style="color: red;">* </span>Prénom du conducteur :</label>
              <input type="text" id="driver-firstame" name="driver-firstame" required><br><br>
              
              <label for="car-registration"><span style="color: red;">* </span>Immatriculation du véhicule :</label>
              <input type="text" id="car-registration" name="carregistration" required><br><br>
              
              <label for="date"><span style="color: red;">* </span>Date du sinistre :</label>
              <input type="date" id="date" name="date" required><br><br>
              
              <label for="description"><span style="color: red;">* </span>Description du sinistre :</label><br>
              <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
              
              <label for="third-arties">Tiers impliqué :</label>
              <input type="text" id="third-parties" name="third-parties"><br><br>
              
              <label for="witness"></span>Témoins :</label>
              <input type="text" id="witness" name="witness"><br><br>

               <label for="images">Sélectionnez une ou plusieurs images (maximum 4 Mo chacune) :</label><br>
              <input type="file" class="image-input" id="images0" name="images[]" accept="image/*" onchange="previewImage(this, 'images0-preview'); checkFile(this);">
              <br><br> 
              <img id="images0-preview" style="max-width: 200px; max-height: 200px;">
              <br><br>
              <button type="button" onclick="removeImage('images0', 'images0-preview');">Supprimer l'image sélectionnée</button>
              <br><br>
              <div id="image-fields"></div>
              <br><button type="button" onclick="addImageField();">Ajouter une image</button>
              <br><br>
              <input type="submit" value="Envoyer la déclaration de sinistre" name="send">
            </form>
          </div>  
      </div>
    </section>
</body>
</html>
