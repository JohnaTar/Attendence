
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
                    <h1 class="page-header">พนักงานเอาท์ซอร์ส</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-info" data-toggle="modal" data-target="#add_user"><i class="fa fa-user-plus " aria-hidden="true"></i></button>
                        <button class="btn btn-info" data-toggle="modal" data-target="#loading"><i class="fa fa-user-plus " aria-hidden="true"></i></button>

                    </div>
                    <div class="col-md-10">

                         <div class="form-group">
                        <label class="col-md-1 control-label" for="selectbasic">บริษัท</label>
                        <div class="col-md-4">

                  <?php
                        include 'connect_pdo.php';
                        $db = new Outsource();
                        $get_companny = $db->get_all_companny();

                   ?>

                    <select  id="co_id" class="form-control input-md" required="">
                    <?php
                        if (!empty($get_companny)) {
                            foreach($get_companny as $companny){
                            echo '  <option value='.$companny['co_id'].'> '.$companny['co_name'].' </option>';
                            }
                        }
                    ?>

                    </select>

                        </div>
                    </div>

                  </div>

                </div>


                <hr>
            <div class="row">
                <div class="col-md-12">

                        <!-- /.panel-heading -->

                            <div id="companny"></div>




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


    <div class="modal fade" id="add_vacation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูล</h4>
                  </div>
                  <div class="modal-body">
                        <form class="form-horizontal">

                          <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">ประเภท</label>
                            <div class="col-md-4">
                        <select  name="type" id="type" class="form-control input-md" required="">
                            <option value="">  </option>
                             <option value="1"> สาย </option>
                             <option value="2"> ขาด </option>
                             <option value="3"> ลาป่วย </option>
                             <option value="4"> ลากิจ </option>
                             <option value="5"> ลาผิดระเบียบ </option>
                             <option value="6"> พักร้อน </option>





                        </select>

                            </div>
                        </div>
                    </form>
                    <!-- ########################### สาย #######################################-->
                    <div id="1" class="colors" style="display:none">
                        <form class="form-horizontal" id="data_save_oc_late" onsubmit="return save_data_oc_late();">
                        <input type="hidden" name="late" value="7">
                        <input type="hidden" name="date_of_late2" id="rank2">
                        <div id="oc_name_late"></div>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">วันที่</label>
                              <div class="col-md-4">
                                        <input name="date_of_late" id="date_absence1"  type="date"  class="form-control input-md" required="">

                               </div>

                              <div class="col-md-4">

                                        <input id="date_absence2"  type="date"  class="form-control input-md" >
                                        <span id="alert"></span>
                               </div>

                        </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
                              <div class="col-md-6">
                                       <textarea class="form-control  input-md" rows="3" name="comment_late" ></textarea>

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
                    <!-- ########################### ขาด #######################################-->
                    <div id="2" class="colors" style="display:none">
                      <form class="form-horizontal" id="data_save_oc_absence" onsubmit="return save_data_oc_absence();">
                         <div id="oc_name_absence"></div>
                        <input type="hidden" name="absence" value="1">



                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">วันที่</label>
                              <div class="col-md-4">
                                        <input name="date_of_absence"  type="date"  class="form-control input-md" required="">


                               </div>


                        </div>

                          <div class="form-group">
                                          <label class="col-md-4 control-label" for="fn">จำนวน</label>
                                          <div class="col-md-4">
                                      <input type="text" required name="number_of_absence" class="form-control input-md"  >

                                </div>
                          </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
                              <div class="col-md-6">
                                       <textarea class="form-control  input-md" rows="3" name="comment_absence"></textarea>

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
                    <!-- ########################### ลาป่วย #######################################-->
                    <div id="3" class="colors" style="display:none">
                       <form class="form-horizontal" id="data_save_oc_sick" onsubmit="return save_data_oc_sick();">
                          <div id="oc_name_sick"></div>
                          <input type="hidden" name="sick" value="2">
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">วันที่</label>
                              <div class="col-md-4">
                                        <input name="date_of_sick" id="date_sick1"  type="date"  class="form-control input-md" required="">


                               </div>
                                   <div class="col-md-4">

                                        <input id="date_sick2"  type="date"  class="form-control input-md" >
                                          <span id="alert2"></span>
                               </div>

                        </div>
                           <input type="hidden" name="date_of_sick2" id="rank3">
                          <div class="form-group">
                                          <label class="col-md-4 control-label" for="fn">จำนวน</label>
                                          <div class="col-md-4">
                                      <input type="text" required name="number_of_sick" class="form-control input-md"  >

                                </div>
                          </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
                              <div class="col-md-6">
                                       <textarea class="form-control  input-md" rows="3" name="comment_sick"></textarea>

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
                    <!-- ########################### ลากิจ #######################################-->
                    <div id="4" class="colors" style="display:none">
                      <form class="form-horizontal" id="data_save_oc_errand" onsubmit="return save_data_oc_errand();">
                          <div id="oc_name_lakit"></div>
                        <input type="hidden" name="errand" value="3">
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">วันที่</label>
                              <div class="col-md-4">
                                        <input name="date_of_errand" id="date_errand1"  type="date"  class="form-control input-md" required="">

                               </div>
                              <div class="col-md-4">

                                        <input id="date_errand2"  type="date"  class="form-control input-md" >
                                          <span id="alert3"></span>
                               </div>
                        </div>

                         <input type="hidden" name="date_of_errand2" id="rank4">
                         <div class="form-group">
                                         <label class="col-md-4 control-label" for="fn">จำนวน</label>
                                         <div class="col-md-4">
                                     <input type="text" required name="number_of_errand" class="form-control input-md"  >

                               </div>
                         </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
                              <div class="col-md-6">
                                       <textarea class="form-control  input-md" rows="3" name="comment_errend"></textarea>

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
                    <!-- ########################### ลาผิดระเบียบ #######################################-->
                    <div id="5" class="colors" style="display:none">
                          <form class="form-horizontal" id="data_save_oc_wrong" onsubmit="return save_data_oc_wrong();">
                              <div id="oc_name_wrong"></div>
                            <input type="hidden" name="wrong" value="8">
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">วันที่</label>
                              <div class="col-md-4">
                                        <input name="date_of_wrong" id="date_Exerrand1"  type="date"  class="form-control input-md" required="">

                               </div>
                                <div class="col-md-4">
                                 <input id="date_Exerrand2"  type="date"  class="form-control input-md" >
                                          <span id="alert4"></span>
                               </div>
                        </div>
                        <input type="hidden" name="date_of_wrong2" id="rank5">
                        <div class="form-group">
                                        <label class="col-md-4 control-label" for="fn">จำนวน</label>
                                        <div class="col-md-4">
                                    <input type="text" required name="number_of_wrong" class="form-control input-md"  >

                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
                              <div class="col-md-6">
                                       <textarea class="form-control  input-md" rows="3" name="comment_wrong"></textarea>

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

                    <div id="6" class="colors" style="display:none">
                          <form class="form-horizontal" id="data_save_oc_vacation" onsubmit="return save_data_oc_vacation();">
                              <div id="oc_name_vacation"></div>
                            <input type="hidden" name="vacation" value="5">
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">วันที่</label>
                              <div class="col-md-4">
                                        <input name="date_of_vacation" id="date_ext1"  type="date"  class="form-control input-md" required="">

                               </div>
                                <div class="col-md-4">
                                 <input id="date_ext2"  type="date"  class="form-control input-md" >
                                          <span id="alert5"></span>
                               </div>
                        </div>
                        <input type="hidden" name="date_of_vacation2" id="rank6">
                        <div class="form-group">
                                        <label class="col-md-4 control-label" for="fn">จำนวน</label>
                                        <div class="col-md-4">
                                    <input type="text" required name="number_of_vacation" class="form-control input-md"  >

                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
                              <div class="col-md-6">
                                       <textarea class="form-control  input-md" rows="3" name="comment_vacation"></textarea>

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

               <!-- Modal more detail -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                      <div id='detail_oc'></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal more detail -->
         <div class="modal fade" id="loading" role="dialog">
             <div class="modal-dialog modal-sm">
               <div class="modal-content">
                 <div class="modal-header">
                  
                   <h4 class="modal-title"></h4>
                 </div>
                 <div class="modal-body">
                   <div class="row ">

                        <div class="col-md-12 text-center ">
                          <h3>Loading... </h3>
    <div class="progress progress-striped active page-progress-bar">
        <div class="progress-bar" style="width: 100%;"></div>
    </div>
                        </div>


                 </div>

               </div>
             </div>
           </div>
         </div>




</body>

</html>
