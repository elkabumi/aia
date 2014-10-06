  <div class="box-footer">
                                
                                <?php
								
                                if(isset($_GET['ok']) && $_GET['ok'] == '1'){
								?>
                                <a href="training_dashboard.php?page=list" class="btn btn-danger" >Close</a>
                                <?php }else{ ?>
                                <a href="<?= $save2?>" class="btn btn-danger" >Save</a>
                                <?php } ?>
								
                   </div>
                            
                    </div>
                            <!-- /.box -->         
                            </div><!--/.col (r{ght) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->