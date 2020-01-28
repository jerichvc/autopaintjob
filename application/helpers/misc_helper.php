<?php

function p($a){
		echo "<pre>";
		print_r($a);
}

function  searchString($needle,$string){
		$pos = strpos($string,$needle);
		if ($pos === false) {
				return false;
		} else {
			    return true;
		}
}//end of function seasrch



        function dbTriggerStart(){
		 $CI =& get_instance();
		 $CI->db->trans_start();	
	}
	
	function dbTriggerEnd(){
		$dbTriggerStatus=true;
		$CI =& get_instance();
		if ($CI->db->trans_status() === FALSE){
				$CI->db->trans_rollback();
				$dbTriggerStatus=false;
		}else{
				$CI->db->trans_commit();
				$dbTriggerStatus=true;
		}
		$CI->db->trans_complete();
		return $dbTriggerStatus;
	}
        
        

?>