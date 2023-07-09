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
</head>
<body onload="getAllrec()">


<?php $this->load->view('navbar2');?>
<?php //$this->load->view('asid_bar');?>
	
		<div class="content-header">
		      <div class="container-fluid">
		        <div class="row">
		          <div class="col-sm-6 col-6">
		            <h1 class="m-0 text-dark" >Dashboard </h1> 
		          </div><!-- /.col -->
		          <div class="col-sm-6 col-6 ">
		            <ol class="breadcrumb float-right">
		              <li class="breadcrumb-item "><a class="btn btn-sm bg-info" href="<?php echo site_url('Welcome/user_dashboard');?>">Refresh <i class="fa fa-load"></i></a></li>
		              
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
    	</div>
    

      <section id="patient_section" class="content">
        <div class="card card-primary card-outline card-tabs">

              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item ">
                    <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Patient List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Appointment List</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                     <div class="row">
                          <div class="col-12 col-sm-12" style="height:300px;width:100%;overflow:scroll;overflow-x:scroll;overflow-y:scroll;">
                              <table class="table table-hover" >
                                <thead>
                                    <tr style="width: 100%;">
                                      <th style="width: 10%;">Srno</th>
                                      <th style="width: 40%;">Patient Name</th>
                                      <th style="width: 20%;">Mobile Number</th>
                                      <th style="width: 30%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_patient_list" >
                                  
                                    <?php 
                                        $output="";
                                        $res=$this->Inm->get_patient_list();

                                        if(count($res)>0)
                                        {
                                          $count=1;

                                          foreach ($res as $row) 
                                          {
                                             $output.='<tr>
                                                          <td>'.$count++.'</td>
                                                          <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                                                          <td>'.$row->p_mobile.'</td>';
                                                          if($row->opd_status==1)
                                                          {
                                                              $output.='<td> <span class="text-success">OPD Generated</span> / 
                                                              <button class="btn btn-xs btn-primary" onclick="getPatientCheckout('.$row->patient_id.','.$count.','.$row->opd_id.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>Check Out</button> 

                                                              </td>';
                                                          }
                                                          else
                                                          {
                                                              $output.='<td><button class="btn btn-xs btn-warning" onclick="getOpdRegisteration('.$row->patient_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>Generate OPD </button> / 
                                                              <button class="btn btn-xs btn-primary" onclick="getPatientCheckout('.$row->patient_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>Check Out</button>
                                                              </td>';
                                                          }
                                                          
                                                      $output.='</tr>';
                                          }
                                          echo $output;
                                        }

                                    ?>
                                  
                                </tbody>
                              </table>                            
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                     <div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                      
                        <table class="table table-hover text-nowrap">
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
                          <?php 
                          $output="";
                              $res=$this->Mnm->get_appointment_list();

                      if($res!="")
                      {
                        $count=1;

                            foreach ($res as $row) 
                            {
                               $output.='<tr>
                                        <td>'.$count++.'</td>
                                        <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                                        <td>'.$row->p_mobile.'</td>
                                        <td>Date : '.$row->appointment_date.'<br/>
                                          Time : '.$row->appointment_time.'
                                        </td>
                                        <td>'.$row->ap_status.'
                                        </td>';
                              
                                        
                                $output.='<td>
                                <button class="btn btn-xs btn-warning" onclick="getOpdRegisterationApp('.$row->patient_id.','.$row->ap_id.','.$count.')"><i id="imgload_gtopd'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i> Genrate OPD &nbsp;<i class="fa fa-times-circle"></i></button> / 
                                <button class="btn  btn-xs btn-danger" onclick="cancelAppointment('.$row->ap_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>  Cancel Appointment &nbsp;<i class="fa fa-times-circle"></i></button> 
                                            </td>';
                                       
                                        
                                    $output.='</tr>';
                            }
                            
                       }
                  echo $output;

                          ?>
                            
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
        </div>
                
        
      </section>
	
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
                    <input type="hidden" name="txt_opd_id" id="txt_opd_id">
                    <select name="sel_fess" id="sel_fees" class="form-control ">
                      <option value="">-Select-</option>
                      <?php 
                        $count =0;
                        foreach ($this->Inm->get_fees() as $row) 
                              {
                                $count++;
                                  echo '<option value='.$row->fees.'>'.$row->fees.'</option>
                                  ';
                              } 
                                                      
                           ?>
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



