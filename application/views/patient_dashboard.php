<?php
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
</head>

<body onload="getPatientDetails()">

<div class="wrapper">

<?php $this->load->view('patient_navbar');?>
	
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-left ">
					<h4>Dashboard</h4>
			</div>
		</div><hr/>
		<div class="row form-group bg-light" style="padding: 10px;">
			<div class="col-sm-3 bg-info" >
				<div class="row form-group" >

					<div class="col-sm-12" style="align-items: center;">
						<input type="hidden" name="txt_patient_id" id="txt_patient_id" value="<?php if(isset($uid)) echo $uid;?>">
						<img src="<?php if(isset($r)){ echo base_url().$r->profile_pic;}?>" style="height:150px;width: 150px;margin-left: 130px;padding-top: 20px;" class="img img-circle">
					</div>
				</div>

				<div class="row form-group" >

					<div class="col-sm-12" style="text-align: center;">
						<h4><?php if(isset($r)){ echo $r->first_name.' '.$r->middle_name.''.$r->last_name;}?></h4>
					</div>
				</div><hr class="bg-light" />
				<div class="row form-group" >

					<div class="col-sm-12" style="text-align: center;">
						<h4><?php if(isset($c)){ echo $c->clinic_name;}?></h4>
					</div>
				</div>
				<div class="row form-group" >

					<div class="col-sm-12" style="text-align: center;">
						<h6>Call - 9021205731</h6> 
					</div>
					<div class="col-sm-12" style="text-align: center;">
						<h6><i class="fa fa-envelope"></i> - sonu.thakare009@mail.com</h6> 
					</div>
					
				</div>
			</div>
			<div class="col-sm-9 bg-white">
				<div class="row form-group mbsection" >
					<div class="col-sm-12">
						<div class="container">
						  <br/>
						  <div class="panel-group">
						    <div class="panel panel-default">
						      <div class="panel-heading">
						        <h4 class="panel-title">
						          <a data-toggle="collapse" href="#collapse1" class="btn btn-default btn-block">Message To Doctor </a>
						        </h4>
						      </div>
						      <div id="collapse1" class="panel-collapse collapse bg-light" style="padding: 20px;">
						        <div id="div_message" class="row form-group" style="padding: 10px;height: 400px;overflow-y: scroll;">
					
								</div>
						        <div class="row form-group" style="padding: 10px;">
									<div class="col-10 form-group" >
										
										<input type="text"class="form-control"  name="txt_message" id="txt_message" placeholder="Enter Message........" style="height: 30px;" onclick="getmsg()">

									</div>
									<div class="col-2 form-group">
										<button class="btn btn-xs btn-success" style="height: 30px;" onclick="getSendMessage()">Send <i class="fa fa-arrow"></i></button>
									</div>
								</div>
						      </div>

						    </div>
						  </div>
						</div>
					</div>
				</div>
				<div class="row form-group" >
					<div class="col-lg-6 col-12 mbsection" id="">
			            <!-- small card -->
			            <div class="small-box bg-warning">
			              <div class="inner">
			              	<p id="lab_login">Appointment Section</p>
			              	<?php
			              		if(isset($uid))
			              		{ 
			              			$res_ap=$this->Mnm->get_appointment_by_patientid($uid);
			              			if($res_ap!="")
			              			{
			              			?>
			              			<p id="schedule_date" class="text-red"><b><?php echo "Appointment Date - ".$res_ap->appointment_date.", Time - ".$res_ap->appointment_time;?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="btn btn-danger btn-xs" onclick="cancelAppointment()">Cancel Appointment &nbsp;<i class="fa fa-times-circle"></i></a></p>
			              			<input type="hidden"  name="cancel_ap" id="cancel_ap" value="<?php echo $res_ap->ap_id;?>">
			              		
			              	<?php 
			              			}
			              		}
			              	?>
			              	
			              	
			                Book Date : -<input type="date" name="txt_ap_date" id="txt_ap_date"  style="" class="form-control" onchange="chkdate()">
							
			                <hr class="bg-white" />
			              </div>
			              <div class="icon">
			                <i class="fas fa-clock"></i>
			              </div>
			              <a href="#"  class="small-box-footer btn-danger">
			                Book New Appointment <i class="fas fa-arrow-circle-right"></i>
			              </a>
			            </div>
			          </div>
					<div class="col-lg-6 col-12 mbsection" style="padding: 10px;">
							<div class="small-box bg-success">
				              <div class="inner">
				                <h5>Patient History</h5>

				                <p>Select OPD Date</p>

			              	
			               <select name="sel_history" id="sel_history" class="form-control" onchange="getPatientEmrHistory()">
                                <option value="">-Select OPD Date-</option>


                              </select>
							
			                <hr class="bg-white" />
				              </div>
				              <div class="icon">
				                <i class="fa fa-user"></i>
				              </div>
				              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				            </div>
					</div>
					<div class="col-lg-6 col-12 mbsection" style="padding: 10px;">
							<div class="small-box bg-info">
				              <div class="inner">
				                <h5>Patient Prescription</h5>

				                <p>Select OPD Date</p>

			              	
			               <select name="sel_prescription" id="sel_prescription" class="form-control" onchange="getPatientPrescriptionHistory()">
                                <option value="">-Select OPD Date-</option>


                              </select>
							
			                <hr class="bg-white" />
				              </div>
				              <div class="icon">
				                <i class="fa fa-user"></i>
				              </div>
				              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				            </div>
					</div>

				</div>

			</div>
		</div>

	
