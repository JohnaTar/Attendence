<?php
	include('connect.php');
	if (isset($_POST['month'])) {
		if ($_POST['month'] ==1) {

			$rang = (date('Y')-1).'-12-26';
			$rang2 = date('Y').'-01-25';

			}else if ($_POST['month'] ==2) {
				$rang = date('Y').'-01-26';
			    $rang2 = date('Y').'-02-25';

			 }else if ($_POST['month'] ==3) {
			 	$rang = date('Y').'-02-26';
			    $rang2 = date('Y').'-03-25';

			  }else if ($_POST['month'] ==4) {
			 	$rang = date('Y').'-03-26';
			    $rang2 = date('Y').'-04-25';

			   }else if ($_POST['month'] ==5) {
					$rang = date('Y').'-04-26';
			    	$rang2 = date('Y').'-05-25';

			    }else if ($_POST['month']==6) {
			    	$rang = date('Y').'-05-26';
			    	$rang2 = date('Y').'-06-25';

			      }else if ($_POST['month']==7) {
			    		$rang = date('Y').'-06-26';
			    		$rang2 = date('Y').'-07-25';

			    	}else if ($_POST['month']==8) {
			    		$rang = date('Y').'-07-26';
			   			$rang2 = date('Y').'-08-25';

			    		}else if ($_POST['month']==9) {
			    			$rang = date('Y').'-08-26';
			   				$rang2 = date('Y').'-09-25';

			    		}else if ($_POST['month']==10) {
			    			$rang = date('Y').'-09-26';
			   				$rang2 = date('Y').'-10-25';

			    		}else if ($_POST['month']==11) {
			    			$rang = date('Y').'-10-26';
			   				$rang2 = date('Y').'-11-25';

			    		}else{
			    			$rang = date('Y').'-11-26';
			   				$rang2 = date('Y').'-12-25';

			    		}





			    			$sql ="SELECT `user`.user_id,`user`.`name`,`user`.resign,`user`.`start`,`user`.dep_id,
                                           dep.dep_name

   								   FROM `user`
                                   INNER JOIN dep ON `user`.dep_id = dep.dep_id
                                   ORDER BY `user`.resign ASC ,`user`.dep_id ASC";
                            $res =mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {


                                        if ($row['resign'] ==2) {
                                                $data ='style="text-decoration:line-through; color:red;";';
                                        }else{
                                                $data ='';

                                        }



                            /*	####################### สาย ############################## */
                  $sqli ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
									    FROM   `status`
										INNER JOIN sum ON `status`.sum_id = sum.sum_id
										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='1'";
								$result =mysqli_query($conn,$sqli);
								$low=mysqli_fetch_array($result,MYSQLI_ASSOC);
								 			if ($low['COUNT(sum.day_n)'] ==0) {
								 				$late ='';
								 			}else{
								 				$late = $low['COUNT(sum.day_n)'];
								 			}
							 /*##############################	ลิมแสกน ########################## */
							 	$sqlii ="SELECT COUNT(sum.day_n),`status`.user_id,sum.ty_id,sum.date
									    FROM   `status`
										INNER JOIN sum ON `status`.sum_id = sum.sum_id
										WHERE user_id='".$row['user_id']."' AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='2	'";
								$resultt =mysqli_query($conn,$sqlii);
								$loww=mysqli_fetch_array($resultt,MYSQLI_ASSOC);
								if($loww['COUNT(sum.day_n)'] == 0){
										$forget = '';
								}else{
										$forget = $loww['COUNT(sum.day_n)'];
								}


							/*##############################	ออกก่อน ########################## */
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
							/*##############################	ขาดงาน ########################## */
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


                            	echo'<tr  '.$data.' id="tar">
                            			<td>'.$row['name'].'</td>
                            			<td>'.$row['dep_name'].'</td>
                            			<td align="center">'.$late.'</td>
                            			<td align="center">'.$forget.'</td>
                            			<td align="center">'.$exit.'</td>
                            			<td align="center">'.$kad.'</td>
                            			<td align="center">'.$sick_not.'</td>
                            			<td align="center">'.$sick.'</td>
																	<td align="center">'.$sick_form_work.'</td>
																	<td align="center">'.$kit.'</td>
																	<td align="center">'.$kit_not.'</td>
																	<td align="center">'.$kit_ex.'</td>
																	<td align="center">'.$ext.'</td>
																	 ';


                            	if ($row['resign'] ==1) {
                            		echo '	<td><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return add_data( '.$row['user_id'].');"><i class="fa fa-plus" aria-hidden="true"></i></button> : <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#show_attendent" onclick="return get_show_attendent( '.$row['user_id'].');"><i class="fa fa-area-chart" aria-hidden="true"></i></button>


                            			</td>
                            	     </tr>';
                            	}



                            }



	}


