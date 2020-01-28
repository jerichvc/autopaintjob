<?php

function loadMonths(){
	$m=array();
		$m[1]='January';
		$m[2]='February';
		$m[3]='March';
		$m[4]='April';
		$m[5]='May';
		$m[6]='June';
		$m[7]='July';
		$m[8]='August';
		$m[9]='September';
		$m[10]='October';
		$m[11]='November';
		$m[12]='December';
	return $m;
}

function loadShortMonths(){

	$m=array();
		$m[1]='Jan';
		$m[2]='Feb';
		$m[3]='Mar';
		$m[4]='Apr';
		$m[5]='May';
		$m[6]='Jun';
		$m[7]='Jul';
		$m[8]='Aug';
		$m[9]='Sep';
		$m[10]='Oct';
		$m[11]='Nov';
		$m[12]='Dec';
	return $m;
}


function nowDateTime(){
		return date("Y-m-d H:i:s");  
}


function nowjsDateTime(){
		return date("m/d/Y h:i A");  
}




function dateOnly(){
		return date("Y-m-d"); 
}


function dateNow(){
		return date("m/d/Y"); 
}

function dateFormatMyQL($given){
			if($given!=""){
				$temp=explode('/',$given);	
			return $temp[2]."-".$temp[0]."-".$temp[1];
			}else{
				return '0000-00-00';
			}
}


function dateTimeFormatMyQL($given){
			if($given!=""){
				$date = new DateTime($given);
				return $date->format('Y-m-d H:i:s');
			}else{
				return '0000-00-00 00:00:00';
			}
}



function getDateFormatPHP($given){
			if($given!=""){
				
				if($given=='0000-00-00 00:00:00'){
					return '';
				}else{
				
				$date = new DateTime($given);
				return $date->format('m/d/Y');
				}
			}else{
				return '';
			}
}

function getDateTimeFormatPHP($given){
			if($given!=""){
				
				if($given=='0000-00-00 00:00:00'){
					return '';
				}else{
				
				$date = new DateTime($given);
				return $date->format('m/d/Y h:i:s A');
				}
			}else{
				return '';
			}
}



function dateFormatPHP($given){
			if($given!=""){
				
				//2017-03-23
				$tmpVar=explode(' ',$given);
				$given=$tmpVar[0];
				
			$temp=explode('-',$given);	
				return $temp[1]."/".$temp[2]."/".$temp[0];
			}else{
				return '00/00/0000';
			}
}



function dateTimeFormatPHP($given){
			if($given!=""){
				
				if($given=='0000-00-00 00:00:00'){
					return '0000-00-00 00:00:00';
				}else{
					
					//2017-03-23
					$date = new DateTime($given);
					return $date->format('m/d/Y h:i:s A');
				}
				
		
				
			}else{
				return '00/00/0000';
			}
}


//YYYY-MM-DD April 03, 2009
function translateDate($date,$trim=true,$short=true){

	if(($date!='0000-00-00') && ($date!='')){
			$set=explode(" ",$date);
			$date=$set[0];
			
		list($year,$month,$day) = explode("-",$date);
		$month=intval($month);
	    $tmpMonth=loadShortMonths();
		if($short){
			$format=$day." ".$tmpMonth[$month]." ".$year;
		}else{
			$format=$tmpMonth[$month]." ".$day.",".$year;
		}
		
		
		if(!$trim){
				$format=$format." ".$set[1];
		}
		
		return $format;		
	}else{
		return '';
	}	
}

//YYYY-MM-DD April 03, 2009
function translateFullDate($date,$trim=true,$short=true){
			
			if($trim){
				$set=explode(" ",$date);	
				$date=$set[0];
			}

		list($year,$month,$day) = explode("-",$date);
		$month=intval($month);
	    $tmpMonth=loadMonths();	
		if($short){
			$format=$day." ".$tmpMonth[$month]." ".$year;
		}else{
			$format=$tmpMonth[$month]." ".$day.", ".$year;
		}
		return $format." ".$set[1];		
					
}

function translateFullDateDisplay($date,$short=false){
		$date=date_create($date);
		if($short){
			return date_format($date,"F d, Y");
		}else{
			return date_format($date,"F d, Y h:i A");
		}
					
}


?>