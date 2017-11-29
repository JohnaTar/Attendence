
<!DOCTYPE html>
<html lang="en">

<head>
        <?php include('head.php'); ?>

</head>

<body>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include('nav.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข้อมูลบริษัท</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="row">
                    <div class="col-md-2">

                         <button class="btn btn-warning" data-toggle="modal" data-target="#add_companny"><i class="fa fa-upload" aria-hidden="true"></i></button>
                    </div>


                </div>


                <hr>
            <div class="row">
                <div class="col-md-12">

                        <!-- /.panel-heading -->

                        <table width="100%" class="table table-striped" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อบริษัท</th>

                                    <th>ตัดรอบปี</th>
                                    <th>เมนู</th>


                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                include 'companny.pdo.php';
                                  $db = new companny();
                                  $get_companny = $db->get_all_companny();
                                  $i=1;
                                  if (!empty($get_companny)) {
                                      foreach($get_companny as $companny){
                                      echo '<tr class="odd gradeX">
                                          <td>'.$i.'</td>
                                          <td>'.$companny['co_name'].'</td>

                                          <td class="center">'.$companny['first_y'].' : '.$companny['last_y'].'</td>
                                          <td>'.$companny['co_id'].'</td>

                                      </tr>';
                                      $i++;
                                      }
                                  }

                               ?>


                            </tbody>
                        </table>



                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


            <!-- /.row -->


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
     <!-- Modal Add User -->


        <!-- Modal Edit User -->
        <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มวันพักร้อน</h4>
              </div>
              <div class="modal-body">
                         <div id="add_form"></div>
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

           <!-- Modal Add User -->
        <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูล</h4>
              </div>
              <div class="modal-body">
                   <form class="form-horizontal" id="add_outsrouce_form" onsubmit="return add_outsrouce_form();">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">ชื่อ นามสกุล</label>
                        <div class="col-md-6">
                    <input type="text" required="" class="form-control input-md"  value="" name="add_outsrouce">



                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">เบอร์โทร</label>
                        <div class="col-md-6">
                    <input type="text" required="" class="form-control input-md"  value="" name="telephone">



                        </div>
                    </div>

                         <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic">บริษัท</label>
                        <div class="col-md-6">
                    <select  id="show_dep" name="companny" class="form-control input-md" required="">
                      <?php
                          if (!empty($get_companny)) {
                              foreach($get_companny as $companny){
                              echo '  <option value='.$companny['co_id'].'> '.$companny['co_name'].' </option>';
                              }
                          }
                      ?>>

                    </select>

                        </div>
                    </div>
                    <div id="show_dep_in_com"></div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">วันเริ่มงาน</label>
                        <div class="col-md-4">
                    <input name="start" type="date" placeholder="Firstname" class="form-control input-md" required="">

                        </div>
                    </div>



            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                </div>
            </div>





</form>


              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


            <!-- เพิ่มบริษัท -->

            <div class="modal fade" id="add_companny" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลบริษัท</h4>
                  </div>
                  <div class="modal-body">
                       <form class="form-horizontal" action="tar.php" method="POST">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fn">ชื่อบริษัท</label>
                            <div class="col-md-6">
                        <input type="text" required="" class="form-control input-md"  value="" name="add_companny">



                            </div>
                        </div>
                      <div class="input_fields_wrap">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fn">แผนก</label>
                            <div class="col-md-6">
                        <input type="text" required="" class="form-control input-md"  value="" name="mytext[]"> <button class="add_field_button">Add More Fields</button>
                            </div>


                          </div>
                      </div>




                             <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">ตัดรอบเดือน</label>
                            <div class="col-md-6">
                        <select  name="dep" class="form-control input-md" required="">
                            <option value="">  </option>
                             <option value="1"> </option>
                             <option value="2"> ฝ่ายสารสนเทศ </option>
                             <option value="3"> PA & Marketing </option>
                             <option value="4"> ฝ่ายบัญชีและการเงิน </option>
                             <option value="5"> ฝ่ายบุคคลและธุรการ </option>
                             <option value="6"> Staff & Labor Outsourcing BKK </option>
                             <option value="7"> Staff & Labor Outsourcing CHON </option>
                             <option value="8"> Staff & Labor Outsourcing PTY </option>

                        </select>

                            </div>
                        </div>

                        <div class="form-group">
                       <label class="col-md-4 control-label" for="selectbasic">ตัดรอบปี</label>
                       <div class="col-md-6">
                   <select  name="dep" class="form-control input-md" required="">
                       <option value="">  </option>
                        <option value="1"> ฝ่ายบริหาร </option>
                        <option value="2"> ฝ่ายสารสนเทศ </option>
                        <option value="3"> PA & Marketing </option>
                        <option value="4"> ฝ่ายบัญชีและการเงิน </option>
                        <option value="5"> ฝ่ายบุคคลและธุรการ </option>
                        <option value="6"> Staff & Labor Outsourcing BKK </option>
                        <option value="7"> Staff & Labor Outsourcing CHON </option>
                        <option value="8"> Staff & Labor Outsourcing PTY </option>

                   </select>

                       </div>
                   </div>





                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                    </div>
                </div>





    </form>


                  </div>
                  <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>





</body>

</html>
