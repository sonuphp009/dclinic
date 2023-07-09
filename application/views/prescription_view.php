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
<style>
.row 
{
  color: #6c757d!important;
}
</style>
</head>
<body <?php if (isset($opd_data)) { echo 'onload="getPatientRecord2('.$p_data->patient_id.','.$opd_data->opd_id.')"';}?>>

<div class="div_container">

<?php $this->load->view('navbar2');?>
<?php //$this->load->view('asid_bar');?>
		<div class="row" style="padding: 10px;">
      <div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>

			
		</div>
    <div class="row form-group">
        <div class="col-sm-2">
          <input type="hidden" name="txt_patient_id" id="txt_patient_id">
          <input type="hidden" name="txt_opd_id" id="txt_opd_id">
        </div>
        <?php if(!isMobile()){?>
        <div class="col-sm-2 text-center">
          <h4 style="margin-top: 25px;" >Select Patient Name : -</h4>
        </div>
      <?php }?>
        <div class="col-sm-6" style="padding: 20px;">
          
          <select name="sel_patient_list" id="sel_patient_list"  onchange="getPatientRecord()">
             <?php
            if(isset($opd_data))
            {
                echo '<option value="'.$opd_data->opd_id.'">'.$p_data->first_name.' '.$p_data->middle_name.' '.$p_data->last_name.'</option>';

                echo '<option value="">-Select Patient-</option>';
                $res=$this->Inm->get_patient_list();

                if(count($res)>0)
                {
                  $count=1;

                  foreach ($res as $row) 
                  {
                      echo '<option value="'.$row->opd_id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                  }

                }
            }
            else
            {
                echo '<option value="">-Select Patient-</option>';
                $res=$this->Inm->get_patient_list();

                if(count($res)>0)
                {
                  $count=1;

                  foreach ($res as $row) 
                  {
                      echo '<option value="'.$row->opd_id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                  }

                }
            }
            
            ?>
          </select>
        </div>
        <div class="col-sm-2">
          
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">
              <div class="col-sm-4">
                <h6 id="lbl_patient_name"> </h6>
              </div>
              <div class="col-sm-4">
                <h6 id="lbl_opd_id"></h6>
              </div>
            </div>
          </div>
        </div>

    </div>
		<div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Input Form</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">History</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  	<div class="row">
                  		<div class="col-sm-12">
	                  	<form  name="f1" action="<?php  echo site_url('Medicine_controller/insert_prescription'); ?>"   enctype="multipart/form-data"  method="post">

	                  		<div class="row">
	                  			<div class="col-sm-3 col-xs-12" style="padding: 12px 20px;">
                            <input type="hidden" name="patient_id" id="patient_id" value="<?php if(isset($p_data)){echo $p_data->patient_id;}?>">
                            <input type="hidden" name="opd_id" id="opd_id" value="<?php if(isset($opd_data)){echo $opd_data->opd_id;}?>">
	                  				<label>Medicine Name :</label><br/>
		                  			 <select name="sel_medicine" id="sel_medicine" class="col-sm-13" style="width:234px; height:33px;padding:0px -2px;background-color:#FFFFFF;background-image:none;border:1px solid #dbd9d9;border-radius:3px;box-shadow:inset 0 2px 2px rgba(0,0,0,.090);" required>
                                    <option value="" class="form-control">Select Medicine</option>
                                   <?php foreach ($this->Mnm->get_medicine_all() as $row) 
                                      {
                                          echo "<option value='".$row->medicine_id ."'>".$row->medicine_name.' '."</option>";
                                      } 
                                                              
                                       ?>
                               </select>
		                  		</div>
                          <div class="col-sm-3" style="padding: 12px 20px;">
                            <label>Dose :</label> <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#dose_modal" onclick="all_dose()">Add New Dose <i class="fa fa-plus-circle"></i></button><br/>
                            <select name="sel_dose_time" id="sel_dose_time" class="col-sm-13" style="width:234px; height:33px;padding:0px -2px;background-color:#FFFFFF;background-image:none;border:1px solid #dbd9d9;border-radius:3px;box-shadow:inset 0 2px 2px rgba(0,0,0,.090);" >
                              <option value="">-select dose-</option>
                              <?php foreach ($this->Mnm->get_dose_all() as $row) 
                                  {
                                      echo "<option value='".$row->fld_dose_id."'>".$row->fld_dose."</option>";
                                  } 
                                                          
                                   ?>
                            </select>
                          </div>
                          <div class="col-sm-3" style="padding: 12px 20px;">
                            <label>Instruction :</label> <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#instruction_modal" onclick="all_instruction()">Add New Instruction <i class="fa fa-plus-circle"></i></button><br/>
                            <select name="sel_instruction" id="sel_instruction" class="col-sm-13" style="width:234px; height:33px;padding:0px -2px;background-color:#FFFFFF;background-image:none;border:1px solid #dbd9d9;border-radius:3px;box-shadow:inset 0 2px 2px rgba(0,0,0,.090);"  >
                              <option value="">-select instruction-</option>
                              <?php foreach ($this->Mnm->get_instruction_all() as $row) 
                                  {
                                      echo "<option value=".$row->instruction_id .">".$row->fld_instruction."</option>";
                                  } 
                                                          
                                   ?>
                            </select>
                          </div>
		                  		<div class="col-sm-1 form-group">
		                  			<label>Qty :</label><br/>
		                  			<input type="text" name="txt_qty" id="txt_qty" class="form-control input-xs"  placeholder="Quantity" required />
		                  		</div>
		                  		
                          <div class="col-sm-1 form-group">
                            <label>Day :</label> 
                            <input type="text" name="txt_day" id="txt_day" class="form-control" value="2" placeholder="days...">
                          </div>
		                  		
		                  		<div class="col-sm-1" style="padding: 12px 20px;">
		                  			<label></label>
		                  			<button class="btn btn-success btn-block btn-xs" type="button" style="height:40px;" onclick="save_prescription()">Add  <i class="fa fa-plus-circle"></i></button>
		                  		</div>
	                  		</div>

	                  	</form>
	                  </div>
			         </div><hr/>
                     
                	 <div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 250px;">
                  		<table class="table styled-table">
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
		                  <tbody id="tbl_medicine_search">
		                      
		                  </tbody>
		                </table>
                  	</div><br/>
                    <div class="row form-group">
                        <div class="col-sm-6">
                          <label>Follow Up Date :</label>
                          <input type="date" formate="dd/mm/yyyy" name="txt_followup_date" id="txt_followup_date" class="form-control" onchange="getSlotTable()">
                          
                        </div>
                        <div class="col-sm-6" style="padding: 12px 20px;">
                          <label></label>
                            <button class="btn btn-info btn-block"  onclick="printPres()">Save & Print Prescription <i class="fa fa-print"></i></button>
                        </div>
                    </div><hr/>
                  </div>
	                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
	                  		
	                  		<div class="row form-group">
	                  			  <div class="col-sm-2">Select Last OPD Date : -</div>
                            <div class="col-sm-4">
                              <select name="sel_history" id="sel_history"  onchange="getPatientPrescriptionHistory()">
                                <option value="">-Select OPD Date-</option>


                              </select>
                            </div>
                            <div class="col-sm-3">
                              <button class="btn btn-success btn-block swalDefaultSuccess" onclick="addcurrentpres()">add to current prescription <i class="fa fa-plus-circle"></i></button>
                            </div>
	                  		</div>
	                       <div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                          <table class="table styled-table">
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
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
</div>
	
