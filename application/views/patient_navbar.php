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
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="<?php echo site_url('Welcome/patient_dashboard');?>"><?php echo "WELCOME ".$uname; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('Welcome/patient_appointment');?>">Appointment<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Welcome/patient_prescription');?>">Prescription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Welcome/patient_history_app');?>">History</a>
      </li>
      
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Welcome/logout_user');?>">Logout</a>
        </li>
      </ul>
    </form>
  </div>
</nav>