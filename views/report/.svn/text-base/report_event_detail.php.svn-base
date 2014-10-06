  <?php 
  echo $format;
  ?>
					<div class="preview_title" style="text-align:center; font-size:medium; font-weight:bold;">Report Event Detail
</div>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="20%"><strong>Event Name</strong></td>
    <td width="3%">:</td>
    <td width="77%"><?= $row->transaction_name ?></td>
  </tr>
  <tr>
    <td><strong>Time</strong></td>
    <td>:</td>
    <td><?= $all_date ?></td>
  </tr>
  <tr>
    <td><strong>Event Hour</strong></td>
    <td>:</td>
    <td><?= "(".$row->transaction_hour.")"; ?></td>
  </tr>
  <tr>
    <td><strong>Event Type</strong></td>
    <td>:</td>
    <td><?= $row->transaction_type_name ?></td>
  </tr>
  <tr>
    <td><strong>City</strong></td>
    <td>:</td>
    <td><?= $row->unit_name ?></td>
  </tr>
  <tr>
    <td><strong>Event description</strong></td>
    <td>:</td>
    <td><? echo $row->transaction_description ?></td>
  </tr>
</table>

	
<br><!-- /.box -->	

<div class="preview_title" style="  font-weight:bold;">Data Trainer</div>
 <table width="100%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                               <th width="4%">No</th>
                                               <th width="27%">Trainer Type</th>
                                                <th width="37%">Trainer Code</th>
                                                <th width="32%">Trainer name</th>
                                                <th width="32%">Phone</th>
                                                <th width="32%">City</th> 
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_trainer_view)){
												if($row['user_type_id'] == '2'){
													$status = 'ADM'; 
												}else { 
													$status = 'Premier Builder';
												}
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= $status?></td>
                                                <td><?= $row['user_code']?></td>
                                                <td><?= $row['user_name']?></td>
                                                <td><?= $row['user_phone']?></td>
                                                <td><?= $row['city_name']?></td>
                                              
                                               

                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                        
                                    </table>
                                    <br />
<div class="preview_title" style=" font-weight:bold;">Data Participant</div>
                                    <table width="100%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered table-striped" id="example3">
                                        <thead>
                                            <tr>
                                               <th width="3%">No</th>
                                                  <th width="15%"> Code</th>
                                               <th width="16%"> Name</th>
                                             
                                                <th width="21%"> KTP Number</th>
                                                <th width="23%">Phone</th>
                                                <th width="22%">Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query_agent_view)){
											
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                                <td><?= $row['agent_code']?></td>
                                                <td><?= $row['agent_name']?></td>
                                                <td><?= "&nbsp;".$row['agent_ktp_number']?></td>
                                                <td><?= "&nbsp;".$row['agent_phone']?></td>
                                                <td><?= $row['agent_address']?></td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         
                                    </table>