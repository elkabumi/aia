  <section class="content-header">
                    <h1>
                        Cek Data from excel
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"> <?= $title ?></a></li>
                      
                        <li class="active">Data</li>
                    </ol>
</section>     
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
                <b>Total data dari file excel <?=$count_data?></b>
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
                  							<input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search nomer ktp" value="<?=$_GET['search']?>"/>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                          	$no = ($pageno2 - 1) * 10 + 1;
                                           	 while($row = mysql_fetch_array($query)){
												if($row['agent_active_status_tmp_excel'] == '1'){
													$status_active ='CLEAN';
												}else{
													$status_active ='NOT CLEAN';
												}
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['agent_code_tmp_excel']?></td>
                                                <td><?= $row['agent_name_tmp_excel']?></td>
                                                <td><?= $row['agent_ktp_number_tmp_excel']?></td>
                                                <td><?= $row['city_id_tmp_excel']?></td>
                                                <td><?= $status_active ?></td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th><a href="<?= $update ?>" class="btn btn-danger " >Update Data</a></th>
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
                                        	<a href="<?php echo "{$_SERVER['PHP_SELF']}?page=agent_list_cek&search=$_GET[search]&pageno2=$prevpage"?>">← Previous</a>
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
                                        	<a href="<?php echo "{$_SERVER['PHP_SELF']}?page=agent_list_cek&search=$_GET[search]&pageno2=$nextpage"?>">Next → </a>                          				</li>
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