<!-- modal -->
<div class="modal" id="dose_modal" aria-modal="true" style="padding-right: 16px;">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Dose Master</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">×</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <div class="row form-group">
	      	<div class="col-sm-12">
	      		<input type="hidden" name="dose_id" id="dose_id">
	      		<input type="text" name="txt_dose_name" id="txt_dose_name" class="form-control" placeholder="enter dose name..">
	      	</div>
	      </div>
	    </div>
	    <div class="modal-body">
	    	<button type="button" class="btn btn-primary swalDefaultSuccess" onclick="getdosesave()">Save changes</button>
	    </div>
	    <div class="modal-body">
	    	<div class="col-sm-12 card card-primary card-outline" style="padding: 5px;">
                <div class="row">
                     <div class="col-sm-12 text-primary text-center">
                      <h4>Content Added to Dose</h4>
                    </div>
                </div><hr/>
                <div class="row">
                    <div class="col-sm-12" style="overflow-y:scroll;height: 250px;border: 1px; ">
                      <table class="table styled-table">
                        <thead>
                          <th>Dose</th>
                          <th>Action</th>
                        </thead>
                        <tbody id="tbl_added_dose">
                          
                        </tbody>
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
<div class="modal" id="instruction_modal" aria-modal="true" style="padding-right: 16px;">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Instruction Master</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">×</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <div class="row form-group">
	      	<div class="col-sm-12">
	      		<input type="hidden" name="instruction_id" id="instruction_id">
	      		<input type="text" name="txt_instruction" id="txt_instruction" class="form-control" placeholder="enter instruction name..">
	      	</div>
	      </div>
	    </div>
	    <div class="modal-body">
	    	<button type="button" class="btn btn-primary swalDefaultSuccess" onclick="getInstructionSave()">Save changes</button>
	    </div>
	    <div class="modal-body">
	    	<div class="col-sm-12 card card-primary card-outline" style="padding: 5px;">
                <div class="row">
                     <div class="col-sm-12 text-primary text-center">
                      <h4>Content Added to Instruction</h4>
                    </div>
                </div><hr/>
                <div class="row">
                    <div class="col-sm-12" style="overflow-y:scroll;height: 250px;border: 1px; ">
                      <table class="table styled-table">
                        <thead>
                          <th>Instruction</th>
                          <th>Action</th>
                        </thead>
                        <tbody id="tbl_added_instruction">
                          
                        </tbody>
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
<div class="modal" id="appointment_modal" aria-modal="true" >
  <div class="modal-dialog modal-lg" style="width: 100%;">
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
                          <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
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
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
<?php $this->load->view('footer');?>

