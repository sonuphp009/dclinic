<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generel_emr_controller extends CI_Controller 
{

	public function __construct()
	{
	
	 	 parent:: __construct();
	 	 $this->load->library('session');
	   	 $this->load->library('upload');
		 $this->load->helper('download');
		 $this->load->helper('file');
		 $this->load->model('Index_model','Inm');
		 $this->load->model('Emr_model','Emm');
		 $this->output->set_header("Access-Control-Allow-Origin:*");

	}
	public function index()
	{
		$this->load->view('general_emr');
	}
	public function emr2($patient_id,$opd_id)
	{
		$data['p_data']=$this->Inm->get_patientById($patient_id);
		$data['opd_data']=$this->Inm->get_opdById($opd_id);
		$this->load->view('patient_emr',$data);
	}
	public function show_prescription()
	{
		/*$data['p_data']=$this->Inm->get_patientById($patient_id);
		$data['opd_data']=$this->Inm->get_opdById($opd_id);*/
		$this->load->view('prescription_view');
	}
	public function show_prescription2($patient_id,$opd_id)
	{
		$data['p_data']=$this->Inm->get_patientById($patient_id);
		$data['opd_data']=$this->Inm->get_opdById($opd_id);
		$this->load->view('prescription_view',$data);
	}
	public function clinic_reports()
	{
		/*$data['p_data']=$this->Inm->get_patientById($patient_id);
		$data['opd_data']=$this->Inm->get_opdById($opd_id);*/
		$this->load->view('clinical_report');
	}
	public function clinic_reports2($patient_id,$opd_id)
	{
		$data['p_data']=$this->Inm->get_patientById($patient_id);
		$data['opd_data']=$this->Inm->get_opdById($opd_id);
		$this->load->view('clinical_report',$data);
	}
	public function logout_user()
	{
		//session_start();
		session_destroy();
		redirect('Welcome/index');
	}
	public function insert_fees()
	{
		$clinic_id=$this->session->userdata('clinic_id');
        $txt_fees = trim($this->input->post("txt_fees"));
        $data=array(

						
						'clinic_id'=>$clinic_id,
						'fees'=>$txt_fees,
						
					);

		         	$this->db->insert('tbl_fees_master',$data);
		 redirect('Welcome/fees_master');
    }
	public function getEmrUpdate()
	{
		$clinic_id=$this->session->userdata('clinic_id');
        $sel_emr_type = trim($this->input->post("sel_emr_type"));
        $data=array(

						
						'clinic_emr'=>$sel_emr_type,
					
						
					);
        			$this->db->where('tbl_clinic_master.clinic_id',$clinic_id);
		         	$this->db->update('tbl_clinic_master',$data);
		 
    }
    public function getdelFees()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');
    	$this->db->where('tbl_fees_master.id',$chf_id);
   		$this->db->delete('tbl_fees_master');
       		//$insid=$this->insert_id();
		
	}
	public function get_login()
	{
		
        $username = trim($this->input->post("userid"));
        $password = trim($this->input->post("password"));
       
       	$clinic_res = $this->Inm->get_clinic_by_user($username,$password);
       	

	 	//$nextdate=date('Y-m-d', strtotime("+12 months $clinic_res->reg_date"));

	 	
	 	if(isset($clinic_res))
	 	{

	 		$expiry_date=$clinic_res->expiry_date;

       		date_default_timezone_set('Asia/Kolkata');
		 	$tim=date("Y-m-d");

			 	if($clinic_res->expiry_date==$tim)
			 	{

			 		
			 		$cnt=$clinic_res->reg_count+1;
			 		$usernew="renew".$clinic_res->clinic_email.$cnt;
			 		$passnew="renew".$clinic_res->clinic_password.$cnt;
			 		
			 		$data=array(

								
								'clinic_email'=>$usernew,
								'clinic_password'=>$passnew,
								'reg_count'=>$cnt,
														

							);

		       		$this->db->where('clinic_id',$clinic_res->clinic_id);
		         	$this->db->update('tbl_clinic_master',$data);

		         	$data=array(

								
								'email'=>$usernew,
								'password'=>$passnew,
														

							);

		       		$this->db->where('clinic_reg_id',$clinic_res->clinic_id);
		         	$this->db->update('reg',$data);

			 		//require_once(APPPATH.'libraries/common.php');

			 		/*$config = Array(
					  'protocol' => 'smtp',
					  'smtp_host' => 'localhost',
					  'smtp_port' => 25,
					  'smtp_user' => 'vishal.thakare009@gmail.com', // change it to yours
					  'smtp_pass' => 'vishal9999', // change it to yours
					  'mailtype' => 'html',
					  'charset' => 'iso-8859-1',
					  'wordwrap' => TRUE
					);

			 		$message = '';
		        	$this->load->library('email', $config);

					$this->email->from('vishal.thakare009@gmail.com', 'Your Name');
					$this->email->to('sonu.thakare009@gamil.com');
					
					$this->email->subject('Login Detail');
					$this->email->message('Clinic Name : '.$clinic_res->clinic_name.'<br/>
											Username  : '.$usernew.'<br/>
											Password  : '.$passnew.'<br/>');


					
					if($this->email->send())
				     {*/
				      echo "mail_msg";
				    /* }
				     else
				    {
				     show_error($this->email->print_debugger());
				    }*/
					//echo ("Your Can't Login Anymore Please Renew Package Of Software To This Year Please");

			 	}
			 	else
			 	{


			 		$usr_result = $this->Inm->get_user($username,$password);
       				
			        if(isset($usr_result))
			        {
				        
				        	$sessiondata = array(
				        							  'clinic_id' => $usr_result->clinic_reg_id,
													  'uid' => $usr_result->rid,
													  'uemail' => $usr_result->email,
													  'uname' => $usr_result->name,
													  'user_role' => $usr_result->user_type,
													  
													  );
												 
												 $this->session->set_userdata($sessiondata);
												 $uname=$this->session->userdata('uname');
												$pass=$this->session->userdata('user_role');
												 //redirect('Welcome/index');
												/*$_SESSION['uname']=$username;
												$_SESSION['user_role']=$usr_result->user_type;
												 echo $usr_result->user_type;*/
						//	redirect 
						echo $usr_result->user_type;
						
					}
					else 
					{
						$usr_result = $this->Inm->get_user_patient($username,$password);
						if(isset($usr_result))
				        {
					        
					        	$sessiondata = array(
					        							  'clinic_id' => $usr_result->clinic_id,
														  'uid' => $usr_result->patient_id,
														  'uemail' => $usr_result->username,
														  'uname' => $usr_result->first_name.' '.$usr_result->last_name,
														  
														  
														  );
													 
													 $this->session->set_userdata($sessiondata);
													 
													 //redirect('Welcome/index');
													/*$_SESSION['uname']=$username;
													$_SESSION['user_role']=$usr_result->user_type;
													 echo $usr_result->user_type;*/
							//	redirect 
							echo "patient";
							
						}
						else
						{
			        	 	$error = "Your Login Name or Password is invalid";
						}
			      	}
			 	}
		}
	 	else
	 	{


	 				$usr_result = $this->Inm->get_user($username,$password);
       				
			        if(isset($usr_result))
			        {
				        
				        	$sessiondata = array(
				        							  'clinic_id' => $usr_result->clinic_reg_id,
													  'uid' => $usr_result->rid,
													  'uemail' => $usr_result->email,
													  'uname' => $usr_result->name,
													  'user_role' => $usr_result->user_type,
													  
													  );
												 
												 $this->session->set_userdata($sessiondata);
												 $uname=$this->session->userdata('uname');
												$pass=$this->session->userdata('user_role');
												 //redirect('Welcome/index');
												/*$_SESSION['uname']=$username;
												$_SESSION['user_role']=$usr_result->user_type;
												 echo $usr_result->user_type;*/
						//	redirect 
						echo $usr_result->user_type;
						
					}
					else 
					{
	        	 		$usr_result = $this->Inm->get_user_patient($username,$password);
						if(isset($usr_result))
				        {
					        
					        	$sessiondata = array(
					        							  'clinic_id' => $usr_result->clinic_id,
														  'uid' => $usr_result->patient_id,
														  'uemail' => $usr_result->username,
														  'uname' => $usr_result->first_name.' '.$usr_result->last_name,
														  
														  
														  );
													 
													 $this->session->set_userdata($sessiondata);
													 
													 //redirect('Welcome/index');
													/*$_SESSION['uname']=$username;
													$_SESSION['user_role']=$usr_result->user_type;
													 echo $usr_result->user_type;*/
							//	redirect 
							echo "patient";
							
						}
						else
						{
			        	 	$error = "Your Login Name or Password is invalid";
						}
			      	}
	 	}
        
       
	}
	public function insert_clinic()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $txt_clinic_id=trim($this->input->post('txt_clinic_id'));
	    $txt_clinic_reg_id=trim($this->input->post('txt_clinic_reg_id'));
	    $txt_clinic_name=trim($this->input->post('txt_clinic_name'));
        $txt_mobile_no=trim($this->input->post('txt_mobile_no'));
        $txt_reg_date=trim($this->input->post('txt_reg_date'));
        $sel_reg_status=trim($this->input->post('sel_reg_status'));
        $txt_email=trim($this->input->post('txt_email'));
        $txt_clinic_address=trim($this->input->post('txt_clinic_address'));
        $txt_clinic_password=trim($this->input->post('txt_clinic_password'));
        $txt_fle_logo=trim($this->input->post('txt_fle_logo'));


        $expiry_date=date('Y-m-d', strtotime("+12 months $clinic_res->txt_reg_date"));

        $fle_question="";
        if($txt_fle_logo!='')
        {
        	$fle_question=$txt_fle_logo;
        }
        else
        {
        	 $path = $_FILES['fle_logo']['name'];
						
			 	$ext = pathinfo($path,PATHINFO_EXTENSION);
				
				$target_dir = "asset/clinic_logo/";
				$fle_question = $target_dir.$path;
				move_uploaded_file($_FILES["fle_logo"]["tmp_name"], $fle_question); 
        }
       

		

       if($txt_clinic_id!="")
       {
       		
       		$data=array(

						'clinic_name'=>strtoupper($txt_clinic_name),
						'mobile_no'=>$txt_mobile_no,
						'reg_date'=>$txt_reg_date,
						'expiry_date'=>$expiry_date,
						'reg_status'=>$sel_reg_status,
						'clinic_email'=>$txt_email,
						'clinic_address'=>$txt_clinic_address,
						'clinic_password'=>$txt_clinic_password,
						'clinic_image'=>$fle_question,
						'clinic_active_status'=>'activated',						

					);

       		$this->db->where('clinic_id',$txt_clinic_id);
         	$this->db->update('tbl_clinic_master',$data);


         	$data3=array(

	         			'name'=>strtoupper($txt_clinic_name),
						'email'=>$txt_email,
						'mobileno'=>$txt_mobile_no,
						'password'=>$txt_clinic_password,
							
				);

			$this->db->where('rid',$txt_clinic_reg_id);
         	$this->db->update('reg',$data3);

       }
       else
       {
       		$data=array(

	         			'clinic_name'=>strtoupper($txt_clinic_name),
						'mobile_no'=>$txt_mobile_no,
						'reg_date'=>$txt_reg_date,
						'expiry_date'=>$expiry_date,

						'reg_status'=>$sel_reg_status,
						'clinic_email'=>$txt_email,
						'clinic_address'=>$txt_clinic_address,
						'clinic_password'=>$txt_clinic_password,
						'clinic_image'=>$fle_question,
						'clinic_active_status'=>'activated',	
						

				);


         	$this->db->insert('tbl_clinic_master',$data);
         	$insid= $this->db->insert_id();

         	$data3=array(

	         			'name'=>strtoupper($txt_clinic_name),
						'email'=>$txt_email,
						'mobileno'=>$txt_mobile_no,
						'password'=>$txt_clinic_password,
						'user_type'=>"admin",
						'clinic_reg_id'=>$insid,
							
				);


         	$this->db->insert('reg',$data3);
         	
       }
        	
		    redirect('Welcome/index2');
		//$this->load->view('profile/insert_contact_profile');
	}
	function getCheckClinicUser()
	{
		$txt_clinic_name = trim($_POST['txt_clinic_name']);
		$clinic_name=$txt_clinic_name;
        $usr_result = $this->Inm->getCheckClinicUserName($clinic_name);
        if($usr_result!="")
        {
        	echo $usr_result->clinic_name;
        }
        
	}
	public function getClinicEdit()
	{	
      $outputData='';	
     
	    $id=$_POST['id'];
	    $txt_clinic_name="";
	    $txt_clinic_reg_id="";
	    $txt_mobile_no="";
	    $txt_reg_date="";
	    $sel_reg_status="";
	    $txt_email="";
	    $txt_clinic_address="";
	    $txt_clinic_password="";
	    $simg="";
		$row=$this->Inm->get_clinic_by_id($id);
		if($row)
		{
			$txt_clinic_name=$row->clinic_name;
		    $txt_clinic_reg_id=$row->rid;
		    $txt_mobile_no=$row->mobile_no;
		    $txt_reg_date=$row->reg_date;
		    $sel_reg_status=$row->reg_status;
		    $txt_email=$row->clinic_email;
		    $txt_clinic_address=$row->clinic_address;
		    $txt_clinic_password=$row->clinic_password;
		    $simg=$row->clinic_image;
	    	
		}
		
		
		$arr= array($txt_clinic_name,$txt_clinic_reg_id,$txt_mobile_no,$txt_reg_date,$sel_reg_status,$txt_email,$txt_clinic_address,$txt_clinic_password,$simg);
		$outputData=implode('_|_',$arr);
	   
	     
	 
	  echo $outputData;
   }
   public function insert_patient_master()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_patient_middle_name=trim($this->input->post('txt_patient_middle_name'));
	    $txt_patient_last_name=trim($this->input->post('txt_patient_last_name'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));

        $txt_dob=trim($this->input->post('txt_dob'));
	    $txt_age=trim($this->input->post('txt_age'));
        $sel_bg=trim($this->input->post('sel_bg'));
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
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

		$cid="";

		$uid=$this->session->userdata('clinic_id');
		if ($uid) 
		{
			$cid=$uid;
		}
		else
		{
			$cid=2;
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
						'clinic_id'=>$cid,
						'p_dob'=>$txt_dob,
						'p_age'=>$txt_age,
						'p_bg'=>$sel_bg,
						
				);


         	$this->db->insert('tbl_patient_master',$data);
         	$insid= $this->db->insert_id();

         	
         	$data=array(

                'name'=>$txt_patient_first_name.' '.$txt_patient_middle_name.' '.$txt_patient_last_name, 
	            'email'=>$txt_patient_first_name.'@1234',
	            'mobileno'=>$txt_patient_mobile,
	            'password'=>$txt_patient_mobile,
	            'user_type'=>"patient",
	            
	            'patient_id'=>$insid,
	            'profile_pic'=>$fle_option1
	        

	        );


	          $this->db->insert('reg',$data);
	          //$insid2= $this->db->insert_id();

         	redirect('Welcome/patient_registration/');
		    //redirect('Welcome/getUsername/'.$insid);
		//$this->load->view('profile/insert_contact_profile');
	}

	public function insert_patient_new_signup()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_patient_middle_name=trim($this->input->post('txt_patient_middle_name'));
	    $txt_patient_last_name=trim($this->input->post('txt_patient_last_name'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));

        $txt_dob=trim($this->input->post('txt_dob'));
	    $txt_age=trim($this->input->post('txt_age'));
        $sel_bg=trim($this->input->post('sel_bg'));
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
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

		$cid="";

		$uid=$this->session->userdata('clinic_id');
		if ($uid) 
		{
			$cid=$uid;
		}
		else
		{
			$cid=2;
		}

		date_default_timezone_set('Asia/Kolkata');
		$timeda=date("Y-m-d");			

       
       		$data=array(

	         			'first_name'=>$txt_patient_first_name, 
	         			'middle_name'=>$txt_patient_middle_name, 
						'last_name'=>$txt_patient_last_name,
						'username'=>$txt_patient_first_name.'@1234',
						'p_mobile'=>$txt_patient_mobile,
						'p_address'=>$txt_patient_address,
						'profile_pic'=>$fle_option1,
						'reg_date'=>$timeda,
						'check_status'=>"check_in",
						'clinic_id'=>$cid,
						'p_dob'=>$txt_dob,
						'p_age'=>$txt_age,
						'p_bg'=>$sel_bg,
						
				);


         	$this->db->insert('tbl_patient_master',$data);
         	$insid= $this->db->insert_id();

         	
         	/*$data=array(

                'name'=>$txt_patient_first_name.' '.$txt_patient_middle_name.' '.$txt_patient_last_name, 
	            'email'=>$txt_patient_first_name.'@1234',
	            'mobileno'=>$txt_patient_mobile,
	            'password'=>$txt_patient_mobile,
	            'user_type'=>"patient",
	            
	            'patient_id'=>$insid,
	            'profile_pic'=>$fle_option1
	        

	        );


	          $this->db->insert('reg',$data);
	          $user=(explode(" ",$fullname));
*/
	          $username = $txt_patient_first_name.'@1234';
	          $password = $txt_patient_mobile;
	          $usr_result = $this->Inm->get_user_patient($username,$password);
	        
	        
	          if($usr_result!="")
	          {
	            $sessiondata = array(
	                        'uid' => $usr_result->patient_id,
	                        'uemail' => $usr_result->username,
	                        'uname' => $usr_result->txt_patient_first_name.' '.$usr_result->txt_patient_middle_name.' '.$usr_result->txt_patient_last_name,
	                        
	                        );
	                     
	                     $this->session->set_userdata($sessiondata);
	                     /*$uname=$this->session->userdata('uname');
	                     $pass=$this->session->userdata('user_role');*/
	           }
	          //$insid2= $this->db->insert_id();

         	redirect('Welcome/patient_dashboard/');
		    //redirect('Welcome/getUsername/'.$insid);
		//$this->load->view('profile/insert_contact_profile');
	}
	public function getCheckout()
	{
		$pid=$_POST['pid'];
		$opd_id=$_POST['opd_id'];
		$sel_fees=$_POST['sel_fees'];

		$data=array(
	         			'check_status'=>"check_out", 
				);

			$this->db->where('tbl_patient_master.patient_id',$pid);
         	$this->db->update('tbl_patient_master',$data);

        $data2=array(
	         			'fees'=>$sel_fees, 
				);

			$this->db->where('tbl_opd_master.opd_id',$opd_id);
         	$this->db->update('tbl_opd_master',$data2);
	}
	public function getUpdatege()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');
	    $txt_ge_value=$this->input->post('txt_ge_value');

	    $data2=array(
	         			'ge_value'=>$txt_ge_value, 
				);
	    $this->db->where('tbl_general_examination_details.ge_detail_id',$chf_id);
         	$this->db->update('tbl_general_examination_details',$data2);
	    	

		
	}
	public function getCheckinPatient()
	{
		$output="";

		$res=$this->Inm->get_patient_list();

            if($res!="")
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
		                              <button class="btn btn-xs btn-primary" onclick="getPatientCheckout('.$row->patient_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>Check Out</button>
		                              / 
                                       <button class="btn btn-xs btn-success" onclick="getPatientEmr('.$row->patient_id.','.$count.','.$row->opd_id.')">EMR</button>
                                       / 
                                       <button class="btn btn-xs btn-info" onclick="getPatientPrescription('.$row->patient_id.','.$count.','.$row->opd_id.')">Prescription</button>
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
                  
             }
        echo $output;
	}
	public function save_prescription()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_patient_middle_name=trim($this->input->post('txt_patient_middle_name'));
	    $txt_patient_last_name=trim($this->input->post('txt_patient_last_name'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
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

		
		$uid=$this->session->userdata('clinic_id');
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
						
				);


         	$this->db->insert('tbl_patient_master',$data);
         	$insid= $this->db->insert_id();

         	
         	redirect('Welcome/patient_registration/');
		    //redirect('Welcome/getUsername/'.$insid);
		//$this->load->view('profile/insert_contact_profile');
	}
	public function getOpdRegSave()
	{
	    $clinic_id=$this->session->userdata('clinic_id');
	    $pid=trim($this->input->post('pid'));
	    //$sel_fees=trim($this->input->post('sel_fees'));
	    

		date_default_timezone_set('Asia/Kolkata');
		$timeda=date("Y-m-d");			

       
       		$data=array(

	         			'opd_date'=>$timeda, 
	         			'patient_id'=>$pid, 
						'clinic_id'=>$clinic_id,
						'opd_status'=>1,
						//'fees'=>$sel_fees,
						
				);


         	$this->db->insert('tbl_opd_master',$data);
         	$insid= $this->db->insert_id();

         	$data2=array(

	         			'opd_status'=>1, 
	         			'clinic_id'=>$clinic_id, 
						'opd_id'=>$insid,
						'check_status'=>"check_in",
						
				);

         	$this->db->where('tbl_patient_master.patient_id',$pid);
         	$this->db->update('tbl_patient_master',$data2);
         	
         	
         	echo $insid;

		    //redirect('Welcome/getUsername/'.$insid);
		//$this->load->view('profile/insert_contact_profile');
	}
	public function getOpdRegSaveApp()
	{
	    $clinic_id=$this->session->userdata('clinic_id');
	    $pid=trim($this->input->post('pid'));
	    $ap_id=trim($this->input->post('ap_id'));
	    //$sel_fees=trim($this->input->post('sel_fees'));
	    

		date_default_timezone_set('Asia/Kolkata');
		$timeda=date("Y-m-d");			

       
       		$data=array(

	         			'opd_date'=>$timeda, 
	         			'patient_id'=>$pid, 
						'clinic_id'=>$clinic_id,
						'opd_status'=>1,
						//'fees'=>$sel_fees,
						
				);


         	$this->db->insert('tbl_opd_master',$data);
         	$insid= $this->db->insert_id();

         	$data2=array(

	         			'opd_status'=>1, 
	         			'clinic_id'=>$clinic_id, 
						'opd_id'=>$insid,
						'check_status'=>"check_in",
						
				);

         	$this->db->where('tbl_patient_master.patient_id',$pid);
         	$this->db->update('tbl_patient_master',$data2);


         	$data2=array(

	         			
						'ap_status'=>"done",
						
				);

         	$this->db->where('tbl_new_appointment.ap_id',$ap_id);
         	$this->db->update('tbl_new_appointment',$data2);
         	
         	
         	echo $insid;

		    //redirect('Welcome/getUsername/'.$insid);
		//$this->load->view('profile/insert_contact_profile');
	}
	public function chief_complaints_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_chief_complaint=$this->input->post('txt_chief_complaint');
	   
		
       		$data2=array(

	         			'complaint'=>$txt_chief_complaint, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_chief_complaints',$data2);
	}
	public function past_history_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_past_history=$this->input->post('txt_past_history');
	   
		
       		$data2=array(

	         			'past_history'=>$txt_past_history, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_past_history',$data2);
	}
	public function personal_history_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_personal_history=$this->input->post('txt_personal_history');
	   
		
       		$data2=array(

	         			'personal_history'=>$txt_personal_history, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_personal_history',$data2);
	}
	public function general_examination_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_general_examination=$this->input->post('txt_general_examination');
	   
		
       		$data2=array(

	         			'general_examination'=>$txt_general_examination, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_general_examination',$data2);
	}
	public function systemic_examination_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_systemic_examination=$this->input->post('txt_systemic_examination');
	   
		
       		$data2=array(

	         			'systemic_examination'=>$txt_systemic_examination, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_systemic_examination',$data2);
	}
	public function old_report_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_old_report=$this->input->post('txt_old_report');
	   $output="";
       		$data2=array(

	         			'old_report'=>$txt_old_report, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_old_report',$data2);

       		$res=$this->Inm->get_or_list();

              if($res!="")
              {
                $count=1;
                	$output.='<option value="">- Select Old Report -</option>';
                    foreach ($res as $row) 
                    {
                        $output.='<option value="'.$row->old_report_id.'">'.$row->old_report.'</option>';

                    }
              }

              echo $output;
	}
	public function new_report_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_new_report=$this->input->post('txt_new_report');
		$output="";	   
		
       		$data2=array(

	         			'new_report'=>$txt_new_report, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_new_report',$data2);

       		$res=$this->Inm->get_nr_list();

              if($res!="")
              {
                $count=1;
                	$output.='<option value="">- Select New Report -</option>';
                    foreach ($res as $row) 
                    {
                        $output.='<option value="'.$row->new_report_id.'">'.$row->new_report.'</option>';

                    }
              }

              echo $output;
	}
	public function diagnosis_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_diagnosis=$this->input->post('txt_diagnosis');
	   
		
       		$data2=array(

	         			'diagnosis'=>$txt_diagnosis, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_diagnosis',$data2);
	}
	public function investigation_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_investigation=$this->input->post('txt_investigation');
	   
		
       		$data2=array(

	         			'investigation'=>$txt_investigation, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_investigation',$data2);
	}
	public function getAllChiefComplaints()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_chief_complaints_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->complaint.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_chf($opd_id,$row->chief_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientchf('.$count.','.$row->chief_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllCount()
	{
		$fees_count=0;

		$p_count="";
		$res_patient=$this->Inm->get_opd_feesall();
		$res_chkin=$this->Inm->get_opd_chkin();
		
		if(count($res_patient)>0)
		{
			foreach ($res_patient as $key) 
			{
				$fees_count+=$key->fees;
			}
		}


		$res_ap=$this->Mnm->get_appointment_list();

		
		$p_count=count($res_chkin);
		//$fees_count=count($fees_count);

		$ap_count=count($res_ap);

		echo $p_count.'/'.$fees_count.'/'.$ap_count;
       
	}
	public function getAllPastHistory()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_past_history_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->past_history.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_ps($opd_id,$row->past_history_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientps('.$count.','.$row->past_history_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllPersonalHistory()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_personal_history_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->personal_history.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_ph($opd_id,$row->per_history_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientph('.$count.','.$row->per_history_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllge()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_ge_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->general_examination.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_ge($opd_id,$row->gen_exam_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientge('.$count.','.$row->gen_exam_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllse()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_se_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->systemic_examination.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_se($opd_id,$row->syst_exam_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientse('.$count.','.$row->syst_exam_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllor()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_or_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                  	$count++;
                     $output.='<option value="'.$row->old_report_id.'">'.$row->old_report.'</option>';
		                          
                  }
                  
             }
        echo $output;
	}
	public function getAllnr()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_nr_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->new_report.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_nr($opd_id,$row->new_report_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientnr('.$count.','.$row->new_report_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAlldiagnosis()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_diagnosis_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->diagnosis.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_diagnosis($opd_id,$row->diagnosis_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientDiagnosis('.$count.','.$row->diagnosis_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllInvestigation()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_investigation_list();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->investigation.'</td>';
		                          $reschk=$this->Inm->get_patient_chk_investigation($opd_id,$row->investigation_id);
		                         
		                          if($reschk!="")
		                          {
		                          	$output.='<td> 
		                              
                                       		<i class="fa fa-check text-success"></i>
		                              </td>';
		                          }
		                          else
		                          {
		                          		$output.='<td> 
		                              
                                       <button class="btn btn-xs btn-success" onclick="getPatientInvestigation('.$count.','.$row->investigation_id.')">Add</button>
		                              </td>';
		                          }
		                              
		                          
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAddChiefComplaints()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $chf_id=$this->input->post('chf_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'chief_complaint_id'=>$chf_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_chief_complaints_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_chief_complaints_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->complaint.'</td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdelchf('.$row->chief_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAddps()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $ps_id=$this->input->post('ps_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'ps_id'=>$ps_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_past_history_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_ps_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->past_history.'</td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdelps('.$row->ps_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAddph()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $ph_id=$this->input->post('ph_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'ph_id'=>$ph_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_personal_history_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_ph_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->personal_history.'</td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdelph('.$row->ph_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAddge()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $ge_id=$this->input->post('ge_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'ge_id'=>$ge_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_general_examination_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_ge_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->general_examination.'</td>
		                           <td><input type="text" name="txt_ge_value'.$count.'" id="txt_ge_value'.$count.'" class="form-control" value="'.$row->ge_value.'" onblur="getGeUpdate('.$row->ge_detail_id.','.$count.')"></td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdelge('.$row->ge_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAddse()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $se_id=$this->input->post('se_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'se_id'=>$se_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_systemic_examination_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_se_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->systemic_examination.'</td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdelse('.$row->se_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function save_or_image_to_patient()//getAddor()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('txt_patient_id2');
	    $opd_id=$this->input->post('txt_opd_id2');
	    $or_id=$this->input->post('sel_or');
	    //$or_id=$this->input->post('fle_or');
	    
	    if(isset($patient_id))
	    {
			    $cpt = count($_FILES['fle_or']['name']);

			   
			    for($i=0; $i<$cpt; $i++)
		        {
		        	
					/*$_FILES['fle_or']['name']= $files['fle_or']['name'][$i];
					$_FILES['fle_or']['type']= $files['fle_or']['type'][$i];
					$_FILES['fle_or']['tmp_name']= $files['fle_or']['tmp_name'][$i];
					$_FILES['fle_or']['error']= $files['fle_or']['error'][$i];
					$_FILES['fle_or']['size']= $files['fle_or']['size'][$i];
					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload();
					$fileName = $_FILES['fle_or']['name'][$i];
					$images[] = $fileName;
					$path = $_FILES['fle_or']['name'];
					
					$t=time();

					$ext = pathinfo($path,PATHINFO_EXTENSION);

					$target_dir = "asset/old_reports/";
					$target_file = $target_dir.$fileName;
					$db_path = $target_file;
					move_uploaded_file($_FILES["fle_or"]["tmp_name"], $target_file);*/
					$path = $_FILES['fle_or']['name'][$i];
					
				 	$ext = pathinfo($path,PATHINFO_EXTENSION);
					
					$target_dir = "asset/old_reports/";
					$fle_option1 = $target_dir.$path;
					move_uploaded_file($_FILES["fle_or"]["tmp_name"][$i], $fle_option1); 

					
					    $data2=array(

					         			'patient_id'=>$patient_id, 
					         			'opd_id'=>$opd_id,
					         			'or_id'=>$or_id,
					         			'report_img'=>$fle_option1,
					         			'clinic_id'=>$clinic_id, 
								);
				       		$this->db->insert('tbl_old_report_details',$data2);
				       		//$insid=$this->insert_id();
				   
				 }
				
				redirect('Welcome/clinic_reports2/'.$patient_id.'/'.$opd_id);
		   }
		   else
		   {
		   		$data['err']='Please Select Patient First';
		   		$this->load->view('clinical_report',$data);
		   }     
	}
	public function save_nr_image_to_patient()//getAddor()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('txt_patient_id3');
	    $opd_id=$this->input->post('txt_opd_id3');
	    $nr_id=$this->input->post('sel_nr');
	    //$or_id=$this->input->post('fle_or');
	    
	    if(isset($patient_id))
	    {
			    $cpt = count($_FILES['fle_nr']['name']);

			   
			    for($i=0; $i<$cpt; $i++)
		        {
		        	
					/*$_FILES['fle_or']['name']= $files['fle_or']['name'][$i];
					$_FILES['fle_or']['type']= $files['fle_or']['type'][$i];
					$_FILES['fle_or']['tmp_name']= $files['fle_or']['tmp_name'][$i];
					$_FILES['fle_or']['error']= $files['fle_or']['error'][$i];
					$_FILES['fle_or']['size']= $files['fle_or']['size'][$i];
					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload();
					$fileName = $_FILES['fle_or']['name'][$i];
					$images[] = $fileName;
					$path = $_FILES['fle_or']['name'];
					
					$t=time();

					$ext = pathinfo($path,PATHINFO_EXTENSION);

					$target_dir = "asset/old_reports/";
					$target_file = $target_dir.$fileName;
					$db_path = $target_file;
					move_uploaded_file($_FILES["fle_or"]["tmp_name"], $target_file);*/
					$path = $_FILES['fle_nr']['name'][$i];
					
				 	$ext = pathinfo($path,PATHINFO_EXTENSION);
					
					$target_dir = "asset/old_reports/";
					$fle_option1 = $target_dir.$path;
					move_uploaded_file($_FILES["fle_nr"]["tmp_name"][$i], $fle_option1); 

					
					    $data2=array(

					         			'patient_id'=>$patient_id, 
					         			'opd_id'=>$opd_id,
					         			'nr_id'=>$nr_id,
					         			'report_img'=>$fle_option1,
					         			'clinic_id'=>$clinic_id, 
								);
				       		$this->db->insert('tbl_new_report_details',$data2);
				       		//$insid=$this->insert_id();
				   
				 }
				
				redirect('Welcome/clinic_reports2/'.$patient_id.'/'.$opd_id);
		   }
		   else
		   {
		   		$data['err']='Please Select Patient First';
		   		$this->load->view('clinical_report',$data);
		   }     
	}
	private function set_upload_options()
	{ 
		  // upload an image options
				 $config = array();
				 $config['upload_path'] = '.assets/hospital_logos/'; //give the path to upload the image in folder
				 $config['allowed_types'] = 'gif|jpg|png';
				  $config['max_size'] = '0';
				 $config['overwrite'] = FALSE;
		  return $config;
    }	
	public function getAddnr()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $nr_id=$this->input->post('nr_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'nr_id'=>$nr_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_new_report_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_nr_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->new_report.'</td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdelnr('.$row->nr_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAdddiagnosis()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $diagnosis_id=$this->input->post('diagnosis_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'diagnosis_id'=>$diagnosis_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_diagnosis_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_diagnosis_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->diagnosis.'</td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdeldiagnosis('.$row->diagnosis_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAddinvestigation()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $investigation_id=$this->input->post('investigation_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'investigation_id'=>$investigation_id,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_investigation_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_investigation_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->investigation.'</td>';
		                          
		                         
		                          		$output.='<td> 
		                              <a href="#" onclick="getdelinvestigation('.$row->investigation_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function chieftoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_chief_complaints_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->complaint.'</td>';
		                         
                          		$output.='<td> 
                              <a href="#" onclick="getdelchf('.$row->chief_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                              </td>';
                          
                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function pstoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_ps_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->past_history.'</td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdelps('.$row->ps_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function phtoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_ph_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->personal_history.'</td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdelph('.$row->ph_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_ge_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                  	$count++;
                     $output.='<tr class="text-success">
		                          <td>'.$row->general_examination.'</td>
		                          <td><input type="text" name="txt_ge_value'.$count.'" id="txt_ge_value'.$count.'" class="form-control" value="'.$row->ge_value.'" onblur="getGeUpdate('.$row->ge_detail_id.','.$count.')"></td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdelge('.$row->ge_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function setoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_se_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->systemic_examination.'</td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdelse('.$row->se_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function ortoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_or_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->old_report.'</td>
		                          <td>
		                          <a href="'.base_url().$row->report_img.'" target="_blank">
		                          <img src="'.base_url().$row->report_img.'" class="img-rounded" height="70px" width="70px" >
		                          </a>
		                          </td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdelor('.$row->or_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function nrtoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_nr_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->new_report.'</td>
		                          <td>
		                          <a href="'.base_url().$row->report_img.'" target="_blank">
		                          <img src="'.base_url().$row->report_img.'" class="img-rounded" height="70px" width="70px" >
		                          </a></td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdelnr('.$row->nr_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function diagnosistoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_diagnosis_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->diagnosis.'</td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdeldiagnosis('.$row->diagnosis_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function investigationtoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_investigation_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->investigation.'</td>';
		                          
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdelinvestigation('.$row->investigation_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	
	public function getDelChiefComplaints()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_chief_complaints_details.chief_detail_id',$chf_id);
       		$this->db->delete('tbl_chief_complaints_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdps()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_past_history_details.ps_detail_id',$chf_id);
       		$this->db->delete('tbl_past_history_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdph()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_personal_history_details.ph_detail_id',$chf_id);
       		$this->db->delete('tbl_personal_history_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdge()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_general_examination_details.ge_detail_id',$chf_id);
       		$this->db->delete('tbl_general_examination_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdse()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_systemic_examination_details.se_detail_id',$chf_id);
       		$this->db->delete('tbl_systemic_examination_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdor()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_old_report_details.or_detail_id',$chf_id);
       		$this->db->delete('tbl_old_report_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdnr()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_new_report_details.nr_detail_id',$chf_id);
       		$this->db->delete('tbl_new_report_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladddiagnosis()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_diagnosis_details.diagnosis_detail_id',$chf_id);
       		$this->db->delete('tbl_diagnosis_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdinvestigation()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_investigation_details.investigation_detail_id',$chf_id);
       		$this->db->delete('tbl_investigation_details');
       		//$insid=$this->insert_id();

		
	}
	public function PatientSearch()
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
		                          <td>'.$row->p_mobile.'</td>';
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
		                          
                  		$output.='<td><button class="btn btn-xs btn-warning" onclick="getOpdRegisteration('.$row->patient_id.','.$count.')"><i id="imgload_gt'.$count.'" style="display: none;" class="fa fa-spinner fa-spin"></i>Generate OPD </button> 
		                              </td>';
		                         
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function insert_usermaster_stud()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $reg_id=trim($this->input->post('reg_id'));
	    $fullname=trim($this->input->post('fullname'));
        $email=trim($this->input->post('email'));
        $mobile_number=trim($this->input->post('mobile_number'));
        $pass=trim($this->input->post('pass'));
        //$sel_usertype=trim($this->input->post('sel_usertype'));
        $txt_pic=trim($this->input->post('txt_pic'));
        $path = $_FILES['profile_pic']['name'];
						
	 	$ext = pathinfo($path,PATHINFO_EXTENSION);
		
		$target_dir = "asset/profile_photo/";
		$fle_question = $target_dir.$path;
		move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $fle_question); 

		$stype="";

		$pic_photo="";
		if(isset($_FILES['profile_pic']['name']))
		{
			$pic_photo=$fle_question;
			
		}
		else
		{
			$pic_photo="asset/profile_photo/".$txt_pic;
		}

		if($sel_usertype=="student")
		{
			$stype="student";
		}
		else if($sel_usertype=="demo")
		{
			$stype="demo";
		}
		else
		{
			$stype="";
		}
        

       if($reg_id>0)
       {
       		
       		$data=array(

	         			'name'=>$fullname, 
						'email'=>$email,
						'mobileno'=>$mobile_number,
						'password'=>$pass,
						'user_type'=>"patient",
						
						
						'profile_pic'=>$pic_photo

						
						

				);

       		$this->db->where('rid',$reg_id);
         	$this->db->update('reg',$data);
       }
       else
       {

       		$data=array(

	         			'name'=>$fullname, 
						'email'=>$email,
						'mobileno'=>$mobile_number,
						'password'=>$pass,
						'user_type'=>"patient",
						
						
						'profile_pic'=>$pic_photo
				

				);


         	$this->db->insert('reg',$data);
         	$insid= $this->db->insert_id();
         	

         	$user=(explode(" ",$fullname));

         	$username = $email;
        	$password = $pass;
        	$usr_result = $this->Inm->get_user($username,$password);
        
        
	        if($usr_result!="")
	        {
	        	$sessiondata = array(
											  'uid' => $usr_result->rid,
											  'uemail' => $usr_result->email,
											  'uname' => $usr_result->name,
											  'user_role' => $usr_result->user_type,
											  
											  );
										 
										 $this->session->set_userdata($sessiondata);
										 $uname=$this->session->userdata('uname');
										 $pass=$this->session->userdata('user_role');

	         	//$this->session->set_userdata($sessiondata);
				 //$OID=$this->session->userdata($sessiondata);
				redirect('Welcome/patient_index');
         	}
       }
        	
    		
		//$this->load->view('profile/insert_contact_profile');
	}
	public function chkPatientName()
	{
		$txt_patient_first_name=$_POST['txt_patient_first_name'];
		$txt_patient_middle_name=$_POST['txt_patient_middle_name'];
		$txt_patient_last_name=$_POST['txt_patient_last_name'];
		$txt_patient_mobile=$_POST['txt_patient_mobile'];

         	
        	$usr_result = $this->Inm->get_chk_patient($txt_patient_first_name,$txt_patient_middle_name,$txt_patient_last_name,$txt_patient_mobile);
        //print_r($txt_patient_first_name.','.$txt_patient_middle_name.','.$txt_patient_last_name);
        	//exit;
        	
	        if($usr_result!="")
	        {
	        	echo "chk";
         	}
         	else
         	{
         		echo "";
         	}
	}
}
?>