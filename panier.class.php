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

        public function add($product_id, $type) {
            if(isset($_SESSION['panier'][$type][$product_id])) {
                $_SESSION['panier'][$type][$product_id]++;
            } else {
                $_SESSION['panier'][$type][$product_id] = 1;
            }
        }

        public function remove($product_id, $type) {
            if(isset($_SESSION['panier'][$type][$product_id])) {
                if($_SESSION['panier'][$type][$product_id] !== 1) {
                    $_SESSION['panier'][$type][$product_id]--;
                }
            }
        }

        public function del($product_id, $type){
            unset($_SESSION['panier'][$type][$product_id]);
        }
    }
?>