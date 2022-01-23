  <?php 
  require_once("header.php");
  require_once("sidebar.php");
  // require_once("Mon_atten_menu.php");


  $attend=$conn->query("SELECT * FROM `employee`");
  $name=$_POST['emp_id'];
  $Month=$_POST['emp_moth'];
  $Years=$_POST['years'];
  $date=$Years.'-'.$Month;
  $holiday=$conn->query("SELECT * FROM `holiday`");
  // $to_date=$date.'-'.$x;
  $y=0;
  $total=0;


  ?>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            
            
                    <?php
                    $att=$conn->query("SELECT * FROM `employee` WHERE empID='$name'");
                    $d_employee=$att->fetch_assoc();
                    ?>
  <h3>Monthly Attendance Report Of " <?php echo $d_employee['name'] ?>"</h3> 
            <table class="table table-bordered">
              <tr>
                <th>SL</th>
                <th>Date</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Status</th>       
              </tr>
              <?php
              $dcount=cal_days_in_month(CAL_GREGORIAN, 6, 2021);
                  // echo"$dcount";

                  // $dd=$dcount;
              $i=0;
              for ($x = 1; $x <=$dcount; $x++) { 
                  $to_date=$date.'-'.sprintf('%02d', $x);
                  // echo '<pre>';
                  // print_r($to_date);
                  
                  $weekend=false;
                  $h=$conn->query("SELECT * FROM `holiday` WHERE `start_date`<='$to_date' AND `end_date`>='$to_date'");
                  $hl=$h->fetch_assoc();
                  // print_r($hl);
                  // $holiday=$hl->title;
                  $leave=$conn->query("SELECT leave_application.*,leave_type.title FROM `leave_application`JOIN leave_type ON leave_type.typeID=leave_application.typeID WHERE `start_date`<='$to_date' AND `end_date`>='$to_date'");
                  $l=$leave->fetch_assoc();
                  // echo "<pre>";
                  $ll=false;
                  $lll='';
                  if (@$l['title']){
                      $ll=true;
                      $lll=$l['title'];
                  }
                  
                  


                ?>
                <tr>
                  <td><?php  echo ++$i;  ?> </td>  

                  <td><?php echo $date.'-'.$x ;?> </td>

                  
                  <?php
  if(date('l',strtotime($to_date))=='Friday') {
      ?>
  <td class='bg-danger'>

  </td>
  <td class='bg-danger'>

  </td>
  <td class='bg-danger'>
  weekend
  </td>
      <?php
  }else if($h->num_rows>0){
      
      ?>
  <td class='bg-info'>

  </td>
  <td class='bg-info'>

  </td>
  <td class='bg-info'>
  <?php echo $hl['title']; ?>
  </td>
      <?php
  }else if($leave->num_rows>0){

      ?>
  <td class='bg-warning'>

  </td>
  <td class='bg-warning'>

  </td>
  <td class='bg-warning'>
  <?php echo $lll; ?>
  </td>
      <?php
  }else{
      $in=$conn->query("SELECT * FROM `attendance` WHERE empID=$name AND type='in_time' AND punch_time like '$to_date%'");
      $out=$conn->query("SELECT * FROM `attendance`where empID=$name AND type='out_time' AND punch_time like '$to_date%' ORDER BY punch_time DESC LIMIT 1");

          $in_time=$in->fetch_assoc();
          $out_time=$out->fetch_assoc();
          
          
          ?>
          <td>
          <?php 
            $t=explode(' ', @$in_time['punch_time']);
            $o=explode(' ', @$out_time['punch_time']);
          if(isset($t[1])){
              echo $t[1];
          }else{
              echo 'Absent';
          }
            ?>
          </td>
          <td>
          <?php 

          if(isset($o[1])){
              echo $o[1];
          }else{
            echo 'Absent';

          }
            ?>
          </td> 
          <td>
            
          <?php
            
          if(isset($t[1])){
                  if(strtotime($t[1])<=strtotime('9:00') && strtotime($o[1])>=strtotime('16.00')){
                    echo 'present';?><input type="hidden" value='<?php ++$y ?>'>
                    <?php 
                  }else{
                    echo'Absent';  

                  } 
                }
                
              ?>
          
          </td>
              <?php
  }
                  ?>
              </tr>
            <?php } ?> 

            <td colspan="4" class="text-right">Total Present</td>
            <td colspan="4" class="text-right"><?php 
          
            echo number_format($total+$y)?></td>

          </div>
        </table>
      </div>
    </div>
  </div>
  </div>
  </section>

  <?php require("footer.php"); ?>