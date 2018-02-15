<?php
class Outsource {


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

    //function เรื่ยกดูข้อมูลบริษัทในช่องค้นหา
    public function get_all_companny(){

        $db = $this->connect();
        $get_user = $db->query("SELECT * FROM companny");

        while($user = $get_user->fetch_assoc()){
            $result[] = $user;
        }

        if(!empty($result)){

            return $result;
        }
    }
      //function เรื่ยกดูข้อมูลพนักงานหลังจากค้นหา
    public function get_user_in_companny($post = null){

       $db = $this->connect();
       $get_user = $db->query("SELECT outsrouce.oc_id,outsrouce.oc_name,
                                      outsrouce.`start`,outsrouce.resign,
                                      outsrouce.tel,outsrouce.dep_co_id,
                                      department.dep_co_name,outsrouce.co_id

                               FROM outsrouce
                               INNER JOIN department ON outsrouce.dep_co_id = department.dep_co_id
                               INNER JOIN companny ON outsrouce.co_id = companny.co_id
                              WHERE outsrouce.co_id ='".$post."' ORDER BY outsrouce.resign ASC,outsrouce.dep_co_id ASC ");

       while($user = $get_user->fetch_assoc()){
           $result[] = $user;
       }

       if(!empty($result)){

           return $result;
       }


   }

    //function เรื่ยกดูข้อมูลแผนกในบริษัท เพิ่มช้อมูลสมาชิก

    public function get_dep_in_companny($post = null){

       $db = $this->connect();
       $get_user = $db->query("SELECT * FROM department WHERE co_id = '".$post."'");

       while($user = $get_user->fetch_assoc()){
           $result[] = $user;
       }

       if(!empty($result)){

           return $result;
       }


   }

   public function add_outsrouce($data){

     $db = $this->connect();

     $add_user = $db->prepare("INSERT INTO outsrouce (oc_name,start,co_id,tel,dep_co_id) VALUES(?,?,?,?,?) ");

     $add_user->bind_param("sssss",$data['add_outsrouce'],$data['start'],$data['companny'],$data['telephone'],$data['depeartment']);

     if(!$add_user->execute()){

         echo "2";

     }else{

         echo "1";
     }
 }
// นับลาต่างๆ
 public function coutn_sick($user_id,$first_day_of_month,$last_day_of_month){

       $db = $this->connect();
       $get_user = $db->prepare("SELECT (
      SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
      WHERE status_oc.oc_id=? AND ty_id ='1' AND date >=? AND date <=?) AS total_late,
      (
      SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
      WHERE status_oc.oc_id=? AND ty_id ='2' AND date >=? AND date <=?
    ) AS total_forget,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='3' AND date >=? AND date <=?
      ) AS total_exit,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='4' AND date >=? AND date <=?
      ) AS total_kad,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='5' AND date >=? AND date <=?
      ) AS total_sickno,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='6' AND date >=? AND date <=?
      ) AS total_sickhave,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='7' AND date >=? AND date <=?
      ) AS total_sickwork,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='8' AND date >=? AND date <=?
      ) AS total_kit,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='9' AND date >=? AND date <=?
      ) AS total_kitno,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='10' AND date >=? AND date <=?
      ) AS total_kitex,
      (
        SELECT COUNT(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
        WHERE status_oc.oc_id=? AND ty_id ='11' AND date >=? AND date <=?
      ) AS total_etc




      ");
       $get_user->bind_param("issississississississississississ",$user_id,$first_day_of_month,$last_day_of_month,$user_id,$first_day_of_month,$last_day_of_month,
     $user_id,$first_day_of_month,$last_day_of_month,$user_id,$first_day_of_month,$last_day_of_month,$user_id,$first_day_of_month,$last_day_of_month,
   $user_id,$first_day_of_month,$last_day_of_month,$user_id,$first_day_of_month,$last_day_of_month,$user_id,$first_day_of_month,$last_day_of_month,
 $user_id,$first_day_of_month,$last_day_of_month,$user_id,$first_day_of_month,$last_day_of_month,$user_id,$first_day_of_month,$last_day_of_month);
       $get_user->execute();
       $get_user->bind_result($late,$forget,$exit,$kad,$sickno,$sickhave,$sickwork,$kit,$kitno,$kitex,$etc);
       $get_user->fetch();
       $result = array(
            'count_late'=>$late,
            'count_forget'=>$forget,
            'count_exit'=>$exit,
            'count_kad'=>$kad,
            'coutn_sickno'=>$sickno,
            'count_sickhave' =>$sickhave,
            'count_sickwork' =>$sickwork,
            'count_kit' =>$kit,
            'count_kitno' =>$kitno,
            'count_kitex' =>$kitex,
            'count_etc' =>$etc,


        );
         return $result;

   }




               public function get_oc($user_id){

                      $db = $this->connect();
                      $get_user = $db->prepare("SELECT outsrouce.oc_id,outsrouce.oc_name FROM outsrouce WHERE outsrouce.oc_id = ?");
                      $get_user->bind_param('i',$user_id);
                      $get_user->execute();
                      $get_user->bind_result($oc_id,$oc_name);
                      $get_user->fetch();

                      $result = array(
                          'id'=>$oc_id,
                          'name'=>$oc_name

                      );

                      return $result;
                  }

                  public function coutn_vacation($user_id,$first_day_of_month,$last_day_of_month){

                        $db = $this->connect();
                        $get_user = $db->prepare("SELECT Sum(sum_oc.day_n) FROM status_oc INNER JOIN sum_oc ON status_oc.sum_id = sum_oc.sum_id
                                                  WHERE status_oc.oc_id=? AND ty_id ='12' AND date >=? AND date <=?");
                        $get_user->bind_param("iss",$user_id,$first_day_of_month,$last_day_of_month);
                        $get_user->execute();
                        $get_user->bind_result($id);
                        $get_user->fetch();
                        $result = array(
                             'coutn_vacation'=>$id,

                         );
                          return $result;

                    }




}
?>
