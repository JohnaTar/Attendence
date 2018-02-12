
<!DOCTYPE html>
<html lang="en">

<head>
        <?php include('head.php'); ?>

</head>

<body>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include('nav.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">การลาพักร้อน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-info" data-toggle="modal" data-target="#add_user"><i class="fa fa-user-plus " aria-hidden="true"></i></button>



                    </div>
                </div>
                <br>


            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            ข้อมูลสมาชิก
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body ">
                            <table width="100%" class="table table-striped  table-hover table-responsive " >
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align:center">ลำดับ</th>
                                        <th rowspan="2" style="text-align:center">ชื่อ - นามสกุล</th>
                                        <th rowspan="2" style="text-align:center">แผนก</th>
                                        <th rowspan="2" style="text-align:center">วันเริ่มงาน (ว/ด/ป)</th>
                                        <th rowspan="2" style="text-align:center">อายุงาน</th>
                                        <th colspan="5" style="text-align:center">พักร้อน ( วัน )</th>

                                        <th rowspan="2">เมนู</th>


                                    </tr>
                                    <tr>
                                        <th>สะสม</th>
                                        <th>สิทธิ์ปีนี้</th>
                                        <th>รวมสิทธิ์</th>
                                        <th>ใช้</th>
                                        <th>เหลือ</th>





                                    </tr>
                                </thead>
                                <tbody>

                                <?php

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

                                        // แสดงสิทธิพักร้อนปีที่แล้ว* ////////////////////////////////////////
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





                                  ?>

                                    <tr  <?php echo $data; ?> >
                                        <td><?php echo $k; ?> </td>
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['dep_name']; ?></td>
                                        <td align="center"><?php echo date('d/m/Y',strtotime($row['start'])); ?> </td> <!-- วันเริ่มงาน -->
                                        <td><?php echo time_elapsed_string($row['start'], true); ?></td> <!-- จำนวนวันทำงาน -->
                                        <td><?php echo $vacation_last_year; ?>  : <a id="sent_id_to_add_vacation_last_year"  data-toggle="modal" data-target="#vacation_last_year" onclick="return show_name_on_add_vacation_last_years(<?php echo $row['user_id']; ?>)"   ><i class="far fa-edit"></i></td>

                                        <td><?php echo $have_vacation; ?></td>
                                        <td><?php echo $have_vacation+$vacation_last_year; ?></td>
                                        <td><?php echo $vacation_cout_this_year; ?></td>
                                        <td><?php echo ($have_vacation+$vacation_last_year)-$vacation_cout_this_year; ?></td>



                                        <td>
                                            <?php
                                                   if ($row['resign']==2 OR $have_vacation==0) {

                                                    }else{
                                                        echo '<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return add_vacation( '.$row['user_id'].');"><i class="fa fa-plus" aria-hidden="true"></i></button>';
                                                    }
                                      ?>

                                           <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#show_data" onclick="return get_show_vacation(<?php echo $row['user_id']; ?>);"><i class="fas fa-chart-pie"></i></button>
                                        </td>










                                    </tr>
                                     <?php $k++; }   mysqli_close($conn);?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
     <!-- Modal Add User -->


        <!-- Modal Edit User -->
        <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มวันพักร้อน</h4>
              </div>
              <div class="modal-body">
                         <div id="add_form"></div>
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

           <!-- Modal Add User -->
        <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูล</h4>
              </div>
              <div class="modal-body">
                   <form class="form-horizontal" id="add_user_form" onsubmit="return add_user_form();">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">ชื่อ นามสกุล</label>
                        <div class="col-md-6">
                    <input type="text" required="" class="form-control input-md"  value="" name="add_user">



                        </div>
                    </div>

                         <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic">แผนก</label>
                        <div class="col-md-6">
                    <select  name="dep" class="form-control input-md" required="">
                        <option value="">  </option>
                         <option value="1"> ฝ่ายบริหาร </option>
                         <option value="2"> ฝ่ายสารสนเทศ </option>
                         <option value="3"> PA & Marketing </option>
                         <option value="4"> ฝ่ายบัญชีและการเงิน </option>
                         <option value="5"> ฝ่ายบุคคลและธุรการ </option>
                         <option value="6"> Staff & Labor Outsourcing BKK </option>
                         <option value="7"> Staff & Labor Outsourcing CHON </option>
                         <option value="8"> Staff & Labor Outsourcing PTY </option>

                    </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">วันเริ่มงาน</label>
                        <div class="col-md-4">
                    <input name="start" type="date" placeholder="Firstname" class="form-control input-md" required="">

                        </div>
                    </div>



            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                </div>
            </div>





</form>


              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>



         <div class="modal fade" id="show_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">การใช้สิทธิพักร้อน</h4>
              </div>
              <div class="modal-body">

                <div id="vacation_from"></div>





              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>




<!-- /////////////เพิ่มวันร้อนปีที่แล้ว -->
<div class="modal fade" id="vacation_last_year" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">พักร้อนสะสมจากปีที่แล้ว</h4>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" id="vacation_last_year_form" onsubmit="return save_vacation_last_year_form();" >
           <input type="hidden" id="user_id"  name="user_id_add_vacation_last_year">

        <div class="form-group">
            <label class="col-md-4 control-label" for="fn">จำนวนวัน</label>
            <div class="col-md-4">
        <input name="number_of_day" type="text" placeholder="จำนวนวัน" class="form-control input-md" required="">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
        <button type="submit" name="submit" class="btn btn-primary" >Save</button>
            </div>
        </div>

      </form>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





</body>

</html>
