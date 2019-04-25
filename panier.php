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
        <!-- nb de produit à reprendre dans la base : panier -->
        <h3>Votre panier contient: <span>3 Produits</span></h3>
        
        <form method="post" action="panier.php">
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>N.</th>	
                        <th>Produits</th>
                        <th>Quantité</th>
                        <th>Nom du Produit</th>
                        <th>Prix</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
        
                <!-- générer lignes / nb de produit -->
                <?php
                    include('db.php');
                    $ids = array_keys($_SESSION['panier']);
                    $req = $bdd->query(`SELECT * FROM products WHERE id IN(`.implode(`,`,$ids).`)`);
                    $product = $req->fetch();
                    foreach($products as $product):
                ?>
                <tr class="rem1">
                    <td class="invert">1</td>
                    <td class="invert-image"><a href="single.html"><img src="images/j3.jpg" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert"><?php echo $donnees->libelle; ?></td>
                    <td class="invert"><?php  echo $donnees->prix . "€"; ?></td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close1"> </div>
                        </div>
                        <script>$(document).ready(function(c) {
                            $('.close1').on('click', function(c){
                                $('.rem1').fadeOut('slow', function(c){
                                    $('.rem1').remove();
                                });
                                });	  
                            });
                       </script>
                    </td>
                </tr>
                <?php endforeach; ?>

                <!-- LIGNE 2
                <tr class="rem2">
                    <td class="invert">2</td>
                    <td class="invert-image"><a href="single.html"><img src="images/ss5.jpg" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Floral Border Skirt</td>
                    <td class="invert">$5.00</td>
                    <td class="invert">$270.00</td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close2"> </div>
                        </div>
                        <script>$(document).ready(function(c) {
                            $('.close2').on('click', function(c){
                                $('.rem2').fadeOut('slow', function(c){
                                    $('.rem2').remove();
                                });
                                });	  
                            });
                       </script>
                    </td>
                </tr>
                <!-- LIGNE 3 
                <tr class="rem3">
                    <td class="invert">3</td>
                    <td class="invert-image"><a href="single.html"><img src="images/c7.jpg" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">Beige Sandals</td>
                    <td class="invert">$5.00</td>
                    <td class="invert">$212.00</td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close3"> </div>
                        </div>
                        <script>$(document).ready(function(c) {
                            $('.close3').on('click', function(c){
                                $('.rem3').fadeOut('slow', function(c){
                                    $('.rem3').remove();
                                });
                                });	  
                            });
                       </script>
                    </td>
                </tr> -->
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
                    <li>Charges <i>-</i> <span>$15.00</span></li> <!-- somme de la colonne charges -->
                    <li>Total <i>-</i> <span>$697.00</span></li> <!-- total colonne -->
                </ul>
            </div>
            <div class="checkout-right-basket">
                <a href="?page=papier"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continuer vos achats</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
