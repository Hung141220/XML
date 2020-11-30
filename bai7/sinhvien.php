<?php
    class Sinhvien{
        private $ma, $ten, $gt;
        public function __construct($ma, $ten, $gt){
            $this->ma = $ma;
            $this->ten = $ten;
            $this->gt = $gt;
        }
        public function __destruct(){
            $this->ma = "";
            $this->ten = "";
            $this->gt ="";
        }
        public function getMa(){
            return $this->ma;
        }
        public function getTen(){
            return $this->ten;
        }
        public function getGt(){
            return $this->gt;
        }
        public function load(){
            $xml = new SimpleXMLElement("sv.xml", null, true);
            echo "<table border='1'>
                    <tr>
                        <td>Ma sv</td>
                        <td>Ho ten</td>
                        <td>Gioi tinh</td>
                        <td>Select</td>
                    </tr>
            ";
            foreach($xml as $vl){
                $ma = $vl->masv;
                $ten = $vl->hoten;
                $gt = $vl->gioitinh;
                echo "<tr>
                        <td>$ma</td>
                        <td>$ten</td>
                        <td>$gt</td>
                        <td><a href='form_sv.php?masv=$ma&tensv=$ten&gtsv=$gt'>Edit</a></td>
                    </tr>";
            }
            echo "</table>";
        }
        public function add(){
            $root = new DOMDocument("1.0");
            $root -> load('sv.xml');

            $rootg = $root->getElementsByTagName("qlsv")->item(0);
            $parentg = $root->createElement("sv");
            $parentg->appendChild($root->createElement("masv",$this->ma));
            $parentg->appendChild($root->createElement("hoten",$this->ten));
            $parentg->appendChild($root->createElement("gioitinh",$this->gt));
            $rootg->appendChild($parentg);

            $root->formatOutput=true;
            $root->save('sv.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root->load('sv.xml');

            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlsv/sv[masv='$this->ma']");
            foreach($kq as $node){
                $parentg = $root->createElement("sv");
                $parentg->appendChild($root->createElement("masv", $this->ma));
                $parentg->appendChild($root->createElement("hoten", $this->ten));
                $parentg->appendChild($root->createElement("gioitinh", $this->gt));

                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->formatOutput=true;
            $root->save('sv.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root->load('sv.xml');

            $xpath = new DOMXPath($root);
            $kq = $xpath->query("//sv[masv='$this->ma']");
            foreach($kq as $node){
                $node->parentNode->removeChild($node);
            }
            $root->save('sv.xml');
        }
    }
?>