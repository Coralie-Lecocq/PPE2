<?php
    if(isset($_GET['del'])) {
        $panier->del($_GET['del'], $_GET['type']);
    }
?>

<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil</a> <i>/</i></li>
				<li>Panier</li>
			</ul>
		</div>
	</div>

<div class="checkout">
    <div class="container">
    <?php
        $ids = array_keys($_SESSION['panier']);
        $idsConsommables = array_keys($_SESSION['panier']['consommable']);
        $idsBornes = array_keys($_SESSION['panier']['borne']);
        if(empty($ids)) {
            $consommables = array();
            $bornes = array();
        } else {
            if(empty($idsConsommables)) {
                $consommables = array();
            } else {
                $req = $bdd->query('SELECT * FROM consommables WHERE idconsommable IN ('. implode(',', $idsConsommables) . ')');
                $consommables = $req->fetchAll();
            }

            if (empty($idsBornes)) {
                $bornes = array();
            } else {
                $req = $bdd->query('SELECT * FROM bornes WHERE idBornes IN ('. implode(',',   $idsBornes) . ')');
                $bornes = $req->fetchAll();
            }
        }
    

    ?>
        <!-- nb de produit à reprendre dans la base : panier -->
        <h3>Votre panier contient: <span><?php echo count($_SESSION['panier']['consommable']) + count($_SESSION['panier']['borne']); ?> Produit(s)</span></h3>
        
        <form method="post" action="panier.php">
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Produits</th>
                        <th>Quantité</th>
                        <th>Nom du Produit</th>
                        <th>Prix</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
        
                <!-- générer lignes / nb de produit -->
                <?php  
                    foreach($consommables as $consommable):
                ?>
                <tr class="rem1">
                    <td class="invert-image"><a href="single.html"><img src="images/borne_2.jpg" alt=" " class="img-responsive" width="50px" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span><?php echo $_SESSION['panier']['consommable'][$consommable->idconsommable];  ?></span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert"><?php echo $consommable->libelle; ?></td>
                    <td class="invert"><?php  echo $consommable->prix * $_SESSION['panier']['consommable'][$consommable->idconsommable] . "€"; ?></td>
                    <td class="invert">
                        <div class="rem">
                            <a href='?page=panier&type=consommable&del=<?php echo $consommable->idconsommable; ?>'><div class="close1"></div></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>

                 <?php  
                    foreach($bornes as $borne):
                ?>
                <tr class="rem1">
                    <td class="invert-image"><a href="single.html"><img src="images/borne_2.jpg" alt=" " class="img-responsive" width="50px" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span><?php echo $_SESSION['panier']['borne'][$borne->idBornes];  ?></span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert"><?php echo $borne->libelle; ?></td>
                    <td class="invert"><?php  echo $borne->prix * $_SESSION['panier']['borne'][$borne->idBornes] . "€"; ?></td>
                    <td class="invert">
                        <div class="rem">
                            <a href='?page=panier&type=borne&del=<?php echo $borne->idBornes; ?>'><div class="close1"></div></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>

                            <!--quantity-->
                                <script>
                                $('.value-plus').on('click', function(){
                                    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                    divUpd.text(newVal);
                                });

                                $('.value-minus').on('click', function(){
                                    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                    if(newVal>=1) divUpd.text(newVal);
                                });
                                </script>
                            <!--quantity-->
            </table>
        </div>
        </form>
        <div class="checkout-left">	
            <div class="checkout-left-basket">
                <h4>Récapitulatif de la commande</h4>
                <ul>
                    <!-- nom produit et prix : base  -->
                    <?php  
                    $totalconsommable = 0;
                    foreach($consommables as $consommable):
                        $totalconsommable += $consommable->prix * $_SESSION['panier']['consommable'][$consommable->idconsommable];
                    ?>
                    <li><?php echo $consommable->libelle; ?> <i></i> <span><?php  echo $consommable->prix * $_SESSION['panier']['consommable'][$consommable->idconsommable] . "€"; ?></span></li>
                    <?php endforeach; ?>

                    <?php 
                    $totalborne = 0; 
                    foreach($bornes as $borne):
                        $totalborne += $borne->prix * $_SESSION['panier']['borne'][$borne->idBornes];
                    ?>
                     <li><?php echo $borne->libelle; ?> <i></i> <span><?php  echo $borne->prix * $_SESSION['panier']['borne'][$borne->idBornes] . "€"; ?></span></li>
                    <?php endforeach; 
                    $_SESSION['total'] = $totalconsommable + $totalborne;
                    ?>
                    <li>Total <i></i> <span><?php echo $totalconsommable + $totalborne . "€"?></span></li> <!-- total colonne -->
                </ul>
            </div>
            <div class="checkout-right-basket">
                <a href="?page=borne"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continuer vos achats</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>