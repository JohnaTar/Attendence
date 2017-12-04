<?php
$strExcelFileName= 'employee.xls';
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
  table, th, td {
    border: 1px solid black;
  border-collapse: collapse;
  }
  </style>

</head>

<body>


    <div id="wrapper">

        <!-- Navigation -->



                            <table >
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align:center">ลำดับ</th>
                                        <th rowspan="2" style="text-align:center">ชื่อ - นามสกุล</th>
                                        <th rowspan="2" style="text-align:center">แผนก</th>
                                        <th rowspan="2" style="text-align:center">วันเริ่มงาน</th>
                                        <th rowspan="2" style="text-align:center">จำนวนวันทำงาน</th>
                                        <th colspan="3" style="text-align:center">พักร้อน</th>
                                        <th colspan="6" style="text-align:center">วันที่ : <?php echo date('d/m/Y',strtotime($_POST['rank_of_date'])).'-'.date('d/m/Y',strtotime($_POST['rank_of_date2'])); ?></th>




                                    </tr>
                                    <tr>
                                        <th>สิทธิ์</th>
                                        <th>ใช้</th>
                                        <th>เหลือ</th>
                                        <th>สาย</th>
                                        <th>ขาด</th>
                                        <th>ลาป่วย</th>
                                        <th>ลากิจ</th>
                                        <th>ลากิจพิเศษ</th>
                                        <th>ลาอื่น</th>





                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                if (isset($_POST['rank_of_date'])) {
                                  $rang =$_POST['rank_of_date'];
                                  $rang2 =$_POST['rank_of_date2'];
                                }

                                    function time_elapsed_string($datetime, $full = false) {
                                    $now = new DateTime;
                                    $ago = new DateTime($datetime);
                                    $diff = $now->diff($ago);
                                    $diff->w = floor($diff->d / 7);
                                    $diff->d -= $diff->w * 7;

                                    $string = array(
                                        'y' => 'year',
                                        'm' => 'month',

                                    );

                                    foreach ($string as $k => &$v) {
                                    if ($diff->$k) {
                                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                    } else {
                                        unset($string[$k]);
                                        }
                                    }

                                    if (!$full) $string = array_slice($string, 0, 1);
                                        return $string ? implode(', ', $string) . ' ' : '';
                                    }
                                    include ('connect.php');
                                    $sql ="SELECT `user`.user_id,`user`.`name`,`user`.resign,`user`.`start`,`user`.dep_id,
                                                   dep.dep_name

                                           FROM `user`
                                           INNER JOIN dep ON `user`.dep_id = dep.dep_id
                                           ORDER BY `user`.resign ASC ,`user`.dep_id ASC

                                          ";
                                    $res =mysqli_query($conn,$sql);
                                    $k =1;
                                    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {

                                     // นับวันที่พักร้อน*/
                                            $current_y = (date("Y")-1).'-12-26';
                                            $current_y2 =date("Y").'-12-25';


                                            $sqli="SELECT Sum(sum.day_n),sum.ty_id,sum.date,`status`.user_id
                                                   FROM sum
                                                   INNER JOIN `status` ON sum.sum_id = `status`.sum_id
                                                   WHERE user_id ='".$row['user_id']."' AND ty_id ='5'
                                                   AND date >= '".$current_y."' AND  date <= '".$current_y2."'";


                                            $result =mysqli_query($conn,$sqli);
                                            $rows   =mysqli_fetch_array($result);
                                            if ($rows['0'] !=0 ) {
                                                $vacation_cout_this_year= $rows['0'];
                                            }else{
                                                $vacation_cout_this_year= 0;
                                            }

                                        // นับวันที่พักร้อนปีที่แล้ว* ////////////////////////////////////////

                                        $last_y =  (date("Y")-2).'-12-26';
                                        $last_year_of_check_vacation =(date("Y")-1).'-12-25';
                                        $last_y_of_check_vacation =date_create($row['start']);
                                        $current_date_of_check_vacation = date_create($last_year_of_check_vacation);
                                        $diff = date_diff($last_y_of_check_vacation,$current_date_of_check_vacation);
                                        $love_you = $diff->format("%a");

                                          if ($love_you >=365 AND $love_you < 730) {


                                             $last_y22  =  date('Y', strtotime($row['start'])).'-12-25';
                                             $start_work = strtotime($row['start']);
                                             $end_of_year_work = strtotime($last_y22);
                                             $datediff = $end_of_year_work - $start_work;
                                             $do_work_last_year = floor($datediff / (60 * 60 * 24));// วันเริ่มทำงาน - วันสิ้นสุดปี

                                             if ($do_work_last_year <30 AND $do_work_last_year >=16) { //ถ้าวันน้อยกว่า 30 และมากกว่า 16
                                                  $i =1;

                                                   }else if ($do_work_last_year >=30) {

                                                        for   ($i=0; 30 <=$do_work_last_year; $i++) {
                                                               $day =  $do_work_last_year -= 30;
                                                        }

                                                         if ($day >=16) { /*หลังจากลบ 30 เดือนแล้วเหลือเศษ*/
                                                           $i++;
                                                               }
                                                    }else{

                                                  $i =0; /*I จำนวนเดือน*/
                                              }

                                              //คำนวณเดือน ถ้าจำนวนวันมากกว่า 16 ปรับเป็น 1 เดือน
                                                if ($i ==1) {
                                                   $sit_vacation =0.5;
                                                }else if ($i ==2) {
                                                   $sit_vacation =1;
                                                }else if ($i ==3) {
                                                   $sit_vacation =2;
                                                }else if ($i ==4) {
                                                   $sit_vacation = 2.5;                                                # code...
                                                }else if ($i ==5){
                                                   $sit_vacation = 3;
                                                }else if ($i ==6){
                                                   $sit_vacation = 4;
                                                }else if ($i ==7){
                                                   $sit_vacation = 4.5;
                                                }else if ($i ==8){
                                                   $sit_vacation = 5;
                                                }else if ($i ==9){
                                                   $sit_vacation = 6;
                                                }else if ($i ==10){
                                                   $sit_vacation = 6.5;
                                                }else if ($i ==11){
                                                   $sit_vacation = 7;
                                                }else if ($i ==12){
                                                  $sit_vacation = 8;
                                                }else if($i ==0){

                                                       $sit_vacation = 0;
                                                    }








                                          }else if ($love_you >=730) {
                                            $sit_vacation=8;


                                          }else{
                                            $sit_vacation =0;
                                          }


                                          $last_y_tar = (date("Y")-2).'-12-26';
                                          $last_y2_tar =(date("Y")-1).'-12-25';


                                          $sq ="SELECT Sum(sum.day_n),sum.ty_id,sum.date,`status`.user_id
                                                      FROM `status`
                                                      INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                      WHERE date >= '".$last_y_tar."' AND  date <= '".$last_y2_tar."'
                                                      AND ty_id ='5' AND user_id ='".$row['user_id']."'";
                                               $result =mysqli_query($conn,$sq);
                                               $ro =mysqli_fetch_array($result);







                                          $johnatar = $sit_vacation-$ro['0'];
                                          if ($johnatar >= 4 ) {
                                            $johnatar = 4;
                                          }else {
                                            $johnatar = $sit_vacation-$ro['0'];
                                          }

                                        ///////////////////////////////////////////////////




                                        if ($row['resign'] ==2) { //ถ้าลาออกขีดสีแดง
                                                $data ='style="text-decoration:line-through; color:red;";';
                                        }else{
                                                $data ='';

                                        }

                                        $start_date = date_create($row['start']);
                                        $current_date = date_create();
                                        $diff = date_diff($start_date,$current_date);
                                           $do_work = $diff->format("%a");
                                           $last_y = (date("Y", strtotime($row['start']))-1).'-12-26';
                                           $last_y2  =  date('Y', strtotime($row['start'])).'-12-25'; //วันที่สุดท้ายของปีที่ทำงาน



                                           if ($do_work >= 365 AND $do_work< 730) { //ถ้าครบปี



                                           // สิ้นปี +1
                                           $start_work = strtotime($row['start']);
                                           $end_of_year_work = strtotime($last_y2);


                                           $datediff = $end_of_year_work - $start_work;
                                           $do_work_last_year = floor($datediff / (60 * 60 * 24));// วันเริ่มทำงาน - วันสิ้นสุดปี

                                           if ($do_work_last_year <30 AND $do_work_last_year >=16) { //ถ้าวันน้อยกว่า 30 และมากกว่า 16
                                                $i =1;

                                                 }else if ($do_work_last_year >=30) {

                                                      for   ($i=0; 30 <=$do_work_last_year; $i++) {
                                                             $day =  $do_work_last_year -= 30;
                                                      }

                                                       if ($day >=16) { /*หลังจากลบ 30 เดือนแล้วเหลือเศษ*/
                                                         $i++;
                                                             }
                                                  }else{

                                                $i =0; /*I จำนวนเดือน*/
                                            }

                                            //คำนวณเดือน ถ้าจำนวนวันมากกว่า 16 ปรับเป็น 1 เดือน
                                              if ($i ==1) {
                                                $have_vacation =0.5;
                                              }else if ($i ==2) {
                                                $have_vacation =1;
                                              }else if ($i ==3) {
                                                $have_vacation =2;
                                              }else if ($i ==4) {
                                                $have_vacation = 2.5;                                                # code...
                                              }else if ($i ==5){
                                                $have_vacation = 3;
                                              }else if ($i ==6){
                                                $have_vacation = 4;
                                              }else if ($i ==7){
                                                $have_vacation = 4.5;
                                              }else if ($i ==8){
                                                $have_vacation = 5;
                                              }else if ($i ==9){
                                                $have_vacation = 6;
                                              }else if ($i ==10){
                                                $have_vacation = 6.5;
                                              }else if ($i ==11){
                                                $have_vacation = 7;
                                              }else if ($i ==12){
                                                $have_vacation = 8;
                                              }else if($i ==0){
                                                  if ($do_work >374) {
                                                     $have_vacation = 8;
                                                  }else{
                                                     $have_vacation = 0;
                                                  }



                                              }else {
                                                $have_vacation =0;
                                              }

                                          }  else if ($do_work >=1825) { /*ถ้ามากกว่าหรือเท่ากับ 5 ปี*/


                                                    if ($do_work >=2190) {
                                                      $have_vacation =10;
                                                    }else{


















                                            $start_work = strtotime($row['start']);
                                            $end_of_year_work = strtotime($last_y2);


                                            $datediff = $end_of_year_work - $start_work;
                                            $do_work_last_year = floor($datediff / (60 * 60 * 24));// วันเริ่มทำงาน - วันสิ้นสุดปี

                                            if ($do_work_last_year <30 AND $do_work_last_year >=16) { //ถ้าวันน้อยกว่า 30 และมากกว่า 16
                                                 $i =1;

                                                  }else if ($do_work_last_year >=30) {

                                                       for   ($i=0; 30 <=$do_work_last_year; $i++) {
                                                              $day =  $do_work_last_year -= 30;
                                                       }

                                                        if ($day >=16) { /*หลังจากลบ 30 เดือนแล้วเหลือเศษ*/
                                                          $i++;
                                                              }
                                                   }else{

                                                 $i =0; /*I จำนวนเดือน*/
                                             }

                                             //คำนวณเดือน ถ้าจำนวนวันมากกว่า 16 ปรับเป็น 1 เดือน
                                               if ($i ==1) {
                                                 $have_vacation =0.5;
                                               }else if ($i ==2) {
                                                 $have_vacation =1;
                                               }else if ($i ==3) {
                                                 $have_vacation =2;
                                               }else if ($i ==4) {
                                                 $have_vacation = 2.5;                                                # code...
                                               }else if ($i ==5){
                                                 $have_vacation = 3;
                                               }else if ($i ==6){
                                                 $have_vacation = 4;
                                               }else if ($i ==7){
                                                 $have_vacation = 4.5;
                                               }else if ($i ==8){
                                                 $have_vacation = 5;
                                               }else if ($i ==9){
                                                 $have_vacation = 6;
                                               }else if ($i ==10){
                                                 $have_vacation = 6.5;
                                               }else if ($i ==11){
                                                 $have_vacation = 7;
                                               }else if ($i ==12){
                                                 $have_vacation = 8;
                                               }else if($i ==0){
                                                   if ($do_work >374) {
                                                      $have_vacation = 8;
                                                   }else{
                                                      $have_vacation = 0;
                                                   }



                                               }else {
                                                 $have_vacation =0;
                                               }

                                               $month = (10/12)*(date("m",strtotime($row['start'])) -1);

                                               $x= $have_vacation+$month;

                                                 $have_vacation = floor($x * 2) / 2;

                                               }

                                          }else if ($do_work >=730) { /*ถ้ามากกว่าหรือเท่ากับ 2 ปี*/


                                             $have_vacation =8;



                                            }else {
                                                $have_vacation =0;
                                            }



                                            $sqli ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='7'";
                                            $result =mysqli_query($conn,$sqli);
                                            $low=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                  if ($low['COUNT(sum.day_n)'] ==0) {
                                                    $late ='';
                                                  }else{
                                                    $late = $low['COUNT(sum.day_n)'];
                                                  }
                                           /*##############################	ขาด ########################## */
                                            $sqlii ="SELECT Sum(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='1'";
                                            $resultt =mysqli_query($conn,$sqlii);
                                            $loww=mysqli_fetch_array($resultt,MYSQLI_ASSOC);
                                          /*##############################	ลาป่วย ########################## */
                                            $sq ="SELECT Sum(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='2'";
                                            $re =mysqli_query($conn,$sq);
                                            $lo=mysqli_fetch_array($re,MYSQLI_ASSOC);
                                          /*##############################	ลากิจ ########################## */
                                          $s ="SELECT Sum(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='3'";
                                            $ree =mysqli_query($conn,$s);
                                            $loo=mysqli_fetch_array($ree,MYSQLI_ASSOC);

                                          /*##############################	ลากิจ พิเศษ ########################## */

                                            $ss ="SELECT Sum(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='6'";
                                            $rees =mysqli_query($conn,$ss);
                                            $loos=mysqli_fetch_array($rees,MYSQLI_ASSOC);

                                            $sss ="SELECT Sum(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='4'";
                                            $reess =mysqli_query($conn,$sss);
                                            $looss=mysqli_fetch_array($reess,MYSQLI_ASSOC);






                                  ?>
                                    <tr <?php echo $data; ?> >
                                        <td><?php echo $k; ?> </td>
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['dep_name']; ?></td>
                                        <td><?php echo date('d/m/Y',strtotime($row['start'])); ?> </td> <!-- วันเริ่มงาน -->
                                        <td><?php echo time_elapsed_string($row['start'], true); ?></td> <!-- จำนวนวันทำงาน -->
                                        <td><?php echo $have_vacation + $johnatar  ; ?></td>

                                        <td><?php echo $vacation_cout_this_year; ?></td>
                                        <td><?php echo ($have_vacation + $johnatar)-$vacation_cout_this_year; ?></td>
                                        <td><?php echo $late; ?></td>
                                        <td><?php echo $loww['Sum(sum.day_n)']; ?></td>
                                        <td><?php echo $lo['Sum(sum.day_n)']; ?></td>
                                        <td><?php echo $loo['Sum(sum.day_n)']; ?></td>
                                        <td><?php echo $loos['Sum(sum.day_n)']; ?></td>
                                        <td><?php echo $looss['Sum(sum.day_n)']; ?></td>












                                    </tr>
                                     <?php $k++; }   mysqli_close($conn);?>
                                </tbody>
                            </table>


</body>

</html>
