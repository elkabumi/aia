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
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan berhasil
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
                                            <label>Agent Code</label>
                                   <input required type="text" name="i_code" class="form-control" placeholder="" value="<?= $data_agent->agent_code?>" readonly="readonly"/>
                                  </div>
									 <div class="form-group">
                                          
                                             <label> Agent Name</label>
                                       <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $data_agent->agent_name?>" readonly="readonly"/>
                                  </div>
                                         <div class="form-group">
                                            <label>Agent KTP Number</label>
                                           <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $data_agent->agent_ktp_number; ?>" readonly="readonly"/>
                                        </div>

 <div class="form-group">
                                            <label>Home City</label>
                                           <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $data_agent->home_city; ?>" readonly="readonly"/>
                                        </div>

                                        
                              
                                        <br />
                                       
                                            <label>History Event</label>
                                          
                                      
                                        
<div class="box">
<div class="box-body2 table-responsive">
<table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                                <th>Event Date</th>
                                                <th>Event Name</th> 
                                                <th>City</th>
                                                <th>Event dexcription</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_event)){
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= format_date($row['transaction_date'])?></td>
                                                <td><?= $row['transaction_name']?></td>
                                                <td><?= $row['unit_name']?></td>
                                                <td><?= $row['transaction_description']?></td>
                                                <td style="text-align:center;">
                                               
                                                 <a href="training_dashboard.php?page=form_save_view&id=<?= $row['transaction_id']?>" class="btn btn-danger" >View</a>
                                              
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                        
                                    </table>
                                    </div>
                                    </div>
                                    
                                    <br />
                                     <label>Detail Production</label>
                                    <div class="box">
<div class="box-body2 table-responsive">
<table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                                <th>Period</th>
                                                <th>Value</th> 
                                                 <th>Description</th> 
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_production = 1;
                                            while($row_production = mysql_fetch_array($query_production)){
                                            ?>
                                            <tr>
                                            	<td><?= $no_production?></td>
                                                <td><?= $row_production['period']?></td>
                                                <td><?= $row_production['production_detail_value']?></td>
                                                <td><?= $row_production['production_detail_description']?></td>
                                                <td style="text-align:center;">
                                               
                                                 <a href="production.php?page=form_add_production&detail_id=<?= $row_production['production_detail_id']?>&id=<?= $id ?>" class="btn btn-danger" >Edit</a>
                                              
                                                </td>
                                            </tr>
                                            <?php
											$no_production++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                        <td colspan="5"><a href="<?= $add_button?>" class="btn btn-danger" >Add</a></td>
                                        </tr>
                                        
                                        </tfoot>
                                        
                                    </table>
                                    </div>
                                    </div>

 <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
</div>
</div>
</form>
</div>
</div>
</section>
