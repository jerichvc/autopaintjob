
<?php for($i=0;$i<count($listInQueue);$i++){ ?>
  <tr>
                                            <td><?php echo $listInQueue[$i]['car_queue_plate_no'];?></td>
                                            <td><?php echo $listInQueue[$i]['car_queue_current_color'];?></td>
                                            <td><?php echo $listInQueue[$i]['car_queue_target_color'];?></td>
    </tr>
<?php }//end of lop?>    