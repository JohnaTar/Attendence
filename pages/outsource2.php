
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="johnatar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
date_default_timezone_set('Asia/Bangkok');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql ="SELECT co_name  FROM companny WHERE co_id ='".$_POST['companny_id']."'";
$query =mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query,MYSQLI_ASSOC);

$strExcelFileName= $row['co_name'].'.xls';
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");





?>

<html>

<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php



        include 'connect_pdo.php';

        $process = new Outsource();
 ?>


 <style>
 table, th, td {
   border: 1px solid black;
 border-collapse: collapse;
 }
 </style>

</head>

<body>
  <?php

    $get_user =  $process->get_user_in_companny($_POST['companny_id']);





      echo '
      <table >
          <thead>
                <tr>
                    <th rowspan="3">ชื่อ - นามสกุล</th>
                    <th rowspan="3">แผนก</th>
                    <th rowspan="3">เบอร์</th>

                    <th colspan="11 " style="text-align:center">'.$row['co_name'].'
                    '.date('d/m/Y',strtotime($_POST['rank_of_date'])).' - '.date('d/m/Y',strtotime($_POST['rank_of_date2'])).'


                    </th>




                </tr>
                <tr style="text-align:center">
                    <th colspan="4"></th>
                    <th style="text-align:center">ลาป่วย</th>
                    <th style="text-align:center">ลาป่วย</th>
                    <th style="text-align:center">ลาป่วย</th>
                    <th style="text-align:center">ลากิจ</th>
                    <th style="text-align:center">ลากิจ</th>
                    <th style="text-align:center">ลากิจพิเศษ</th>
                    <th></th>

                </tr>
                <tr>
                  <th>สาย</th>
                  <th>ลืมสแกน</th>
                  <th>ออกก่อน</th>
                  <th>ขาดงาน</th>

                    <th style="text-align:center"><sup>ไม่มีใบรับรองแพทย์</sup></th>
                    <th style="text-align:center"><sup>มีใบรับรองแพทย</sup></th>
                    <th style="text-align:center"><sup>จากการทำงาน</sup></th>
                    <th style="text-align:center"><sup>ได้ค่าจ้าง</sup></th>
                    <th style="text-align:center"><sup>ไม่ได้ค่าจ้าง</sup></th>
                    <th style="text-align:center"><sup>ได้ค่าจ้าง</sup></th>



                    <th>ลาอื่น</th>



                </tr>





          </thead>
          <tbody>';




           $i = 1;
          if (!empty($get_user)) {
              foreach($get_user as $get_users){
                $user_id =$get_users['oc_id'];
                 //วันที่ 1

                $first_day_of_month =$_POST['rank_of_date'];
                $last_day_of_month =$_POST['rank_of_date2'];


                $data = $process->coutn_sick($user_id,$first_day_of_month,$last_day_of_month); //นับป่วย

              //ลาออก
              if ($get_users['resign'] ==2) {
                $resign = 'style="text-decoration:line-through; color:red;"';
              } else{
                $resign ='';
              }

              echo '
                    <tr  '.$resign.' >

                      <td><div style="width: 140px">'.$get_users['oc_name'].'</td>
                      <td>'.$get_users['dep_co_name'].'</td>
                      <td>'.$get_users['tel'].'</td>
                      <td>'.$data['count_late'].'</td>
                      <td>'.$data['count_forget'].'</td>
                      <td>'.$data['count_exit'].'</td>
                      <td>'.$data['count_kad'].'</td>
                      <td>'.$data['coutn_sickno'].'</td>
                      <td>'.$data['count_sickhave'].'</td>
                      <td>'.$data['count_sickwork'].'</td>
                      <td>'.$data['count_kit'].'</td>
                      <td>'.$data['count_kitno'].'</td>
                      <td>'.$data['count_kitex'].'</td>
                      <td>'.$data['count_etc'].'</td>











                    </tr>


              ';
              $i++;



              }
          }


          echo '


          </tbody>
      </table>
      <!-- /.table-responsive -->';




  ?>










</body>

</html>
