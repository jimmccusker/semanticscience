<?php
/**
* Copyright (C) 2012 Michel Dumontier and Jose Cruz-Toledo
*
* Permission is hereby granted, free of charge, to any person obtaining a copy of
* this software and associated documentation files (the "Software"), to deal in
* the Software without restriction, including without limitation the rights to
* use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
* of the Software, and to permit persons to whom the Software is furnished to do
* so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in all
* copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
* SOFTWARE.
*/

class Connector{
	/**
	* Database credentials
	*/
	private $host = "134.117.108.159";
	private $user = "sio-evaluator";
	private $pass = "sio-evaluator-secret";
	private $db = "sio-evaluator";
	private $conn = null;

	public function __construct(){
		$conn = $this->createConnection(
			$this->host, 
			$this->user, 
			$this->pass, 
			$this->db
		);
	}


	/** 
	* Create a connection to the sio-evaluator database.
	* If cannot create one, program fails and exits
	*/
	private function createConnection($h, $u, $p, $db){
		$rm = mysqli_connect($h, $u, $p, $db);
		//check conn
		if(mysqli_connect_errno($rm)){
			echo "Failed to connect to Database: ". mysqli_connect_error()."\n";
			echo "Program terminated!\n";
			exit;
		}
		return $rm;
	}

	public function getConnection(){
		return $this->conn;
	}

	public function __destruct(){
		$this->conn->close();
	}
}
?>