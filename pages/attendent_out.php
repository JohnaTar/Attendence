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



  $get_user =  $process->get_user_in_companny($_POST['co_id']);





    echo '
    <table width="100%" class="table table-striped Striped Rows table-hover" id="dataTables-example" cellspacing="0" >
        <thead>
              <tr>
                  <th rowspan="3">ชื่อ - นามสกุล</th>
                  <th rowspan="3">แผนก</th>
                  <th rowspan="3">เบอร์</th>

                  <th colspan="11 " style="text-align:center">


                  </th>

                  <th rowspan="3" width="80">เมนู</th>


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
              $myString = $_POST['date'];
             	$myArray = explode(',', $myString);
              $first_day_of_month =date("Y-m-d", strtotime($myArray[0]));
              $last_day_of_month =date("Y-m-d", strtotime($myArray[1]));


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





                    <td><div style="width: 65px"><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return show_from_add_vacation_oc('.$get_users['oc_id'].');"><i class="fa fa-plus" aria-hidden="true"></i></button> :
                    <button  class="btn btn-info btn-xs" data-toggle="modal" data-target="#show_attendent_oc" onclick="return get_show_attendent_oc('.$get_users['oc_id'].')"><i class="fas fa-chart-pie"></i></button>





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

if (isset($_POST['attendent_oc'])) {




			    	$sql ="SELECT outsrouce.oc_id,outsrouce.oc_name
                   FROM outsrouce
                   WHERE outsrouce.oc_id ='".$_POST['attendent_oc'][0]."' ";

						$result =mysqli_query($conn,$sql);
						$row =mysqli_fetch_array($result,MYSQLI_ASSOC);


echo '<form class="form-horizontal">

								<div class="form-group">
									<label class="col-md-4 control-label" for="selectbasic">ประเภท</label>
									<div class="col-md-6">
							<select  name="type" id="type_of_detail_oc" class="form-control input-md" required="">
									<option value="">  </option>
									 <option value="1"> สาย </option>
									 <option value="2"> ลืมสแกน </option>
									 <option value="3"> ออกก่อน </option>
									 <option value="4"> ขาดงาน </option>
									 <option value="5"> ลาป่วย (ไม่มีใบรับรองแพทย์) </option>
									 <option value="6"> ลาป่วย (มีใบรับรองแพทย์) </option>
									 <option value="7"> ลาป่วย (จากการทำงาน) </option>
									 <option value="8"> ลากิจ (ได้ค่าจ้าง) </option>
									 <option value="9"> ลากิจ (ไม่ได้ค่าจ้าง) </option>
									 <option value="10"> ลากิจพิเศษ (ได้ค่าจ้าง) </option>
									 <option value="11"> ลาอื่น </option>

							</select>

									</div>
							</div>
</form>



<input type="hidden" value ="'.$row['oc_id'].'" id="oc_id_type_of_detail" >
<input type="hidden" value ="'.$_POST['attendent_oc'][1].'" id="oc_month_type_of_detail" >
<input type="hidden" value ="'.$_POST['attendent_oc'][2].'" id="hour_of_work" >

';

					echo " <p>ชื่อ นามสกุล : ".$row['oc_name']." </p>
								 <p>  รอบวันที่ : ".$_POST['attendent_oc'][1]." </p>";



}
 ?>
