<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_model extends CI_Model
 { //start class


	public function __construct()
	{                           
	  parent:: __construct();
	   
	}
	public function get_reg_by_id($id)
	{ 

		$this->db->where('reg.rid',$id);
	//	$this->db->where('tbl_master_opd_fee.hos_id',$hospital_id);
		$this->db->select('reg.*,
							');

		$this->db->from('reg');
		//$this->db->join('tbl_category','tbl_category.category_id=reg.category_id','left');
		$query=$this->db->get();
		return $query->row();
	
	}	
	public function get_slider_by_id($id)
	{ 
		$clinic_id=$this->session->userdata('clinic_id');
       //$conv_pwd= md5(trim($pwd));
		$this->db->where('clinic_id',$clinic_id);
		$this->db->where('is_delete',0);
		$this->db->where('tbl_add_content.content_id',$id);
	//	$this->db->where('tbl_master_opd_fee.hos_id',$hospital_id);
		$this->db->select('tbl_add_content.*');

		$this->db->from('tbl_add_content');
		$query=$this->db->get();
		return $query->row();
	
	}	

	function get_services($clinic_id)
    {
		//$clinic_id=$this->session->userdata('clinic_id');
       //$conv_pwd= md5(trim($pwd));
		$this->db->where('clinic_id',$clinic_id);
		$this->db->where('content_type',"services");
        $this->db->select("*");
        $this->db->from('tbl_add_content');
        $this->db->order_by('content_id','desc');
        $this->db->limit(3);
        $query= $this->db->get('');
        return $query->result();
    }
    function get_porfolio($clinic_id)
    {
		//$clinic_id=$this->session->userdata('clinic_id');
       //$conv_pwd= md5(trim($pwd));
		$this->db->where('clinic_id',$clinic_id);
		$this->db->where('content_type',"portfolio");
        $this->db->select("*");
        $this->db->from('tbl_add_content');
        $this->db->order_by('content_id','desc');
        $this->db->limit(6);
        $query= $this->db->get('');
        return $query->result();
    }
    function get_about($clinic_id)
    {
		//$clinic_id=$this->session->userdata('clinic_id');
       //$conv_pwd= md5(trim($pwd));
		$this->db->where('clinic_id',$clinic_id);
		$this->db->where('content_type',"about");
        $this->db->select("*");
        $this->db->from('tbl_add_content');
        $this->db->order_by('content_id','desc');
        $this->db->limit(3);
        $query= $this->db->get('');
        return $query->result();
    }
	function get_all_content()
    {
		$clinic_id=$this->session->userdata('clinic_id');
       //$conv_pwd= md5(trim($pwd));
		$this->db->where('clinic_id',$clinic_id);
		$this->db->where('is_delete',0);
        $this->db->select("*");
        $this->db->from('tbl_add_content');
        $this->db->order_by('content_id','desc');
        //$this->db->limit(3);
        $query= $this->db->get('');
        return $query->result();
    }
    function get_all_contact()
    {
		$clinic_id=$this->session->userdata('clinic_id');
       //$conv_pwd= md5(trim($pwd));
		$this->db->where('clinic_id',$clinic_id);
		//$this->db->where('is_delete',0);
        $this->db->select("*");
        $this->db->from('tbl_contact_master');
        $this->db->order_by('contact_id','desc');
        //$this->db->limit(3);
        $query= $this->db->get('');
        return $query->result();
    }
	function get_user($usr, $pwd)
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('email', $usr); 
		  $this->db->where('password',$pwd); 
		  $this->db->where('active_status',"active"); 
		 
		  $this->db->select("reg.*");
		  $this->db->from('reg');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     public function get_user_all()
	{ 

		$this->db->where('reg.is_delete',0);
		$this->db->where('reg.user_type!=',"super_admin");
	//	$this->db->where('tbl_master_opd_fee.hos_id',$hospital_id);
		$this->db->select('reg.*');

		$this->db->from('reg');
		$query=$this->db->get();
		return $query->result();
	
	}
	public function get_user_all_admin_res()
	{ 

		$this->db->where('reg.is_delete',0);
		$this->db->where('reg.user_type!=',"super_admin");
		$this->db->where('reg.user_type!=',"patient");
		//$this->db->where('reg.user_type!=',"super_admin");
	//	$this->db->where('tbl_master_opd_fee.hos_id',$hospital_id);
		$this->db->select('reg.*');

		$this->db->from('reg');
		$query=$this->db->get();
		return $query->result();
	
	}
	public function get_user_all_patient()
	{ 

		$this->db->where('reg.is_delete',0);
		$this->db->where('reg.user_type!=',"super_admin");
		$this->db->where('reg.user_type',"patient");
		//$this->db->where('reg.user_type!=',"super_admin");
	//	$this->db->where('tbl_master_opd_fee.hos_id',$hospital_id);
		$this->db->select('reg.*');

		$this->db->from('reg');
		$query=$this->db->get();
		return $query->result();
	
	}
     function get_user_patient($usr, $mb)
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('username', $usr); 
		  $this->db->where('p_mobile',$mb); 
		 
		  $this->db->select("tbl_patient_master.*");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     function get_chk_patient($txt_patient_first_name, $txt_patient_middle_name,$txt_patient_last_name,$txt_patient_mobile)
 	{
		 //$conv_pwd= md5(trim($pwd));


 		if ($txt_patient_first_name!="") 
 		{
 			$this->db->where('first_name', $txt_patient_first_name); 
 		}
 		if ($txt_patient_middle_name!="") 
 		{
 			$this->db->where('middle_name', $txt_patient_middle_name);
 		}
 		if ($txt_patient_last_name!="") 
 		{
 			$this->db->where('last_name', $txt_patient_last_name);
 		}
 		if ($txt_patient_mobile!="")
 		{
 			$this->db->where('p_mobile',$txt_patient_mobile); 
 		}
 		

		  $this->db->select("tbl_patient_master.patient_id");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
         
		  return $query->row();
 		
		  
		  
		 
     }
     function get_clinic_by_id($id)
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('clinic_id',$id); 
		 
		  $this->db->select("tbl_clinic_master.*,
		  					reg.rid");
		  $this->db->from('tbl_clinic_master');
		 $this->db->join('reg','reg.clinic_reg_id=tbl_clinic_master.clinic_id');
          $query= $this->db->get();
		  return $query->row();
     }
     function get_clinic_by_user($user,$pass)
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('clinic_email',$user);
		  $this->db->where('clinic_password',$pass); 
		 
		  $this->db->select("tbl_clinic_master.*");
		  $this->db->from('tbl_clinic_master');
          $query= $this->db->get();
		  return $query->row();
     }
     function get_clinic_all()
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('is_delete', 0); 
		 
		  $this->db->select("tbl_clinic_master.*");
		  $this->db->from('tbl_clinic_master');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function getCheckClinicUserName($usr)
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('clinic_name', $usr); 
		 
		  $this->db->select("tbl_clinic_master.*");
		  $this->db->from('tbl_clinic_master');
		 
          $query= $this->db->get();
		  return $query->row();
     }
    function get_patient_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 			$uid=$this->session->userdata('clinic_id');
		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $uid);
		  $this->db->where('check_status', "check_in"); 
		 
		  $this->db->select("tbl_patient_master.*");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function getAllMessageByPid($pid)
 	{
		 //$conv_pwd= md5(trim($pwd));
 			$uid=$this->session->userdata('clinic_id');
		  $this->db->where('clinic_id', $uid);
		  $this->db->where('patient_id', $pid);
		 
		  $this->db->select("tbl_master_chat.*");
		  $this->db->from('tbl_master_chat');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_patient_list_all()
 	{
		 //$conv_pwd= md5(trim($pwd));
 			$uid=$this->session->userdata('clinic_id');
		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $uid);
		 
		  $this->db->select("tbl_patient_master.*");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_patient_listforreport()
 	{
		 //$conv_pwd= md5(trim($pwd));
 			$uid=$this->session->userdata('clinic_id');
		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $uid);
		  //$this->db->where('check_status', "check_in"); 
		 
		  $this->db->select("tbl_patient_master.*");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_patient_list_search($first_name,$middle_name,$last_name,$mobile_number)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$uid=$this->session->userdata('clinic_id');
		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $uid);
		  if($first_name!="")
		  {
		  	$this->db->where('first_name', $first_name);
		  }

		  if($middle_name!="")
		  {
		  	$this->db->where('middle_name', $middle_name);
		  }

		  if($last_name!="")
		  {
		  	$this->db->where('last_name', $last_name);
		  }

		  if($mobile_number!="")
		  {
		  	$this->db->where('p_mobile', $mobile_number);
		  }
		  
		  //$this->db->where('check_status', "check_in"); 
		 
		  $this->db->select("tbl_patient_master.*");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_patient_list_show()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$uid=$this->session->userdata('clinic_id');
		  
		  $this->db->where('tbl_patient_master.clinic_id', $uid); 
		 //$this->db->where('reg.clinic_id', $uid);
		  $this->db->select("tbl_patient_master.*,
		  					reg.rid,
		  					");
		  $this->db->from('tbl_patient_master');
		 $this->db->join('reg','reg.patient_id=tbl_patient_master.patient_id');
          $query= $this->db->get();
		  return $query->result();
     }
     function get_chief_complaints_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_chief_complaints.*");
		  $this->db->from('tbl_chief_complaints');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_past_history_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_past_history.*");
		  $this->db->from('tbl_past_history');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_personal_history_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_personal_history.*");
		  $this->db->from('tbl_personal_history');
		 
          $query= $this->db->get();
		  return $query->result();
     }
    function get_se_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_systemic_examination.*");
		  $this->db->from('tbl_systemic_examination');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_ge_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_general_examination.*");
		  $this->db->from('tbl_general_examination');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_or_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_old_report.*");
		  $this->db->from('tbl_old_report');
		 
          $query= $this->db->get();
		  return $query->result();
     }
    function get_nr_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_new_report.*");
		  $this->db->from('tbl_new_report');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_diagnosis_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_diagnosis.*");
		  $this->db->from('tbl_diagnosis');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_treatment_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_treatment.*");
		  $this->db->from('tbl_treatment');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_instruction_accu_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_instruction_accu.*");
		  $this->db->from('tbl_instruction_accu');
		 
          $query= $this->db->get();
		  return $query->result();
     }
      function get_investigation_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		 
		  $this->db->select("tbl_investigation.*");
		  $this->db->from('tbl_investigation');
		 
          $query= $this->db->get();
		  return $query->result();
     }
 	function get_patient_chk_chf($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('chief_complaint_id', $chf_id); 
		 
		  $this->db->select("tbl_chief_complaints_details.chief_detail_id");
		  $this->db->from('tbl_chief_complaints_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
    function get_patient_chk_ps($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('ps_id', $chf_id); 
		 
		  $this->db->select("tbl_past_history_details.ps_detail_id");
		  $this->db->from('tbl_past_history_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     function get_patient_chk_ph($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('ph_id', $chf_id); 
		 
		  $this->db->select("tbl_personal_history_details.ph_detail_id");
		  $this->db->from('tbl_personal_history_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     function get_patient_chk_ge($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('ge_id', $chf_id); 
		 
		  $this->db->select("tbl_general_examination_details.ge_detail_id");
		  $this->db->from('tbl_general_examination_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
    function get_patient_chk_se($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('se_id', $chf_id); 
		 
		  $this->db->select("tbl_systemic_examination_details.se_detail_id");
		  $this->db->from('tbl_systemic_examination_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
    function get_patient_chk_or($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('or_id', $chf_id); 
		 
		  $this->db->select("tbl_old_report_details.or_detail_id");
		  $this->db->from('tbl_old_report_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     function get_patient_chk_nr($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('nr_id', $chf_id); 
		 
		  $this->db->select("tbl_new_report_details.nr_detail_id");
		  $this->db->from('tbl_new_report_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     function get_patient_chk_diagnosis($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('diagnosis_id ', $chf_id); 
		 
		  $this->db->select("tbl_diagnosis_details.diagnosis_detail_id");
		  $this->db->from('tbl_diagnosis_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     function get_patient_chk_investigation($opd_id,$chf_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('is_delete', 0); 
		  $this->db->where('clinic_id', $clinic_id); 
		  $this->db->where('opd_id', $opd_id);
		  $this->db->where('investigation_id ', $chf_id); 
		 
		  $this->db->select("tbl_investigation_details.investigation_detail_id");
		  $this->db->from('tbl_investigation_details');
		 
          $query= $this->db->get();
		  return $query->row();
     }
    function get_added_chief_complaints_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_chief_complaints_details.is_delete', 0); 
		  $this->db->where('tbl_chief_complaints_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_chief_complaints_details.patient_id', $patient_id); 
		  $this->db->where('tbl_chief_complaints_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_chief_complaints_details.*,
		  					tbl_chief_complaints.complaint
		  					");
		  $this->db->from('tbl_chief_complaints_details');
		  $this->db->join('tbl_chief_complaints','tbl_chief_complaints.chief_id=tbl_chief_complaints_details.chief_complaint_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
    function get_added_ps_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_past_history_details.is_delete', 0); 
		  $this->db->where('tbl_past_history_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_past_history_details.patient_id', $patient_id); 
		  $this->db->where('tbl_past_history_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_past_history_details.*,
		  					tbl_past_history.past_history
		  					");
		  $this->db->from('tbl_past_history_details');
		  $this->db->join('tbl_past_history','tbl_past_history.past_history_id=tbl_past_history_details.ps_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
    function get_added_ph_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_personal_history_details.is_delete', 0); 
		  $this->db->where('tbl_personal_history_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_personal_history_details.patient_id', $patient_id); 
		  $this->db->where('tbl_personal_history_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_personal_history_details.*,
		  					tbl_personal_history.personal_history
		  					");
		  $this->db->from('tbl_personal_history_details');
		  $this->db->join('tbl_personal_history','tbl_personal_history.per_history_id=tbl_personal_history_details.ph_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_ge_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_general_examination_details.is_delete', 0); 
		  $this->db->where('tbl_general_examination_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_general_examination_details.patient_id', $patient_id); 
		  $this->db->where('tbl_general_examination_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_general_examination_details.*,
		  					tbl_general_examination.general_examination
		  					");
		  $this->db->from('tbl_general_examination_details');
		  $this->db->join('tbl_general_examination','tbl_general_examination.gen_exam_id=tbl_general_examination_details.ge_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_se_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_systemic_examination_details.is_delete', 0); 
		  $this->db->where('tbl_systemic_examination_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_systemic_examination_details.patient_id', $patient_id); 
		  $this->db->where('tbl_systemic_examination_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_systemic_examination_details.*,
		  					tbl_systemic_examination.systemic_examination
		  					");
		  $this->db->from('tbl_systemic_examination_details');
		  $this->db->join('tbl_systemic_examination','tbl_systemic_examination.syst_exam_id=tbl_systemic_examination_details.se_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_or_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_old_report_details.is_delete', 0); 
		  $this->db->where('tbl_old_report_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_old_report_details.patient_id', $patient_id); 
		  $this->db->where('tbl_old_report_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_old_report_details.*,
		  					tbl_old_report.old_report
		  					");
		  $this->db->from('tbl_old_report_details');
		  $this->db->join('tbl_old_report','tbl_old_report.old_report_id=tbl_old_report_details.or_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_nr_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_new_report_details.is_delete', 0); 
		  $this->db->where('tbl_new_report_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_new_report_details.patient_id', $patient_id); 
		  $this->db->where('tbl_new_report_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_new_report_details.*,
		  					tbl_new_report.new_report
		  					");
		  $this->db->from('tbl_new_report_details');
		  $this->db->join('tbl_new_report','tbl_new_report.new_report_id=tbl_new_report_details.nr_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
    function get_added_diagnosis_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_diagnosis_details.is_delete', 0); 
		  $this->db->where('tbl_diagnosis_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_diagnosis_details.patient_id', $patient_id); 
		  $this->db->where('tbl_diagnosis_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_diagnosis_details.*,
		  					tbl_diagnosis.diagnosis
		  					");
		  $this->db->from('tbl_diagnosis_details');
		  $this->db->join('tbl_diagnosis','tbl_diagnosis.diagnosis_id=tbl_diagnosis_details.diagnosis_id');
		 
          $query= $this->db->get();
		  return $query->result();
    }
    function get_added_treatment_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_treatment_details.is_delete', 0); 
		  $this->db->where('tbl_treatment_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_diagnosis_details.patient_id', $patient_id); 
		  $this->db->where('tbl_treatment_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_treatment_details.*,
		  					tbl_treatment.treatment
		  					");
		  $this->db->from('tbl_treatment_details');
		  $this->db->join('tbl_treatment','tbl_treatment.treatment_id=tbl_treatment_details.treatment_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_instruction_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_instruction_accu_details.is_delete', 0); 
		  $this->db->where('tbl_instruction_accu_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_diagnosis_details.patient_id', $patient_id); 
		  $this->db->where('tbl_instruction_accu_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_instruction_accu_details.*,
		  					tbl_instruction_accu.fld_instruction
		  					");
		  $this->db->from('tbl_instruction_accu_details');
		  $this->db->join('tbl_instruction_accu','tbl_instruction_accu.instruction_id=tbl_instruction_accu_details.instruction_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function getInstructionFeild($ins_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_instruction_accu.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_diagnosis_details.patient_id', $patient_id); 
		  $this->db->where('tbl_instruction_accu.instruction_id', $ins_id); 
		 
		  $this->db->select("
		  					tbl_instruction_accu.fld_instruction
		  					");
		  $this->db->from('tbl_instruction_accu');
		  
          $query= $this->db->get();
		  return $query->row();
     }
     function get_added_investigation_list($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_investigation_details.is_delete', 0); 
		  $this->db->where('tbl_investigation_details.clinic_id', $clinic_id); 
		  //$this->db->where('tbl_investigation_details.patient_id', $patient_id); 
		  $this->db->where('tbl_investigation_details.opd_id', $opd_id); 
		 
		  $this->db->select("tbl_investigation_details.*,
		  					tbl_investigation.investigation
		  					");
		  $this->db->from('tbl_investigation_details');
		  $this->db->join('tbl_investigation','tbl_investigation.investigation_id=tbl_investigation_details.investigation_id');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_patient_list_followup()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_patient_master.clinic_id',$clinic_id); 
		  
		  $this->db->select("tbl_patient_master.*,
		  					
		  					");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_patientById($patient_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_patient_master.patient_id',$patient_id); 
		  $this->db->where('tbl_patient_master.clinic_id',$clinic_id); 
		  
		  $this->db->select("tbl_patient_master.*,
		  					
		  					");
		  $this->db->from('tbl_patient_master');
		 
          $query= $this->db->get();
		  return $query->row();
     }
     function getLastOPD($patient_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_opd_master.patient_id',$patient_id); 
		  
		  $this->db->select("tbl_opd_master.*,
		  					
		  					");
		  $this->db->from('tbl_opd_master');
		 $this->db->order_by('opd_id','desc');
		 $this->db->limit(1);
          $query= $this->db->get();
		  return $query->result();
     }
     function get_opdById($opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_opd_master.opd_id',$opd_id); 
		  
		  $this->db->select("tbl_opd_master.*,
		  					
		  					");
		  $this->db->from('tbl_opd_master');
		 
          $query= $this->db->get();
		  return $query->row();
     }
      function get_InstructionPres()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_print_instruction.clinic_id',$clinic_id); 
		  
		  $this->db->select("tbl_print_instruction.*,
		  					
		  					");
		  $this->db->from('tbl_print_instruction');
		 
          $query= $this->db->get();
		  return $query->result();
     }
    function get_fees()
    {
    	$clinic_id=$this->session->userdata('clinic_id');

           //$conv_pwd= md5(trim($pwd));
    		$this->db->where('clinic_id',$clinic_id);
	 		//$this->db->where('tbl_dose_time.clinic_id', $clinic_id); 

            $this->db->select("*");
            $this->db->from('tbl_fees_master');
            $query= $this->db->get('');
            return $query->result();
    }
    function get_opd_feesall()
 	{
 		 date_default_timezone_set('Asia/Kolkata');
		 $tim=date("Y-m-d");
		 //$conv_pwd= md5(trim($pwd));
 		 $clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_opd_master.clinic_id',$clinic_id); 
		  $this->db->where('tbl_opd_master.opd_date',$tim); 
		  //$this->db->where('tbl_opd_master.fees!=',""); 
		  $this->db->select("tbl_opd_master.*,
		  					
		  					
		  					");
		  $this->db->from('tbl_opd_master');
          $query= $this->db->get();
		  return $query->result();
     }
      function get_opd_all()
 	{
 		date_default_timezone_set('Asia/Kolkata');
		 $tim=date("Y-m-d");
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_opd_master.clinic_id',$clinic_id); 
		  $this->db->where('tbl_opd_master.opd_date',$tim); 
		  $this->db->select("tbl_opd_master.*,
		  					tbl_patient_master.check_status
		  					
		  					");
		  $this->db->from('tbl_opd_master');
		  $this->db->from('tbl_patient_master','tbl_patient_master.opd_id=tbl_opd_master.opd_id');
          $query= $this->db->get();
		  return $query->result();
     }
     function get_opd_chkin()
 	{
 		date_default_timezone_set('Asia/Kolkata');
		 $tim=date("Y-m-d");
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');

		  $this->db->where('tbl_opd_master.clinic_id',$clinic_id); 
		  $this->db->where('tbl_opd_master.opd_date',$tim); 
		  $this->db->where('tbl_patient_master.check_status',"check_in"); 
		  $this->db->select("tbl_opd_master.*,
		  					tbl_patient_master.check_status
		  					
		  					");
		  $this->db->from('tbl_opd_master');
		  $this->db->join('tbl_patient_master','tbl_patient_master.opd_id=tbl_opd_master.opd_id');
          $query= $this->db->get();
		  return $query->result();
     }
}

?>