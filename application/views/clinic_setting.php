<?php
$this->load->view('ismobile');

$uname=$this->session->userdata('uname');
$uid=$this->session->userdata('uid');
$clinic_id=$this->session->userdata('clinic_id');
$res=$this->Inm->get_clinic_by_id($clinic_id);

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
<style type="text/css">

</style>
<body>
<div class="div_container">

<div class="wrapper">

<?php $this->load->view('navbar2');?>
		<div class="row" style="padding: 10px;">
			<div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>

			<div class="col-sm-12 text-center">
					<h4 class="header">Clinic Settings</h4>
			</div>
			<!-- <div class="col-sm-2">
				<div class="alert alert-success text-center" id="user_alert" role="alert" style="display: none;height: 40px;width: 200px;">
					<P style="margin-top: -5px;"> save successfully</P>
				</div>
			</div> -->
		</div>
		<div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-appointment-tab" data-toggle="pill" href="#custom-tabs-four-appointment" role="tab" aria-controls="custom-tabs-four-appointment" aria-selected="true">Home Page</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-emr-tab" data-toggle="pill" href="#custom-tabs-four-emr" role="tab" aria-controls="custom-tabs-four-emr" aria-selected="false">EMR</a>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-appointment" role="tabpanel" aria-labelledby="custom-tabs-four-appointment-tab">
                  	
			         <section id="section_services">
			         	
						<div class="card">
							<div class="card-body">
						<!-- section B -->
									<form  name="f1" action="<?php  echo site_url('Welcome/insert_content'); ?>"    enctype="multipart/form-data"  method="post">
										<div class="row">
					                  		<div class="col-sm-12">
						                  		<select id="sel_home_content" name="sel_home_content" onchange="changeDiv()">
					                  					
					                  					<option value="">-Select Content-</option>
					                  					<option value="services">Services</option>
					                  					<option value="about">About Us</option>
					                  					<option value="portfolio">Portfolio</option>
					                  					<option value="team">Team</option>
					                  					<!-- <option value="contact">Contact</option> -->
					                  				</select>
						                  	</div>
								         </div>
										<div class="row" style="padding: 10px;">
											<div class="col-sm-12 text-center text-primary">
													<h4 id="content_heading" ></h4>
											</div>
										</div>
									<div class="row form-group">
										
										<div class="col-sm-12">
											<label class="control-label" style="">Title:</label>
											<input type="hidden" name="content_id" id="content_id">
											<input name="txt_content_title" type="text" id="txt_content_title" class="form-control" placeholder="Content Title........"  required />
										</div>
									</div>
									<div class="row form-group">
										
										<div class="col-sm-12">
											<label class="control-label" style="">Description:</label>
											<input name="txt_content_desc" type="text" id="txt_content_desc" class="form-control" placeholder="Content Description........"  required />
										</div>
									</div>
									<div class="row form-group">
										
										<div class="col-sm-12">
											<label class="control-label" style=""> Image:</label>
											<input type="hidden" name="txt_content_file" id="txt_content_file">
											        <input type="file" name="content_pic" id="content_pic" onchange="readURL(this);" required/>

										</div>
									</div>
									<div class="row panel-body">
										
										<div class="col-sm-9">
											<input  type="Submit" class="btn btn-success" value="Submit" align ="center"/>
												<input name="Reset" type="reset" class="btn btn-primary" id="Reset" value="Cancel" align ="center"/>
										</div>
									</div>
									<hr/>
									<div class="col-sm-12 pull-right">
											<button type="button" class="btn btn-success btn-block" onclick="getSliderResult()">Show Result <i class="fa fa-search"></i></button>
									</div><hr/>
									<div class="col-sm-12 panel-body">
										<div class="row">
											<div class="col-sm-4 form-group">
												<input type="text" class="form-control" name="txt_slider_search" id="txt_slider_search" placeholder="Search..............">
											</div>
										</div>
									</div>
									<div class="col-sm-12 panel-body">
											<div class="table-responsive" style="height:200px;width:100%;overflow:scroll;overflow-x:scroll;overflow-y:scroll;">
													<table class="table styled-table" id="dwnld_table">
														<thead >
				                                          <tr class="" style="width: 100%;">
				                                                <th style="color:#000000;width: 10%;">Sr. No.</th>
				                                                 <th style="color:#000000;width: 20%;">Title</th>
				                                                 <th style="color:#000000;width: 30%;">Desc</th>
				                                               	<th style="color:#000000;width: 30%;">Images</th>
				                                                  <th style="text-align:center; color:#000;width: 10%;">Action</th>
				                                          </tr>
				                                        </thead>
				                                        <tbody id="tbl_slider">
				                                       
				                                        </tbody>
													</table>
											</div>
									</div>

								</form>
							</div>
						</div>
			         </section>
                    
                  </div>
	              <div class="tab-pane fade" id="custom-tabs-four-emr" role="tabpanel" aria-labelledby="custom-tabs-four-emr-tab">
	                  		
                  		<div class="row">
                  			<div class="col-sm-12 form-group ">
                  				<label>Select EMR For Use : </label>
                  				<select  id="sel_emr_type" name="sel_emr_type" >
                  					<option value="<?php echo $res->clinic_emr;?>"><?php echo $res->clinic_emr;?></option>
                  					<option value="">-Select Emr Type-</option>
                  					<option value="Generel EMR">Generel EMR</option>
                  					<option value="Homoeopathic EMR">Homoeopathic EMR</option>
                  				</select>
                  			</div>
                  		</div>
                  		<div class="row">
                  			<div class="col-sm-3 form-group ">
                  				<button class="btn btn-block btn-flate btn-primary" onclick="updateEmr()">Save EMR</button>
                  			</div>
                  		</div>
	                     
	              </div>
	             
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>


