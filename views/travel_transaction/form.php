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

                            <div class="box box-primary">
                                
                               
                         <div class="box-body">
                                    
                                        <!-- text input -->
                                <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="travel_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->travel_date?>">
                                </div>
                                </div>   
                                
                            
                                <div class="bootstrap-timepicker">
                                <div class="form-group">
            					<label>Jam</label>
           						<input required type="text" name="travel_hour"  class="form-control timepicker" placeholder="Enter ..." value="<?= $row->travel_hour ?>"/>
                            	</div>
                                </div>
							
								<div class="form-group">
       							<label>Maskapai / Armada</label>
       							<input required type="text" name="travel_maskapai_name" class="form-control" placeholder="Enter ..." value="<?= $row->travel_maskapai_name  ?>"/>
								</div>
                                
                                <div class="form-group">
       							<label>Dari</label>
       							<input required type="text" name="travel_from" class="form-control" placeholder="Enter ..." value="<?= $row->travel_from  ?>"/>
								</div>
                                        
								<div class="form-group">
       							<label>Ke</label>
       							<input required type="text" name="travel_to" class="form-control" placeholder="Enter ..." value="<?= $row->travel_to  ?>"/>
								</div>
                                
                                <div class="form-group">
       							<label>Hotel</label>
       							<input required type="text" name="travel_hotel_name" class="form-control" placeholder="Enter ..." value="<?= $row->travel_hotel_name  ?>"/>
								</div>
                                
                                  <div class="form-group">
                                <label>Check In</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="travel_check_in" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->travel_check_in?>">
                                </div>
                                </div>   
                                
                                 <div class="form-group">
                                <label>Check Out</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="travel_check_out" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->travel_check_out?>">
                                </div>
                                </div>   
                                      

								<div class="form-group">
								<label>Keterangan</label>
								<textarea class="form-control" name="travel_description" rows="3" placeholder="Enter ..."><? echo $row->travel_description ?></textarea>
								</div>
                                        
								
								

                             
                            
                            </div><!-- /.box -->
                            <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                                </div>
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->