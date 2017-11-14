<?php
include 'connect_pdo.php';
include 'connect.php';
$process = new Outsource();
  if (isset($_POST['show_dep'])) {
        $get_dep_in_companny = $process->get_dep_in_companny($_POST['show_dep']);

          if (!empty($get_dep_in_companny)) {

    echo ' <div class="form-group">
              <label class="col-md-4 control-label" for="selectbasic">แผนก</label>
              <div class="col-md-6">
          <select  name="depeartment" class="form-control input-md" required="">';

          foreach($get_dep_in_companny as $companny){
            echo   '<option value='.$companny['dep_co_id'].'>'.$companny['dep_co_name'].'  </option>';
          }

          echo '

          </select>

              </div>
          </div>';

         }
   }

if (isset($_POST['add_outsrouce'])) {
     $process->add_outsrouce($_POST);
}






  if (isset($_POST['co_id'])) {



  $get_user =  $process->get_user_in_companny($_POST['co_id'][0]);
  if (!(empty($_POST['co_id'][1]))) {
    $first_day_of_month =$_POST['co_id'][1];
  }else{
    $first_day_of_month ='0';
  }


    echo '<table width="100%" class="table table-striped Striped Rows table-hover" id="dataTables-example" cellspacing="0" >
        <thead>
            <tr>

                <th  rowspan="2">ชื่อ - นามสกุล</th>
                <th  rowspan="2">แผนก</th>
                <th  rowspan="2">เบอร์โทร</th>
                <th  rowspan="2">วันที่เริ่มงาน</th>
                <th  rowspan="2">จำนวนวันทำงาน</th>
                <th colspan="3" style="text-align:center">พักร้อน</th>
                <th colspan="4" style="text-align:center">    <div class="form-group">
                          <label class="col-md-4 control-label" for="fn">เดือน</label>
                          <div class="col-md-8">
                               <select class="form-control" id="month_on_outsrouce">
                                                <option value="2017-01-01">มกราคม</option>
                                                <option value="2017-02-01">กุมภาพันธ์</option>
                                                <option value="2017-03-01">มีนาคม</option>
                                                <option value="2017-04-01">เมษายน</option>
                                                <option value="2017-05-01">พฤษภาคม</option>
                                                <option value="2017-06-01">มิถุนายน</option>
                                                <option value="2017-07-01">กรกฎาคม</option>
                                                <option value="2017-08-01">สิงหาคม </option>
                                                <option value="2017-09-01">กันยายน</option>
                                                <option value="2017-10-01">ตุลาคม</option>
                                                <option value="2017-11-01">พฤศจิกายน</option>
                                                <option value="2017-12-01">ธันวาคม</option>
                              </select>

                          </div>
                      </div>
              </th>


            </tr>
            <tr>
                <th>สิทธิ์</th>
                <th>ใช้</th>
                <th>เหลือ</th>

                <th>กิจ</th>
                <th>ป่วย</th>
                <th>ลาผิดระเบียบ</th>
                <th>สาย</th>
                <th>ขาด</th>
                <th> เมนู</th>


            </tr>





        </thead>
        <tbody>';
    function time_elapsed_string($datetime, $full = false)
{
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'Y',
            'm' => 'M',

        );

        foreach ($string as $k => &$v) {
        if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(':', $string) . ' ' : '';
  }





         $i = 1;
        if (!empty($get_user)) {
            foreach($get_user as $get_users){
              if (!empty($get_users['first_y'])) {
                 $first_year=(date("Y")-1).'-'.$get_users['first_y'];
                 $last_year=date("Y").'-'.$get_users['last_y'];
              }else{
               $first_year =  date("Y").'-01-01';
               $last_year =   date("Y").'-12-31';
              }


              // คำนวณวันทำงาน พักร้อน
              $start_date = date_create($get_users['start']);
              $current_date = date_create();
              $diff = date_diff($start_date,$current_date);
                 $do_work = $diff->format("%a");

                  if ($do_work >=365 AND $do_work <730) { // ถ้ามากกว่า หรือ เท่ากับ 1 ปี

                        if ($do_work>=366) {
                          $last_year =(date("Y")-1).'-12-31';

                        }

                        $the_last_of_the_year = strtotime($last_year);

                        $start_work = strtotime($get_users['start']);
                        $datediff = $the_last_of_the_year - $start_work;
                        $do_work_last_year = floor($datediff / (60 * 60 * 24));
                        $vacation =floor($do_work_last_year/60);//ปัดเศษ
                    }else if ($do_work>=730){
                        $vacation =6;


                    }else{
                        $vacation =0;
                    }


                    // หาวันที่ พักร้อนไปแล้ว
                   $oc_id     = $get_users['oc_id'];

                     $last_year =(date("Y")+1).'-12-31';

                $vacation_use =$process->coutn_vacation($oc_id,$first_year,$last_year);


              //สิทธิ์

              $cooldown = $vacation-$vacation_use['coutn_vacation'];




              $user_id =$get_users['oc_id'];
               //วันที่ 1

              $last_day_of_month = date('Y-m-t',strtotime($first_day_of_month)); //วันสุดท้าย
              $data = $process->coutn_sick($user_id,$first_day_of_month,$last_day_of_month); //นับป่วย
              $data2 = $process->coutn_kit($user_id,$first_day_of_month,$last_day_of_month); // กิจ
              $data3 = $process->coutn_wrong($user_id,$first_day_of_month,$last_day_of_month); //ผิดระเบียบ
              $data4 = $process->coutn_late($user_id,$first_day_of_month,$last_day_of_month); //ส่าย
              $data5 = $process->coutn_absence($user_id,$first_day_of_month,$last_day_of_month);
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
                    <td>'.date('d/m/Y',strtotime($get_users['start'])).'</td>
                    <td>'.time_elapsed_string($get_users['start'], true).'</td>
                    <td>'. $vacation.'</td>
                    <td>'.$vacation_use['coutn_vacation'].'</td>
                    <td>'.$cooldown.'</td>

</td>


                    <td>'.$data2['count_kit'].'</td>
                    <td>'.$data['count_sick'].'</td>
                    <td>'.$data3['count_wrong'].'</td>
                    <td>'.$data4['count_late'].'</td>
                    <td>'.$data5['coutn_absence'].'</td>
                    <td><div style="width: 65px"><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_vacation" onclick="return show_from_add_vacation_oc('.$get_users['oc_id'].');"><i class="fa fa-plus" aria-hidden="true"></i></button> :
                    <button  class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" onclick="return show_more_detail_outsrouce('.$get_users['oc_id'].')"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
</td>




                  </tr>


            ';
            $i++;



            }
        }


        echo '


        </tbody>
    </table>
    <!-- /.table-responsive -->';
  }

