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
<script type="text/javascript">
var startyear = "1910";
var endyear = "2040";
var dat = new Date();
var curday = dat.getDate();
var curmon = dat.getMonth()+1;
var curyear = dat.getFullYear();
	
	function checkleapyear(datea)
	{
		if(datea.getYear()%4 == 0)
			{
				if(datea.getYear()% 10 != 0)
					{
						return true;
					}
				else
					{
						if(datea.getYear()% 400 == 0)
							return true;
						else
							return false;
					}
			}
		return false; 
	} 

function DaysInMonth(Y, M) 
{
		with (new Date(Y, M, 1, 12)) 
		{
			setDate(0);
			return 
			getDate();
		} 
} 


function datediff(date1, date2) 
{
	var y1 = date1.getFullYear(), m1 = date1.getMonth(), d1 = date1.getDate(),
	y2 = date2.getFullYear(), m2 = date2.getMonth(), d2 = date2.getDate();
		if (d1 < d2) 
		{
			m1--;
			d1 += DaysInMonth(y2, m2);
		}
		if (m1 < m2) 
		{
			y1--;
			m1 += 12;
		}
	return [y1 - y2, m1 - m2, d1 - d2]; 
} 

function daysNoMonth(year,month) 
{
    
    return new Date(year, month, 0).getDate();
}

</script>
<style>
.row 
{
	color: #6c757d!important;
}
</style>
</head>
<body>
<div class="div_container">