</div>
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
function changeDiv()
{
	var sel_home_content=document.getElementById('sel_home_content').value;
	var content_heading=document.getElementById('content_heading').value;

	document.getElementById("content_heading").innerHTML="add "+sel_home_content;
}
function chk_alert()
{
	$('#user_alert').show();
	
  setTimeout(hideElement, 1000) //milliseconds until timeout//
  
	
}
function hideElement() 
{
	$('#user_alert').hide(2000);
}
function getSliderResult()
{
		
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getSliderResultTable",
					   data:{
							   
							}              
						}).done(function(message){
						//toast();
					//alert(message);
					$('#tbl_slider').empty();
					$('#tbl_slider').append(message);
						
				   });
					
}
function getEditSlider(id)
{
		
		
		//alert(category);
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getSliderEdit",
					   data:{
							   id:id,
							 }              
						}).done(function(message){
						var res=message.split('_|_');
					     //alert(message);
					     
					      $('#content_id').val(id);
					      $('#txt_content_title').val(res[0]);
					      $('#txt_content_desc').val(res[1]);
					      $('#txt_content_file').val(res[2]);
					      //$('[href="#sectionB"]').tab('show');
					      $('#txt_content_title').focus();
					      $('#sel_home_content').val(res[3]);
					      document.getElementById("content_pic").required = false;
					      document.getElementById("content_heading").innerHTML="add "+res[3];
      
					   });
	
		
 }	
 function confirmation_slider(id)
 {
		
		
			if(id!="")
			{
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/del_slider",
					   data:{
							   aid:id,
							  
							 }              
						}).done(function(message){
						//toast();
					//alert(message);
					getSliderResult();

						
					   });
			}
			
		
		
 }	
function updateEmr()
{
	var sel_emr_type=document.getElementById('sel_emr_type').value;
	$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Generel_emr_controller/getEmrUpdate",
         data:{
                sel_emr_type:sel_emr_type,
           }              
        }).done(function(message){
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