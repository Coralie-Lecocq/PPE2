<?php
   
    include ("db.php");
        
    /* DEBUT VERIFICATION DE LA RECEPTION DE FORMULAIRE */
    if (isset($_POST['user']) && isset($_POST['passwd'])){      // cas ou on reçoit un formulaire
        $login = addslashes($_POST['user']);
        $passwd = $_POST['passwd'];
        
        $reqUsr = 'SELECT * FROM clients WHERE email LIKE "' .$login.'"';
        if($usr = $bdd->query($reqUsr)){
            if($u = $usr->fetch()){
                if($u->pwd == $passwd){
                    $_SESSION['nom'] = $u->nom;
                    $_SESSION['prenom'] = $u->prenom;
                    echo "connecté(e)";
                }else{
                    echo "erreur dans le mot de passe";
                }   
            }else{
                echo "utilisateur inconnu";
            }
        }else{
            echo "erreur";
        }    
    }
    /* FIN VERIFICATION DE LA RECEPTION DE FORMULAIRE */
?>
