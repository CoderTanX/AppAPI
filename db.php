<?php
	class Db{
		static private $_instance;
		static private $_connectSource;
		private $_dbConfig = array(
			"host" => "127.0.0.1",
			"user" => "root",
			"password" => "123456",
			"database" => "bobo"
			);
		private function __construct(){}
		static public function getInstance(){
			if (!(self::$_instance instanceof self)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		public function connect(){
			if (!self::$_connectSource) {
				self::$_connectSource =  @mysql_connect($this->_dbConfig["host"],$this->_dbConfig["user"],$this->_dbConfig["password"]);
				if (!self::$_connectSource) {
					die("数据库连接错误" . mysql_error());
				}
				mysql_select_db($this->_dbConfig["database"]);
				mysql_query("set names UTF8");
			}
			
			return self::$_connectSource;
		}
	}

	// $connect = Db::getInstance()->connect();
	// $sql = "select * from student";
	// $result = mysql_query($sql);
	// $data = mysql_fetch_assoc($result);
	// var_dump($data);
?>