<?php
	class Database{
		public $host 	= DB_HOST;
		public $user 	= DB_USER;
		public $pass 	= DB_PASS;
		public $dbname 	= DB_NAME;

		public $link;
		public $error;

		public function __construct(){
			$this->ConnectionDB();
		}

		private function ConnectionDB(){
			$this->link = new mysqli($this->host, $this->user,$this->pass,$this->dbname);
			if(!$this->link){
				$this->error = "Connection Fail".$this->link->connection_error;
				return false;
			}
		}

		# Select Query
		public function ReadData($sql){
			$result = $this->link->query($sql) or die ($this->link->error.__LINE__);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}

		}
		#Insert Data Here..
		public function InsertData($sql){
			$result = $this->link->query($sql) or die ($this->link->error.__LINE__);
			if($result){
				header("location: index.php?msg=".urlencode('Data Inserted Successfully!.'));
				exit();
			}else{
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}

		#Update data here...
		public function UpdateData($sql){
			$result = $this->link->query($sql) or die ($this->link->error.__LINE__);
			if($result){
				header("location: index.php?msg=".urlencode('Data Updated Successfully!.'));
				exit();
			}else{
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}
		#Delete data here...
		public function DeleteData($sql){
			$result = $this->link->query($sql) or die ($this->link->error.__LINE__);
			if($result){
				header("location: index.php?msg=".urlencode('Data Deleted Successfully!.'));
				exit();
			}else{
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}
	}
