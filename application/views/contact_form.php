<?php
$this->load->view('ismobile');

$uname=$this->session->userdata('uname');
$uid=$this->session->userdata('uid');
$clinic_id=$this->session->userdata('clinic_id');
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
<body style="width: 100%;">
<div class="div_container">

<div class="wrapper">

<?php $this->load->view('navbar2');?>
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-center text-primary">
					<h4 class="header">Contact List</h4>
			</div>
		</div><hr/>
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-center text-primary">
				<button type="button" class="btn btn-success btn-block" onclick="getContactResult()">Show Result <i class="fa fa-search"></i></button>			
			</div>
		</div>
		<hr/>
		<div class="col-sm-12 panel-body">
			<div class="row">
				<div class="col-sm-4 form-group">
					<input type="text" class="form-control" name="txt_slider_search" id="txt_slider_search" placeholder="Search..............">
				</div>
			</div>
		</div>
		<div class="col-sm-12 panel-body">
				<div class="table-responsive" style="height:400px;width:100%;overflow:scroll;overflow-x:scroll;overflow-y:scroll;">
						<table class="table styled-table" id="dwnld_table">
							<thead >
                              <tr class="" style="width: 100%;">
                                    <th style="color:#000000;width: 10%;">Sr. No.</th>
                                     <th style="color:#000000;width: 20%;">Name</th>
                                     <th style="color:#000000;width: 30%;">Email</th>
                                     <th style="color:#000000;width: 20%;">Email</th>
                                   	<th style="color:#000000;width: 20%;">Message</th>
                                      
                              </tr>
                            </thead>
                            <tbody id="tbl_contact">
                           
                            </tbody>
						</table>
				</div>
		</div>

</div>
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
function getContactResult()
{
		
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getContactResultTable",
					   data:{
							   
							}              
						}).done(function(message){
						//toast();
					//alert(message);
					$('#tbl_contact').empty();
					$('#tbl_contact').append(message);
						
				   });
					
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