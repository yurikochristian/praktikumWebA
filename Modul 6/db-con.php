<?php 
class database{
	var $host = "localhost:3306";
	var $username = "root";
	var $password = "";
	var $database = "perpustakaan";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
} 
?>