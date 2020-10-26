<?php
    class Phanso{
        private $tuso;
        private $mauso;
        public function __construct($ts, $ms){
            $this->tuso=$ts;
            $this->mauso=$ms;            
        }
        public function __destruct()
        {
            $this->tuso=0;
            $this->mauso=0;
        }
        public function getTS(){
            return $this->tuso;
        }
        public function getMS(){
            return $this->mauso;
        }
        public function toigian($ps){
            $b=abs($ps->mauso);
            $a=abs($ps->tuso);
            while($a<>$b){
                if($a>$b) $a=$a-$b;
                if($b>$a) $b=$b-$a;
            }
            $us=$a;
            $ps->mauso=$ps->mauso/$us;
            $ps->tuso=$ps->tuso/$us;
            return $ps;
        }
        public function tong($ps1,$ps2){
            $ps3 = new Phanso(0,0);
            $ts=($ps1->tuso*$ps2->mauso+$ps1->mauso*$ps2->tuso);
            $ms=$ps1->mauso*$ps2->mauso;
            $ps3->tuso=$ts;
            $ps3->mauso=$ms;
            return $ps3;
        }
        public function tru($ps1,$ps2){
            $ps3 = new Phanso(0,0);
            $ts=($ps1->tuso*$ps2->mauso-$ps1->mauso*$ps2->tuso);
            $ms=$ps1->mauso*$ps2->mauso;
            $ps3->tuso=$ts;
            $ps3->mauso=$ms;
            return $ps3;
        }
        public function nhan($ps1,$ps2){
            $ps3 = new Phanso(0,0);
            $ts=($ps1->tuso*$ps2->tuso);
            $ms=$ps1->mauso*$ps2->mauso;
            $ps3->tuso=$ts;
            $ps3->mauso=$ms;
            return $ps3;
        }
        public function chia($ps1,$ps2){
            $ps3 = new Phanso(0,0);
            $ts=($ps1->tuso*$ps2->mauso);
            $ms=$ps1->mauso*$ps2->tuso;
            $ps3->tuso=$ts;
            $ps3->mauso=$ms;
            return $ps3;
        }
    }
?>