// โชว์ชื่อและ id ใน
if (isset($_POST['oc_id'])) {

     $show_data_to_add_vacation=$process->get_oc($_POST['oc_id']);

     echo ' <div class="form-group">
                       <label class="col-md-4 control-label" for="fn">ชิ่อ-นามสกุล</label>
                       <div class="col-md-6">



                      <p class="form-control-static">'.$show_data_to_add_vacation['name'].'</p>
                      <input type="hidden" name="oc_id_late" value="'.$show_data_to_add_vacation['id'].'" >
             </div>
       </div>';

}

// สาย
if (isset($_POST['late'])) {



        $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
               VALUES ('1','".$_POST['late']."', '".$_POST['date_of_late']."', '119', '".$_POST['comment_late']."')";
        $row=mysqli_query($conn,$sql);
        $insert_id = mysqli_insert_id($conn);
        $sqli ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
        $res  =mysqli_query($conn,$sqli);
            if ($_POST['date_of_late2'] >= 1) {
                	for ($i=1; $i <= $_POST['date_of_late2']; $i++) {
                    $data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date_of_late'])));

                    $tar ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
                           VALUES ('1', '".$_POST['late']."', '".$data."', '119', '".$_POST['comment_late']."')";
                    $maty=mysqli_query($conn,$tar);
                    $insert_id = mysqli_insert_id($conn);
                    $sqlil ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
                    $rows=mysqli_query($conn,$sqlil);


                  }
                  echo '1';
                  exit();

              }else if ($res) {
                echo '1';
                exit();
              }else {
                echo '2';
                exit();
              }


}


// ขาด
if (isset($_POST['absence'])) {
  $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
         VALUES ('".$_POST['number_of_absence']."','".$_POST['absence']."', '".$_POST['date_of_absence']."', '119', '".$_POST['comment_absence']."')";
  $row=mysqli_query($conn,$sql);
  $insert_id = mysqli_insert_id($conn);
  $sqli ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
  $res  =mysqli_query($conn,$sqli);
  if ($res) {
          echo '1';
          exit();
  }else{
          echo '2';
          exit();
  }


}


