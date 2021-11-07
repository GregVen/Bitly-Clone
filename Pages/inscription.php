<?php 
session_start();
try {
    $bdusers = new PDO('mysql:host=localhost;dbname=bitly;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
}

// function grainDeSel($x){
//     // Je crée une variable contenant tous les caractère permis en sha1
//     $chars = '0123456789abcdef';
//     // Une variable string pour acceuillir le résultat de ce random
//     $string = '';
//     // Je crée une boucle qui va choisir aléatoirement une série de x caractère, 
//     // le x étant le paramètre de ma fonction qui sera lui aussi généré aléatoirement
//     for($i = 0; $i < $x; $i++){
//         $string .= $chars[rand(0, strlen($chars) - 1)];
//     }
//     return $string;
// }

if(isset($_POST["login"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"])){
    // on assainit les données
    $donnees = array(
        'login'     => FILTER_SANITIZE_STRING,
        'name'      => FILTER_SANITIZE_STRING,
        'firstname' => FILTER_SANITIZE_STRING,
        'email'     => FILTER_SANITIZE_EMAIL,
        'password'  => FILTER_SANITIZE_STRING, 
    );

    $result = filter_input_array(INPUT_POST, $donnees);
    
    $name = htmlspecialchars($_POST["nom"]);
    $surname = htmlspecialchars($_POST["prenom"]);
    $login = htmlspecialchars($_POST["login"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    // $mdpmd5 = md5($mdp);
    // $gds = grainDeSel(rand(5,10));
    // $mdpfull = $gds . $mdpmd5;

        try {
            //Une requête qui contient des variables doit être préparer avant d'être exécuter
            //preparation
            $requete = $bdusers->prepare('INSERT INTO users(login, nom, prenom, email, password) VALUES(?,?,?,?,?)');
            //execution
            $requete->execute(array($login,$name,$surname,$email,$password));

  

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
        
    }
    
    ?>  



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style.css">
    <title>Inscription</title>
</head>
<body>
    <header>
    <a href=".."><img src="../src/img/bitly-logo.png" alt="bitly"></a>
        <nav>
            <ul>
                <li> <a href="#">Why Bitly?</a></li>
                 <li> <a href="#">Solution</a></li>
                <li> <a href="#">Features</a></li>
                <li> <a href="#">Pricing</a></li>
                <li> <a href="#">Ressources</a></li>
            </ul>
        </nav>
        <nav> 
            <ul>
                <li> <a href="login.php">Login</a></li>
                <li> <a href="inscription.php">Sign up</a></li>
                <li> <a href="#">Get a Quote</a></li>
            </ul>
        </nav>

    </header>

    <section>
    <div id="formulaire">

        <form method="post" action="">   
            <table id="table">
                <tr>
                    <td>Nom: </td>
                    <td><input type="text" name="nom" required="required" /></td>
                </tr>
                <tr>
                    <td>Prénom: </td>
                    <td><input type="text" name="prenom" required="required" /></td>
                </tr>
                <tr>
                    <td>eMail: </td>
                    <td><input type="email" name="email" required="required" /></td>
                </tr>
                <tr>
                    <td>Login: </td>
                    <td><input type="text" name="login"  required="required"/></td>
                </tr>
                <tr>
                    <td>Mot de passe: </td>
                    <td><input type="password" name="password" required="required"/></td>
                </tr>
            </table>
            <div class="bouton">
                <button type="submit">Envoyer</button>
            </div>
        </form>
        
    

</section>


</body>


