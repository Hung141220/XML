<?php
	class Donhang{
		private $makh;
		private $mahang;
		private $tenhang;
		private $dongia;
		public function __construct($makh, $mahang, $ten, $dongia){
			$this->makh=$makh;
			$this->mahang=$mahang;
			$this->tenhang=$ten;
			$this->dongia=$dongia;
		}
		public function __destruct(){
			$this->makh="";
			$this->mahang="";
			$this->tenhang="";
			$this->dongia="";	
		}
		public function getMakh(){
				return $this->makh;
		}
		public function getMahang(){
			return $this->mahang;	
		}
		public function getTenhang(){
			return $this->tenhang;	
		}
		public function getDongia(){
			return $this->dongia;	
		}
		public function add(){
			$root=new DOMDocument("1.0");
			$root->load('donhang.xml');
			
			$roottag=$root->getElementsByTagName("qldh")->item(0);	
			$parenttag=$root->createElement("donhang");
			$makhtag=$root->createElement("makh",$this->makh);
			$mahangtag=$root->createElement("mahang",$this->mahang);
			$tenhangtag=$root->createElement("tenhang",$this->tenhang);
			$dongiatag=$root->createElement("dongia",$this->dongia);
			
			$parenttag->appendChild($makhtag);
			$parenttag->appendChild($mahangtag);
			$parenttag->appendChild($tenhangtag);
			$parenttag->appendChild($dongiatag);
			$roottag->appendChild($parenttag);
			
			$root->save('donhang.xml');
		}
		public function update(){
			$root=new DOMDocument("1.0");
			$root->load('donhang.xml');
			
			$xpath=new DOMXPath($root);
			$query="/qldh/donhang[mahang='$this->mahang']";
			$run=$xpath->query($query);
			foreach($run as $node){
				$parenttag=$root->createElement("donhang");	
				$makhtag=$root->createElement("makh",$this->makh);
				$mahangtag=$root->createElement("mahang",$this->mahang);
				$tenhangtag=$root->createElement("tenhang",$this->tenhang);
				$dongiatag=$root->createElement("dongia",$this->dongia);
			
				$parenttag->appendChild($makhtag);
				$parenttag->appendChild($mahangtag);
				$parenttag->appendChild($tenhangtag);
				$parenttag->appendChild($dongiatag);
				
				$node->parentNode->replaceChild($parenttag,$node);
			}
			$root->formatOutput=true;
			$root->save('donhang.xml');
		}
		public function delete(){
			$root=new DOMDocument("1.0");
			$root->load('donhang.xml');
			
			$xpath=new DOMXPath($root);
			$query="/qldh/donhang[mahang='$this->mahang']";
			$run=$xpath->query($query);
			foreach($run as $node){
				$node->parentNode->removeChild($node);	
			}
			$root->formatOutput=true;
			$root->save('donhang.xml');
		}
	}
?>