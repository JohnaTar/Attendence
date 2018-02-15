$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<label class="col-md-4 control-label" for="fn"></label><div class="form-group"> <div class="col-md-6"><input  class="form-control input-md" type="text" name="dep[]"/><a href="#" class="remove_field">Remove</a></div></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

function show_user_in_companny(){
    $.ajax({
        type:"POST",
        url:"attendent_out.php",
        data:$("#data_show_user_in_companny").serialize(),
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
          $("#oc_name_forget").html(data);
          $("#oc_name_exit").html(data);
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

                     $.ajax({
                         type:"POST",
                         url:"attendent_out.php",
                         data:$("#data_show_user_in_companny").serialize(),
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

                      var oc_id =$('#tar').val();
                      var month =$('#month_on_outsrouce').val();

                      data = [];
                      data[0] = oc_id;
                      data[1] = month;
                      data[2] = first_y
                      data[3] = last_y
                          $.ajax({
                              url:'show_detail_outsrouce.php',
                              data:{data:data},
                              type:'POST',
                            success:function(data){
                              $('#detail_oc').html(data);
                            }
                          });



                      return false;


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

//ลืมสแกน

function save_data_oc_forget(){
  $.ajax({
        type:'POST',
        url :'attendent_out.php',
        data:$("#data_save_oc_forget").serialize(),
          success:function(data){
            $(".close").trigger("click");
            if (data ==1) {
              swal({
                     title: "Success",
                     icon: "success",
                     text: "บันทึกข้อมูลเรียบร้อย",
                     type: "success"});

                     $.ajax({
                         type:"POST",
                         url:"attendent_out.php",
                         data:$("#data_show_user_in_companny").serialize(),
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
                     type: "warning"});
                  }
    }

});

return false;

}

//ออกก่อน

function save_data_oc_exit(){
  $.ajax({
        type:'POST',
        url :'attendent_out.php',
        data:$("#data_save_oc_exit").serialize(),
          success:function(data){
            $(".close").trigger("click");
            if (data ==1) {
              swal({
                     title: "Success",
                     icon: "success",
                     text: "บันทึกข้อมูลเรียบร้อย",
                     type: "success"});

                     $.ajax({
                         type:"POST",
                         url:"attendent_out.php",
                         data:$("#data_show_user_in_companny").serialize(),
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
                     type: "warning"});
                  }
    }

});

return false;

}

//ขาด


function save_data_oc_kad(){
  $.ajax({
        type:'POST',
        url :'attendent_out.php',
        data:$("#data_save_oc_kad").serialize(),
          success:function(data){
            $(".close").trigger("click");
            if (data ==1) {
              swal({
                     title: "Success",
                     icon: "success",
                     text: "บันทึกข้อมูลเรียบร้อย",
                     type: "success"});

                     $.ajax({
                         type:"POST",
                         url:"attendent_out.php",
                         data:$("#data_show_user_in_companny").serialize(),
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
                     type: "warning"});
                  }
    }

});

return false;

}