<?php $this->load->view('javascript');?>
<link rel="stylesheet" href="<?php print base_url(); ?>asset/Admin/select2.css">  
  <!-- iCheck -->
<script src="<?php print base_url(); ?>asset/Admin/select2.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function() {
  $("#sel_medicine").select2();
  $("#sel_dose_time").select2();
  $("#sel_instruction").select2();
});
</script>
<script type="text/javascript">
function saveFollowupAppointment()
{
   var txt_patient_id=document.getElementById('txt_patient_id').value;
   var txt_ap_date=document.getElementById('txt_followup_date').value;
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
                  txt_patient_id:txt_patient_id
            }              
        }).done(function(message){
           
          document.getElementById('txt_time').value="";
          document.getElementById('txt_slot_id').value="";
          $('#appointment_modal').modal('hide');
          toast_chk();
      });
   }
   else
   {
      alert("select time slot please......");
   }
   

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
function getSlotTable()
{
  var txt_ap_date=document.getElementById('txt_followup_date').value;
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
function printPres()
{
    var txt_patient_id=document.getElementById('txt_patient_id').value;
    var txt_opd_id=document.getElementById('txt_opd_id').value;
    var txt_followup_date=document.getElementById('txt_followup_date').value;
    if(txt_patient_id=="")
    {
      alert('Select Patient Please');
   }
   else if(txt_followup_date=="")
   {
      alert('Select Follo Up Date Please');
   }
   else
   {
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/saveFollowup",
         data:{
                
                txt_patient_id:txt_patient_id,
                txt_opd_id:txt_opd_id,
                txt_followup_date:txt_followup_date
           }              
        }).done(function(message){
        //alert(message);
              var url ="<?php print base_url(); ?>index.php/Medicine_controller/prescriptionPrint/"+txt_patient_id+"/"+txt_opd_id;

              var win = window.open(url, '_blank');
              win.focus();
              //$('#imgload').hide();


              var url2 ="<?php print base_url(); ?>index.php/Welcome/instructionPrint/"+txt_patient_id+"/"+txt_opd_id;

              var win = window.open(url2, '_blank');
              win.focus();

         });

      
      
   }
}
function getPatientRecord2(patient_id,opd_id)
{
  var sel_patient_list=opd_id;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getPatient",
         data:{
                 sel_patient_list:opd_id,
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('/');
        $('#txt_patient_id').val(res[0]);
        document.getElementById("lbl_opd_id").innerHTML = "OPD ID : - "+opd_id;
        document.getElementById("lbl_patient_name").innerHTML = "Patient Name : - "+res[1];
       
        var pid=res[0];
          getPatientPrescription();
          //$('#txt_patient_id').val(pid);
          $('#txt_opd_id').val(sel_patient_list);

          getPatientHistory(pid,sel_patient_list);

         });
}
function getPatientRecord()
{
  var sel_patient_list=document.getElementById('sel_patient_list').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getPatient",
         data:{
                 sel_patient_list:sel_patient_list,
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('/');
        $('#txt_patient_id').val(res[0]);
        document.getElementById("lbl_opd_id").innerHTML = "OPD ID : - "+sel_patient_list;
        document.getElementById("lbl_patient_name").innerHTML = "Patient Name : - "+res[1];
       
        var pid=res[0];
          getPatientPrescription();
          //$('#txt_patient_id').val(pid);
          $('#txt_opd_id').val(sel_patient_list);

          getPatientHistory(pid,sel_patient_list);

         });
}
function getPatientHistory(pid,sel_patient_list)
{
  //$('#imgload').show();
  if(pid=="")
  {
      alert("Select Patient First Please");
      $('#sel_patient_list').focus();


  }
  else
  {
    //alert(pid);

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
        //$('#imgload').hide();

         });
    }
}
function getPatientPrescription()
{
  //$('#imgload').show();
  var pid=document.getElementById('txt_patient_id').value;
  var sel_patient_list=document.getElementById('sel_patient_list').value;

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
        
        $('#tbl_medicine_search').empty();
        $('#tbl_medicine_search').append(message);
        //$('#imgload').hide();

         });
}
function getPatientPrescriptionHistory()
{
  //$('#imgload').show();
  var pid=document.getElementById('txt_patient_id').value;
  var sel_patient_list=document.getElementById('sel_history').value;

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
        //$('#imgload').hide();

         });
}
function addcurrentpres()
{
  //$('#imgload').show();
  var pid=document.getElementById('txt_patient_id').value;
  var sel_history=document.getElementById('sel_history').value;
  var sel_patient_list=document.getElementById('sel_patient_list').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/addtopres",
         data:{
                
                pid:pid,
                sel_history:sel_history,
                sel_patient_list:sel_patient_list
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        getPatientPrescription();
        $('#custom-tabs-four-home-tab').tab('show');

         });
}
function save_prescription()
{
  var txt_patient_id=document.getElementById('txt_patient_id').value;
  var txt_opd_id=document.getElementById('txt_opd_id').value;
  var sel_medicine=document.getElementById('sel_medicine').value;
  var txt_qty=document.getElementById('txt_qty').value;
  var sel_dose_time=document.getElementById('sel_dose_time').value;
  var txt_day=document.getElementById('txt_day').value;
  var sel_instruction=document.getElementById('sel_instruction').value;
  
  if(txt_patient_id=="")
  {
      alert("Select Patient First Please");
      $('#sel_patient_list').focus();


  }
  else if(sel_medicine=="")
  {
      alert("Select Medicine First Please");
      $('#sel_medicine').focus();


  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Medicine_controller/insert_prescription",
           data:{
                   txt_patient_id:txt_patient_id,
                   txt_opd_id:txt_opd_id,
                   sel_medicine:sel_medicine,
                   txt_qty:txt_qty,
                   sel_dose_time:sel_dose_time,
                   txt_day:txt_day,
                   sel_instruction:sel_instruction
                  
             }              
          }).done(function(message){
          //alert(message);
                
                toast_chk();
                //$('#sel_medicine').select2("");
                
                $('#sel_medicine').val("").trigger('change');
                $('#sel_dose_time').val("").trigger('change');
                $('#sel_instruction').val("").trigger('change');
                //document.getElementById('sel_medicine').value="";
                document.getElementById('txt_qty').value="";
                
                getPatientPrescription();
           });
  }
 
}
function getdosesave()
{
  var dose_id=document.getElementById('dose_id').value;
  var txt_dose_name=document.getElementById('txt_dose_name').value;
  if (txt_dose_name=="") 
  {
      alert('enter dose name please');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Medicine_controller/dose_add",
           data:{
                   txt_dose_name:txt_dose_name,
                  
             }              
          }).done(function(message){
          //alert(message);
                document.getElementById('txt_dose_name').value="";
                all_dose()
           });
  }
}
function getInstructionSave()
{
  //var instrucntion_id=document.getElementById('instrucntion_id').value;
  var txt_instruction=document.getElementById('txt_instruction').value;
  if (txt_instruction=="") 
  {
      alert('enter instruction please');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Medicine_controller/instruction_add",
           data:{
                   txt_instruction:txt_instruction,
                  
             }              
          }).done(function(message){
          //alert(message);
                document.getElementById('txt_instruction').value="";
                all_instruction()
           });
  }
}
function all_dose()
{
  
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getAllDose",
         data:{
                
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_dose').empty();
        $('#tbl_added_dose').append(message);

         });
}

