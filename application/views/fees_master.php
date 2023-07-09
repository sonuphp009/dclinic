<?php
$this->load->view('ismobile');

$uname=$this->session->userdata('uname');
$uid=$this->session->userdata('uid');

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
<body>

<div class="div_container">

<?php $this->load->view('navbar2');?>
<form  name="f1" action="<?php  echo site_url('Welcome/insert_fees'); ?>"   enctype="multipart/form-data"  method="post">
	<div class="row" style="padding: 10px;">
		<div class="col-sm-12 text-center text-primary">
				<h4 class="header">Fees Master</h4>
		</div>
	</div>
	<div class="row form-group" style="padding: 10px;">
		<div class="col-sm-8 text-center text-primary">
				<input type="text" name="txt_fees" id="txt_fees" class="form-control" placeholder="Enter Fees........" required>
		</div>
		<div class="col-sm-4 text-center text-primary">
				<button type="submit" class="btn btn-success btn-block">Save Fees <i class="fa fa-plus-circle"></i></button>
		</div>
	</div><hr/>
	<div class="row form-group" style="padding: 10px;">
		<div class="col-sm-12 text-center text-primary">
				<table class="table styled-table">
					<thead>
						<th>ID</th>
						<th>Fees</th>
						<th>Action</th>
					</thead>
					<tbody>
						
						<?php 
							$count =0;
							foreach ($this->Inm->get_fees() as $row) 
                              {
                              	$count++;
                                  echo '<tr>
                                  <td>'.$count.'</td>
                                  <td>'.$row->fees.'</td>
                                  <td><a href="#" onclick="getdelfees('.$row->id  .','.$count.')"><i class="fa fa-trash"></i></a></td>
                                  </tr>';
                              } 
                                                      
                           ?>
                        
					</tbody>
				</table>
		</div>
		
	</div>
</form>
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
function getdelfees(chf_id,cnt)
{
  

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdelFees",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        location.reload();
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