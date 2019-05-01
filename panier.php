<?php
    if(isset($_GET['del'])) {
        $panier->del($_GET['del']);
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
        if(empty($ids)) {
            $products = array();
        } else {
            $req = $bdd->query('SELECT * FROM consommables WHERE idconsommable IN ('. implode(',', $ids) . ')');
            $products = $req->fetchAll();
        }
    ?>
        <!-- nb de produit à reprendre dans la base : panier -->
        <h3>Votre panier contient: <span><?php echo count($_SESSION['panier']); ?> Produit(s)</span></h3>
        
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
                    foreach($products as $product):
                ?>
                <tr class="rem<?php echo $product->idconsommable; ?>">
                    <td class="invert-image"><a href="single.html"><img src="images/borne_2.jpg" alt=" " class="img-responsive" width="50px" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span><?php echo $_SESSION['panier'][$product->idconsommable];  ?></span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert"><?php echo $product->libelle; ?></td>
                    <td class="invert"><?php  echo $product->prix * $_SESSION['panier'][$product->idconsommable] . "€"; ?></td>
                    <td class="invert">
                        <div class="rem">
                            <a href='?page=panier&del=<?php echo $product->idconsommable; ?>'><div class="close1"></div></a>
                        </div>
                      <!--  <script>$(document).ready(function(c) {
                            $('.close<?php echo $product->idconsommable; ?>').on('click', function(c){        
                                $('.rem<?php echo $product->idconsommable; ?>').fadeOut('slow', function(c){
                                    $('.rem<?php echo $product->idconsommable; ?>').remove();
                                });
                                });	  
                            });
                       </script> -->
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
                    <li>Product1 <i>-</i> <span>$200.00 </span></li>
                    <li>Product2 <i>-</i> <span>$270.00 </span></li>
                    <li>Product3 <i>-</i> <span>$212.00 </span></li>
                    <li>Total <i>-</i> <span>$697.00</span></li> <!-- total colonne -->
                </ul>
            </div>
            <div class="checkout-right-basket">
                <a href="?page=borne"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continuer vos achats</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>