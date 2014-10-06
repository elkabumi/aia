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
         <?php
                if(isset($_GET['add']) && $_GET['add'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan sukses !</b>
                </div>
           
          		 <?
				}
				?>
 	  <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Total data clean <?=$count_clean?></b>
                </div>
           
   </section>              
   <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Total data not found <?=$count_not_found?></b>
                </div>
           
   </section>
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
                                                <th>Nama leader</th>
                                                <th>config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                          	 $no = 1;
                                           	 while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['agent_code_tmp_event']?></td>
                                                <td><?= $row['agent_name_tmp_event']?></td>
                                                <td><?= $row['agent_ktp_tmp_event']?></td>
                                                <td><?= $row['agent_leder_name_tmp_event']?></td>
                                                <td style="text-align:center;">
                                                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['0']; ?>,'training_dashboard.php?page=delete_agent_tmp_event&id=<?=$id?>&agent_id_tmp_event=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>

                                            
                                            <?php if($count_not_found > '0'){ ?>
                                                <th><a href="<?= $update ?>" class="btn btn-danger btn-lg" >insert all Data</a></th>
                                                  <th><a href="<?= $ignore ?>" class="btn btn-danger btn-lg" >Cancel</a></th>
                                               <?php }else{?>
                                                <th><a href="<?= $ok ?>" class="btn btn-danger btn-lg" >Ok</a></th>
                                               
											   <?php }?>
                                               <!--<th><a href="<?//= $add ?>" class="btn btn-danger btn-lg" >Add new</a></th>-->
                                              
                                     
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->