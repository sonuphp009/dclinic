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
<body <?php if (isset($opd_data)) { echo 'onload="getPatientRecord2('.$p_data->patient_id.','.$opd_data->opd_id.')"';
  # code...
}?>>
<div class="div_container">


<?php $this->load->view('navbar2');?>
<?php //$this->load->view('asid_bar');?>
		<div class="row" style="padding: 10px;">
      <div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>

			<div class="col-sm-12 text-center text-primary">
					<h4 class="header">Clinical Reports</h4>
			</div>
		</div>
    
      <div id="lbl_err" class="row form-group" style="display: none;">
        <div class="col-sm-12 text-center" style="padding: 20px;">
          <?php if(isset($err)){?>
          <h4  style="color: red;"><?php echo $err;?></h4>
          <?php } ?>
        </div>
      </div>

    
    <div class="row form-group">
        <div class="col-sm-2">
          <input type="hidden" name="txt_patient_id" id="txt_patient_id">
          <input type="hidden" name="txt_opd_id" id="txt_opd_id">
        </div>
        <?php if(!isMobile()){?>
        <div class="col-sm-2 text-center">
          <h4 style="margin-top: 25px;">Select Patient Name : -</h4>
        </div>
      <?php }?>
        <div class="col-sm-6" style="padding: 20px;">
          
          <select name="sel_patient_list" id="sel_patient_list"  onchange="getPatientRecord()">
            
            <?php
            if(isset($opd_data))
            {
                echo '<option value="'.$opd_data->opd_id.'">'.$p_data->first_name.' '.$p_data->middle_name.' '.$p_data->last_name.'</option>';

                echo '<option value="">-Select Patient-</option>';
                $res=$this->Inm->get_patient_listforreport();

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
                $res=$this->Inm->get_patient_listforreport();

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
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Old Reports</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">New Reports</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-history-tab" data-toggle="pill" href="#custom-tabs-four-history" role="tab" aria-controls="custom-tabs-four-history" aria-selected="false">Reports History</a>
                  </li>
                  
                </ul>
              </div>
              <!-- tab body -->
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <!-- section a -->
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                      	<div class="row" >
                                        <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                          <div class="row">
                                              <div class="col-sm-8">
                                                <label>Add Old Reports</label>
                                                <input type="text" name="txt_old_report" id="txt_old_report" class="form-control" placeholder="Add New Old Reports Here.....">
                                              </div>
                                              <div class="col-sm-4" style="padding: 12px 20px;">
                                                <label> </label><br/>
                                                 <button class="btn btn-success btn-sm btn-block" onclick="add_old_report()" style=""> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                                <!-- <button class="btn btn-success btn-xs" onclick="all_old_report()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button> -->
                                               
                                              </div>
                                          </div><hr/>
                                          <!-- <div class="row">
                                              <div class="col-sm-12">
                                                <input type="text" name="txt_search_old_reports" id="txt_search_old_reports" class="form-control" placeholder="Search And Select Old Reports.....">
                                              </div>
                                          </div> --> 
                                          <div class="row form-group">
                                              <div class="col-sm-12">
                                                 <h3>Add Old Reports To Patient</h3>
                                              </div>
                                            </div>
                                          <div class="row " >
                                              <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                                <form  name="f1" action="<?php  echo site_url('Welcome/save_or_image_to_patient'); ?>"   enctype="multipart/form-data"  method="post">

                                                    <div class="row form-group">
                                                      <div class="col-sm-12">
                                                          <input type="hidden" name="txt_patient_id2" id="txt_patient_id2" value="<?php if(isset($p_data)) {echo $p_data->patient_id;}?>">
                                                          <input type="hidden" name="txt_opd_id2" id="txt_opd_id2" value="<?php if(isset($opd_data)) { echo $opd_data->opd_id;}?>">
                                      
                                                          <select  name="sel_or" id="sel_or" required>
                                                            <option value="">-Select Old Report-</option>
                                                            <?php
                                                               $res=$this->Inm->get_or_list();

                                                              if($res!="")
                                                              {
                                                                $count=1;

                                                                    foreach ($res as $row) 
                                                                    {
                                                                        echo '<option value="'.$row->old_report_id.'">'.$row->old_report.'</option>';

                                                                    }
                                                              }


                                                            ?>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="row form-group">
                                                      <div class="col-sm-12">
                                                         <input type="file" name="fle_or[]" id="fle_or" multiple  accept="image/*" required capture>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="row form-group">
                                                      <div class="col-sm-12" style="padding: 10px;">
                                                         <button id="btn_submit" style="display: none;" type="submit" class="btn btn-sm btn-success btn-block" >Add to Patient <i class="fa fa-plus-circle"></i></button>

                                                         <button id="btn_btntype"   type="button" onclick="chkPatient()" class="btn btn-sm btn-success btn-block" >Add to Patient <i class="fa fa-plus-circle"></i></button>
                                                      </div>
                                                    </div>
                                                  
                                                    
                                                </form>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-1">

                                        </div>
                                         <div class="col-sm-5 card card-primary card-outline" style="padding: 5px;">
                                              <div class="row">
                                                <div class="col-sm-12 text-primary text-center">
                                                  <h4>Content Added to Patient</h4>
                                                </div>
                                              </div><hr/>
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                    <table class="table styled-table">
                                                      <thead>
                                                        <th>Old Report</th>
                                                        <th>Action</th>
                                                      </thead>
                                                      <tbody id="tbl_added_old_report">
                                                        <td></td>
                                                        <td></td>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                        </div>

                                </div>
                    
                  </div>
                  <!-- section a -->
                  <!-- section b -->
	                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
	                  		<div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-8">
                                        <label>Add New Reports</label>
                                        <input type="text" name="txt_new_report" id="txt_new_report" class="form-control" placeholder="Add New Reports Here.....">
                                      </div>
                                      <div class="col-sm-4" style="padding: 12px 20px;">
                                        <label> </label>
                                         <button class="btn btn-success btn-sm btn-block" onclick="add_new_report()" style=""> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <!-- <button class="btn btn-success btn-xs" onclick="all_old_report()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button> -->
                                       
                                      </div>
                                  </div><hr/>
                                  <!-- <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_old_reports" id="txt_search_old_reports" class="form-control" placeholder="Search And Select Old Reports.....">
                                      </div>
                                  </div> --> 
                                  <div class="row form-group">
                                      <div class="col-sm-12">
                                         <h3>Add Old Reports To Patient</h3>
                                      </div>
                                    </div>
                                  <div class="row " >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <form  name="f1" action="<?php  echo site_url('Welcome/save_nr_image_to_patient'); ?>"   enctype="multipart/form-data"  method="post">

                                            <div class="row form-group">
                                              <div class="col-sm-12">
                                                  <input type="hidden" name="txt_patient_id3" id="txt_patient_id3" value="<?php if(isset($p_data)) {echo $p_data->patient_id;}?>">
                                                  <input type="hidden" name="txt_opd_id3" id="txt_opd_id3" value="<?php if(isset($opd_data)) { echo $opd_data->opd_id;}?>">
                              
                                                  <select  name="sel_nr" id="sel_nr" required>
                                                    <option value="">-Select New Report-</option>
                                                    <?php
                                                       $res=$this->Inm->get_nr_list();

                                                      if($res!="")
                                                      {
                                                        $count=1;

                                                            foreach ($res as $row) 
                                                            {
                                                                echo '<option value="'.$row->new_report_id.'">'.$row->new_report.'</option>';

                                                            }
                                                      }


                                                    ?>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="row form-group">
                                              <div class="col-sm-12">
                                                 <input type="file" name="fle_nr[]" id="fle_nr" multiple   accept="image/*" required capture>
                                              </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                              <div class="col-sm-12" style="padding: 10px;">
                                                 <button id="btn_submit_nr" style="display: none;" type="submit" class="btn btn-sm btn-success btn-block" >Add to Patient <i class="fa fa-plus-circle"></i></button>

                                                 <button id="btn_btntype_nr"   type="button" onclick="chkPatient()" class="btn btn-sm btn-success btn-block" >Add to Patient <i class="fa fa-plus-circle"></i></button>
                                              </div>
                                            </div>
                                          
                                            
                                        </form>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-sm-1">

                                </div>
                                 <div class="col-sm-5 card card-primary card-outline" style="padding: 5px;">
                                      <div class="row">
                                        <div class="col-sm-12 text-primary text-center">
                                          <h4>Content Added to Patient</h4>
                                        </div>
                                      </div><hr/>
                                      <div class="row">
                                          <div class="col-sm-12">
                                            <table class="table styled-table">
                                              <thead>
                                                <th>New Report</th>
                                                <th>Report Image</th>
                                                <th>Action</th>
                                              </thead>
                                              <tbody id="tbl_added_new_report">
                                                
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                </div>

                         </div> 
	                  		
	                 
                  
                    </div>
                    <!-- section b -->
                     <!-- section c -->
                  <div class="tab-pane fade" id="custom-tabs-four-history" role="tabpanel" aria-labelledby="custom-tabs-four-history-tab">

                        <div class="row form-group">
                                      <div class="col-sm-2">
                                        <label>Select Report</label>
                                        <select id="sel_history_type" name="sel_history" onclick="getOldHistory()">
                                          <option value="">-Select-</option>
                                          <option value="old_report">Old Report</option>
                                          <option value="new_report">New Report</option>
                                        </select>
                                      </div>
                                        <div class="col-sm-4">
                                          <label>Select Last OPD Date : -</label>
                                          <select name="sel_history" id="sel_history" onclick="getOldHistory()">
                                            <option value="">-Select OPD Date-</option>


                                          </select>
                                        </div>
                                    </div><hr/>
                                    
                                    <div class="row">
                                        <div class="col-sm-12" id="div_old_history" style="display: none;">
                                          <table class="table styled-table">
                                            <thead>
                                              <th>Old Report</th>
                                              <th>Report Image</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody id="tbl_added_old_report_history">
                                              <td></td>
                                              <td></td>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="col-sm-12" id="div_new_history" style="display: none;">
                                          <table class="table styled-table">
                                            <thead>
                                              <th>New Report</th>
                                              <th>Report Image</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody id="tbl_added_new_report_history">
                                              <td></td>
                                              <td></td>
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                    
                  </div>
                  <!-- section c -->
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
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
<?php $this->load->view('footer');?>

<?php $this->load->view('javascript');?>
<link rel="stylesheet" href="<?php print base_url(); ?>asset/Admin/select2.css">  
  <!-- iCheck -->
<script src="<?php print base_url(); ?>asset/Admin/select2.js"></script>
</body>
<script type="text/javascript">
/*$(document).ready(function() {
  $("#sel_patient_list").select2();
  
});*/
</script>
<script type="text/javascript">
function getPatientRecord2(patient_id,opd_id)
{
  var sel_patient_list=opd_id;
  $('#lbl_err').hide();
  
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
        $('#txt_patient_id2').val(res[0]);
        $('#txt_patient_id3').val(res[0]);
        document.getElementById("lbl_opd_id").innerHTML = "OPD ID : - "+sel_patient_list;
        document.getElementById("lbl_patient_name").innerHTML = "Patient Name : - "+res[1];
       
        var pid=res[0];
         
          //$('#txt_patient_id').val(patient_id);
          $('#txt_opd_id').val(sel_patient_list);
          $('#txt_opd_id2').val(sel_patient_list);
          $('#txt_opd_id3').val(sel_patient_list);

            all_oraddtopatient();
            all_nraddtopatient();
            //all_old_report();
            chkPatient();
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
        //all_old_report();
        all_oraddtopatient();

         });
}
function chkPatient()
{
  var sel_patient_list=document.getElementById('sel_patient_list').value;
  if(sel_patient_list=="")
  {
      $('#btn_submit').hide();
      $('#btn_btntype').show();

      $('#btn_submit_nr').hide();
      $('#btn_btntype_nr').show();
      alert('select patient please');
  }
  else
  {
      $('#btn_submit').show();
      $('#btn_btntype').hide();

      $('#btn_submit_nr').show();
      $('#btn_btntype_nr').hide();
  }

}
 function getPatientRecord()
{
  var sel_patient_list=document.getElementById('sel_patient_list').value;
$('#lbl_err').hide();

  if (sel_patient_list!="") 
  {
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
        $('#txt_patient_id2').val(res[0]);
        $('#txt_patient_id3').val(res[0]);
        document.getElementById("lbl_opd_id").innerHTML = "OPD ID : - "+sel_patient_list;
        document.getElementById("lbl_patient_name").innerHTML = "Patient Name : - "+res[1];
       
        var pid=res[0];
         
          //$('#txt_patient_id').val(pid);
          $('#txt_opd_id').val(sel_patient_list);
          $('#txt_opd_id2').val(sel_patient_list);
          $('#txt_opd_id3').val(sel_patient_list);

          
          //all_old_report();
          all_oraddtopatient();
          all_nraddtopatient();
          chkPatient();
          getPatientHistory(pid,sel_patient_list);
         });
  }
  else
  {
          $('#txt_patient_id').empty();
        $('#txt_patient_id2').empty();
        $('#txt_patient_id3').empty();
        $('#txt_opd_id').empty();
          $('#txt_opd_id2').empty();
          $('#txt_opd_id3').empty();
          $('#tbl_added_old_report').empty();
          $('#lbl_opd_id').empty();
          $('#lbl_patient_name').empty();
          chkPatient();
          $('#sel_history').empty();
          
  }
} 
function add_old_report()
{
  var sel_patient_list=document.getElementById('sel_patient_list').value;
  var txt_old_report=document.getElementById('txt_old_report').value;
  if (sel_patient_list=="") 
  {
      alert('select patient please');
  }
  else if (txt_old_report=="") 
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
            $('#sel_or').empty();
            $('#sel_or').append(message);
           });
  }
}
function add_new_report()
{
  var sel_patient_list=document.getElementById('sel_patient_list').value;
  var txt_new_report=document.getElementById('txt_new_report').value;

  if (sel_patient_list=="") 
  {
      alert('select patient please');
  }
  else if(txt_new_report=="")
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
            $('#sel_nr').empty();

            $('#sel_nr').append(message);


           });
  }
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
        
        $('#sel_or').empty();
        $('#sel_or').append(message);

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
        
        all_oraddtopatient();
        //all_old_report();

         });
}
function getOldHistory()
{
  var sel_history=document.getElementById('sel_history').value;
  var sel_history_type=document.getElementById('sel_history_type').value;
  document.getElementById('txt_opd_id').value=sel_history;
  if (sel_history_type=="old_report") 
  {
    all_oraddtopatient();
    $('#div_old_history').show();
    $('#div_new_history').hide();
  }
  else if(sel_history_type=="new_report")
  {
    all_nraddtopatient();
    $('#div_old_history').hide();
    $('#div_new_history').show();
  }
  else
  {
      $('#div_old_history').show();
    $('#div_new_history').show();
  }
  
}
function all_oraddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  if (patient_id!="") 
  {
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

        $('#tbl_added_old_report_history').empty();
        $('#tbl_added_old_report_history').append(message);

         });
    }
    else
    {
        $('#tbl_added_old_report').empty();
    }
}
function all_nraddtopatient()
{
  var patient_id=document.getElementById('txt_patient_id').value;
  var opd_id=document.getElementById('txt_opd_id').value;
  if (patient_id!="") 
  {
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

        $('#tbl_added_new_report_history').empty();
        $('#tbl_added_new_report_history').append(message);
        
         });
    }
    else
    {
        $('#tbl_added_old_report').empty();
    }
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
        all_nraddtopatient();

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
        //all_new_report();
        all_nraddtopatient();

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