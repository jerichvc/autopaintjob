
<?php for($i=0;$i<count($listInProgress);$i++){ ?>
  <tr>
                                            <td><?php echo $listInProgress[$i]['car_queue_plate_no'];?></td>
                                            <td><?php echo $listInProgress[$i]['car_queue_current_color'];?></td>
                                            <td><?php echo $listInProgress[$i]['car_queue_target_color'];?></td>
                                            <td><a class="jqUpdatePaintJob" alt="<?php echo $listInProgress[$i]['car_queue_id'];?>" href="javascript:void(0);">Mark as Completed</a></td>
    </tr>
<?php }//end of lop?>    