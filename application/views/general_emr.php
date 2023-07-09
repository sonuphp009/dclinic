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
</head>
<body <?php if (isset($opd_data)) { echo 'onload="getPatientRecord2('.$p_data->patient_id.','.$opd_data->opd_id.')"';}?>>

<div class="div_container">

<?php $this->load->view('navbar2');?>
<?php //$this->load->view('asid_bar');?>
		<div class="row" style="padding: 10px;">
      <div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>

			<div class="col-sm-12 text-center text-primary">
					<h4 class="header">Patient Emr</h4>
			</div>
		</div>
    <div class="row form-group">
        <div class="col-sm-2">
          <input type="hidden" name="txt_patient_id" id="txt_patient_id">
          <input type="hidden" name="txt_opd_id" id="txt_opd_id">
        </div>
        <div class="col-sm-2 text-center">
          <h4>Patient Name : -</h4>
        </div>
        <div class="col-sm-6">
          
          <select name="sel_patient_list" id="sel_patient_list" class="form-control" onchange="getPatientRecord()">
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
		<div class="row">

                  <div class="col-sm-12">
                    <input type="hidden" name="txt_opd_id" id="txt_opd_id">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist" style="color: white;">
                        <li class="nav-item">
                          <a class="nav-link active" id="chief_complaints" data-toggle="pill" href="#div_chief_complaints" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Chief Complaints</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="past_history" data-toggle="pill" href="#div_past_history" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Past History</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="personal_history" data-toggle="pill" href="#div_personal_history" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Personal History</a>
                        </li>
                        
                        <li class="nav-item">
                          <a class="nav-link" id="general_examination" data-toggle="pill" href="#div_general_examination" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">General Examination</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="systemic_examination" data-toggle="pill" href="#div_systemic_examination" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Systemic Examination</a>
                        </li>
                        
                        <li class="nav-item">
                          <a class="nav-link" id="diagnosis" data-toggle="pill" href="#div_diagnosis" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Diagnosis</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="investigation" data-toggle="pill" href="#div_investigation" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Investigation</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                          <div class="tab-pane fade active show" id="div_chief_complaints" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                             <div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-8">
                                        <label>Add New Chief Complaint</label>
                                        <input type="text" id="txt_chief_complaint" name="txt_chief_complaint" class="form-control" placeholder="Add Chief Complaint Here.....">
                                      </div>
                                      <div class="col-sm-4">

                                        <button class="btn btn-success btn-xs" onclick="add_chief_complaint()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-success btn-xs" onclick="all_chief_complaint()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button>
                                      </div>
                                  </div> <hr/>
                                  <div class="row">

                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_chief_complaint" id="txt_search_chief_complaint" class="form-control" placeholder="Search And Select Chief Complaints.....">
                                      </div>
                                  </div> <hr/>
                                  <div class="row" >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <table class="table table-hover">
                                          <thead>
                                            <th>Chief Complints</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_search_chf">
                                            <td></td>
                                            <td></td>
                                          </tbody>
                                        </table>
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
                                          <table class="table table-hover">
                                            <thead>
                                              <th>Chief Complints</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody id="tbl_added_chf">
                                              <td></td>
                                              <td></td>
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                </div>

                             </div>

                          </div>
                          <div class="tab-pane fade" id="div_past_history" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                             <div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-10">
                                        <label>Add New Past History</label>
                                        <input type="text" id="txt_past_history" name="txt_past_history" class="form-control" placeholder="Add New Past History Here.....">
                                      </div>
                                      <div class="col-sm-4">                                        
                                        <button class="btn btn-success btn-xs" onclick="add_past_history()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-success btn-xs" onclick="all_past_history()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button>
                                      </div>
                                  </div><hr/>
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_past_history" id="txt_search_past_history" class="form-control" placeholder="Search And Select Past History.....">
                                      </div>
                                  </div> <hr/>
                                  <div class="row" >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <table class="table table-hover">
                                          <thead>
                                            <th>Past History</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_search_past_history">
                                            <td></td>
                                            <td></td>
                                          </tbody>
                                        </table>
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
                                          <table class="table table-hover">
                                            <thead>
                                              <th>Past History</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody id="tbl_added_past_history">
                                              <td></td>
                                              <td></td>
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                  </div>

                             </div>
                          </div>
                          <div class="tab-pane fade" id="div_personal_history" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                            <div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-10">
                                        <label>Add New Personal History</label>
                                        <input type="text" id="txt_personal_history" name="txt_personal_history" class="form-control" placeholder="Add New Personal History Here.....">
                                      </div>
                                      <div class="col-sm-4">
                                        <button class="btn btn-success btn-xs" onclick="add_personal_history()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-success btn-xs" onclick="all_personal_history()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button>
                                       
                                      </div>
                                  </div><hr/>
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_personal_history" id="txt_search_personal_history" class="form-control" placeholder="Search And Select Personal History .....">
                                      </div>
                                  </div> <hr/>
                                  <div class="row" >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <table  class="table table-hover">
                                          <thead>
                                            <th>Personal History</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_search_ph">
                                            <td></td>
                                            <td></td>
                                          </tbody>
                                        </table>
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
                                              <table class="table table-hover">
                                                <thead>
                                                  <th>Personal History</th>
                                                  <th>Action</th>
                                                </thead>
                                                <tbody id="tbl_added_personal_history">
                                                  <td></td>
                                                  <td></td>
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                </div>

                             </div>
                          </div>
                          <div class="tab-pane fade" id="div_general_examination" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                             <div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-10">
                                        <label>Add New General Examnation</label>
                                        <input type="text" id="txt_general_examination" name="txt_general_examination" class="form-control" placeholder="Add New General Examnation Here.....">
                                      </div>
                                      <div class="col-sm-4">
                                        <button class="btn btn-success btn-xs" onclick="add_general_examination()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-success btn-xs" onclick="all_general_examination()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        
                                      </div>
                                  </div><hr/>
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_general_examination" id="txt_search_general_examination" class="form-control" placeholder="Search And Select General Examnation.....">
                                      </div>
                                  </div> <hr/>
                                  <div class="row" >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <table class="table table-hover">
                                          <thead>
                                            <th>General Examnation</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_search_ge">
                                            <td></td>
                                            <td></td>
                                          </tbody>
                                        </table>
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
                                              <table class="table table-hover">
                                                <thead>
                                                  <th>General Examination</th>
                                                  <th>Add Value</th>
                                                  <th>Action</th>
                                                </thead>
                                                <tbody id="tbl_added_general_examination">
                                                  
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                </div>

                             </div> 
                          </div>
                          <div class="tab-pane fade" id="div_systemic_examination" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                             <div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-10">
                                        <label>Add New Systemic Examination</label>
                                        <input type="text" name="txt_systemic_examination" id="txt_systemic_examination" class="form-control" placeholder="Add New Systemic Examination Here.....">
                                      </div>
                                      <div class="col-sm-4">
                                         <button class="btn btn-success btn-xs" onclick="add_systemic_examination()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-success btn-xs" onclick="all_se()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        
                                       
                                      </div>
                                  </div><hr/>
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_systemic_examination" id="txt_search_systemic_examination" class="form-control" placeholder="Search And Select Systemic Examination.....">
                                      </div>
                                  </div> <hr/>
                                  <div class="row" >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <table class="table table-hover">
                                          <thead>
                                            <th>Systemic Examination</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_search_se">
                                            <td></td>
                                            <td></td>
                                          </tbody>
                                        </table>
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
                                            <table class="table table-hover">
                                              <thead>
                                                <th>Systemic Examination</th>
                                                <th>Action</th>
                                              </thead>
                                              <tbody id="tbl_added_systemic_examination">
                                                <td></td>
                                                <td></td>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                </div>

                             </div> 
                          </div>
                          
                          <div class="tab-pane fade" id="div_diagnosis" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                             <div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-10">
                                        <label>Add New Diagnosis</label>
                                        <input type="text" name="txt_diagnosis" id="txt_diagnosis" class="form-control" placeholder="Add New Diagnosis Here.....">
                                      </div>
                                      <div class="col-sm-4">
                                        <button class="btn btn-success btn-xs" onclick="add_diagnosis()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-success btn-xs" onclick="all_diagnosis()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        
                                      </div>
                                  </div><hr/>
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_diagnosis" id="txt_search_diagnosis" class="form-control" placeholder="Search And Select Diagnosis.....">
                                      </div>
                                  </div> <hr/>
                                  <div class="row" >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <table class="table table-hover">
                                          <thead>
                                            <th>Diagnosis</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_search_diagnosis">
                                            <td></td>
                                            <td></td>
                                          </tbody>
                                        </table>
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
                                            <table class="table table-hover">
                                              <thead>
                                                <th>Diagnosis</th>
                                                <th>Action</th>
                                              </thead>
                                              <tbody id="tbl_added_diagnosis">
                                                <td></td>
                                                <td></td>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                </div>

                             </div>
                          </div>
                          <div class="tab-pane fade" id="div_investigation" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                            <div class="row" >
                                <div class="col-sm-6 card card-primary card-outline" style="padding: 5px;">
                                  <div class="row">
                                      <div class="col-sm-10">
                                        <label>Add New Investigation</label>
                                        <input type="text" name="txt_investigation" id="txt_investigation" class="form-control" placeholder="Add New Investigation Here.....">
                                      </div>
                                      <div class="col-sm-4">
                                        <button class="btn btn-success btn-xs" onclick="add_investigation()" style="margin-top: 35px;height: 30px;"> Add &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-success btn-xs" onclick="all_investigation()" style="margin-top: 35px;height: 30px;"> Pickup &nbsp;<i class="fa fa-plus-circle"></i></button>
                                        
                                      </div>
                                  </div><hr/>
                                  <div class="row">
                                      <div class="col-sm-12">
                                        <input type="text" name="txt_search_investigation" id="txt_search_investigation" class="form-control" placeholder="Search And Select Investigation.....">
                                      </div>
                                  </div> <hr/>
                                  <div class="row" >
                                      <div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                                        <table class="table table-hover">
                                          <thead>
                                            <th>Investigation</th>
                                            <th>Action</th>
                                          </thead>
                                          <tbody id="tbl_search_investigation">
                                            <td></td>
                                            <td></td>
                                          </tbody>
                                        </table>
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
                                            <table class="table table-hover">
                                              <thead>
                                                <th>Investigation</th>
                                                <th>Action</th>
                                              </thead>
                                              <tbody id="tbl_added_investigation">
                                                <td></td>
                                                <td></td>
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
<?php $this->load->view('footer');?>
	
<!-- modal -->
<div role="alert" id="save_toast" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
<!-- modal -->
<?php $this->load->view('javascript');?>
<link rel="stylesheet" href="<?php print base_url(); ?>asset/Admin/select2.css">  
  <!-- iCheck -->
<script src="<?php print base_url(); ?>asset/Admin/select2.js"></script>
</body>
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
       
        var pid=opd_id;
          getPatientEmr(pid,opd_id);
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
       
        var pid=res[1];
          getPatientEmr(pid,sel_patient_list)
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
        url:"<?php echo base_url();?>index.php/Generel_emr_controller/getAllChiefComplaints",
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
        url:"<?php echo base_url();?>index.php/Generel_emr_controller/getAllDiagnosis",
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