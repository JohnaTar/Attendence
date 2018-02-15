function show_more_detail_outsrouce($oc_id){
  var oc_id =$oc_id;
  var month =$('#mdp-demos').val();

  data = [];
  data[0] = oc_id;
  data[1] = month;

      $.ajax({
          url:'show_detail_outsrouce.php',
          data:{data:data},
          type:'POST',
        success:function(data){
          $('#detail_oc').html(data);
        }
      });



  return false;
}
function delete_vacation_oc(id){
    if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
        $.ajax({
            type:"POST",
            url:"show_detail_outsrouce.php",
            data:{sum_id:id},
            success:function(data){

              if (data ==1) {
                swal({
                       title: "Success",
                       icon: "success",
                       text: "ลบข้อมูลเรียบร้อย",
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
                                   var month =$('#mdp-demos').val();

                                   data = [];
                                   data[0] = oc_id;
                                   data[1] = month;

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
                       text: "ไม่สามารถลบข้อมูลได้",
                       type: "warning"});
           }
            }
        });
    }
    return false;
}

function show_more_detail_outsrouce_vacation($oc_id){
  var oc_id =$oc_id;
  var month =$('#mdp-demos').val();

  data = [];
  data[0] = oc_id;
  data[1] = month;

      $.ajax({
          url:'show_detail_outsrouce.php',
          data:{data1:data},
          type:'POST',
        success:function(data){

          $('#detail_oc_s').html(data);
        }
      });



  return false;
}



function delete_vacation_oc2(id){
    if(confirm("คุณต้องการลบข้อมูลหรือไมfk")){
        $.ajax({
            type:"POST",
            url:"show_detail_outsrouce.php",
            data:{sum_id:id},
            success:function(data){

              if (data ==1) {
                swal({
                       title: "Success",
                       icon: "success",
                       text: "ลบข้อมูลเรียบร้อย",
                       type: "success"});

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

                                   var oc_id =$('#tar').val();
                                   var month =$('#mdp-demos').val();

                                   data = [];
                                   data[0] = oc_id;
                                   data[1] = month;

                                       $.ajax({
                                           url:'show_detail_outsrouce.php',
                                           data:{data1:data},
                                           type:'POST',
                                         success:function(data){
                                           $('#detail_oc_s').html(data);
                                         }
                                       });



                                   return false;






           }else{

                swal({
                       title: "Warning",
                       icon: "warning",
                       text: "ไม่สามารถลบข้อมูลได้",
                       type: "warning"});
           }
            }
        });
    }
    return false;
}