</div>
<!-- modal -->
<div class="modal" id="appointment_modal" aria-modal="true" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title">Select Slot</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
      <div class="modal-body">
          <div class="row">
              <div class="col-sm-12 card card-primary card-outline" style="padding: 5px;">
                
                <div class="row">
                          <div class="col-sm-12" style="overflow-x: scroll;height: 300px;">
                            <table class="table table-hover">
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
              <div class="col-sm-12">
                <div class="row form-group">
                    <div class="col-sm-12">
                        <input type="hidden" name="txt_slot_id" id="txt_slot_id">
                        <input type="text" name="txt_time" id="txt_time" class="form-control text-center" placeholder="Time Slot...." >
                    </div>
                </div>
                
                <div class="row form-group">
                  <div class="col-sm-12">
                        <button type="button" class="btn btn-success btn-block" onclick="saveFollowupAppointment()">Save</button>
                  </div>
                </div>

              </div>
          </div>
      </div>
      
      <div class="modal-footer justify-content-between">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- modal -->
<!-- modal -->
<div class="modal" id="PatientHistoryModal" aria-modal="true" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title">Patient History</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
      <div class="modal-body">
          <div class="row">
              <div class="col-sm-12 card card-primary card-outline" style="padding: 5px;">
                	<hr/>
                          <div id="div_chief_complaints_history" class="col-sm-12" style="overflow-x: scroll;height: 250px;">
                            <table class="table table-hover">
                              <thead style="width: 100%;">
                                <th style="width: 100%;" colspan="2">Complaints</th>
                                
                              </thead>
                              <thead id="tbl_complaint_history">
                                
                              </thead>
                            </table>
                          </div><hr/>
                          <div id="div_diagnosis_history" class="col-sm-12" style="overflow-x: scroll;height: 250px;">
                            <table class="table table-hover">
                              <thead style="width: 100%;">
                                <th style="width: 100%;" colspan="2">Diagnosis</th>
                                
                              </thead>
                              <thead id="tbl_diagnosis_history">
                                
                              </thead>
                            </table>
                          </div><hr/>
                          <div id="div_treatment_history" class="col-sm-12" style="overflow-x: scroll;height: 250px;">
                            <table class="table table-hover">
                              <thead style="width: 100%;">
                                <th style="width: 100%;" colspan="4">Treatment</th>
                                
                              </thead>
                              <thead id="tbl_treatment_history">
                                
                              </thead>
                            </table>
                          </div><hr/>
                          <div id="div_instructions_history" class="col-sm-12" style="overflow-x: scroll;height: 250px;">
                            <table class="table table-hover">
                              <thead style="width: 100%;">
                                <th style="width: 100%;" colspan="2">Instruction</th>
                                
                              </thead>
                              <thead id="tbl_instruction_history">
                                
                              </thead>
                            </table>
                          </div>
                
              </div>
              
          </div>
      </div>
      
      <div class="modal-footer justify-content-between">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- modal -->
<!-- modal -->
<div class="modal" tabindex="-1" id="Prescription_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Patient Prescription</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
	          <table class="table table-hover text-nowrap">
		          <thead>
		            <tr>
		              <th>ID</th>
		              <th>Medicine Name</th>
		              <th>Qty</th>
		              <th>Dose</th>
		              <th>Day</th>
		              <th>Instruction</th>
		              <th>Action</th>
		            </tr>
		          </thead>
		          <tbody id="tbl_medicine_search_history">
		              
		          </tbody>
	        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="modalclose()">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
$(document).ready(function () {
	setInterval(getmsg, 5000);
	//setInterval(chkStatus, 30000);
	});
$(document).ready(function () {
	//chkStatus();
	});
