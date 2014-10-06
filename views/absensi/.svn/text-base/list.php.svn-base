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
                                                <th>Lokasi</th>
                                                <th>Tanggal</th>
                                                <th>Total agent</th>
                                                <th>Nama Fasilitator</th>
                                                
                                                <th width="20%" align="center">Config</th>
                                                <th  align="center">Cetak absensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
												$query_agent=mysql_query("SELECT COUNT( agent_id ) AS total_agent
																			FROM transaction_agents
																			WHERE transaction_id =  '". $row['transaction_id']."'");
															$date=format_date($row['transaction_date']);
												$data=mysql_fetch_array($query_agent);
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= format_date($row['transaction_date'])?></td>
                                                <td><?= $row['transaction_name']?></td>
                                                <td><?= $row['unit_name']?></td>
                                                <td><?= $date?></td>
                                                <td><?= $data['total_agent']?></td>
                                                <td><?= $row['user_name']?></td>
                                                <td style="text-align:center;">
                                              
            <a href="absensi.php?page=form&id=<?= $row['transaction_id']?>" class="btn btn-danger" >Process</a>
            <a href="absensi.php?page=form_view&id=<?= $row['transaction_id']?>&type=1" class="btn btn-danger" >Report</a>
            </td>
            <td  style="text-align:center;">
            <a href="absensi.php?page=download_form&id=<?= $row['transaction_id']?>" class="btn btn-danger" >Download</a>
                </td>                               
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