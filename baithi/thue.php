<?php
    class T{
        private $mak, $map, $so;
        public function __construct($mak, $map, $so)
        {
            $this->mak = $mak;
            $this->map = $map;
            $this->so = $so;
        }
        public function __destruct()
        {
            $this->mak = "";
            $this->map = "";
            $this->so = "";
        }
        public function load(){
            $xml = new SimpleXMLElement("thue.xml", null, true);
            echo "<table border='1'>
                    <tr>
                        <td>Ma KH</td>
                        <td>Ma phong</td>
                        <td>So ngay</td>
                    </tr>
            ";
            foreach($xml as $vl){
                $mak = $vl->makh;
                $map = $vl->maphong;
                $so = $vl->songay;
                echo "<tr>
                        <td>$mak</td>
                        <td>$map</td>
                        <td>$so</td>
                </tr>";
            }
            echo "</table>";

        }
        public function add(){
            $root = new DOMDocument("1.0");
            $root->load('thue.xml');

            $rootg = $root->getElementsByTagName("ql")->item(0);
            $parentg = $root->createElement("thue");

            $parentg->appendChild($root->createElement("makh", $this->mak));
            $parentg->appendChild($root->createElement("maphong", $this->map));
            $parentg->appendChild($root->createElement("songay", $this->so));
            $rootg->appendChild($parentg);

            $root->save('thue.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root->load('thue.xml');

            $xp = new DOMXPath($root);
            $kq = $xp->query("//thue[makh='$this->mak']");
            foreach($kq as $node){
                $parentg = $root->createElement("thue");

                $parentg->appendChild($root->createElement("makh", $this->mak));
                $parentg->appendChild($root->createElement("maphong", $this->map));
                $parentg->appendChild($root->createElement("songay", $this->so));
                
                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->save('thue.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root->load('thue.xml');

            $xp = new DOMXPath($root);
            $kq = $xp->query("//thue[makh='$this->mak']");
            $kq1 = $xp->query("//thue[maphong='$this->map']");
            foreach($kq as $node){
                
                $node->parentNode->removeChild($node);
            }
            $root->save('thue.xml');
        }
    }
?>