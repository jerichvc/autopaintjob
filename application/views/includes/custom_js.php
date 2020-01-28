<?php
$sessUser=sessionUser();
?>
<script type="text/javascript"> 
var tmpVar1='';
var tmpVar2='';
var tmpVar3='';
var statusLabelText='';
var finalProcess=true;

$(document).ready(function($){
	
	////////////////////////////////////////////////////////
	///////////////Default Member Function/////////////////
	
	
	
	$(".btnLoggedIn").on( "click", function() {
		login();
	});
	
	$('#formLogin input').keypress(function (e) {
	  if (e.which == 13) {
			login();
	  }
	});
	
	
	
	$(".btnRetrievePassword").on( "click", function() {
		retrievePassword();
	});
	
	
	$('#formRetrievePassword input').keypress(function (e) {
	  if (e.which == 13) {
			retrievePassword();
	  }
	});
	
	$(".jqToggleSidebar").on( "click", function() {
		
		
		  $( ".sidebar" ).animate({
			/*opacity: 0.25*/
			left:"-250px"
		  }, 300, function() {
			// Animation complete.
		  });
		  
		   $( "#page-wrapper" ).animate({
			/*opacity: 0.25*/
			marginLeft:"0px"
		  }, 300, function() {
			// Animation complete.
		  });
 
	});
	
	
	$(".jqExpand").on( "click", function() {
		
		  $( ".sidebar" ).animate({
			/*opacity: 0.25*/
			left:"0px"
		  }, 300, function() {
			// Animation complete.
		  });
		  
		   $( "#page-wrapper" ).animate({
			/*opacity: 0.25*/
			marginLeft:"250px"
		  }, 300, function() {
			// Animation complete.
		  });
 
	});
	
		
});	

////////////////////////////////////////////////////////
///////////////Init Functions/////////////////


function retrievePassword(){
		//$(".jqLoginStatus").addClass("hide");
		$("#loaderModal").modal();
		$(".jqRetrievePasswordStatus").html("&nbsp;");
		$.post("<?php echo base_url();?>AUser/processRetrievePassword",$("#formRetrievePassword").serialize(),
				   function(data){
				   if(data.process){
						//window.location="<?php echo base_url()?>";
						//$(".jqRetrievePasswordStatus").addClass("hide");
						$(".jqRetrievePasswordStatus").html(statusLabel(true,data.status));
				   }else{
						$(".jqRetrievePasswordStatus").removeClass("hide");
						$(".jqRetrievePasswordStatus").html(statusLabel(false,data.status));
				   }
				   
				   $("#loaderModal").modal('hide');
				   return false;
	    }, "json");
		
}//end of login


function login(){
		//$(".jqLoginStatus").addClass("hide");
		
		$(".jqLoginStatus").html("&nbsp;");
		$.post("<?php echo base_url();?>AUser/processLogin",$("#formLogin").serialize(),
				   function(data){
				   if(data.process){
						window.location="<?php echo base_url()?>";
						$(".jqLoginStatus").addClass("hide");
						$(".jqLoginStatus").html(statusLabel(true,data.status));
				   }else{
						$(".jqLoginStatus").removeClass("hide");
						$(".jqLoginStatus").html(statusLabel(false,data.status));
				   }
	    }, "json");
		
}//end of login

function statusLabel(process,status){
	
	if(process){
		statusLabelText='<div class="alert alert-success">'+
             status+
            '</div>';
	}else{
		statusLabelText='<div class="alert alert-danger">'+
             status+
            '</div>';
		
	}
	
	return statusLabelText;
}


function initProcess(data){
	$("#loaderModal").modal('hide');
	finalProcess=true;
	if(data.logged){
		if(data.restrict){
				$("#restrictionModal").modal();
				finalProcess=false;
		}else{
				if(data.process){
					finalProcess=true;
				}else{
					finalProcess=false;
				}
		}
	}else{
		$("#notLoggedModal").modal();	
		finalProcess=false;
	}
	
	return finalProcess;
}


function closeModalSlow(selector){
	setTimeout(function(){ 
		$(selector).modal('hide');
	}, 2000);
	
}


function cLog(tmpVar2){
	
	$(".consoleSection").append(tmpVar2+'<br>');
	
}


function formatDate(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + "  " + strTime;
}

function loadSession(variable){
					return window.localStorage.getItem(variable);
}
	
function setItemSession(variable,value){
				return window.localStorage.setItem(variable,value);
}

function removeItemSession(variable){
	window.localStorage.removeItem(variable);
}	


</script>	