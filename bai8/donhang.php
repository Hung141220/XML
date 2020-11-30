<?php 
    // include './khachhang.php';
    class DH{
        private $mak, $mah, $ten, $gia;
        public function __construct($mak, $mah, $ten, $gia)
        {
            $this->mak = $mak;
            $this->mah = $mah;
            $this->ten = $ten;
            $this->gia = $gia;
        }
        public function __destruct()
        {
            $this->mak = "";
            $this->mah = "";
            $this->ten = "";
            $this->gia = "";
        }
        public function getMak(){return $this->mak;}
        public function getMah(){return $this->mah;}
        public function getTen(){return $this->ten;}
        public function getGia(){return $this->gia;}
        public function select(){
            $xml = new SimpleXMLElement("donhang.xml",null, true);
            $xml1 = new SimpleXMLElement("khachhang.xml",null, true);

            $dh = array();
            $kh = array();
            $j = 0; $k = 0;
            // foreach($xml as $vl){
            //     $dh[$j] = new DH($vl->mak, $vl->mah, $vl->ten, $vl->gia);
            //     $j++;
            // }
            foreach($xml1 as $vl){
                $kh[$k] = new KH($vl->mak, $vl->ten, $vl->dc);
                $k++;
            }
            $mak1 = array();
            for($i = 0; $i < $k; $i++){
                $mak1[$i] = $kh[$i]->getMak();
            }
            return $mak1;
        }
        public function add(){
            $root = new DOMDocument("1.0");
            $root->load('donhang.xml');
            
            $rootg = $root->getElementsByTagName("qldh")->item(0);
            $parentg = $root->createElement("dh");
            $parentg->appendChild($root->createElement("mak", $this->mak));
            $parentg->appendChild($root->createElement("mah", $this->mah));
            $parentg->appendChild($root->createElement("ten", $this->ten));
            $parentg->appendChild($root->createElement("gia", $this->gia));
            $rootg->appendChild($parentg);

            $root->save('donhang.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root->load('donhang.xml');
            $xpath = new DOMXPath($root);
            $run = $xpath->query("//dh[mah = '$this->mah']");
            foreach($run as $node){
                $parentg = $root->createElement("dh");
                $parentg->appendChild($root->createElement("mak", $this->mak));
                $parentg->appendChild($root->createElement("mah", $this->mah));
                $parentg->appendChild($root->createElement("ten", $this->ten));
                $parentg->appendChild($root->createElement("gia", $this->gia));
                
                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->save('donhang.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root->load('donhang.xml');
            $xpath = new DOMXPath($root);
            $run = $xpath->query("//dh[mah = '$this->mah']");
            foreach($run as $node){
                $node->parentNode->removeChild($node);
            }
            $root->save('donhang.xml');
        }
        public function load(){
            $xml = new SimpleXMLElement("donhang.xml", null, true);
            echo "<table border='1'>
                <tr>
                    <td>Makh</td>
                    <td>Mahang</td>
                    <td>Ten</td>
                    <td>Gia</td>
                    </tr>
            ";
            foreach($xml as $vl){
                echo "<tr>
                        <td>{$vl->mak}</td>
                        <td>{$vl->mah}</td>
                        <td>{$vl->ten}</td>
                        <td>{$vl->gia}</td>
                </tr>";
            }
            echo "</table>";
        }
    }
?>
