
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
                    <h1 class="page-header">การลา</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


                <br>

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ข้อมูลสมาชิก
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body ">
                                  <table width="100%" class="table table-striped  table-hover table-responsive " >
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align:center">ชื่อ - นามสกุล</th>
                                        <th rowspan="2" style="text-align:center">แผนก</th>
                                        <th rowspan="2" style="text-align:center">วันเริ่มงาน</th>
                                        <th rowspan="2" style="text-align:center">จำนวนวันทำงาน</th>
                                        <th colspan="6" style="text-align:center">
                    <div class="form-group">
                          <label class="col-md-4 control-label" for="fn">เดือน</label>
                          <div class="col-md-6">
                               <select class="form-control" id="month">
                                                <option value="1">มกราคม</option>
                                                <option value="2">กุมภาพันธ์</option>
                                                <option value="3">มีนาคม</option>
                                                <option value="4">เมษายน</option>
                                                <option value="5">พฤษภาคม</option>
                                                <option value="6">มิถุนายน</option>
                                                <option value="7">กรกฎาคม</option>
                                                <option value="8">สิงหาคม </option>
                                                <option value="9">กันยายน</option>
                                                <option value="10">ตุลาคม</option>
                                                <option value="11">พฤศจิกายน</option>
                                                <option value="12">ธันวาคม</option>
                              </select>

                          </div>
                      </div>


                                        </th>

                                        <th rowspan="2">เมนู</th>


                                    </tr>
                                    <tr>
                                        <th>สาย</th>
                                        <th>ขาด</th>
                                        <th>ลาป่วย</th>
                                        <th>ลากิจ</th>
                                        <th>ลากิจพิเศษ</th>
                                        <th>ลาอื่น</th>



                                    </tr>
                                </thead>
                              <div id="tar">
                                <tbody id="test">
                               </div>


                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
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
                         <option value="5"> ลากิจพิเศษ </option>
                         <option value="6"> ลาอื่น </option>


                    </select>

                        </div>
                    </div>
</form>



<!-- ########################### สาย #######################################-->
<div id="1" class="colors" style="display:none">
  <form class="form-horizontal" id="data_save" onsubmit="return save_data();">
    <input type="hidden" name="late" value="7">
    <div id="data_form"></div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date"  type="date"  class="form-control input-md" required="">

           </div>
    </div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">เวลา</label>
          <div class="col-md-4">
                    <input name="time" type="time" placeholder="Firstname" class="form-control input-md" required="">

           </div>
    </div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
          <div class="col-md-6">
                   <textarea class="form-control  input-md" rows="3" name="comment" ></textarea>

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
  <form class="form-horizontal" id="data_save2" onsubmit="return save_data2();">
     <div id="data_form2"></div>
    <input type="hidden" name="absence" value="1">
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date2" id="date_absence1"  type="date"  class="form-control input-md" required="">

           </div>

          <div class="col-md-4">

                    <input id="date_absence2"  type="date"  class="form-control input-md" >
                    <span id="alert"></span>
           </div>

    </div>
    <input type="hidden" name="rank" id="rank2">

    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
          <div class="col-md-6">
                   <textarea class="form-control  input-md" rows="3" name="comment2"></textarea>

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
   <form class="form-horizontal" id="data_save3" onsubmit="return save_data3();">
      <div id="data_form3"></div>
      <input type="hidden" name="sick" value="2">
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date3" id="date_sick1"  type="date"  class="form-control input-md" required="">


           </div>
               <div class="col-md-4">

                    <input id="date_sick2"  type="date"  class="form-control input-md" >
                      <span id="alert2"></span>
           </div>

    </div>
       <input type="hidden" name="rank3" id="rank3">
      <div class="form-group">
                      <label class="col-md-4 control-label" for="fn">วัน</label>
                      <div class="col-md-4">
                  <input type="radio" required name="day3" value="0.5" >ครึ่งวัน
                  <input type="radio" required name="day3" value="1" >เต็มวัน
              </div>
            </div>

    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
          <div class="col-md-6">
                   <textarea class="form-control  input-md" rows="3" name="comment3"></textarea>

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
  <form class="form-horizontal" id="data_save4" onsubmit="return save_data4();">
      <div id="data_form4"></div>
    <input type="hidden" name="errand" value="3">
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date4" id="date_errand1"  type="date"  class="form-control input-md" required="">

           </div>
          <div class="col-md-4">

                    <input id="date_errand2"  type="date"  class="form-control input-md" >
                      <span id="alert3"></span>
           </div>
    </div>

     <input type="hidden" name="rank4" id="rank4">
      <div class="form-group">
                      <label class="col-md-4 control-label" for="fn">วัน</label>
                      <div class="col-md-4">
                  <input type="radio" required name="day4" value="0.5" >ครึ่งวัน
                  <input type="radio" required name="day4" value="1" >เต็มวัน
              </div>
            </div>

    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
          <div class="col-md-6">
                   <textarea class="form-control  input-md" rows="3" name="comment4"></textarea>

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
<div id="5" class="colors" style="display:none">
      <form class="form-horizontal" id="data_save5" onsubmit="return save_data5();">
          <div id="data_form5"></div>
        <input type="hidden" name="Exerrand" value="6">
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date5" id="date_Exerrand1"  type="date"  class="form-control input-md" required="">

           </div>
            <div class="col-md-4">
             <input id="date_Exerrand2"  type="date"  class="form-control input-md" >
                      <span id="alert4"></span>
           </div>
    </div>
    <input type="hidden" name="rank5" id="rank5">
      <div class="form-group">
                      <label class="col-md-4 control-label" for="fn">วัน</label>
                      <div class="col-md-4">
                  <input type="radio" required name="day5" value="0.5" >ครึ่งวัน
                  <input type="radio" required name="day5" value="1" >เต็มวัน
              </div>
            </div>

    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
          <div class="col-md-6">
                   <textarea class="form-control  input-md" rows="3" name="comment5"></textarea>

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
    <form class="form-horizontal" id="data_save6" onsubmit="return save_data6();">
      <div id="data_form6"></div>
      <input type="hidden" name="ext" value="4">
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date6" id="date_ext1"   type="date"  class="form-control input-md" required="">

           </div>
            <div class="col-md-4">
           <input id="date_ext2"  type="date"  class="form-control input-md" >
                      <span id="alert5"></span>
           </div>
    </div>
      <div class="form-group">
                      <label class="col-md-4 control-label" for="fn">วัน</label>
                      <div class="col-md-4">
                  <input type="radio" required name="day6" value="0.5" >ครึ่งวัน
                  <input type="radio" required name="day6" value="1" >เต็มวัน
              </div>
            </div>
      <input type="hidden" name="rank6" id="rank6">

    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
          <div class="col-md-6">
                   <textarea class="form-control  input-md" rows="3" name="comment6"></textarea>

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

         <div class="modal fade" id="show_attendent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ข้อมูลการลางาน</h4>
              </div>
              <div class="modal-body">

                <div id="attendent_from"></div>





              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

</body>


</html>
