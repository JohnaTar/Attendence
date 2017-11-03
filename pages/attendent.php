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

                            	echo '<tr '.$data.' id="tar">	
                            			<td>'.$row['name'].'</td>
                            			<td>'.$row['dep_name'].'</td>
                            			<td>'.date('d/m/Y',strtotime($row['start'])).'</td>
                            			<td>'.time_elapsed_string($row['start'], true).'</td>
                            			<td>'.$late.'</td> 
                            			<td>'.$loww['Sum(sum.day_n)'].'</td> 
                            			<td>'.$lo['Sum(sum.day_n)'].'</td> 
                            			<td>'.$loo['Sum(sum.day_n)'].'</td> 
                            			<td>'.$loos['Sum(sum.day_n)'].'</td> 
                            			<td>'.$looss['Sum(sum.day_n)'].'</td> ';

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
	
		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['time']."', 
		'".$_POST['late']."', '".$_POST['date']."', '119', '".$_POST['comment']."')";

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

		if ($_POST['rank'] >=1) {


		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('1', 
		'".$_POST['absence']."', '".$_POST['date2']."', '119', '".$_POST['comment2']."')";

		$row=mysqli_query($conn,$sql);

			if ($row) {

				$insert_id = mysqli_insert_id($conn);   
				$sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
				$ress  =mysqli_query($conn,$sqlil);

					if ($ress) {

						for ($i=1; $i <= $_POST['rank']; $i++) { 

							$data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date2'])));
							
						    $tar ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('1', 
						    '1', '".$data."', '119', '".$_POST['comment2']."')";
						    $maty=mysqli_query($conn,$tar);

						    $insert_id = mysqli_insert_id($conn);
						    $sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
						    $rows=mysqli_query($conn,$sqlil);


						}
						
						echo '1';
						exit();
					}


					else{
						echo '2';
						exit();
					}
			}
			

					 
				

					

				     
					

			}else{



		$sqll ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('1', 
		'".$_POST['absence']."', '".$_POST['date2']."', '119', '".$_POST['comment2']."')";

		$rows=mysqli_query($conn,$sqll);

		if ($rows) {
			$insert_id = mysqli_insert_id($conn);   
				$sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
				$ress  =mysqli_query($conn,$sqlil);
				if ($ress) {
					echo '1';
					exit();
				}else{
					echo '2';
					exit();
				}


		}else{

			echo '2';
			exit();
		}
		
	}
}



if (isset($_POST['sick'])) {

		if ($_POST['rank3'] >=1) {


		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day3']."', 
		'".$_POST['sick']."', '".$_POST['date3']."', '119', '".$_POST['comment3']."')";
		$row=mysqli_query($conn,$sql);
	

			$insert_id = mysqli_insert_id($conn);   
			$sqli ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
			$res  =mysqli_query($conn,$sqli);
				if ($res) {


						for ($i=1; $i <= $_POST['rank3']; $i++) { 

							$data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date3'])));
							   $tar ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('1', 
						    '".$_POST['sick']."', '".$data."', '119', '".$_POST['comment3']."')";
						    $maty=mysqli_query($conn,$tar);

						    $insert_id = mysqli_insert_id($conn);
						    $sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
						    $rows=mysqli_query($conn,$sqlil);




						}

					echo '1';
					exit();
					
				}else{
					echo '2';
					exit();
				}
		


		}else{

	$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day3']."', 
		'".$_POST['sick']."', '".$_POST['date3']."', '119', '".$_POST['comment3']."')";

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
			exit();
		}
	}
		
}

if (isset($_POST['errand'])) {

	if ($_POST['rank4'] >=1) {


		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day4']."', 
		'".$_POST['errand']."', '".$_POST['date4']."', '119', '".$_POST['comment4']."')";
		$row=mysqli_query($conn,$sql);
	

			$insert_id = mysqli_insert_id($conn);   
			$sqli ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
			$res  =mysqli_query($conn,$sqli);
				if ($res) {


						for ($i=1; $i <= $_POST['rank4']; $i++) { 

							$data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date4'])));
							   $tar ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('1', 
						    '".$_POST['errand']."', '".$data."', '119', '".$_POST['comment4']."')";
						    $maty=mysqli_query($conn,$tar);

						    $insert_id = mysqli_insert_id($conn);
						    $sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
						    $rows=mysqli_query($conn,$sqlil);




						}

					echo '1';
					exit();
					
				}else{
					echo '2';
					exit();
				}
		


		}else{


	$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day4']."', 
		'".$_POST['errand']."', '".$_POST['date4']."', '119', '".$_POST['comment4']."')";

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
			exit();
		}

	}
}

