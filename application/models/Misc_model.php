<?php
class Misc_model extends CI_Model {
	var $communcation_tracking_id;
	var $det=array();
	var $dataOne=array();
	var $fullpath="";
	var $usrimage=array();
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
		
	function insertData($table){
			   $a=$this->det;
			   $this->db->insert($table,$a);
				$this->communcation_tracking_id=$this->db->insert_id();	
			if($this->communcation_tracking_id=='' || $this->communcation_tracking_id==0){
				return false;
			}else{
				return true;
			}
	}
	
	function getInsertID(){
		return $this->db->insert_id();
	}
	
	function deleteValue($table){
			$this->db->delete($table,$this->det); 
	}
	
	function updateValue($table,$where=array()){
				$this->db->where($where);
				$this->db->update($table,$this->det); 
	}
	
	function updateAvatar(){
						$a=$this->det;
					   $data=array('user_avatar'=>$a['user_avatar']);
				$this->db->where('user_id',$this->user_id);
				$this->db->update('user', $data); 
	}
	
	
	
	function processUploadPhoto($file1,$type='avatar',$filehash,$member_id){
				$new_image=$filehash;
				$filename=$new_image.".jpg";
				$new_image=$new_image.".jpg";
				$this->uploadPhotosSizes($file1,$type,$new_image,$member_id);
	}
	
	function uploadPhotosSizes($file,$type='avatar',$new_image,$member_id){
		
			$photoCount=4;
			$usrimage=array();
			
			$imageSize=array();
			
			//Head
			$imageSize[0]['width']=30;
			$imageSize[0]['height']=30;
			$imageSize[0]['format']=$member_id.'_30x30';
			
			//Large
			$imageSize[1]['width']=50;
			$imageSize[1]['height']=50;
			$imageSize[1]['format']=$member_id.'_50x50';
			
			$imageSize[2]['width']=40;
			$imageSize[2]['height']=40;
			$imageSize[2]['format']=$member_id.'_40x40';
			
			
			//Medium
			$imageSize[3]['width']=100;
			$imageSize[3]['height']=100;
			$imageSize[3]['format']=$member_id.'_100x100';
			//Icon
			$imageSize[4]['width']=150;
			$imageSize[4]['height']=150;
		    $imageSize[4]['format']=$member_id.'_150x150';
			
			
			$pic=array();
			
			$usr_main_folder=$this->fullpath."/uploads/".$type;
			
				$usrimage=$file;
				
				
				if($usrimage['size']>0){
						$config['image_library'] = 'GD2';
						$config['source_image'] = $usrimage['tmp_name'];
						$config['new_image'] = $usr_main_folder."/".$new_image;
					
						$this->load->library('image_lib');
						$this->image_lib->initialize($config);  
						
			if ( ! $this->image_lib->resize())
			{	
				echo $this->image_lib->display_errors()."<br>";
			}
				$this->image_lib->clear();
				
					for($c=0;$c<count($imageSize);$c++){
						$pic['tmp_name']=$usrimage['tmp_name'];
						$pic['width']=$imageSize[$c]['width'];
						$pic['height']=$imageSize[$c]['height'];	
						
						$pic['name']=$imageSize[$c]['format']."_".$new_image;

						$this->usrimage=$pic;
						$this->imagePropagate($type);					
					}//end of loop
				}
		}
		
	function imagePropagate($type){
	
			$usr_main_folder=$this->fullpath."/uploads/".$type;
	
			$config['image_library'] = 'GD2';
			
			$config['source_image'] = $this->usrimage['tmp_name'];
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = $this->usrimage['width'];
			$config['height'] = $this->usrimage['height'];
			$config['new_image'] = $usr_main_folder."/".$this->usrimage['name'];
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);  
			
			if ( ! $this->image_lib->resize())
			{	
				echo $this->image_lib->display_errors()."<br>".$config['new_image'];
			}
				$this->image_lib->clear();

				
	}//end of function
	
	function fetchData($table,$order=array(),$join=array(),$limit=''){
		
		
			$this->db->select('*');
			$this->db->where($this->det);
			
			while (list($key, $value) = each($order)) {
				$this->db->order_by($key,$value); 
			}
			
			while (list($key, $value) = each($join)) {
				$this->db->join($key,$value);
			}
			if($limit!=''){
				$this->db->limit($limit);
			}
			
			$res = $this->db->get($table)->result_array();
			if(count($res)>0){
				$this->dataOne=$res[0];	
				return $res;		
			}else{
					$this->dataOne=array();
					return array();
			}
			
	}
	
	function fetchCustomData($query,$spec=false){
		
			$tempData=array();
			$ctr=0;
			$result=$this->db->query($query);
			
			if ($result->num_rows() > 0){
				
					foreach ($result->result_array() as $row){
						$tempData[$ctr]=$row;
						$ctr++;
					}
					$this->dataOne=$tempData[0];	
					return $tempData;
					/*
					if(count($tempData)>1){
						return $tempData;
					}else{
						return $tempData[0];
					}
					*/
			}else{
				$this->dataOne=array();		
				return array();
			}
	}
	

}
?>