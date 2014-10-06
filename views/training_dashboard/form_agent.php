

                          
 <form role="form" action="<?=$action2?>" method="post">

                            <div class="box box-danger">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                      
                             
                               	<div class="form-group">
        						<label>Agent name</label>
        						<select class="form-control" name="agent_id">
           						 <?
								 	$query_agent=mysql_query("select agent_id,agent_name from agents where agent_active_status ='1'");
             					 	while($agent_id = mysql_fetch_array($query_agent)){
           						 ?>
            					<option value="<?=$agent_id['agent_id']?>">
									<?=$agent_id['agent_name']?>
            					</option>
     					      	 <?
									}
								?>
       							</select>                         
								</div>
                                 		
                                        
                                       
                                      
                                   
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button2?>" class="btn btn-danger" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                    