<?php
    include('db.php');
    require 'panier.class.php';
    $panier = new Panier();

    if(isset($_GET['id'])) {
       $req = $bdd->query('SELECT * FROM consommables WHERE idconsommable='. $_GET['id']);
       $product = $req->fetch();
       if(empty($product)) {
            die('Ce produit n\'existe pas');
        }
        $panier->add($product->idconsommable);
        ?>
        <script>
            // document.location.href = 'index.php';
        </script>
      <?php
    } else {
        die('pas de produit');
    }
?>