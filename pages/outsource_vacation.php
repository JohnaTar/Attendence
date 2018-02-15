
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
                    <h1 class="page-header">ลาพักร้อน : พนักงานเอาท์ซอร์ส</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-info" data-toggle="modal" data-target="#add_user"><i class="fa fa-user-plus " aria-hidden="true"></i></button>

                    </div>
                    <div class="col-md-10">
                        <form class="form-horizontal" onsubmit="return show_user_in_compannys();" id="data_show_user_in_compannys">
                         <div class="form-group">
                        <label class="col-md-2 control-label" for="selectbasic">บริษัท</label>
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
                        <label class="col-md-2 control-label" for="fn">ตัดรอบปี</label>
                        <div class="col-md-4">
                           <input name="date" id="mdp-demos"  type="text"   class="form-control input-md" required="">


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="submit"></label>
                        <div class="col-md-4">
                    <button  type="submit" class="btn btn-warning" >  <i class="fas fa-spinner fa-spin"></i></button>
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
                      <div id='detail_oc_s'></div>
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


         <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มวันพักร้อน</h4>
               </div>
               <div class="modal-body">
                          <div id="add_data_form_vacation_oc"></div>
               </div>
               <div class="modal-footer">

                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

<script>
function show_user_in_compannys(){
    $.ajax({
        type:"POST",
        url:"attendent_outs.php",
        data:$("#data_show_user_in_compannys").serialize(),
        xhr: function () {  // Custom XMLHttpRequest
                               var myXhr = $.ajaxSettings.xhr();
                               if (myXhr.upload) { // Check if upload property exists
                                   myXhr.upload.addEventListener('progress', function (e) { progressHandlingFunction(e) }, false);
                                   myXhr.upload.addEventListener('load', loadedHandlingFunction, false);
                               }
                               return myXhr;
                           },

        success:function(data){
            $("#companny").html(data);
            $('#dataTables-example').DataTable({
                              responsive: true,
                              "bSort": false,
                              "pageLength": 100,
                              "bLengthChange": false,
                          });

            $('#loading').modal('toggle');

        }
    });
    var progressHandlingFunction = function (e) {
                    // What happens when it loading the ajax request.
                    // Here put a sweet-alert with 'loading' icon (gif or any kind) using this parameter: 'imageUrl' that will replace the icon..
                    $('#loading').modal('show');
                };

                var loadedHandlingFunction = function () {
                    // What happens when it finished loading the request...
                    // Here put a sweet-alert with 'success' with any message you like on completion.
                }
    return false;
}


function add_vacation_oc(id){


    $.ajax({
        type:"POST",
        url:"attendent_outs.php",
        data:{show_user_id:id},
        success:function(data){
            $("#add_data_form_vacation_oc").html(data);
        }
    });
    return false;
}


function save_vacation_oc(){
    $.ajax({
        type:"POST",
        url:"attendent_outs.php",
        data:$("#edit_user_form_oc").serialize(),
        success:function(data){

            //close modal
            $(".close").trigger("click");

            //show result

            if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"})
                 .then(function() {

                });
                $.ajax({
                    type:"POST",
                    url:"attendent_outs.php",
                    data:$("#data_show_user_in_compannys").serialize(),
                    xhr: function () {  // Custom XMLHttpRequest
                                           var myXhr = $.ajaxSettings.xhr();
                                           if (myXhr.upload) { // Check if upload property exists
                                               myXhr.upload.addEventListener('progress', function (e) { progressHandlingFunction(e) }, false);
                                               myXhr.upload.addEventListener('load', loadedHandlingFunction, false);
                                           }
                                           return myXhr;
                                       },

                    success:function(data){
                        $("#companny").html(data);
                        $('#dataTables-example').DataTable({
                                          responsive: true,
                                          "bSort": false,
                                          "pageLength": 100,
                                          "bLengthChange": false,
                                      });

                        $('#loading').modal('toggle');

                    }
                });
                var progressHandlingFunction = function (e) {
                                // What happens when it loading the ajax request.
                                // Here put a sweet-alert with 'loading' icon (gif or any kind) using this parameter: 'imageUrl' that will replace the icon..
                                $('#loading').modal('show');
                            };

                            var loadedHandlingFunction = function () {
                                // What happens when it finished loading the request...
                                // Here put a sweet-alert with 'success' with any message you like on completion.
                            }



            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"})
                 .then(function() {

                });
            }
        }
    });
    return false;
}

</script>
