  <section class="content-header">
                    <h1>
                        Cek Data from excel
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"> <?= $title ?></a></li>
                      
                        <li class="active">Data view from excel</li>
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
                <b>Total data dari file excel <?=$count?></b>
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
                                                <th>Home City</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                          	 $no = 1;
                                           	 while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['agent_code_tmp_excel']?></td>
                                                <td><?= $row['agent_name_tmp_excel']?></td>
                                                <td><?= $row['agent_ktp_number_tmp_excel']?></td>
                                                <td><?= $row['city_id_tmp_excel']?></td>
                                                <td><?= $row['agent_active_status_tmp_excel']?></td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th><a href="<?= $update ?>" class="btn btn-danger " >Insert Data</a></th>
                                                <th><a href="<?= $ignore ?>" class="btn btn-danger " >Cancel</a></th>
                                     
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->