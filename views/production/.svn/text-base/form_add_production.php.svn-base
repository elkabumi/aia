 <section class="content-header">
                    <h1>
                        <?= $title?> 
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title?> </a></li>
                        
                        <li class="active">Form</li>
                    </ol>
                </section>
                
                  <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Data sudah ada
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                        <form role="form" action="<?= $action?>" method="post">
                         <div class="box box-danger">
                                
                               
                                <div class="box-body">
                                 
                                         

 <div class="form-group">
                                        <label>Month</label>
<select class="form-control" name="i_month">
                                        <?php
										$month = array('','Januari','Februari','Maret','April', 'Mei', 'Juni',
														'Juli', 'Agustus', 'September', 'Oktober', 'November', 		
														'Desember');
                                        $month_now = date("m");
										$month_now = ($row->production_detail_month) ? $row->production_detail_month : $month_now;
										for($i_m = 1; $i_m <= 12; $i_m++){
											
										?>
                                        <option value="<?= $i_m ?>" <?php if($i_m == $month_now){ ?>selected="selected" <?php } ?>><?= $month[$i_m] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                  </div>
                                        
                                  <div class="form-group">
                                        <label>Year</label>
<select class="form-control" name="i_year">
                                        <?php
										$year = date("Y");
										$year = $year - 10;
										$year_limit = $year + 20;
										$year_now = date("Y");
										$year_now = ($row->production_detail_year) ? $row->production_detail_year : $year_now;
										for($i_y = $year; $i_y <= $year_limit; $i_y++){
										?>
                                        <option value="<?= $i_y ?>" <?php if($i_y == $year_now){ ?>selected="selected" <?php } ?>><?= $i_y ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Value</label>
                                           <input required type="text" name="i_value" class="form-control" placeholder="Enter  ..." value="<?= $row->production_detail_value ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="i_description" rows="3" placeholder="Enter ..."><?= $row->production_detail_description ?></textarea>
                                        </div>
                                      
              
<input name="submit" type="submit" value="Save" class="btn btn-danger" />
 <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
</div>
</div>
</form>
</div>
</div>
</section>
