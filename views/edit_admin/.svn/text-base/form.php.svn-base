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

                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Password dan confirm password tidak sama
                </div>
           
                </section>
                <?
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Edit sukses</b>
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['err']) && $_GET['err'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Mohon Gunakan</b>
              username dengan nama lain!
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-danger">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                         <div class="form-group">
                                            <label>Code</label>
                                            <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $row->user_code ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter name ..." value="<?= $row->user_name ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required class="form-control" name="i_birth_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->user_birth_date?>">
                                        </div>
                                        </div>

                                         <div class="form-group">
                                            <label>Email</label>
                                       <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                        </span>
                                        <input required class="form-control" name="i_email" type="email" placeholder="Enter email ..." value="<?= $row->user_email?>">
                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </div>
                                        <input required class="form-control" type="text" name="i_phone" placeholder="Enter phone ..." value="<?= $row->user_phone?>">
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control" name="i_city_id">
                                        <?php
                                        $query_city = mysql_query("select * from cities");
                                        while($row_city = mysql_fetch_array($query_city)){
                                        ?>
                                        <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $row->city_id){ ?>selected <?php } ?>><?= $row_city['city_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input required type="text" name="i_account_number" class="form-control" placeholder="Enter account number ..." value="<?= $row->user_account_number ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Bank Name</label>
                                            <input required type="text" name="i_bank_name" class="form-control" placeholder="Enter bank name ..." value="<?= $row->user_bank_name ?>"/>
                                        </div>
                                          <div class="form-group">
                                            <label>User login</label>
                                            <input required type="text" name="i_login" class="form-control" placeholder="Enter user login ..." value="<?= $row->user_login ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input   type="password" name="i_password" class="form-control" placeholder="Enter password ..." value=""/>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input   type="password" name="i_confirm_password" class="form-control" placeholder="Enter confirm password ..." value=""/>
                                        </div>
                                         <div class="form-group">
                                         <label>Images</label>
                                           <input type="file" name="i_img" id="i_img" />
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