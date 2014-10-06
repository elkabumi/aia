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
                                            <label>Feedback question</label>
                                            <input required type="text" name="i_question" class="form-control" placeholder="Enter ..." value="<?= $row->feedback_question ?>"/>
                                        </div>
                                     

                                        <div class="form-group">
                                        <label>Feedback type</label>
                                        <select class="form-control" name="i_type">
                                        <?php
                                        if(isset($_GET['type'])){ 
                                            $row->feedback_type_id = $_GET['type'];
                                        }
                                        $query_city = mysql_query("select * from  feedback_types");
                                        while($row_unit = mysql_fetch_array($query_city)){
                                        ?>
                                        <option value="<?= $row_unit['feedback_type_id']?>" <?php if($row_unit['feedback_type_id'] == $row->feedback_type_id){ ?>selected="selected" <?php } ?>><?= $row_unit['feedback_type_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Feedback format</label>
                                        <select class="form-control" name="i_format">
                                        <?php
                                        $query_city = mysql_query("select * from  feedback_formats where feedback_type_id = '".$row->feedback_type_id."'");
                                        while($row_unit = mysql_fetch_array($query_city)){
                                        ?>
                                        <option value="<?= $row_unit['feedback_format_id']?>" <?php if($row_unit['feedback_format_id'] == $row->feedback_format_id){ ?>selected="selected" <?php } ?>><?= $row_unit['feedback_format_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
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