function all_instruction()
{
  
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getAllInstruction",
         data:{
                
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_instruction').empty();
        $('#tbl_added_instruction').append(message);

         });
}

function getEditMedicine(id)
{   
   

    $.ajax(
		    {
		      type:"POST",
		      url:"<?php print base_url(); ?>index.php/Medicine_controller/getMedicineEdit",
		      data:{
		              id:id
		            }
		    }).done(function(message){
		      var res=message.split('_|_');
		      
		      if(message!="")
		      {
		      		///$('#txt_medicine_id').val(id);
		      		$('#txt_medicine_id').val(res[0]);
		      		$('#txt_medicine_name').val(res[1]);
		      		$('#txt_qty').val(res[2]);
		      		$('#sel_dose_time').val(res[3]);
		      		$('#sel_instruction').val(res[4]);
		      		$('#txt_medicine_name').focus();

		      }


		    });

}
function getdeldose(chf_id,cnt)
{
  

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getdeladdDose",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_dose();

         });
}
function getdeladInstruction(chf_id,cnt)
{
  

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getdeladInstruction",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_instruction();

         });
}
function getdelpres(chf_id,cnt)
{
  var txt_patient_id=document.getElementById('txt_patient_id').value;
  var txt_opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getdelpresChk",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        //location.reload();
        getPatientPrescription();
        getPatientPrescriptionHistory();

         });
}
</script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Added Successfully.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

</script>
</html>
<?php 
}
else
{
	redirect('Welcome/index');
}
?>