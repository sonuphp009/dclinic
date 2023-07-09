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
  <style type="text/css">
    #snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #28a745;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 18px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
  </style>
 <script type="text/javascript">
  function toast_chk() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

</head>
<body>
<div class="wrapper div_container">

<?php $this->load->view('navbar2');?>
	<div class="row" style="padding: 10px;">
		<div class="col-sm-12 text-center text-primary">
				<h4 class="header">User Master</h4>
				<div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>
		</div>
	</div>

	<div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-appointment-tab" data-toggle="pill" href="#custom-tabs-four-appointment" role="tab" aria-controls="custom-tabs-four-appointment" aria-selected="true">Input Form</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-emr-tab" data-toggle="pill" href="#custom-tabs-four-emr" role="tab" aria-controls="custom-tabs-four-emr" aria-selected="false">User List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-plist-tab" data-toggle="pill" href="#custom-tabs-four-plist" role="tab" aria-controls="custom-tabs-four-plist" aria-selected="false">Patient List</a>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-appointment" role="tabpanel" aria-labelledby="custom-tabs-four-appointment-tab">
	                  	<div class="container">
							 <form  name="f1" action="<?php  echo site_url('Welcome/insert_user_signup'); ?>"    enctype="multipart/form-data"  method="post">
					                <div class="row">

					                  <div class="col-sm-12 text-center">
					                      <label id="lab_login" ></label>
					                  </div>
					                </div>
					                <div class="row form-group " style="padding: 10px;">
					                	<div class="col-sm-12 form-group text-left">
					                	<input type="hidden" name="reg_id" id="reg_id">
					                      <label>User Type</label>
					                      <select name="sel_user_type" id="sel_user_type"  required>
					                        <option value="">-Select Type-</option>
					                        <option value="Receptionist">Receptionist</option>
					                        <option value="admin">Doctor</option>
					                        
					                      </select>
					                    </div>
					                    <div class="col-sm-12 form-group">
					                    	<input type="hidden" name="txt_pic" id="txt_pic" >
					                      <input type="hidden" name="txt_clinic_id" id="txt_clinic_id" value="5">
					                            <label class="control-label">Upload Profile Photo( ) :</label>
					                            <input type="file" name="fle_option1" id="fle_option1"  onchange="Test.UpdatePreview(this)" accept="image/*" capture="" >
					                        </div>
					                    <div class="col-sm-12 form-group">
					                      <label>Full Name</label>
					                      <input type="text" name="txt_patient_first_name" id="txt_patient_first_name" class="form-control " placeholder="Enter Firsr Name"  required>
					                    </div>
					                    <div class="col-sm-12 form-group text-left ">
					                      <label>Email</label>
					                      <input type="email" name="txt_email" id="txt_email" class="form-control " placeholder="Enter Email"  required>
					                    </div>
					                    
					                    <div class="col-sm-12 form-group text-left ">
					                      <label>Mobile No</label>
					                      <input type="text" name="txt_patient_mobile" id="txt_patient_mobile" class="form-control" placeholder="Enter Mobile Number" onblur="chkPatient()" required>
					                    </div>
					                    <div class="col-sm-12 form-group text-left "><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
					                      <label>Address</label>
					                      <textarea name="txt_patient_address" id="txt_patient_address" class="form-control" placeholder="Enter Address" spellcheck="false" required></textarea>
					                    </div>
					                    
					                    <div class="col-sm-12 form-group text-left ">
					                      <label>Password</label>
					                      <input type="password" name="txt_password" id="txt_password" class="form-control" placeholder="" autocomplete="off" required>
					                    </div>
					                    
					                  </div>
					                  <div class="row" style="padding: 10px;">
					                    <div class="col-lg-6  col-md-6 col-xs-6">
					                      <button id="btn_signup" type="submit" class="btn btn-success " >Submit</button>
					                      <button type="reset" class="btn btn-danger " >Cancel</button>

					                    </div>
					                  </div>
					               
					          </form>

						</div>
                    
                  </div>
	              <div class="tab-pane fade" id="custom-tabs-four-emr" role="tabpanel" aria-labelledby="custom-tabs-four-emr-tab">
	                  		
	                  		<div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control 
									" name="txt_question_search" id="txt_question_search" placeholder="Search........">
									</div>
								</div><hr/>
								<div class="row panel">
								   <div class="col-md-12">
									  <div class="panel-body">
										<div class="table-toolbar">  <!-- <div class="table-responsive">-->
										 <div class="table-responsive" style="height:500px;width:100%;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
											   <table id="q_table"  class="table styled-table">
                                                  <thead >
                                                    <tr class="">
                                                          <th style="color:#000000;">Sr. No.</th>
                                                          <th style="color:#000000;">Image</th>
                                                           <th style="color:#000000;">Name</th>
                                                           <th style="color:#000000;">Address</th>
                                                           <th style="color:#000000;">Email</th>
                                                           <th style="color:#000000;">User Type</th>
                                                           <th style="color:#000000;">Mobile Number</th>	
                                                           <th style="color:#000000;">Password</th>
                                                           <th style="color:#000000;">Status</th>
                                                          <th style="text-align:center; color:#000;">Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php $count = 1; foreach($this->Inm->get_user_all_admin_res() as $row): ?>
                                                      <tr class="odd gradeX">
                                                                         <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
                                                                         <td><a href="<?php print base_url().$row->profile_pic; ?>"><img src="<?php print base_url().$row->profile_pic; ?>" class="img-circle" style="height: 70px;width: 100%;"></a></td>
                                                                         <td><?php print $row->name; ?></td>
                                                                         <td><?php print $row->address; ?></td>
                                                                        <td><?php print $row->email; ?></td>
                                                                        <td><?php print $row->user_type; ?></td>
                                                                        <td><?php print $row->mobileno; ?></td>
                                                                        <td><?php print $row->password; ?></td>
                                                                        <td><select name="sel_status" id="sel_status<?php print $count; ?>" onchange="getUpdateStatus(<?php print $row->rid.','.$count; ?>)">
                                                                        	<option value="<?php print $row->active_status;?>)"><?php print $row->active_status;?></option>
                                                                        	<option value="">-Select Status-</option>
                                                                        	<option value="active">Active</option>
                                                                        	<option value="not_active">Not Active</option>
                                                                        </select>
                                                                        </td>
                                                                         
                                                                        <td style="text-align:center;">
                                                                        <a onClick="getEdit(<?php print $row->rid; ?>)" >
                                                                        <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-edit" id="elementID"></i></button></a><br/><br/>
                                                                        
                                                                        <a href="#" onClick="confirmation(<?php print $row->rid; ?>)"> 
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
								<!-- TAB SECOND -->
						 <div class="tab-pane fade" id="custom-tabs-four-plist" role="tabpanel" aria-labelledby="custom-tabs-four-plist-tab">
	                  		
	                  		<div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control 
									" name="txt_patient_search" id="txt_patient_search" placeholder="Search........">
									</div>
									<div class="col-sm-6">
										<button class="btn btn-block btn-success" onclick="getAllPatientList()">Search &nbsp;<i id="imgload" style="display: none;" class="fa fa-spinner fa-spin"></i></button>
									</div>
								</div><hr/>
								<div class="row panel">
								   <div class="col-md-12">
									  <div class="panel-body">
										<div class="table-toolbar">  <!-- <div class="table-responsive">-->
										 <div class="table-responsive" style="height:500px;width:100%;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
											   <table id="q_table_p"  class="table styled-table">
                                                  <thead >
                                                    <tr class="">
                                                          <th style="color:#000000;">Sr. No.</th>
                                                          <th style="color:#000000;">Image</th>
                                                           <th style="color:#000000;">Name</th>
                                                           <th style="color:#000000;">Address</th>
                                                           <th style="color:#000000;">Email</th>
                                                           <th style="color:#000000;">User Type</th>
                                                           <th style="color:#000000;">Mobile Number</th>	
                                                           <th style="color:#000000;">Password</th>
                                                           
                                                          <th style="text-align:center; color:#000;">Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="Patient_list_tbl">
                                                  
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
              <!-- /.card -->
            </div>
          </div>

	

