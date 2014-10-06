

                
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th width="3%">No</th>
                                                <th>Date</th>
                                                <th>Hour</th>
                                                <th>Name</th>
                                                <th>Trainer</th> 
                                                <th>Desc</th> 
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;

                                            while($row_footer = mysql_fetch_array($query_footer)){
                                           		//echo $row_footer['transaction_type_date'];
											 	if($row_footer['transaction_type_date'] == 1 ){
													$cunt_agent=count_agent($row_footer['transaction_id']);
													if($cunt_agent > '0' and $row_footer['sign_by_id'] != '0'){
														$block = "style='background-color:#D9EDF7; color:#000;'";
                                                		$link = "training_dashboard.php?page=form_save_view2&id=$row_footer[transaction_id]";
													}else{
														$block= '';
                                                		$link = "training_dashboard.php?page=form_save_view&id=$row_footer[transaction_id]";
													}
												 }else{
													$cunt_agent2=count_agent2($row_footer['transaction_type_date_id'],$row_footer['transaction_id']);
												if($cunt_agent2 > '0' and $row_footer['sign_by_id'] != '0'){
													$block = "style='background-color:#D9EDF7; color:#000;'";
                                               	 	$link = "training_dashboard.php?page=form_save_view2&id=$row_footer[transaction_type_date_id]";
                                         		}else{
													$block= '';
													$link = "training_dashboard.php?page=form_save_view&id=$row_footer[transaction_type_date_id]";
												}
												 }
							
											

											
											
                                            ?>
                                           
                                            <tr>
                                                <td <?=$block?>><a href="<?= $link ?>"><?= $no?></a></td>
                                                <td <?=$block?>><a href="<?= $link ?>"><?= format_date($row_footer['transaction_date'])?></a></td>
                                                <td <?=$block?>><a href="<?= $link ?>"><?= $row_footer['transaction_hour']?></a></td>
                                                <td <?=$block?>><a href="<?= $link ?>"><?= $row_footer['transaction_name']?></a></td>
                                                <td <?=$block?>><a href="<?= $link ?>"><?= $row_footer['user_name']?></a></td>
                                                <td <?=$block?>><a href="<?= $link ?>">Event date <?= $row_footer['transaction_type_date']?></a></td>
                                               
                                               
                                               
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                  

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="4"><a href="<?= $view_all_button ?>" class="btn btn-danger" >View All</a>

                                                </th>
                                               
                                              
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                