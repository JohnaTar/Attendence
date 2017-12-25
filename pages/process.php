	<?php
		include ('connect.php');
		if (isset($_POST['show_user_id'])) {
			$sql ='SELECT `user`.user_id,`user`.`name`
				   FROM `user` WHERE user_id='.$_POST['show_user_id'].'';
			$res =mysqli_query($conn,$sql);
			$row =mysqli_fetch_array($res,MYSQLI_ASSOC);
			echo '    <form class="form-horizontal" id="edit_user_form" onsubmit="return save_vacation();">
	                    <div class="form-group">
	                        <label class="col-md-4 control-label" for="fn">ชื่อ นามสกุล</label>
	                        <div class="col-md-4">
	                   '.$row['name'].'

	                    <input type="hidden" name="user_id" value="'.$row['user_id'].'">
	                    <input type="hidden" name="who_add" value="'.$row['user_id'].'">

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


		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`) VALUES ('".$_POST['day']."','12','".$_POST['vacation']."', '".$_POST['who_add']."')";
		$row=mysqli_query($conn,$sql);

		if ($row) {
			$insert_id = mysqli_insert_id($conn);
				$sqli ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
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

	if (isset($_POST['add_user'])) {
		$sql ="INSERT INTO `user` (`name`, `resign`, `start`, `dep_id`) VALUES ('".$_POST['add_user']."', '1', '".$_POST['start']."', '".$_POST['dep']."')";
		$res =mysqli_query($conn,$sql);
		if ($res) {
			echo '1';
			exit();


		}else{
			echo '2';
			exit();


		}
	}


	if (isset($_POST['show_vacation'])) {

		$sql ="SELECT  `user`.`name`,dep.dep_name,`user`.user_id

			   FROM    `user`
	           INNER JOIN dep
	           ON `user`.dep_id = dep.dep_id
	           WHERE user_id ='".$_POST['show_vacation']."'";
	    $res =mysqli_query($conn,$sql);
	    $row =mysqli_fetch_array($res,MYSQLI_ASSOC);





		echo "  <div class='row'>
	                <div class='col-lg-12'>


	                            <div class='table-responsive'>
	                                <table class='table table-striped'>
	                                    <thead>
	                                        <tr>
	                                            <th colspan='4'>ชื่อ นามสกุล : ".$row['name']."

	                                        </tr>
	                                    </thead>
	                                    <tbody>";

	        $current_y = (date("Y")-1).'-12-26';
	        $current_y2 =date("Y").'-12-25';
	        $sqli="SELECT sum.day_n,sum.ty_id,sum.date,`status`.user_id
				   FROM sum
	               INNER JOIN `status`
	               ON `status`.sum_id = sum.sum_id
	               WHERE ty_id =5  AND date >= '".$current_y."' AND  date <= '".$current_y2."' AND user_id='".$row['user_id']."'
	               ORDER BY date ASC ";
	        $result =mysqli_query($conn,$sqli);
	        $total = 0;
	        while ($low=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
	        	$total += $low['day_n'];

	        echo ' 							<tr>
	                                            <td  >วันที่ใช้</td>
	                                            <td> '.date('d/m/Y',strtotime($low['date'])).'</td>
	                                            <td>'.$low['day_n'].'</td>
	                                            <td> วัน</td>
	                                        </tr>';
		                               }
		    echo '                          <tr>
		    									<td></td>
		    									<td>รวม</td>
		    									<td>'.$total.'</td>
		    									<td>วัน</td>
		    								</tr>




	                                   </tbody>
	                                </table>
	                            </div>
	                            <!-- /.table-responsive -->
	                        </div>
	                        <!-- /.panel-body -->


	             </div>
	         ';


	}

	?>
