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


  $get_user =  $process->get_user_in_companny($_POST['co_id']);





    echo '
    <table width="100%" class="table table-striped  table-hover table-responsive" id="dataTables-example">
        <thead>
            <tr>
                <th rowspan="2" >ลำดับ</th>
                <th rowspan="2" >ชื่อ - นามสกุล</th>
                <th rowspan="2" >แผนก</th>
                <th rowspan="2" >วันเริ่มงาน (ว/ด/ป)</th>
                <th rowspan="2" >อายุงาน</th>
                <th colspan="3" style="text-align:center">พักร้อน ( วัน )</th>

                <th rowspan="2">เมนู</th>


            </tr>
            <tr>


                <th>สิทธพักร้อน</th>
                <th>ใช้</th>
                <th>เหลือ</th>





            </tr>
        </thead>
        <tbody>';




         $n = 1;
        if (!empty($get_user)) {
            foreach($get_user as $get_users){
              $user_id =$get_users['oc_id'];
               //วันที่ 1
              $myString = $_POST['date']; //วันที่เลือก
             	$myArray = explode(',', $myString);
              $first_year =date("Y-m-d", strtotime($myArray[0]));
              $last_year2 =date("Y-m-d", strtotime($myArray[1]));
/////////////////////////////////////////////////////////////////////////////////////////////////////////////


               $last_year =  date('Y', strtotime($get_users['start'])).'-'.date("m-d", strtotime($myArray[1]));
               // $maty_nganga = '-'.$get_users['last_y'];
               $maty_nganga = '-'.date("m-d", strtotime($myArray[1]));




$start_date = date_create($get_users['start']);
$current_date = date_create();
$diff = date_diff($start_date,$current_date);
$do_work = $diff->format("%a");
if ($do_work >=365 AND $do_work <730) { // ถ้ามากกว่า หรือ เท่ากับ 1 ปี
$date = $get_users['start'];
$date = strtotime($date);
$date = strtotime("+365 day", $date);
$mama =date('Y', $date).$maty_nganga;
if (date("Y-m-d") >=$mama) {
        $vacation =6;
  }else{
    $the_last_of_the_year = strtotime($last_year);
    $start_work = strtotime($get_users['start']);
    $datediff = $the_last_of_the_year - $start_work;
    $do_work_last_year = floor($datediff / (60 * 60 * 24));

      for   ($i=0; 30 <=$do_work_last_year; $i++) {
             $day =  $do_work_last_year -= 30;
      }

      if ($day !=0) {

          $cal = (6/12)*($day/30);


      }else{
        $cal =0;
      }

      $sum =((6/12)*$i)+$cal;


 $num = $sum;
 $whole = (int) $num;  // 5
 $frac  = $num - (int) $num;  // .7

if ($frac >=0.75) {

            $vacation =$whole+1;
    } else if ($frac >=0.25){
     $vacation =$whole+0.5;
    }else{
          $vacation=$sum;
        }

  }
}else if ($do_work>=730){
    $vacation =6;
}else{
    $vacation =0;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
$oc_id =$get_users['oc_id'];
$vacation_use =$process->coutn_vacation($oc_id,$first_year,$last_year2);




/////////////////////////////////////////////////////////////////////////////////////////////////////////////









            $sum =$vacation-$vacation_use['coutn_vacation'];
            //ลาออก
            if ($get_users['resign'] ==2) {
              $resign = 'style="text-decoration:line-through; color:red;"';
            } else{
              $resign ='';
            }

            echo '
                  <tr  '.$resign.' >
                    <td>'.$n.'</td>
                    <td><div style="width: 140px">'.$get_users['oc_name'].'</td>
                    <td>'.$get_users['dep_co_name'].'</td>
                    <td>'.date('d/m/Y',strtotime($get_users['start'])).'</td>
                    <td>'.time_elapsed_string($get_users['start'], true).'</td>
                    <td class="text-center">'.$vacation.'</td>
                    <td class="text-center">'.$vacation_use['coutn_vacation'].'</td>


                    <td class="text-center">'.$sum.'</td>';




                    if ($vacation ==0 OR $sum ==0 ) {

                        echo '<td></td>';

                    }else{

                      echo '<td><div style="width: 65px"><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return add_vacation_oc('.$get_users['oc_id'].');"><i class="fa fa-plus" aria-hidden="true"></i></button> :
                      <button  class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" onclick="return show_more_detail_outsrouce_vacation('.$get_users['oc_id'].')"><i class="fas fa-chart-pie"></i></button>





                    </tr>


              ';


                    }





            $n++;



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
  $date=$_POST['date'];
  $newdate =date("Y-m-d",strtotime($date));

    $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['time']."',
    '".$_POST['late']."', '".$newdate."', '119', '".$_POST['comment']."')";

    $row=mysqli_query($conn,$sql);

    if ($row) {
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


    }else{

      echo '2';
    }


}





if (isset($_POST['forget'])) {
  $date=$_POST['date'];
	$newdate =date("Y-m-d",strtotime($date));
	$sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['number']."',
	'".$_POST['forget']."', '".$newdate."', '119', '".$_POST['comment']."')";

	$row=mysqli_query($conn,$sql);

	if ($row) {
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


	}else{

		echo '2';
	}


}

