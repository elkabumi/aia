<div class="preview_title">LEMBAR PENILAIAN FASILITATOR<br />
Agency Premier Academy
</div>
<div class="preview_top">
<table width="100%">
<tr>
<td width="19%">Nama Fasilitator</td>
<td width="4%">:</td>
<td width="77%">___________________</td>
</tr>
<tr>
<td>Topik Presentasi</td>
<td>:</td>
<td>___________________</td>
</tr>
<tr>
<td>Tanggal</td>
<td>:</td>
<td>___________________</td>
</tr>
</table>
</div>
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
  $no_p_fac = 1;
  while($row_p_fac3 = mysql_fetch_array($query_p_fac3)){
  ?>
  <tr>
    <td><?= $no_p_fac ?></td>
    <td><?= $row_p_fac3['feedback_question']?></td>
    <td align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
  </tr>
  <?php
  $no_p_fac++;
  }
  ?>
</table><br />

<table width="100%" border="1" cellspacing="0" cellpadding="4">
 <?php
  while($row_p_fac4 = mysql_fetch_array($query_p_fac4)){
  ?>
  <tr>
    <td align="center"><?= $row_p_fac4['feedback_question']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <?php
  }
  ?>
</table><br />
<div>Silahkan pilih berapa banyak kegiatan roleplay/contoh yang diberikan dalam sesi ini :</div>
<br />
 <?php
  $no_p_fac2 = 1;
  while($row_p_fac5 = mysql_fetch_array($query_p_fac5)){
  ?><table width="100%" border="1" cellspacing="0" cellpadding="4">
 
  <tr>
    <td width="7%"><?= $no_p_fac2 ?></td>
    <td width="63%"><?= $row_p_fac5['feedback_question']?></td>
    <td width="6%" align="center">20%</td>
    <td width="6%"  align="center">40%</td>
    <td width="6%"  align="center">60%</td>
    <td width="6%"  align="center">80%</td>
    <td width="6%"  align="center">100%</td>
    
  </tr>
 
</table> <br /><?php
  $no_p_fac2++;
  }
  ?>