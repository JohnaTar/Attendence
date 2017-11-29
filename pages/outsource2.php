
<?php

$strExcelFileName="Member-All.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");



?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                            echo '<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse"  >
                                <thead>
                                    <tr>

                                        <th  rowspan="2">ชื่อ - นามสกุล</th>
                                        <th  rowspan="2">แผนก</th>
                                        <th  rowspan="2">เบอร์โทร</th>
                                        <th  rowspan="2">วันที่เริ่มงาน</th>
                                        <th  rowspan="2">จำนวนวันทำงาน</th>
                                        <th colspan="3" style="text-align:center">พักร้อน</th>
                                        <th colspan="5" style="text-align:center">การลา '.date('d/m/Y',strtotime($_POST['rank_of_date'])).'-'.date('d/m/Y',strtotime($_POST['rank_of_date2'])).'</th>


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


                                    </tr>





                                </thead>
                                <tbody>';


                            if (isset($_POST['companny_id'])) {
                              # code...

                              $get_user =  $process->get_user_in_companny($_POST['companny_id']);

                              $first_day_of_month =$_POST['rank_of_date'];
                              $last_day_of_month = $_POST['rank_of_date2'];

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
                                         $last_year2 =date("Y").'-'.$get_users['last_y'];

                                         $last_year =  date('Y', strtotime($get_users['start'])).'-'.$get_users['last_y'];

                                      }else{

                                       $first_year =  date("Y").'-01-01';
                                       $last_year  =  date('Y', strtotime($get_users['start'])).'-12-31';
                                       $last_year2 =  date("Y").'-12-31';
                                      }




                                      // คำนวณวันทำงาน
                                      $start_date = date_create($get_users['start']);
                                      $current_date = date_create();
                                      $diff = date_diff($start_date,$current_date);
                                      $do_work = $diff->format("%a");



                                          if ($do_work >=365 AND $do_work <730) { // ถ้ามากกว่า หรือ เท่ากับ 1 ปี



                                                $the_last_of_the_year = strtotime($last_year);
                                                $start_work = strtotime($get_users['start']);


                                                $datediff = $the_last_of_the_year - $start_work;
                                                $do_work_last_year = floor($datediff / (60 * 60 * 24));
                                                $x =($do_work_last_year/60);//ปัดเศษ
                                                $vacation = floor($x * 2) / 2;
                                            }else if ($do_work>=730){
                                                $vacation =6;


                                            }else{
                                                $vacation =0;
                                            }


                                            // หาวันที่ พักร้อนไปแล้ว
                                           $oc_id     = $get_users['oc_id'];



                                        $vacation_use =$process->coutn_vacation($oc_id,$first_year,$last_year2);


                                      //สิทธิ์

                                      $cooldown = $vacation-$vacation_use['coutn_vacation'];;




                                      $user_id =$get_users['oc_id'];
                                       //วันที่ 1


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
                                            <td>'.date('d/m/Y',strtotime($get_users['start'])).'</td>
                                            <td>'.time_elapsed_string($get_users['start'], true).'</td>
                                            <td>'. $vacation.'</td>
                                            <td>'.$vacation_use['coutn_vacation'].'</td>
                                            <td>'.$cooldown.'</td>
                                            <input type="hidden" value="'.$first_year.'" id="first_year">
                                            <input type="hidden" value="'.$last_year2.'" id="last_year">

                        </td>


                                            <td>'.$data['count_kit'].'</td>
                                            <td>'.$data['count_sick'].'</td>
                                            <td>'.$data['count_wrong'].'</td>
                                            <td>'.$data['count_late'].'</td>
                                            <td>'.$data['coutn_absence'].'</td>


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

                            ?>









</body>

</html>
