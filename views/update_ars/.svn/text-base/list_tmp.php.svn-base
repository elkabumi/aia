   
<?php
    if(isset($_GET['did']) && $_GET['did'] == 3){
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
               
   <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Total data baru <?=$count?></b>
                </div>
           
   </section>
     <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                          <div class="box">
                                <div class="box-header">
                                    <div class="box-tools">
                                     <form role="form" action="update_ars.php?page=agent_list_cek" method="get">
                                        <div class="input-group">
                  							<input type="text" name="search2" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search nomer ktp" value="<?=$_GET['search2']?>"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                          
                                        </div>
                                      </form>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                               <th width="5%">No</th>
                                                <th>Agent code</th>
                                                <th>Agent name</th>
                                                <th>Agent Ktp Number</th>
                                                <th>Home City</th>
                                                 <th>Status</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = ($pageno2 - 1) * 10 + 1;
                                            while($row = mysql_fetch_array($query)){
												if($row{'agent_active_status'}==1){
													$status='CLEAN';
												}else{
													$status='NOT CLEAN';
												}
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['agent_code_tmp']?></td>
                                                <td><?= $row['agent_name_tmp']?></td>
                                                <td><?= $row['agent_ktp_number_tmp']?></td>
                                                <td><?= $row['home_city_tmp']?></td>
                                                <td><?= $status?></td>
                                                <td style="text-align:center;">
                                                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['agent_id_tmp']; ?>,'agent.php?page=delete_agent_tmp&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th><a href="<?= $update ?>" class="btn btn-danger " >Add New</a></th>
                                                <th><a href="<?= $ignore ?>" class="btn btn-danger " >Cancel</a></th>
                                     
                                            </tr>
                                        </tfoot>
                                    </table>
									   <div class="col-xs-12">
                    
						<div id="example2_info" class="dataTables_info">Page <b><?=$pageno2?></b> dari <b><?=$lastpage?></b>  total <b><?=$count_data?></b> data  
							<div class="dataTables_paginate paging_bootstrap">
                           
							<ul class="pagination">
                                <?php
                                 	$prevpage = $pageno2-1;
									if($pageno2 == '1'){
								?>
										<li class="prev disabled">
                                			<a href="#">← Previous</a>
										</li>
                                <?php
									}else{
								?>
                                        <li class="prev ">
                                        	<a href="<?php echo "{$_SERVER['PHP_SELF']}?page=form&save=1&search2=$_GET[search2]&pageno2=$prevpage"?>">← Previous</a>
                                        </li>
                                <?php
									}
								?>
							
                                 <?php
                                 	$nextpage = $pageno2+1;
									if($pageno2 == $lastpage){
                                 ?>
										<li class="next disabled">
                                			<a href="#">Next → </a>
										</li>
                                <?php
									}else{
								?>
                                        <li class="next">
                                        	<a href="<?php echo "{$_SERVER['PHP_SELF']}?page=form&save=1&search2=$_GET[search2]&pageno2=$nextpage"?>">Next → </a>                          				</li>
                                <?php
									}
								?>
							</ul>
							</div>
						</div>
						</div>
                        </div>
                                    
                                    
                                    
                                    
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->