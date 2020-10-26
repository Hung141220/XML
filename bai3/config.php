<?php
    class Monhoc{
        private $mamon;
        private $tenmon;
        private $tengiangvien;
        private $thoigian;
        public function __construct($mamon,$tenmon,$tengiangvien,$thoigian)
        {
            $this->mamon=$mamon;
            $this->tenmon=$tenmon;
            $this->tengiangvien=$tengiangvien;
            $this->thoigian=$thoigian;
        }
        public function add($mamon, $tenmon, $tengiangvien, $thoigian){
            $root=new DOMDocument("1.0");
            $root->load("monhocs.xml");

            $roottag=$root->getElementsByTagName('monhocs')->item(0);
            //tra ve list phan tu cua monhocs
            $infotag=$root->createElement('monhoc');
            $infotag->setAttribute("id",$mamon);
            $tenmontag=$root->createElement('tenmon',$tenmon);
            $tengvtag=$root->createElement('tengiangvien',$tengiangvien);
            $thoigiantag=$root->createElement('thoigian',$thoigian);
            //tao thuoc tinh va cac nut
            $infotag->appendChild($tenmontag);
            $infotag->appendChild($tengvtag);
            $infotag->appendChild($thoigiantag);
            $roottag->appendChild($infotag);
            //tao cha con
            $root->save('monhocs.xml');
            //luu
        }
        public function update($mamon,$tenmon,$tengiangvien,$thoigian){
            $root=new DOMDocument("1.0");
            $root->load("monhocs.xml");
            $xpath=new DOMXPath($root);
            foreach($xpath->query("//monhoc[@id=$mamon]") as $node){
                $infotag=$root->createElement('monhoc');
                $infotag->setAttribute("id",$mamon);
                
                $tenmontag=$root->createElement('tenmon',$tenmon);
                $tengvtag=$root->createElement('tengiangvien',$tengiangvien);
                $thoigiantag=$root->createElement('thoigian',$thoigian);

                $infotag->appendChild($tenmontag);
                $infotag->appendChild($tengvtag);
                $infotag->appendChild($thoigiantag);

                $node->parentNode->replaceChild($infotag, $node);
            }
            $root->save('monhocs.xml');
        }
        public function delete($mamon){
            $root= new DOMDocument("1.0");
            $root->load('monhocs.xml');
            $xpath=new DOMXPath($root);
            foreach($xpath->query("/monhocs/monhoc[@id=$mamon]") as $node){
                $node->parentNode->removeChild($node);
            }
            $root->formatOutput=true;
            $root->save('monhocs.xml');
            
        }
        public function load(){
            $xml=new SimpleXMLElement("monhocs.xml",null,true);
            $html='';
            $html.="<table border='1' cellspacing='5' cellpadding='0'>
                    <tr>
                        <td>Ma mon</td>
                        <td>Ten mon</td>
                        <td>Ten giang vien</td>
                        <td>Thoi gian</td>
                    </tr>";
            foreach($xml as $mh){
                $html.="<tr>
                    <td>{$mh['id']}</td>
                    <td>{$mh->tenmon}</td>
                    <td>{$mh->tengiangvien}</td>
                    <td>{$mh->thoigian}</td>
                </tr>";
            }        
            $html.="</table>";
            return $html;
        }
    }
?>