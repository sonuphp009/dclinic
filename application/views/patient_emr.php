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
<div id="emr_body">		
    
    <div class="row form-group" style="padding-top: 8px;">
      <div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>

       
        <div class="col-sm-4" style="padding-left: 20px;">
           
                <div class="card" style="overflow-x: scroll;height: 500px;font-size: 14px;scroll-behavior: smooth;">
                  <div class="card-body" >
                      
                      <div class="row form-group">
                          <div class="col-sm-12">
                            <h5 class="text-success">Past History</h5>
                          </div>
                          <div class="col-sm-12" >
                            <label>Select Last OPD Date : </label>
                            <select  name="sel_history" id="sel_history"  onchange="getPatientEmrHistory()">
                              <option value="">-Select OPD Date-</option>


                            </select>
                                             
                          </div><hr/>
                          <div id="div_chief_complaints_history" class="col-sm-12" style="overflow-x: scroll;">
                            <table class="table styled-table">
                              <thead style="width: 100%;">
                                <th style="width: 100%;" colspan="2">Complaints</th>
                                
                              </thead>
                              <thead id="tbl_complaint_history">
                                
                              </thead>
                            </table>
                          </div><hr/>
                          <div id="div_diagnosis_history" class="col-sm-12" style="overflow-x: scroll;">
                            <table class="table styled-table">
                              <thead style="width: 100%;">
                                <th style="width: 100%;" colspan="2">Diagnosis</th>
                                
                              </thead>
                              <thead id="tbl_diagnosis_history">
                                
                              </thead>
                            </table>
                          </div><hr/>
                          <div id="div_treatment_history" class="col-sm-12" style="overflow-x: scroll;">
                            <table class="table styled-table">
                              <thead style="width: 100%;">
                                <th style="width: 100%;" colspan="4">Treatment</th>
                                
                              </thead>
                              <thead id="tbl_treatment_history">
                                
                              </thead>
                            </table>
                          </div><hr/>
                          <div id="div_instructions_history" class="col-sm-12" style="overflow-x: scroll;">
                            <table class="table styled-table">
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
      
        </div>
        <div class="col-sm-8 card" >
              <div class="card-body">
                      <div class="row text-left">
                          <div class="col-sm-12 text-left" style="padding: 10px;">
                            <a href="#div_chief_complaints" class="text-success">Present Complaints</a> &nbsp;&nbsp;/&nbsp;&nbsp;
                            <a href="#div_diagnosis" class="text-success">Diagnosis</a> &nbsp;&nbsp;/&nbsp;&nbsp;
                            <a href="#div_treatment" class="text-success">Treatment</a> &nbsp;&nbsp;/&nbsp;&nbsp;
                            <a href="#div_instructions" class="text-success">Instructions</a>
                            
                          </div><br/>
                          <div class="col-sm-4">
                            <lable id="lbl_patient_name"> </lable>
                          </div>
                          <div class="col-sm-4">
                            <lable id="lbl_opd_id"></lable>
                          </div>
                          <div class="col-sm-4">
                            <input type="hidden" name="txt_patient_id" id="txt_patient_id">
                              <input type="hidden" name="txt_opd_id" id="txt_opd_id">
                              
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
                      </div><hr/>
                      <div class="row">
                              <div id="complaints_div">
                            <div class="row form-group" id="div_chief_complaints">
                                <div class="col-sm-12">
                                  <div class="row">
                                      <div class="col-sm-7">
                                        <label>Add New Chief Complaint</label>
                                        <input type="text" id="txt_chief_complaint" name="txt_chief_complaint" class="form-control" placeholder="Add Chief Complaint Here.....">
                                      </div>
                                      <div class="col-sm-1">

                                        <button class="btn btn-success btn-xs" onclick="add_chief_complaint()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <!-- <button class="btn btn-success btn-xs" onclick="all_chief_complaint()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button> -->
                                      </div>
                                      <div class="col-sm-4">
                                        <label>Complaints Add To Patient</label>
                                        <select name="sel_chief_complaints" id="sel_chief_complaints" onchange="getPatientchf()" class="col-sm-13" style="width:234px; height:33px;padding:0px -2px;background-color:#FFFFFF;background-image:none;border:1px solid #dbd9d9;border-radius:3px;box-shadow:inset 0 2px 2px rgba(0,0,0,.090);">
                                          <option value="">-Select Complaints-</option>
                                          <?php
                                              $res=$this->Inm->get_chief_complaints_list();

                                                if($res!="")
                                                {
                                                  $count=1;

                                                      foreach ($res as $row) 
                                                      {
                                                        $output.='<option value="'.$row->chief_id.'">'.$row->complaint.'</option>';
                                                         
                                                      }
                                                      
                                                 }
                                            echo $output;
                                          ?>
                                        </select>
                                      </div>
                                  </div> <hr/>
                                  
                                  <div class="row" style="padding-right: 20px;">
                                      <div class="col-sm-12" style="overflow: hidden;overflow-y: scroll;height: 250px;">
                                        <table class="table styled-table">
                                          <thead>
                                            <th>Chief Complints</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_added_chf">
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                  </div><hr/>

                                  
                                </div>
                            </div>
                            <div class="row form-group" id="div_diagnosis">
                                <div class="col-sm-12">
                                  <div class="row">
                                      <div class="col-sm-7">
                                        <label>Add New Diagnosis</label>
                                        <input type="text" name="txt_diagnosis" id="txt_diagnosis" class="form-control" placeholder="Add New Diagnosis Here.....">
                                      </div>
                                      <div class="col-sm-1">

                                        <button class="btn btn-success btn-xs" onclick="add_diagnosis()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <!-- <button class="btn btn-success btn-xs" onclick="all_chief_complaint()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button> -->
                                      </div>
                                      <div class="col-sm-4">
                                        <label>Diagnosis Add To Patient</label>
                                        <select name="sel_diagnosis" id="sel_diagnosis" class="col-sm-13" onchange="getPatientDiagnosis()" style="width:234px; height:33px;padding:0px -2px;background-color:#FFFFFF;background-image:none;border:1px solid #dbd9d9;border-radius:3px;box-shadow:inset 0 2px 2px rgba(0,0,0,.090);">
                                          <option value="">-Select Diagnosis-</option>
                                          <?php
                                              $res=$this->Inm->get_diagnosis_list();

                                              if($res!="")
                                              {
                                                  $count=1;

                                                      foreach ($res as $row) 
                                                      {
                                                        $output.='<option value="'.$row->diagnosis_id.'">'.$row->diagnosis.'</option>';
                                                         
                                                      }
                                                      
                                                 }
                                            echo $output;
                                          ?>
                                        </select>
                                      </div>
                                  </div> <hr/>
                                  
                                  <div class="row" style="padding-right: 20px;">
                                      <div class="col-sm-12" style="overflow: hidden;overflow-y: scroll;height: 250px;">
                                        <table class="table styled-table">
                                          <thead>
                                            <th>Diagnosis</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_added_diagnosis">
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                  </div><hr/>

                                  
                                </div>
                            </div>
                            <div class="row form-group" id="div_treatment">
                                <div class="col-sm-12">
                                  <div class="row">
                                      <div class="col-sm-7">
                                        <label>Add New Treatment</label>
                                        <input type="text" name="txt_treatment" id="txt_treatment" class="form-control" placeholder="Add New Treatment Here.....">
                                      </div>
                                      <div class="col-sm-1">

                                        <button class="btn btn-success btn-xs" onclick="add_treatment()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <!-- <button class="btn btn-success btn-xs" onclick="all_chief_complaint()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button> -->
                                      </div>
                                      <div class="col-sm-4">
                                        <label>Treatment Add To Patient</label>
                                        <select name="sel_treatment" id="sel_treatment" class="col-sm-13" onchange="getPatientTreatment()" style="width:234px; height:33px;padding:0px -2px;background-color:#FFFFFF;background-image:none;border:1px solid #dbd9d9;border-radius:3px;box-shadow:inset 0 2px 2px rgba(0,0,0,.090);">
                                          <option value="">-Select Treatment-</option>
                                          <?php
                                            $output_trat="";
                                              $res=$this->Inm->get_treatment_list();

                                              if($res!="")
                                              {
                                                  $count=1;

                                                      foreach ($res as $row) 
                                                      {
                                                        $output_trat.='<option value="'.$row->treatment_id.'">'.$row->treatment.'</option>';
                                                         
                                                      }
                                                      
                                                 }
                                            echo $output_trat;
                                          ?>
                                        </select>
                                      </div>
                                  </div> <hr/>
                                  
                                  <div class="row" style="padding-right: 20px;">
                                      <div class="col-sm-12" style="overflow: hidden;overflow-y: scroll;height: 250px;">
                                        <table class="table styled-table">
                                          <thead>
                                            <tr style="width: 100%;">
                                              <th style="width: 40%;">Treatment</th>
                                              <th style="width: 20%;">Date</th>
                                              <th style="width: 10%;">Time</th>
                                              <th style="width: 25%;">Remark</th>
                                              <th style="width: 5%;">Action</th>
                                            </tr>
                                          </thead>
                                          <tbody id="tbl_added_treatment">
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                  </div><hr/>

                                  
                                </div>
                            </div>
                            <div class="row form-group" id="div_instructions">
                                <div class="col-sm-12">
                                  <div class="row ">
                                      <div class="col-sm-10 form-group">
                                        <label>Add New Instruction</label>
                                        <input type="text" name="txt_instruction" id="txt_instruction" class="form-control" placeholder="Add New Instruction Here.....">
                                      </div>
                                      <div class="col-sm-2">

                                        <button class="btn btn-success btn-xs btn-block" onclick="add_instruction()" style="margin-top: 35px;height: 30px;"> Add <!--  -->&nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <!-- <button class="btn btn-success btn-xs" onclick="all_chief_complaint()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button> -->
                                      </div>
                                      <div class="col-sm-12 form-group">
                                        <label>Instruction Add To Patient</label>
                                        <select name="sel_instruction" id="sel_instruction"  onchange="getPatientInstruction()" >
                                          <option value="">-Select Instruction-</option>
                                          <?php
                                            $output_ins="";
                                              $res_ins=$this->Inm->get_instruction_accu_list();

                                              if(isset($res_ins))
                                              {
                                                  $count=1;

                                                      foreach ($res_ins as $row) 
                                                      {
                                                        $output_ins.='<option value="'.$row->instruction_id.'">'.$row->fld_instruction.'</option>';
                                                         
                                                      }
                                                      echo $output_ins;
                                              }
                                            
                                          ?>
                                        </select>
                                      </div>
                                  </div> <hr/>
                                  
                                  <div class="row" style="padding-right: 20px;">
                                      <div class="col-sm-12" style="overflow: hidden;overflow-y: scroll;height: 250px;">
                                        <table class="table styled-table">
                                          <thead>
                                            <tr style="width: 100%;">
                                              <th style="width: 90%;">Instruction</th>
                                              
                                              <th style="width: 10%;">Action</th>
                                            </tr>
                                          </thead>
                                          <tbody id="tbl_added_instruction">
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                  </div><hr/>


                                  
                                </div>
                            </div>
                        </div>
                      </div>
              </div> 
              


        </div>
       
    </div>
    <div class="row">
                  <div class="col-sm-12">

                      <button class="btn btn-info btn-block" style="" onclick="printTreatment()">Save & Print Instruction <i class="fa fa-print"></i></button>
                  </div>
                </div>
