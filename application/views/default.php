<?php
$this->load->view('includes/initheader');
$this->load->view('includes/header');
?>


 <div id="page-wrapper">
     
           
    
     
     
          <div class="row">
                <div class="col-lg-12">   
             
                    
                      <div class="row">
                <div class="col-lg-12">  
                        &nbsp;
                </div>
 </div>
                     
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#new-paint-jobs" class="jqPageNewPaintJobs" data-toggle="tab">New Paint Job</a>
                                </li>
                                <li><a href="#list-paint-jobs" class="jqPagePaintJobs" data-toggle="tab">Paint Jobs</a>
                                </li>
                             
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="new-paint-jobs">
                                    
                                    
                                    <div class="row">
                                                 <div class="col-lg-12"> 
                                                     <div align="center"><h1>New Paint Jobs</h1></div>   
                                                 </div>  
                                    </div>
                                                     
                                           <div class="row">
                                                 <div class="col-lg-5"> 
                                                     <div align="center"><img src="<?php echo base_url();?>img/cars/default.png"></div>
                                                 </div>
                                               
                                                <div class="col-lg-2"> 
                                                   <div align="center"><img src="<?php echo base_url();?>img/cars/arrow.png"></div>
                                                 </div>
                                               
                                               
                                                <div class="col-lg-5"> 
                                                      <div align="center"><img id="iTargetColor" src="<?php echo base_url();?>img/cars/default.png"></div>
                                                 </div>
                                               
                                           </div>
                                    
                                    
                                     <div class="row">
                                         
                                         <form id="formNewPaintJob" onsubmit="return false;">
                                                    <div class="col-lg-4"> 

                                                        <div class="alert statusPaintJob">

                                                        </div>
                                                        

                                                    <div class="form-group">
                                                        <label>Plate No</label>
                                                        <input class="form-control" name="car_queue_plate_no">

                                                    </div>

                                                      <div class="form-group">
                                                          <label>Current Color</label>
                                                          <select class="form-control selCurrentColor" name="car_queue_current_color">
                                                              <option value=""></option>
                                                              <option value="Red">Red</option>
                                                              <option value="Green">Green</option>
                                                              <option value="Blue">Blue</option>
                                                          </select>
                                                      </div>

                                                    <div class="form-group">
                                                          <label>Target Color</label>
                                                          <select class="form-control selTargetColor" name="car_queue_target_color">
                                                              <option value=""></option>
                                                              <option value="Red">Red</option>
                                                              <option value="Green">Green</option>
                                                              <option value="Blue">Blue</option>
                                                          </select>
                                                    </div>

                                                       <button type="submit" class="btn btn btn-warning btnSubmitPaintJob">Submit</button>       
                                                  </div>
                                         </form>         
                                              
                                               
                                           </div>
                                    
                                    
                                    
                                </div>
                                
                                
                                
                                
                                
                                
                                <div class="tab-pane fade" id="list-paint-jobs">
                                         
                                    <div class="row">
                                                 <div class="col-lg-12"> 
                                                     <div align="center"><h1>Paint Jobs</h1></div>   
                                                 </div>  
                                    </div>
                                    
                                    
                                     <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Paint Jobs In Progress
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Plate No</th>
                                            <th>Current Color</th>
                                            <th>Targe Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="listPaintJob">
                                       <?php /* <tr>
                                            <td>1231-123</td>
                                            <td>Red</td>
                                            <td>Green</td>
                                            <td>--button here--</td>
                                        </tr>*/ ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    
                     <div class="panel panel-default">
                        <div class="panel-heading">
                          Paint Queue
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                       <tr>
                                            <th>Plate No</th>
                                            <th>Current Color</th>
                                            <th>Targe Color</th>
                                        </tr>
                                    </thead>
                                    <tbody class="listQueuePaintJob">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    
                    
                    
                </div>
                
                
            <div class="col-lg-4">    
               <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Shop Performance
                        </div>
                        <div class="panel-body">
                                   
                            <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Total Cars Painted</td>
                                            <td class="countTotal"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan='2'>Break Down</td>
                                            
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td>Blue </td>
                                            <td class="countBlue">0</td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td>Red</td>
                                            <td class="countRed">0</td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td>Green</td>
                                            <td class="countGreen">0</td>
                                        </tr>
                                    </tbody>
                        </div>
                      
                    </div>
                
            </div>
                
            </div>
                
                
                
                                </div>
                               
                            </div>
                       
                   
                </div>
          </div>
        
         
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php
$this->load->view('includes/footer');
?>