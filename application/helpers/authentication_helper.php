<?php
function loggedIn(){
			$CI =get_instance();
    		$user = $CI->session->userdata('user');
			if(($user['logged_in']) && $user['user_login_hash']!=''){
					return true;
			}else{
					return false;
			}
}

function checkPermission($user_type_id,$site_module_prefix,$third_party_module="",$reference_id=""){
				
			$CI =get_instance();
		
				/////////////////////////////////////////////////
				//Update User Session Action
				if(loggedIn()){
					$sessUser=sessionUser(); 
					
				$queryUpdateLogin="UPDATE user_login SET user_login_dateupdated = '".nowDateTime()."' 
				 where
					user_id='".$sessUser['user_id']."'
					and user_login_hash='".$sessUser['user_login_hash']."'";
				$CI->db->query($queryUpdateLogin);
				}
				//////////////////////////////////////////////////
				

			//Check Permission
				$sql_string="SELECT
							count(*) as counterExists
							FROM
							user_type_permission
							Inner Join site_module ON user_type_permission.site_module_id = site_module.site_module_id
							where user_type_id='".$user_type_id."'
							and site_module_prefix='".$site_module_prefix."'";
                       
							
						//	echo $sql_string;
   			   $resource = $CI->db->query($sql_string);
			
			$res=$resource->result_array();
			if($res[0]['counterExists']==0){
				if($third_party_module!=""){
						//return false;
						
						//Load External Function
						//////////////////////////////////////////
							$sql_stringExternal="SELECT
							count(*) as counterExists
							FROM
							user_type_permission
							Inner Join site_module ON user_type_permission.site_module_id = site_module.site_module_id
							where user_type_id='".$user_type_id."'
							and site_module_prefix='".$third_party_module."'";
                    		$resourceExternal = $CI->db->query($sql_stringExternal);
							$resExternal=$resourceExternal->result_array();
							if($resExternal[0]['counterExists']==0){
								return false;
							}else{
								
								////////////////////////////////////////////////
								//Customization Here
								////////////////////////////////////////////////
								
								//More Specific Details Here
								//Get User Logged ID
								$user = $CI->session->userdata('user');
								
								if($third_party_module=='manage_my_pds'){
									return managePDS($user['user_id'],$reference_id);
								}else{
									return true;
								}
								
							}	
						//////////////////////////////////////////	
						
						
				}else{
						return false;
				}	
				
            }else{
				//$user = $CI->session->userdata('user');
				return true;
			}
}



function isAdmin($subAdmin=false){
			$CI =get_instance();
    		$member = $CI->session->userdata('member');
			if($member['user_type_id']==1){
					return true;
			}else{
					return false;
			}
}

function sessionUser(){
			$CI =get_instance();
    		$user = $CI->session->userdata('user');
			return $user;
} 

function setUserSession($details){
			$CI =get_instance();
			$status=array('logged_in'=>true);
			$sess['user']=array_merge($details,$status);
			$CI->session->set_userdata($sess);
}


function editMode($member_id){
		if(loggedIn()){
			$tempMember=sessionUser();
			
			if($member_id==$tempMember['member_id']){
					return true;
			}else{
					return false;
			}
		}else{
			return false;
		}
}


function getSettings($member_id,$column=""){
			$CI =get_instance();
			
			if($column==""){
				$sql_string = "SELECT * from member_settings where member_id='".$member_id."'";    
			}else{
				$sql_string = "SELECT ".$column." from member_settings where member_id='".$member_id."'";  
			}
			$resource = $CI->db->query($sql_string);
			$res=$resource->result_array();
			if($column==""){
				return $res[0];
			}else{
				return $res[0][$column];
			}
}

