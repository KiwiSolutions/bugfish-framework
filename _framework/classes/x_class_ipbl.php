<?php
	/*	__________ ____ ___  ___________________.___  _________ ___ ___  
		\______   \    |   \/  _____/\_   _____/|   |/   _____//   |   \ 
		 |    |  _/    |   /   \  ___ |    __)  |   |\_____  \/    ~    \
		 |    |   \    |  /\    \_\  \|     \   |   |/        \    Y    /
		 |______  /______/  \______  /\___  /   |___/_______  /\___|_  / 
				\/                 \/     \/                \/       \/  IP Blacklisting Control Class */	
	class x_class_ipbl {
		######################################################
		// Class Variables
		######################################################
		private $mysql  	= false; 
		private $table     	= false; 
		private $ip     	= false; 
		private $max     	= false; 
		private $blocked    = false; 
		private $counter    = false; 
		
		######################################################
		// Table Initialization
		######################################################
		private function create_table() {
			return $this->mysql->query("CREATE TABLE IF NOT EXISTS `".$this->table."` (
												  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificator',
												  `fail` int(9) DEFAULT '1' COMMENT 'Address Failures',
												  `ip_adr` varchar(256) NOT NULL COMMENT 'Related IP Address',
												  `creation` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation',
												  PRIMARY KEY (`id`),
												  UNIQUE KEY `Index 2` (`ip_adr`)
												);");}
		
		######################################################
		// Construct
		######################################################
		function __construct($mysql, $tablename, $maxvalue = 50000) { 
			$this->mysql = $mysql; $this->table = $tablename; $this->max  = $maxvalue;
			$this->ip = @trim(@strtolower(@$_SERVER["REMOTE_ADDR"])); 
			if(!$this->mysql->table_exists($tablename)) { $this->create_table(); $this->mysql->free_all();  }
			$this->int_block_renew();}

		######################################################
		// Check Current Block Status
		######################################################	
		public function blocked($renew = false) { if(!$renew) { return $this->blocked; } else { return return $this->int_block_renew(); } }
		public function banned($renew = false) { if(!$renew) { return $this->blocked; } else { return return $this->int_block_renew(); } }
		public function isbanned($renew = false) { if(!$renew) { return $this->blocked; } else { return return $this->int_block_renew(); } }
		public function isblocked($renew = false) { if(!$renew) { return $this->blocked; } else { return $this->int_block_renew(); } }
		// Function to Renew Local Blocked Variable for Constructor and Renew
		private function int_block_renew() {
			$b[0]["type"]	=	"s";
			$b[0]["value"]	=	$this->ip;
			$r = @$this->mysql->select("SELECT * FROM ".$this->table." WHERE ip_adr = ? AND fail > ".$this->max.";", false, $b);
			if(is_array($r)) {	
				$this->blocked = true;
				return $this->blocked; 
			}
			$this->blocked = false;
			return $this->blocked;}

		######################################################
		// Get Counter for IP
		######################################################	
		public function get_counter($renew = false) { if(!$renew) { return $this->counter; } else { return return $this->int_counter_renew(); } }
		public function counter($renew = false) { if(!$renew) { return $this->counter; } else { return return $this->int_counter_renew(); } }
		// Function to Renew Local Counter Variable for Constructor and Renew
		private function int_counter_renew() {
			$b[0]["type"]	=	"s";
			$b[0]["value"]	=	$this->ip;
			if(!$ip) { $r = @$this->mysql->select("SELECT * FROM ".$this->table." WHERE ip_adr = ? AND fail > ".$this->max.";", false, $b); }
			else { $r = @$this->mysql->select("SELECT * FROM ".$this->table." WHERE ip_adr = ? AND fail > ".$this->max.";", false, $b); }
			if(is_array($r)) {	
				$this->counter = $r["fail"];
				return $this->counter; 
			}
			$this->counter = 0;
			return $this->counter;}

		######################################################
		// Raise Counter for Current IP
		######################################################		
		public function raise($value = 1) { return $this->raise($value); }
		public function increase($value = 1) { return $this->raise($value); } 
		// Function to Increase and Refresh Counter
		private function int_counter_raise($value = 1) {
			if(!is_int($value)) [ return false; }
			$b[0]["type"]	=	"s";
			$b[0]["value"]	=	$this->ip;
			$rres = @$this->mysql->select("SELECT * FROM ".$this->table." WHERE ip_adr = ?;", $b); 
			if(is_array($r)) {	
				@$this->mysql->query("UPDATE ".$this->table." SET fail = fail + ".$value." WHERE id = '".$sresult["id"]."';");
			} else { @$this->mysql->query("INSERT INTO ".$this->table."(ip_adr, fail) VALUES(?, 1);", $b); }
			return $this->int_counter_renew();			
		}	
	}
?>