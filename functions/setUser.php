<?php
// Etape 1 : config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "";
// Etape 2 : Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
var_dump($_POST);
// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide

if(empty($_POST["pseudo"] && $_POST["password"] && $_POST["email"])){
    echo 'indications maquantes';
}
elseif($_POST["password"] != $_POST["passwordCorfirmed"]){
    echo 'mots de passe différents';
}
    // Ajouter un input confirm password et vérifier si les deux sont égaux

// Ajouter un champ email

// Etape 3 : prepare request
else{
$req = $db->prepare("INSERT INTO users (pseudo, password, email) VALUES(:pseudo, :password, :email)");
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);
$req->bindParam(":email", $_POST["email"]);
$req->execute();
echo 'inscription confirmed';
}