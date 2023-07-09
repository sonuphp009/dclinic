<?php
$this->load->view('ismobile');

$uname=$this->session->userdata('uname');
$uid=$this->session->userdata('uid');
$live_status=$this->session->userdata('live_status');

if(isset($uname))
{

?>
<!DOCTYPE html>
<html>
<head>
	<title>NP Infotech</title>
  <?php $this->load->view('css');?>
   <?php 
if(!isMobile())
{ ?>
<style type="text/css">
  
  .div_container{
      width: 95%;
      margin-left: 35px;
    }

</style>
<?php 
}
?>
</head>

<body >
<div class="div_container">

<div class="wrapper">

<?php $this->load->view('navbar2');?>
		<div class="row" style="padding: 10px;">
			<div class="col-sm-1">
				
			</div>
			<div class="col-sm-6" style="background-color: #FAEBD7;">
				<div class="row form-group" style="padding: 20px;">
					<div class="col-sm-12">
						<input type="text" name="txt_patient_search" id="txt_patient_search" class="form-control" placeholder="Search Patient.....">
					</div>
					<div class="col-sm-12" style="height: 400px;overflow-y: scroll;">
						<table class="table styled-table" id="tbl_patient_search">
							<thead>
								<th>Patient Name</th>
								<th>Action</th>
							</thead>
							<tbody id="tbl_p_list">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-sm-4" style="background-color: #FFF8DC;">
				<h5 style="background-color: #006400;color: white;padding: 5px;width: 100%;" class="text-center">send message to <span id="p_name"> </span> <a href="#" class="btn btn-danger btn-xs" onclick="getCLear()">Clear All</a></h5>
				<input type="hidden" name="txt_patient_id" id="txt_patient_id">
				<div id="div_message" class="row form-group" style="padding: 10px;height: 400px;overflow-y: scroll;">
					
				</div>
				<div class="row form-group" style="padding: 10px;">
					<div class="col-sm-10 form-group" >
						
						<input type="text"class="form-control"  name="txt_message" id="txt_message" placeholder="Enter Message........" style="height: 30px;" onclick="getmsg()">

					</div>
					<div class="col-sm-2 form-group">
						<button class="btn btn-sm btn-success" onclick="getSendMessage()">Send <i class="fa fa-arrow"></i></button>
					</div>
				</div>
				
			</div>
			<div class="col-sm-1">
				
			</div>
		</div>

	
</div>
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script language="javascript" type="text/javascript">
$(document).ready(function () {
	setInterval(getmsg, 5000);
	setInterval(pList, 30000);
	
	});
$(document).ready(function() {
		$('#txt_patient_search').keyup(function() {
			search_table($(this).val());
		});

		function search_table(value){
			//alert();
			$('#tbl_patient_search tr').each(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
					{
						found = 'true';
					}
				});
				if(found == 'true')
				{
					$(this).show();

				}
				else
				{
					$(this).hide();
				}
			});
		}
		pList();
	});
</script>
<script type="text/javascript">
function pList()
{
	$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getOnlineList",
         data:{
                
                
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        	$('#tbl_p_list').empty();
        	$('#tbl_p_list').append(message);

         });
}	
function getPatientName(pid)
{
	$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/PatientById",
         data:{
                
                pid:pid,
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        document.getElementById('p_name').innerHTML=message;
        
        $('#txt_patient_id').val(pid);
        getmsg();

         });
}	
function getSendMessage() 
{
	var msg=$('#txt_message').val();
	var pid=$('#txt_patient_id').val();
	if(pid!="")
	{
		$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/InsertMsg",
         data:{
                
                pid:pid,
                msg:msg
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        //document.getElementById('p_name').innerHTML=message;
        
        $('#txt_patient_id').val(pid);
        getmsg();

        document.getElementById('txt_message').value="";
         });
	}
	else
	{
		alert("First Select Patient Please");
	}
	
	
}
function getmsg()
{
	var pid=$('#txt_patient_id').val();
	$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllMsg",
         data:{
                pid:pid
               
                
           	}              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        //document.getElementById('p_name').innerHTML=message;
        $('#div_message').empty();
        $('#div_message').append(message);
        
        });
}
function getCLear()
{
	var pid=$('#txt_patient_id').val();
	var chk=confirm("Do you want delete all messages !");
	if(chk)
	{
		if(pid!="")
		{
			$.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Welcome/getDelMsgAll",
	         data:{
	                pid:pid
	               
	                
	           	}              
	        }).done(function(message){
	        //alert(message);
	        getmsg();
	        
	        });
		}
		else
		{
			alert('Select Patient Please');
		}
	}
	
	
}
</script>
</html>
<?php 
}
else
{
	redirect('Welcome/index');
}
?>