if (isset($_POST['Exerrand'])) {

	if ($_POST['rank5'] >=1) {


		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day5']."', 
		'".$_POST['Exerrand']."', '".$_POST['date5']."', '119', '".$_POST['comment5']."')";
		$row=mysqli_query($conn,$sql);
	

			$insert_id = mysqli_insert_id($conn);   
			$sqli ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
			$res  =mysqli_query($conn,$sqli);
				if ($res) {


						for ($i=1; $i <= $_POST['rank5']; $i++) { 

							$data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date5'])));
							   $tar ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('1', 
						    '".$_POST['Exerrand']."', '".$data."', '119', '".$_POST['comment5']."')";
						    $maty=mysqli_query($conn,$tar);

						    $insert_id = mysqli_insert_id($conn);
						    $sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
						    $rows=mysqli_query($conn,$sqlil);




						}

					echo '1';
					exit();
					
				}else{
					echo '2';
					exit();
				}
		


		}else{


	$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day5']."', 
		'".$_POST['Exerrand']."', '".$_POST['date5']."', '119', '".$_POST['comment5']."')";

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
			exit();
		}

	}
}
if (isset($_POST['ext'])) {

	if ($_POST['rank6'] >=1) {


		$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day6']."', 
		'".$_POST['ext']."', '".$_POST['date6']."', '119', '".$_POST['comment6']."')";
		$row=mysqli_query($conn,$sql);
	

			$insert_id = mysqli_insert_id($conn);   
			$sqli ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
			$res  =mysqli_query($conn,$sqli);
				if ($res) {


						for ($i=1; $i <= $_POST['rank6']; $i++) { 

							$data =date("Y-m-d",strtotime("+".$i." days", strtotime($_POST['date6'])));
							   $tar ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('1', 
						    '".$_POST['ext']."', '".$data."', '119', '".$_POST['comment6']."')";
						    $maty=mysqli_query($conn,$tar);

						    $insert_id = mysqli_insert_id($conn);
						    $sqlil ="INSERT INTO `status` (`user_id`, `sum_id`) VALUES ('".$_POST['user_id']."', '".$insert_id."')";
						    $rows=mysqli_query($conn,$sqlil);




						}

					echo '1';
					exit();
					
				}else{
					echo '2';
					exit();
				}
		


		}else{


	$sql ="INSERT INTO `sum` (`day_n`, `ty_id`, `date`, `add_id`, `comment`) VALUES ('".$_POST['day6']."', 
		'".$_POST['ext']."', '".$_POST['date6']."', '119', '".$_POST['comment6']."')";

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
			exit();
		}

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
								AND date >= '".$rang."' AND  date <= '".$rang2."' AND ty_id ='7' ";
						$res = mysqli_query($conn,$sqli);
						$time =0;
						
						while ($low=mysqli_fetch_array($res,MYSQLI_ASSOC)) {

							$starttime = '8.45';
    						$stoptime = $low['day_n'];
    						$diff = (strtotime($stoptime) - strtotime($starttime));
    						$total = $diff/60;
    						$time +=  $total;


    						
							
							echo '<tr class="success">
	                                            <td> สาย</td>
	                                            <td> '.date('d/m/Y',strtotime($low['date'])).'</td>
	                                            <td> '.sprintf("%02dh %02dm", floor($total/60), $total%60).'</td> 
	                                            <td> '.$low['comment'].'</td>                                        
	                              </tr> ';
		                              
		                            }
		                    echo '

		                          			<tr   class="success">
		    									<td></td>
		    									<td>รวม</td>
		    									<td style="color:red;">'.sprintf("%02dh %02dm", floor($time/60), $time%60).' </td>
		    									<td></td>
		    									
		    							    </tr >



		    						'; 

		    

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

