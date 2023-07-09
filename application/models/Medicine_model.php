<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine_model extends CI_Model
 { //start class


	public function __construct()
	{                           
	  parent:: __construct();
	   
	}
	 function get_dose_all()
    {
           //$conv_pwd= md5(trim($pwd));
    		$this->db->where('is_delete',0);
            $this->db->select("*");
            $this->db->from('tbl_dose_time');
            $query= $this->db->get('');
            return $query->result();
    }
    function getClinicRec($clinic_id)
    {
           //$conv_pwd= md5(trim($pwd));
    		//$this->db->where('is_delete',0);
    		$this->db->where('clinic_id',$clinic_id);
            $this->db->select("tbl_clinic_master.*");
            $this->db->from('tbl_clinic_master');
            $query= $this->db->get('');
            return $query->row();
    }
    function get_instruction_all()
    {
    	$clinic_id=$this->session->userdata('clinic_id');

           //$conv_pwd= md5(trim($pwd));
    	//$this->db->where('is_delete',0);
	 		//$this->db->where('tbl_dose_time.clinic_id', $clinic_id); 

            $this->db->select("*");
            $this->db->from('tbl_instruction');
            $query= $this->db->get('');
            return $query->result();
    }
    function get_medicine_all()
    {
    	$clinic_id=$this->session->userdata('clinic_id');

           //$conv_pwd= md5(trim($pwd));
    		$this->db->where('is_delete',0);
	 		//$this->db->where('tbl_dose_time.clinic_id', $clinic_id); 

            $this->db->select("*");
            $this->db->from('tbl_master_medicine');
            $query= $this->db->get('');
            return $query->result();
    }
    function get_added_dose()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		//$this->db->where('tbl_dose_time.clinic_id', $clinic_id); 
		  $this->db->where('tbl_dose_time.is_delete', 0); 		 
		  $this->db->select("tbl_dose_time.*,
		  					");
		  $this->db->from('tbl_dose_time');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_instruction()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		//$this->db->where('tbl_dose_time.clinic_id', $clinic_id); 
		 // $this->db->where('tbl_instruction.is_delete', 0); 		 
		  $this->db->select("tbl_instruction.*,
		  					");
		  $this->db->from('tbl_instruction');
		 
          $query= $this->db->get();
		  return $query->result();
     }
 	function get_added_medicine()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		//$this->db->where('tbl_dose_time.clinic_id', $clinic_id); 
		 $this->db->where('tbl_master_medicine.is_delete', 0); 		 
		  $this->db->select("tbl_master_medicine.*,
		  					tbl_dose_time.fld_dose,
		  					tbl_instruction.fld_instruction
		  					");
		  $this->db->from('tbl_master_medicine');
		 $this->db->join('tbl_dose_time','tbl_dose_time.fld_dose_id=tbl_master_medicine.dose_id','left');
		 $this->db->join('tbl_instruction','tbl_instruction.instruction_id=tbl_master_medicine.instruction_id','left');
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_prescription($patient_id,$opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		//$this->db->where('tbl_dose_time.clinic_id', $clinic_id); 
		 //$this->db->where('tbl_prescription.patient_id', $patient_id);
		 $this->db->where('tbl_prescription.opd_id', $opd_id); 		 
		  $this->db->select("tbl_prescription.*,
		  					tbl_dose_time.fld_dose,
		  					tbl_instruction.fld_instruction,
		  					tbl_master_medicine.medicine_name
		  					");
		  $this->db->from('tbl_prescription');
		 $this->db->join('tbl_dose_time','tbl_dose_time.fld_dose_id=tbl_prescription.dose_id','left');
		 $this->db->join('tbl_instruction','tbl_instruction.instruction_id=tbl_prescription.instruction_id','left');
		 $this->db->join('tbl_master_medicine','tbl_master_medicine.medicine_id=tbl_prescription.medicine_id','left');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_added_medicine_id($id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		$this->db->where('tbl_master_medicine.medicine_id', $id); 
		 $this->db->where('tbl_master_medicine.is_delete', 0); 		 
		  $this->db->select("tbl_master_medicine.*,
		  					
		  					");
		  $this->db->from('tbl_master_medicine');
		 //$this->db->join('tbl_dose_time','tbl_dose_time.fld_dose_id=tbl_master_medicine.dose_id','left');
		 //$this->db->join('tbl_instruction','tbl_instruction.instruction_id=tbl_master_medicine.instruction_id','left');
          $query= $this->db->get();
		  return $query->row();
     }
     function get_patient_listByOPD($opd_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 			$uid=$this->session->userdata('clinic_id');
		  $this->db->where('tbl_patient_master.is_delete', 0); 
		  $this->db->where('tbl_opd_master.clinic_id', $uid);
		  $this->db->where('tbl_patient_master.opd_id', $opd_id); 
		 
		  $this->db->select(
		  						"tbl_patient_master.*,
		  						tbl_opd_master.opd_date,
		  						tbl_opd_master.opd_id
		  					");
		  $this->db->from('tbl_patient_master');
		 $this->db->join('tbl_opd_master','tbl_opd_master.opd_id=tbl_patient_master.opd_id');
          $query= $this->db->get();
		  return $query->row();
     }
     function get_patient_listByPatient($patient_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 			$uid=$this->session->userdata('clinic_id');
		  $this->db->where('tbl_opd_master.clinic_id', $uid);
		  $this->db->where('tbl_opd_master.patient_id', $patient_id); 
		 
		  $this->db->select(
		  						"
		  						tbl_opd_master.opd_date,
		  						tbl_opd_master.opd_id
		  					");
		  $this->db->from('tbl_opd_master');
          $query= $this->db->get();
		  return $query->result();
     }
     function getSchedule()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		
		 $this->db->where('tbl_appointment_schedule.clinic_id', $clinic_id); 		 
		  $this->db->select("tbl_appointment_schedule.*,");
		  $this->db->from('tbl_appointment_schedule');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function getScheduleByDate($date)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		
		 $this->db->where('tbl_appointment_schedule.clinic_id', $clinic_id); 
		 $this->db->where('tbl_appointment_schedule.appointment_date', $date); 		 
		  $this->db->select("tbl_appointment_schedule.status,");
		  $this->db->from('tbl_appointment_schedule');
		 
          $query= $this->db->get();
		  return $query->row();
     }
      function chkDateInSlot($date)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		
		 $this->db->where('tbl_time_slot.clinic_id', $clinic_id); 
		 $this->db->where('tbl_time_slot.slot_date', $date); 		 
		  $this->db->select("tbl_time_slot.*,");
		  $this->db->from('tbl_time_slot');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function chkSlotById($slot_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		
		 $this->db->where('tbl_time_slot.clinic_id', $clinic_id); 
		 $this->db->where('tbl_time_slot.slot_id', $slot_id); 		 
		  $this->db->select("tbl_time_slot.*,");
		  $this->db->from('tbl_time_slot');
		 
          $query= $this->db->get();
		  return $query->row();
     }
      function getScheduleByDateForSlot($date)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		$clinic_id=$this->session->userdata('clinic_id');
 		
		 $this->db->where('tbl_appointment_schedule.clinic_id', $clinic_id); 
		 $this->db->where('tbl_appointment_schedule.appointment_date', $date); 		 
		  $this->db->select("tbl_appointment_schedule.*,");
		  $this->db->from('tbl_appointment_schedule');
		 
          $query= $this->db->get();
		  return $query->result();
     }
     function get_appointment_list()
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $uid=$this->session->userdata('clinic_id');
 		  date_default_timezone_set('Asia/Kolkata');
		 $tim=date("Y-m-d");

		  $this->db->where('tbl_new_appointment.ap_status',"schedule"); 
		  $this->db->where('tbl_new_appointment.clinic_id', $uid);
		  $this->db->where('tbl_new_appointment.appointment_date', $tim);
		 
		  $this->db->select(
		  						"tbl_new_appointment.*,
		  						tbl_patient_master.first_name,
		  						tbl_patient_master.middle_name,
		  						tbl_patient_master.last_name,
		  						tbl_patient_master.p_mobile,
		  					");
		  $this->db->from('tbl_new_appointment');
		 $this->db->join('tbl_patient_master','tbl_patient_master.patient_id=tbl_new_appointment.patient_id');
          $query= $this->db->get();
		  return $query->result();
     }
      function get_appointment_listByDate($tim)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $uid=$this->session->userdata('clinic_id');
 		 

		  $this->db->where('tbl_new_appointment.ap_status',"schedule"); 
		  $this->db->where('tbl_new_appointment.clinic_id', $uid);
		  $this->db->where('tbl_new_appointment.appointment_date', $tim);
		 
		  $this->db->select(
		  						"tbl_new_appointment.*,
		  						tbl_patient_master.first_name,
		  						tbl_patient_master.middle_name,
		  						tbl_patient_master.last_name,
		  						tbl_patient_master.p_mobile,
		  					");
		  $this->db->from('tbl_new_appointment');
		 $this->db->join('tbl_patient_master','tbl_patient_master.patient_id=tbl_new_appointment.patient_id');
          $query= $this->db->get();
		  return $query->result();
     }
     function get_appointment_by_id($ap_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $uid=$this->session->userdata('clinic_id');
 		  date_default_timezone_set('Asia/Kolkata');
		 $tim=date("Y-m-d");

		  $this->db->where('tbl_new_appointment.clinic_id', $uid);
		  $this->db->where('tbl_new_appointment.ap_id', $ap_id);
		 
		  $this->db->select(
		  						"tbl_new_appointment.*,
		  						
		  					");
		  $this->db->from('tbl_new_appointment');
          $query= $this->db->get();
		  return $query->row();
     }
     function get_appointment_by_patientid($ap_id)
 	{
		 //$conv_pwd= md5(trim($pwd));
 		  $uid=$this->session->userdata('clinic_id');
 		  date_default_timezone_set('Asia/Kolkata');
		 $tim=date("Y-m-d");

		  $this->db->where('tbl_new_appointment.clinic_id', $uid);
		  $this->db->where('tbl_new_appointment.patient_id', $ap_id);
		  $this->db->where('tbl_new_appointment.ap_status', "schedule");
		 
		  $this->db->select(
		  						"tbl_new_appointment.*,
		  						
		  					");
		  $this->db->from('tbl_new_appointment');
          $query= $this->db->get();
		  return $query->row();
     }
}
?>