
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

                    </div>
                    <div class="col-md-10">
                        <form class="form-horizontal" onsubmit="return show_user_in_companny();" id="data_show_user_in_companny">
                         <div class="form-group">
                        <label class="col-md-1 control-label" for="selectbasic">บริษัท</label>
                        <div class="col-md-4">

                  <?php
                        include 'connect_pdo.php';
                        $db = new Outsource();
                        $get_companny = $db->get_all_companny();

                   ?>

                    <select name="co_id" class="form-control input-md" required="">
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
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="fn">เดือน</label>
                        <div class="col-md-4">
                           <input name="date" id="mdp-demos"  type="text"   class="form-control input-md" required="">


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="submit"></label>
                        <div class="col-md-4">
                    <button  type="submit" class="btn btn-success" >  <i class="fas fa-spinner fa-spin"></i></button>
                        </div>
                    </div>



</form>
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


<script>
$("#mdp-demos").multiDatesPicker({
                      dateFormat: "d-m-yy",
                       showButtonPanel: true,
                       changeMonth: true,
                       changeYear: true,
                       maxPicks: 2,
                        onSelect: function(dateText, inst)
                   { inst.settings.defaultDate = dateText; },
                   onSelect: function(dateText, inst) {


                          }
                         });
</script>
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
<form class="form-horizontal" id="data_save_oc_late" onsubmit="return save_data_oc_late();">
<input type="hidden" name="late" value="1" >
<div id="oc_name_late"></div>
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
<form class="form-horizontal" id="data_save_oc_kad" onsubmit="return save_data_oc_kad();">
<div id="oc_name_absence"></div>
<input type="hidden" name="absence" id="likeamp" >
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
<form class="form-horizontal" id="data_save_oc_forget" onsubmit="return save_data_oc_forget();">
<input type="hidden" name="forget" value="2" id="">
<div id="oc_name_forget"></div>
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
<form class="form-horizontal" id="data_save_oc_exit" onsubmit="return save_data_oc_exit();">
<input type="hidden" name="exit" value="3" >
<div id="oc_name_exit"></div>
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
