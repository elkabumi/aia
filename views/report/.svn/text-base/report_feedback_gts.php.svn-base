  
<div class="preview_title" style="text-align:center; font-size:medium; font-weight:bold; width:1500px !important;">GTS Feedback Report
</div>
<br />                      

<div class="preview_top">
<table width="100%">

<tr>
<td width="19%">Nama Event</td>
<td width="2%">:</td>
<td width="79%"><?= $data_event->transaction_name ?></td>
</tr>
<tr>
<td width="19%">Tanggal</td>
<td width="2%">:</td>
<td width="79%"><?= format_date($data_event->transaction_date); ?></td>
</tr>
<tr>
<td>Lokasi Training</td>
<td>:</td>
<td><?= $data_event->unit_name?></td>
</tr>
<tr>
<td>ADM / Trainer</td>
<td>:</td>
<td><?= $data_event->trainer_name?></td>
</tr>
</table>
</div>

<br />
<table width="200%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered" style="border-right:1px solid #eee;">
                                        <thead>
                                            <tr>
                                               <th width="5%" rowspan="2" valign="middle"><div style="padding-bottom:20px; text-align:center">No</div></th>
                                                <th width="62%" rowspan="2" valign="top"><div style="padding-bottom:20px; text-align:center">Training Satisfaction Level
