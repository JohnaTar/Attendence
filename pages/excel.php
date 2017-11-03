<?php

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="myexcel.xls"');
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("myexcel.xls"));   

@readfile($filename);  



?>

<html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table>
  <tr>
    <td>ลำดับ</td>
    <td>ชื่อ</td>
    <td>แผนก</td>
    <td>วันเริ่มงาน</td>
    <td>จำนวนวันทำงาน</td>
  </tr>
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
        include('connect.php');
        $sql ="SELECT `user`.user_id,`user`.`name`,`user`.resign,`user`.`start`,`user`.dep_id,
                                                   dep.dep_name
                        
                                           FROM `user` 
                                           INNER JOIN dep ON `user`.dep_id = dep.dep_id
                                           WHERE resign =1 
                                           ORDER BY `user`.dep_id ASC
                                           ";
        $res =mysqli_query($conn,$sql);
        $i=1;
         while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                                            $current_y = (date("Y")-1).'-12-26';
                                            $current_y2 =date("Y").'-12-25'; 


                                            $sqli="SELECT Sum(sum.day_n),sum.ty_id,sum.date,`status`.user_id
                                                   FROM sum
                                                   INNER JOIN `status` ON sum.sum_id = `status`.sum_id
                                                   WHERE user_id ='".$row['user_id']."' AND ty_id ='5'
                                                   AND date >= '".$current_y."' AND  date <= '".$current_y2."'";


                                            $result =mysqli_query($conn,$sqli);
                                            $rows =mysqli_fetch_array($result);
                                            if ($rows['0'] !=0 ) {
                                                $vacations= $rows['0'];
                                            }else{
                                                $vacations= 0;
                                            }
                                            



                                        
                                        $date1 = date_create($row['start']);
                                        $date2 = date_create();
                                        $diff = date_diff($date1,$date2);
                                        $vacation = $diff->format("%a"); /*คำนวณวัน 8/12*/

                                        if ($vacation >='365' AND $vacation < '730') {

                                            $month = date("m",strtotime($row['start']));
                                            $va = 12-$month;
                                            $vaa = (8/12)*$va ;
                                            $vacation_re =round($vaa,0,PHP_ROUND_HALF_DOWN) ;
                                            $datas ='';
                                            $count =0;
                                            
                                            
                                        }else if ($vacation >=730) {
                                            //คำนวณลาพักร้อนปีที่แล้ว
                                            $vacation_re = '8';
                                            $last_y = (date("Y")-2).'-12-26';
                                            $last_y2 = (date("Y")-1).'-12-25';  
                                                $sq ="SELECT Sum(sum.day_n),sum.ty_id,sum.date,`status`.user_id
                                                       FROM `status`
                                                       INNER JOIN sum ON `status`.sum_id = sum.sum_id
                                                       WHERE date >= '".$last_y."' AND  date <= '".$last_y2."' 
                                                       AND ty_id ='5' AND user_id ='".$row['user_id']."'";
                                                $result =mysqli_query($conn,$sq);
                                                $ro =mysqli_fetch_array($result);
                                                $count =  8-$ro['0'];
                                                if ($count>= 4) {
                                                    $count = 4;
                                                }else if ($count < 4) {
                                                  $count = $count;
                                                }

                                                

                                            $datas ='';
                                        }else{

                                             $count =0;
                                             $vacation_re = '0';
                                          

                                             
                                        }



         



    ?>
   
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['dep_name']; ?></td>
    <td><?php echo date('d/m/Y',strtotime($row['start'])); ?></td>
    <td><?php echo time_elapsed_string($row['start'], true); ?></td>
   
  </tr>

   <tr>
    <td></td>
    <td >สิทธิ์พักร้อน</td>
    <td ></td>
    <td><?php echo $vacation_re+$count; ?></td>
    <td>วัน</td>
  </tr> 
  

<?php 
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
                 
?>          
            <tr>
                            <td></td>
                            <td>ใข้วันที่</td>
                            <td><?php echo date('d/m/Y',strtotime($low['date'])); ?></td>
                            <td><?php echo $low['day_n']; ?></td>
                            <td>วัน</td>
            </tr>
<?php } ?>
            <tr >
                <td></td>
                <td></td>
                
                <td>เหลือ</td>
                <td style="border-bottom: 1px solid black; border-color: red;"><?php echo $vacation_re+$count-$total; ?></td>   
                <td>วัน</td>
            </tr>


  <?php $i++;  }  ?>


</table>
</body>
</html>
