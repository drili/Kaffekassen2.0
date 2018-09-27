<?php
      // used to get mysql database connection
      class Database{

            private $host = "mysql63.unoeuro.com";
            private $db_name = "christianbengstrom_dk_db5";
            private $username = "christianbe_dk";
            private $password = "y243x6t9";
            public $conn;

            // get the database connection
            public function getConnection(){
                  $this->conn = null;

                  try{
                        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                  }catch(PDOException $exception){
                        echo "Connection error: " . $exception->getMessage();
                  }

                  return $this->conn;
            }

      }
?>