if (isset($_POST['exit'])) {

	$date=$_POST['date'];
	$newdate =date("Y-m-d",strtotime($date));

		$sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['time']."',
		'".$_POST['exit']."', '".$newdate."', '119', '".$_POST['comment']."')";

		$row=mysqli_query($conn,$sql);

		if ($row) {
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


		}else{

			echo '2';
		}

}

if (isset($_POST['absence'])) {
	if (empty($_POST['number'])) {
		$number = 480;
	}else if($_POST['number'] == 1 ){
		$number = 480;
	}else if($_POST['number'] == 0.5){
	  $number = 240;
  }else {
		$number =$_POST['minute'];
	}


	$type = $_POST['absence'];
	$myString = $_POST['date'];
	$myArray = explode(',', $myString);
	$comment =$_POST['comment'];

	$myArraylength = count($myArray);


for($x = 0; $x < $myArraylength; $x++) {

      $date = date('Y-m-d',strtotime($myArray[$x]));

		$sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
					 VALUES ('".$number."','".$type."', '".$date."', '119', '".$comment."')";
		$row=mysqli_query($conn,$sql);

		if ($row) {
			$insert_id = mysqli_insert_id($conn);
			$sqlil ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['oc_id_late']."', '".$insert_id."')";
			$ress  =mysqli_query($conn,$sqlil);
		}


}
echo '1';
exit();



}





if (isset($_POST['show_user_id'])) {
  $sql ='SELECT outsrouce.oc_id,outsrouce.oc_name
         FROM outsrouce WHERE outsrouce.oc_id ='.$_POST['show_user_id'].'';

  $res =mysqli_query($conn,$sql);
  $row =mysqli_fetch_array($res,MYSQLI_ASSOC);
  echo '    <form class="form-horizontal" id="edit_user_form_oc" onsubmit="return save_vacation_oc();">
                  <div class="form-group">
                      <label class="col-md-4 control-label" for="fn">ชื่อ นามสกุล</label>
                      <div class="col-md-4">
                 '.$row['oc_name'].'

                  <input type="hidden" name="user_id" value="'.$row['oc_id'].'">
                  <input type="hidden" name="who_add" value="'.$row['oc_id'].'">

                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-4 control-label" for="fn">วันพักร้อน</label>
                      <div class="col-md-4">
                  <input name="vacation" type="date" placeholder="Firstname" class="form-control input-md" required="">

                      </div>
                  </div>

                  <div class="form-group">
                  <label class="col-md-4 control-label" for="fn">วัน</label>
                  <div class="col-md-4">
                  <input type="radio" required name="day" value="0.5" >ครึ่งวัน
              <input type="radio" required name="day" value="1" >เต็มวัน
          </div>
        </div>


          <div class="form-group">
              <label class="col-md-4 control-label" for="submit"></label>
              <div class="col-md-4">
          <button type="submit" name="submit" class="btn btn-primary" >Save</button>
              </div>
          </div>




              </form>';


}


if (isset($_POST['vacation'])) {


  $sql ="INSERT INTO `sum_oc` (`day_n`, `ty_id`, `date`, `add_id`) VALUES ('".$_POST['day']."','12','".$_POST['vacation']."', '".$_POST['who_add']."')";
  $row=mysqli_query($conn,$sql);

  if ($row) {
    $insert_id = mysqli_insert_id($conn);
      $sqli ="INSERT INTO `status_oc` (`oc_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
      $res  =mysqli_query($conn,$sqli);
      if ($res) {
        echo '1';
        exit();
      }else{
        echo '2';
        exit();
      }


  }else{

    echo '2';
  }

}





 ?>
