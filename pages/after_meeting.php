<?php
include "connect.php";
if (isset($_POST['user_id_add_vacation_last_year'])) {

    $ss='SELECT COUNT(user_id) FROM vacation_last_year WHERE user_id ="'.$_POST['user_id_add_vacation_last_year'].'"';
    $result=mysqli_query($conn,$ss);
    $row =mysqli_fetch_array($result);

    if ($row['0']==0) {
      $sql='INSERT INTO `vacation_last_year` (`user_id`, `va_num`, `add_id`)
            VALUES ("'.$_POST['user_id_add_vacation_last_year'].'","'.$_POST['number_of_day'].'","119")';
      $res =mysqli_query($conn,$sql);
      if ($res) {
        echo 1;
      }else{
        echo 2;
      }

    }else{

      $sql ='UPDATE `vacation_last_year` SET `va_num`="'.$_POST['number_of_day'].'"
      WHERE (`user_id`= "'.$_POST['user_id_add_vacation_last_year'].'")';
      $res =mysqli_query($conn,$sql);
      if ($res) {
        echo 1;
      }else{
        echo 2;
      }
    }


}




if (isset($_POST['johnatar_maty'])) {

      $data =$_POST['johnatar_maty'][2];
     if ($data ==1) {
        $rang = (date('Y')-1).'-12-26';
        $rang2 = date('Y').'-01-25';
        }else if ($data ==2) {
          $rang = date('Y').'-01-26';
            $rang2 = date('Y').'-02-25';
         }else if ($data ==3) {
          $rang = date('Y').'-02-26';
            $rang2 = date('Y').'-03-25';
          }else if ($data ==4) {
          $rang = date('Y').'-03-26';
          $rang2 = date('Y').'-04-25';
           }else if ($data ==5) {
            $rang = date('Y').'-04-26';
              $rang2 = date('Y').'-05-25';
            }else if ($data ==6) {
              $rang = date('Y').'-05-26';
              $rang2 = date('Y').'-06-25';
              }else if ($data==7) {
                $rang = date('Y').'-06-26';
                $rang2 = date('Y').'-07-25';
              }else if ($data==8) {
                $rang = date('Y').'-07-26';
                $rang2 = date('Y').'-08-25';
                }else if ($data==9) {
                  $rang = date('Y').'-08-26';
                  $rang2 = date('Y').'-09-25';
                }else if ($data==10) {
                  $rang = date('Y').'-09-26';
                  $rang2 = date('Y').'-10-25';
                }else if ($data==11) {
                  $rang = date('Y').'-10-26';
                  $rang2 = date('Y').'-11-25';
                }else{
                  $rang = date('Y').'-11-26';
                  $rang2 = date('Y').'-12-25';
                }

$sql ="SELECT

STATUS.user_id,
	sum.day_n,
	sum.ty_id,
	sum.date,
	sum.COMMENT
FROM
	STATUS INNER JOIN sum ON STATUS.sum_id = sum.sum_id
WHERE
	STATUS.user_id = '".$_POST['johnatar_maty'][1]."'
	AND sum.ty_id  = '".$_POST['johnatar_maty'][0]."'
  AND sum.date >= '".$rang."'
	AND sum.date <= '".$rang2."'
";
  echo '<div class="table-responsive">
                             <table class="table table-striped">
                               <thead>
                                     <tr>
                                         <th>ลำดับ</th>
                                         <th>วันที่ </th>
                                         <th>จำนวน</th>
                                         <th>หมายเหตุ</th>
                                     </tr>
                                 </thead>
                                 <tbody>';
  $result = mysqli_query($conn,$sql);
  $i =1;
  $total =0;
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  $total += $row['day_n'];
      echo '

                                        <tr>
                                            <td>'.$i.'</td>
                                            <td>'.date('d/m/Y',strtotime($row['date'])).'</td>
                                            <td>'.$row['day_n'].'</td>
                                            <td>'.$row['COMMENT'].'</td>
                                        </tr>
          ';


$i++;}

echo '  <tr>
            <td></td>
            <td>รวม</td>
            <td>'.$total.'</td>
            <td></td>
        </tr>



</tbody>
          </table>
                </div>';


}
?>