</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
 $(document).ready(function() {
		$('#txt_question_search').keyup(function() {
			search_table($(this).val());
		});

		function search_table(value){
			//alert();
			$('#q_table tr').each(function(){
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
	});
  $(document).ready(function() {
		$('#txt_patient_search').keyup(function() {
			search_table($(this).val());
		});

		function search_table(value){
			//alert();
			$('#q_table_p tr').each(function(){
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
	});
function getEdit(id)
 {
		
		
		//alert(category);
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getregEdit",
					   data:{
							   id:id,
							 }              
						}).done(function(message){
						var res=message.split('_|_');
					     //alert(message);
					     $('#reg_id').val(id);
					     $('#txt_patient_first_name').val(res[0]);
					     $('#txt_email').val(res[1]);
					     $('#txt_patient_mobile').val(res[2]);
					     $('#txt_password').val(res[3]);
					     
					     $('#sel_user_type').val(res[4]);
					     $('#txt_patient_address').val(res[5]);
					     //$('#sel_class').val(res[6]);
					     $('#profile_pic').val(res[6]);
					     $('#txt_pic').val(res[6]);
					     //$('#txt_pic').val(res[6]);
					     // readURL(res[6]);
					      $('[href="#custom-tabs-four-appointment"]').tab('show');
					      
					   });
	
		
 }	 
 function getAllPatientList()
 {
		
		$('#imgload').show();
		//alert(category);
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getPatientListShow",
					   data:{
							   
							 }              
						}).done(function(message){
						
						$('#Patient_list_tbl').empty();
						$('#Patient_list_tbl').append(message);
					      $('#imgload').hide();
					   });
	
		
 }	 

 function getUpdateStatus(rid,cnt)
 {
 	var sel_status=document.getElementById('sel_status'+cnt).value;

 	$.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getStatusUpdate",
					   data:{
							   rid:rid,
							   sel_status:sel_status
							 }              
						}).done(function(message){
						var res=message.split('_|_');
					     //alert(message);
					     
					      toast_chk();
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