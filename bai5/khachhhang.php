<?php
	class Khachhang{
		private $makh;
		private $hoten;
		private $diachi;
		public function __construct($ma, $ten, $dc){
			$this->makh=$ma;
			$this->hoten=$ten;
			$this->diachi=$dc;				
		}
		public function __destruct(){
			$this->makh="";
			$this->hoten="";
			$this->diachi="";
		}
		public function getMakh(){
			return $this->makh;
		}
		public function getHoten(){
			return $this->hoten;	
		}
		public function getDiachi(){
			return $this->diachi;	
		}
		public function add(){
			$root=new DOMDocument("1.0");
			$root->load('khachhang.xml');
			$roottag=$root->getElementsByTagName("qlkh")->item(0);
			$parenttag=$root->createElement("khachhang");
			$makhtag=$root->createElement("makh",$this->makh);
			$hotentag=$root->createElement("hoten",$this->hoten);
			$diachitag=$root->createElement("diachi",$this->diachi);
			
			$parenttag->appendChild($makhtag);
			$parenttag->appendChild($hotentag);
			$parenttag->appendChild($diachitag);
			$roottag->appendChild($parenttag);
			
			$root->save('khachhang.xml');
		}
		public function update(){
			$root=new DOMDocument("1.0");
			$root->load('khachhang.xml');
			
			$xpath=new DOMXPath($root);
			$query="/qlkh/khachhang[makh=$this->makh]";
			$run=$xpath->query($query);
			foreach($run as $node){
				$parenttag=$root->createElement("khachhang");
				$makhtag=$root->createElement("makh",$this->makh);
				$hotentag=$root->createElement("hoten",$this->hoten);
				$diachitag=$root->createElement("diachi",$this->diachi);
				
				$parenttag->appendChild($makhtag);
				$parenttag->appendChild($hotentag);
				$parenttag->appendChild($diachitag);
				
				$node->parentNode->replaceChild($parenttag,$node);	
			}
			$root->formatOutput=true;
			$root->save('khachhang.xml');
		}
		public function delete(){
			$root=new DOMDocument("1.0");
			$root->load('khachhang.xml');
			
			$xpath=new DOMXPath($root);
			$query="/qlkh/khachhang[makh=$this->makh]";
			$run=$xpath->query($query);
			foreach($run as $node){
				$node->parentNode->removeChild($node);	
			}
			$root->formatOutput=true;
			$root->save('khachhang.xml');
		}
	}
?>