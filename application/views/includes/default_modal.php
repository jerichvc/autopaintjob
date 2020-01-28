<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="myModalSub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="loaderModalSmall" tabindex="-1"  data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class=""  style="background-color:none;
																		border:none;
																		border-radius:0;
																		box-shadow:0;">
                                        <div class="modal-body">
											<div align='center'>
													<img style="margin-top:100px;" src="<?php echo base_url();?>img/box.gif" width="200">
											</div>
										</div>
                                      
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="loaderModal" tabindex="-1"  data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                      
                                        <div class="modal-body">
											<div align='center'>
													<img src="<?php echo base_url();?>img/box.gif" width="200">
											</div>
											<div class="alert alert-success">Loading ...</div>
										</div>
                                      
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="restrictionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Access Permission</h4>
                                        </div>
                                        <div class="modal-body">
											<div class="alert alert-danger">
													You are not authorize to access this module.
											</div>
										
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModal" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="errorModal">Error Occured</h4>
                                        </div>
                                        <div class="modal-body">
											<div class="alert alert-danger">
													Something went wrong.Please notify admin about this issue
											</div>
										
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="notLoggedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Login Required</h4>
                                        </div>
                                        <div class="modal-body">
											<div class="alert alert-danger">
													Your are not logged in or your session has been expired.
													<a href="<?php echo base_url();?>user/login"><button type="button" class="btn btn-primary">Log In</button></a>
											</div>
										
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
</div>