</div></th>
                                                <th width="20%" colspan="<?= $count_title_agent ?>" align="center"><div style="text-align:center;">Participants</div></th>
                                                <th colspan="2" align="center"><div style="text-align:center;">Result</div></th>
                                            </tr>
                                             <tr>
                                             <?php
                                             $no_title_agent = 1;
										  		while($row_title_agent = mysql_fetch_array($query_title_agent)){
											 ?>
                                               <th><?= $no_title_agent ?></th>
                                               <?php
											  $no_title_agent++;
											  }
											  ?>
                                              <th width="7%">Yes</th>
                                              <th width="6%">No</th>
                                             
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                          <?php
										  $no_p_gts1 = 1;
										  while($row_p_gts1 = mysql_fetch_array($query_p_gts1)){
											
										  ?>
                                            <tr>
                                            	<td><?= $no_p_gts1 ?></td>
                                                <td><?= $row_p_gts1['feedback_question'] ?></td>
                                               
                                                <?php
												$yes = 0;
                                             
											 	$query_title_value = mysql_query("select c.agent_name, a.feedback_id
												from feedbacks a
												join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
												join agents c on c.agent_id = b.agent_id
												where b.transaction_id = '$id' and a.feedback_type_id = '1'
												
												order by b.transaction_agent_id");
										  		while($row_title_agent2 = mysql_fetch_array($query_title_value)){
													
													$query_value = mysql_query("select * from feedback_answers where
																				feedback_item_id = '".$row_p_gts1['feedback_item_id']."' and feedback_id = '".$row_title_agent2['feedback_id']."'
							 													");
													$row_value = mysql_fetch_array($query_value);
													$row_value['feedback_answer'] = ($row_value['feedback_answer']) ? $row_value['feedback_answer'] : "-";
													if($row_value['feedback_answer'] == 1){
														$answer = 1;
													}else if($row_value['feedback_answer'] == 2){
														$answer = 0;
													}else{
														$answer = "-";
													}
													
											 ?>	
                                               <td><?= $answer?></td>
                                               <?php
											   $yes = $yes + $answer;
												}
											   ?>
                                               <td>
                                               <?php
                                               $count_title_agent = ($count_title_agent == 0) ? 1 : $count_title_agent;
											   $persen_yes = $yes / $count_title_agent * 100;
											   echo $persen_yes." %";
											   ?>
                                               </td>
                                               <td><?php
                                               $persen_no = 100 - $persen_yes;
											   echo $persen_no." %";
											   ?></td>
                                             
                                               
                                          </tr>
                                          <?php
  $no_p_gts1++;
  }
  ?>
                                              
                                        </tbody>
                                       
                                          
              </table>
                                  </div>
                                          <br />
                                   <div class="preview_title">Next Training Expectation</div>
                                   

                                                                 
<div class="box-body2 table-responsive">
<table width="200%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered" style="border-right:1px solid #eee;">
                                        <thead>
                                            <tr>
                                               <th width="5%" rowspan="2" valign="middle"><div style="padding-bottom:20px; text-align:center">No</div></th>
                                                <th width="62%" rowspan="2" valign="top"><div style="padding-bottom:20px; text-align:center">Apa yang anda dapat dari Program GTS

</div></th>
                                                <th width="20%" colspan="<?= $count_title_agent ?>" align="center"><div style="text-align:center;">Participants</div></th>
                                                <th colspan="2" align="center"><div style="text-align:center;">Result</div></th>
                                            </tr>
                                             <tr>
                                             <?php
                                             $no_title_agent2 = 1;
										  		while($row_title_agent2 = mysql_fetch_array($query_title_agent2)){
											 ?>
                                               <th><?= $no_title_agent2 ?></th>
                                               <?php
											  $no_title_agent2++;
											  }
											  ?>
                                              <th width="7%">Yes</th>
                                              <th width="6%">No</th>
                                             
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                          <?php
										  $no_p_gts2 = 1;
										  while($row_p_gts2 = mysql_fetch_array($query_p_gts2)){
											
										  ?>
                                            <tr>
                                            	<td><?= $no_p_gts2 ?></td>
                                                <td><?= $row_p_gts2['feedback_question'] ?></td>
                                               
                                                <?php
												$yes22 = 0;
                                            	
											 	$query_title_value22 = mysql_query("select c.agent_name, a.feedback_id
												from feedbacks a
												join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
												join agents c on c.agent_id = b.agent_id
												where b.transaction_id = '$id' and a.feedback_type_id = '1'
												
												order by b.transaction_agent_id");
										  		while($row_title_agent22 = mysql_fetch_array($query_title_value22)){
													
													$query_value22 = mysql_query("select * from feedback_answers where
																				feedback_item_id = '".$row_p_gts2['feedback_item_id']."' and feedback_id = '".$row_title_agent22['feedback_id']."'
							 													");
													$row_value22 = mysql_fetch_array($query_value22);
													$row_value22['feedback_answer'] = ($row_value22['feedback_answer']) ? $row_value22['feedback_answer'] : "-";
													if($row_value22['feedback_answer'] == 1){
														$answer22 = 1;
													}else if($row_value22['feedback_answer'] == 2){
														$answer22 = 0;
													}else{
														$answer22 = "-";
													}
													
											 ?>	
                                               <td><?= $answer22?></td>
                                               <?php
											   $yes22 = $yes22 + $answer22;
												}
											   ?>
                                               <td>
                                               <?php
                                               $count_title_agent = ($count_title_agent == 0) ? 1 : $count_title_agent;
											   $persen_yes22 = $yes22 / $count_title_agent * 100;
											   echo $persen_yes22." %";
											   ?>
                                               </td>
                                               <td><?php
                                               $persen_no22 = 100 - $persen_yes22;
											   echo $persen_no22." %";
											   ?></td>
                                             
                                               
                                          </tr>
                                          <?php
  $no_p_gts2++;
  }
  ?>
                                              
                                        </tbody>
                                       
                                          
  </table>
</div>
                                          <br />
                                          
                                                                                                   
<div class="box-body2 table-responsive">
<table width="200%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered" style="border-right:1px solid #eee;">
                                        <thead>
                                            <tr>
                                               <th width="5%" rowspan="2" valign="middle"><div style="padding-bottom:20px; text-align:center">No</div></th>
                                                <th width="62%" rowspan="2" valign="top"><div style="padding-bottom:20px; text-align:center">Apa yang anda butuhkan untuk mendukung aktifitas penjualan


</div></th>
                                                <th width="20%" colspan="<?= $count_title_agent ?>" align="center"><div style="text-align:center;">Participants</div></th>
                                                <th colspan="2" align="center"><div style="text-align:center;">Result</div></th>
                                            </tr>
                                             <tr>
                                             <?php
                                             $no_title_agent3 = 1;
										  		while($row_title_agent3 = mysql_fetch_array($query_title_agent3)){
											 ?>
                                               <th><?= $no_title_agent3 ?></th>
                                               <?php
											  $no_title_agent3++;
											  }
											  ?>
                                              <th width="7%">Yes</th>
                                              <th width="6%">No</th>
                                             
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                          <?php
										  $no_p_gts3 = 1;
										  while($row_p_gts3 = mysql_fetch_array($query_p_gts3)){
											
										  ?>
                                            <tr>
                                            	<td><?= $no_p_gts3 ?></td>
                                                <td><?= $row_p_gts3['feedback_question'] ?></td>
                                               
                                                <?php
												$yes33 = 0;
                                            	
											 	$query_title_value33 = mysql_query("select c.agent_name, a.feedback_id
												from feedbacks a
												join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
												join agents c on c.agent_id = b.agent_id
												where b.transaction_id = '$id' and a.feedback_type_id = '1'
												
												order by b.transaction_agent_id");
										  		while($row_title_agent33 = mysql_fetch_array($query_title_value33)){
													
													$query_value33 = mysql_query("select * from feedback_answers where
																				feedback_item_id = '".$row_p_gts3['feedback_item_id']."' and feedback_id = '".$row_title_agent33['feedback_id']."'
							 													");
													$row_value33 = mysql_fetch_array($query_value33);
													$row_value33['feedback_answer'] = ($row_value33['feedback_answer']) ? $row_value33['feedback_answer'] : "-";
													if($row_value33['feedback_answer'] == 1){
														$answer33 = 1;
													}else if($row_value33['feedback_answer'] == 2){
														$answer33 = 0;
													}else{
														$answer33 = "-";
													}
													
											 ?>	
                                               <td><?= $answer33?></td>
                                               <?php
											   $yes33 = $yes33 + $answer33;
												}
											   ?>
                                               <td>
                                               <?php
                                               $count_title_agent = ($count_title_agent == 0) ? 1 : $count_title_agent;
											   $persen_yes33 = $yes33 / $count_title_agent * 100;
											   echo $persen_yes33." %";
											   ?>
                                               </td>
                                               <td><?php
                                               $persen_no33 = 100 - $persen_yes33;
											   echo $persen_no33." %";
											   ?></td>
                                             
                                               
                                          </tr>
                                          <?php
  $no_p_gts3++;
  }
  ?>
                                              
                                        </tbody>
                                       
                                          
  </table>
</div>
                                          <br />
                                          
                                          <div class="box-body2 table-responsive">
<table width="200%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered" style="border-right:1px solid #eee;">
                                        <thead>
                                            <tr>
                                               <th width="5%" rowspan="2" valign="middle"><div style="padding-bottom:20px; text-align:center">No</div></th>
                                                <th width="62%" rowspan="2" valign="top"><div style="padding-bottom:20px; text-align:center">Topik berikutnya yang dibutuhkan



</div></th>
                                                <th width="20%" colspan="<?= $count_title_agent ?>" align="center"><div style="text-align:center;">Participants</div></th>
                                                <th colspan="2" align="center"><div style="text-align:center;">Result</div></th>
                                            </tr>
                                             <tr>
                                             <?php
                                             $no_title_agent4 = 1;
										  		while($row_title_agent4 = mysql_fetch_array($query_title_agent4)){
											 ?>
                                               <th><?= $no_title_agent4 ?></th>
                                               <?php
											  $no_title_agent4++;
											  }
											  ?>
                                              <th width="7%">Yes</th>
                                              <th width="6%">No</th>
                                             
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                          <?php
										  $no_p_gts4 = 1;
										  while($row_p_gts4 = mysql_fetch_array($query_p_gts4)){
											
										  ?>
                                            <tr>
                                            	<td><?= $no_p_gts4 ?></td>
                                                <td><?= $row_p_gts4['feedback_question'] ?></td>
                                               
                                                <?php
												$yes44 = 0;
                                            	
											 	$query_title_value44 = mysql_query("select c.agent_name, a.feedback_id
												from feedbacks a
												join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
												join agents c on c.agent_id = b.agent_id
												where b.transaction_id = '$id' and a.feedback_type_id = '1'
												
												order by b.transaction_agent_id");
										  		while($row_title_agent44 = mysql_fetch_array($query_title_value44)){
													
													$query_value44 = mysql_query("select * from feedback_answers where
																				feedback_item_id = '".$row_p_gts4['feedback_item_id']."' and feedback_id = '".$row_title_agent44['feedback_id']."'
							 													");
													$row_value44 = mysql_fetch_array($query_value44);
													$row_value44['feedback_answer'] = ($row_value44['feedback_answer']) ? $row_value44['feedback_answer'] : "-";
													if($row_value44['feedback_answer'] == 1){
														$answer44 = 1;
													}else if($row_value44['feedback_answer'] == 2){
														$answer44 = 0;
													}else{
														$answer44 = "-";
													}
													
											 ?>	
                                               <td><?= $answer44?></td>
                                               <?php
											   $yes44 = $yes44 + $answer44;
												}
											   ?>
                                               <td>
                                               <?php
                                               $count_title_agent = ($count_title_agent == 0) ? 1 : $count_title_agent;
											   $persen_yes44 = $yes44 / $count_title_agent * 100;
											   echo $persen_yes44." %";
											   ?>
                                               </td>
                                               <td><?php
                                               $persen_no44 = 100 - $persen_yes44;
											   echo $persen_no44." %";
											   ?></td>
                                             
                                               
                                          </tr>
                                          <?php
  $no_p_gts4++;
  }
  ?>
                                              
                                        </tbody>
                                       
                                          
</table>
                         

