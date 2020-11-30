<?php
    class Mon{
        private $ma, $ten, $sotc;
        public function __construct($ma, $ten, $sotc)
        {
            $this->ma = $ma;
            $this->ten = $ten;
            $this->sotc = $sotc;
        }
        public function __destruct()
        {
            $this->ma = "";
            $this->ten = "";
            $this->sotc = "";
        }
        public function getMa(){
            return $this->ma;
        }
        public function getTen(){
            return $this->ten;
        }
        public function getSotc(){
            return $this->sotc;
        }
        public function load(){
            $xml = new SimpleXMLElement("mon.xml", null, true);
            echo "<table border='1'>
                    <tr>
                        <td>Ma mon</td>
                        <td>Ten mon</td>
                        <td>So TC</td>
                        <td>Select</td>
                    </tr>
            ";
            foreach($xml as $vl){
                $ma = $vl->mamh;
                $ten = $vl->tenmon;
                $so = $vl->sotc;
                echo "<tr>
                        <td>$ma</td>
                        <td>$ten</td>
                        <td>$so</td>
                        <td><a href='form_mon.php?ma1=$ma&ten1=$ten&so1=$so'>Edit</a></td>              
                    </tr>";
            }
            echo "</table>";
        }
        public function add(){
            $root = new DOMDocument("1.0");
            $root->load('mon.xml');

            $rootg = $root->getElementsByTagName("qlmh")->item(0);
            $parentg= $root->createElement("mon");
            $parentg->appendChild($root->createElement("mamh", $this->ma));
            $parentg->appendChild($root->createElement("tenmon", $this->ten));
            $parentg->appendChild($root->createElement("sotc", $this->sotc));
            $rootg->appendChild($parentg);

            $root->formatOutput=true;
            $root->save('mon.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root->load('mon.xml');
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("//mon[mamh = '$this->ma']");
            foreach($kq as $node){
                $parentg = $root->createElement("mon");
                $parentg->appendChild($root->createElement("mamh", $this->ma));
                $parentg->appendChild($root->createElement("tenmon", $this->ten));
                $parentg->appendChild($root->createElement("sotc", $this->sotc));

                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->formatOutput=true;
            $root->save('mon.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root->load('mon.xml');
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("//mon[mamh = '$this->ma']");
            foreach($kq as $node){
                $node->parentNode->removeChild($node);
            }
            $root->save('mon.xml');
        }
    }
?>