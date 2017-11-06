function show_more_detail_outsrouce($oc_id){
  var oc_id =$oc_id;
  var month =$('#month_on_outsrouce').val();
  data = [];
  data[0] = oc_id;
  data[1] = month;
      $.ajax({
          url:'show_more_detail_outsrouce.php',
          data:{show_more_detail_outsrouce:data},
          type:'POST',
        success:function(data){
          alert(data);
        }
      });



  return false;
}
