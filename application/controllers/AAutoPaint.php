<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AAutoPaint extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct(){
		  parent::__construct();
		  $this->load->model('Misc_model','p');
		  $this->config->load('general');
		
	}	
	
	public function index()
	{
		redirect('');
	}
	
	
        
        public function processAddPaintJob(){
            
                $data=array();
		$data['json']['process']=true;
		$data['json']['status']='';
		$data['json']['html']='';
            
                
                
                $car_queue_plate_no=$this->input->post('car_queue_plate_no');
                $car_queue_current_color=$this->input->post('car_queue_current_color');
                $car_queue_target_color=$this->input->post('car_queue_target_color');
                $car_queue_status='pending';
                $car_queue_datecreated=nowDateTime();
                $car_queue_dateupdated=nowDateTime();
                
                $this->p->det=array('car_queue_status'=>'active');
                $listDetails=$this->p->fetchData('car_queue');
                
              
                
                if(count($listDetails)<5){
                     $car_queue_status='active';
                }else{
                     $car_queue_status='pending';
                }
                
                dbTriggerStart();
                $this->p->det=array('car_queue_plate_no'=>$car_queue_plate_no,
                                    'car_queue_current_color'=>$car_queue_current_color,
                                    'car_queue_target_color'=>$car_queue_target_color,
                                    'car_queue_status'=>$car_queue_status,
                                    'car_queue_datecreated'=>$car_queue_datecreated,
                                    'car_queue_dateupdated'=>$car_queue_dateupdated);
                $this->p->insertData('car_queue');
                
               
                
                if(dbTriggerEnd()){
                        $data['json']['status']='Paint job has been added';
                }else{
                        $data['json']['process']=false;
                        $data['json']['status']='Error on adding paint job';
                }
                
                echo json_encode($data['json']);
		exit;	
         }
         
         
         
         public function processUpdatePaintJob(){
            
                $data=array();
		$data['json']['process']=true;
		$data['json']['status']='';
		$data['json']['html']='';
                
                
                $car_queue_id=$this->input->post('car_queue_id');
                $car_queue_status='finished';
                $car_queue_dateupdated=nowDateTime();
                

                
                
                dbTriggerStart();
                $this->p->det=array('car_queue_status'=>$car_queue_status,
                                    'car_queue_dateupdated'=>$car_queue_dateupdated);
                $where=array('car_queue_id'=>$car_queue_id);
                $this->p->updateValue('car_queue',$where);
                
                //Next Queue
                $this->p->det=array('car_queue_status'=>'pending');
                $order=array('car_queue_id'=>'asc');
                $this->p->fetchData('car_queue',$order);
                $tmpNext=$this->p->dataOne;
                if(count($tmpNext)>0){
                        $car_queue_status='active';

                        $this->p->det=array('car_queue_status'=>$car_queue_status,
                                            'car_queue_dateupdated'=>$car_queue_dateupdated);
                        $where=array('car_queue_id'=>$tmpNext['car_queue_id']);
                        $this->p->updateValue('car_queue',$where);
                }
                
                
                
                
                
                
                if(dbTriggerEnd()){
                        $data['json']['status']='Paint job has been added';
                }else{
                        $data['json']['process']=false;
                        $data['json']['status']='Error on adding paint job';
                }
                
                echo json_encode($data['json']);
		exit;	
         }
         
         
           public function loadStats(){
	
		$data=array();
		
		$data['json']['process']=true;
		$data['json']['status']='';
		$data['json']['html']='';
                
                
                $query="select car_queue_target_color,count(*) as counter from car_queue where car_queue_status='finished' group by car_queue_target_color";
                $listColor=$this->p->fetchCustomData($query);
                
                
                $data['json']['countTotal']=0;
                
                for($h=0;$h<count($listColor);$h++){
                    
                     $data['json']['count'.$listColor[$h]['car_queue_target_color']]=$listColor[$h]['counter'];
                     $data['json']['countTotal']=$data['json']['countTotal']+$listColor[$h]['counter'];
                 }
                
                 echo json_encode($data['json']);
		exit;	
                
                
         }  
         
         
         public function loadInProgress(){
	
		$data=array();
		
		$data['json']['process']=true;
		$data['json']['status']='';
		$data['json']['html']='';
                
                
                $this->p->det=array('car_queue_status'=>'active');
                $order=array('car_queue_status','asc');
                $data['listInProgress']=$this->p->fetchData('car_queue',$order);
                
                $data['json']['html']=$this->load->view('listInProgress',$data,true);
                 echo json_encode($data['json']);
		exit;	
                
                
         }  
         
         
         
          public function loadInQueue(){
	
		$data=array();
		
		$data['json']['process']=true;
		$data['json']['status']='';
		$data['json']['html']='';
                
                
                $this->p->det=array('car_queue_status'=>'pending');
                $order=array('car_queue_status','asc');
                $data['listInQueue']=$this->p->fetchData('car_queue',$order);
                
                $data['json']['html']=$this->load->view('listInQueue',$data,true);
                 echo json_encode($data['json']);
		exit;	
                
                
         }  
         
         
		
}
