$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<label class="col-md-4 control-label" for="fn"></label><div class="form-group"> <div class="col-md-6"><input  class="form-control input-md" type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});




$(function(){
   $('#co_id, #companny').change(function(){
    var co_id =$('#co_id').val();
    var show_data_on_month =$('#month_on_outsrouce').val();

    info = [];
    info[0] = co_id;
    info[1] = show_data_on_month;


          $.ajax({
                url: "attendent_out.php",
                data: {co_id:info},
                type: "POST",
            xhr: function () {  // Custom XMLHttpRequest
               var myXhr = $.ajaxSettings.xhr();
               if (myXhr.upload) { // Check if upload property exists
                   myXhr.upload.addEventListener('progress', function (e) { progressHandlingFunction(e) }, false);
                   myXhr.upload.addEventListener('load', loadedHandlingFunction, false);
               }
               return myXhr;
           },
           success: function (data) {
               // your code will be inserted here on success.
               $("#companny").html(data);
               $('#dataTables-example').DataTable({
                   responsive: true,
                    "bSort": false,
                    "pageLength": 100,
                     "bLengthChange": false,
               });
               $('#month_on_outsrouce').val(show_data_on_month);
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

            // success: function(data)  {
            //
            //   $("#companny").html(data);
            //
            // $('#dataTables-example').DataTable({
            //     responsive: true,
            //      "bSort": false,
            //      "pageLength": 100,
            //       "bLengthChange": false,
            // });
            //  $('#month_on_outsrouce').val(show_data_on_month);
            //
            //             }




   });
});



  //function เรื่ยกดูข้อมูลแผนกในบริษัท เพิ่มช้อมูลสมาชิก
$(function(){
   $("#show_dep").change(function(){
      var show_dep =$(this).val();

                $.ajax({
                url: "attendent_out.php",
                data: {show_dep:show_dep},
                type: "POST",

                     success: function(data)  {

                              $("#show_dep_in_com").html(data);

                        }
                    });



   });
});


//function เพิ่มข้อมูลสมาชิก
function add_outsrouce_form(){


    $.ajax({
        type:"POST",
        url:"attendent_out.php",
        data:$("#add_outsrouce_form").serialize(),
        success:function(data){

           $(".close").trigger("click");
               if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",

                        type: "success"});

                        $('#add_user').val('');
                        var co_id =$('#co_id').val();
                        var show_data_on_month =$('#month_on_outsrouce').val();

                        info = [];
                        info[0] = co_id;
                        info[1] = show_data_on_month;


                                    $.ajax({
                                    url: "attendent_out.php",
                                    data: {co_id:info},
                                    type: "POST",

                                         success: function(data)  {

                                  $("#companny").html(data);

                                $('#dataTables-example').DataTable({
                                    responsive: true,
                                     "bSort": false,
                                     "pageLength": 100,
                                      "bLengthChange": false
                                });
                                 $('#month_on_outsrouce').val(show_data_on_month);

                                            }
                                        });



            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"});
            }






        }
    });
    return false;
}


// โชว์ชื่อการเพิ่มวันลา
function show_from_add_vacation_oc($oc_id){

  $.ajax({

        type:'POST',
        url :'attendent_out.php',
        data: {oc_id:$oc_id},
          success:function(data){
          $("#oc_name_late").html(data);
          $("#oc_name_absence").html(data);
          $("#oc_name_sick").html(data);
          $("#oc_name_lakit").html(data);
          $("#oc_name_wrong").html(data);
          $("#oc_name_vacation").html(data);
          }



  });

  return false;

}


// เพิ่มสาย

function save_data_oc_late(){

  $.ajax({

        type:'POST',
        url :'attendent_out.php',
        data:$("#data_save_oc_late").serialize(),
          success:function(data){
            $(".close").trigger("click");
            if (data ==1) {
              swal({
                     title: "Success",
                     icon: "success",
                     text: "บันทึกข้อมูลเรียบร้อย",
                     type: "success"});

                     var co_id =$('#co_id').val();
                     var show_data_on_month =$('#month_on_outsrouce').val();

                     info = [];
                     info[0] = co_id;
                     info[1] = show_data_on_month;


                                 $.ajax({
                                 url: "attendent_out.php",
                                 data: {co_id:info},
                                 type: "POST",

                                      success: function(data)  {

                               $("#companny").html(data);

                             $('#dataTables-example').DataTable({
                                 responsive: true,
                                  "bSort": false,
                                  "pageLength": 100,
                                   "bLengthChange": false,
                             });
                              $('#month_on_outsrouce').val(show_data_on_month);

                                         }
                               });


            }else{

              swal({
                     title: "Warning",
                     icon: "warning",
                     text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                     type: "warning"});
         }
    }



        });

  return false;

}



// เพิ่มขาด
function save_data_oc_absence(){

  $.ajax({

        type:'POST',
        url :'attendent_out.php',
        data:$("#data_save_oc_absence").serialize(),
          success:function(data){
            $(".close").trigger("click");
            if (data ==1) {
              swal({
                     title: "Success",
                     icon: "success",
                     text: "บันทึกข้อมูลเรียบร้อย",
                     type: "success"});

                     var co_id =$('#co_id').val();
                     var show_data_on_month =$('#month_on_outsrouce').val();

                     info = [];
                     info[0] = co_id;
                     info[1] = show_data_on_month;


                                 $.ajax({
                                 url: "attendent_out.php",
                                 data: {co_id:info},
                                 type: "POST",

                                      success: function(data)  {

                               $("#companny").html(data);

                             $('#dataTables-example').DataTable({
                                 responsive: true,
                                  "bSort": false,
                                  "pageLength": 100,
                                   "bLengthChange": false,
                             });
                              $('#month_on_outsrouce').val(show_data_on_month);

                                         }
                               });


            }else{

              swal({
                     title: "Warning",
                     icon: "warning",
                     text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                     type: "warning"});
         }
    }



        });

  return false;

}


 // เพิ่มป่วย
