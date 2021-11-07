
<?php
    session_start();
    require "./include/debut.php";
    //verifie la reception des données
    if(isset($_POST["Link"])):
        //envoyer l'url dans une variable
        $url = $_POST["Link"];

        //verififer si l'url est valide
        if(!filter_var($url, FILTER_VALIDATE_URL)):
            //si l'url n'est pas un lien, on simule un GET qui prend "true" comme valeur et un 
            // message que le user aura en affichage
            header("location: ../?error=true&message=url n'est pas valide");
            //on declenche un exit lorsque l'on demande une redirection
            exit();
        endif;

        //raccourcir l'url avec la fonction crypt
        $shortcut = crypt($url, rand());

        //verifier si l'url est existante dans la db
            //variable pour se connecter à la db
        $bdd = new PDO("mysql:host=localhost;dbname=bitly;charset=utf8","root","");
            //je prépare ma requete //si count > 0, url deja presente dans la db
            //et on recupere l'url récupérée pour l'afficher à notre visiteur
        $requete = $bdd-> prepare("SELECT COUNT(*) AS x, shortcut from links where link like ?");
            //on execute la requete
        $requete -> execute(array($url));
            //fetch lit la ligne en cours
        while($resultat = $requete ->fetch()):
                //on va recuperer le "x" de "AS x" de la requete, et si x=1, alors il y a deja une entree dans la db
            if($resultat["x"] != 0):
                //je recupere l'url raccourci qui se trouve dans la colonne shortcgut de la db capturée dans la varible result["shortcut"]
                $_SESSION["shortcut"] = $resultat["shortcut"];//avec un session_start au debut
                //je redirige l'utilisateur vers une url personnalisée avec un get
                header("location: ../?error=true&message=Adresse déjà raccourcie");
                exit();
            endif;
        endwhile;
        
        //stocker l'url et son raccourci dans la db 
            //je prépapare ma requete sur la table links et j'envoie dans les colonnes links et shortcut
        $requete = $bdd->prepare("INSERT INTO links(link, shortcut) VALUE (?, ?)");

            //je lance la fonction execute
        $requete -> execute(array($url, $shortcut));

        //afficher l'url raccourci a l'utilisateur
            //on redirige l'utilisateur vers une url où l avaleur raccourcie sera encapsulé dans un get
        header("location: ../?short=" .$shortcut);
        exit();




        //mise en place relation url raccourci et lien physique db





    endif;



?>


    <section id="section2">
        <form action="" method="post">
            <input id="inputtext" type="url" name="Link" placeholder="    Shorten your link" required>
            <input id="inputsubmit" type="submit" value="Shorten">
        </form>
        <p>By clicking SHORTEN, you are agreeing to Bitly’s <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></p>
        
        <?php
        if(isset($_GET["short"]))://lien obtenue du get de la ligne 54
         ?>

        <div class="erreur">
            <h4>URL RACCOURCIE :</h4>
            <h3>http://localhost/?q=<?=  htmlspecialchars($_GET["short"]); ?></h3>
        </div>

        <?php 
        endif; 


        if(isset($_GET["error"]) && $_GET["error"] == true){
            
            if($_GET["message"] == "Adresse déjà raccourcie"){
        ?>
        
        <div class="erreur">
            <h4><?= $_GET["message"] ?></h4>
            <h4>URL DEJA RACCOURCIE :</h4>
            <h3>http://localhost/?q=<?=  $_SESSION["shortcut"]?></h3>
        </div>
        
        <?php 
            
            } else {
        ?>
        <div class="erreur">
            <h4><?= $_GET["message"] ?></h4>
        </div>

        <?php

            }
        }
        ?>
    </section>



<?php 
 require "./include/footer.php";
?>