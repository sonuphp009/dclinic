<?php 


$uname=$this->session->userdata('uname');
$user_role=$this->session->userdata('user_role');
$clinic_id=$this->session->userdata('clinic_id');
           
           $clinic_name='';

           
              $row=$this->Inm->get_clinic_by_id($clinic_id);
              if($row!="")
              {
                $clinic_name=$row->clinic_name;
              }
              else
              {
                 $clinic_name='';
              }
           
?>

<?php
if(!isMobile())
{?>
<div class="row">
    <div class="col-sm-3">

    </div>
    
    <div class="col-sm-6 text-center" style="font-size:24px;padding:10px;">
      <img class="rounded-circle" style="height: 80px;width: 80px;" src="<?php echo base_url()."asset/clinic_logo/dhan_logo2.png"?>">
        <?php echo "<b class='text-danger' style='font-size:28px;margin-left:10px;'>WELCOME ".$clinic_name."</b>"; ?>
    </div>
     <div class="col-sm-2">

    </div>
    <div class="col-sm-1" style="padding:10px;"> 
        
        <!-- <a href="<?php //echo site_url('Welcome/restore_data');?>"  class="btn btn-success btn-xs" style="width:100px;">Restore </a> | --> <a href="<?php echo site_url('Welcome/getBackup');?>" class="btn btn-danger btn-xs" style="width:100px;">Back Up</a>
    
    </div>
</div>
<?php } else { ?>
<div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6" style="padding:20px;margin-left: 10px;">
        <img class="rounded-circle" style="height: 70px;width: 70px;" src="<?php echo base_url()."asset/clinic_logo/dhan_logo2.png"?>"> &nbsp;<?php echo "<b class='text-danger' style='font-size:20px;'>WELCOME ".$clinic_name."</b>"; ?>
    </div>
    
    <div class="col-sm-3">

    </div>
</div>
<?php } ?>
<div class="row">
  <div class="col-sm-1">

  </div>
  <div class="col-sm-9">
        <?php if($user_role=="Receptionist") {?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: orange; margin-left: 100px;">

          <a class="navbar-brand" href="<?php echo site_url('Welcome/user_dashboard');?>"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                <a class="nav-link" href="<?php print site_url('Welcome/index2');?>" style="color: #fff;">
                  Home
                </a>
                
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                 OPD Registration
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="nav-link" href="<?php echo site_url('Welcome/patient_registration');?>">Patient Registration <span class="sr-only">(current)</span></a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="nav-link" href="<?php echo site_url('Welcome/patient_list');?>">Follow Up Patients</a>

                </div>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link" href="<?php print site_url('Appointment_controller/new_appointment');?>" style="color: #fff;">
                  New Appointment
                </a>
                
              </li>
             <li class="nav-item ">
                <a class="nav-link" href="<?php print site_url('Welcome/contact_list');?>" style="color: #fff;">
                  contact
                </a>
                
              </li>
              
            </ul>
             <ul class="navbar-nav ml-auto">
              <!-- Messages Dropdown Menu -->
              
              
              <li class="nav-item ">
                <a class="nav-link"  href="<?php print site_url('Welcome/logout_user');?>" style="color: #fff;">
                  Logout
                </a>
                
              </li>
             
            </ul>
          </div>
        </nav>
        <?php } else {?>

        <nav class="navbar navbar-expand-sm navbar-light bg-info"  >
          <?php if(!isMobile()){?>
         <a style="font-family: Helvetica;" class="navbar-brand " href="<?php echo site_url('Welcome/index2');?>"><?php echo "<b style='color: #cc0000;'><i> </i></b>"; ?></a>
       <?php } else {?>
          <a style="font-family: Helvetica;" class="navbar-brand text-center" href="<?php echo site_url('Welcome/index2');?>"><?php echo "<b >Dr. Sachin Pawar </b>"; ?></a>
       <?php }?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: Helvetica; ">
            <ul class="navbar-nav mr-auto ">
              <li class="nav-item ">
                <a class="nav-link" href="<?php print site_url('Welcome/index2');?>" style="color: #fff;">
                  Home
                </a>
                
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                 OPD Registration
                </a>
                <div class="dropdown-menu bg-info dropdown-content" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/patient_registration');?>">Patient Registration <span class="sr-only">(current)</span></a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/patient_list');?>">Follow Up Patients</a>

                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                  Appointment
                </a>
                <div class="dropdown-menu bg-info dropdown-content" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Appointment_controller/new_appointment');?>" >New Appointment</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/patient_message');?>">Message</a>
                  
                </div>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                  Patient History
                </a>
                <div class="dropdown-menu bg-info dropdown-content" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/emr');?>">Patient EMR</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/show_prescription');?>">Prescription</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/clinic_reports');?>">Clinical Reports</a>
                </div>
              </li>
              
              <?php
              if($user_role=="admin" || $user_role=="super_admin")
              {
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                  Master Forms
                </a>
                <div class="dropdown-menu bg-info dropdown-content" aria-labelledby="navbarDropdown">
                          <?php
                      if($user_role=="super_admin")
                      {
                      ?>
                      
                        <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/hospital_registration');?>" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Hospital Master</p>
                        </a>
                     
                    <?php }?>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/schedule_appointment');?>">Appointment Schedule</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/medicine_master');?>">Medicine Master</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/fees_master');?>">Fees Master</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-info" href="<?php echo site_url('Welcome/clinic_user');?>">User Master</a>
                </div>

              </li>
            <?php } ?>
             <li class="nav-item dropdown">
                <a class="nav-link dropbtn" href="<?php print site_url('Welcome/contact_list');?>" style="color: #fff;">
                  Contact
                </a>
                
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropbtn" href="<?php echo site_url('Welcome/clinic_setting');?>" style="color: #fff;">Clinic Setting</a>
                
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropbtn"  href="<?php print site_url('Welcome/logout_user');?>" style="color: #fff;">
                  Logout
                </a>
                
              </li>
             
              
            </ul>
            
          </div>
        </nav>
    </div>
    <div class="col-sm-1">

  </div>
</div>

<?php }?><hr/>
