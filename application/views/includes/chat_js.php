<?php
$sessUser=sessionUser();
?>
<script type="text/javascript"> 
var user_id='';
var tmpVarChat='';
var tmpChatBoxID='';
var countUnread=0;
$(document).ready(function(){
	
			<?php  if(!loggedIn()){  ?>
			$('#chat-container').toggle('slide', {
					direction: 'right'
			}, 100);

			$(".iconChatOpen").hide();
			

			<?php }else{ ?>
			
			$( "#chat-container" ).load( base+"chat/initLoad");
			
			if((loadSession('chatOpen')==null) || (loadSession('chatOpen')=='false') ){
				$('#chat-container').toggle('slide', {
					direction: 'right'
				}, 100);
				
			}else{
				//alert("Chat Open"+loadSession('chatOpen'));
			}
			chatHeartBeat();
				
			<?php } ?>

/*
loadSession
setItemSession
removeItemSession
*/

/*----------------------------------------------------------------------
| Function to send message
------------------------------------------------------------------------*/
$(document).on('keypress', '.chat-textarea input', function(e){
	
        var txtarea = $(this);
        var message = txtarea.val();
        if(message !== "" && e.which == 13){
            txtarea.val('');
			user_id=txtarea.parents("#chat-box").attr("alt");
			
			$.ajax({
			method:"POST",
			dataType: 'json',
			data:{user_second_id:user_id,message: message},
			url:"<?php echo base_url();?>AChat/postChatMessage",
			success: function(data) {
				if(initProcess(data)){
					 loadUpdatedChat();
				}else{
					//Not Process
				}
				
				
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
						$("#errorModal").modal();
					}
			});
			
        }
});


/*----------------------------------------------------------------------
| Function to display individual chatbox
------------------------------------------------------------------------*/

$(document).on('click', '[data-toggle="popover"]', function(){
      
		$(this).popover('hide');
		
        //$('ul.chat-box-body').empty();
        user_id = $(this).find('input[name="user_id"]').val();
		$(this).find('span[rel="'+user_id+'"]').text('');
		$(this).find('.badge').hide();

		$('#chat-box').removeClass();
		$('#chat-box').addClass("jqChatBox"+user_id);
		$('#chat-box').attr("alt",user_id);
		
		$('.chat-textarea input').val('');
		
	$.ajax({
	method:"POST",
	dataType: 'json',
	data:{user_second_id:user_id},
	url:"<?php echo base_url();?>AChat/loadChatMessages",
	success: function(data) {
		if(initProcess(data)){
			
			//Load Chat Box Info And Messages
			
			if(data.onlineStatus=='is-online'){
				$('#chat-box > .chat-box-header > small').html('Online');
				$('#chat-box > .chat-box-header > span.user-status').removeClass().addClass('user-status is-online');
			}else{
				 $('#chat-box > .chat-box-header > small').html('Offline');
				 $('#chat-box > .chat-box-header > span.user-status').removeClass().addClass('user-status is-offline');
				
			}
		
            $('#chat_buddy_id').val(data.user_id);
            $('.display-name', '#chat-box').html(data.user_firstname+" "+data.user_lastname);
			
			$(".lastChatID").val(data.chat_id);
			$('ul.chat-box-body').html(data.html);
			$('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
          	
		}else{
			//Not Process
		}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
				$("#errorModal").modal();
			}
	});
		
        //load_thread(user);

        var offset = $(this).offset(); 
        var h_main = $('#chat-container').height();
        var h_title = $("#chat-box > .chat-box-header").height();
        var top = ($('#chat-box').is(':visible') ? (offset.top - h_title - 40) : (offset.top + h_title - 20));
        if((top + $('#chat-box').height()) > h_main){ top = h_main -  $('#chat-box').height();}
        $('#chat-box').css({'top': top});
        if(!$('#chat-box').is(':visible')){
            $('#chat-box').toggle('slide',{
                direction: 'right'
            }, 500);
        }
       // $('.chat-box-body').slimScroll({ height: '300px' });
        // FOCUS INPUT TExT WHEN CLICK
        $("#chat-box .chat-textarea input").focus();
		
		
		
});

		$(document).on("click", '.jqInitChatOpen', function ($e) {
			setItemSession('chatOpen',true);
		});
		
		
		$(document).on("click", '.jqInitChatClose', function ($e) {
			setItemSession('chatOpen',false);
		});
		
});	
	
///////////////////////////////////////////////////////////

function chatHeartBeat(){
	refresh = setInterval(function()
    {
	 loadUpdatedChat();
	},4000);	
}


function loadUpdatedChat(){
	
	
		if($('#chat-box').css('display') == 'block'){
			tmpChatBoxID=$('#chat-box').attr("alt");
	    }else{
			tmpChatBoxID=0;
		}
		
		countUnread=0;
		$.ajax({
			method:"POST",
			dataType: 'json',
			data:{user_id:tmpChatBoxID},
			url:"<?php echo base_url();?>AChat/loadUpdates",
			success: function(data) {
				//if(initProcess(data)){
							$.each( data.listUsers, function( key, value ) {
								
								$(".jqChatUser"+value.user_id).find('.user-status').removeClass('is-online');
								$(".jqChatUser"+value.user_id).find('.user-status').removeClass('is-offline');
								$(".jqChatUser"+value.user_id).find('.user-status').addClass(value.onlineStatus);
								
								if($('.jqChatBox'+value.user_id).css('display') == 'block')
								{
									if(data.chat_id!=$(".lastChatID").val()){
										if(data.html!=""){
											$('ul.chat-box-body').append(data.html);
											$('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
										}
									}
									
									$(".lastChatID").val(data.chat_id);
								
								}
								if(value.unread>0){
									
									//$(".jqChatUser"+value.user_id).find('.badge').attr('style','visibility: visible');
									$(".jqChatUser"+value.user_id).find('.badge').css('display','inline');
									$(".jqChatUser"+value.user_id).find('.badge').html(value.unread);
									
									$(".jqChatUser"+value.user_id).find('.badge').removeClass('hideInit');
									countUnread+=1;
									
								}else{
									//$(".jqChatUser"+value.user_id).find('.badge').attr('style','visibility: hidden');
									$(".jqChatUser"+value.user_id).find('.badge').css('display','none');
									$(".jqChatUser"+value.user_id).find('.badge').addClass('hideInit');
								}
								
								
							});
							
							
							if(countUnread){
									$(".iconChatOpen i").effect( "shake" );
							}		
				//}else{
					//Not Process
				//}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
						$("#errorModal").modal();
						$("#loaderModal").modal('hide');
					}
			});
	
	
}


function loadOnlineUser(){
	
	$.ajax({
	method:"POST",
	dataType: 'json',
	url:"<?php echo base_url();?>AChat/loadActiveUser",
	success: function(data) {
		if(initProcess(data)){
					$(".listActiveUsers").html(data.html);
					//$("."+section).html(data.html);
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




</script>