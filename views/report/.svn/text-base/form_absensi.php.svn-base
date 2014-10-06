<?
$content = '';
$content.='			
            <table width="100%">
                       <tr>';
					   
					   	$colspann1 = $jumlah_hari + 7;
					   
                       	$content.='<td colspan="'.$colspann1.'">
                        	<h1>DAFTAR HADIR</h1>
                      	</th>
                        
                      </tr>
                      <tr>
                     	<td colspan="'.$colspann1.'">
                      	GUARANTEE TO SUCCESS (GTS) 1
                      </th>
                      </tr>
                       <tr>
                      <td colspan="8">&nbsp;</th>
                      </tr>
                      <tr>
                   
                      	<td colspan="2" align="left">tanggal : '.$date1.'-'.$date2.' </th>
     
                      	<td>&nbsp; </th>
                      	<td>&nbsp; </th>
                      	<td>&nbsp; </th>
                    	<td>&nbsp; </th>';
                       
					   	$colspann2 = $jumlah_hari;
					   
             $content.='<td colspan="'.$colspann2.'">&nbsp; </th>
                      	<td  align="right">lokasi :'.$heder['unit_name'].'</th>
                      	<td align="right"></th>
                      </tr>
        
                      </table>
                             <table width="100%" border="2">       
    <tdead>
                                            <tr>
                                               <td >No</th>
                                                <td>NAMA LENGKAP AGEN   <br />    (bukan nama panggilan)</th>
                                                <td >TEMPORARY CODE</th> 
                                                <td >NAMA LEADER (wajib diisi)</th>
                                                <td >NAMA AGENCY  <br />                        (bukan nama kota)</th>
                                                <td  align="center">NO. HANDPHONE <br /> AGEN</th>';
                                                 
                                             for($i=1; $i<=$jumlah_hari; $i++){
											
                                              $content.='<td align="center">TANDA TANGAN AGEN <br />(bukan paraf)</th>';
                                            
											 }
											 
                                            $content.='<td width="9%">KET</th>
                                        
                                            </tr>
                     </thead>
                                        <tbody>';
                                            
                                           $no = 1;
                                           while($row = mysql_fetch_array($query)){
											
                                            
                                       $content.='<tr>
                                            	<td align="left">'.$no.'&nbsp;</td>
                                                <td>'.$row['agent_name'].'</td>
                                                <td align="center">'.$row['agent_code'].'</td>
                                                <td>'.$row['agent_senior_name'].'</td>
                                                <td>'.$row['branch_id'].'</td>
                                                <td>'.$row['agent_phone'].'</td>';
                                                      
                                             for($i=1; $i<=$jumlah_hari; $i++){
											 
                                       $content.='<td>&nbsp;</th>';
                                              
											 }
											
                                       $content.='<td>&nbsp;</td>';
                                          
                                      
											$no++;
                                            }
                                           

                                           
                                          
                                        $content.='</tbody>
                                       
                                    </table>
									<table>
                                    <tr>
                                     <td>&nbsp;</td>
                                    <td >Tanda tangan Fasilitator</td>
                                    </tr>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td >&nbsp;</td>
                                    </tr>
                                     <tr> 
                                     <td>&nbsp;</td>
                                    <td  ><h6><u>'.$heder['user_name'].'</u></h6></td></tr>
                                    </table>';
									
									
									define('FPDF_FONTPATH','../lib/pdftable/font/');
require('../lib/pdftable/lib/pdftable.inc.php');
$p = new PDFTable();
$p->AddPage();
$p->setfont('arial','',9);
$p->htmltable($content);
$p->output('form_absensi.pdf','I');

?>