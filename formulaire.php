<?php include 'header.php' ?>
<?php 
    
    if(!empty($_POST)){
        $errors=array();
        require_once 'conn.php';

        if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom'])  ){
            $errors['nom']="Votre nom n'est pas valide  (alphanumerique)";
        } 
        if(empty($_POST['postnom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['postnom']) ){
            $errors['postnom']="Votre postnom n'est pas valide ";
        }
        if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom']) ){
            $errors['prenom']="Votre prenom n'est pas valide";
        }
        if(empty($_POST['telephone'])|| !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['telephone']) ){
            $errors['telephone']="Votre numero de telephone n'est pas valide";
        }
        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email']="Votre email n'est pas valide";
        }else {
            $req= $pdo->prepare('SELECT matricule from users where email=?');
            $req->execute([$_POST['email']]);
            $user= $req->fetch();
            if($user){
                $errors['email']='Cet email est déjà utiliser';
            }
        }
        if(empty($_POST['adresse'])){
            $errors['adresse']="Votre adresse n'est pas valide";
        }
      
        //Insertion des données
       
        if(!empty($errors)){
            $nom = $_POST['nom'];
            $postnom = $_POST['postnom'];
            $prenom = $_POST['prenom'];
            $objet = $_POST['objet'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $adresse = $_POST['adresse'];
           
            $insertion = "INSERT INTO users ( nom, postnom, prenom , objet, telephone, email,adresse) 
            VALUES ('$nom', '$postnom', '$prenom', '$objet', '$telephone', '$email', '$adresse' )";
            $pdo->exec($insertion);
        
        }
    }

// ?>

<form action="" method="POST" class="container w-50">
<h1 class="text-center p-3 inscrite">S'inscire</h1>
  <?php   if(!empty($errors)): {} ?>
        <div class="alert alert-danger">
            <p>Veillez remplir le formulaire correctement</p>
            <?php   foreach($errors as $erro): ?>
            <ul>
            <li><?= $erro; ?></li></ul>
            <?php   endforeach; ?>
        </div>
  <?php   endif; ?>
    <div class="form-group">
    <label id="inscrit" for="">Nom</label>
    <input type="text" name="nom" class="form-control " required>
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
    <label id="inscrit" for="">Objet</label>
    <select name="objet" id="" class="form-control">
    <option value=""></option>
    <option value="cl">Conception des logiciels</option>
    <option value="rt">Redaction Tfc</option>
    <option value="ce">Cours d'encadrement</option>
    </select>
    </div>
    <div class="form-group ">
    <label id="inscrit" for="">Télephone</label>
    <input type="text" name="telephone" class="form-control " required>
    </div>
    <div class="form-group">
    <label id="inscrit" for="">Email</label>
    <input type="email" name="email" class="form-control " required>
    </div>
    <label id="inscrit" for="">Adresse complet</label>
    <input type="text" name="adresse" class="form-control " required>
    </div>
    <button type="submit" class="btn btn-primary bg-dark w-50 " id="bg-dark">M'inscrire</button>
  
</form>
<footer>
	<?php include 'footer.php' ?>
</footer>


