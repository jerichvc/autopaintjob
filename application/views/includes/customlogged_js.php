<?php
$sessUser=sessionUser();
?>
<script type="text/javascript"> 
$(document).ready(function($){
	
	$(".btnUpdateAccount").on( "click", function() {
				updateAccount();
		});
		
	$('#formUpdateAccount input').keypress(function (e) {
	  if (e.which == 13) {
			updateAccount();
	  }
	});
	
	
	
	
	$(".btnAddUserRegAccount").on( "click", function() {
				addUserRegAccount();
	});
		
	$('#formAddUserRegAccount input').keypress(function (e) {
	  if (e.which == 13) {
			addUserRegAccount();
	  }
	 }); 
	
	
	$(".btnAddUserAccount").on( "click", function() {
				addUserAccount();
	});
		
	$('#formAddUserAccount input').keypress(function (e) {
	  if (e.which == 13) {
			addUserAccount();
	  }
	 }); 
	 
	 
	 	$(".btnUpdateUserRegAccount").on( "click", function() {
				updateUserRegAccount();
		});
		
		
		$('#formUpdateUserRegAccount input').keypress(function (e) {
		  if (e.which == 13) {
				updateUserRegAccount();
		  }
		 }); 
		 
		 
		 
	 
	 $(".btnUpdateUserAccount").on( "click", function() {
				updateUserAccount();
		});
		
		$('#formUpdateUserAccount input').keypress(function (e) {
		  if (e.which == 13) {
				updateUserAccount();
		  }
		 }); 
		 
		 
		 
		 $(".btnInitUserDelete").on( "click", function() {
				//Load First
				var user_id=$(this).attr("alt");
				$.post("<?php echo base_url();?>AUser/initDelete",{user_id:user_id},
				   function(data){
						$(".modal-content").html(data.html);
						$('#myModal').modal('show');
				}, "json");
		});
		
		
		$(document).on("click", '.btnConfirmUserDelete', function ($e) {
				var user_id=$(this).attr("alt");
				$.post("<?php echo base_url();?>AUser/confirmDelete",{user_id:user_id},
				   function(data){
				   
				 		$(".modal-body").html(data.status);
						setTimeout($('#myModal').modal('hide'),2000);
					
					if(!data.restrict){
						setTimeout(window.location="<?php echo base_url()?>user/lists",6000);
					}	
					
					
					
					
						
				}, "json");
		});
		
		
		
	
////////////////////////////////////////////////////////
///////////////Authorized Admin////////////////////////	
<?php if(checkPermission($sessUser['user_type_id'],'list_user_type_permission')){ ?>
		$(".jqListUserSitePermission").on( "click", function() {
				
				
				var tmpContainer=$(this).parent("td").find(".jqUserSitePermission");	
				
				 tmpContainer.toggle("slow");
				  $.post("<?php echo base_url();?>AUser/listUserSitePermission",{user_type_id:$(this).attr("alt")},
				   function(data){
				   if(data.process){
						$(".jqUserSitePermission").removeClass("hide");
						$(".jqUserSitePermission").removeClass("alert-danger");
						$(".jqUserSitePermission").addClass("alert-success");
				   }else{
						$(".jqUserSitePermission").removeClass("hide");
						$(".jqUserSitePermission").removeClass("alert-success");
						$(".jqUserSitePermission").addClass("alert-danger");
				   }
				   tmpContainer.html(data.html);
				  
				   
				}, "json");
					
			});
		
<?php } ?>		
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////	


//loadOnlineUser();

$(".logoutLink").on( "click", function() {
			removeItemSession('chatOpen');
});
		

});	


function addUserAccount(){
				$(".jqAddMemberAccountStatus").addClass("hide");
			$.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AUser/processAddUserAccount",
					data: $("#formAddUserAccount").serialize(),
					success: function(data) {
						
						if(initProcess(data)){
							$("#formAddUserAccount").hide();
							$(".jqAddUserAccountStatus").removeClass("hide");
							$(".jqAddUserAccountStatus").removeClass("alert-danger");
							$(".jqAddUserAccountStatus").addClass("alert-success");
						}else{
							$(".jqAddUserAccountStatus").removeClass("hide");
							$(".jqAddUserAccountStatus").removeClass("alert-success");
							$(".jqAddUserAccountStatus").addClass("alert-danger");
						}
			
						 $(".jqAddUserAccountStatus").html(data.status);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						 $("#errorModal").modal();
						 $("#loaderModal").modal('hide');
					}
				});
}


function addUserRegAccount(){
				$(".jqAddMemberAccountStatus").addClass("hide");
			$.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AUserReg/processAddUserRegAccount",
					data: $("#formAddUserRegAccount").serialize(),
					success: function(data) {
						
						if(initProcess(data)){
							$("#formAddUserRegAccount").hide();
							$(".jqAddUserAccountStatus").removeClass("hide");
							$(".jqAddUserAccountStatus").removeClass("alert-danger");
							$(".jqAddUserAccountStatus").addClass("alert-success");
						}else{
							$(".jqAddUserAccountStatus").removeClass("hide");
							$(".jqAddUserAccountStatus").removeClass("alert-success");
							$(".jqAddUserAccountStatus").addClass("alert-danger");
						}
			
						 $(".jqAddUserAccountStatus").html(data.status);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						 $("#errorModal").modal();
						 $("#loaderModal").modal('hide');
					}
				});
}



