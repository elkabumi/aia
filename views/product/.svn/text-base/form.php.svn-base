<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $title?> 
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title?> </a></li>
                        
                        <li class="active">Form</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-danger">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_code" class="form-control" placeholder="Enter ..." value="<?= $row->product_code ?>"/>
                                        </div>
                                     

                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="i_name" rows="3" placeholder="Enter ..."><?= $row->product_name ?></textarea>
                                        </div>
                                        
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Stock</label>
                                            
                                            <input required <? if($ada != ''){ ?> readonly="readonly" <? }?> type="text" name="i_stock" class="form-control" placeholder="Enter ..." value="<?= $row->product_stock ?>"/>
                                        </div>
                                      
                                   
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->