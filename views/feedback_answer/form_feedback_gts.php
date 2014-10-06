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
                        <form role="form" action="<?= $action?>" method="post">
                         <div class="box box-danger">
                                
                               
                                <div class="box-body">
                        
<div class="preview_title">GUARANTEE TO SUCCESS 
FEED BACK FORM
</div>
<div class="preview_top">
<table width="100%">
<tr>
<td width="19%">Nama Agent</td>
<td width="4%">:</td>
<td width="77%"><?= $agent_name ?></td>
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
<table width="100%" border="1" cellspacing="0" cellpadding="4">
  <tr>
    <td width="78%"><strong>Setelah mengikuti Program Training ini apakah Anda :</strong></td>
    <td width="11%" align="center"><strong>Ya</strong></td>
    <td width="11%" align="center"><strong>Tidak</strong></td>
  </tr>
  <?php
  $no_p_gts1 = 1;
  while($row_p_gts1 = mysql_fetch_array($query_p_gts1)){
	  $answer1 = "";
  if($check_data > 0){
	  
	  $answer1 = $row_p_gts1['feedback_answer'];
  }
  ?>
  <tr>
    <td><?= $no_p_gts1.". ".$row_p_gts1['feedback_question']?></td>
    <td align="center"><label>
        <input name="r<?= $no_p_gts1?>" type="radio" class="flat-red" value="1" <?php if($answer1 == 1){ ?> checked="checked"<?php } ?> required/>
                                      </label>
    </td>
    <td align="center"><label>
        <input name="r<?= $no_p_gts1?>" type="radio" class="flat-red" value="2" <?php if($answer1 == 2){ ?> checked="checked"<?php } ?> required/>                                                    
    </label></td>
  </tr>
   <?php
  $no_p_gts1++;
  }
  ?>
</table>
<br />
<div class="preview_category">Next Training Expectation

</div>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
  <tr>
    <td width="78%"><strong>Apa yang anda dapat dari Program GTS
</strong></td>
    <td width="11%" align="center"><strong>Ya</strong></td>
    <td width="11%" align="center"><strong>Tidak</strong></td>
  </tr>
  <?php
  $no_p_gts2 = 1;
  while($row_p_gts2 = mysql_fetch_array($query_p_gts2)){
	  $answer2 = "";
  if($check_data > 0){
	  
	  $answer2 = $row_p_gts2['feedback_answer'];
  }
  ?>
  <tr>
    <td><?= $no_p_gts2.". ".$row_p_gts2['feedback_question']?></td>
    <td align="center"><label>
        <input name="r2<?= $no_p_gts2?>" type="radio" class="flat-red" value="1" <?php if($answer2 == 1){ ?> checked="checked"<?php } ?> required/>
                                      </label>
    </td>
    <td align="center"><label>
        <input name="r2<?= $no_p_gts2?>" type="radio" class="flat-red" value="2" <?php if($answer2 == 2){ ?> checked="checked"<?php } ?> required/>                                                    
    </label></td>
  </tr>
   <?php
  $no_p_gts2++;
  }
  ?>
</table>
<br />
<table width="100%" border="1" cellspacing="0" cellpadding="4">
  <tr>
    <td width="78%"><strong>Apa yang anda butuhkan untuk mendukung aktifitas penjualan

</strong></td>
    <td width="11%" align="center"><strong>Ya</strong></td>
    <td width="11%" align="center"><strong>Tidak</strong></td>
  </tr>
  <?php
  $no_p_gts3 = 1;
  while($row_p_gts3 = mysql_fetch_array($query_p_gts3)){
	  $answer3 = "";
  if($check_data > 0){
	  
	  $answer3 = $row_p_gts3['feedback_answer'];
  }
  ?>
  <tr>
    <td><?= $no_p_gts3.". ".$row_p_gts3['feedback_question']?></td>
    <td align="center"><label>
        <input name="r3<?= $no_p_gts3?>" type="radio" class="flat-red" value="1" <?php if($answer3 == 1){ ?> checked="checked"<?php } ?> required/>
                                      </label>
    </td>
    <td align="center"><label>
        <input name="r3<?= $no_p_gts3?>" type="radio" class="flat-red" value="2" <?php if($answer3 == 2){ ?> checked="checked"<?php } ?> required/>                                                    
    </label></td>
  </tr>
   <?php
  $no_p_gts3++;
  }
  ?>
</table>
<br />
<table width="100%" border="1" cellspacing="0" cellpadding="4">
  <tr>
    <td width="78%"><strong>Topik berikutnya yang dibutuhkan


</strong></td>
    <td width="11%" align="center"><strong>Ya</strong></td>
    <td width="11%" align="center"><strong>Tidak</strong></td>
  </tr>
  <?php
  $no_p_gts4 = 1;
  while($row_p_gts4 = mysql_fetch_array($query_p_gts4)){
	  $answer4 = "";
  if($check_data > 0){
	  
	  $answer4 = $row_p_gts4['feedback_answer'];
  }
  ?>
  <tr>
    <td><?= $no_p_gts4.". ".$row_p_gts4['feedback_question']?></td>
    <td align="center"><label>
        <input name="r4<?= $no_p_gts4?>" type="radio" class="flat-red" value="1" <?php if($answer4 == 1){ ?> checked="checked"<?php } ?> required/>
                                      </label>
    </td>
    <td align="center"><label>
        <input name="r4<?= $no_p_gts4?>" type="radio" class="flat-red" value="2" <?php if($answer4 == 2){ ?> checked="checked"<?php } ?> required/>                                                    
    </label></td>
  </tr>
   <?php
  $no_p_gts4++;
  }
  ?>
</table>
<br />
<input name="submit" type="submit" value="Save" class="btn btn-danger" />
 <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
</div>
</div>
</form>
</div>
</div>
</section>
