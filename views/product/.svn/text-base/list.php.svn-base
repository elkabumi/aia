  <section class="content-header">
                    <h1>
                        <?= $title ?>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title ?></a></li>
                      
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
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Stock</th>
                                               
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><a href="product.php?page=list_his&id=<?= $row['product_id']?>"><?= $no ?></a></td>
                                                <td><a href="product.php?page=list_his&id=<?= $row['product_id']?>"><?= $row['product_code']?></a></td>
                                                <td><a href="product.php?page=list_his&id=<?= $row['product_id']?>"><?= $row['product_name']?></a></td>
                                                <td><a href="product.php?page=list_his&id=<?= $row['product_id']?>"><?= $row['product_stock']?></a></td>
                                               
                                                <td style="text-align:center;">
                                                    <a href="product.php?page=form&id=<?= $row['product_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['product_id']; ?>,'product.php?page=delete&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                    <a href="product.php?page=plus&id=<?= $row['product_id']?>" class="btn btn-danger" ><i class="fa fa-plus"></i></a>
                                                    <a href="product.php?page=minus&id=<?= $row['product_id']?>" class="btn btn-danger" ><i class="fa fa-minus"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="5"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->