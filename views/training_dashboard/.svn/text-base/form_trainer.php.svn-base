    <script>
function show_sub(str)
{
	if (str=="")
	{
	document.getElementById("fom").innerHTML="";
	return;
	} 
	if (window.XMLHttpRequest)
	{// kode for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// kode for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("fom").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../views/training_dashboard/sub_trainer.php?id="+str,true);
	xmlhttp.send();
	}
</script>
     <form role="form" action="<?=$action?>" method="post">

                           		<div class="box box-danger">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                      
                             
                                       	<div class="form-group">
                                        <label>Trainer type</label>
                                 <select class="form-control"  name="type_id"  id="transaction_type" onChange="show_sub(this.value)" >
                                  		<option value="0">-------</option>	
                                        <option value="2">ADM</option>
                            			<option value="3">Premier builder</option>
                                    </select>
                                       
                                        </div>

                                        
 

                                        <div class="form-group">
                                        <label>Trainer name</label>
                                        <select class="form-control"  id="fom" name="trainer_id">
                                       
                                        </select>
                                        </div>
                                 		
                                        
                                       
                                      
                                   
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                      