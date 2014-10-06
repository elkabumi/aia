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
                                            <label>Trainer Name</label>
                                   <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $data_event->trainer_name?>" readonly="readonly"/>
                                  </div>
									 <div class="form-group">
                                            <label>Event Name</label>
                                       <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $data_event->transaction_name?>" readonly="readonly"/>
                                  </div>
                                         <div class="form-group">
                                            <label>Date</label>
                                           <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= format_date($data_event->transaction_date); ?>" readonly="readonly"/>
                                        </div>

 <div class="form-group">
                                        <label>Month</label>
<select class="form-control" name="i_month">
                                        <?php
										$month = array('','Januari','Februari','Maret','April', 'Mei', 'Juni',
														'Juli', 'Agustus', 'September', 'Oktober', 'November', 		
														'Desember');
                                        $month_now = date("m");
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
										for($i_y = $year; $i_y <= $year_limit; $i_y++){
										?>
                                        <option value="<?= $i_y ?>" <?php if($i_y == $year_now){ ?>selected="selected" <?php } ?>><?= $i_y ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        <br />
                                        
<div class="box">
<div class="box-body2 table-responsive">
<table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                                <th>Agent Code</th>
                                                <th>Agent Name</th> 
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row_agent = mysql_fetch_array($query_agent)){
												
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= $row_agent['agent_code']?></td>
                                                <td><?= $row_agent['agent_name']?></td>
                                                <td><input type="text" name="i_value<?= $no?>" id="i_value<?= $no?>"  required/></td>
                                          </tr>
                                               <?php
											$no++;
                                            }
                                            ?>
                                        </tbody>
                                          
                                    </table>
                                    </div>
                                    </div>

<input name="submit" type="submit" value="Save" class="btn btn-danger" />
 <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
</div>
</div>
</form>
</div>
</div>
</section>
