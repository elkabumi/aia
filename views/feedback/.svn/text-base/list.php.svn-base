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
                        <?php
                        $type = (isset($_GET['type'])) ? $_GET['type'] : "1";
                        ?>
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li <?php if($type == 1){ ?>class="active"<?php }?> ><a href="#tab_1" data-toggle="tab">Feedback GTS</a></li>
                                    <li <?php if($type == 2){ ?>class="active"<?php }?>><a href="#tab_2" data-toggle="tab">Feedback Facilitator</a></li>
                                  
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane <?php if($type == 1){ ?>active<?php }?>" id="tab_1">
                                        
                                        <div class="box">
                                            <div class="box-body no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                    <th width="5%">No</th>
                                                        <th>Title</th>
                                                        
                                                       <th>Format</th>
                                                        <th width="20%">Config</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   $no= 1;
                                                    while($row = mysql_fetch_array($query)){
                                                    ?>
                                                    <tr>
                                                    <td><?= $no ?></td>
                                                        <td><?= $row['feedback_question']?></td>
                                                        
                                                        <td><?= $row['feedback_format_name']?></td>
                                                       
                                                        <td style="text-align:center;">
                                                   <a href="feedback.php?page=form&id=<?= $row['feedback_item_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['feedback_item_id']; ?>,'feedback.php?page=delete&type=1&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                    }
                                                    ?>

                                                   
                                                  
                                                </tbody>
                                                  <tfoot>
                                                    <tr>
                                                        <th colspan="4"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a>&nbsp; <a class="btn btn-danger "  id="dialogModal_ex1" >Preview</a></th>
                                                       
                                                       
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->

                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane <?php if($type == 2){ ?>active<?php }?>" id="tab_2">
                                        
                                         <div class="box">
                                            <div class="box-body no-padding">
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                    <th width="5%">No</th>
                                                        <th>Title</th>
                                                        
                                                       <th>Format</th>
                                                        <th width="20%">Config</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   $no2= 1;
                                                    while($row2 = mysql_fetch_array($query2)){
                                                    ?>
                                                    <tr>
                                                    <td><?= $no2 ?></td>
                                                        <td><?= $row2['feedback_question']?></td>
                                                        
                                                        <td><?= $row2['feedback_format_name']?></td>
                                                       
                                                        <td style="text-align:center;">
                                                   <a href="feedback.php?page=form&id=<?= $row2['feedback_item_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row2['feedback_item_id']; ?>,'feedback.php?page=delete&type=2&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no2++;
                                                    }
                                                    ?>

                                                   
                                                  
                                                </tbody>
                                                  <tfoot>
                                                    <tr>
                                                        <th colspan="4"><a href="<?= $add_button2 ?>" class="btn btn-danger " >Add</a>&nbsp; <a class="btn btn-danger "  id="dialogModal_ex2" >Preview</a></th>
                                                       
                                                       
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->

                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            
                             
                                
                           
                        </div>
                    </div>



                </section><!-- /.content -->



   
<div style="display:none">
<div id="dialog_content" class="dialog_content" style="display:none">
    <div class="dialogModal_header">Preview Feedback GTS</div>
    <div class="dialogModal_content">
    <?php
    include 'preview_gts.php';
    ?>
    </div>
    
</div>

<div id="dialog_content2" class="dialog_content2" style="display:none">
    <div class="dialogModal_header">Preview Feedback Facilitator</div>
    <div class="dialogModal_content">
    <?php
    include 'preview_facilitator.php';
    ?>
    </div>
    
</div>
</div>

<script>
$(function(){
    $('#dialogModal_ex1').click(function(){
        $('.dialog_content').dialogModal({
            onOkBut: function() {},
            onCancelBut: function() {},
            onLoad: function() {},
            onClose: function() {},
        });
    });

    $('#dialogModal_ex2').click(function(){
        $('.dialog_content2').dialogModal({
            onOkBut: function() {},
            onCancelBut: function() {},
            onLoad: function() {},
            onClose: function() {},
        });
    });
    
});
</script>