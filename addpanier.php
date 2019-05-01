<?php
    include('_header.php');

    if(isset($_GET['id'])) {
       $req = $bdd->query('SELECT * FROM consommables WHERE idconsommable='. $_GET['id']);
       $product = $req->fetch();
       if(empty($product)) {
            die('Ce produit n\'existe pas');
        }
        $panier->add($product->idconsommable);
         //    die("produit ajouté <a href='javascript:window.history.back()'>retour</a>");
        
        ?>
        <script>
           document.location.href = 'javascript:window.history.back()';
        </script>
      <?php
    } else {
        die('pas de produit');
    }
?>