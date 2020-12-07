<?php
    class P{
        private $ma, $ten, $gia;
        public function __construct($ma, $ten, $gia)
        {
            $this->ma = $ma;
            $this->ten = $ten;
            $this->gia = $gia;
        }
        public function __destruct()
        {
            $this->ma = "";
            $this->ten = "";
            $this->gia = "";
        }
        public function load(){
            $xml = new SimpleXMLElement("phong.xml", null, true);
            echo "<table border='1'>
                    <tr>
                        <td>Ma phong</td>
                        <td>Ten phong</td>
                        <td>Gia</td>
                        <td>Select</td>
                    </tr>
            ";
            foreach($xml as $vl){
                $ma  = $vl->maphong;
                $ten = $vl->tenphong;
                $gia = $vl->gia;
                echo "<tr>
                        <td>$ma</td>
                        <td>$ten</td>
                        <td>$gia</td>
                        <td><a href='form_p.php?ma=$ma&ten=$ten&gia=$gia'>Edit</a></td>
                </tr>";
            }
            echo "</table>";
        }
        public function add(){
            $root = new DOMDocument("1.0");
            $root->load('phong.xml');

            $rootg = $root->getElementsByTagName("qlp")->item(0);
            $parentg = $root->createElement("p");

            $rootg->appendChild($parentg);
            $parentg->appendChild($root->createElement("maphong", $this->ma));
            $parentg->appendChild($root->createElement("tenphong", $this->ten));
            $parentg->appendChild($root->createElement("gia", $this->gia));

            $root->save('phong.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root -> load('phong.xml');

            $xp = new DOMXPath($root);
            $kq = $xp->query("//p[maphong='$this->ma']");
            foreach($kq as $node){
                $parentg = $root->createElement("p");

                $parentg->appendChild($root->createElement("maphong", $this->ma));
                $parentg->appendChild($root->createElement("tenphong", $this->ten));
                $parentg->appendChild($root->createElement("gia", $this->gia));

                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->save('phong.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root -> load('phong.xml');

            $xp = new DOMXPath($root);
            $kq = $xp->query("//p[maphong='$this->ma']");
            foreach($kq as $node){

                $node->parentNode->removeChild($node);
            }
            $root->save('phong.xml');
        }
    }
?>