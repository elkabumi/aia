<div class="preview_title">GUARANTEE TO SUCCESS 
FEED BACK FORM
</div>
<div class="preview_top">
<table width="100%">
<tr>
<td width="19%">Tanggal</td>
<td width="4%">:</td>
<td width="77%">___________________</td>
</tr>
<tr>
<td>Lokasi Training</td>
<td>:</td>
<td>___________________</td>
</tr>
<tr>
<td>ADM / Trainer</td>
<td>:</td>
<td>___________________</td>
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
  ?>
  <tr>
    <td><?= $no_p_gts1.". ".$row_p_gts1['feedback_question']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  $no_p_gts1++;
  }
  ?>
</table><br />
<div class="preview_category">SARAN DAN KOMENTAR
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
 <?php
  while($row_p_gts2 = mysql_fetch_array($query_p_gts2)){
  ?>
  <tr>
    <td><?= $row_p_gts2['feedback_question']?></td>
  </tr>
  <tr>
    <td>____________________________________________________________________________________________________</td>
  </tr>
  <tr>
    <td>____________________________________________________________________________________________________</td>
  </tr>
  <tr>
    <td>____________________________________________________________________________________________________</td>
  </tr>
  <?php
  }
  ?>
</table>
