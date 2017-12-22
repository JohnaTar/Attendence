<?php
include "connect.php";
if (isset($_POST['user_id_add_vacation_last_year'])) {

    $ss='SELECT COUNT(user_id) FROM vacation_last_year WHERE user_id ="'.$_POST['user_id_add_vacation_last_year'].'"';
    $result=mysqli_query($conn,$ss);
    $row =mysqli_fetch_array($result);

    if ($row['0']==0) {
      $sql='INSERT INTO `vacation_last_year` (`user_id`, `va_num`, `add_id`) VALUES ("'.$_POST['user_id_add_vacation_last_year'].'","'.$_POST['number_of_day'].'","119")';
      $res =mysqli_query($conn,$sql);
      if ($res) {
        echo 1;
      }else{
        echo 2;
      }

    }else{

      $sql ='UPDATE `vacation_last_year` SET `va_num`="'.$_POST['number_of_day'].'" WHERE (`user_id`= "'.$_POST['user_id_add_vacation_last_year'].'")';
      $res =mysqli_query($conn,$sql);
      if ($res) {
        echo 1;
      }else{
        echo 2;
      }
    }


}







?>
