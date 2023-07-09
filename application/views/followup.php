 <?php $this->load->view('ismobile');?>
<?php
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
<style type="text/css">
  .row 
{
  color: #6c757d!important;
}
</style>
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
<?php //$this->load->view('asid_bar');?>
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-center ">
					<h4 class="header">Follow Up Patient</h4>
			</div>
		</div>
		<div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <!-- <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Input Form</a>
                  </li> -->
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Patient List</a>
                  </li> -->
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  	<div class="row">
                  		<div class="col-sm-2 form-group">
                  			<input type="text" name="txt_first_name" id="txt_first_name" class="form-control" placeholder="First Name....">
                  		</div>
                  		<div class="col-sm-2 form-group">
                  			<input type="text" name="txt_middle_name" id="txt_middle_name" class="form-control" placeholder="Middle Name..."> 
                  		</div>
                  		<div class="col-sm-2 form-group">
                  			<input type="text" name="txt_last_name" id="txt_last_name" class="form-control" placeholder="Last Name....">
                  		</div>
                  		<div class="col-sm-2 text-center form-group">
                  			<h4>OR</h4>
                  		</div>
                  		<div class="col-sm-2 form-group">
                  			<input type="text" name="txt_mobile_no" id="txt_mobile_no" class="form-control" placeholder="Mobile Number...." onkeypress="getClear()">
                  		</div>
                  		<div class="col-sm-2 form-group">
                  			<button class="btn btn-block btn-success" onclick="getPatientSearch()">Search &nbsp;<i id="imgload" style="display: none;" class="fa fa-spinner fa-spin"></i></button>
                  		</div>
                  	</div>
              		<div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
              			
                  		<table class="table styled-table">
		                  <thead>
		                    <tr>
		                      <th>ID</th>
		                      <th>Patient Name</th>
                          	  <th>Mobile No</th>
		                      <th>Last Fees</th>
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody id="tbl_patient_list">
		                      
		                  </tbody>
		                </table>
                  	
              		</div>
				  </div>
				  
				</div>
				
			</div>
		</div>
	</div>

<!-- modal -->
<div class="modal" id="modal_info" style="padding-right: 16px;" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Add Fees</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <input type="hidden" name="txt_patient_id" id="txt_patient_id">
                    <select name="sel_fess" id="sel_fees" class="form-control ">
                      <option value="">-Select-</option>
                      <option value="100">100</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                    </select>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light" onclick="getModalFees()">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- modal -->	
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
function getClear()
{
	document.getElementById('txt_first_name').value="";
	document.getElementById('txt_middle_name').value="";
	document.getElementById('txt_last_name').value="";
	//var txt_mobile_no=document.getElementById('txt_mobile_no').value;
}
function getModalFees()
{
  var pid=document.getElementById('txt_patient_id').value;
  var sel_fees=document.getElementById('sel_fees').value;

  $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getOpdRegSave",
         data:{
                 pid:pid,
                 sel_fees:sel_fees
           }              
        }).done(function(message){
        
        //alert(message);
            if(message>0) 
            {
              $('#modal_info').modal('hide');
             window.location="<?php print base_url(); ?>index.php/Welcome/index2/";
            }
            
         });
}
function getOpdRegisteration(pid,cnt)
{
  //var pid=document.getElementById('txt_patient_id').value;
  //var sel_fees=document.getElementById('sel_fees').value;

  $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getOpdRegSave",
         data:{
                 pid:pid,
                 //sel_fees:sel_fees
           }              
        }).done(function(message){
        
        //alert(message);
           window.location="<?php print base_url(); ?>index.php/Welcome/index2/";
            
         });
}
function getPatientSearch()
{
	var txt_first_name=document.getElementById('txt_first_name').value;
	var txt_middle_name=document.getElementById('txt_middle_name').value;
	var txt_last_name=document.getElementById('txt_last_name').value;
	var txt_mobile_no=document.getElementById('txt_mobile_no').value;

  if(txt_first_name!="" || txt_mobile_no!="")
  {
    alert('Please Enter Name or Mobile Number');
  }
  else
  {
      $('#imgload').show();
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/PatientSearch",
           data:{
                  txt_first_name:txt_first_name,
                  txt_middle_name:txt_middle_name,
                  txt_last_name:txt_last_name,
                  txt_mobile_no:txt_mobile_no
                  
             }              
          }).done(function(message){
          //alert(message);
          var res=message.split('_|_');
          
          $('#tbl_patient_list').empty();
          $('#tbl_patient_list').append(message);
          $('#imgload').hide();

           });
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