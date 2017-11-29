
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
                    <h1 class="page-header">Report Excel Outsource</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


                <br>

            <div class="row">
              <form class="form-horizontal" action="outsource2.php" method="POST">
                <div class="col-md-12">

                  <div class="form-group">
                 <label class="col-md-4 control-label" for="selectbasic">บริษัท</label>
                 <div class="col-md-4">

           <?php
                 include 'connect_pdo.php';
                 $db = new Outsource();
                 $get_companny = $db->get_all_companny();

            ?>

             <select  name="companny_id" class="form-control input-md" required="">
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
                 <label class="col-md-4 control-label" for="fn">วันที่ </label>
                 <div class="col-md-4">
             <input name="rank_of_date" type="date"  class="form-control input-md" required="">

                 </div>
             </div>
             <div class="form-group">
                 <label class="col-md-4 control-label" for="fn">วันที่ </label>
                 <div class="col-md-4">
             <input name="rank_of_date2" type="date" class="form-control input-md" required="">

                 </div>
             </div>
             <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                    <button type="submit" name="submit" class="btn btn-primary" >Export</button>
                        </div>
                    </div>
                    <!-- /.panel -->

                     </form>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


</body>


</html>
