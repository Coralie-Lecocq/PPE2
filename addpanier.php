<?php
    include('db.php');
    require 'panier.class.php';
    $panier = new Panier();

    if(isset($_GET['id'])) {
        $product = $bdd->query('SELECT idconsommable FROM consommables WHERE idconsommable='. $_GET['id']);
        if(empty($product)) {
            die('Ce produit n\'existe pas');
        }
        $panier->add($product[0]->idconsommable);
        ?>
        <script>
            document.location.href = "index.php";
        </script>
      <?php
    } else {
        die('pas de produit');
    }
?>