<div class="banner10">
    <div class="container">
        <h2>Bornes</h2> 
    </div>
</div>

<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Borne photo</li>
			</ul>
		</div>
</div>

<br>

<?php
        // On récupère tout le contenu de la table 
        $req = $bdd->query('SELECT * FROM bornes');
        $bornes = $req->fetchAll();
        
        foreach($bornes as $borne):
        ?>
            <div class="w3ls_dresses_grid_right_grid3">
                <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                        <div class="agile_ecommerce_tab_left dresses_grid">
                            <div class="hs-wrapper hs-wrapper2">
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <img src="images/papier_1.jpg" alt=" " class="img-responsive" />
                                <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                            <h5><a href="?page=single"><?php echo $borne->libelle; ?></a></h5>
                            <div class="simpleCart_shelfItem">
                                <p><span><?php  echo $borne->prix + (20/100)*$borne->prix . "€"; ?></span> <i class="item_price"><?php  echo $borne->prix . "€"; ?></i></p>
                                <p><a class="item_add" href="addpanier.php?id=<?php echo $borne->idBornes; ?>&type=borne">Ajouter au panier</a></p>
                            </div>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
        <div class="clearfix"> </div>

                                
               


