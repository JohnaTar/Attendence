
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




                                  <table width="50%" class="table  table-striped table-responsive"  >
                                <thead>
                                    <tr>
                                        <th rowspan="3">ชื่อ - นามสกุล</th>
                                        <th rowspan="3">แผนก</th>

                                        <th colspan="11 " style="text-align:center">
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

                                        <th rowspan="3" width="80">เมนู</th>


                                    </tr>
                                    <tr style="text-align:center">
                                        <th colspan="4"></th>
                                        <th style="text-align:center">ลาป่วย</th>
                                        <th style="text-align:center">ลาป่วย</th>
                                        <th style="text-align:center">ลาป่วย</th>
                                        <th style="text-align:center">ลากิจ</th>
                                        <th style="text-align:center">ลากิจ</th>
                                        <th style="text-align:center">ลากิจพิเศษ</th>
                                        <th></th>

                                    </tr>
                                    <tr>
                                      <th>สาย</th>
                                      <th>ลืมสแกน</th>
                                      <th>ออกก่อน</th>
                                      <th>ขาดงาน</th>

                                        <th style="text-align:center"><sup>ไม่มีใบรับรองแพทย์</sup></th>
                                        <th style="text-align:center"><sup>มีใบรับรองแพทย</sup></th>
                                        <th style="text-align:center"><sup>จากการทำงาน</sup></th>
                                        <th style="text-align:center"><sup>ได้ค่าจ้าง</sup></th>
                                        <th style="text-align:center"><sup>ไม่ได้ค่าจ้าง</sup></th>
                                        <th style="text-align:center"><sup>ได้ค่าจ้าง</sup></th>



                                        <th>ลาอื่น</th>



                                    </tr>

                                </thead>
                              <div id="tar">
                                <tbody id="test">
                               </div>


                                </tbody>
                            </table>
                            <!-- /.table-responsive -->


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
                        <div class="col-md-6">
                    <select  name="type" id="type" class="form-control input-md" required="">
                        <option value="">  </option>
                         <option value="1"> สาย </option>
                         <option value="2"> ลืมสแกน </option>
                         <option value="3"> ออกก่อน </option>
                         <option value="4"> ขาดงาน </option>
                         <option value="5"> ลาป่วย (ไม่มีใบรับรองแพทย์) </option>
                         <option value="6"> ลาป่วย (มีใบรับรองแพทย์) </option>
                         <option value="7"> ลาป่วย (จากการทำงาน) </option>
                         <option value="8"> ลากิจ (ได้ค่าจ้าง) </option>
                         <option value="9"> ลากิจ (ไม่ได้ค่าจ้าง) </option>
                         <option value="10"> ลากิจพิเศษ (ได้ค่าจ้าง) </option>
                         <option value="11"> ลาอื่น </option>







                    </select>

                        </div>
                    </div>
</form>



<!-- ########################### สาย #######################################-->
<div id="1" class="colors" style="display:none">
  <form class="form-horizontal" id="data_save" onsubmit="return save_data();">
    <input type="hidden" name="late" value="1" >
    <div id="data_form"></div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date"  id="datepicker"  class="form-control input-md" required="">

           </div>
    </div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">เวลา</label>
          <div class="col-md-4">
                    <input name="time" type="text" placeholder="นาที" class="form-control input-md" required="">

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
    <input type="text" name="absence" id="likeamp" >
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-6">
                    <input name="date" id="mdp-demo"  type="text"   class="form-control input-md" required="">
           </div>
    </div>
<div id="number_of_date">
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">จำนวน</label>
      <div class="col-md-4">
  <select  name="number" id="day"  class="form-control input-md" >

       <option value="1"> เต็มวัน </option>
       <option value="0.5"> ครึ่งวัน </option>
       <option value="3"> นาที </option>

  </select>

      </div>
  </div>
</div>
<div id="field_minute" style="display:none">
<div class="form-group">
      <label class="col-md-4 control-label" for="fn">นาที</label>
      <div class="col-md-6">
                <input name="minute" id="minute" type="text"   class="form-control input-md" >
       </div>
</div>
</div>

    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">หมายเหตุ</label>
          <div class="col-md-6">
                   <textarea class="form-control  input-md" rows="3" name="comment"></textarea>

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
<!-- ลืมสแกน -->
<div id="3" class="colors" style="display:none">
  <form class="form-horizontal" id="data_save3" onsubmit="return save_data3();">
    <input type="hidden" name="forget" value="2" id="">
    <div id="data_form3"></div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date"  id="datepicker2"  class="form-control input-md" required="">

           </div>
    </div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">เวลา</label>
          <div class="col-md-4">
            <select  name="number"  class="form-control input-md" >

                 <option value="1"> เข้า </option>
                 <option value="2"> ออก </option>


            </select>

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



<!-- ออกก่อน -->

<div id="4" class="colors" style="display:none">
  <form class="form-horizontal" id="data_save4" onsubmit="return save_data4();">
    <input type="hidden" name="exit" value="3" >
    <div id="data_form4"></div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">วันที่</label>
          <div class="col-md-4">
                    <input name="date"  id="datepicker3"  class="form-control input-md" required="">

           </div>
    </div>
    <div class="form-group">
          <label class="col-md-4 control-label" for="fn">เวลา</label>
          <div class="col-md-4">
                    <input name="time" type="text" placeholder="นาที" class="form-control input-md" required="">

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








              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
<!-- ลืมสแกน -->














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

<script>
  $('#mdp-demo').multiDatesPicker({
	     dateFormat: "d-m-yy",
       showButtonPanel: true,
       changeMonth: true,
       changeYear: true,
       onSelect: function(dateText, inst)
   { inst.settings.defaultDate = dateText; },

   onSelect: function(dateText, inst) {
            var tar = $('#mdp-demo').multiDatesPicker('getDates').length;

            if (tar <= 1) {
                 $("#number_of_date").show();

            }else{
               $("#number_of_date").hide();
               $("#day").val('');
               $("#field_minute").hide();
               $("#minute").val('');

            }
        }},
);



</script>
</html>
