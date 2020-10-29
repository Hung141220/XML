<?php
    class Khachhang{
        public function load(){
            $xml=new SimpleXMLElement("list.xml",null,true);
            $txt='';
            $txt.="<table border='1' cellpadding='5' cellspacing='10'>
                    <tr>
                        <td>Ma khach hang</td>
                        <td>Ten khach hang</td>
                        <td>Tuoi</td>
                        <td>Dien thoai</td>
                    </tr>
            ";
            foreach($xml as $value){
                $txt.="
                    <tr>
                        <td>{$value['id']}</td>
                        <td>{$value->name}</td>
                        <td>{$value->age}</td>
                        <td>{$value->phone}</td>
                    </tr>
                ";
            }
            $txt.="</table>";
            return $txt;
        }
        
        public function add($makh,$tenkh,$tuoi,$dienthoai){
            $root=new DOMDocument("1.0");
            $root->load('list.xml');
            //duyet file
            $roottag=$root->getElementsByTagName('list')[0];
            //trỏ tới nút gốc
            $parenttag=$root->createElement('customer');
            $parenttag->setAttribute('id',$makh);
            $nametag=$root->createElement('name');
            $nametag->nodeValue=$tenkh;//gan gia tri thong qua nodeValue
            $agetag=$root->createElement('age',$tuoi);
            $phonetag=$root->createElement('phone',$dienthoai);

            $parenttag->appendChild($nametag);
            $parenttag->appendChild($agetag);
            $parenttag->appendChild($phonetag);
            $roottag->appendChild($parenttag);

            $root->save('list.xml');
        }
        public function update($makh,$tenkh,$tuoi,$dienthoai){
            $root=new DOMDocument("1.0");
            $root->load('list.xml');

            $xpath= new DOMXPath($root);//duyet duong dan

            $query="/list/customer[@id=$makh]";
            $run=$xpath->query($query);
            foreach($run as $node){
                $parenttag=$root->createElement('customer');
                $parenttag->setAttribute('id',$makh);
                $nametag=$root->createElement('name',$tenkh);
                $agetag=$root->createElement('age',$tuoi);
                $phonetag=$root->createElement('phone',$dienthoai);

                $parenttag->appendChild($nametag);
                $parenttag->appendChild($agetag);
                $parenttag->appendChild($phonetag);

                
                $root->documentElement->replaceChild($parenttag,$node);
                    //thay the thong qua nut goc
            }
            $root->save('list.xml');
        }
        public function delete($makh){
            $root=new DOMDocument("1.0");
            $root->load('list.xml');

            $xpath=new DOMXPath($root);

            $query="//customer[@id=$makh]";
            $run=$xpath->query($query);
            foreach($run as $value){
                $root->documentElement->removeChild($value);
            }
            $root->formatOutput=true;
            $root->save('list.xml');
        }
        public function check(){
            $xml=new SimpleXMLElement("list.xml",null,true);
            $txt='';
            $txt.="<table border='1' cellpadding='5' cellspacing='10'>
                    <tr>
                        <td>Ma khach hang</td>
                        <td>Ten khach hang</td>
                        <td>Tuoi</td>
                        <td>Dien thoai</td>
                    </tr>
            ";
            foreach($xml as $value){
                if($value->age < 20){
                $txt.="
                    <tr>
                        <td>{$value['id']}</td>
                        <td>{$value->name}</td>
                        <td>{$value->age}</td>
                        <td>{$value->phone}</td>
                    </tr>
                ";
            }
        }
            $txt.="</table>";
            return $txt;

        }
    }
?>