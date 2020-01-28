 </div>
   
 
 <script type="text/javascript"> 


    $(document).ready(function($){
    
    
    
    heartBeat();
    
    	$(document).on("change", '.selTargetColor', function ($e) {
           
            if($(this).val()!=""){
                  $("#iTargetColor").attr("src","<?php echo base_url()?>img/cars/"+$(this).val()+".png");
            }else{
                 $("#iTargetColor").attr("src","<?php echo base_url()?>img/cars/gray.png");
            }
        });
        
        
        
        
         $(document).on("click", '.jqPageNewPaintJobs', function ($e) {
         
            $(".statusPaintJob").hide();
        });
        
         $(document).on("click", '.jqPagePaintJobs', function ($e) {
                                loadInProgress();
                                loadInQueue();
                                loadStats();
         
        });
        
        
        $(document).on("click", '.btnSubmitPaintJob', function ($e) {
            
            
            $(".statusPaintJob").show();
        
                            $.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AAutoPaint/processAddPaintJob",
					data: $("#formNewPaintJob").serialize(),
					success: function(data) {
                                         //    
                                            if(data.process){
                                                 $(".statusPaintJob").addClass("alert-success");
                                                 $(".statusPaintJob").removeClass("alert-danger");
                                                 
                                                 $("#formNewPaintJob input").val("");
                                                 $("#formNewPaintJob select").val("");
                                                
                                            }else{
                                                 $(".statusPaintJob").addClass("alert-danger");
                                                 $(".statusPaintJob").removeClass("alert-success");
                                            }
                                            
                                            $(".statusPaintJob").html(data.status);
						
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(".").addClass("");
                                                $(".").removeClass("");
                                                
					}
				});
        
        
        });
        
        
        
        $(document).on("click", '.jqUpdatePaintJob', function ($e) {
        
                            $.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AAutoPaint/processUpdatePaintJob",
					data: {car_queue_id:$(this).attr("alt")},
					success: function(data) {
                                         
                                            if(data.process){
                                               loadInProgress();
                                               loadInQueue();
                                               loadStats();
                                            }
                                          	
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(".").addClass("");
                                                $(".").removeClass("");
                                                
					}
				});
        
        
        });
        
        
        
        
        
        
        
        
      
        
     
    
    });
    
    
    
    function heartBeat(){
    
                setTimeout(function(){ 
                    
                    loadInProgress();
                    loadInQueue();
                    loadStats();
                
                    heartBeat();
    
    
                }, 5000);
    
    
    
    
    }
    
    
    
    
      function loadInProgress(){
        
                            $.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AAutoPaint/loadInProgress",
					success: function(data) {
                                         //    
                                            if(data.process){
                                             $(".listPaintJob").html(data.html);
                                                
                                            }
                                         	
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert("Ajax error:"+textStatus);
                                                
					}
				});
        
        
        }
       
        
        function loadInQueue(){
        
                            $.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AAutoPaint/loadInQueue",
					success: function(data) {
                                         //    
                                            if(data.process){
                                             $(".listQueuePaintJob").html(data.html);
                                                
                                            }
                                  		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert("Ajax error:"+textStatus);
                                                
					}
				});
        
        
        
        
        
        }
    


        function loadStats(){
            
            
            
            
             $.ajax({
					method:"POST",
					dataType: 'json',
					url:"<?php echo base_url();?>AAutoPaint/loadStats",
					success: function(data) {
                                         //    
                                            if(data.process){
                                             $(".countTotal").html(data.countTotal);  
                                             $(".countRed").html(data.countRed);
                                             $(".countGreen").html(data.countGreen);
                                             $(".countBlue").html(data.countBlue);
                                                
                                            }
                                  		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert("Ajax error:"+textStatus);
                                                
					}
				});
            
            
            
        }
</script>
</body>

</html>