/*
function loadAvatar($member_id,$icon='header'){

			$CI =get_instance();
			$sql_string = "SELECT member_id,member_avatar from member_details where member_id='".$member_id."'";    
			$resource = $CI->db->query($sql_string);
			$res=$resource->result_array();
			
			if($res[0]['member_avatar']!=""){
					if($icon=='header'){
							$avatar="uploads/avatar/".$res[0]['member_id']."_50x50_".$res[0]['member_avatar'];
					}elseif($icon=='message'){
							$avatar="uploads/avatar/".$res[0]['member_id']."_40x40_".$res[0]['member_avatar'];
					}elseif($icon=='profile'){
							$avatar="uploads/avatar/".$res[0]['member_id']."_100x100_".$res[0]['member_avatar'];
					}elseif($icon=='head'){
							$avatar="uploads/avatar/".$res[0]['member_id']."_30x30_".$res[0]['member_avatar'];
					}
			}else{
				//Get Gender
				$sql_string2 = "SELECT member_id,member_gender from member where member_id='".$member_id."'";   
				$resource2= $CI->db->query($sql_string2);
				$res2=$resource2->result_array();	

				
				if($icon=='header'){
							$avatar="images/avatar/50x50_".strtolower ($res2[0]['member_gender']);
					}elseif($icon=='message'){
							$avatar="images/avatar/40x40_".strtolower ($res2[0]['member_gender']);
					}elseif($icon=='profile'){
							$avatar="images/avatar/100x100_".strtolower ($res2[0]['member_gender']);
					}elseif($icon=='head'){
								$avatar="images/avatar/30x30_".strtolower ($res2[0]['member_gender']);
					}
					
					
			
			}
			
			return  $avatar;
			
}
*/

function loadUserName($member_id){

			$CI =get_instance();
			$sql_string = "SELECT member_id,member_username from member where member_id='".$member_id."'";    
			$resource = $CI->db->query($sql_string);
			$res=$resource->result_array();
			
			return $res[0]['member_username'];
}
	
function loadUserID($member_username){

			$CI =get_instance();
			$sql_string = "SELECT member_id,member_username from member where member_username='".$member_username."'";    
			$resource = $CI->db->query($sql_string);
			$res=$resource->result_array();
			
			if(count($res)>0){
				return $res[0];
			}else{
				return array();
			}
}

function loadMemberFullName($member_id){

			$CI =get_instance();
			$sql_string = "SELECT member_firstname,member_lastname from member where member_id='".$member_id."'";    
			$resource = $CI->db->query($sql_string);
			$res=$resource->result_array();
			
			if(count($res)>0){
				return $res[0]['member_firstname']." ".$res[0]['member_lastname']; 
			}else{
				return "";
				
			}
}


function online($member_username)
{
    $CI =& get_instance();
    $sql_string = 'SELECT last_activity FROM ci_sessions WHERE user_data LIKE "%'.get_field('member','member_username', $member_username).'%"';    
	$query = $CI->db->query($sql_string);
    if ($query->num_rows() > 0) { return TRUE; }
	return FALSE;
}


function get_field($table, $field, $id)
{
    $CI =& get_instance();
    $CI->db->where('member_username', $id);
    $query = $CI->db->get($table);
    $row = $query->row();
    return $row->$field;
}  

function userLog($action,$reference_id,$external_action=""){
	
	
			$userVar=sessionUser();
			$CI =get_instance();
			
			if($external_action!=''){
				//Typical Logs
				$sql_stringExternal = "select * from site_module where site_module_prefix='".$external_action."'";    
				$resourceExternal = $CI->db->query($sql_stringExternal);
				$resExternal=$resourceExternal->result_array();
				
				$sqlInsertExternal = "INSERT INTO user_logs (user_id,
													  user_login_hash,
													  user_log_datecreated,
													  site_module_id,
													  user_log_reference)
													VALUES(
													'".$userVar['user_id']."',
													'".$userVar['user_login_hash']."',
													'".nowDateTime()."',
													'".$resExternal[0]['site_module_id']."',
													'".$reference_id."')";    
				$resource = $CI->db->query($sqlInsertExternal);
			}else{	
				//Typical Logs
				$sql_string = "select * from site_module where site_module_prefix='".$action."'";    
				$resource = $CI->db->query($sql_string);
				$res=$resource->result_array();
				
				$sqlInsert = "INSERT INTO user_logs (user_id,
													  user_login_hash,
													  user_log_datecreated,
													  site_module_id,
													  user_log_reference)
													VALUES(
													'".$userVar['user_id']."',
													'".$userVar['user_login_hash']."',
													'".nowDateTime()."',
													'".$res[0]['site_module_id']."',
													'".$reference_id."')";    
				$resource = $CI->db->query($sqlInsert);
			
			}
			
}



function managePDS($user_id,$reference_id){
	
			$CI =get_instance();
			$sql_string = "SELECT count(*) as counterExists 
							from pds_user where user_id='".$user_id."' and
							pds_id='".$reference_id."'";    
			$resource = $CI->db->query($sql_string);
			$res=$resource->result_array();
			
			if($res[0]['counterExists']==0){
					return false;
			}else{
					return true;
			}
}

?>