<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
function getPatientEmr(pid,cnt,opd_id)
{
  var patient_id=pid;
  var opd_id=opd_id;

  document.getElementById('txt_patient_id').value=patient_id;
  document.getElementById('txt_opd_id').value=opd_id;
  window.location = "<?php print base_url(); ?>index.php/Welcome/emr2/"+patient_id+"/"+opd_id;
    /*all_chief_complaintaddtopatient();
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
        all_investigationaddtopatient();*/

    //$('#modal_emr').modal('show');
            
}
function getAllrec()
{
  
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAllCount",
         data:{
                 
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('/');
        
        $('#todays_patient').empty();
        $('#todays_patient').append(res[0]);

        $('#todays_fees').empty();
        $('#todays_fees').append(res[1]);

        $('#todays_ap').empty();
        $('#todays_ap').append(res[2]);

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
        getAllrec();

         });
    
}
function getPatientPrescription(patient_id,cnt,opd_id)
{
    window.location = "<?php print base_url(); ?>index.php/Welcome/show_prescription2/"+patient_id+"/"+opd_id;
}
function getModalFees()
{
  var pid=document.getElementById('txt_patient_id').value;
  var txt_opd_id=document.getElementById('txt_opd_id').value;

  var sel_fees=document.getElementById('sel_fees').value;

  if(sel_fees=="")
  {
      alert('Select Fees Please');
  }
  else
  {

        //$('#imgload_gt'+cnt).show();
         $.ajax({
              type:"POST",
              url:"<?php echo base_url();?>index.php/Welcome/getCheckout",
               data:{
                       pid:pid,
                       opd_id:txt_opd_id,
                       sel_fees:sel_fees
                      
                 }              
              }).done(function(message){
              //alert(message);
             //$('#imgload_gt'+cnt).hide();
             $('#modal_info').modal('hide');

             loadCheckinPatient();
               });
              
    }       
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
           loadCheckinPatient();
            
         });
}
function getOpdRegisterationApp(pid,ap_id,cnt)
{
  //var pid=document.getElementById('txt_patient_id').value;
  //var sel_fees=document.getElementById('sel_fees').value;

  $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getOpdRegSaveApp",
         data:{
                 pid:pid,
                 ap_id:ap_id
                 //sel_fees:sel_fees
           }              
        }).done(function(message){
        
        //alert(message);
        location.reload();
           loadCheckinPatient();
            
         });
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
                document.getElementById('txt_diagnosis').value="";
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
function getPatientCheckout(pid,cnt,opd_id)
{

  document.getElementById('txt_patient_id').value=pid;
  document.getElementById('txt_opd_id').value=opd_id;
  $('#modal_info').modal('show');
  
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
        
        $('#tbl_search_chf').empty();
        $('#tbl_search_chf').append(message);

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
        
        $('#tbl_search_diagnosis').empty();
        $('#tbl_search_diagnosis').append(message);

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
function getPatientchf(cnt,chf_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAddChiefComplaints",
         data:{
                chf_id:chf_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_chf').empty();
        $('#tbl_added_chf').append(message);
        all_chief_complaint();

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
function getPatientDiagnosis(cnt,diagnosis_id)
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/getAdddiagnosis",
         data:{
                diagnosis_id:diagnosis_id,
                patient_id:patient_id,
                opd_id:opd_id
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_diagnosis').empty();
        $('#tbl_added_diagnosis').append(message);
        all_diagnosis();

         });
}
function getPatientinvestigation(cnt,investigation_id)
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
</html>
<?php 
}
else
{
  redirect('Welcome/index');
}
?>