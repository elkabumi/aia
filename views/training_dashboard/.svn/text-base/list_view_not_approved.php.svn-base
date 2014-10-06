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
               Approve Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['del']) && $_GET['del'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Event telah terhapus
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
                                                <th>Trainer name</th> 
                                                <th>City</th>
                                                <th>Event dexcription</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_view)){
												if($row['user_name'] == ''){
													$trainer  = 'Trainer belum ditentukan';
													$approve_link = '';
												}else{
													$approve_link =  '<a href="javascript:void(0)" onclick="confirm_approved('.$row['transaction_id'].','."'".'training_dashboard.php?page=approved&id='."'".')" class="btn btn-danger" title="Approve" ><i class="fa fa-check"></i></a>';
		
													$trainer  =$row['user_name'];
													$block = "style='background-color:#C5CDE0; color:#000;'";
												}
												
												
			$reject_link =  '&nbsp;<a href="javascript:void(0)" onclick="confirm_not_approved('.$row['transaction_id'].','."'".'training_dashboard.php?page=not_aproved&id='."'".')" class="btn btn-danger" title="Reject"><strong>X</strong></a>';
                                            ?>
                                            <tr>
                                            	<td <?= $block ?>><?= $no?></td>
                              <td <?= $block ?>><?= format_date($row['transaction_date'])?> - <?= format_date($row['transaction_date2'])?></td>
                                                <td <?= $block ?>><?= $row['transaction_name']?></td>
                                                <td <?= $block ?>><?= $trainer ?></td>
                                                <td <?= $block ?>><?= $row['unit_name']?></td>
                                                <td <?= $block ?>><?= $row['transaction_description']?></td>
                                                <td <?= $block ?> >
                                               <?=$approve_link.$reject_link?>
                                             
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