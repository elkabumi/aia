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

<div class="preview_title">LEMBAR PENILAIAN FASILITATOR<br />
Agency Premier Academy
</div>
<div class="preview_top">
<table width="100%">
<tr>
<td width="19%">Nama Agent</td>
<td width="4%">:</td>
<td width="77%"><?= $agent_name ?></td>
</tr>
<tr>
<td width="19%">Nama Fasilitator</td>
<td width="4%">:</td>
<td width="77%"><?= $data_event->trainer_name?></td>
</tr>
<tr>
<td>Topik Presentasi</td>
<td>:</td>
<td><?= $data_event->transaction_name?></td>
</tr>
<tr>
<td>Tanggal</td>
<td>:</td>
<td><?= format_date($data_event->transaction_date); ?></td>
</tr>
</table>
</div>
<div class="box-body2 table-responsive">
<table width="100%" border="1" cellspacing="0" cellpadding="4">
  <tr>
  	<td width="6%" rowspan="2"><strong>POIN</strong></td>
    <td width="58%" rowspan="2"><strong>KARAKTERISTIK YANG DINILAI</strong></td>
    <td width="6%" align="center"><strong>(-)</strong></td>
    <td colspan="4" align="center"><strong>NILAI</strong></td>
    <td width="6%" align="center"><strong>(+)</strong></td>
  </tr>
  
  <tr>
  	<td align="center"><strong>1</strong></td>
    <td width="6%"  align="center"><strong>2</strong></td>
    <td width="6%"  align="center"><strong>3</strong></td>
    <td width="6%"  align="center"><strong>4</strong></td>
    <td width="6%"  align="center"><strong>5</strong></td>
    <td  align="center"><strong>6</strong></td>
  </tr>
  <?php
  $no_p_fac1 = 1;
  while($row_p_fac3 = mysql_fetch_array($query_p_fac3)){
	   $answer3 = "";
  if($check_data > 0){
	  
	  $answer3 = $row_p_fac3['feedback_answer'];
  }
  ?>
  <tr>
    <td><?= $no_p_fac1 ?></td>
    <td><?= $row_p_fac3['feedback_question']?></td>
    <td align="center"><input name="r<?= $no_p_fac1?>" type="radio" class="flat-red" value="1" <?php if($answer3 == 1){ ?> checked="checked"<?php } ?> required/></td>
    <td  align="center"><input name="r<?= $no_p_fac1?>" type="radio" class="flat-red" value="2" <?php if($answer3 == 2){ ?> checked="checked"<?php } ?> required/></td>
    <td  align="center"><input name="r<?= $no_p_fac1?>" type="radio" class="flat-red" value="3" <?php if($answer3 == 3){ ?> checked="checked"<?php } ?> required/></td>
    <td  align="center"><input name="r<?= $no_p_fac1?>" type="radio" class="flat-red" value="4" <?php if($answer3 == 4){ ?> checked="checked"<?php } ?> required/></td>
    <td  align="center"><input name="r<?= $no_p_fac1?>" type="radio" class="flat-red" value="5" <?php if($answer3 == 5){ ?> checked="checked"<?php } ?> required/></td>
    <td  align="center"><input name="r<?= $no_p_fac1?>" type="radio" class="flat-red" value="6" <?php if($answer3 == 6){ ?> checked="checked"<?php } ?> required/></td>
  </tr>
  <?php
  $no_p_fac1++;
  }
  ?>
</table>
</div><br />

<table width="100%" border="1" cellspacing="0" cellpadding="4">
 <?php
  $no_p_fac2 = 1;
  while($row_p_fac4 = mysql_fetch_array($query_p_fac4)){
	   $answer4 = "";
  if($check_data > 0){
	  
	  $answer4 = $row_p_fac4['feedback_answer'];
  }
  ?>
  <tr>
    <td align="center"><?= $row_p_fac4['feedback_question']?></td>
  </tr>
  <tr>
    <td><textarea class="form-control" name="i_answer<?= $no_p_fac2?>" rows="3" required ><?= $answer4?></textarea>  </td>
  </tr>
  
  <?php
  $no_p_fac2++;
  }
  ?>
</table><br />
<div>Silahkan pilih berapa banyak kegiatan roleplay/contoh yang diberikan dalam sesi ini :</div>
<br />
 <?php
  $no_p_fac3 = 1;
  while($row_p_fac5 = mysql_fetch_array($query_p_fac5)){
	   $answer5 = "";
  if($check_data > 0){
	  $query_answer5 = query_answer($row_p_fac5['feedback_item_id'], $feedback_id);
	  $row_answer5 = mysql_fetch_object($query_answer5);
	  $answer5 = $row_answer5->feedback_answer;
  }
  ?>
  <div class="box-body2 table-responsive">
  <table width="100%" border="1" cellspacing="0" cellpadding="4">
 
  <tr>
    <td width="7%"><?= $no_p_fac3 ?></td>
    <td width="63%"><?= $row_p_fac5['feedback_question']?></td>
    <td width="6%" align="center">20%<br /><input name="rp<?= $no_p_fac3?>" type="radio" class="flat-red" value="1" <?php if($answer5 == 1){ ?> checked="checked"<?php } ?> required/></td>
    <td width="6%"  align="center">40%<br /><input name="rp<?= $no_p_fac3?>" type="radio" class="flat-red" value="2" <?php if($answer5 == 2){ ?> checked="checked"<?php } ?> required/></td>
    <td width="6%"  align="center">60%<br /><input name="rp<?= $no_p_fac3?>" type="radio" class="flat-red" value="3" <?php if($answer5 == 3){ ?> checked="checked"<?php } ?> required/></td>
    <td width="6%"  align="center">80%<br /><input name="rp<?= $no_p_fac3?>" type="radio" class="flat-red" value="4" <?php if($answer5 == 4){ ?> checked="checked"<?php } ?> required/></td>
    <td width="6%"  align="center">100%<br /><input name="rp<?= $no_p_fac3?>" type="radio" class="flat-red" value="5" <?php if($answer5 == 5){ ?> checked="checked"<?php } ?> required/></td>
    
  </tr>
 
</table>
</div>
 <br /><?php
  $no_p_fac3++;
  }
  ?>
  
  
  <br />
<input name="submit" type="submit" value="Save" class="btn btn-danger" />
 <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
</div>
</div>
</form>
</div>
</div>
</section>