/*function chkStatus()
{
	var live_status=<?php  //echo $live_status;?>;
	alert(live_status);
	document.getElementById('online_status').innerHTML=live_status;
	$('#online_status').show();

}*/
function getmsg()
{
	var pid=$('#txt_patient_id').val();
	$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllMsgPatient",
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
function getmsgdel(chat_id)
{
	
	$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getMesDelPatient",
         data:{
                chat_id:chat_id
               
                
           	}              
        }).done(function(message){
        //alert(message);
        getmsg();
        
        });
}
function getSendMessage() 
{
	var msg=$('#txt_message').val();
	//var pid=$('#txt_patient_id').val();
	if(msg!="")
	{
		$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/InsertMsgPatient",
         data:{
                
                
                msg:msg
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        
        getmsg();

        document.getElementById('txt_message').value="";
         });
	}
	else
	{
		alert("First Enter Message Please");
	}
	
	
}
function modalclose()
{

	$('#Prescription_modal').modal('hide');
}
function getPatientDetails()
{
	getPatientHistory();
}
function getPatientHistory()
{
  //$('#imgload').show();
  var pid=$('#txt_patient_id').val();
  var sel_patient_list="";

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/patientHistoryByOpd",
         data:{
                
                pid:pid,
                sel_patient_list:sel_patient_list
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#sel_history').empty();
        $('#sel_history').append(message);

        $('#sel_prescription').empty();
        $('#sel_prescription').append(message);
        //$('#imgload').hide();

         });
    
}
function cancelAppointment()
{
  //$('#imgload').show();
 var pid=$('#cancel_ap').val();
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/ChangeApStatus",
         data:{
                pid:pid,
                
           }              
        }).done(function(message){
        //alert(message);
       location.reload();

         });
    
}
function chkdate()
{
  //$('#imgload').show();
 
 
  var txt_ap_date=$('#txt_ap_date').val();//document.getElementById('txt_ap_date'+cnt).value;
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
        	$('#lab_login').text("Appointment Section");
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
function getTimeSlot()
{
	var txt_ap_date=document.getElementById('txt_ap_date').value;
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
function getSlotTable()
{
	var txt_ap_date=document.getElementById('txt_ap_date').value;
	$.ajax({
	        type:"POST",
	        url:"<?php echo base_url();?>index.php/Appointment_controller/getTimeSlotAllTable",
	         data:{
	                txt_ap_date:txt_ap_date,
	       		}              
        }).done(function(message){
      		 
        	$('#tbl_slot').empty();
        	$('#tbl_slot').append(message);
        	$('#appointment_modal').modal('show');
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
function saveFollowupAppointment()
{
   var txt_patient_id=document.getElementById('txt_patient_id').value;
   var txt_ap_date=document.getElementById('txt_ap_date').value;
   var txt_slot_id=document.getElementById('txt_slot_id').value;
   var txt_time=document.getElementById('txt_time').value;
   

   if(txt_time!="")
   {
      $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Appointment_controller/insert_followup_patient_date_appointment",
           data:{
                  txt_slot_id:txt_slot_id,
                  txt_ap_date:txt_ap_date,
                  txt_time:txt_time,
                  txt_patient_id:txt_patient_id,
                  
            }              
        }).done(function(message){
           
          document.getElementById('txt_time').value="";
          document.getElementById('txt_slot_id').value="";
          document.getElementById('txt_problem').value="";
          $('#appointment_modal').modal('hide');
          location.reload();
      });
   }
   else
   {
      alert("select time slot please......");
   }
   

}
function getPatientEmrHistory()
{
    //var sel_patient_list=document.getElementById('sel_patient_list').value;

	var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('sel_history').value;
  if(opd_id!="")
  {
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/chiefHistorytoPatient",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_complaint_history').empty();
        $('#tbl_complaint_history').append(message);

         });



$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/diagnosisHistorytoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_diagnosis_history').empty();
        $('#tbl_diagnosis_history').append(message);

         });


  $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/treatmentHistorytoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_treatment_history').empty();
        $('#tbl_treatment_history').append(message);

         });


    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/instructionHistorytoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_instruction_history').empty();
        $('#tbl_instruction_history').append(message);

         });

        $('#PatientHistoryModal').modal('show');
    }
}
function getPatientPrescriptionHistory()
{
  //$('#imgload').show();
  var pid=document.getElementById('txt_patient_id').value;
  var sel_patient_list=document.getElementById('sel_prescription').value;

	if(sel_patient_list!="")
	{
		$.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getAllMedicineByPatient",
         data:{
                
                pid:pid,
                sel_patient_list:sel_patient_list
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_medicine_search_history').empty();
        $('#tbl_medicine_search_history').append(message);
        $('#Prescription_modal').modal('show');
        //$('#imgload').hide();

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