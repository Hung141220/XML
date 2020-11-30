<?php
    class KH{
        private $mak, $ten, $dc;
        public function __construct($mak, $ten, $dc)
        {
            $this->mak = $mak;
            $this->ten = $ten;
            $this->dc = $dc;
        }
        public function __destruct()
        {
            $this->mak = "";
            $this->ten = "";
            $this->dc = "";
        }
        public function getMak(){return $this->mak;}
        public function getTen(){return $this->ten;}
        public function getDc(){return $this->dc;}
        public function load(){
            $xml = new SimpleXMLElement("khachhang.xml", null, true);
            echo "<table border ='1'>
                    <tr>
                        <td>Ma kh</td>
                        <td>Ten</td>
                        <td>Dia chi</td>
                        <td>Select</td>
                    </tr>
            ";
            foreach($xml as $vl){
                $ma = $vl->mak;
                $ten = $vl->ten;
                $dc = $vl->dc;
                echo "<tr>
                        <td>$ma</td>
                        <td>$ten</td>
                        <td>$dc</td>
                        <td><a href='form_kh.php?ma=$ma&ten=$ten&dc=$dc'>Edit</a></td>
                </tr>";
            }
            echo "</table>";
        }
        public function add(){
            $root = new DOMDocument("1.0");
            $root->load('khachhang.xml');

            $rootg = $root->getElementsByTagName("qlkh")->item(0);
            $parentg = $root->createElement("kh");
            $parentg->appendChild($root->createElement("mak", $this->mak));
            $parentg->appendChild($root->createElement("ten", $this->ten));
            $parentg->appendChild($root->createElement("dc", $this->dc));
            $rootg->appendChild($parentg);

            $root->formatOutput=true;
            $root->save('khachhang.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root->load('khachhang.xml');

            $xpath = new DOMXPath($root);
            $run = $xpath->query("//kh[mak = '$this->mak']");
            foreach($run as $node){
                $parentg = $root->createElement("kh");
                $parentg->appendChild($root->createElement("mak", $this->mak));
                $parentg->appendChild($root->createElement("ten", $this->ten));
                $parentg->appendChild($root->createElement("dc", $this->dc));

                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->formatOutput=true;
            $root->save('khachhang.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root->load('khachhang.xml');

            $xpath = new DOMXPath($root);
            $run = $xpath->query("//kh[mak = '$this->mak']");
            foreach($run as $node){
                $node->parentNode->removeChild($node);
            }
            $root->save('khachhang.xml');
        }
    }
?>