<?php
    include('_header.php');

    if(isset($_GET['id']) && isset($_GET['type'])) {
        if($_GET['type'] === 'consommable') {
            $req = $bdd->query('SELECT * FROM consommables WHERE idconsommable='. $_GET['id']);
            $product = $req->fetch();
            if(empty($product)) {
                 die('Ce produit n\'existe pas');
             }
             $panier->add($product->idconsommable, 'consommable');
        } 
        if($_GET['type'] === 'borne') {
            $req = $bdd->query('SELECT * FROM bornes WHERE idBornes='. $_GET['id']);
            $product = $req->fetch();
            if(empty($product)) {
                 die('Ce produit n\'existe pas');
             }
             $panier->add($product->idBornes, 'borne');
        }
        ?>
        <script>
           document.location.href = 'javascript:window.history.back()';
        </script>
      <?php
    } else {
        die('pas de produit');
    }
?>