</div>   
</div>
<?php $this->load->view('footer');?>
	

<?php $this->load->view('javascript');?>
<link rel="stylesheet" href="<?php print base_url(); ?>asset/Admin/select2.css">  
  <!-- iCheck -->
<script src="<?php print base_url(); ?>asset/Admin/select2.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function() {
  $("#sel_treatment").select2();
  $("#sel_chief_complaints").select2();
  $("#sel_diagnosis").select2();
  //$("#sel_instruction").select2();
  
});
</script>
<script type="text/javascript">
function getPatientRecord2(patient_id,opd_id)
{
  var sel_patient_list=document.getElementById('sel_patient_list').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getPatient",
         data:{
                 sel_patient_list:opd_id,
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('/');
        $('#txt_patient_id').val(patient_id);
        document.getElementById("lbl_opd_id").innerHTML = "OPD ID : - "+opd_id;
        document.getElementById("lbl_patient_name").innerHTML = "Patient Name : - "+res[1];
       
        var pid=patient_id;
          getPatientEmr(pid,opd_id);
          getPatientHistory(pid,opd_id);
         });
}
function getPatientEmrHistory()
{
    //var sel_patient_list=document.getElementById('sel_patient_list').value;

    var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('sel_history').value;
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
}
function printTreatment()
{
    var txt_patient_id=document.getElementById('txt_patient_id').value;
    var txt_opd_id=document.getElementById('txt_opd_id').value;
    if(txt_patient_id=="")
    {
      alert('Select Patient Please');
   }
   else
   {
      /*$.ajax({
        type:"POST",
        url:"<?php //echo base_url();?>index.php/Medicine_controller/saveFollowup",
         data:{
                
                txt_patient_id:txt_patient_id,
                txt_opd_id:txt_opd_id,
           }              
        }).done(function(message){*/
        //alert(message);
              var url ="<?php print base_url(); ?>index.php/Welcome/instructionPrint/"+txt_patient_id+"/"+txt_opd_id;

              var win = window.open(url, '_blank');
              win.focus();
              //$('#imgload').hide();

       /*  });*/

      
      
   }
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
          getPatientEmr(pid,sel_patient_list);
          getPatientHistory(pid,sel_patient_list);
         });
}
function getPatientEmr(pid,opd_id)
{
  var patient_id=pid;
  var opd_id=opd_id;

  document.getElementById('txt_patient_id').value=patient_id;
  document.getElementById('txt_opd_id').value=opd_id;
    all_chief_complaintaddtopatient();
    all_chief_complaint();

    all_psaddtopatient();
    all_past_history();

    all_personal_history();
        all_phaddtopatient();


        all_general_examination();
        all_geaddtopatient();

        all_se();
        all_seaddtopatient();

        all_old_report();
        all_oraddtopatient();

        all_new_report();
        all_nraddtopatient();

        all_diagnosis();
        all_diagnosisaddtopatient();

        all_investigation();
        all_investigationaddtopatient();

        //all_treatment();
        all_treatmentaddtopatient();


        all_instructionaddtopatient();

    $('#modal_emr').modal('show');
            
}
function getPatientPrescription(patient_id,cnt,opd_id)
{
    window.location = "<?php print base_url(); ?>index.php/Welcome/show_prescription/"+patient_id+"/"+cnt+"/"+opd_id;
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
              loadCheckinPatient();
            }
            
         });
}
function getOpdRegisteration(pid,cnt)
{
  document.getElementById('txt_patient_id').value=pid;
  $('#modal_info').modal('show');
   
}
function add_chief_complaint()
{
  var txt_chief_complaint=document.getElementById('txt_chief_complaint').value;
  if (txt_chief_complaint=="") 
  {
      alert('enter chief complaints');
  }
  else
  {
        $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/chief_complaints_add",
         data:{
                 txt_chief_complaint:txt_chief_complaint,
                
           }              
        }).done(function(message){
        //alert(message);
              document.getElementById('txt_chief_complaint').value="";
              toast_chk();
              all_chief_complaint();
         });
  }

   
}
function add_past_history()
{
  var txt_past_history=document.getElementById('txt_past_history').value;
  if (txt_past_history=="") 
  {
      alert('enter past history');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/past_history_add",
           data:{
                   txt_past_history:txt_past_history,
                  
             }              
          }).done(function(message){
          //alert(message);
                document.getElementById('txt_past_history').value="";
           });
    }
}
function add_personal_history()
{
  var txt_personal_history=document.getElementById('txt_personal_history').value;
  if (txt_personal_history=="") 
  {
      alert('enter Personal history');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/personal_history_add",
           data:{
                   txt_personal_history:txt_personal_history,
                  
             }              
          }).done(function(message){
          //alert(message);
                document.getElementById('txt_personal_history').value="";
           });
  }
}
function add_general_examination()
{
  var txt_general_examination=document.getElementById('txt_general_examination').value;
  if (txt_general_examination=="") 
  {
      alert('enter general examination');
  }
  else
  {
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/general_examination_add",
         data:{
                 txt_general_examination:txt_general_examination,
                
           }              
        }).done(function(message){
        //alert(message);
          document.getElementById('txt_general_examination').value="";
         });
  }
}
function add_systemic_examination()
{
  var txt_systemic_examination=document.getElementById('txt_systemic_examination').value;
  if (txt_systemic_examination=="") 
  {
      alert('enter systemic examination');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/systemic_examination_add",
           data:{
                   txt_systemic_examination:txt_systemic_examination,
                  
             }              
          }).done(function(message){
          //alert(message);
            document.getElementById('txt_systemic_examination').value="";
           });
  }
}
function add_old_report()
{
  var txt_old_report=document.getElementById('txt_old_report').value;
  if (txt_old_report=="") 
  {
      alert('enter old report');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/old_report_add",
           data:{
                   txt_old_report:txt_old_report,
                  
             }              
          }).done(function(message){
          //alert(message);
            document.getElementById('txt_old_report').value="";
           });
  }
}
function add_new_report()
{
  var txt_new_report=document.getElementById('txt_new_report').value;
  if (txt_new_report=="") 
  {
      alert('enter new report');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/new_report_add",
           data:{
                   txt_new_report:txt_new_report,
                  
             }              
          }).done(function(message){
          //alert(message);
                document.getElementById('txt_new_report').value="";
           });
    }
}
function add_diagnosis()
{
  var txt_diagnosis=document.getElementById('txt_diagnosis').value;
  if (txt_diagnosis=="") 
  {
      alert('enter diagnosis');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/diagnosis_add",
           data:{
                   txt_diagnosis:txt_diagnosis,
                  
             }              
          }).done(function(message){
          //alert(message);
                toast_chk();
                document.getElementById('txt_diagnosis').value="";
                all_diagnosis();

           });
    }
}
function add_treatment()
{
  var txt_treatment=document.getElementById('txt_treatment').value;
  if (txt_treatment=="") 
  {
      alert('enter Treatment');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/treatment_add",
           data:{
                   txt_treatment:txt_treatment,
                  
             }              
          }).done(function(message){
          //alert(message);
                toast_chk();
                document.getElementById('txt_treatment').value="";
                all_treatment();

           });
    }
}
function add_instruction()
{
  var txt_instruction=document.getElementById('txt_instruction').value;
  if (txt_instruction=="") 
  {
      alert('enter instruction');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Welcome/instruction_add",
           data:{
                   txt_instruction:txt_instruction,
                  
             }              
          }).done(function(message){
          //alert(message);
                toast_chk();
                document.getElementById('txt_instruction').value="";
                all_instruction();

           });
    }
}
function add_investigation()
{
  var txt_investigation=document.getElementById('txt_investigation').value;
  if (txt_investigation=="") 
  {
      alert('enter investigation');
  }
  else
  {
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/investigation_add",
         data:{
                 txt_investigation:txt_investigation,
                
           }              
        }).done(function(message){
        //alert(message);
              document.getElementById('txt_investigation').value="";
         });
  }
}
function getPatientCheckout(pid,cnt)
{
  $('#imgload_gt'+cnt).show();
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getCheckout",
         data:{
                 pid:pid,
                
           }              
        }).done(function(message){
        //alert(message);
       $('#imgload_gt'+cnt).hide();
       loadCheckinPatient();
         });
}
function loadCheckinPatient()
{
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getCheckinPatient",
         data:{
                 
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_patient_list').empty();
        $('#tbl_patient_list').append(message);

         });
}
function all_chief_complaint()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllChiefComplaints",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#sel_chief_complaints').empty();
        $('#sel_chief_complaints').append(message);


         });
}
function all_past_history()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllPastHistory",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_search_past_history').empty();
        $('#tbl_search_past_history').append(message);

         });
}
function all_personal_history()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllPersonalHistory",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_search_ph').empty();
        $('#tbl_search_ph').append(message);

         });
}
function all_general_examination()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllge",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_search_ge').empty();
        $('#tbl_search_ge').append(message);

         });
}
function all_se()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllse",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_search_se').empty();
        $('#tbl_search_se').append(message);

         });
}
function all_old_report()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllor",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_search_or').empty();
        $('#tbl_search_or').append(message);

         });
}
function all_new_report()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllnr",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_search_nr').empty();
        $('#tbl_search_nr').append(message);

         });
}
function all_diagnosis()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllDiagnosis",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#sel_diagnosis').empty();
        $('#sel_diagnosis').append(message);

         });
}
function all_treatment()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllTreatment",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#sel_treatment').empty();
        $('#sel_treatment').append(message);

         });
}
function all_instruction()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllInstruction",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#sel_instruction').empty();
        $('#sel_instruction').append(message);

         });
}
function all_investigation()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllInvestigation",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_search_investigation').empty();
        $('#tbl_search_investigation').append(message);

         });
}
function all_chief_complaintaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/chieftoPatient",
         data:{
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_chf').empty();
        $('#tbl_added_chf').append(message);

         });
}
function all_psaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/pstoPatient",
         data:{

                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_past_history').empty();
        $('#tbl_added_past_history').append(message);

         });
}
function all_phaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/phtoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_personal_history').empty();
        $('#tbl_added_personal_history').append(message);

         });
}
function all_geaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_general_examination').empty();
        $('#tbl_added_general_examination').append(message);

         });
}
function all_seaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/setoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_systemic_examination').empty();
        $('#tbl_added_systemic_examination').append(message);

         });
}
function all_oraddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/ortoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_old_report').empty();
        $('#tbl_added_old_report').append(message);

         });
}
function all_nraddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/nrtoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_new_report').empty();
        $('#tbl_added_new_report').append(message);

         });
}
function all_diagnosisaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/diagnosistoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_diagnosis').empty();
        $('#tbl_added_diagnosis').append(message);

         });
}
function all_investigationaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/investigationtoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_investigation').empty();
        $('#tbl_added_investigation').append(message);

         });
}
function getPatientchf()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  var sel_chief_complaints=document.getElementById('sel_chief_complaints').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddChiefComplaints",
         data:{
                chf_id:sel_chief_complaints,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_chf').empty();
        $('#tbl_added_chf').append(message);
        
          toast_chk();
         });
}
function getPatientps(cnt,ps_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddps",
         data:{
                ps_id:ps_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_past_history').empty();
        $('#tbl_added_past_history').append(message);
        all_past_history();

         });
}
function getPatientph(cnt,ph_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddph",
         data:{
                ph_id:ph_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_personal_history').empty();
        $('#tbl_added_personal_history').append(message);
        all_personal_history();

         });
}
function getPatientge(cnt,ge_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddge",
         data:{
                ge_id:ge_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_general_examination').empty();
        $('#tbl_added_general_examination').append(message);
        all_general_examination();

         });
}
function getPatientse(cnt,se_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddse",
         data:{
                se_id:se_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_systemic_examination').empty();
        $('#tbl_added_systemic_examination').append(message);
        all_se();

         });
}
function getPatientor(cnt,or_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddor",
         data:{
                or_id:or_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_old_report').empty();
        $('#tbl_added_old_report').append(message);
        all_old_report();

         });
}
function getPatientnr(cnt,nr_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddnr",
         data:{
                nr_id:nr_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_new_report').empty();
        $('#tbl_added_new_report').append(message);
        all_new_report();

         });
}
function getPatientDiagnosis()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  var sel_diagnosis=document.getElementById('sel_diagnosis').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAdddiagnosis",
         data:{
                diagnosis_id:sel_diagnosis,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        toast_chk();
        $('#tbl_added_diagnosis').empty();
        $('#tbl_added_diagnosis').append(message);
        

         });
}
function getPatientTreatment()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  var sel_treatment=document.getElementById('sel_treatment').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddTreatment",
         data:{
                sel_treatment:sel_treatment,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        toast_chk();
        $('#tbl_added_treatment').empty();
        $('#tbl_added_treatment').append(message);
        

         });
}
function getPatientInstruction()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  var sel_instruction=document.getElementById('sel_instruction').value;

    if(sel_instruction!="")
    {
       $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>index.php/Welcome/getAddInstruction",
             data:{
                    sel_instruction:sel_instruction,
                    patient_id:patient_id,
                    opd_id:opd_id
               }              
            }).done(function(message){
            //alert(message);
            var res=message.split('_|_');
            toast_chk();
            $('#tbl_added_instruction').empty();
            $('#tbl_added_instruction').append(message);
            

             });
    }
    else
    {
        alert('select instruction please');
    }
}
function saveTreatmentIns(detail_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  var t_date=document.getElementById('t_date'+cnt).value;
  var t_time=document.getElementById('t_time'+cnt).value;
  var txt_remark=document.getElementById('txt_remark'+cnt).value;
  //alert(t_date+','+t_time+','+txt_remark);
   $.ajax({
              type:"POST",
              url:"<?php echo base_url();?>index.php/Welcome/getUpdateTreatment",
              data:{
                      patient_id:patient_id,
                      opd_id:opd_id,
                      t_date:t_date,
                      t_time:t_time,
                      txt_remark:txt_remark,
                      detail_id:detail_id
                  }              
              }).done(function(message){
              //alert(message);
              var res=message.split('_|_');
              toast_chk();
              
              

         });
}
function saveInstruction(detail_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  var txt_instruction_dtl=document.getElementById('txt_instruction_dtl'+cnt).value;
  
  //alert(t_date+','+t_time+','+txt_remark);
   $.ajax({
              type:"POST",
              url:"<?php echo base_url();?>index.php/Welcome/getUpdateInstruction",
              data:{
                      patient_id:patient_id,
                      opd_id:opd_id,
                      txt_instruction_dtl:txt_instruction_dtl,
                     
                      detail_id:detail_id
                  }              
              }).done(function(message){
              //alert(message);
              var res=message.split('_|_');
              toast_chk();
              
              

         });
}
function all_treatmentaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/treatmenttoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_treatment').empty();
        $('#tbl_added_treatment').append(message);

         });
}
function all_instructionaddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/instructiontoPatient",
         data:{
          
                 patient_id:patient_id,
                 opd_id:opd_id
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_instruction').empty();
        $('#tbl_added_instruction').append(message);

         });
}
function getPatientInvestigation(cnt,investigation_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddinvestigation",
         data:{
                investigation_id:investigation_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_investigation').empty();
        $('#tbl_added_investigation').append(message);
        all_investigation();

         });
}
function getdelchf(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getDelChiefComplaints",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_chief_complaint();
        all_chief_complaintaddtopatient();

         });
}
function getdelps(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdps",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_past_history();
        all_psaddtopatient();

         });
}
function getdelph(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdph",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_personal_history();
        all_phaddtopatient();

         });
}
function launch_toast() {
    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}
