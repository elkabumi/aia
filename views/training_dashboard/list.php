
    <!-- Responsive slider -->
    <?php include '../css/responsive-calendar.php';?>
    <script src="../js/responsive-calendar.js"></script>


<section class="content-header">
                    <h1>
                        Schedulling Training
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"> Schedulling training</a></li>
                        
                        <li class="active">list</li>
                    </ol>
</section>

 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                 <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Upload Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

<!-- Main content -->
<section class="content">
          <div class="row">

          <?php
          $no_unit = 1;
          while($row_unit = mysql_fetch_array($query_unit)){
          ?>
                <!-- left column -->
                <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title"> <a href="#" id="dialogModal_ex1"><?= $row_unit['unit_name']?></a></h3>
                                </div><!-- /.box-header -->
                                 <!-- Responsive calendar - START -->
                                <div class="responsive-calendar<?= $no_unit?>">
                                  <div class="controls">
                                      <a class="pull-left" data-go="prev"><div class="btn btn-danger"><i class="fa fa-angle-left"></i></div></a>
                                      <h4><span data-head-year></span> <span data-head-month></span></h4>
                                      <a class="pull-right" data-go="next"><div class="btn btn-danger"><i class="fa fa-angle-right"></i></div></a>
                                  </div><hr/>
                                  <div class="day-headers">
                                    <div class="day header">Mon</div>
                                    <div class="day header">Tue</div>
                                    <div class="day header">Wed</div>
                                    <div class="day header">Thu</div>
                                    <div class="day header">Fri</div>
                                    <div class="day header">Sat</div>
                                    <div class="day header">Sun</div>
                                  </div>
                                  <div class="days" data-group="days">
                                    
                                  </div>
                                </div>
                                <?php
                                if(isset($_GET['unit_id']) && $_GET['unit_id'] == $row_unit['unit_id']){
                                ?>
                                <div class="box-footer">


                                <?php 
								if($_SESSION['user_type_id']  == '2'){	
                                	$query_footer = detail_read_id2($_GET['date'], $row_unit['unit_id']);
								}else if($_SESSION['user_type_id']  == '5'){	
									$query_footer = detail_read_id3($_GET['date'], $row_unit['unit_id']);
								}else{
                                	$query_footer = detail_read_id($_GET['date'], $row_unit['unit_id']);
								}
                                $view_all_button = "training_dashboard.php?page=view&date=$_GET[date]&unit_id=$row_unit[unit_id]";
                                include '../views/training_dashboard/list_event_footer.php'; ?>
                                   
                                </div>
                                <?php
                                }
                                ?>
                               
                                <!-- Responsive calendar - END -->
                                
                                <div class="box-footer">
                                <?php
                                	if($_SESSION['user_type_id'] != '4'){
                                ?>
                                <a href="<?= $add_button ?>&unit_id=<?= $row_unit['unit_id']?>" class="btn btn-danger" type="submit">Add Event</a>
                                <a href="<?= $upload_button ?>&unit_id=<?= $row_unit['unit_id']?>" class="btn btn-danger" type="submit">Upload Event</a>
                                <?php }?>
                                </div>
                               
                            </div><!-- /.box -->
            
                </div><!--/.col (left) -->

          <script type="text/javascript">


         
          $(document).ready(function () {
            $(".responsive-calendar<?= $no_unit?>").responsiveCalendar({
              <?php
              $year = date("Y");
              $month = date("m");
              $unit_id = (isset($_GET['unit_id'])) ? $_GET['unit_id'] : "";
              $date = (isset($_GET['date'])) ? $_GET['date'] : "";

              if($unit_id == $row_unit['unit_id']){
                $date_ex = explode("-", $date);
                $year = $date_ex[0];
                $month = $date_ex[1];
              }

              ?>
              time: '<?= $year?>-<?= $month?>',
              events: {
                <?php
				if($_SESSION['user_type_id']  == '2'){	
                 $query_event = mysql_query("
							 SELECT COUNT( a.transaction_id ) AS jumlah, b.transaction_date, b.transaction_date2
								FROM transactions a
									JOIN (SELECT COUNT( transaction_date ) AS sama, transaction_date, transaction_date2
									FROM transactions h
									WHERE h.transaction_date = transaction_date
									
									GROUP BY transaction_date
									) AS b ON b.transaction_date = a.transaction_date
								WHERE a.unit_id =  '".$row_unit['unit_id']."' AND  	a.trainer_id = '".$_SESSION['user_id']."'
								AND transaction_approved_status =  '1'
								GROUP BY b.transaction_date");   
								        
				}else if($_SESSION['user_type_id']  == '5'){	
                 $query_event = mysql_query("
							 SELECT COUNT( a.transaction_id ) AS jumlah, b.transaction_date, b.transaction_date2
								FROM transactions a
									JOIN (SELECT COUNT( transaction_date ) AS sama, transaction_date, transaction_date2
									FROM transactions h
									WHERE h.transaction_date = transaction_date
									
									GROUP BY transaction_date
									) AS b ON b.transaction_date = a.transaction_date
									JOIN users c ON  c.user_id = a.trainer_id 
								WHERE a.unit_id =  '".$row_unit['unit_id']."' AND   c.leader_id ='".$_SESSION['user_id']."'
								AND transaction_approved_status =  '1'
								GROUP BY b.transaction_date");   
								        
				}else{
						$query_event = mysql_query("
							 SELECT COUNT( a.transaction_id ) AS jumlah, b.transaction_date, b.transaction_date2,transaction_id
								FROM transactions a
									JOIN (SELECT COUNT( transaction_date ) AS sama, transaction_date, transaction_date2
									FROM transactions h
									WHERE h.transaction_date = transaction_date
									
									GROUP BY transaction_date
									) AS b ON b.transaction_date = a.transaction_date
								WHERE a.unit_id =  '".$row_unit['unit_id']."'
								AND transaction_approved_status =  '1'
								GROUP BY b.transaction_date"); 
				}
			 
			 while($row_event = mysql_fetch_array($query_event)){

				?>
				"<?= $row_event['transaction_date'] ?>": {"number": <?= $row_event['jumlah']  ?>, "url": "../controllers/training_dashboard.php?page=list&date=<?= $row_event['transaction_date']?>&unit_id=<?= $row_unit['unit_id']?>"},
				<?php
			
				?>
                <?php
				
				}
                ?>
              }
            });
          });



        </script>


          <?php
         $no_unit++;
          }
          ?>


             


          </div>   <!-- /.row -->
</section><!-- /.content -->




   
      
     

     
   
    



    