<?php $this->load->view('navbar2');?>
		<div class="row" style="padding: 10px;">
			 <div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>

			<div class="col-sm-12 text-center text-primary">
					<h4 class="header">New Appointment </h4>
					<label id="lab_login"></label>
			</div>
		</div>
		<div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0 ">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">New Patient</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Followup</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-list-tab" data-toggle="pill" href="#custom-tabs-four-list" role="tab" aria-controls="custom-tabs-four-list" aria-selected="false">Appointments</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  		<div class="panel panel-primary">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Appointment</h3>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        	<form  name="f1" action="<?php  echo site_url('Appointment_controller/insert_new_patient_appointment'); ?>"   enctype="multipart/form-data"  method="post">
	                        	<div class="row ">
	                        		<div class="col-sm-2 form-group text-left ">
						              <label class="control-label">Upload Profile Photo( ) :</label>
						              <input type="file" name="fle_option1" id="fle_option1"  onchange='Test.UpdatePreview(this)' accept="image/*" capture>
						          </div>
									<div class="col-sm-2 form-group text-left">
										<label>First Name</label>
										<input type="hidden" name="txt_pid" id="txt_pid">
										<input type="text" name="txt_patient_first_name" id="txt_patient_first_name" class="form-control " placeholder="Enter Firsr Name" required>
									</div>
									<div class="col-sm-2 form-group text-left ">
										<label>Middle Name</label>
										<input type="text" name="txt_patient_middle_name" id="txt_patient_middle_name" class="form-control " placeholder="Enter Middle Name" required>
									</div>
									<div class="col-sm-2 form-group text-left ">
										<label>Last Name</label>
										<input type="text" name="txt_patient_last_name" id="txt_patient_last_name" class="form-control " placeholder="Enter Last Name" required>
									</div>
									<div class="col-sm-2 form-group text-left ">
										<label>Mobile No</label>
										<input type="text" name="txt_patient_mobile" id="txt_patient_mobile" class="form-control" placeholder="Enter Mobile Number" required>
									</div>
									<div class="col-sm-2 form-group text-left ">
										<label>Address</label>
										<textarea name="txt_patient_address" id="txt_patient_address" class="form-control" placeholder="Enter Address" required></textarea>
									</div>
									<div class="col-sm-2 form-group text-left ">
										<label>Date of birth</label>
										<input type="date" name="txt_dob" id="txt_dob" class="form-control" onchange="calage()" placeholder="" required>
									</div>
									<div class="col-sm-1 form-group text-left ">
										<label>Age</label>
										<input type="txet" name="txt_age" id="txt_age" class="form-control" placeholder="" required>
									</div>
									<div class="col-sm-1 form-group text-left">
										<label>Blood Group</label>
										<select name="sel_bg" id="sel_bg"  required>
											<option value="">-Select Blood-</option>
											<option value="A+">A+</option>
											<option value="O+">O+</option>
											<option value="B+">B+</option>
											<option value="AB+">AB+</option>
											<option value="A-">A-</option>
											<option value="O-">O-</option>
											<option value="B-">B-</option>
											<option value="AB-">AB-</option>
										</select>
									</div>
									<div class="col-sm-1 form-group">
										<label>Gender</label>
										<select name="sel_gender" id="sel_gender"  required />
											<option value="">-Select Gender-</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
											
										</select>
									</div>
									<div class="col-sm-2 form-group">
	                        			<label id="">Appointment Date :</label>
	                        			<input type="date" name="txt_frm_date" id="txt_frm_date" class="form-control" onchange="chkdate()"   required>
	                        		</div>
	                        		<div class="col-sm-2 form-group">
	                        			<label>Select Time :</label>
	                        			<input type="hidden" name="txt_slot_id" id="txt_slot_id">
	                        			<input type="text" name="txt_time" id="txt_time" class="form-control" required>
	                        		</div>
	                        		
	                        		<div class="col-sm-3 form-group">
	                        			<label></label>
	                        			<button id="btn_new_ap" class="btn btn-primary btn-block" type="submit" style="margin-top: 8px;">Schedule Appointment <i class="fa fa-plus-circle"></i></button>
	                        		</div>
	                        	</div>
	                        </form>
                        </div><hr/>
                        <div class="row">
                        	<div class="col-sm-12" style="overflow-x: scroll;height: 500px;">
                        		<table class="table styled-table">
                        			<thead style="text-align:center;">
                        				<tr>
                        					<th style="text-align:center;">Start Time</th>
                        					<th style="text-align:center;">End Time</th>
                        					<th style="text-align:center;">Action</th>

                        				</tr>
                        			</thead>
                        			<tbody id="tbl_slot">
                        				
                        			</tbody>
                        		</table>
                        	</div>
                        </div>
                    </div>
                     
                  	
                  </div>
                  <!-- tab followup -->
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
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
                          	  <th>Date & Time</th>
		                      <th>Last Fees</th>
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody id="tbl_patient_list">
		                      
		                  </tbody>
		                </table>
                  	
              		</div>
                  </div>
                  <!-- tab followup -->
                  <!-- tab list -->

	               	<div class="tab-pane fade" id="custom-tabs-four-list" role="tabpanel" aria-labelledby="custom-tabs-four-list-tab">
	               		<div class="row form-group">

	               			<div class="col-sm-3 pull-right ">
	               				<input type="date" name="txt_ap_date_search" id="txt_ap_date_search" class="form-control" onchange="chkapsearch()">
	               			</div>
	               		</div>
	                  	
	              		<div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
	              			
	                  		<table class="table styled-table">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>Patient Name</th>
	                          	  <th>Mobile No</th>
	                          	  <th>Date & Time</th>
	                          	  <th>Status</th>
			                      <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody id="tbl_appointment_list">
			                  	
			                      
			                  </tbody>
			                </table>
	                  	
	              		</div>
	                </div>
                  <!-- tab list -->
                  
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
		$('#txt_schedule_search').keyup(function() {
			search_table($(this).val());
		});

		function search_table(value){
			//alert();
			$('#tbl_schedule tr').each(function(){
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
 function calage() 
{
	var txt_dob=document.getElementById('txt_dob').value;
	var dob = new Date(txt_dob);
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();
    
    //convert the calculated difference in date format
    var age_dt = new Date(month_diff); 
    
    //extract year from date    
    var year = age_dt.getUTCFullYear();
    
    //now calculate the age of the user
    var age = Math.abs(year - 1970);
    
    //display the calculated age
    //document.write("Age of the date entered: " + age + " years");
    $('#txt_age').val(age+" years");
 
}
function chkapsearch()
{
	var sel_status=$('#txt_ap_date_search').val();
	$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/getApSearch",
         data:{
                
                txt_ap_date_search:sel_status
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_appointment_list').empty();
        $('#tbl_appointment_list').append(message);
        
        //$('#imgload').hide();

         });

}
 function getAvailableStatus(cnt,schedule_id)
{
  //$('#imgload').show();
 
  var sel_status=$('#sel_status'+cnt).val();//document.getElementById('sel_status'+cnt).value;
 //alert(sel_status);
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/updateAppStatus",
         data:{
                schedule_id:schedule_id,
                sel_status:sel_status
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_schedule').empty();
        $('#tbl_schedule').append(message);
        toast_chk();
        //$('#imgload').hide();

         });
}
function changelable()
{
	$('#lab_login').text("");
	 $(':input[type="submit"]').prop('disabled', false);
}
function changelable_count(cnt)
{
	
	chkdate_cnt(cnt);
	
}
function chkdate_cnt(cnt)
{
  //$('#imgload').show();
 
 
  var txt_ap_date=$('#txt_ap_date'+cnt).val();//document.getElementById('txt_ap_date'+cnt).value;
 //alert(sel_status);
   $.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Appointment_controller/chkSchedule",
	         data:{
	                txt_ap_date:txt_ap_date,
	       		}              
        }).done(function(message){
      //alert(message);
        if(message=="Available")
        {
        	$('#btn_schedule'+cnt).prop('disabled', false);
        	$('#lab_login').text("");  
        	getTimeSlot2(cnt);
        	
        }
        else
        {
        	$('#lab_login').text("Docter is not available on this date. Please select another date !");  
            $('#lab_login').css("color","Red");
            $('#btn_schedule'+cnt).prop('disabled', true);

        }
        
        });
}
function getSlotTable()
{
	var txt_ap_date=document.getElementById('txt_frm_date').value;
	$.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Appointment_controller/getTimeSlotAllTable",
	         data:{
	                txt_ap_date:txt_ap_date,
	       		}              
        }).done(function(message){
      		 
        	$('#tbl_slot').empty();
        	$('#tbl_slot').append(message);
        });
}
function getSlotTable2(cnt)
{
	var txt_ap_date=document.getElementById('txt_ap_date'+cnt).value;
	$.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Appointment_controller/getTimeSlotAllTable",
	         data:{
	                txt_ap_date:txt_ap_date,
	       		}              
        }).done(function(message){
      		 
        	$('#tbl_slot').empty();
        	$('#tbl_slot').append(message);

        });
}
function updateSlot(slot_id)
{
	
	$.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Appointment_controller/getUpdateSlot",
	         data:{
	                slot_id:slot_id,
	       		}              
        }).done(function(message){
      		 
        	document.getElementById('txt_time').value=message;
        	document.getElementById('txt_slot_id').value=slot_id;
        });
}
function getTimeSlot()
{
	var txt_ap_date=document.getElementById('txt_frm_date').value;
	$.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Appointment_controller/getTimeSlotAll",
	         data:{
	                txt_ap_date:txt_ap_date,
	       		}              
        }).done(function(message){
      		 getSlotTable();
        	
        });
	
}
function getTimeSlot2(cnt)
{
	var txt_ap_date=document.getElementById('txt_ap_date'+cnt).value;
	$.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Appointment_controller/getTimeSlotAll",
	         data:{
	                txt_ap_date:txt_ap_date,
	       		}              
        }).done(function(message){
      		 
        	getSlotTable2(cnt);
        });
	
}
function chkdate()
{
  //$('#imgload').show();
 
 
  var txt_ap_date=$('#txt_frm_date').val();//document.getElementById('txt_ap_date'+cnt).value;
 //alert(sel_status);
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/chkSchedule",
         data:{
                txt_ap_date:txt_ap_date,
           }              
        }).done(function(message){
        //]]alert(message);
        if(message=="Available")
        {
        	$(':input[type="submit"]').prop('disabled', false);
        	$('#lab_login').text("");
        	getTimeSlot();
        }
        else
        {
        	$('#lab_login').text("Docter is not available on this date. Please select another date !");  
            $('#lab_login').css("color","Red");
            $(':input[type="submit"]').prop('disabled', true);
            $('#tbl_slot').empty();
        }
        
        //$('#imgload').hide();
        	
	});
}
/*function saveFollowup(pid,cnt)
{
  //$('#imgload').show();
 var txt_ap_date=$('#txt_ap_date'+cnt).val();
 var txt_ap_time=$('#txt_ap_time'+cnt).val();
  
  if(txt_ap_date=="")
  {
  	alert('select date please');
  }
  else if (txt_ap_time=="") 
  {
  	alert('select time please');
  }
  else
  {
   $.ajax({
        type:"POST",
        url:"<?php //echo base_url();?>index.php/Appointment_controller/insertFollowup",
         data:{
                pid:pid,
                txt_ap_date:txt_ap_date,
                txt_ap_time:txt_ap_time
           }              
        }).done(function(message){
        //alert(message);
        
        toast_chk();
        $('#tbl_patient_list').empty();

         });
    }
}*/
function saveFollowup(pid,cnt)
{
  //$('#imgload').show();
 
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/getFollowUp",
         data:{
                pid:pid,
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');

        	$('#txt_pid').val(res[0]);
        	$('#txt_patient_first_name').val(res[1]);
        	$('#txt_patient_middle_name').val(res[2]);
        	$('#txt_patient_last_name').val(res[3]);
        	$('#txt_patient_mobile').val(res[4]);
        	$('#txt_patient_address').val(res[6]);
        	$('#txt_dob').val(res[7]);
        	$('#txt_age').val(res[8]);
        	$('#sel_bg').val(res[9]);
        	$('#sel_gender').val(res[5]);

        	$('[href="#custom-tabs-four-home"]').tab('show');
        

         });
    
}
function cancelAppointment(pid,cnt)
{
  //$('#imgload').show();
 
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/ChangeApStatus",
         data:{
                pid:pid,
                
           }              
        }).done(function(message){
        //alert(message);
        
        
        $('#tbl_appointment_list').empty();
        $('#tbl_appointment_list').append(message);

         });
    
}
function getPatientSearch()
{
	var txt_first_name=document.getElementById('txt_first_name').value;
	var txt_middle_name=document.getElementById('txt_middle_name').value;
	var txt_last_name=document.getElementById('txt_last_name').value;
	var txt_mobile_no=document.getElementById('txt_mobile_no').value;

  $('#imgload').show();
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/PatientSearchAppointment",
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
</script>
</html>
<?php 
}
else
{
	redirect('Welcome/index');
}
?>