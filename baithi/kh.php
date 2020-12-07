<?php
    class KH{
        private $ma, $ten, $dc;
        public function __construct($ma, $ten, $dc)
        {
            $this->ma  = $ma;
            $this->ten = $ten;
            $this->dc = $dc;
        }
        public function __destruct()
        {
            $this->ma = "";
            $this->ten = "";
            $this->dc = "";
        }
        public function load(){
            $xml = new SimpleXMLElement("kh.xml", null, true);
            echo "<table border='1'>
                    <tr>
                        <td>Ma KH</td>
                        <td>Ten KH</td>
                        <td>Dia chi</td>
                        <td>Select</td>
                    </tr>
            ";
            foreach($xml as $vl){
                $ma = $vl->makh;
                $ten = $vl->tenkh;
                $dc = $vl->diachi;
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
            $root->load('kh.xml');

            $rootg = $root->getElementsByTagName("qlkh")->item(0);
            $parentg = $root->createElement("kh");
            
            $rootg->appendChild($parentg);
            $parentg->appendChild($root->createElement("makh", $this->ma));
            $parentg->appendChild($root->createElement("tenkh", $this->ten));
            $parentg->appendChild($root->createElement("diachi", $this->dc));

            $root->save('kh.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root->load('kh.xml');

            $xp = new DOMXPath($root);
            $kq = $xp->query("//kh[makh = '$this->ma']");
            foreach($kq as $node){
                $parentg = $root->createElement("kh");
                $parentg->appendChild($root->createElement("makh", $this->ma));
                $parentg->appendChild($root->createElement("tenkh", $this->ten));
                $parentg->appendChild($root->createElement("diachi", $this->dc));

                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->save('kh.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root->load('kh.xml');

            $xp = new DOMXPath($root);
            $kq = $xp->query("//kh[makh = '$this->ma']");
            foreach($kq as $node){
                
                $node->parentNode->removeChild($node);
            }
            $root->save('kh.xml');
        }
    }
?>