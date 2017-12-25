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
                                        <th rowspan="3" style="text-align:center">ลำดับ</th>
                                        <th rowspan="3" style="text-align:center">ชื่อ - นามสกุล</th>
                                        <th rowspan="3" style="text-align:center">แผนก</th>
                                        <th rowspan="3" style="text-align:center">วันเริ่มงาน</th>
                                        <th rowspan="3" style="text-align:center">จำนวนวันทำงาน</th>
                                        <th colspan="5"  rowspan="2" style="text-align:center">พักร้อน (วัน)</th>
                                        <th colspan="13" style="text-align:center">วันที่ : <?php echo date('d/m/Y',strtotime($_POST['rank_of_date'])).'-'.date('d/m/Y',strtotime($_POST['rank_of_date2'])); ?></th>




                                    </tr>
                                    <tr>
                                        <th colspan="3">ลืมสแกน</th>
                                        <th colspan="2">สาย/กลับก่อน</th>
                                        <th colspan="8">การลา</th>

                                    </tr>
                                    <tr>
                                        <th>สะสมจากปีที่แล้ว</th>
                                        <th>สิทธิ์ปีนี้</th>
                                        <th>รวมสิทธิ์พักร้อน</th>
                                        <th>ใช้</th>
                                        <th>เหลือ</th>
                                        <th >เข้า</th>
                                        <th>ออก</th>
                                        <th>รวม</th>
                                        <th>สาย</th>
                                        <th>กลับก่อน</th>
                                        <th>ขาดงาน</th>
                                        <th>ลาป่วย<br><sub>ไม่มีใบรับรองแพทย์</sub></th>
                                        <th>ลาป่วย<br><sub>มีใบรับรองแพทย์</sub></th>
                                        <th>ลาป่วย<br><sub>จากการทำงาน</sub></th>
                                        <th>ลากิจ<br><sub>ไม่ได้ค่าจ้าง</sub></th>
                                        <th>ลากิจ<br><sub>ได้ค่าจ้าง</sub></th>
                                        <th>ลากิจพิเศษ<br><sub>ได้ค่าจ้าง</sub></th>
                                        <th>ลาอื่นๆ</th>










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
                                                   WHERE user_id ='".$row['user_id']."' AND ty_id ='12'
                                                   AND date >= '".$current_y."' AND  date <= '".$current_y2."'";


                                            $result =mysqli_query($conn,$sqli);
                                            $rows   =mysqli_fetch_array($result);
                                            if ($rows['0'] !=0 ) {
                                                $vacation_cout_this_year= $rows['0'];
                                            }else{
                                                $vacation_cout_this_year= 0;
                                            }

                                        // นับวันที่พักร้อนปีที่แล้ว* ////////////////////////////////////////

                                        $amp ='SELECT va_num FROM vacation_last_year WHERE user_id="'.$row['user_id'].'"';
                                        $tar =mysqli_query($conn,$amp);
                                        $amptar =mysqli_fetch_array($tar);
                                        $amptar =$amptar['va_num'];

                                        if (!empty($amptar)) {
                                          $vacation_last_year = $amptar;
                                        }else{
                                          $vacation_last_year =0;
                                        }



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
                                             $date = $row['start'];
                                            $date = strtotime($date);
                                            $date = strtotime("+365 day", $date);
                                             $mama =date('Y', $date).'-12-26';
                                            if (date("Y-m-d") >=$mama) {
                                            $have_vacation =8;
                                          }else{

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

                                                       if ($day >=15) { /*หลังจากลบ 30 เดือนแล้วเหลือเศษ*/
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

                                            }

                                          }  else if ($do_work >=1825) { /*ถ้ามากกว่าหรือเท่ากับ 5 ปี*/


                                                    if ($do_work >=2190) {
                                                      $have_vacation =10;
                                                    }else{




                                            $start_work = strtotime($row['start']);// คิด 5 ปี
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



                                            // นับลืมแสกนเข้า
                                            $sqli ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='2' AND day_n ='1'";
                                            $result =mysqli_query($conn,$sqli);
                                            $low=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                  if ($low['COUNT(sum.day_n)'] ==0) {
                                                    $in ='';
                                                  }else{
                                                    $in = $low['COUNT(sum.day_n)'];
                                                  }
                                              // นับลืมแสกนออก
                                              $sqlik ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                    FROM   `status`
                                                  INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                  WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='2' AND day_n ='2'";
                                              $resultk =mysqli_query($conn,$sqlik);
                                              $lowk=mysqli_fetch_array($resultk,MYSQLI_ASSOC);
                                                    if ($lowk['COUNT(sum.day_n)'] ==0) {
                                                      $out ='';
                                                    }else{
                                                      $out = $lowk['COUNT(sum.day_n)'];
                                                    }
                                          // สาย

                                          $sqliy ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                              FROM   `status`
                                            INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                            WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='1'";
                                        $resulty =mysqli_query($conn,$sqliy);
                                        $lowy=mysqli_fetch_array($resulty,MYSQLI_ASSOC);
                                              if ($lowy['COUNT(sum.day_n)'] ==0) {
                                                $late ='';
                                              }else{
                                                $late = $lowy['COUNT(sum.day_n)'];
                                              }
                                            //กลับก่อน
                                            $sq ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                                                  FROM   `status`
                                                INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='3'";
                                            $re =mysqli_query($conn,$sq);
                                            $lo=mysqli_fetch_array($re,MYSQLI_ASSOC);
                                            if ($lo['COUNT(sum.day_n)'] ==0 )  {
                                               $exit ='';
                                            }else{
                                               $exit = $lo['COUNT(sum.day_n)'];
                                            }
                                            $s ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              									    FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='4'";
                              								$ree =mysqli_query($conn,$s);
                              								$loo=mysqli_fetch_array($ree,MYSQLI_ASSOC);
                              								if ($loo['COUNT(sum.day_n)'] ==0 )  {
                              									 $kad ='';
                              								}else{
                              									 $kad = $loo['COUNT(sum.day_n)'];
                              								}

                              							/*##############################ลาป่วย ไม่มี ########################## */

                              								$ss ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              									    FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='5'";
                              								$rees =mysqli_query($conn,$ss);
                              								$loos=mysqli_fetch_array($rees,MYSQLI_ASSOC);
                              								if ($loos['COUNT(sum.day_n)'] ==0 )  {
                              									 $sick_not ='';
                              								}else{
                              									 $sick_not = $loos['COUNT(sum.day_n)'];
                              								}
                              								/*##############################ลาป่วย ่มี ########################## */
                              								$sss ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              									    FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='6'";
                              								$reesss =mysqli_query($conn,$sss);
                              								$looss=mysqli_fetch_array($reesss,MYSQLI_ASSOC);
                              								if ($looss['COUNT(sum.day_n)'] ==0 )  {
                              									 $sick ='';
                              								}else{
                              									 $sick = $looss['COUNT(sum.day_n)'];
                              								}
                              								/*##############################ลาป่วย ่จากการทำงาน ########################## */
                              								$ssss ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              									    FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='7'";
                              								$reessss =mysqli_query($conn,$ssss);
                              								$loosss=mysqli_fetch_array($reessss,MYSQLI_ASSOC);
                              								if ($loosss['COUNT(sum.day_n)'] ==0 )  {
                              									 $sick_form_work ='';
                              								}else{
                              									 $sick_form_work = $loosss['COUNT(sum.day_n)'];
                              								}
                              								/*##############################ลากิจ ได้ค่าจ้าง######################## */
                              								$ssssss ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              									    FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='8'";
                              								$reesssss =mysqli_query($conn,$ssssss);
                              								$loossss=mysqli_fetch_array($reesssss,MYSQLI_ASSOC);
                              								if ($loossss['COUNT(sum.day_n)'] ==0 )  {
                              									 $kit ='';
                              								}else{
                              									 $kit = $loossss['COUNT(sum.day_n)'];
                              								}
                              								/*##############################ลากิจ ไม่ได้ค่าจ้าง######################## */
                              								$sssssss ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              									    FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='9'";
                              								$reessssss =mysqli_query($conn,$sssssss);
                              								$loosssss=mysqli_fetch_array($reessssss,MYSQLI_ASSOC);
                              								if ($loosssss['COUNT(sum.day_n)'] ==0 )  {
                              									 $kit_not ='';
                              								}else{
                              									 $kit_not = $loosssss['COUNT(sum.day_n)'];
                              								}
                              								/*############################## ลากิจพิเศษ######################## */
                              								$ssssssss ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              											FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='10'";
                              								$reesssssss =mysqli_query($conn,$ssssssss);
                              								$loossssss=mysqli_fetch_array($reesssssss,MYSQLI_ASSOC);
                              								if ($loossssss['COUNT(sum.day_n)'] ==0 )  {
                              									 $kit_ex ='';
                              								}else{
                              									 $kit_ex = $loossssss['COUNT(sum.day_n)'];
                              								}
                              									/*############################## อื่นๆ ######################## */
                              								$sssssssss ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
                              											FROM   `status`
                              										INNER JOIN sum ON `status`.sum_id = sum.sum_id
                              										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='11'";
                              								$reessssssss =mysqli_query($conn,$sssssssss);
                              								$loosssssss=mysqli_fetch_array($reessssssss,MYSQLI_ASSOC);
                              								if ($loosssssss['COUNT(sum.day_n)'] ==0 )  {
                              									 $ext ='';
                              								}else{
                              									 $ext = $loosssssss['COUNT(sum.day_n)'];
                              								}


                                  ?>
                                    <tr <?php echo $data; ?> >
                                        <td><?php echo $k; ?> </td>
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['dep_name']; ?></td>
                                        <td><?php echo date('d/m/Y',strtotime($row['start'])); ?> </td> <!-- วันเริ่มงาน -->
                                        <td><?php echo time_elapsed_string($row['start'], true); ?></td> <!-- จำนวนวันทำงาน -->
                                        <td style="text-align:center;"><?php echo $vacation_last_year;?></td>
                                        <td style="text-align:center;"><?php echo $have_vacation; ?></td>
                                        <td style="text-align:center;"><?php echo $have_vacation+$vacation_last_year; ?></td>
                                        <td style="text-align:center;"><?php echo $vacation_cout_this_year; ?></td>
                                        <td style="text-align:center;"><?php echo ($have_vacation+$vacation_last_year)-$vacation_cout_this_year; ?></td>
                                        <td style="text-align:center;"><?php echo $in; ?></td>
                                        <td style="text-align:center;"><?php echo $out; ?></td>
                                        <td style="text-align:center;"><?php echo $out+$in; ?></td>
                                        <td style="text-align:center;"><?php echo $late; ?></td>
                                        <td style="text-align:center;"><?php echo $exit; ?></td>
                                        <td align="center"><?php echo $kad; ?></td>
                                  			<td align="center"><?php echo $sick_not; ?></td>
                                  			<td align="center"><?php echo $sick; ?></td>
      																	<td align="center"><?php echo $sick_form_work; ?></td>
      																	<td align="center"><?php echo $kit; ?></td>
      																	<td align="center"><?php echo $kit_not; ?></td>
      																	<td align="center"><?php echo $kit_ex; ?></td>
      																	<td align="center"><?php echo $ext; ?></td>












                                    </tr>
                                     <?php $k++; }   mysqli_close($conn);?>
                                </tbody>
                            </table>


</body>

</html>
