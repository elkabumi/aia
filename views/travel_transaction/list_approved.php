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
                if(isset($_GET['did']) && $_GET['did'] == 4){
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
                }else if(isset($_GET['did']) && $_GET['did'] == 6){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Hapus Berhasil
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
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Trainer</th>
                                                <th>Maskapai</th>
                                                <th>Dari</th>
                                                <th>Ke</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                                $status = array('0' => 'Done', '1' => 'Request', '3' => 'On Progress');
                                            ?>
                                            <tr>
                                                <td><?= $no?></td>
                                                <td><?= format_date($row['travel_date'])?></td>
                                                <td><?= $row['travel_hour']?></td>
                                                <td><?= $row['user_name']?></td>
                                                <td><?= $row['travel_maskapai_name']?></td>
                                                <td><?= $row['travel_from']?></td>
                                                <td><?= $row['travel_to']?></td>
                                                <td><?= $row['travel_description']?></td>
                                                <td><?= $status[$row['travel_status']]?></td>
                                                <td style="text-align:center;">
                                               
                                                <?php
                                                $user_id = get_isset($_SESSION['user_id']);
                                                
                                                $get_type = read_user_id($user_id);
                                                
                                                 if($row['travel_status'] != 2 && $row['travel_status'] != 0){
                                                 ?>
                                                  <a href="javascript:void(0)" onclick="confirm_onprogress(<?= $row['travel_transaction_id']; ?>,'travel_transaction.php?page=save_onprogress_approved&id=')" class="btn btn-danger" title="On progress" ><i class="fa fa-book"></i></a>
                                                  &nbsp;<a href="javascript:void(0)" onclick="confirm_not_approved(<?= $row['travel_transaction_id']; ?>,'travel_transaction.php?page=reject&id=')" class="btn btn-danger" title="Reject"><strong>X</strong></a>
                                                  <?php
                                                 }
                                                 
                                                  ?>
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