<?php 
function getAttendance($name,$Month,$Years){


$conn= new mysqli("localhost", "root" , "", "php_project");
// $attend=$conn->query("SELECT * FROM `employee`");
$date=$Years.'-'.$Month;
// $holiday=$conn->query("SELECT * FROM `holiday`");

$y=0;
$A=0;
$total=0;
$dcount=cal_days_in_month(CAL_GREGORIAN, $Month, $Years);
$i=0;
for ($x = 1; $x <=$dcount; $x++) { 
  $to_date=$date.'-'.sprintf('%02d', $x);
  // $weekend=false;
  $h=$conn->query("SELECT * FROM `holiday` WHERE `start_date`<='$to_date' AND `end_date`>='$to_date'");
  $hl=$h->fetch_assoc();
  $leave=$conn->query("SELECT leave_application.*,leave_type.title FROM `leave_application`JOIN leave_type ON leave_type.typeID=leave_application.typeID WHERE `start_date`<='$to_date' AND `end_date`>='$to_date'");
  $l=$leave->fetch_assoc();

  $ll=false;
  $lll='';
  if ($l['title']){
    $ll=true;
    $lll=$l['title'];
  }
  if(date('l',strtotime($to_date))=='Friday'){

  }else if($h->num_rows>0){

  }else if($leave->num_rows>0){

}else{
    $in=$conn->query("SELECT * FROM `attendance` WHERE empID=$name AND type='in_time' AND punch_time like '$to_date%'");
    $out=$conn->query("SELECT * FROM `attendance`where empID=$name AND type='out_time' AND punch_time like '$to_date%' ORDER BY punch_time ASC LIMIT 1");

    $in_time=$in->fetch_assoc();
    $out_time=$out->fetch_assoc();
     $t=explode(' ', $in_time['punch_time']);
    $o=explode(' ', $out_time['punch_time']);
    if(isset($t[1])){
      if(strtotime($t[1])<=strtotime('9:00') && strtotime($o[1])>=strtotime('16.00')){
       ++$y ;

     }else{
      ++$A;

     } 
   }
}
} 

return array('present' =>$total+$y ,'absent'=>$total+$A );

}
 $re=getAttendance(2,'12','2021');
 echo $re['present'];
?>

