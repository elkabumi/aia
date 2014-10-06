<?
		 if (isset($_GET['did']) && $_GET['did'] == 3){
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
				}else if(isset($_GET['del']) && $_GET['del'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete data agent Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['err']) && $_GET['err'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
              Data agent telah terinput
                </div>
           
                </section>
                <?php
                }
				?>

                <!-- Main content -->
              
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                                  <th>Agent Code</th>
                                               <th>Agent Name</th>
                                             
                                                <th>Agent ktp number</th> 
                                              
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_agent_tmp)){
											
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= $row['agent_code']?></td>
                                                <td><?= $row['agent_name']?></td>
                                                <td><?= $row['agent_ktp_number']?></td>
                                                 <td style="text-align:center;">
                                                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['0']; ?>,'training_dashboard.php?page=delete_agent&id=<?=$id?>&id_agent=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                            <?
												   if(!isset($_GET['add_train'])){
											?>
                                                <th colspan="5"><a href="<?=$add_button2 ?>" class="btn btn-danger " >Add</a> &nbsp;
                                              <? } ?>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
	   							</div><!-- /.box-body -->
                            </div><!-- /.box -->
                