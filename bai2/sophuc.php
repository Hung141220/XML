<?php
    class Sophuc{
        private $phanthuc;
        private $phanao;
        public function __construct($pt, $pa){
            $this->phanthuc=$pt;
            $this->phanao=$pa;
        }
        public function __destruct()
        {
            $this->phanthuc=0;
            $this->phanao=0;
        }
        public function getPT(){
            return $this->phanthuc;
            
        }
        public function getPA(){
            return $this->phanao;
        }
        public function cong($sp1,$sp2){
            $sp3=new Sophuc(0,0);
            $pt = ($sp1->phanthuc+$sp2->phanthuc);
            $pa=($sp1->phanao+$sp2->phanao);
            $sp3->phanthuc=$pt;
            $sp3->phanao=$pa;
            return $sp3;
        }
        public function tru($sp1,$sp2){
            $sp3=new Sophuc(0,0);
            $pt = ($sp1->phanthuc-$sp2->phanthuc);
            $pa=($sp1->phanao-$sp2->phanao);
            $sp3->phanthuc=$pt;
            $sp3->phanao=$pa;
            return $sp3;
        }
        public function nhan($sp1,$sp2){
            $sp3=new Sophuc(0,0);
            $pt = ($sp1->phanthuc*$sp2->phanthuc-$sp1->phanao*$sp2->phanao);
            $pa=($sp1->phanao*$sp2->phanao+$sp1->phanthuc*$sp2->phanthuc);
            $sp3->phanthuc=$pt;
            $sp3->phanao=$pa;
            return $sp3;
        }
        public function chia($sp1,$sp2){
            $sp3=new Sophuc(0,0);
            $pt = ($sp1->phanthuc*$sp2->phanthuc+$sp1->phanao*$sp2->phanao)/($sp1->phanao*$sp2->phanao+$sp1->phanthuc*$sp2->phanthuc);
            $pa=($sp1->phanthuc*$sp2->phanao-$sp2->phanthuc*$sp1->phanao)/($sp1->phanao*$sp2->phanao+$sp1->phanthuc*$sp2->phanthuc);
            $sp3->phanthuc=$pt;
            $sp3->phanao=$pa;
            return $sp3;
        }

    }
?>
