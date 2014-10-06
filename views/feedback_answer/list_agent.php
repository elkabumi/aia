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
               Simpan Feedback GTS Berhasil
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
               Simpan Feedback Facilitator Berhasil
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
                                                <th>Agent code</th>
                                                <th>Agent name</th>
                                                <th>Agent Ktp Number</th>
                                                <th>Home City</th>
                                                 <th>GTS</th>
                                                 <th>Facilitator</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
												$check_feedback_gts = check_data($row['transaction_agent_id'], 1);
												$check_feedback_fac = check_data($row['transaction_agent_id'], 2);
												$checked1 =  ($check_feedback_gts > 0) ? "1" : 0;
												$checked2 =  ($check_feedback_fac > 0) ? "1" : 0;
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['agent_code']?></td>
                                                <td><?= $row['agent_name']?></td>
                                                <td><?= $row['agent_ktp_number']?></td>
                                                <td><?= $row['city_name']?></td>
                                                <td><label>
                                            		<input type="checkbox" class="flat-red" readonly="readonly" <?php if($checked1 == 1){ ?> checked="checked"<?php } ?>/>
                                        			</label></td>
                                                 <td><label>
                                            		<input type="checkbox" class="flat-red" readonly="readonly" <?php if($checked2 == 1){ ?> checked="checked"<?php } ?>/>
                                        			</label></td>
                                                <td style="text-align:center;">
                                                <a href="feedback_answer.php?page=feedback_gts&id=<?= $row['transaction_agent_id']?>" class="btn btn-danger">GTS</a>
                                                 <a href="feedback_answer.php?page=feedback_fac&id=<?= $row['transaction_agent_id']?>" class="btn btn-danger">Facilitator</a>

                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         <tfoot>
                                                    <tr>
                                                        <th colspan="8"><a href="<?= $close_button ?>" class="btn btn-danger " >Close</a></th>
                                                      
                                                    </tr>
                                                </tfoot>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
                
