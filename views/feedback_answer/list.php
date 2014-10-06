  <section class="content-header">
                    <h1>
                        <?= $title ?>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"> <?= $title ?></a></li>
                      
                        <li class="active">Data</li>
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
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
               <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 4){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Maaf!</b>
               No Ktp Sudah Ada
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                                <th>Event date</th>
                                                <th>Event name</th> 
                                                 <th>Trainer</th> 
                                                <th>Unit</th>
                                                  <th>Total agent</th>
                                                <th>Event description</th>
                                                <th>Config</th>
                                                <th>Report GTS</th>
                                                <th>Report Facilitator</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
												$query_agent=mysql_query("SELECT COUNT( agent_id ) AS total_agent
																			FROM transaction_agents
																			WHERE transaction_id =  '". $row['transaction_id']."'");
												$data=mysql_fetch_array($query_agent);
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= format_date($row['transaction_date'])?></td>
                                                <td><?= $row['transaction_name']?></td>
                                                 <td><?= $row['user_name']?></td>
                                                <td><?= $row['unit_name']?></td>
                                                <td><?= $data['total_agent']?></td>
                                                <td><?= $row['transaction_description']?></td>
                                                <td style="text-align:center;">
                                              
                                         <a href="feedback_answer.php?page=list_agent&id=<?= $row['transaction_id']?>" class="btn btn-danger" >Process</a>
                                                       
                                             </td>
                                          	<td>
                    	 <?
								$cek_report_gts = get_feedback($row['transaction_id'],1);
							
								if($cek_report_gts > '0'){
								
							?>     
             <a href="feedback_answer.php?page=report_gts&id=<?= $row['transaction_id']?>" class="btn btn-danger" ><i class="fa fa-book"></i></a>
                  				<?
                                }else{?>
                                &nbsp;
                               <? } ?>
                                
                  </td>
                                           <td>
                                <?
								$cek_report_gts = get_feedback($row['transaction_id'],2);
							
								if($cek_report_gts > '0'){
								
							?>   
                                           
          	<a href="feedback_answer.php?page=report_fac&id=<?= $row['transaction_id']?>" class="btn btn-danger" ><i class="fa fa-book"></i></a>
            										<?
                                }else{?>
                                &nbsp;
                               <? } ?>
                                            
                                            </td>
                                           </tr>  
                                       <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->