   

<div class="preview_title" style="text-align:center; font-size:medium; font-weight:bold; width:1500px !important;">Facilitator Feedback Report
</div>
<br />                      

<div class="preview_top">
<table width="100%">

<tr>
<td width="19%">Nama Event</td>
<td width="4%">:</td>
<td width="77%"><?= $data_event->transaction_name ?></td>
</tr>
<tr>
<td width="19%">Tanggal</td>
<td width="4%">:</td>
<td width="77%"><?= format_date($data_event->transaction_date); ?></td>
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
<table width="100%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered" style="border-right:1px solid #eee;">
                                        <thead>
                                            <tr>
                                               <th width="5%" rowspan="2" valign="middle"><div style="padding-bottom:20px; text-align:center">NO</div></th>
                                                <th rowspan="2" valign="top"><div style="padding-bottom:20px; text-align:center">KARAKTERISTIK YANG DINILAI
</div></th>
                                                <th colspan="<?= $count_title_agent ?>" align="center"><div style="text-align:center;">PARTICIPANTS</div></th>
                                                <th rowspan="2" valign="top"><div style="padding-bottom:20px; text-align:center">AVERAGE</div></th>
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
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                          <?php
										  $total_average = 0;
										  $no_p_fac3 = 1;
										  while($row_p_fac3 = mysql_fetch_array($query_p_fac3)){
											
										  ?>
                                            <tr>
                                            	<td><?= $no_p_fac3 ?></td>
                                                <td><?= $row_p_fac3['feedback_question'] ?></td>
                                               
                                                <?php
												$yes = 0;
												
                                             $no_title_agent = 1;
											 	$query_title_value = mysql_query("select c.agent_name, a.feedback_id
												from feedbacks a
												join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
												join agents c on c.agent_id = b.agent_id
												where b.transaction_id = '$id' and a.feedback_type_id = '2'
												
												order by b.transaction_agent_id");
										  		while($row_title_agent2 = mysql_fetch_array($query_title_value)){
													
													$query_value = mysql_query("select * from feedback_answers where
																				feedback_item_id = '".$row_p_fac3['feedback_item_id']."' and feedback_id = '".$row_title_agent2['feedback_id']."'
							 													");
													$row_value = mysql_fetch_array($query_value);
													$row_value['feedback_answer'] = ($row_value['feedback_answer']) ? $row_value['feedback_answer'] : "-";
													if($row_value['feedback_answer'] == ""){
														$answer = "-";
													}else{
														$answer = $row_value['feedback_answer'];
													}
											 ?>	
                                               <td><?= $answer?></td>
                                               <?php
											   $yes = $yes + $answer;
											   
												}
												$count_title_agent = ($count_title_agent == 0) ? 1 : $count_title_agent;
												$average = $yes / $count_title_agent;
											   ?>
                                               <td><?= $average; ?></td>
                                          </tr>    <?php
  $no_p_fac3++;
  $total_average = $total_average + $average;
  }
  ?>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td colspan="<?= $count_title_agent?>"><strong>TOTAL</strong></td>
                                            
                                              <td><strong>
                                              <?= $total_average?>
                                              </strong></td>
                                            </tr>
                                      
                                              
                                        </tbody>
                                       
                                          
                                          </table>
                                        
