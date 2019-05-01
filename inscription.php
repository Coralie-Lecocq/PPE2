<html>
    <head>
        <title>Chop Ta Photo</title>
<!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Women's Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
                function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script src="js/jquery.min.js"></script>
        <!-- //js -->
        <!-- countdown -->
        <link rel="stylesheet" href="css/jquery.countdown.css" />
        <!-- //countdown -->
        <!-- cart -->
        <script src="js/simpleCart.min.js"></script>
        <!-- cart -->
        <!-- for bootstrap working -->
        <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
        <!-- //for bootstrap working -->
        <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- start-smooth-scrolling -->
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){		
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
<!-- //end-smooth-scrolling -->
    </head>
    
    <body>
        
        <?php
            include ('db.php');
           
            if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['passwd'], $_POST['confirmpasswd']))
            {
                if ($_POST['passwd'] == $_POST['confirmpasswd'])
                {
                    $nom = addslashes($_POST['nom']);
                    $prenom = addslashes($_POST['prenom']);
                    $email = addslashes($_POST['email']);
                    $passwd = md5($_POST['passwd']);
                        
                    $req = 'INSERT INTO clients (email, password, nom, prenom) VALUES ("' .$email.'", "' .$passwd. '", "' .$nom. '", "'.$prenom.'")';

                    if($insertUsr = $bdd->query($req))
                    {
                        echo " UTILISATEUR AJOUTE AVEC ID : " . $bdd->lastInsertId();
                    }    
                    else
                    {
                        echo " FAIL ! Le login ou l'email est déjà utilisé. " . $bdd->errorInfo()[2];
                    }
                }              
            }
        ?>
        
        
        <div class="container">
	       <div class="login-container">
                <div id="output"></div>
                <div class="avatar"></div>
                <div class="form-box">
                    <form action="inscription.php" method="POST">
                        <input name="nom" type="text" placeholder="Nom" required autofocus>
                        <input name="prenom" type="text" placeholder="Prénom" required>
                        <input name="email" type="email" placeholder="email" required>
                        <input name="passwd" type="password" placeholder="Mot de passe" required>
                        <input name="confirmpasswd" type="password" placeholder="Répétez le mot de passe" required>
				        <button class="btn btn-info btn-block login" type="submit">S'inscrire</button>
			         </form>
                        <a href="formLogin.php">Se connecter</a><br/>
                        <a href='index.php'>Retour au site</a>
		          </div>
	       </div>
        </div>
    </body>
</html>