<?php
	/*	__________ ____ ___  ___________________.___  _________ ___ ___  
		\______   \    |   \/  _____/\_   _____/|   |/   _____//   |   \ 
		 |    |  _/    |   /   \  ___ |    __)  |   |\_____  \/    ~    \
		 |    |   \    |  /\    \_\  \|     \   |   |/        \    Y    /
		 |______  /______/  \______  /\___  /   |___/_______  /\___|_  / 
				\/                 \/     \/                \/       \/  Simple Perms Control Class */	
	class x_class_perm {
		// Class Variables
		private $mysql     				= false;
		private $tablename 				= false;
		private $section   				= ""; public function section($section) { $this->section = $section; }
		private $permission_set 	    = false; public function permission_set($array = false) { $this->permission_set = $array; } public function permission_set_get() { return $this->permission_set; }
		
		// Table Initialization
		private function create_table() {
			return $this->mysql->query("CREATE TABLE IF NOT EXISTS `".$this->tablename."` (
										  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificator',
										  `ref` int(10) NOT NULL COMMENT 'Related Reference',
										  `content` text NOT NULL COMMENT 'Permission Array',
										  `section` varchar(64) DEFAULT NULL COMMENT 'Related Section',
										  `creation` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation',
										  `modification` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modification',
										  PRIMARY KEY (`id`),
										  UNIQUE KEY `Index 2` (`ref`,`section`) );");}
		
		// Constructor
		function __construct($mysql, $tablename, $section = "") {
			$this->mysql	= $mysql;
			$this->tablename = $tablename;
			$this->section = $section;
			if(!$this->mysql->table_exists($tablename)) { $this->create_table(); $this->mysql->free_all(); }}

		// Check is Requested Perm is inside Permission set If set is Activated (not False)
		private function inPermissionSet($perm_name) {
			if(is_array($this->permission_set)) {
				foreach($this->permission_set AS $key => $value) {
					if($perm_name == $value) { return true; }
				} return false;
			} else { return true; }}

		// Get Permissions to Local Array
		public function get_perm($ref) { return $this->getPerm($ref); }
		public function getPerm($ref) {
			if(is_numeric($ref)) { 
				$ar = $this->mysql->select("SELECT * FROM ".$this->tablename." WHERE ref = \"".$ref."\" AND section = '".$this->section."'", false);
				if(is_array($ar)) {
					$newar	= unserialize($ar["content"]);
					if(is_array($newar)) { return $newar; } else {return array();}
				} return array();
			} return array(); }
		
		// Check if Ref has Perm		
		public function has_perm($ref, $permname) {return $this->hasPerm($ref, $permname); } 
		public function hasPerm($ref, $permname) {
			if(!$this->inPermissionSet($permname)) { return false; }
			$current_perm	=	$this->getPerm($ref);
			if(is_array($current_perm)) {
				foreach($current_perm AS $key => $value) {
					if($value == $permname) { return true; }
				}
			} return false;	}		
			
		// Add Permission to Ref	
		public function add_perm($ref, $permname) { return $this->addPerm($ref, $permname); }
		public function addPerm($ref, $permname) {
			if(!$this->inPermissionSet($permname)) { return false; }
			$current_perm	=	$this->getPerm($ref);
			$hasperm = false;
			if(is_array($current_perm)) {
				foreach($current_perm AS $key => $value) {
					if($value == $permname) { $hasperm = true; }
				}
			} else { $current_perm = array(); }
			if(!$hasperm) {array_push($current_perm, $permname);}		
			$this->setPerm($ref, $current_perm);		
			return true;}			
			
		// Check if Ref has multiple Perms at Once and True/False		
		public function check_perm($ref, $array, $or = false) { return $this->checkPerm($ref, $array, $or); }
		public function checkPerm($ref, $array, $or = false) {
			if(!is_numeric($ref)) { return false; }
			$current_perm	=	$this->getPerm($ref);
			$perms_and = false;
			$perms_andra = array();
			$perms_or = false;
			if(is_array($current_perm) AND is_array($array)) {
				foreach($current_perm AS $key => $value) {
					foreach($array AS $keyc => $valuec) {
						if($value == $valuec AND $this->inPermissionSet($permname)) { $perms_or = true; }
					}
				}
				foreach($array AS $key => $value) {
					foreach($current_perm AS $keyc => $valuec) {
						if($value == $valuec AND $this->inPermissionSet($permname)) { $perms_andra[$key] = true; }
					}
					if(!isset($perms_andra[$key])) { $perms_andra[$key] = false; }
				}				
				$perms_and = true;
				foreach($perms_andra AS $keyc => $valuec) {
					if($valuec == false) { $perms_and = false; }
				}
				if(!$or) { return $perms_and;}
				else { return $perms_or;}
			} return false;}	

		// Set Ref Permissions		
		private function set_perm($ref, $array) { return $this->setPerm($ref, $array); }
		private function setPerm($ref, $array) {	
			if(is_numeric($ref)) { 
				$query = $this->mysql->query("SELECT * FROM ".$this->tablename." WHERE ref = \"".$ref."\" AND section = '".$this->section."'");
				if ($result	=	mysqli_fetch_array($query) ) { 
					$this->mysql->query("UPDATE ".$this->tablename." SET content = '".$this->mysql->escape(serialize($array))."' WHERE ref = '".$ref."' AND section = '".$this->section."'  ");
				} else { 
					$this->mysql->query("INSERT INTO ".$this->tablename." (ref, content, section) VALUES('".$ref."', '".$this->mysql->escape(serialize($array))."', '".$this->section."')"); 
				}
				return true;
			} return false; 		
		}
		
		// Remove Single Permissions
		public function remove_perm($ref, $permname) { return $this->remove_perm($ref, $permname); }
		public function removePerm($ref, $permname) {
			if(!is_numeric($ref)) {return false;}
			$current_perm = $this->getPerm($ref);
			$newperm	=	array();
			if(is_array($current_perm)) {
				foreach($current_perm AS $key => $value) {
					if($value != $permname) { array_push($newperm, $value); }
				}
			}
			return $this->setPerm($ref, $newperm);}	

		// Remove Ref Permissions	
		public function removePerms($ref) { if(is_numeric($ref)) { return $this->setPerm($ref, array()); } return false; }
		public function remove_perms($ref) { if(is_numeric($ref)) { return $this->setPerm($ref, array()); } return false; }
		public function clear_perms($ref) { if(is_numeric($ref)) { return $this->setPerm($ref, array()); } return false; }
		// Delete a Ref from Permission Table	
		public function delete_ref($ref) { if(is_numeric($ref)) { return $this->mysql->query("DELETE FROM ".$this->tablename." WHERE ref = \"".$this->ref;."\" AND section = '".$this->section."'"); } return false; }
		// Get a Ref Object
		public function item($ref, $permission_set = false) { 
			if(!is_numeric($ref)) { return false; }
			if($permission_set === false) { $permission_set = false}
			if($permission_set === true) { $permission_set = $this->permission_set; }
			if(is_array($permission_set)) { $permission_set = $permission_set; }
			$item = new x_class_perm_item($this->mysql, $this->tablename, $this->section, $ref, $permission_set, $this->getPerm($ref)); return $item; }
	}
	
	#######################################################################
	// Get REF Perm Item, so Ref does not need to be set on operations!
	class x_class_perm_item {
		// Class Variables
		private $mysql     				= false;
		private $tablename 				= false;
		private $section   				= false;
		private $ref 	   			    = false;
		private $permission_set 	    = false; 
		private $permissions 	    	= array(); 
		// Constructor
		function __construct($mysql, $tablename, $section, $ref, $permission_set, $permissions) {
			$this->mysql	= $mysql;
			$this->tablename = $tablename;
			$this->section = $section;
			$this->ref = $ref;
			$this->permission_set = $permission_set;
			$this->permissions = $permissions; }	

		// Check is Requested Perm is inside Permission set If set is Activated (not False)
		private function inPermissionSet($perm_name) {
			if(is_array($this->permission_set)) {
				foreach($this->permission_set AS $key => $value) {
					if($perm_name == $value) { return true; }
				} return false;
			} else { return true; }}

		// Get Permissions to Local Array
		public function refresh() {
				$ar = $this->mysql->select("SELECT * FROM ".$this->tablename." WHERE ref = \"".$this->ref."\" AND section = '".$this->section."'", false);
				if(is_array($ar)) {
					$newar	= unserialize($ar["content"]);
					if(is_array($newar)) { $this->permissions = $newar; } else {$this->permissions =  array();}
				} $this->permissions =  array(); } 

		// Check if Ref has Perm		
		public function has_perm($permname) {
			if(!$this->inPermissionSet($permname)) { return false; }
			$current_perm	=	$this->permissions;
			if(is_array($current_perm)) {
				foreach($current_perm AS $key => $value) {
					if($value == $permname) { return true; }
				}
			} return false;	}	

		// Add Permission to Ref	
		public function add_perm($permname) {
			if(!$this->inPermissionSet($permname)) { return false; }
			$current_perm	=	$this->permissions;
			$hasperm = false;
			if(is_array($current_perm)) {
				foreach($current_perm AS $key => $value) {
					if($value == $permname) { $hasperm = true; }
				}
			} else { $current_perm = array(); }
			if(!$hasperm) {array_push($current_perm, $permname);}		
			$this->set_perm($this->ref, $current_perm);		
			return true;}	

		// Check if Ref has multiple Perms at Once and True/False		
		public function check_perm($array, $or = false) {
			$current_perm	=	$this->permissions;
			$perms_and = false;
			$perms_andra = array();
			$perms_or = false;
			if(is_array($current_perm) AND is_array($array)) {
				foreach($current_perm AS $key => $value) {
					foreach($array AS $keyc => $valuec) {
						if($value == $valuec AND $this->inPermissionSet($permname)) { $perms_or = true; }
					}
				}
				foreach($array AS $key => $value) {
					foreach($current_perm AS $keyc => $valuec) {
						if($value == $valuec AND $this->inPermissionSet($permname)) { $perms_andra[$key] = true; }
					}
					if(!isset($perms_andra[$key])) { $perms_andra[$key] = false; }
				}				
				$perms_and = true;
				foreach($perms_andra AS $keyc => $valuec) {
					if($valuec == false) { $perms_and = false; }
				}
				if(!$or) { return $perms_and;}
				else { return $perms_or;}
			} return false;}

		// Remove Single Permissions
		public function remove_perm($permname) {
			$current_perm = $this->permissions;
			$newperm	=	array();
			if(is_array($current_perm)) {
				foreach($current_perm AS $key => $value) {
					if($value != $permname) { array_push($newperm, $value); }
				}
			} return $this->set_perm($ref, $newperm);}	

		// Set Ref Permissions		
		private function set_perm($ref, $array) { 	
			$query = $this->mysql->query("SELECT * FROM ".$this->tablename." WHERE ref = \"".$this->ref."\" AND section = '".$this->section."'");
			if ($result	=	mysqli_fetch_array($query) ) { 
				$this->mysql->query("UPDATE ".$this->tablename." SET content = '".$this->mysql->escape(serialize($array))."' WHERE ref = '".$ref."' AND section = '".$this->section."'  ");
			} else { 
				$this->mysql->query("INSERT INTO ".$this->tablename." (ref, content, section) VALUES('".$this->ref."', '".$this->mysql->escape(serialize($array))."', '".$this->section."')"); 
			} return true;}
		
		// Remove Ref Permissions	
		public function remove_perms() { return $this->set_perm(array()); }
		// Delete a Ref from Permission Table	
		public function delete_ref() { return $this->mysql->query("DELETE FROM ".$this->tablename." WHERE ref = \"".$this->ref;."\" AND section = '".$this->section."'");}
	}
?>