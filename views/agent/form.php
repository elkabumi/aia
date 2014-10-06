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
       							<label>Pic</label>
       						<input required type="text" name="pic" class="form-control" placeholder="Enter ..." value="<? echo $row->pic  ?>"/>
								</div>
								<div class="form-group">
       							<label>Month</label>
       				<input required type="text" name="month" class="form-control" placeholder="Enter ..." value="<?= $row->month  ?>"/>
								</div>
                                
                                
                                
                                
                                <div class="form-group">
       							<label>Agent code</label>
       							<input required type="text" name="agency_code" class="form-control" placeholder="Enter ..." value="<? echo $row->agent_code  ?>"/>
								</div>
								<div class="form-group">
       							<label>Agent Name</label>
       							<input required type="text" name="agency_name" class="form-control" placeholder="Enter ..." value="<?= $row->	agent_name  ?>"/>
								</div>
                                        
								<div class="form-group">
        						<label>Home City</label>
        						<select class="form-control" name="city_id">
           						 <?
             					 while($citi_id = mysql_fetch_array($city)){
           						 ?>
            					<option value="<?=$citi_id['city_id']?>" <? if($row->city_id == $citi_id['city_id']){?> selected="selected" <? } ?>>
									<?=$citi_id['city_name']?>
            					</option>
     					       <?
									}
								?>
       							</select>                         
								</div>

								<div class="form-group">
								<label>Agent Address</label>
								<textarea required class="form-control" name="agent_address" rows="3" placeholder="Enter ..."><? echo $row->agent_address ?></textarea>
								</div>
                                        
								<div class="form-group">
             					<label>Agent phone</label>
             					<input required type="text" name="agent_phone" class="form-control" placeholder="Enter ..." value="<?= $row->agent_phone ?>"/>
                                
								</div>

								<div class="form-group">
            					<label>Agent Ktp Number</label>
            					<input required type="text" name="agent_ktp_number" class="form-control" placeholder="Enter ..." value="<?= $row->agent_ktp_number ?>"/>
								</div>

								<div class="form-group">
            					<label>Agent Birth Place</label>
           						<input required type="text" name="agent_birth_place" class="form-control" placeholder="Enter ..." value="<?= $row->agent_birth_place ?>"/>
                            	</div>
           

 
      							<div class="form-group">
                                <label>Agent Birth Date</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_birth_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_birth_date ?>"/>
                                </div>
                                 </div>
 
 
 								<div class="form-group">
           						<label>Agent gender</label>
            					<select class="form-control" name="agent_gender">        
           	 							<option value="1"<? if($row->agent_gender == '1'){?> selected="selected"<? } ?>>Male</option>
            							<option value="2"<? if($row->agent_gender == '2'){?> selected="selected"<? } ?>>Female</option>
            
            					</select>
                             	</div> 

								<div class="form-group">
             					<label>Agent Status</label>        
              					<select class="form-control" name="agent_status">         
                      				<option value="1"<? if($row->agent_status == '1'){?> selected="selected"<? } ?>>Married</option>
                      				<option value="2"<? if($row->agent_status == '2'){?> selected="selected"<? } ?>>Single</option>  					           						</select>
								</div> 
                                
								<div class="form-group">
             					<label>Agent Last Education</label>
                                <select class="form-control" name="agent_last_education">
              					<?	
								$education = array('1'=>'TK','2'=>'SD','3'=>'SMP','4'=>'SMA','5'=>'D1','6'=>'D2','7'=>'D3','8'=>'S1','9'=>'S2','10'=>'S3');
								for ($x=1; $x<=10; $x++){
	   
								if($x == $row->agent_last_education){
									$tampilkan ='selected="selected"';
								}else{
									$tampilkan = '';
								}
								?>
									<option value="<?= $x ?> <?=$tampilkan ?>"><?=$education[$x]?></option>";
					    		<? 
								}
								?>                      
         						</select>
         	
								</div> 

								<div class="form-group">        
     							<label>Agent Position</label>
           						<input required type="text" name="agent_position" class="form-control" placeholder="Enter ..." value="<?= $row->agent_position?>"/>
								</div>   

								<div class="form-group">         
        						<label>Agent Senior Name</label>
        						<input required type="text" name="agent_senior_name" class="form-control" placeholder="Enter ..." value="<?= $row->agent_senior_name?>"/>
 								</div>   
                                      
                                      
                                <div class="form-group">
                                <label>Agent Join Date</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_join_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_join_date?>">
                                </div>
                                </div>   
                                 
                                 <div class="form-group">
                                <label>Agent Industry Entry Date</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_industry_entry_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_industry_entry_date ?>">
                                </div>
                                </div>      
                                      
								<div class="form-group">
           						<label>Lisensi</label>
                          		<select class="form-control" name="agent_license_type">
									<option value="0">null</option>";
       					  		</select>
								</div>  
                                   
                                 <div class="form-group">
                                <label>Agent Exam Date</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_exam_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_exam_date?>">
                                </div>
                                </div>     
                   
                
								<div class="form-group">
      							<label>Agent Registration</label>
          						<input required type="text" name="agent_registration" class="form-control" placeholder="Enter ..." value="<?= $row->agent_registration ?>"/>
								</div>

								<div class="form-group">
       							<label> agent_exam_status</label>
              					<select class="form-control" name="agent_exam_status">
									 <option value="1"<? if($row->agent_exam_status == '1'){?> selected="selected"<? } ?>>CPD</option>
                                     <option value="2"<? if($row->agent_exam_status == '2'){?> selected="selected"<? } ?>>NEW</option>
       							</select>
								</div>

								<div class="form-group">
        						<label>Agent Dc Regional</label>
           						<input required type="text" name="agent_dc_regional" class="form-control" placeholder="Enter ..." value="<?= $row->agent_dc_regional ?>"/>
								</div>

								<div class="form-group">
                                <label>agent_delivery_cd_date</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_delivery_cd_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_delivery_cd_date?>">
                                </div>
                                </div>   
                             
                             
                             
								<div class="form-group">
         						<label>Agent  active_status</label>
                                               
         						<select class="form-control" name="agent_active_status">
              						<option value="0"<? if($row->agent_active_status == '0'){?> selected="selected"<? } ?>>NOT CLEAN</option>
		      						<option value="1"<? if($row->agent_active_status == '1'){?> selected="selected"<? } ?>>CLEAN</option>
       						 	</select>
								</div>  

								<div class="form-group">
         						<label>Agent  Exam Hour</label>
         						<input required type="text" name="agent_exam_hour" class="form-control" placeholder="Enter ..." value="<?= $row->agent_exam_hour ?>"/>
 								</div>
                                     
                                <div class="form-group">
                                <label>Agent exam date is not selected</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_exam_date_is_not_selected" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_exam_date_is_not_selected?>">
                                </div>
                                </div>     
                                     
                                     

								<div class="form-group">
         						<label>Agent Certificate</label>
          						<input required type="text" name="agent_certificate" class="form-control" placeholder="Enter ..." value="<?= $row->agent_certificate ?>"/>
          						</div> 
           
								<div class="form-group">
          						<label>Agent Invoice Number</label>
        						<input required type="text" name="agent_invoice_number" class="form-control" placeholder="Enter ..." value="<?= $row->agent_invoice_number ?>"/>
          						</div> 
                                
                                       
         						<div class="form-group">
         						<label>Agent Invoice Status</label>
          						<select class="form-control" name="agent_invoice_status_id">
         		 				<option value="0"<? if($row->agent_invoice_status_id == '0'){?> selected="selected"<? } ?>> 
                                	SLIP SETOR
                                </option>
								</select>
								</div>      
                                
                                <div class="form-group">
                                <label>Agent exam Confirmation</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_exam_confirmation" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_exam_confirmation?>">
                                </div>
                                </div>
                                
                                
                                 <div class="form-group">
                                <label>Agent Enroll Date</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_enroll_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_enroll_date?>">
                                </div>
                                </div>
                                
                                
                                <div class="form-group">
                                <label>Agent CL Sheet</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_cl_sheet" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_cl_sheet?>">
                                </div>
                                </div>     
     
        
								<div class="form-group"> 
        						<label>Agent Result</label>
         				        <input required type="text" name="agent_result" class="form-control" placeholder="Enter ..." value="<?= $row->agent_result ?>"/>
								</div>

								<div class="form-group">
        						<label>Agent Btp Result</label>
          						<input required type="text" name="agent_btp_result" class="form-control" placeholder="Enter ..." value="<?= $row->agent_btp_result ?>"/>

								</div>

 								<div class="form-group">
            
								<label>Agent File Desctiption</label>      
  								<textarea required class="form-control" name="agent_file_desctiption" rows="3" placeholder="Enter ..."><?= $row->agent_file_desctiption ?></textarea>
								</div>  

 								<div class="form-group">
       							<label>Agent Card Delivery</label>
       							<input required type="text" name="agent_card_delivery" class="form-control" placeholder="Enter ..." value="<?= $row->agent_card_delivery ?>"/>
								</div>  
                                
								
                                    
                                <div class="form-group">
                                <label>Agent Graduated Date</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_graduated_date" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_graduated_date?>">
                                </div>
                                </div>
                                
                                
                                <div class="form-group">
                                <label>Agent Date of exit exam results</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_date_of_exit_exam_results" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_date_of_exit_exam_results?>">
                                </div>
                                </div>        
  
                                
 								<div class="form-group">
            					<label>Agent btp</label>
             					<input required type="text" name="agent_btp" class="form-control" placeholder="Enter ..." value="<?= $row->agent_btp ?>"/>
								</div>       
	 							
                                <div class="form-group">
              					<label>Agent Desctiption</label>
             					<textarea required class="form-control" name="agent_description" rows="3" placeholder="Enter ..."><?= $row->agent_description ?></textarea>
								</div>
                                
                                <div class="form-group">
                                <label>Agent File Come</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_file_come" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_file_come?>">
                                </div>
                                </div>        
  
       							<div class="form-group">
                                <label>Agent File proces</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input required class="form-control" name="agent_file_process" type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?= $row->agent_file_process?>">
                                </div>
                                </div> 
                                
                                       
								<div class="form-group">
                                <label>agent_check</label>
                                <input required type="text" name="agent_check" class="form-control" placeholder="Enter ..." value="<?= $row-> 	agent_check ?>"/>             
                                </div>
                                              
                                <div class="form-group">
                                <label>Office City</label>
                                <select class="form-control" name="office_city_id">
                                        <?
										$query = mysql_query("SELECT * FROM cities");
                                          while($ofice_city = mysql_fetch_array($query)){
                                       ?>
                                   <option value="<?=$ofice_city['city_id']?> <? if($row->office_city_id == $ofice_city['city_id']){?> selected <? } ?>">				
								   	<?=$ofice_city['city_name']?>
                                   </option>
                                        <?
										  }
										?>
                                  
                                  </select>
                             	  
                                  </div>
                                                         
                                  <div class="form-group">
                                  <label>exam City</label>
                                            
                                  <select class="form-control" name="exam_city_id">
                                   <?
								   		$query = mysql_query("SELECT * FROM cities");
                                     while($exam_city = mysql_fetch_array($query)){
                                   ?>
                                    <option value="<?=$exam_city['city_id']?> <? if($row->exam_city_id == $exam_city['city_id']){?> selected <? } ?>">
										<?=$exam_city['city_name']?>
                                    </option>
                                    <?
										}
									?>
                                   </select>
                                   </div>
                                      
                                   <div class="form-group">
                                   <label>branch </label>
                          
                               <input required type="text" name="agent_check" class="form-control" placeholder="Enter ..." value="<?= $row-> 	branch_id ?>"/>             
                             		</div>   
                                
                            
                                    <div class="form-group">
                                    <label>payment_method_id </label>
                                    <select class="form-control" name="payment_method_id">
                                    <option value="0"> </option>
                                    </option>
                                    </select>
                             		</div>
                                    
                                    <div class="form-group">
                                    <label>Agen relgion </label>
                                            
                                    <select class="form-control" name="religion_id">
                                      
                                                     <?
				$education = array('1'=>'islam','2'=>'kristen katolik','2'=>'kristen protestan','4'=>'hindu','5'=>'budha');
for ($x=1; $x<=10; $x++){
	   
						if($x == $row->religion_id){
							$tampilkan ='selected="selected"';
						}else{
							$tampilkan = '';
						}
						?>
						 		<option value="<?= $x ?> <?=$tampilkan ?>"><?=$education[$x]?></option>";
					<? }?>
                                           
                                </select>
                             	</div>      
                                
                                
                                
                                <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->