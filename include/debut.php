<?php 
    
    //verifier si l'url contient la variable superglobale $_get["q"]
    if(isset($_GET["q"])){
        //on encapsule en securisant le "q" dans une variable
        $shortcut = htmlspecialchars($_GET["q"]);

        //on verifie que c'est un vrai raccourci
        $bdd = new PDO("mysql:host=localhost;dbname=bitly;charset=utf8","root","");
        $requete = $bdd ->prepare("SELECT count(*) AS x FROM links WHERE shortcut = ?");
        $requete->execute(array($shortcut));

        while($result = $requete->fetch()){
            if($result["x"] != 1){
                header("location: ../?error=true&message=Adresse URL non reconnue, veuiller réessayer");
                exit();
            }
        }

        //URL valide, on peut rediriger vers l'url originale
        $requete = $bdd->prepare("SELECT * FROM links WHERE shortcut = ?");
        $requete->execute(array($shortcut));

        while($result = $requete->fetch()){
            header("location: " .$result["link"]);
            exit();
        }

    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <title>Bitsy Clone</title>
</head>
<body>
    <header>
        <a href="."><img src="./src/img/bitly-logo.png" alt="bitly"></a>
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
                <li> <a href="../Pages/login.php">Login</a></li>
                <li> <a href="../Pages/inscription.php">Sign up</a></li>
                <li> <a href="#">Get a Quote</a></li>
            </ul>
        </nav>

    </header>

    <section id="section1">

<div>
    <h1>Short links, big results</h1>
    <p>A URL shortener built with powerful tools to help you grow and protect your brand.</p>
    <a href="#">Get Started for Free</a>
</div>
<img src="./src/img/background-mobile.jpg" alt="">

</section>
