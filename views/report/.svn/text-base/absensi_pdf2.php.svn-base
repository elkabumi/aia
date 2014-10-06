<?

$content = '';
$content .='
		<table width="100%">
			<tr>';

				$total_col = $jumlah_hari +  5;

$content .='<td colspan='.$total_col.' align="center">
 				<h2><span style="font-weight:bold;">DAFTAR HADIR  '.$data_event->transaction_name.'</span></h2>
              </td>
              </tr>
              </table>
<br>
			<table width="100%">
				<tr>
  					<td width="19%">Tanggal</td>
					  <td width="79%">: &nbsp;'.format_date($data_event->transaction_date). " - " . format_date($data_event->transaction_date2).'					
					  </td>
					</tr>
					<tr>
						<td>Kota Penyelenggaraan</td>
						<td>: &nbsp;'.$data_event->unit_name.'</td>
					</tr>
					<tr>
						<td>ADM / Trainer</td>
						<td>: &nbsp;'.$data_event->trainer_name.'
						</td>	
					</tr>
			</table>
			</div>
			<br />

 			<div class="box-body2 table-responsive">
                 <table width="100%" border="1" cellspacing="0" cellpadding="4">
                        <thead>
                           <tr>
                               <td  rowspan="2">No</th>
                               <td  rowspan="2">Nomor KTP</th>
                               <td  rowspan="2">Nama Agen      Sesuai KTP)</th>
                               <td  rowspan="2">Nama Leader</th>
                               <td  rowspan="2">Nama Agency</th>
                               <td  colspan="'.$jumlah_hari.'" align="center">Kehadiran</th>
							 </tr>
                           <tr>';
                           
                              for($i=1; $i<=$jumlah_hari; $i++){
							
                             $content .=' <th align="center">Date '.$i.'</th>';
                                               
											 }
											   
                                             
                             $content .='</tr>
                                        </thead>
                                        <tbody>';
                                           
                                           $no = 1;
										   $jumlah_persen = array();
                                            while($row = mysql_fetch_array($query)){
											
                                        
                              $content .='<tr>
                                          <td> '.$jumlah_hari.''.$no.'</td>
                                          <td>'.$row['agent_ktp_number'].'</td>
                                                <td>'.$row['agent_name'].'</td>
                                                <td>'.$row['agent_senior_name'].'</td>
                                                <td>&nbsp;</td>
                                                ';
												$total_result = 0;
												
                                             for($i=1; $i<=$jumlah_hari; $i++){
												 $r_i = new stdClass();
												 	$r_i->absensi_item_result = "";
												 if($check_data > 0){
												 	$q_i = mysql_query("select a.absensi_item_result 
																		from absensi_items a
																		join absensi b on b.absensi_id = a.absensi_id
																		 where b.transaction_agent_id = '".$row['transaction_agent_id']."' and a.absensi_item_index = '$i'");
													$r_i = mysql_fetch_object($q_i);
													
													if($no == 1){
														$jumlah_persen[$i] = $r_i->absensi_item_result;
													}else{
														$jumlah_persen[$i] = $jumlah_persen[$i] + $r_i->absensi_item_result;
													}
													
													
												 }
											 
                                                $content .='<td align="center">';
                                              
												$cetak_result = ( $r_i->absensi_item_result == 1) ? "v" : "";
												  $content .=''.$cetak_result.'
                                                </td>';
                                                
												$total_result = $total_result + $r_i->absensi_item_result;
											 }
											$total_nilai = 0;
                                             for($j=1; $j<=$jumlah_hari; $j++){
												  $r_j = new stdClass();
												 	$r_j->absensi_item_value = "";
												 if($check_data > 0){
												 	$q_j = mysql_query("select a.absensi_item_value 
																		from absensi_items a
																		join absensi b on b.absensi_id = a.absensi_id
																		 where b.transaction_agent_id = '".$row['transaction_agent_id']."' and a.absensi_item_index = '$j'");
													$r_j = mysql_fetch_object($q_j);
												 }
											 
                                             
                                              
                                              $total_nilai = $total_nilai + $r_j->absensi_item_value;
											 }
												
                                           		
                                              
                                       
											$no++;
                                            }
                                            

                                           
                                          
                                        $content .='</tbody>
                                         
                                    </table>
<br>
<br>
                          
<table width="100%">
<tr>';
$total_col2 = $jumlah_hari + $jumlah_hari+ 3;

 $content .='<td colspan="'.$total_col2.'" align="center">
 
 <br><br>
 <h3>
                     REPORT KEHADIRAN
                        
                    </h3>
                    </td>
                    </tr>
                    </table>
                         <div class="box-body2 table-responsive">
                                <table width="100%" border="1" cellspacing="0" cellpadding="6">
                                  <tr>
                                    <td rowspan="2" width="18%"><strong>Periode</strong></td>
                                    <td rowspan="2"><strong>Registered Participants</strong></td>';
									
                          $content .='<td colspan="';
						   $jumlah_hari_per = $jumlah_hari * 2; 
						   $content .=''.$jumlah_hari_per.'" align="center"><strong>List Of Participants</strong></td>
                                    <td rowspan="2"><strong>Average Percentage</strong></td>
                                  </tr>
                                  <tr>';
                                  
								   for($k=1; $k<=$jumlah_hari; $k++){
									   
                            $content .='<td><strong>Day'.$k.'</strong></td>
                                    <td><strong>% Day'.$k.'</strong></td>';
                                    
								   }
								
                            $content .='</tr>
                                  		<tr>
                                    	<td>'.format_date($data_event->transaction_date). " - " . format_date($data_event->transaction_date2).'</td>
                                    <td>'.$jumlah_agent.'</td>';
                                     
								   for($k=1; $k<=$jumlah_hari; $k++){
									                                       $content .='<td>'; 
									$jumlah_persen[$k] = (isset($jumlah_persen[$k])) ? $jumlah_persen[$k] : 0;
									$content .=''.$jumlah_persen[$k].'</td><td>';
                                    $jumlah_agent = ($jumlah_agent == 0) ? 1 : $jumlah_agent;
									$persen_hari_ke = $jumlah_persen[$k] / $jumlah_agent * 100;
									$persen_hari_ke = ($persen_hari_ke == 100) ? $persen_hari_ke : number_format($persen_hari_ke, 2);
									$content .=''.$persen_hari_ke.' %
									
									</td>';
                                    
								   }
									$content .='
                                    			<td>
                                      <strong>';
									$average = 0;
                                    for($l=1; $l<=$jumlah_hari; $l++){
										$persen_hari_ke2 = $jumlah_persen[$l] / $jumlah_agent * 100;
										$average = $average + $persen_hari_ke2;
										
									}
									$average = $average / $jumlah_hari;
									$average = ($average == 100) ? $average : number_format($average, 2);
										$content .=''.$average.'%;
									
									
                                    </strong></td>
                                  </tr>
                                </table>
                                </div>
                                <br />
</div>
</div>
</form>
</div>
</div>
</section>';
 //echo $content;

define('FPDF_FONTPATH','../lib/pdftable/font/');
require('../lib/pdftable/lib/pdftable.inc.php');
$p = new PDFTable();
$p->AddPage();
$p->setfont('arial','',12);
$p->htmltable($content);
$p->output('ABSENSI.pdf','I');

?>