if (isset($_POST['add_id'])) {

		$sql ="SELECT `user`.user_id,`user`.`name`
			   FROM  `user`
			   WHERE user_id='".$_POST['add_id']."'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($res,MYSQLI_ASSOC);






	echo '
	          <div class="form-group">
          <label class="col-md-4 control-label" for="fn">ชื่อ นามสกุล</label>
          <div class="col-md-4">
                   '.$row['name'].'
           </div>
    </div>
     <input type="hidden" name="user_id" value="'.$row['user_id'].'">


	                      ';
}



if (isset($_POST['late'])) {

	$date=$_POST['date'];
	$newdate =date("Y-m-d",strtotime($date));

		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['time']."',
		'".$_POST['late']."', '".$newdate."', '119', '".$_POST['comment']."')";

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

if (isset($_POST['absence'])) {
	if (empty($_POST['number'])) {
		$number = 1;
	}else if($_POST['number'] == 1 OR $_POST['number'] == 0.5){
		$number = $_POST['number'];
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

		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`)
					 VALUES ('".$number."','".$type."', '".$date."', '119', '".$comment."')";
		$row=mysqli_query($conn,$sql);

		if ($row) {
			$insert_id = mysqli_insert_id($conn);
			$sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
			$ress  =mysqli_query($conn,$sqlil);
		}


}
echo '1';
exit();



}

// ลืมสแกน

if (isset($_POST['forget'])) {


	$date=$_POST['date'];
	$newdate =date("Y-m-d",strtotime($date));
	$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['number']."',
	'".$_POST['forget']."', '".$newdate."', '119', '".$_POST['comment']."')";

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


// ออกก่อน
if (isset($_POST['exit'])) {

	$date=$_POST['date'];
	$newdate =date("Y-m-d",strtotime($date));

		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['time']."',
		'".$_POST['exit']."', '".$newdate."', '119', '".$_POST['comment']."')";

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


if (isset($_POST['attendent'])) {

	  $data =$_POST['attendent'][1];

	if ($data ==1) {

			$rang = (date('Y')-1).'-12-26';
			$rang2 = date('Y').'-01-25';
			$month ='มกราคม';

			}else if ($data ==2) {
				$rang = date('Y').'-01-26';
			    $rang2 = date('Y').'-02-25';
			    $month ='กุมภาพันธ์';

			 }else if ($data ==3) {
			 	$rang = date('Y').'-02-26';
			    $rang2 = date('Y').'-03-25';
				$month ='มีนาคม';
			  }else if ($data ==4) {
			 	$rang = date('Y').'-03-26';
			    $rang2 = date('Y').'-04-25';
			   	$month ='เมษายน';
			   }else if ($data ==5) {
					$rang = date('Y').'-04-26';
			    	$rang2 = date('Y').'-05-25';
			    	$month ='พฤษภาคม';
			    }else if ($data ==6) {
			    	$rang = date('Y').'-05-26';
			    	$rang2 = date('Y').'-06-25';
			    	$month ='มิถุนายน';
			      }else if ($data==7) {
			    		$rang = date('Y').'-06-26';
			    		$rang2 = date('Y').'-07-25';
			    		$month ='กรกฎาคม';
			    	}else if ($data==8) {
			    		$rang = date('Y').'-07-26';
			   			$rang2 = date('Y').'-08-25';
			   			$month ='สิงหาคม';
			    		}else if ($data==9) {
			    			$rang = date('Y').'-08-26';
			   				$rang2 = date('Y').'-09-25';
			   				$month ='กันยายน';
			    		}else if ($data==10) {
			    			$rang = date('Y').'-09-26';
			   				$rang2 = date('Y').'-10-25';
			   				$month ='ตุลาคม';
			    		}else if ($data==11) {
			    			$rang = date('Y').'-10-26';
			   				$rang2 = date('Y').'-11-25';
			   				$month ='พฤศจิกายน';
			    		}else{
			    			$rang = date('Y').'-11-26';
			   				$rang2 = date('Y').'-12-25';
			   				$month ='ธันวาคม';
			    		}



			    		$sql ="SELECT  `user`.user_id, `user`.`name`
							   FROM `user`
							   WHERE user_id ='".$_POST['attendent'][0]."'";
						$result =mysqli_query($conn,$sql);
						$row =mysqli_fetch_array($result,MYSQLI_ASSOC);

					echo "
						<div class='row'>
	                       <div class='col-lg-12'>

	                            <div class='table-responsive'>
	                                <table class='table table-striped'>
	                                    <thead>
	                                        <tr>
	                                            <th colspan='2'>ชื่อ นามสกุล : ".$row['name']."
	                                            <th> เดือน : ".$month."</th>
	                                            <th>Comment</th>

	                                        </tr>
	                                    </thead>
	                                    <tbody>";

	                    $sqli ="SELECT `status`.user_id,sum.day_n,sum.ty_id,sum.date,sum.`comment`
								FROM  sum
								INNER JOIN `status` ON `status`.sum_id = sum.sum_id
								WHERE `status`.user_id='".$row['user_id']."'
								AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='1' ";
						$res = mysqli_query($conn,$sqli);
						$time =0;

						while ($low=mysqli_fetch_array($res,MYSQLI_ASSOC)) {

    						$total = $low['day_n'];
    						$time +=  $total;




							echo '<tr class="success">
	                                            <td> สาย</td>
	                                            <td> '.date('d/m/Y',strtotime($low['date'])).'</td>
	                                            <td> '.$low['day_n'].' นาที </td>
	                                            <td> '.$low['comment'].'</td>
	                              </tr> ';

		                            }


								if (!empty($time)) {

									echo '	<tr   class="success">
										<td></td>
										<td>รวม</td>
										<td style="color:red;">'.sprintf("%02dh %02dm", floor($time/60), $time%60).' </td>
										<td></td>

										</tr >



							';

								}else{

								}




	                    $sqla ="SELECT `status`.user_id,sum.day_n,sum.ty_id,sum.date,sum.`comment`
								FROM  sum
								INNER JOIN `status` ON `status`.sum_id = sum.sum_id
								WHERE `status`.user_id='".$row['user_id']."'
								AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='1'
								ORDER BY date ASC ";
						$ress = mysqli_query($conn,$sqla);
						$total2 = 0;
						while ($tar=mysqli_fetch_array($ress,MYSQLI_ASSOC)) {
								$total2 += $tar['day_n'];
							echo '<tr class="warning" >
												<td> ขาด</td>
	                                            <td> </td>
	                                            <td> '.date('d/m/Y',strtotime($tar['date'])).'</td>

	                                            <td> '.$tar['comment'].'</td>
	                              </tr>';
						}
						    echo '

		                          			<tr class="warning" >
		    									<td></td>
		    									<td>รวม</td>
		    									<td style="color:red;">'.$total2.' วัน </td>
		    									<td></td>

		    							    </tr >

		    						';

		    			  $sq ="SELECT `status`.user_id,sum.day_n,sum.ty_id,sum.date,sum.`comment`
								FROM  sum
								INNER JOIN `status` ON `status`.sum_id = sum.sum_id
								WHERE `status`.user_id='".$row['user_id']."'
								AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='2'
								ORDER BY date ASC ";
						$re = mysqli_query($conn,$sq);
						$total3 = 0;
						while ($tars=mysqli_fetch_array($re,MYSQLI_ASSOC)) {
								$total3 += $tars['day_n'];
							echo '<tr class="danger" >

	                                            <td> ลาป่วย</td>
	                                            <td> '.date('d/m/Y',strtotime($tars['date'])).'</td>
	                                            <td> '.$tars['day_n'].'</td>
	                                            <td> '.$tars['comment'].'</td>
	                              </tr>';
						}
						    echo '

		                          			<tr class="danger" >
		    									<td></td>
		    									<td>รวม</td>
		    									<td style="color:red;">'.$total3.' วัน </td>
		    									<td></td>

		    							    </tr >

		    						';


		    			  $q ="SELECT `status`.user_id,sum.day_n,sum.ty_id,sum.date,sum.`comment`
								FROM  sum
								INNER JOIN `status` ON `status`.sum_id = sum.sum_id
								WHERE `status`.user_id='".$row['user_id']."'
								AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='3'
								ORDER BY date ASC";
						$r = mysqli_query($conn,$q);
						$total4 = 0;
						while ($tarss=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
								$total4 += $tarss['day_n'];
							echo '<tr class="info" >

	                                            <td> ลากิจ</td>
	                                            <td> '.date('d/m/Y',strtotime($tarss['date'])).'</td>
	                                            <td> '.$tarss['day_n'].'</td>
	                                            <td> '.$tarss['comment'].'</td>
	                              </tr>';
						}
						    echo '

		                          			<tr class="info" >
		    									<td></td>
		    									<td>รวม</td>
		    									<td style="color:red;">'.$total4.' วัน </td>
		    									<td></td>

		    							    </tr >

		    						';
		    			$qq ="SELECT `status`.user_id,sum.day_n,sum.ty_id,sum.date,sum.`comment`
								FROM  sum
								INNER JOIN `status` ON `status`.sum_id = sum.sum_id
								WHERE `status`.user_id='".$row['user_id']."'
								AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='6'
								ORDER BY date ASC";
						$rr = mysqli_query($conn,$qq);
						$total5 = 0;
						while ($ts=mysqli_fetch_array($rr,MYSQLI_ASSOC)) {
								$total5 += $ts['day_n'];
							echo '<tr  >

	                                            <td> ลากิจพิเศษ</td>
	                                            <td> '.date('d/m/Y',strtotime($ts['date'])).'</td>
	                                            <td> '.$ts['day_n'].'</td>
	                                            <td> '.$ts['comment'].'</td>
	                              </tr>';
						}
						    echo '

		                          			<tr  >
		    									<td></td>
		    									<td>รวม</td>
		    									<td style="color:red;">'.$total5.' วัน </td>
		    									<td></td>

		    							    </tr >

		    						';
		    				$qqq="SELECT `status`.user_id,sum.day_n,sum.ty_id,sum.date,sum.`comment`
								FROM  sum
								INNER JOIN `status` ON `status`.sum_id = sum.sum_id
								WHERE `status`.user_id='".$row['user_id']."'
								AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='4'
								ORDER BY date ASC ";
						$rrr = mysqli_query($conn,$qqq);
						$total6 = 0;
						while ($tsss=mysqli_fetch_array($rrr,MYSQLI_ASSOC)) {
								$total6 += $tsss['day_n'];
							echo '<tr class="success">

	                                            <td> ลาอื่น</td>
	                                            <td> '.date('d/m/Y',strtotime($tsss['date'])).'</td>
	                                            <td> '.$tsss['day_n'].'</td>
	                                            <td> '.$tsss['comment'].'</td>
	                              </tr>';
						}
						    echo '

		                          			<tr class="success"  >
		    									<td></td>
		    									<td>รวม</td>
		    									<td style="color:red;">'.$total6.' วัน </td>
		    									<td></td>

		    							    </tr >




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