function updateAccount(){
		$(".jqUpdateAccountStatus").addClass("hide");
		$.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AUser/processUpdateAccount",
					data: $("#formUpdateAccount").serialize(),
					success: function(data) {
						
						if(initProcess(data)){
							$("#formUpdateAccount").hide();
							$(".jqUpdateAccountStatus").removeClass("hide");
							$(".jqUpdateAccountStatus").removeClass("alert-danger");
							$(".jqUpdateAccountStatus").addClass("alert-success");
						}else{
							$(".jqUpdateAccountStatus").removeClass("hide");
							$(".jqUpdateAccountStatus").removeClass("alert-success");
							$(".jqUpdateAccountStatus").addClass("alert-danger");
						}
			
						 $(".jqUpdateAccountStatus").html(data.status);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						 $("#errorModal").modal();
						 $("#loaderModal").modal('hide');
					}
				});
}

function updateUserRegAccount(){
		$(".jqUpdateUserAccountStatus").addClass("hide");
		 $("#loaderModal").modal();
		$.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AUserReg/processUpdateUserRegAccount",
					data: $("#formUpdateUserRegAccount").serialize(),
					success: function(data) {
						
						if(initProcess(data)){
							$("#formUpdateUserRegAccount").hide();
							
							$(".jqUpdateUserAccountStatus").removeClass("hide");
							$(".jqUpdateUserAccountStatus").removeClass("alert-danger");
							$(".jqUpdateUserAccountStatus").addClass("alert-success");
						}else{
							$(".jqUpdateUserAccountStatus").removeClass("hide");
							$(".jqUpdateUserAccountStatus").removeClass("alert-success");
							$(".jqUpdateUserAccountStatus").addClass("alert-danger");
						}
			
						$(".jqUpdateUserAccountStatus").html(data.status);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						 $("#errorModal").modal();
						  $("#loaderModal").modal('hide');
					}
		});
}


function updateUserAccount(){
		$(".jqUpdateUserAccountStatus").addClass("hide");
		 $("#loaderModal").modal();
		$.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AUser/processUpdateUserAccount",
					data: $("#formUpdateUserAccount").serialize(),
					success: function(data) {
						
						if(initProcess(data)){
							$("#formUpdateUserAccount").hide();
							
							$(".jqUpdateUserAccountStatus").removeClass("hide");
							$(".jqUpdateUserAccountStatus").removeClass("alert-danger");
							$(".jqUpdateUserAccountStatus").addClass("alert-success");
						}else{
							$(".jqUpdateUserAccountStatus").removeClass("hide");
							$(".jqUpdateUserAccountStatus").removeClass("alert-success");
							$(".jqUpdateUserAccountStatus").addClass("alert-danger");
						}
			
						$(".jqUpdateUserAccountStatus").html(data.status);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						 $("#errorModal").modal();
						  $("#loaderModal").modal('hide');
					}
		});
}


function loadRegion(regCode,section){
	
	$.ajax({
	method:"POST",
	dataType: 'json',
	url:"<?php echo base_url();?>AMisc/loadRegion/"+regCode,
	success: function(data) {
		if(initProcess(data)){
					//$(".loadPDSIdentification").html(data.html);
					$("."+section).html(data.html);
		}else{
			//Not Process
		}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
				$("#errorModal").modal();
				$("#loaderModal").modal('hide');
			}
	});
		
}



function loadProvince(regCode,province_id,section){
	
       
	$.ajax({
	method:"POST",
	dataType: 'json',
	url:"<?php echo base_url();?>AMisc/loadProvince/"+regCode+"/"+province_id,
	success: function(data) {
		if(initProcess(data)){
					//$(".loadPDSIdentification").html(data.html);
					$("."+section).html(data.html);
		}else{
			//Not Process
		}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
				$("#errorModal").modal();
				$("#loaderModal").modal('hide');
			}
	});
		
}

function loadMunicipal(municipal_id,province_id,section){
	
	$.ajax({
	method:"POST",
	dataType: 'json',
	url:"<?php echo base_url();?>AMisc/loadMunicipal/"+municipal_id+"/"+province_id,
	success: function(data) {
		if(initProcess(data)){
					//$(".loadPDSIdentification").html(data.html);
					$("."+section).html(data.html);
		}else{
			//Not Process
		}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
				$("#errorModal").modal();
				$("#loaderModal").modal('hide');
			}
	});
		
}



function loadBarangay(barangay_id,municipal_id,province_id,section){
	
	$.ajax({
	method:"POST",
	dataType: 'json',
	url:"<?php echo base_url();?>AMisc/loadBarangay/"+barangay_id+"/"+municipal_id+"/"+province_id,
	success: function(data) {
		if(initProcess(data)){
					//$(".loadPDSIdentification").html(data.html);
					$("."+section).html(data.html);
		}else{
			//Not Process
		}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
				$("#errorModal").modal();
				$("#loaderModal").modal('hide');
			}
	});
		
}

function modalLoader(status){
	if(status){
		$("#myModal").find(".btn-primary").html('Processing...');
		$("#myModal").find(".btn-primary").addClass('disabled')	
		//$("#loaderModalSmall").modal();	
	}else{
		//$("#myModal").find(".btn-primary").show('slow');
		//$("#loaderModalSmall").modal('hide');	
	}	
}


function modalLoader2(status){
	if(status){
		//$("#myModal").find(".btn-primary").html('Processing...');
		//$("#myModal").find(".btn-primary").addClass('disabled')	
		//$("#loaderModalSmall").modal();	
	}else{
		//$("#myModal").find(".btn-primary").show('slow');
		setTimeout(function(){ $(".statusModalStatus").html(''); }, 2000);
		//$("#loaderModalSmall").modal('hide');	
	}	
}




</script>	