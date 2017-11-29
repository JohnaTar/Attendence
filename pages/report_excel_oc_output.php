
<?php

// header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
// header('Content-Disposition: attachment; filename="myexcel.xls"'); //กำหนดชื่อไฟล์
// header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
// header("Content-Type: application/octet-stream");
// header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
// header("Content-Transfer-Encoding: binary");
// header("Content-Length: ".filesize("myexcel.xls"));
//
// @readfile($filename);
if (isset($_POST['companny_id'])) {
  echo $_POST['rank_of_date'];
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
table, th, td {
  border: 1px solid black;
border-collapse: collapse;
}
</style>
</head>
<body>
<table>

      <thead>
          <tr>
              <th rowspan="2" style="text-align:center">ลำดับ</th>
              <th rowspan="2" style="text-align:center">ชื่อ - นามสกุล</th>
              <th rowspan="2" style="text-align:center">แผนก</th>
              <th rowspan="2" style="text-align:center">วันเริ่มงาน</th>
              <th rowspan="2" style="text-align:center">จำนวนวันทำงาน</th>
              <th colspan="3" style="text-align:center">พักร้อน</th>
              <th colspan="4" style="text-align:center">การลา 12/02/2017-12-09-2017</th>

          </tr>
          <tr>
              <th>สิทธิ์</th>




              <th>ใช้</th>
              <th>เหลือ</th>
              <th>กิจ</th>
              <th>ป่วย</th>
              <th>สาย</th>
              <th>ขาดงาน</th>
          </tr>
      </thead>
      <tbody>
        <tr>
            <td> 1 </td>
            <td> johnatar </td>
            <td> it-support </td>
            <td> 23/11/2017 </td>
            <td> 30 days </td>
            <td> 30 </td>
            <td> 5 </td>
            <td> 25 </td>
            <td> 30 </td>
            <td> 5 </td>
            <td> 25 </td>
            <td> 30 </td>


        </tr>
      </tbody>
</table>
</body>
</html>
