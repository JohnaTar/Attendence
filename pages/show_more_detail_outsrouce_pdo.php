<?php
class data_outsrouce {


       private $host = 'localhost'; //ชื่อ Host
       private $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
       private $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
       private $database = 'johnatar'; //ชื่อ ฐานข้อมูล

    //function เชื่อมต่อฐานข้อมูล
    protected function connect(){

        $mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);

            $mysqli->set_charset("utf8");


            if ($mysqli->connect_error) {

                die('Connect Error: ' . $mysqli->connect_error);
            }

        return $mysqli;
    }


    public function show_vacation_all($oc_id){
      $db =$this->connect();
      $show_data =$db->prepare("SELECT outsrouce.oc_id,outsrouce.oc_name,
                                       companny.co_name,department.dep_co_name
                                FROM outsrouce
                                INNER JOIN department ON outsrouce.dep_co_id = department.dep_co_id
                                INNER JOIN companny ON outsrouce.co_id = companny.co_id
                                WHERE outsrouce.oc_id =? ");
      $show_data->bind_param("i",$oc_id);
      $show_data->execute();
      $show_data->bind_result($oc_id,$oc_name,$co_name,$dep_co_name);
      $show_data->fetch();
      $result = array('oc_id' =>$oc_id ,
                      'oc_name'=>$oc_name,
                      'co_name'=>$co_name,
                      'dep_co_name'=>$dep_co_name);
                return $result;

    }

    public function while_data($oc_id,$first_day_of_month,$last_day_of_month){
      $db=$this->connect();
      $get_data=$db->query("SELECT sum_oc.day_n,sum_oc.ty_id,sum_oc.date,sum_oc.`comment`,
                                    outsrouce.oc_id,outsrouce.oc_name,type.ty_n,sum_oc.sum_id
                             FROM outsrouce
                            INNER JOIN status_oc ON outsrouce.oc_id = status_oc.oc_id
                            INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
                            INNER JOIN type ON sum_oc.ty_id = type.ty_id
                            WHERE outsrouce.oc_id ='".$oc_id."'AND sum_oc.ty_id !=5 AND sum_oc.date >='".$first_day_of_month."'
                            AND sum_oc.date <='".$last_day_of_month."'ORDER BY sum_oc.ty_id,sum_oc.date  ASC");
      while ($data = $get_data->fetch_assoc()) {
          $result[] =$data;
      }
      if(!empty($result)){
        return $result;
      }
    }

    public function while_data_vacation($oc_id,$first_day_of_year,$last_day_of_year){
      $db=$this->connect();
      $get_data=$db->query("SELECT sum_oc.day_n,sum_oc.ty_id,sum_oc.date,sum_oc.`comment`,
                                    outsrouce.oc_id,outsrouce.oc_name,type.ty_n,sum_oc.sum_id
                             FROM outsrouce
                            INNER JOIN status_oc ON outsrouce.oc_id = status_oc.oc_id
                            INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
                            INNER JOIN type ON sum_oc.ty_id = type.ty_id
                            WHERE outsrouce.oc_id ='".$oc_id."'AND sum_oc.ty_id =5 AND sum_oc.date >='".$first_day_of_year."'
                            AND sum_oc.date <='".$last_day_of_year."'ORDER BY sum_oc.date  ASC");
      while ($data = $get_data->fetch_assoc()) {
          $result[] =$data;
      }
      if(!empty($result)){
        return $result;
      }
    }


    public function delete_sum_id($id){

        $db = $this->connect();

        $del_user = $db->prepare("DELETE status_oc,sum_oc
                                  FROM status_oc
                                  INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
                                  WHERE status_oc.sum_id =?");

        $del_user->bind_param("i",$id);

        if(!$del_user->execute()){

            echo '2';

        }else{

            echo '1';
        }
    }
}
?>
