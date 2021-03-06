
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
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-info" data-toggle="modal" data-target="#add_user"><i class="fa fa-user-plus " aria-hidden="true"></i></button> :
                         <button class="btn btn-warning" data-toggle="modal" data-target="#add_user"><i class="fa fa-upload" aria-hidden="true"></i></button>




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
                                        <th rowspan="2" style="text-align:center">ชื่อ - นามสกุล</th>
                                        <th rowspan="2" style="text-align:center">แผนก</th>
                                        <th rowspan="2" style="text-align:center">วันเริ่มงาน</th>
                                        <th rowspan="2" style="text-align:center">จำนวนวันทำงาน</th>
                                        <th colspan="3" style="text-align:center">พักร้อน</th>

                                        <th rowspan="2">เมนู</th>


                                    </tr>
                                    <tr>
                                        <th>สิทธิ์</th>
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
                                        'd' => 'day',
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
                                    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {

                                     /* นับวันที่พักร้อน*/
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




                                        if ($row['resign'] ==2) { //ถ้าลาออกขีดสีแดง
                                                $data ='style="text-decoration:line-through; color:red;";';
                                        }else{
                                                $data ='';

                                        }

                                        $start_date = date_create($row['start']);
                                        $current_date = date_create();
                                        $diff = date_diff($start_date,$current_date);
                                           $do_work = $diff->format("%a");



                                           if ($do_work >= 365 AND $do_work< 730) { //ถ้าครบปี

                                            $last_y = (date("Y")-1).'-12-26';
                                            $last_y2 = date("Y").'-12-25';
                                                $sq ="SELECT Sum(sum.day_n),sum.ty_id,sum.date,`status`.user_id
                                                       FROM `status`
                                                       INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                       WHERE date >= '".$last_y."' AND  date <= '".$last_y2."'
                                                       AND ty_id ='5' AND user_id ='".$row['user_id']."'";
                                                $result =mysqli_query($conn,$sq);
                                                $ro =mysqli_fetch_array($result);
                                                $data =   $ro['0'];




                                          $d1 = new DateTime((date('Y')-1).'-12-26');
                                          $d2 = new DateTime($row['start']);

                                          $diff = $d2->diff($d1);


                                          if ($diff->y ==0) {
                                            $last_year = strtotime((date('Y')-1).'-12-26');
                                          } else {
                                             $last_year = strtotime((date('Y')-2).'-12-26');
                                          }

                                           // สิ้นปี +1
                                           $start_work = strtotime($row['start']);

                                           $datediff = $last_year - $start_work;
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

                                                $have_vacation =100;


                                           } else if ($do_work >=730) { /*ถ้ามากกว่าหรือเท่ากับ 2 ปี*/


                                              $last_y = (date("Y")-2).'-12-26';
                                              $last_y2 = (date("Y")-1).'-12-25';
                                                $sq ="SELECT Sum(sum.day_n),sum.ty_id,sum.date,`status`.user_id
                                                       FROM `status`
                                                       INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                       WHERE date >= '".$last_y."' AND  date <= '".$last_y2."'
                                                       AND ty_id ='5' AND user_id ='".$row['user_id']."'";
                                                $result =mysqli_query($conn,$sq);
                                                $ro =mysqli_fetch_array($result);
                                                $data =   8-$ro['Sum(sum.day_n)'];

                                                if ((8 - $ro['Sum(sum.day_n)']) >=4 ) {
                                                  $vacation_cout_last_year = 4;
                                                }else{8 - $ro['Sum(sum.day_n)'];
                                                $vacation_cout_last_year = 8 - $ro['Sum(sum.day_n)'];
                                                }



                                                $have_vacation = 8 + $vacation_cout_last_year;




                                            }else {
                                                $have_vacation =0;
                                            }





                                  ?>
                                    <tr <?php echo $data; ?> >
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['dep_name']; ?></td>
                                        <td><?php echo date('d/m/Y',strtotime($row['start'])); ?> </td> <!-- วันเริ่มงาน -->
                                        <td><?php echo time_elapsed_string($row['start'], true); ?></td> <!-- จำนวนวันทำงาน -->
                                        <td><?php echo $have_vacation   ; ?></td>
                                        <td><?php echo $vacation_cout_this_year; ?></td>
                                        <td> <?php echo $have_vacation-$vacation_cout_this_year; ?></td>


                                        <td>
                                            <?php
                                                   if ($row['resign']==2 OR $have_vacation-$vacation_cout_this_year ==0) {

                                                    }else{
                                                        echo '<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return add_vacation( '.$row['user_id'].');"><i class="fa fa-plus" aria-hidden="true"></i></button>';
                                                    }
                                      ?>

                                           <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#show_data" onclick="return get_show_vacation(<?php echo $row['user_id']; ?>);"><i class="fa fa-area-chart" aria-hidden="true"></i></button>
                                        </td>










                                    </tr>
                                     <?php }  mysqli_close($conn);?>
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


</body>

</html>
