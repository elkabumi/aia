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

<br />
                                        
<div class="box">
<table class="table table-bordered">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                                <th>Agent Code</th>
                                                <th>Agent Name</th> 
                                                <?php
                                                $query_title = mysql_query("select * 
																
 																from productions																
																where transaction_id = '$id'
																order by production_year, production_month
																");
												while($row_title = mysql_fetch_array($query_title)){
												?>
                                                <th><?= $row_title['production_month']."/".$row_title['production_year']?></th>
                                                <?php
												
												}
												?>
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
                                                <?php
                                                $query_title2 = mysql_query("select * 
																
 																from productions																
																where transaction_id = '$id'
																order by production_year, production_month
																");
												while($row_title2 = mysql_fetch_array($query_title2)){
												?>
                                                <?php
                                                $query_value = mysql_query("select production_value from production_details 
																where production_id = '".$row_title2['production_id'].
																"' and transaction_agent_id = '".$row_agent['transaction_agent_id']."'	
																");
												$row_value = mysql_fetch_array($query_value);
												?>
                                                <th><?= $row_value['production_value'];?></th>
                                                <?php
												
												}
												?>
                                               
                                          </tr>
                                               <?php
											$no++;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                        <th>&nbsp;</th>
                                         <th>&nbsp;</th>
                                          <th>&nbsp;</th>
                                          <?php
                                                $query_title3 = mysql_query("select * 
																
 																from productions																
																where transaction_id = '$id'
																order by production_year, production_month
																");
												while($row_title3 = mysql_fetch_array($query_title3)){
												?>
                                           <th> <a href="production.php?page=list_agent_edit&id=<?= $row_title3['production_id']?>" class="btn btn-danger" >Edit</a></th>
                                            <?php
												
												}
												?>
                                        </tfoot>
                                          
                                    </table>
                                   
                                    </div>

 <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
</div>
</div>
</form>
</div>
</div>
</section>
