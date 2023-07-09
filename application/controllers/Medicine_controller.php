<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine_controller extends CI_Controller 
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
		$this->load->view('medicine_master');
	}
	public function clinic_medicine()
	{
		redirect('Medicine_controller/index');
		//$this->load->view('medicine_master');
	}
	public function show_prescription()
	{
		/*$data['p_data']=$this->Inm->get_patientById($patient_id);
		$data['opd_data']=$this->Inm->get_opdById($opd_id);*/
		$this->load->view('prescription_view');
	}
	public function insert_medicine()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_medicine_id=trim($this->input->post('txt_medicine_id'));
	    $insid=$this->input->post('sel_instruction');
	    
		
       	if($txt_medicine_id>0)
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
       	}
       	else
       	{
       		$data=array(
						'medicine_name'=>trim($this->input->post('txt_medicine_name')), 
						'qty'=>trim($this->input->post('txt_qty')), 
						'dose_id'=>trim($this->input->post('sel_dose_time')),
						'instruction_id'=>$insid,
						'clinic_id'=>$clinic_id,
					);
				 	
				  	$this->db->insert('tbl_master_medicine',$data) ;

				  	redirect('Medicine_controller/clinic_medicine');
       	}

       		
	}
	public function insert_prescription()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_medicine_id=trim($this->input->post('txt_medicine_id'));
	    $insid=$this->input->post('sel_instruction');
	    $patient_id=$this->input->post('txt_patient_id');
	    $opd_id=$this->input->post('txt_opd_id');
	    
		
       	
       		$data=array(
						'qty'=>trim($this->input->post('txt_qty')), 
						'dose_id'=>trim($this->input->post('sel_dose_time')),
						'txt_day'=>trim($this->input->post('txt_day')),
						'instruction_id'=>$insid,
						'clinic_id'=>$clinic_id,
						'opd_id'=>$opd_id,
						'patient_id'=>$patient_id,
						'medicine_id'=>trim($this->input->post('sel_medicine'))
					);
				 	
				  	$this->db->insert('tbl_prescription',$data) ;

			
				  //	redirect('Medicine_controller/show_prescription');
       

       		
	}
	public function saveFollowup()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_followup_date=$this->input->post('txt_followup_date');
	    $patient_id=$this->input->post('txt_patient_id');
	    $opd_id=$this->input->post('txt_opd_id');
	    

       	
       		$data=array(
						'followup_date'=>$txt_followup_date, 
						
					);
				 	$this->db->where('tbl_opd_master.opd_id',$opd_id) ;
				  	$this->db->update('tbl_opd_master',$data) ;

			
				  //	redirect('Medicine_controller/show_prescription');
       

       		
	}
	public function dose_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_dose_name=$this->input->post('txt_dose_name');
	   
		
       		$data2=array(

	         			'fld_dose'=>$txt_dose_name, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_dose_time',$data2);
	}
	public function instruction_add()
	{
		$clinic_id=$this->session->userdata('clinic_id');
	    $txt_instruction=$this->input->post('txt_instruction');
	   
       		$data2=array(

	         			'fld_instruction'=>$txt_instruction, 
	         			'clinic_id'=>$clinic_id, 
				);
       		$this->db->insert('tbl_instruction',$data2);
	}
	public function getAllDose()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	   
		$res=$this->Mnm->get_added_dose();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->fld_dose.'</td>';
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdeldose('.$row->fld_dose_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllInstruction()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	   
		$res=$this->Mnm->get_added_instruction();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$row->fld_instruction.'</td>';
		                         
		                          		$output.='<td > 
		                              <a href="#" onclick="getdeladInstruction('.$row->instruction_id .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function getAllMedicine()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	   
		$res=$this->Mnm->get_added_medicine();

            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
                     $output.='<tr class="text-success">
		                          <td>'.$count++.'</td>
		                          <td>'.$row->medicine_name.'</td>
		                          <td>'.$row->fld_dose.'</td>
		                          <td>'.$row->fld_instruction.'</td>
		                          <td > 
		                          		<a href="#" onclick="getEditMedicine('.$row->medicine_id.','.$count.')"><i class="fa fa-edit"></i></a> / 
		                              <a href="#" onclick="getdelMedicine('.$row->medicine_id  .','.$count.')"><i class="fa fa-trash"></i></a>
		                              </td>';
		                          
		                      $output.='</tr>';
                  }
                  
             }
        echo $output;
	}
	public function patientHistoryByOpd()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
		$patient_id=$_POST['pid'];
		$opd_id=$_POST['sel_patient_list'];
	   
		 $res=$this->Mnm->get_patient_listByPatient($patient_id);

        if(count($res)>0)
        {
          $count=1;
          $output.='<option value="">- Select OPD Date -</option>';

          foreach ($res as $row) 
          {
              $output.='<option value="'.$row->opd_id.'">'.$row->opd_date.'</option>';
          }

        }
        echo $output;
	}
	public function getAllMedicineByPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
		$patient_id=$_POST['pid'];
		$opd_id=$_POST['sel_patient_list'];
	   
		  $res=$this->Mnm->get_added_prescription($patient_id,$opd_id);

          if($res!="")
          {
            $count=1;

                foreach ($res as $row) 
                {
                   $output.='<tr class="text-success">
                            <td>'.$count++.'</td>
                            <td>'.$row->medicine_name.'</td>
                            <td>'.$row->qty.'</td>
                            <td>'.$row->fld_dose.'</td>
                            <td>'.$row->txt_day.'</td>
                            <td>'.$row->fld_instruction.'</td>
                            <td > 
                                 
                                <a href="#" onclick="getdelpres('.$row->prescription_id  .','.$count.')"><i class="fa fa-trash"></i></a>
                                </td>';
                            
                        $output.='</tr>';
                }
                
           }
        echo $output;
	}
	public function addtopres()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
		$patient_id=$_POST['pid'];
		$opd_id=$_POST['sel_patient_list'];
	   $sel_history=$_POST['sel_history'];

		  $res=$this->Mnm->get_added_prescription($patient_id,$sel_history);
		  
          if($res!="")
          {
            $count=1;

                foreach ($res as $row) 
                {
                   

                        $data=array(
						'qty'=>$row->qty, 
						'dose_id'=>$row->dose_id,
						'instruction_id'=>$row->instruction_id,
						'clinic_id'=>$clinic_id,
						'opd_id'=>$opd_id,
						'patient_id'=>$patient_id,
						'medicine_id'=>$row->medicine_id
					);
				 	
				  	$this->db->insert('tbl_prescription',$data) ;
                }
                
           }
        echo $output;
	}
	public function getMedicineEdit()
	{	
      $outputData='';	
     
	    $id=$_POST['id'];
	    $medicine_id="";
	    $medicine_name="";
	    $qty="";
	    $dose_id="";
	    $instruction_id="";
	   
		$row=$this->Mnm->get_added_medicine_id($id);

		if(isset($row))
		{
			$medicine_id=$row->medicine_id;
		    $medicine_name=$row->medicine_name;	
		    $qty=$row->qty;
		    $dose_id=$row->dose_id;
		    $instruction_id=$row->instruction_id;		    	
		}
		
		
		$arr= array($medicine_id,$medicine_name,$qty,$dose_id,$instruction_id);
		$outputData=implode('_|_',$arr);
	   
	     
	 
	  echo $outputData;
   }
	public function getdeladInstruction()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');

    	$this->db->where('tbl_instruction.instruction_id',$chf_id);
   		$this->db->delete('tbl_instruction');
       		//$insid=$this->insert_id();

		
	}
	
	public function getdelMedicineChk()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');
	    $this->db->where('tbl_master_medicine.medicine_id',$chf_id);
    	$data2=array(

	         			'is_delete'=>1, 
				);
   		$this->db->update('tbl_master_medicine',$data2);
       		//$insid=$this->insert_id();
		
	}
	public function getdelpresChk()
	{
		$output="";
		
	    $chf_id=$this->input->post('chf_id');
    	$this->db->where('tbl_prescription.prescription_id',$chf_id);
   		$this->db->delete('tbl_prescription');
       		//$insid=$this->insert_id();
		
	}
	public function autocomplete_medicine()
	{
		$res=$this->Mnm->get_instruction_all();
		$skillData = array();
            if($res!="")
            {
              $count=1;

                  foreach ($res as $row) 
                  {
				        $data['instrucntion_id'] = $row->instrucntion_id; 
				        $data['fld_instruction'] = $row->fld_instruction; 
				        array_push($skillData, $data); 
			      } 
			} 
		 
		// Return results as json encoded array 
		echo json_encode($skillData); 
       		//$insid=$this->insert_id();

		
	}
	public function getPatient()
	{
		$output="";
		$clinic_id=$this->session->userdata('clinic_id');
	    $opd_id=$this->input->post('sel_patient_list');
	    $patient_name="";
	    $opd_date="";
		$res=$this->Mnm->get_patient_listByOPD($opd_id);

            if($res!="")
            {
              $patient_name=$res->first_name.' '.$res->middle_name.' '.$res->last_name;
	    	  $opd_date=$res->opd_date;
	    	  $patient_id=$res->patient_id;
                  
            }

         echo $patient_id.'/'.$patient_name.'/'.$opd_date;
        
	}
	public function prescriptionPrint($patient_id,$opd_id)
 	{
	 		$clinic_id=$this->session->userdata('clinic_id');

			$res_srec=$this->Mnm->get_added_prescription($patient_id,$opd_id);
			$res_prec=$this->Inm->get_patientById($patient_id);
			
			$res_clinic=$this->Mnm->getClinicRec($clinic_id);

			$res_diag=$this->Inm->get_added_diagnosis_list($patient_id,$opd_id);
			$res_opd=$this->Inm->get_opdById($opd_id);

			$this->load->view('mpdf/vendor/autoload');

			$mpdf = new \Mpdf\Mpdf();
			$ht="";
			
			$ht.='<html lang="en">
				<head>
					<meta charset="utf-8">
					<title></title>
					<style>
						
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
	        	<td width="20%" align="center"><br/>';
	            $ht.='<img  src="'.base_url().$res_clinic->clinic_image.'" style="height: 70px;width: 70px;" >
		        </td>
		        <td width="80%" align="left" style="">
		        	<h2 style="color: blue;">'.$res_clinic->clinic_name.'</h2>
		        	<p style="color: brown;"> Address : - '.$res_clinic->clinic_address.'</p>
                  <p style=""> Email : - '.$res_clinic->clinic_email.' Mobile Number : - '.$res_clinic->mobile_no.'</p>
		        </td>
	          </tr>
	          <tr >
		          <td colspan="2" align="center">
		          <hr/>
		         </td>
		      </tr>
	         
	        </table>

	        

	        <table border="1" style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
	        <tr >
	         <td colspan="4" width="100%" style="padding:3px;" align="center">
	          <h4>Patient Details</h4>

	         </td>

	         </tr>
	         <tr >
	         <td  colspan="4" align="left" width="100%" style="padding:3px;">
	                <p> &nbsp;&nbsp;&nbsp;Name : '.strtoupper($res_prec->first_name.' '.$res_prec->middle_name.' '.$res_prec->last_name).'</p><br/>
	                
	         </td>
	         
        	</tr>
        	<tr >
	         <td   align="left" width="20%" style="padding:3px;">
	                <p > &nbsp;&nbsp;&nbsp;Opd Id : </p><br/>
	         </td>
	         <td   align="left" width="30%" style="padding:3px;">
	         	 <p> &nbsp;'.strtoupper($res_prec->opd_id).'</p>
	                
	         </td>
	         <td   align="left" width="20%" style="padding:3px;">
	                <p > &nbsp;&nbsp;&nbsp;Age : </p><br/>
	         </td>
	         <td   align="left" width="30%" style="padding:3px;">
	         	 <p> &nbsp;'.strtoupper($res_prec->p_age).'</p>
	                
	         </td>
        	</tr>
        	<tr >
	         <td   align="left" width="20%" style="padding:3px;">
	                <p >&nbsp;&nbsp;&nbsp;Mob No :</p><br/>
	         </td>
	         <td   align="left" width="30%" style="padding:3px;">
	         	 <p> &nbsp;'.strtoupper($res_prec->p_mobile).'</p>
	                
	         </td>
	         <td   align="left" width="20%" style="padding:3px;">
	                <p >&nbsp;&nbsp;&nbsp;Gender :</p><br/>
	         </td>
	         <td   align="left" width="30%" style="padding:3px;">
	         	 <p> &nbsp;'.strtoupper($res_prec->gender).'</p>
	                
	         </td>
        	</tr>
          </table><hr/>
           <table  style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
	        <tr >
	         <td width="100%" style="padding:3px;" align="left">
	          <h4>Diagnosis</h4>
	         </td>

	         </tr>';
	         if(count($res_diag)>0)
	         {
	         	foreach ($res_diag as $value) 
	         	{
	         		$ht.='<tr >
				         <td width="100%" style="padding:3px;" align="left">
				          '.$value->diagnosis.'
				         </td>

				         </tr>';
	         	}
	         }


	       $ht.='</table><hr/>
          <table  style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
	        <tr >
	         <td colspan="2" width="100%" style="padding:3px;" align="center">
	          <h4><u>Patient Prescription</u></h4>

	         </td>

	         </tr>

	       </table>
	      
	       <table  style="border:3px; solid red; border-collapse: collapse; border-color: blue; " width="100%">';
	        if($res_srec!="")
          	{
            $count=1;

            	$ht.='<tr style="padding:10px;">
		                      <td width="10%" style="padding:3px;">(Rx)</td>
		                      <td width="30%" style="padding:3px;">Medicine Name</td>
		                      <td width="25%" style="padding:3px;">Dose</td>
		                      <td width="15%" style="padding:3px;">Days</td>
		                      <td width="20%" style="padding:3px;">Qty</td>
		                      
                    	</tr>
                    	<tr class="text-success" width="100%">
                            <td width="100%" colspan="5" style="padding:3px;"></td>
                            <hr/>
                            
                        </tr>';

                foreach ($res_srec as $row) 
                {
                   $ht.='<tr class="text-success">
                            <td width="10%" style="padding:3px;">'.$count++.') </td>
                            <td width="30%" style="padding:3px;">'.$row->medicine_name.'</td>
                            <td width="25%" style="padding:3px;">'.$row->fld_dose.'</td>
                            <td width="15%" style="padding:3px;">'.$row->txt_day.'</td>
                            <td width="20%" style="padding:3px;">'.$row->qty.'</td>
                        </tr>
                        <tr class="text-success" width="100%">
                            <td width="10%" style="padding:3px;"></td>
                            <td width="30%" style="padding:3px;"></td>
                            <td width="25%" style="padding:3px;">'.$row->fld_instruction.'</td>
                            <td width="35%" colspan="2" style="padding:3px;"></td>
                            
                        </tr>
                        <tr class="text-success" width="100%">
                            <td width="100%" colspan="5" style="padding:3px;"></td>
                            <hr/>
                            
                        </tr>
                        
                        
                        ';


               }
               $ht.='<tr class="text-success" width="100%">
                            <td width="100%" colspan="5" style="padding:3px;text-align:left;">Follow Up Date : '.$res_opd->followup_date.'</td>
                            
                        </tr>';
            }

	       $ht.='</table><pagebreak />

	       <table  style="border:3px; solid red; border-collapse: collapse; border-color: blue; " width="100%">
	       ';
			
			$res_ins=$this->Inm->get_InstructionPres();
			if($res_ins>0)
			{
				$cntins=0;
				foreach ($res_ins as $key) 
				{
					$cntins++;
					$ht.='<tr class="text-success" width="100%">
                            <td width="100%" style="padding:3px;text-align:left;"> '.$cntins.' -  '.$key->fld_instruction.'</td>
                            
                        </tr>';
				}
			}
			$ht.='</table>
			</body>';
			$ht.='</html>';
			$mpdf->WriteHTML($ht);
			$mpdf->output();

			//redirect('Welcome/instructionPrint/'.$patient_id.'/'.$opd_id);
			 
			//$mpdf->output();
			
			

	}

}
?>