// ป่วย
if (isset($_POST['sick'])) {



        $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
               VALUES ('".$_POST['number_of_sick']."','".$_POST['sick']."', '".$_POST['date_of_sick']."', '119', '".$_POST['comment_sick']."')";
        $row=mysqli_query($conn,$sql);
        $insert_id = mysqli_insert_id($conn);
        $sqli ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
        $res  =mysqli_query($conn,$sqli);
            if ($_POST['date_of_sick2'] >= 1) {
                	for ($i=1; $i <= $_POST['date_of_sick2']; $i++) {
                    $data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date_of_sick'])));

                    $tar ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
                           VALUES ('1', '".$_POST['sick']."', '".$data."', '119', '".$_POST['comment_sick']."')";
                    $maty=mysqli_query($conn,$tar);
                    $insert_id = mysqli_insert_id($conn);
                    $sqlil ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
                    $rows=mysqli_query($conn,$sqlil);


                  }
                  echo '1';
                  exit();

              }else if ($res) {
                echo '1';
                exit();
              }else {
                echo '2';
                exit();
              }


}

// กิจ


if (isset($_POST['errand'])) {



        $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
               VALUES ('".$_POST['number_of_errand']."','".$_POST['errand']."', '".$_POST['date_of_errand']."', '119', '".$_POST['comment_errend']."')";
        $row=mysqli_query($conn,$sql);
        $insert_id = mysqli_insert_id($conn);
        $sqli ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
        $res  =mysqli_query($conn,$sqli);
            if ($_POST['date_of_errand2'] >= 1) {
                	for ($i=1; $i <= $_POST['date_of_errand2']; $i++) {
                    $data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date_of_errand'])));

                    $tar ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
                           VALUES ('1', '".$_POST['errand']."', '".$data."', '119', '".$_POST['comment_errend']."')";
                    $maty=mysqli_query($conn,$tar);
                    $insert_id = mysqli_insert_id($conn);
                    $sqlil ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
                    $rows=mysqli_query($conn,$sqlil);


                  }
                  echo '1';
                  exit();

              }else if ($res) {
                echo '1';
                exit();
              }else {
                echo '2';
                exit();
              }


}

if (isset($_POST['wrong'])) {



        $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
               VALUES ('".$_POST['number_of_wrong']."','".$_POST['wrong']."', '".$_POST['date_of_wrong']."', '119', '".$_POST['comment_wrong']."')";
        $row=mysqli_query($conn,$sql);
        $insert_id = mysqli_insert_id($conn);
        $sqli ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
        $res  =mysqli_query($conn,$sqli);
            if ($_POST['date_of_wrong2'] >= 1) {
                	for ($i=1; $i <= $_POST['date_of_wrong2']; $i++) {
                    $data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date_of_wrong'])));

                    $tar ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
                           VALUES ('1', '".$_POST['wrong']."', '".$data."', '119', '".$_POST['comment_wrong']."')";
                    $maty=mysqli_query($conn,$tar);
                    $insert_id = mysqli_insert_id($conn);
                    $sqlil ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
                    $rows=mysqli_query($conn,$sqlil);


                  }
                  echo '1';
                  exit();

              }else if ($res) {
                echo '1';
                exit();
              }else {
                echo '2';
                exit();
              }


}

if (isset($_POST['vacation'])) {



        $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
               VALUES ('".$_POST['number_of_vacation']."','".$_POST['vacation']."', '".$_POST['date_of_vacation']."', '119', '".$_POST['comment_vacation']."')";
        $row=mysqli_query($conn,$sql);
        $insert_id = mysqli_insert_id($conn);
        $sqli ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
        $res  =mysqli_query($conn,$sqli);
            if ($_POST['date_of_vacation2'] >= 1) {
                	for ($i=1; $i <= $_POST['date_of_vacation2']; $i++) {
                    $data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date_of_vacation'])));

                    $tar ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
                           VALUES ('1', '".$_POST['vacation']."', '".$data."', '119', '".$_POST['comment_vacation']."')";
                    $maty=mysqli_query($conn,$tar);
                    $insert_id = mysqli_insert_id($conn);
                    $sqlil ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
                    $rows=mysqli_query($conn,$sqlil);


                  }
                  echo '1';
                  exit();

              }else if ($res) {
                echo '1';
                exit();
              }else {
                echo '2';
                exit();
              }


}


 ?>
