<?php 
    class Panier {
        public function __construction() {
            if(isset($_SESSION)) {
                session_start();
            }
            if(isset($_SESSION['panier'])) {
                $_SESSION['panier'] = array();
            }
        }

        public function add($product_id) {
            if(isset($_SESSION['panier'][$product_id])) {
                $_SESSION['panier'][$product_id]++;
            } else {
                $_SESSION['panier'][$product_id] = 1;
            }
        }

        public function del($product_id){
            unset($_SESSION['panier'][$product_id]);
            var_dump($_SESSION);
        }
    }
?>