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
                                                $status = array('0' => 'Done', '1' => 'Request', '2' => 'On Progress', '3' => 'Reject');
                                            ?>
                                           
                                            <tr> 
                                                <td><a href="test.php"><?= $no?></a></td>
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
                                                
												if($row['travel_status'] != 3){
                                                if($get_type == 1){
                                                    if($row['travel_status'] == 1){
                                                ?>
                                                
                                                    <a href="travel_transaction.php?page=form&id=<?= $row['travel_transaction_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['travel_transaction_id']; ?>,'travel_transaction.php?page=delete&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                 <?php
                                                    }
                                                 ?>
                                                 <?php
                                                 if($row['travel_status'] != 2 && $row['travel_status'] != 0){
                                                 ?>
                                                  <a href="javascript:void(0)" onclick="confirm_onprogress(<?= $row['travel_transaction_id']; ?>,'travel_transaction.php?page=save_onprogress&id=')" class="btn btn-danger" title="On progress" ><i class="fa fa-book"></i></a>
                                                  <?php
                                                 }
                                                  ?>
                                                  <?php
                                                 if($row['travel_status'] != 0){
                                                 ?>
                                                  <a href="javascript:void(0)" onclick="confirm_done(<?= $row['travel_transaction_id']; ?>,'travel_transaction.php?page=save_done&id=')" class="btn btn-danger" ><i class="fa fa-check"></i></a>
                                                  <?php
                                                  }
                                                }else{
                                                    
                                                    if($row['travel_status'] == 1){
                                                  ?>
                                                     <a href="travel_transaction.php?page=form&id=<?= $row['travel_transaction_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['travel_transaction_id']; ?>,'travel_transaction.php?page=delete&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                  <?php
                                                    }
                                                }
												}
                                                  ?>
                                                </td>   
                                            </tr>
                                         
                                            <?php
                                            $no++;
                                            
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="10"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></th>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->