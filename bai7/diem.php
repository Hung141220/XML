<?php
    class Diem{
        private $masv, $mamh, $diem;
        public function __construct($masv, $mamh, $diem)
        {
            $this->masv = $masv;
            $this->mamh = $mamh;
            $this->diem = $diem;
        }
        public function __destruct()
        {
            $this->masv = "";
            $this->mamh = "";
            $this->diem = "";
        }
        public function getMasv(){
            return $this->masv;
        }
        public function getMamh(){
            return $this->mamh;
        }
        public function getDiem(){
            return $this->diem;
        }
        public function load(){
            $xml = new SimpleXMLElement("diem.xml", null, true);
            echo "<table border='1'>
                    <tr>
                        <td>Ma sv</td>
                        <td>Ma mh</td>
                        <td>Diem</td>
                        
                    </tr>
            ";
            foreach($xml as $vl){
                echo "<tr>
                    <td>{$vl->masv}</td>
                    <td>{$vl->mamh}</td>
                    <td>{$vl->diem}</td>
                </tr>";
            }
            echo "</table>";
        }
        public function add(){
            $root = new DOMDocument("1.0");
            $root -> load('diem.xml');

            $rootg = $root->getElementsByTagName("qld")->item(0);
            $parentg  = $root->createElement("sv");
            $rootg->appendChild($parentg);
            $parentg->appendChild($root->createElement("masv", $this->masv));
            $parentg->appendChild($root->createElement("mamh", $this->mamh));
            $parentg->appendChild($root->createElement("diem", $this->diem));

            $root->save('diem.xml');
        }
        public function update(){
            $root = new DOMDocument("1.0");
            $root->load('diem.xml');
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("//sv[masv='$this->masv']");
            foreach($kq as $node){
                $parentg  = $root->createElement("sv");
                $parentg->appendChild($root->createElement("masv"), $this->masv);
                $parentg->appendChild($root->createElement("mamh", $this->mamh));
                $parentg->appendChild($root->createElement("diem", $this->diem));
                $node->parentNode->replaceChild($parentg, $node);
            }
            $root->save('diem.xml');
        }
        public function delete(){
            $root = new DOMDocument("1.0");
            $root->load('diem.xml');
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("//sv[masv='$this->masv']");
            foreach($kq as $node){
                $node->parentNode->removeChild($node);
            }
            $root->save('diem.xml');
        }
    }
?>