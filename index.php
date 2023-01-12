<?php 

    $pdo = new PDO ('mysql:dbname=isc; host=localhost','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $promotion = $_POST['promotion'];
    $insertion = "INSERT INTO nwmo ( matricule, nom, postnom, prenom , sexe, promotion) VALUES ('$matricule', '$nom', '$postnom', '$prenom', '$sexe', '$promotion' )";
    $pdo->exec($insertion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie controler des identités</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/inscrit.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<form action="" method="POST" class="container w-50" >
<header class="head">
    <h1 class="text-center p-3 inscrite">IDENTITE DES ETUDIANTS</h1>
    </header>
    <section>
    <div class="form-group">
    <label id="inscrit" for="">Matricule</label>
    <input type="text" name="matricule" class="form-control " required>
    </div>
    <div class="form-group">
    <label id="inscrit" for="">Nom</label>
    <input type="text" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
    <label id="inscrit" for="">Postnom</label>
    <input type="text" name="postnom" class="form-control" required>
    </div>
    <div class="form-group">
    <label id="inscrit" for="">Prenom</label>
    <input type="text" name="prenom" class="form-control " required>
    </div>
    <div class="form-group">
    <label id="inscrit" for="">Sexe</label>
    <select name="sexe" id="" class="form-control">
    <option value=""></option>
    <option value="cl">M</option>
    <option value="rt">F</option>
    </select>
    </div>
    <div class="form-group ">
    <label id="inscrit" for="">Promotion</label>
    <input type="text" name="promotion" class="form-control " required>
    </div>
    <button type="submit" class="btn btn-primary bg-dark w-50 " id="bg-dark">Enregistrer</button>
    </section>
</form>
</body>
</html>