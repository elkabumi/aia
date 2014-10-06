  <?php 
  echo $format;
  ?>
					<div class="preview_title" style="text-align:center; font-size:medium; font-weight:bold;">Report Event Summary
</div>
	<div class="preview_title" style="text-align:center;  font-weight:bold;"><?= $i_date?>
</div>
<br>				
 <table id="example1" class="table table-bordered table-striped" width="100%" border="1" cellspacing="0" cellpadding="4">
                                        <thead>
                                            <tr height="30">
                                            <th width="5%">No</th>
                                                <th>Date</th>
                                                 <th>Name</th>
												  <th>Type</th>
												  <th>Trainer</th>
												  <th>Participants</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query)){
											$j_par = mysql_query("select count(*) as jumlah_participant from transaction_agents where transaction_id = '".$row_item['transaction_id']."'");
											$r_par = mysql_fetch_object($j_par);
                                            ?>
                                            <tr>
                                            <td valign="middle"><?= $no_item ?></td>
												<td><?= format_date($row_item['transaction_date']); ?></td>
                                                <td><?= $row_item['transaction_name']?></td>
												<td><?= $row_item['transaction_type_name']?></td>
                                                <td><?= $row_item['user_name']?></td>
												<td><?= $r_par->jumlah_participant ?></td>
                                               
                                               
                                                
                                                 </tr>
                                            <?php
											$no_item++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         
                                    </table>
