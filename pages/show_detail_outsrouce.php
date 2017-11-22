<?php
include 'show_more_detail_outsrouce_pdo.php';
$process = new data_outsrouce();

  if (isset($_POST['data'])) {
    $oc_id =$_POST['data'][0];
    $first_day_of_month =$_POST['data'][1]; //วันที่ 1
    $last_day_of_month = date('Y-m-t',strtotime($first_day_of_month)); //วันสุดท้าย

$data =$process->show_vacation_all($oc_id);

echo '      <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>'.$data['oc_name'].'</th>
                                            <th>'.$data['co_name'].'</th>
                                            <th>'.$data['dep_co_name'].'</th>
                                            <th></th>
                                            <th></th>
                                         </tr>
                                      </thead>
                                     <tbody>';
            $while_data=$process->while_data($oc_id,$first_day_of_month,$last_day_of_month);
                  if (!empty($while_data)) {
                          foreach ($while_data as $while_datas) {
                               echo '  <tr>
                                            <td>'.$while_datas['ty_n'].'</td>
                                            <td>'.date('d/m/Y',strtotime($while_datas['date'])).'</td>
                                            <td>'.$while_datas['day_n'].'</td>
                                            <td>'.$while_datas['comment'].'</td>
                                            <td><button  class="btn btn-danger btn-xs"   onclick="return delete_vacation_oc('.$while_datas['sum_id'].')"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                       </tr>

                                       <input type="hidden" id="tar" value="'.$while_datas['oc_id'].'" >' ;
                              }


                        }

                        echo ' </tbody>
                       </table>';


echo $_POST['data'][2].$_POST['data'][3];

}


  if (isset($_POST['sum_id'])) {
      $process->delete_sum_id($_POST['sum_id']);
  }
?>