function save_data_oc_sick(){

  $.ajax({

        type:'POST',
        url :'attendent_out.php',
        data:$("#data_save_oc_sick").serialize(),
          success:function(data){
            $(".close").trigger("click");
            if (data ==1) {
              swal({
                     title: "Success",
                     icon: "success",
                     text: "บันทึกข้อมูลเรียบร้อย",
                     type: "success"});

                     var co_id =$('#co_id').val();
                     var show_data_on_month =$('#month_on_outsrouce').val();

                     info = [];
                     info[0] = co_id;
                     info[1] = show_data_on_month;


                                 $.ajax({
                                 url: "attendent_out.php",
                                 data: {co_id:info},
                                 type: "POST",

                                      success: function(data)  {

                               $("#companny").html(data);

                             $('#dataTables-example').DataTable({
                                 responsive: true,
                                  "bSort": false,
                                  "pageLength": 100,
                                   "bLengthChange": false,
                             });
                              $('#month_on_outsrouce').val(show_data_on_month);

                                         }
                               });


            }else{

              swal({
                     title: "Warning",
                     icon: "warning",
                     text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                     type: "warning"});
         }
    }



        });

  return false;

}

// เพิ่้มกิจ
function save_data_oc_errand(){

 $.ajax({

       type:'POST',
       url :'attendent_out.php',
       data:$("#data_save_oc_errand").serialize(),
         success:function(data){
           $(".close").trigger("click");
           if (data ==1) {
             swal({
                    title: "Success",
                    icon: "success",
                    text: "บันทึกข้อมูลเรียบร้อย",
                    type: "success"});

                    var co_id =$('#co_id').val();
                    var show_data_on_month =$('#month_on_outsrouce').val();

                    info = [];
                    info[0] = co_id;
                    info[1] = show_data_on_month;


                                $.ajax({
                                url: "attendent_out.php",
                                data: {co_id:info},
                                type: "POST",

                                     success: function(data)  {

                              $("#companny").html(data);

                            $('#dataTables-example').DataTable({
                                responsive: true,
                                 "bSort": false,
                                 "pageLength": 100,
                                  "bLengthChange": false,
                            });
                             $('#month_on_outsrouce').val(show_data_on_month);

                                        }
                              });


           }else{

             swal({
                    title: "Warning",
                    icon: "warning",
                    text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                    type: "warning"});
        }
   }



       });

 return false;


}
// ลาผิด
function save_data_oc_wrong(){

 $.ajax({

       type:'POST',
       url :'attendent_out.php',
       data:$("#data_save_oc_wrong").serialize(),
         success:function(data){
           $(".close").trigger("click");
           if (data ==1) {
             swal({
                    title: "Success",
                    icon: "success",
                    text: "บันทึกข้อมูลเรียบร้อย",
                    type: "success"});

                    var co_id =$('#co_id').val();
                    var show_data_on_month =$('#month_on_outsrouce').val();

                    info = [];
                    info[0] = co_id;
                    info[1] = show_data_on_month;


                                $.ajax({
                                url: "attendent_out.php",
                                data: {co_id:info},
                                type: "POST",

                                     success: function(data)  {

                              $("#companny").html(data);

                            $('#dataTables-example').DataTable({
                                responsive: true,
                                 "bSort": false,
                                 "pageLength": 100,
                                  "bLengthChange": false,
                            });
                             $('#month_on_outsrouce').val(show_data_on_month);

                                        }
                              });


           }else{

             swal({
                    title: "Warning",
                    icon: "warning",
                    text: "ไม่สามารถบันทึกข้อมู",
                    type: "warning"});
        }
   }



       });

 return false;

}

function save_data_oc_vacation(){

 $.ajax({

       type:'POST',
       url :'attendent_out.php',
       data:$("#data_save_oc_vacation").serialize(),
         success:function(data){
           $(".close").trigger("click");
           if (data ==1) {
             swal({
                    title: "Success",
                    icon: "success",
                    text: "บันทึกข้อมูลเรียบร้อย",
                    type: "success"});

                    var co_id =$('#co_id').val();
                    var show_data_on_month =$('#month_on_outsrouce').val();

                    info = [];
                    info[0] = co_id;
                    info[1] = show_data_on_month;


                                $.ajax({
                                url: "attendent_out.php",
                                data: {co_id:info},
                                type: "POST",

                                     success: function(data)  {

                              $("#companny").html(data);

                            $('#dataTables-example').DataTable({
                                responsive: true,
                                 "bSort": false,
                                 "pageLength": 100,
                                  "bLengthChange": false,
                            });
                             $('#month_on_outsrouce').val(show_data_on_month);

                                        }
                              });


           }else{

             swal({
                    title: "Warning",
                    icon: "warning",
                    text: "ไม่สามารถบันทึกข้อมูล",
                    type: "warning"});
        }
   }



       });

 return false;

}
