<?php
include('connect.php');
if (isset($_POST['add_companny'])) {


  $sql ='INSERT INTO `companny`(`co_name`)
         VALUES ("'.$_POST['add_companny'].'")';
  $result=mysqli_query($conn,$sql);
  $question_id = mysqli_insert_id($conn);
  if ($result) {

    for($i = 0; $i < count($_POST['dep']);	) {
              $ch_text = $_POST['dep'][$i];


      $sql = 'INSERT INTO `department`(`co_id`, `dep_co_name`) VALUES ("'.$question_id.'" ,"'.$ch_text.'")';
        				mysqli_query($conn, $sql);


                $i++;
      }

  			echo '1';







  }else{
    echo "eror";
  }





}
?>
