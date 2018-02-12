
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

            <!-- เพิ่มบริษัท -->

            <div class="modal fade" id="add_companny" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลบริษัท</h4>
                  </div>
                  <div class="modal-body">
                       <form class="form-horizontal" id="add_data_companny" onsubmit="return save_add_data_companny();">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fn">ชื่อบริษัท</label>
                            <div class="col-md-6">
                        <input type="text" required="" class="form-control input-md"   name="add_companny">



                            </div>
                        </div>
                      <div class="input_fields_wrap">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fn">แผนก</label>
                            <div class="col-md-6">
                        <input type="text" required="" class="form-control input-md"  value="" name="dep[]"> <button class="add_field_button">Add More Fields</button>
                            </div>


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


<script>
              $('#mdp-demo').multiDatesPicker({
            	     dateFormat: "d-mm",
                   showButtonPanel: true,
                   changeMonth: true,
                   changeYear: true,
                   maxPicks: 2,
                   onSelect: function(dateText, inst)
               { inst.settings.defaultDate = dateText;


                    }},
            );

            $('#mdp-demo2').multiDatesPicker({
                 dateFormat: "d-m-yy",
                 showButtonPanel: true,
                 changeMonth: true,
                 changeYear: true,
                 maxPicks: 2,
                 onSelect: function(dateText, inst)
             { inst.settings.defaultDate = dateText;


                  }},
          );



</script>
<script>
function save_add_data_companny(){
    $.ajax({
        type:"POST",
        url:"tar.php",
        data:$("#add_data_companny").serialize(),
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
                 location.reload();
                });
            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"})
                 .then(function() {
                 location.reload();
                });
            }

            //reload page

        }
    });
    return false;
}


</script>


</body>

</html>
