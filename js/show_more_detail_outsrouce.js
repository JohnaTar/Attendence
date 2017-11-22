function show_more_detail_outsrouce($oc_id){
  var oc_id =$oc_id;
  var month =$('#month_on_outsrouce').val();
  var first_y =$('#first_year').val();
  var last_y =$('#last_year').val();
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
                                     "bLengthChange": false});
                              $('#month_on_outsrouce').val(show_data_on_month);

                                  }
                              });


                              var oc_id =$('#tar').val();
                              var month =$('#month_on_outsrouce').val();
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
