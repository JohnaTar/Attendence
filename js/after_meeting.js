function show_name_on_add_vacation_last_years(id){
       $("#user_id").val(id);
 return false;
}
function save_vacation_last_year_form(){
      $.ajax({
          type:"POST",
          url:"after_meeting.php",
          data:$("#vacation_last_year_form").serialize(),
          success:function(data){
            $(".close").trigger("click");

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
          }
      });

  return false;


}


 $(function() {
   $("#datepicker").datepicker({ dateFormat: 'dd-mm-yy' });
 });
 $(function() {
   $("#datepicker2").datepicker({ dateFormat: 'dd-mm-yy' });
 });
 $(function() {
   $("#datepicker3").datepicker({ dateFormat: 'dd-mm-yy' });
 });



 $(function() {
    $("#day").change(function(){
        var johnamaty = $("#day").val();
       if (johnamaty == 3 ) {
              $("#field_minute").show();
       }else{
              $("#field_minute").hide();
              $("#minute").val('');
       }
    });
 });
