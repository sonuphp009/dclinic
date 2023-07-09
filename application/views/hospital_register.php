<?php
$ss=$this->session->userdata('uid');
		if (isset($ss))
		{
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>NP Infotech</title>
  <?php $this->load->view('css');?>
</head>
<body>
<div class="div_container">

<div class="wrapper">


<?php $this->load->view('navbar');?>
<?php $this->load->view('asid_bar');?>
	<div class="content-wrapper">
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-center text-primary">
					<h4 class="header">Clinic Master</h4>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card-body">
           
					<ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
		              <li class="nav-item">
		                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Input Form</a>
		              </li>
		              <li class="nav-item">
		                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Clinic List</a>
		              </li>
		              
		            </ul>
		            <div class="tab-custom-content">
		              <p class="lead mb-0">Clinic Content goes here</p>
		            </div>
		            <div class="tab-content" id="custom-content-above-tabContent">
		              <div class="tab-pane fade active show" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
		              	<form  name="f1" action="<?php  echo site_url('Welcome/insert_clinic'); ?>"  enctype="multipart/form-data"  method="post">
		              		<div class="panel">
		              			<div class="panel-body">
					                <div class="row" >
					                	<div class="col-sm-4" style="padding: 10px;">
					                		<label>Clinic Name</label>
					                		<input type="hidden" name="txt_clinic_id" id="txt_clinic_id">
					                		<input type="hidden" name="txt_clinic_reg_id" id="txt_clinic_reg_id">
					                		<input type="text" class="form-control" name="txt_clinic_name" id="txt_clinic_name" placeholder="Enter Clinic Name......" style="text-transform:uppercase" onblur="getCheckName()" required>
					                	</div>
					                	<div class="col-sm-4" style="padding: 10px;" required>
					                		<label>Mobile Number</label>
					                		<input type="text" class="form-control" name="txt_mobile_no" id="txt_mobile_no" placeholder="Enter Mobile Number......" required>
					                	</div>
					                	<div class="col-sm-4" style="padding: 10px;">
					                		<label>Registration Date</label>
					                		<input type="Date" class="form-control" name="txt_reg_date" id="txt_reg_date" placeholder="" required>
					                	</div>
					                	<div class="col-sm-4" style="padding: 10px;">
					                		<label>Registration Status</label>
					                		<select class="form-control" name="sel_reg_status" id="sel_reg_status" required>
					                			<option value="">-Select-</option>
					                			<option value="Online">Online</option>
					                			<option value="Offline">Offline</option>
					                		</select>
					                	</div>
					                	<div class="col-sm-4" style="padding: 10px;">
					                		<label>Email</label>
					                		<input type="text" class="form-control" name="txt_email" id="txt_email" placeholder="Enter Email......"  required>
					                	</div>
					                	<div class="col-sm-4" style="padding: 10px;">
					                		<label>Clinic Address</label>
					                		<textarea class="form-control" name="txt_clinic_address" id="txt_clinic_address" placeholder="Enter Address....." required></textarea>
					                	</div>
					                	
					                	<div class="col-sm-4" style="padding: 10px;">
					                		<label>Clinic Password</label>
					                		<textarea class="form-control" name="txt_clinic_password" id="txt_clinic_password" placeholder="Enter Password....." required></textarea>
					                	</div>
					                	<div class="col-sm-4" style="padding: 10px;">
					                		<label>Clinic Logo</label>
					                		<input type="hidden" name="txt_fle_logo" id="txt_fle_logo">
					                		<input type="file" name="fle_logo" id="fle_logo" class="form-control" >
					                	</div>

					                	<div class="col-sm-12" style="padding: 10px;">

					                		<button type="submit" class="btn btn-success"> Submit</button>
					                		<button type="reset" class="btn btn-primary">Cancel</button>
					                	</div>
					                	
					                	
					                </div> 
					             </div>
					         </div>
			            </form>
		              </div>
		              <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
		                	<div class="row">
		                		<div class="col-sm-4">

		                		</div>

		                	</div>
		                	<div class="row">
										   <div class="col-md-12">
											  <div class="panel-body">
												<div class="table-toolbar">  <!-- <div class="table-responsive">-->
												 <div class="table-responsive">
													   <table id="datatable1"  class="table table-bordered">
	                                                      <thead >
	                                                        <tr class="">
	                                                              <th style="color:#000000;">Sr. No.</th>
	                                                               <th style="color:#000000;">Name</th>
	                                                               <th style="color:#000000;">Registration Date</th>
	                                                               <th style="color:#000000;">Status</th>

	                                                               
	                                                              <th style="text-align:center; color:#000;">Action</th>
	                                                        </tr>
	                                                      </thead>
	                                                      <tbody>
	                                                      <?php $count = 1; foreach($this->Inm->get_clinic_all() as $row): ?>
	                                                          <tr class="odd gradeX">
	                                                                             <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
	                                                                             <td><?php print $row->clinic_name; ?></td>
	                                                                             <td><?php print $row->reg_date; ?></td>
	                                                                             <td><?php print $row->clinic_active_status; ?></td>
	                                                                            
	                                                                             
	                                                                            <td style="text-align:center;">
	                                                                            <a onClick="getEdit(<?php print $row->clinic_id; ?>)" >
	                                                                            <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-edit" id="elementID"></i></button></a><br/><br/>
	                                                                            
	                                                                            <a href="#" onClick="confirmation(<?php print $row->clinic_id; ?>)"> 
	                                                                            <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-trash"   id="elementID"></i></button></a>
	                                                                            </td>
	                                                                </tr>
	                                                               <?php endforeach; ?>
	                                                              </tbody>
	                                                            </table>
															</div>   
														</div>
													 </div>
											   
											   </div>
											</div>
										</div>
		              </div>
		              
		            </div>
		        </div>
	        </div>
		</div>
	</div>
</div>
</div>

<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
function getEdit(id)
{   
   

    $.ajax(
		    {
		      type:"POST",
		      url:"<?php print base_url(); ?>index.php/Welcome/getClinicEdit",
		      data:{
		              id:id
		            }
		    }).done(function(message){
		      var res=message.split('_|_');
		      $('[href="#custom-content-above-home"]').tab('show');
		      
		      if(message!="")
		      {
		      		$('#txt_clinic_id').val(id);
		      		$('#txt_clinic_name').val(res[0]);
		      		$('#txt_clinic_reg_id').val(res[1]);
		      		$('#txt_mobile_no').val(res[2]);
		      		$('#txt_reg_date').val(res[3]);
		      		$('#sel_reg_status').val(res[4]);
		      		$('#txt_email').val(res[5]);
		      		$('#txt_clinic_address').val(res[6]);
		      		$('#txt_clinic_password').val(res[7]);
		      		$('#txt_fle_logo').val(res[8]);
		      		

		      }


		    });

}
function getCheckName()
{   
    var txt_clinic_name=document.getElementById("txt_clinic_name").value;
    var txt_mobile_no=document.getElementById("txt_mobile_no").value;
    var txt_email=document.getElementById("txt_email").value;

    $.ajax(
		    {
		      type:"POST",
		      url:"<?php print base_url(); ?>index.php/Welcome/getCheckClinicUser",
		      data:{
		              txt_clinic_name:txt_clinic_name,
		              txt_mobile_no:txt_mobile_no,
		              txt_email:txt_email
		            }
		    }).done(function(message){
		      var res=message.split('_|_');
		      
		      if(message!="")
		      {
		      	document.getElementById("txt_clinic_name").value="";
		      	alert("This User Is Already Exist");
		      }


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