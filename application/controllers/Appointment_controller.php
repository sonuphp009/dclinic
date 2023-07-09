<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_controller extends CI_Controller 
{

	public function __construct()
	{
	
	 	 parent:: __construct();
	 	 $this->load->library('session');
	   	 $this->load->library('upload');
		 $this->load->helper('download');
		 $this->load->helper('file');
		 $this->load->model('Index_model','Inm');
		 $this->load->model('Medicine_model','Mnm');
		 $this->output->set_header("Access-Control-Allow-Origin:*");

	}
	public function index()
	{
		$this->load->view('appointment_master');
	}
	public function new_appointment()
	{
		$this->load->view('new_appointment');
	}
	public function insert_schedule()
	{

		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_frm_date=trim($this->input->post('txt_frm_date'));
	    $txt_to_date=$this->input->post('txt_to_date');
	    $output="";
		
		$this->getDatesFromRange($txt_frm_date,$txt_to_date);

		
       	/*if($txt_medicine_id>0)
       	{
       		$data=array(
						'medicine_name'=>trim($this->input->post('txt_medicine_name')), 
						'qty'=>trim($this->input->post('txt_qty')), 
						'dose_id'=>trim($this->input->post('sel_dose_time')),
						'instruction_id'=>$insid,
						'clinic_id'=>$clinic_id,
						
					);
				 	
				  	$this->db->where('medicine_id',$txt_medicine_id) ;
				  	$this->db->update('tbl_master_medicine',$data) ;

				  	redirect('Medicine_controller/clinic_medicine');
       	}*/

		
	}
	function getDatesFromRange($start, $end, $format = 'Y-m-d') 
	{
		$clinic_id=$this->session->userdata('clinic_id');
      	 $txt_start_time=trim($this->input->post('txt_start_time'));
	    $txt_end_time=$this->input->post('txt_end_time');
	    $txt_time_slot=$this->input->post('txt_time_slot');
	    // Declare an empty array
	    $array = array();
	      
	    // Variable that store the date interval
	    // of period 1 day
	    $interval = new DateInterval('P1D');
	  
	    $realEnd = new DateTime($end);
	    $realEnd->add($interval);
	  
	    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
	  
	    // Use loop to store date into array
	    foreach($period as $date) {                 
	        $array[] = $date->format($format); 
	    }
	    $count=1;
	    // Return the array elements
	    foreach($array as $key)
	    {
	    	
	    	$timestamp = strtotime($key);

			$day = date('D', $timestamp);
			

	    	$data=array(
						'clinic_id'=>$clinic_id, 
						'appointment_date'=>$key, 
						'day'=>$day, 
						'start_time'=>$txt_start_time,
						'end_time'=>$txt_end_time,
						'time_slot'=>$txt_time_slot,
						'status'=>"Available",
						
					);
				 	
				  	//$this->db->where('medicine_id',$txt_medicine_id) ;
				  	$this->db->insert('tbl_appointment_schedule',$data) ;
				  	//$insid=$this->insert_id();
				  	  
				  		
				  				/*$booking_start_time          = $txt_start_time;			// The time of the first slot in 24 hour H:M format  
								 $booking_end_time            = $txt_end_time; 			// The time of the last slot in 24 hour H:M format  
								 $booking_frequency           = $txt_time_slot;   			// The slot frequency per hour, expressed in minutes.  	

								// Day Related Variables

								 $day_format					= 1;				// Day format of the table header.  Possible values (1, 2, 3)   
																							// 1 = Show First digit, eg: "M"
																							// 2 = Show First 3 letters, eg: "Mon"
																							// 3 = Full Day, eg: "Monday"
									
								 $day_closed					= array("Saturday", "Sunday"); 	// If you don't want any 'closed' days, remove the day so it becomes: = array();
								 $day_closed_text				= "CLOSED"; 		// If you don't want any any 'closed' remove the text so it becomes: = 

								 $slots=array();
								 $i="";
								 for($i = strtotime($booking_start_time); $i<= strtotime($booking_end_time); $i = $i + $booking_frequency * 60) 
								 {
											$slots[] = date("H:i:s", $i);  
								 }			
				
		
								foreach($slots as $i => $start) 
								{			

									// Calculate finish time
									$finish_time = strtotime($start) + $booking_frequency * 60; 
									$ends_time=date("H:i:s", $finish_time);

									$data_slot=array(
												'clinic_id'=>$clinic_id, 
												'slot_date'=>$key, 
												'start_time'=>$start, 
												'end_time'=>date("H:i:s", $finish_time), 
												'slot_status'=>"free",
												
											);
										 	
										  	//$this->db->where('medicine_id',$txt_medicine_id) ;
										  	$this->db->insert('tbl_time_slot',$data_slot) ;

										  	redirect('Appointment_controller/index');
								
									
								} // Close foreach	

								 */
										  	
				  		

				  			
				  	/*}*/
	    }
       		

				  	
       
	}
	public function updateAppStatus()
	{
		$sel_status=$_POST['sel_status'];
		$schedule_id=$_POST['schedule_id'];

		$data=array(
						
						'status'=>$sel_status,
						
					);
				 	
				  	$this->db->where('schedule_id',$schedule_id) ;
				  	$this->db->update('tbl_appointment_schedule',$data) ;

		$output="";
		                          
              $res=$this->Mnm->getSchedule();

              if($res!="")
              {
                $count=0;

                    foreach ($res as $row) 
                    {
                       $output.='<tr class="text-success">
                                <td>'.$count++.'</td>
                                <td>'.$row->appointment_date.'</td>
                                <td>'.$row->day.'</td>
                                <td>'.$row->start_time.'</td>
                                <td>'.$row->end_time.'</td>
                                <td>
                                <select name="sel_status'.$count.'" id="sel_status'.$count.'" class="form-control" onchange="getAvailableStatus('.$count.','.$row->schedule_id.')">
                                <option value="'.$row->status.'">'.$row->status.'</option>
                                <option value="">-Select -</option>
                				<option value="Available">Available</option>
                				<option value="Not Available">Not Available</option>
                                </select>
                                </td>
                                ';
                                
                            $output.='</tr>';
                    }
                    
               }
            echo $output;


	}
	public function chkSchedule()
	{
		$txt_ap_date=$_POST['txt_ap_date'];
		

		
		$output="";
		                          
              $res=$this->Mnm->getScheduleByDate($txt_ap_date);

              if(isset($res))
              {
               		echo $res->status;
               }
            


	}
	public function PatientSearchAppointment()
	{
		$first_name=$_POST['txt_first_name'];
		$txt_middle_name=$_POST['txt_middle_name'];
		$txt_last_name=$_POST['txt_last_name'];
		$txt_mobile_no=$_POST['txt_mobile_no'];
		$output="";
		$lsopd="";
		$lsfees="";

		$res=$this->Inm->get_patient_list_search($first_name,$txt_middle_name,$txt_last_name,$txt_mobile_no);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr>
		                          <td>'.$count++.'</td>
		                          <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
		                          <td>'.$row->p_mobile.'</td>
		                          <td> - 
		                          </td>';
		                $reslo=$this->Inm->getLastOPD($row->patient_id);
		                if(count($reslo)>0)
		                {
		                	foreach ($reslo as $value) 
		                	{
		                		$lsopd=$value->opd_date;
								$lsfees=$value->fees;
		                	}
		                }
		                $output.='<td>Last OPD  '.$lsopd.'<br/>Fees '.$lsfees.'</td>';
		                          
                  		/*$output.='<td><button id="btn_schedule'.$count.'" class="btn btn-info" onclick="saveFollowup('.$row->patient_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>Schedule Appointment </button> 
		                              </td>';*/
		                $output.='<td><button id="btn_schedule'.$count.'" class="btn btn-info" onclick="saveFollowup('.$row->patient_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>Select Patient </button> 
		                              </td>';
		                         
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function insert_followup_patient_date_appointment()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $uid=$this->session->userdata('clinic_id');
	    
        $txt_time=trim($this->input->post('txt_time'));
        $txt_ap_date=trim($this->input->post('txt_ap_date'));
        $txt_slot_id=trim($this->input->post('txt_slot_id'));
        
        $pid=trim($this->input->post('txt_patient_id'));
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
	    if($pid>0)
	    {
         		$data3=array(

						'clinic_id'=>$uid,
						'patient_id'=>$pid,
						'appointment_date'=>$txt_ap_date,
						'appointment_time'=>$txt_time,
						
						'ap_status'=>"schedule",						
				);


         	$this->db->insert('tbl_new_appointment',$data3);

         	$data3=array(

						
						'patient_id'=>$pid,
						
						'slot_status'=>"booked",						
				);

         	$this->db->where('tbl_time_slot.slot_id',$txt_slot_id);
         	$this->db->update('tbl_time_slot',$data3);

         	redirect('Appointment_controller/new_appointment/');
	    }
	}
	public function insert_new_patient_appointment()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $uid=$this->session->userdata('clinic_id');
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_patient_middle_name=trim($this->input->post('txt_patient_middle_name'));
	    $txt_patient_last_name=trim($this->input->post('txt_patient_last_name'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));

        $txt_dob=trim($this->input->post('txt_dob'));
	    $txt_age=trim($this->input->post('txt_age'));
        $sel_bg=trim($this->input->post('sel_bg'));
        $pid=trim($this->input->post('txt_pid'));
        $txt_slot_id=trim($this->input->post('txt_slot_id'));
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
	    if($pid>0)
	    {
         		$data4=array(

						'clinic_id'=>$uid,
						'patient_id'=>$pid,
						'appointment_date'=>$this->input->post('txt_frm_date'),
						'appointment_time'=>$this->input->post('txt_time'),
						'ap_status'=>"schedule",						
				);


         	$this->db->insert('tbl_new_appointment',$data4);

         	$data3=array(

						
						'patient_id'=>$pid,
						
						'slot_status'=>"booked",						
				);

         	$this->db->where('tbl_time_slot.slot_id',$txt_slot_id);
         	$this->db->update('tbl_time_slot',$data3);

         	redirect('Appointment_controller/new_appointment/');
	    }
	    else
	    {
	    	if($_FILES['fle_option1']['size'] == 0)
			{
			  		$fle_option1='';
			}
			else
			{	         
				$path = $_FILES['fle_option1']['name'];
				
			 	$ext = pathinfo($path,PATHINFO_EXTENSION);
				
				$target_dir = "asset/document1/";
				$fle_option1 = $target_dir.$path;
				move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

			}

		
		
		date_default_timezone_set('Asia/Kolkata');
		$timeda=date("Y-m-d");			

       
       		$data=array(

	         			'first_name'=>$txt_patient_first_name, 
	         			'middle_name'=>$txt_patient_middle_name, 
						'last_name'=>$txt_patient_last_name,
						'p_mobile'=>$txt_patient_mobile,
						'p_address'=>$txt_patient_address,
						'profile_pic'=>$fle_option1,
						'reg_date'=>$timeda,
						'check_status'=>"check_in",
						'clinic_id'=>$uid,
						'p_dob'=>$txt_dob,
						'p_age'=>$txt_age,
						'p_bg'=>$sel_bg,
						
				);


         	$this->db->insert('tbl_patient_master',$data);
         	$insid= $this->db->insert_id();

         	
         		$data2=array(

						'clinic_id'=>$uid,
						'patient_id'=>$insid,
						'appointment_date'=>$this->input->post('txt_frm_date'),
						'appointment_time'=>$this->input->post('txt_time'),
						'ap_status'=>"schedule",						
				);


         	$this->db->insert('tbl_new_appointment',$data2);

         	$data3=array(

						
						'patient_id'=>$insid,
						
						'slot_status'=>"booked",						
				);

         	$this->db->where('tbl_time_slot.slot_id',$txt_slot_id);
         	$this->db->update('tbl_time_slot',$data3);
         	
         	redirect('Appointment_controller/new_appointment/');
		   
	    }
		//$this->load->view('profile/insert_contact_profile');
	}
	public function insertFollowup()
	{
		$uid=$this->session->userdata('clinic_id');
		$pid=$_POST['pid'];
		$txt_ap_date=$_POST['txt_ap_date'];
		$txt_ap_time=$_POST['txt_ap_time'];

		$data=array(
						'clinic_id'=>$uid,
						'patient_id'=>$pid,
						'appointment_date'=>$txt_ap_date,
						'appointment_time'=>$txt_ap_time,
						'ap_status'=>"schedule",	
						
					);
				 	
		$this->db->insert('tbl_new_appointment',$data) ;
	}
	public function getFollowUp()
	{
		$uid=$this->session->userdata('clinic_id');
		$pid=$_POST['pid'];
		$p_first="";
		$p_middle="";
		$p_last="";
		$p_mobile="";
		$p_gender="";
		$p_address="";
		$p_bday="";
		$p_age="";
		$p_bldggrp="";
		$res=$this->Inm->get_patientById($pid);
		if($res!="")
		{
			$p_first=$res->first_name;
			$p_middle=$res->middle_name;
			$p_last=$res->last_name;
			$p_mobile=$res->p_mobile;
			$p_gender=$res->gender;
			$p_address=$res->p_address;
			$p_bday=$res->p_dob;
			$p_age=$res->p_age;
			$p_bldggrp=$res->p_bg;
		}

		$arr= array($pid,$p_first,$p_middle,$p_last,$p_mobile,$p_gender,$p_address,$p_bday,$p_age,$p_bldggrp);
		$outputData2=implode('_|_',$arr);
			echo $outputData2;

	}
	public function ChangeApStatus()
	{
		$uid=$this->session->userdata('clinic_id');
		$pid=$_POST['pid'];
		$res_ap=$this->Mnm->get_appointment_by_id($pid);
		
		if($res_ap!="")
		{
			$data2=array(
						
						'slot_status'=>"free",
						'patient_id'=>"",	
						
					);
			$this->db->where('tbl_time_slot.patient_id',$res_ap->patient_id) ;
			$this->db->where('tbl_time_slot.slot_date',$res_ap->appointment_date) ;		 	
			$this->db->update('tbl_time_slot',$data2) ;
		}
		
		$this->db->where('tbl_new_appointment.ap_id',$pid) ;		 	
		$this->db->delete('tbl_new_appointment') ;

		

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
			                
			                          
	                  		$output.='<td><button class="btn btn-danger" onclick="cancelAppointment('.$row->ap_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>  Cancel Appointment &nbsp;<i class="fa fa-times-circle"></i></button> 
			                              </td>';
			                         
			                          
			                      $output.='</tr>';
	                  }
	                  
	             }
	        echo $output;
	}

	public function getTimeSlotAll()
	{
		$txt_ap_date=$_POST['txt_ap_date'];
		$clinic_id=$this->session->userdata('clinic_id');
		$output="";

		$resChk=$this->Mnm->chkDateInSlot($txt_ap_date);
		$res=$this->Mnm->getScheduleByDateForSlot($txt_ap_date);

		if(count($resChk)>0)
		{
				
		}
		else
		{
			foreach($res as $row)
			{
			
				$booking_start_time          = $row->start_time;			// The time of the first slot in 24 hour H:M format  
				 $booking_end_time            = $row->end_time;		// The time of the last slot in 24 hour H:M format  
				 $booking_frequency           = $row->time_slot;   			// The slot frequency per hour, expressed in minutes.  	

				// Day Related Variables

				 $day_format					= 1;				// Day format of the table header.  Possible values (1, 2, 3)   
																			// 1 = Show First digit, eg: "M"
																			// 2 = Show First 3 letters, eg: "Mon"
																			// 3 = Full Day, eg: "Monday"
					
				 $day_closed					= array("Saturday", "Sunday"); 	// If you don't want any 'closed' days, remove the day so it becomes: = array();
				 $day_closed_text				= "CLOSED"; 		// If you don't want any any 'closed' remove the text so it becomes: = 

				 $slots=array();
				 
				 for($i = strtotime($booking_start_time); $i<= strtotime($booking_end_time); $i = $i + $booking_frequency * 60) 
				 {
							$slots[] = date("H:i:s", $i);  

				 }			

				 foreach($slots as $i => $start) 
					{			

						// Calculate finish time
						$finish_time = strtotime($start) + $booking_frequency * 60; 
						$ends_time=date("H:i:s", $finish_time);

						$data_slot=array(
									'clinic_id'=>$clinic_id, 
									'slot_date'=>$txt_ap_date, 
									'start_time'=>$start, 
									'end_time'=>date("H:i:s", $finish_time), 
									'slot_status'=>"free",
									
								);
							 	
							  	//$this->db->where('medicine_id',$txt_medicine_id) ;
							  	$this->db->insert('tbl_time_slot',$data_slot) ;

							  	//redirect('Appointment_controller/index');
					
						
					} // Close foreach	
				
			}
		}


		
		//redirect('Appointment_controller/index');
	}
	public function getTimeSlotAllTable()
	{
		$txt_ap_date=$_POST['txt_ap_date'];
		$clinic_id=$this->session->userdata('clinic_id');
		$output="";

		$resChk=$this->Mnm->chkDateInSlot($txt_ap_date);

		foreach ($resChk as $key) 
		{
			$output.='<tr>
						<td style="text-align:center;">'.$key->start_time.'</td>
						<td style="text-align:center;">'.$key->end_time.'</td>
						<td style="text-align:center;">';
						if($key->slot_status=="free")
						{
							$output.='<button type="button" class="btn btn-xs btn-success" onclick="updateSlot('.$key->slot_id.')">Selct Slot</button>';
						}
						else
						{
							$output.='<p class="text-success">Booked</p>';
						}
			$output.='</td>
					</tr>';
		}
		echo $output;

	}
	public function getUpdateSlot()
	{
		$slot_id=$_POST['slot_id'];
		$clinic_id=$this->session->userdata('clinic_id');
		$output="";

		$resChk=$this->Mnm->chkSlotById($slot_id);

		
		echo $resChk->start_time." - ".$resChk->end_time;

	}
	public function getApSearch()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $uid=$this->session->userdata('clinic_id');
	    $txt_ap_date_search=trim($this->input->post('txt_ap_date_search'));
	    //$txt_patient_middle_name=trim($this->input->post('txt_patient_middle_name'));

	    $output="";
          			$res=$this->Mnm->get_appointment_listByDate($txt_ap_date_search);

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
				                
				                          
		                  		$output.='<td><button class="btn btn-danger" onclick="cancelAppointment('.$row->ap_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>  Cancel Appointment &nbsp;<i class="fa fa-times-circle"></i></button> 
				                              </td>';
				                         
				                          
				                      $output.='</tr>';
		                  }
		                  
		             }
		        echo $output;

	}

}
?>