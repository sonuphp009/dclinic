<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function clinic_login()
	{
		$this->load->view('login');
	}
	public function clinic_setting()
	{
		$this->load->view('clinic_setting');
	}
	public function clinic_site()
	{
		$this->load->view('clinic_site/clinic_home');
	}
	public function general_emr()
	{
		$this->load->view('general_emr');
	}
	public function user_dashboard()
	{
		$this->load->view('user_dashboard');
	}
	public function index()
	{
		redirect('Welcome/clinic_site');
	}
	public function time_slot()
	{
		$this->load->view('timeslot');
	}
	public function medicine_master()
	{
		$this->load->view('medicine_master');
	}
	public function index2()
	{
		
		$this->load->view('admin_index');
	}
	public function patient_message()
	{
		
		$this->load->view('patient_message');
	}
	public function contact_list()
	{
		$this->load->view('contact_form');
	}
	public function patient_registration()
	{
		$this->load->view('patient_register');
	}
	public function patient_appointment()
	{
		$this->load->view('patient_appointment');
	}
	public function patient_prescription()
	{
		$this->load->view('patient_prescription');
	}
	public function patient_history_app()
	{
		$this->load->view('patient_history_app');
	}
	public function fees_master()
	{
		$this->load->view('fees_master');
	}
	public function patient_list()
	{
		$this->load->view('followup');
	}
	public function getBackup()
	{
		error_reporting(1);
		$this->load->helper('file');
		$this->load->dbutil();

        $prefs = array(     
            'format'      => 'zip',             
            'filename'    => 'dhanvantari_clinic.sql'
            );
        
        
        $backup =& $this->dbutil->backup($prefs); 
        
        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'D:/dhanvantari_clinic/'.$db_name;
        
        
        write_file($save, $backup); 
        
        echo '<script>alert("Backup Successfully Done.");
        window.location = "'.base_url().'index.php/Welcome/index2";
        </script>';
        
        //$this->load->helper('download');
        //force_download($db_name, $backup);


       /* ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		$database = 'dhanvantari_clinic';
		$user = 'root';
		$pass = '';
		$host = 'localhost';
		$dir = dirname('D;/') . '/dhanvantari_clinic.sql';

		echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";

		exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);

		var_dump($output);*/
					
			//redirect('Welcome/index2');

        	
	}
	function restore_data()
    {
       $isi_file = file_get_contents(FCPATH.'db/dhanvantari_clinic.sql');
        $queries = explode(";", rtrim( $isi_file, "\n;" ));
        foreach($queries as $query)
        {
            $this->db->query($query);
        }
    }
	public function patient_dashboard()
	{

		$uid=$this->session->userdata('uid');
		$clinic_id=$this->session->userdata('clinic_id');
		
		if(isset($uid))
		{
			$res=$this->Inm->get_patientById($uid);
			$res2=$this->Inm->get_clinic_by_id($clinic_id);
			$data['r']=$res;
			$data['c']=$res2;
			$this->load->view('patient_dashboard',$data);
		}
		else
		{
			redirect('Welcome/index');
		}
	}
	public function hospital_registration()
	{
		$this->load->view('hospital_register');
	}
	public function clinic_user()
	{
		$this->load->view('user_master');
	}
	
	public function schedule_appointment()
	{
		$this->load->view('appointment_master');  
	}
	public function emr()
	{
		$clinic_id=$this->session->userdata('clinic_id');

		$res=$this->Inm->get_clinic_by_id($clinic_id);
		if($res->clinic_emr=="Generel EMR")
		{
			$this->load->view('general_emr');
		}
		else
		{
			$this->load->view('patient_emr');
		}
		
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
		$clinic_id=$this->session->userdata('clinic_id');
		$uid=$this->session->userdata('uid');

		if($uid)
		{
			$data=array(

						
						'live_status'=>"offline",
						
						
					);
			$this->db->where('tbl_patient_master.patient_id',$uid);
		    $this->db->update('tbl_patient_master',$data);

		    session_destroy();
			redirect('Welcome/index');
		}
		else
		{
			$data=array(

						
						'live_status'=>"offline",
						
						
					);
			$this->db->where('reg.clinic_reg_id',$clinic_id);
		    $this->db->update('reg',$data);

		    session_destroy();
			redirect('Welcome/index');
		}
		echo "<script>window.close();</script>";
		
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

		         	$data2=array(

								
								'email'=>$usernew,
								'password'=>$passnew,
														

							);

		       		$this->db->where('clinic_reg_id',$clinic_res->clinic_id);
		         	$this->db->update('reg',$data2);

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
													  
													  'uemail' => $usr_result->email,
													  'uname' => $usr_result->name,
													  'user_role' => $usr_result->user_type,
													  'live_status' => $usr_result->live_status,
													  
													  );
												 
												 $this->session->set_userdata($sessiondata);
												 $uname=$this->session->userdata('uname');
												$pass=$this->session->userdata('user_role');
												 //redirect('Welcome/index');
												/*$_SESSION['uname']=$username;
												$_SESSION['user_role']=$usr_result->user_type;
												 echo $usr_result->user_type;*/
						//	redirect 

						$data2=array(

								
								'live_status'=>"online",
								
							);

		       		$this->db->where('clinic_reg_id',$clinic_res->clinic_id);
		         	$this->db->update('reg',$data2);

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
														  'live_status' => $usr_result->live_status,
														  
														  
														  );
													 
													 $this->session->set_userdata($sessiondata);
													 
													 //redirect('Welcome/index');
													/*$_SESSION['uname']=$username;
													$_SESSION['user_role']=$usr_result->user_type;
													 echo $usr_result->user_type;*/

								$data2=array(

								
												'live_status'=>"online",
												
											);

						       		$this->db->where('patient_id',$usr_result->patient_id);
						         	$this->db->update('tbl_patient_master',$data2);
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
													  
													  'uemail' => $usr_result->email,
													  'uname' => $usr_result->name,
													  'user_role' => $usr_result->user_type,
													  'live_status' => $usr_result->live_status,
													  
													  );
												 
												 $this->session->set_userdata($sessiondata);
												 $uname=$this->session->userdata('uname');
												$pass=$this->session->userdata('user_role');
												 //redirect('Welcome/index');
												/*$_SESSION['uname']=$username;
												$_SESSION['user_role']=$usr_result->user_type;
												 echo $usr_result->user_type;*/

							$data2=array(

								
												'live_status'=>"online",
												
											);

						       		$this->db->where('clinic_reg_id',$usr_result->clinic_reg_id);
						         	$this->db->update('reg',$data2);
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
														  'live_status' => $usr_result->live_status,
														  
														  
														  );
													 
													 $this->session->set_userdata($sessiondata);
													 
													 //redirect('Welcome/index');
													/*$_SESSION['uname']=$username;
													$_SESSION['user_role']=$usr_result->user_type;
													 echo $usr_result->user_type;*/


								$data2=array(

								
												'live_status'=>"online",
												
											);

						       		$this->db->where('patient_id',$usr_result->patient_id);
						         	$this->db->update('tbl_patient_master',$data2);
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
        $sel_gender=trim($this->input->post('sel_gender'));
        
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
			
			$target_dir = "asset/user_pic/";
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
						'gender'=>$sel_gender,
						
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
        $txt_clinic_id=trim($this->input->post('txt_clinic_id'));
        
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
			
			$target_dir = "asset/user_pic/";
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
			$cid=5;
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
	public function insert_user_signup()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $reg_id=trim($this->input->post('reg_id'));
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_email=trim($this->input->post('txt_email'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));
        $sel_user_type=trim($this->input->post('sel_user_type'));

	    $txt_password=trim($this->input->post('txt_password'));
        $txt_clinic_id=trim($this->input->post('txt_clinic_id'));
        $txt_pic=trim($this->input->post('txt_pic'));
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
	    if($reg_id>0)
	    {
	    			if($_FILES['fle_option1']['size'] == 0)
					{
					  		$fle_option1=$txt_pic;
					}
					else
					{	         
						$path = $_FILES['fle_option1']['name'];
						
					 	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
						$target_dir = "asset/user_pic/";
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
						$cid=5;
					}
					$res2=$this->Inm->get_clinic_by_id($cid);
					date_default_timezone_set('Asia/Kolkata');
					$timeda=date("Y-m-d");			

			       
			       		$data3=array(

				         			'name'=>$txt_patient_first_name,
				         			'profile_pic'=>$fle_option1,
									'email'=>$txt_email,
									'mobileno'=>$txt_patient_mobile,
									'address'=>$txt_patient_address,
									'password'=>$txt_password,
									'user_type'=>$sel_user_type,
									'clinic_reg_id'=>$cid,
										
							);

			       		$this->db->where('reg.rid',$reg_id);
			         	$this->db->update('reg',$data3);
			         	
			         	

			         	redirect('Welcome/clinic_user/');
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
						
						$target_dir = "asset/user_pic/";
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
						$cid=5;
					}
					$res2=$this->Inm->get_clinic_by_id($cid);
					date_default_timezone_set('Asia/Kolkata');
					$timeda=date("Y-m-d");			

			       
			       		$data3=array(

				         			'name'=>$txt_patient_first_name,
				         			'profile_pic'=>$fle_option1,
									'email'=>$txt_email,
									'mobileno'=>$txt_patient_mobile,
									'address'=>$txt_patient_address,
									'password'=>$txt_password,
									'user_type'=>$sel_user_type,
									'clinic_reg_id'=>$cid,
										
							);


			         	$this->db->insert('reg',$data3);
			         	$insid= $this->db->insert_id();
			         	

			         	redirect('Welcome/clinic_user/');
	
	    }
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
	public function treatment_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_treatment=$this->input->post('txt_treatment');
	   
		
       		$data2=array(

	         			'treatment'=>$txt_treatment, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_treatment',$data2);
	}
	public function instruction_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_instruction=$this->input->post('txt_instruction');
	   
		
       		$data2=array(

	         			'fld_instruction'=>$txt_instruction, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_instruction_accu',$data2);
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
              		$output.='<option value="">- Select -</option>';
                  foreach ($res as $row) 
                  {

                     /*$output.='<tr class="text-success">
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
		                              
		                          
		                          
		                      $output.='</tr>';*/
		                      $output.='<option value="'.$row->chief_id.'">'.$row->complaint.'</option>';
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
              	$output.='<option value="">- Select -</option>';
                  foreach ($res as $row) 
                  {

                  	$output.='<option value="'.$row->diagnosis_id.'">'.$row->diagnosis.'</option>';
                     /*$output.='<tr class="text-success">
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
		                              
		                          
		                          
		                      $output.='</tr>';*/
                  }
                  
             }
        echo $output;
	}
	public function getAllTreatment()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_treatment_list();

            if($res!="")
            {
                $count=1;
              	$output.='<option value="">- Select -</option>';
                  foreach ($res as $row) 
                  {

                  	$output.='<option value="'.$row->treatment_id.'">'.$row->treatment.'</option>';
                     /*$output.='<tr class="text-success">
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
		                              
		                          
		                          
		                      $output.='</tr>';*/
                  }
                  
             }
        echo $output;
	}
	public function getAllInstruction()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_instruction_accu_list();

            if($res!="")
            {
                $count=1;
              	$output.='<option value="">- Select -</option>';
                  foreach ($res as $row) 
                  {

                  	$output.='<option value="'.$row->instruction_id.'">'.$row->fld_instruction.'</option>';
                     /*$output.='<tr class="text-success">
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
		                              
		                          
		                          
		                      $output.='</tr>';*/
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
	public function getAddTreatment()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $sel_treatment=$this->input->post('sel_treatment');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'treatment_id'=>$sel_treatment,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_treatment_details',$data2);
       		//$insid=$this->insert_id();

		$res=$this->Inm->get_added_treatment_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                  	$count++;
                     $output.='<tr class="text-success">
                              <td>'.$row->treatment.'</td>
                              <td><input type="date" name="t_date'.$count.'" id="t_date'.$count.'" class="form-control" value="'.$row->t_date.'" onchange="saveTreatmentIns('.$row->treatment_detail_id.','.$count.')"></td>
                              <td><input type="time" name="t_time'.$count.'" id="t_time'.$count.'" class="form-control" value="'.$row->t_time.'" onchange="saveTreatmentIns('.$row->treatment_detail_id.','.$count.')"></td>
                              <td><textarea name="txt_remark'.$count.'" id="txt_remark'.$count.'" class="form-control" onblur="saveTreatmentIns('.$row->treatment_detail_id.','.$count.')">'.$row->remark.'</textarea></td>';
                              
                             
                                  $output.='<td> 
                                  <a href="#" onclick="getdeltreatment('.$row->treatment_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
                                  </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAddInstruction()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $sel_instruction=$this->input->post('sel_instruction');

	    $res_instodtl=$this->Inm->getInstructionFeild($sel_instruction);
	    if(isset($res_instodtl))
	    {
	    		$data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'instruction_id'=>$sel_instruction,
	         			'instruction_details'=>$res_instodtl->fld_instruction,
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_instruction_accu_details',$data2);
       		//$insid=$this->insert_id();

	    }
	    
		$res=$this->Inm->get_added_instruction_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                  	$count++;
                     $output.='<tr class="text-success">
                              
                              <td><textarea name="txt_instruction_dtl'.$count.'" id="txt_instruction_dtl'.$count.'" class="form-control" onblur="saveInstruction('.$row->instruction_detail_id.','.$count.')">'.$row->instruction_details.'</textarea></td>';
                              
                             
                                  $output.='<td> 
                                  <a href="#" onclick="getdelinstruction('.$row->instruction_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
                                  </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getUpdateTreatment()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $t_date=$this->input->post('t_date');
	    $t_time=$this->input->post('t_time');
	    $txt_remark=$this->input->post('txt_remark');
	    $detail_id=$this->input->post('detail_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			't_date'=>$t_date, 
	         			't_time'=>$t_time,
	         			'remark'=>$txt_remark, 
				);
	    	$this->db->where('tbl_treatment_details.treatment_detail_id',$detail_id);
       		$this->db->update('tbl_treatment_details',$data2);
       		//$insid=$this->insert_id();
    }
    public function getUpdateInstruction()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');
	    $txt_instruction_dtl=$this->input->post('txt_instruction_dtl');
	    
	    $detail_id=$this->input->post('detail_id');

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'opd_id'=>$opd_id,
	         			'instruction_details'=>$txt_instruction_dtl, 
	         			 
				);
	    	$this->db->where('tbl_instruction_accu_details.instruction_detail_id',$detail_id);
       		$this->db->update('tbl_instruction_accu_details',$data2);
       		//$insid=$this->insert_id();
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
	public function chiefHistorytoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_chief_complaints_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=0;

                  foreach ($res as $row) 
                  {
                  	$count++;
                     $output.='<tr class="text-success">
		                          <td>'.$count.'</td>';
		                         
                          		$output.='<td> '
                              .$row->complaint.'
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
	public function diagnosisHistorytoPatient()
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
		                          <td>'.$count.'</td>';
		                          
		                         
		                          		$output.='<td > 
		                              '.$row->diagnosis.'
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function treatmenttoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_treatment_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                    $count++;
                     $output.='<tr class="text-success">
                              <td>'.$row->treatment.'</td>
                              <td><input type="date" name="t_date'.$count.'" id="t_date'.$count.'" class="form-control" value="'.$row->t_date.'" onchange="saveTreatmentIns('.$row->treatment_detail_id.','.$count.')"></td>
                              <td><input type="time" name="t_time'.$count.'" id="t_time'.$count.'" class="form-control" value="'.$row->t_time.'" onchange="saveTreatmentIns('.$row->treatment_detail_id.','.$count.')"></td>
                              <td><textarea name="txt_remark'.$count.'" id="txt_remark'.$count.'" class="form-control" onblur="saveTreatmentIns('.$row->treatment_detail_id.','.$count.')">'.$row->remark.'</textarea></td>';
                              
                             
                                  $output.='<td> 
                                  <a  onclick="getdeltreatment('.$row->treatment_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
                                  </td>';
                              
                          $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function treatmentHistorytoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_treatment_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                    $count++;
                     $output.='<tr class="text-success">
                              <td>'.$row->treatment.'</td>
                              <td>'.$row->t_date.'</td>
                              <td>'.$row->t_time.'</td>
                              <td>'.$row->remark.'</td>';
                              
                             
                                  
                              
                          $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function instructiontoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_instruction_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                    $count++;
                     $output.='<tr class="text-success">
                              
                              <td><textarea name="txt_instruction_dtl'.$count.'" id="txt_instruction_dtl'.$count.'" class="form-control" onblur="saveInstruction('.$row->instruction_detail_id.','.$count.')">'.$row->instruction_details.'</textarea></td>';
                              
                             
                                  $output.='<td> 
                                  <a  onclick="getdelinstruction('.$row->instruction_detail_id .','.$count.')"><i class="fa fa-trash"></i></a>
                                       
                                  </td>';
                              
                          $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function instructionHistorytoPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('patient_id');
	    $opd_id=$this->input->post('opd_id');

		$res=$this->Inm->get_added_instruction_list($patient_id,$opd_id);

            if($res!="")
            {
              $count=0;

                  foreach ($res as $row) 
                  {
                    $count++;
                     $output.='<tr class="text-success" style="width:100px;">
                              
                              <td style="width:5px;">'.$count.'</td>';
                                  $output.='<td style="width:95px;"> 
                                  '.$row->instruction_details.'
                                       
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
	public function getdeladdtreatment()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_treatment_details.treatment_detail_id',$chf_id);
       		$this->db->delete('tbl_treatment_details');
       		//$insid=$this->insert_id();

		
	}
	public function getdeladdInstruction()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

	    
	    	$this->db->where('tbl_instruction_accu_details.instruction_detail_id',$chf_id);
       		$this->db->delete('tbl_instruction_accu_details');
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
	public function getDelMsgAll()
	{
		$output="";
		
	    $pid=$this->input->post('pid');

	    
	    	$this->db->where('tbl_master_chat.patient_id',$pid);
       		$this->db->delete('tbl_master_chat');
       		//$insid=$this->insert_id();

		
	}
	public function getMesDelPatient()
	{
		$output="";
		
	    $chat_id=$this->input->post('chat_id');

	    
	    	$this->db->where('tbl_master_chat.chat_id',$chat_id);
       		$this->db->delete('tbl_master_chat');
       		//$insid=$this->insert_id();

		
	}
	

	public function PatientById()
	{
		$output="";
		
	    $pid=$this->input->post('pid');

	    $resp=$this->Inm->get_patientById($pid);
	    if($resp!="")
	    {
	    	echo $resp->first_name.' '.$resp->middle_name.' '.$resp->last_name;
	    }
       		//$insid=$this->insert_id();

		
	}
	public function getAllMsg()
	{
		$output="";
		
	    $pid=$this->input->post('pid');

	    $resp=$this->Inm->getAllMessageByPid($pid);
	    if(count($resp)>0)
	    {
	    	foreach ($resp as $key) 
	    	{
	    		$output.='<div class="col-sm-12">';

						if($key->doctor_msg!="")
						{
							$output.='		<div id="frmUserMsg" style="text-align: left;">
				      				<span style="height: 20px;
				      color:black;
				      text-align: left;
				      font-weight: 700;
				      font-size: 18px;">'.$key->doctor_msg.'</span>
									
									<p id="frmMsgDesc" style="font-size: 12px;color: #A9A9A9;">'.$key->time.'</p>
								</div>';
						}
						if($key->patient_msg!="")
						{
							$output.='<div id="toUserMsg" style="text-align: right;">
							<span style="height: 20px;
							      color:black;
							      text-align: left;
							      font-weight: 700;
							      font-size: 18px;">'.$key->patient_msg.'</span>
							<p id="toMsgDesc" style="font-size: 12px;color: #A9A9A9;">'.$key->time.'</p>
							</div>';
						}
					$output.='</div>';
	    	}
	    	echo $output; 
	    }
	    else
	    {
	    	echo "";
       		//$insid=$this->insert_id();
	    }

		
	}
	public function getAllMsgPatient()
	{
		$output="";
		
	    $pid=$this->input->post('pid');

	    $resp=$this->Inm->getAllMessageByPid($pid);
	    if(count($resp)>0)
	    {
	    	foreach ($resp as $key) 
	    	{
	    		$output.='<div class="col-sm-12">';
	    				if($key->doctor_msg!="")
						{
								$output.='<div id="frmUserMsg" style="text-align: left;">
				      				<span style="height: 20px;
				      color:black;
				      text-align: left;
				      font-weight: 700;
				      font-size: 18px;">'.$key->doctor_msg.'</span>
									<a  onclick="getmsgdel('.$key->chat_id.')"><i class="fa fa-times-circle" ></i></a>
									<p id="frmMsgDesc" style="font-size: 12px;color: #A9A9A9;">'.$key->time.'</p>
								</div> ';
						}
						
						if($key->patient_msg!="")
						{
								
							$output.='<div id="toUserMsg" style="text-align: right;">

							<span style="height: 20px;
							      color:black;
							      text-align: left;
							      font-weight: 700;
							      font-size: 18px;">'.$key->patient_msg.'</span>
							      <a  onclick="getmsgdel('.$key->chat_id.')"><i class="fa fa-times-circle" ></i></a>
							<p id="toMsgDesc" style="font-size: 12px;color: #A9A9A9;">'.$key->time.'</p>
							</div> 

							';
						}

					$output.='</div>';
	    	}
	    	echo $output; 
	    }
	    else
	    {
	    	echo "";
       		//$insid=$this->insert_id();
	    }

		
	}
	public function InsertMsg()
	{
		$output="";
		date_default_timezone_set('Asia/Kolkata');
		 	$tim=date("Y-m-d");
		$clinic_id=$this->session->userdata('clinic_id');
	    $patient_id=$this->input->post('pid');
	    $msg=$this->input->post('msg');
	    $t_date=$tim;
	    

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'clinic_id'=>$clinic_id,
	         			'doctor_msg'=>$msg, 
	         			'msg_date'=>$t_date,
	         			 
				);
	    	$this->db->insert('tbl_master_chat',$data2);

	    	
       		
       		//$insid=$this->insert_id();
    }
    public function InsertMsgPatient()
	{
		$output="";
		date_default_timezone_set('Asia/Kolkata');
		 	$tim=date("Y-m-d");
		$clinic_id=$this->session->userdata('clinic_id');
		$patient_id=$this->session->userdata('uid');
	    //$patient_id=$this->input->post('pid');
	    $msg=$this->input->post('msg');
	    $t_date=$tim;
	    

	    $data2=array(

	         			'patient_id'=>$patient_id, 
	         			'clinic_id'=>$clinic_id,
	         			'patient_msg'=>$msg, 
	         			'msg_date'=>$t_date,
	         			 
				);
	    	$this->db->insert('tbl_master_chat',$data2);
       		
       		//$insid=$this->insert_id();
    }
    public function getOnlineList()
	{
		
		
	    $pid=$this->input->post('pid');
	    $res_p=$this->Inm->get_patient_list_all();
								$output="";
		if(count($res_p)>0)
		{
			foreach ($res_p as $key) 
			{
				$output.='<tr>
							<td>'.$key->first_name.' '.$key->middle_name.' '.$key->last_name;

							if($key->live_status=="online")
							{ 
								
										$output.=' (<span style="color:#337ab7;"><b>online</b></span>)';
								
							}


						$output.='</td>
							<td><button class="btn btn-xs btn-warning" onclick="getPatientName('.$key->patient_id.')">Select</button></td>
						</tr>';
			}
			echo $output;
		}

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
	public function getPatientListShow()
	{
		
		$output="";
		

		$res=$this->Inm->get_patient_list_show();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="odd gradeX">
                                         <td>'.$count++.'</td>
                                         <td><a href="'.base_url().$row->profile_pic.'"><img src="'.base_url().$row->profile_pic.'" class="img-circle" style="height: 70px;width: 100%;"></a></td>
                                         <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                                         <td>'.$row->p_address.'</td>
                                        <td>'.$row->username.'</td>
                                        <td> Patient </td>
                                        <td>'.$row->p_mobile.'</td>
                                        <td>'.$row->p_mobile.'</td>
                                        
                                         
                                        <td style="text-align:center;">
                                        
                                        
                                        <a href="#" onClick="confirmation('.$row->rid.')"> 
                                        <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title="Click Here To Update Record"><i class="fa fa-trash"   id="elementID"></i></button></a>
                                        </td>
                            </tr>';
		                         
		                          
		                     
                  }
                  
             }
        echo $output;
	}
	public function getregEdit()
	{	
      $outputData='';	
     
	    $id=$_POST['id'];
	    $name="";
	    $email="";
	    $mobile="";
	    $pass="";
	    $user_type="";
	    $address="";
	    $sel_class="";
	    $simg="";
		$row=$this->Inm->get_reg_by_id($id);
		if($row)
		{
			$name=$row->name;
		    $email=$row->email;
		    $mobile=$row->mobileno;
		    $pass=$row->password;
		    $user_type=$row->user_type;
		    $address=$row->address;
		    //$sel_class=$row->class;
		    $simg=$row->profile_pic;
	    	
		}
		
		
		$arr= array($name,$email,$mobile,$pass,$user_type,$address,$simg);
		$outputData=implode('_|_',$arr);
	   
	     
	 
	  echo $outputData;
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
	public function getStatusUpdate()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $reg_id=trim($this->input->post('rid'));
	    $sel_status=trim($this->input->post('sel_status'));

	    $data=array(

	         			'active_status'=>$sel_status, 
						

				);

       		$this->db->where('rid',$reg_id);
         	$this->db->update('reg',$data);


	}
	public function insert_content()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $content_id=trim($this->input->post('content_id'));
	    $sel_home_content=trim($this->input->post('sel_home_content'));
        $txt_content_title=trim($this->input->post('txt_content_title'));
        $txt_content_desc=trim($this->input->post('txt_content_desc'));
        $txt_content_file=trim($this->input->post('txt_content_file'));
        $fle_question ="";

        if(file_exists($_FILES['content_pic']['tmp_name']))
        {
        		$path = $_FILES['content_pic']['name'];
						
			 	$ext = pathinfo($path,PATHINFO_EXTENSION);
				
				$target_dir = "asset/content/";
				$fle_question = $target_dir.$path;
				move_uploaded_file($_FILES["content_pic"]["tmp_name"], $fle_question); 
        }
        else
        {
				$fle_question=$txt_content_file;
        }

        

		if($content_id!="")
		{
			 $data=array(
			 			'clinic_id'=>$clinic_id,
			 			'content_type'=>$sel_home_content,
	         			'content_title'=>$txt_content_title, 
						'content_desc'=>$txt_content_desc,
						'content_path'=>$fle_question,
					);
	 
       		$this->db->where('tbl_add_content.content_id  ',$content_id);
         	$this->db->update('tbl_add_content',$data);
		}
		else
		{
			 $data=array(
	         			'clinic_id'=>$clinic_id,
			 			'content_type'=>$sel_home_content,
	         			'content_title'=>$txt_content_title, 
						'content_desc'=>$txt_content_desc,
						'content_path'=>$fle_question,
					);
	 
       		$this->db->insert('tbl_add_content',$data);
         	$insid= $this->db->insert_id();
		}        

		redirect('Welcome/clinic_setting');
		//$this->load->view('profile/insert_contact_profile');
	}
	public function insert_contact()
	{
		$clinic_id=trim($this->input->post('txt_clinic_id'));
	    //$content_id=trim($this->input->post('content_id'));
	    $name=trim($this->input->post('name'));
        $email=trim($this->input->post('email'));
        $phone=trim($this->input->post('phone'));
        $message=trim($this->input->post('message'));
        $data_msg=array();
        
			 $data=array(

	         			'clinic_id'=>$clinic_id,
			 			'contact_name'=>$name,
	         			'contact_email'=>$email, 
						'phone_number'=>$phone,
						'contact_note'=>$message,
					);
	 
       		$this->db->insert('tbl_contact_master',$data);
         	$insid= $this->db->insert_id();
		  
		if($insid!="")
		{
			$data_msg['success_msg']="Submited Successfully...<br/>Thank You For Contact Us........";
		}

		$this->load->view('clinic_site/clinic_home');
		//$this->load->view('profile/insert_contact_profile');
	}

	public function getSliderResultTable()
	{	
      	$outputData='';	
     
		$res=$this->Inm->get_all_content();
		
		if(count($res)>0)
		{
			$count=0;
			foreach ($res as $row) 
			{
				$count++;
				$outputData.='<tr>
								<td>'.$count.'</td>
								<td>'.$row->content_title.'</td>
								<td>'.$row->content_desc.'</td>
								<td><img src="'.base_url().$row->content_path.'" height="100px;" width="100px;"></td>
								<td align="center">
									 <a onClick="getEditSlider('.$row->content_id.')" >
	                                    <button type="button" class="btn btn-primary btn-xs"  title="Click Here To Update Record"><i class="fa fa-pencil-square-o" id="elementID"></i> Edit</button></a> /
	                                    
	                                    <a onClick="confirmation_slider('.$row->content_id.')"> 
	                                    <button type="button" class="btn btn-primary btn-xs" title="Click Here To Update Record"><i class="fa fa-trash"   id="elementID"></i> Delete</button></a>
								</td>
							</tr>';
			}
		}
		
		
		/*$arr= array($rtid,$rtype);
		$outputData=implode('_|_',$arr);
	   
	     */
	 
	  echo $outputData;
    }
    public function getContactResultTable()
	{	
      	$outputData='';	
     
		$res=$this->Inm->get_all_contact();
		
		if(count($res)>0)
		{
			$count=0;
			foreach ($res as $row) 
			{
				$count++;
				$outputData.='<tr>
								<td>'.$count.'</td>
								<td>'.$row->contact_name.'</td>
								<td>'.$row->contact_email.'</td>
								<td>'.$row->phone_number.'</td>
								<td>'.$row->contact_note.'</td>
								
							</tr>';
			}
		}
		
		
		/*$arr= array($rtid,$rtype);
		$outputData=implode('_|_',$arr);
	   
	     */
	 
	  echo $outputData;
    }
    public function del_slider()
	{
	  
        $id=trim($this->input->post('aid'));
         $data=array(
	         			'is_delete'=>1, 
						
					);      
	   $this->db->where('tbl_add_content.content_id',$id);
	   $query=$this->db->update('tbl_add_content',$data);
       
		
		//$this->load->view('profile/insert_contact_profile');
	}
    public function getSliderEdit()
	{	
      	$outputData='';	
     
	    $id=$_POST['id'];
		$row=$this->Inm->get_slider_by_id($id);
		
		$res= $row;
		
	    $rtid=$res->content_title;
		$rtype=$res->content_desc; 
		$rtype2=$res->content_path;
		$rtype3=$res->content_type;
		
		$arr= array($rtid,$rtype,$rtype2,$rtype3);
		$outputData=implode('_|_',$arr);
	   	 
	  	echo $outputData;
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
	public function instructionPrint($patient_id,$opd_id)
 	{
	 		$clinic_id=$this->session->userdata('clinic_id');

			//$res_srec=$this->Mnm->get_added_prescription($patient_id,$opd_id);
			$res_prec=$this->Inm->get_patientById($patient_id);
			
			$res_clinic=$this->Mnm->getClinicRec($clinic_id);

			$res_ins=$this->Inm->get_added_instruction_list($patient_id,$opd_id);
			$res_opd=$this->Inm->get_opdById($opd_id);

			$this->load->view('mpdf/vendor/autoload');

			$mpdf = new \Mpdf\Mpdf();
			$ht="";
			
			$ht.='<html lang="en">
				<head>
					<meta charset="utf-8">
					<title></title>
					<style>
						@page{
							margin: 15px;
						}
						body { font-family: freeserif;}
						#div_photo
						{
							border: 2px solid red;
  							border-radius: 5px;
  							height:130px;
  							width:130px;
						}
						#getp_title
						{
							text-alignLcenter;
						}
						#tb1 
						{
							  border: 1px solid black;
							  width: 100%;
							  border-collapse: collapse;
							  padding:10px;
						}
						#tb2 
						{
							  border:3px; solid red; 
							  border-collapse: collapse; 
							  border-color: blue; 
							  text-align:left;
						}
						#tb3 
						{
							  border:3px; solid red; 
							  border-collapse: collapse; 
							  border-color: blue; 
							  text-align:left;
						}
						#tb4 
						{
							  border:3px; solid red; 
							  border-collapse: collapse; 
							  border-color: blue; 
							  text-align:left;
						}



					</style>
				';
			//$this->mpdf->SetDisplayMode('fullpage');
			$ht.='</head>
			<body>
			

	        <table style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
	          <tr width="100%">
	        	<td width="100%" align="center"><br/>';
	            $ht.='<img  src="'.base_url().'asset/clinic_logo/face.png" style="height: 300px;width: 300px;" >
		        </td>
		        
	          </tr>
	          <tr >
		          <td colspan="2" align="center">
		          <hr/>
		         </td>
		      </tr>
	         
	        </table>
           <table  style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
	        <tr >
	         <td width="100%" style="padding:3px;" align="left">
	          <h4>Instruction - </h4>
	         </td>

	         </tr>';
	         if(count($res_ins)>0)
	         {
	         	foreach ($res_ins as $value) 
	         	{
	         		$ht.='<tr >
				         <td width="100%" style="padding:3px;" align="left">
				          '.$value->instruction_details.'
				         </td>

				         </tr>';
	         	}
	         }


	       $ht.='</table><hr/>
          <table  style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
	        <tr class="text-success" width="100%">
                            <td width="100%"  style="padding:3px;text-align:left;">Follow Up Date : '.$res_opd->followup_date.'</td>
                            
                        </tr>

	       </table>
	      
	       
			
			</body>';
			$ht.='</html>';
			$mpdf->WriteHTML($ht);
			$mpdf->output();
			//$mpdf->output();
			
			

	}
	


}
?>