function getGeUpdate(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  var txt_ge_value=document.getElementById('txt_ge_value'+cnt).value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getUpdatege",
         data:{
                chf_id:chf_id,
                txt_ge_value:txt_ge_value
               
           }              
        }).done(function(message){
        //alert(message);
        toast_chk();

        all_geaddtopatient();



         });
}
function getdelge(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdge",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_general_examination();
        all_geaddtopatient();

         });
}
function getdelse(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdse",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_se();
        all_seaddtopatient();

         });
}
function getdelor(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdor",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_old_report();
        all_oraddtopatient();

         });
}
function getdelnr(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdnr",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_new_report();
        all_nraddtopatient();

         });
}
function getdeldiagnosis(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladddiagnosis",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_diagnosis();
        all_diagnosisaddtopatient();

         });
}
function getdeltreatment(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdtreatment",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_treatment();
        all_treatmentaddtopatient();

         });
}
function getdelinstruction(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdInstruction",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        //all_treatment();
        all_instructionaddtopatient();

         });
}
function getdelinvestigation(chf_id,cnt)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getdeladdinvestigation",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_investigation();
        all_investigationaddtopatient();

         });
}
</script>
<script type="text/javascript">


</script>
</html>
<?php 
}
else
{
	redirect('Welcome/index');
}
?>