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
                                                <th>Unit</th>
                                                <th>Event dexcription</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_view)){
												if($row['transaction_type_date'] == 1){
													$cunt_agent=count_agent($row['transaction_id']);
													if($cunt_agent > '0' and $row['sign_by_id'] != '0'){
														$block = "style='background-color:#C5CDE0; color:#000;'";
                                                		$link = "training_dashboard.php?page=form_save_view2&id=$row[transaction_id]";
													}else{
														$block= '';
                                                		$link = "training_dashboard.php?page=form_save_view&id=$row[transaction_id]";
													}
												 }else{
													$cunt_agent2=count_agent2($row['transaction_type_date_id'],$row['transaction_id']);
												if($cunt_agent2 > '0' and $row['sign_by_id'] != '0'){
													$block = "style='background-color:#C5CDE0; color:#000;'";
                                               	 	$link = "training_dashboard.php?page=form_save_view2&id=$row[transaction_type_date_id]";
                                         		}else{
													$block= '';
													$link = "training_dashboard.php?page=form_save_view&id=$row[transaction_type_date_id]";
												}
												 }
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= format_date($row['transaction_date']); ?></td>
                                                <td><?= $row['transaction_name']?></td>
                                                <td><?= $row['unit_name']?></td>
                                                <td><?= $row['transaction_description']?></td>
                                                <td style="text-align:center;">
                                             
                                             <a href="<?=$link?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                                 <?php
                                            
                                                 ?>
                                             

                                                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['transaction_id ']; ?>,'agent.php?page=delete&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="6"><a href="<?= $add_button."&unit_id=".$_GET['unit_id'] ?>" class="btn btn-danger" >Add</a>&nbsp; <a href="<?= $close_button?>" class="btn btn-danger" >Close</a></th>

                                              
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->