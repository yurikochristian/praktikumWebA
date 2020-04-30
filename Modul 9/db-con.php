<?php 
class database{
	var $host = "localhost:3306";
	var $username = "root";
	var $password = "";
	var $database = "crud-db";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}


	function register($fname,$lname,$email,$password,$phone)
	{	
		$insert = mysqli_query($this->koneksi,"INSERT INTO users(first_name,last_name,email,password,phone) values('$fname','$lname','$email','$password','$phone')");
		return $insert;
	}
	
	function view()
	{
		$sql = "SELECT first_name, last_name, email, phone FROM users ORDER BY last_name ASC";
		$result = mysqli_query($this->koneksi, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = $result->fetch_assoc()) {
				echo '<tr> <th scope="row">'.$row["first_name"].'</th> <td>'.$row["last_name"].'</td> <td>'.$row["email"].'</td> <td>'.$row["phone"].'</td> </tr>';
			}
		} else {
			echo "0 results";
		}
	}
}


?>