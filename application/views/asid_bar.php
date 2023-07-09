<?php $uname="";
$user_role="";
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
<div class="wrapper">

 

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('Welcome/index2');?>" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
           <?php 
           
              echo '<span class="brand-text font-weight-light">'.$clinic_name.'</span>';
           
           ?>
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url().$row->clinic_image;?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              <?php
                 $uname=$this->session->userdata('uname');
                  $user_role=$this->session->userdata('user_role');
                  if(isset($uname))
                  {
                    echo $uname;
                  }
              ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo site_url('Welcome/index2');?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Master Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              if($user_role=="super_admin")
              {
              ?>
              <li class="nav-item">
                <a href="<?php echo site_url('Welcome/hospital_registration');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hospital Master</p>
                </a>
              </li>
            <?php }?>
            <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fees Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Medicine_controller/clinic_medicine');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine Master</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php //echo site_url('Welcome/clinic_user');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo site_url('Welcome/clinic_medicine');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo site_url('Welcome/clinic_appointment');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appointment Master</p>
                </a>
              </li> -->
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Transaction Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Appointment_controller/index');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appointment Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Welcome/patient_registration');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient History</p>
                </a>
              </li>
             
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
