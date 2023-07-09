  <?php $this->load->view('ismobile');?>

<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>NP Infotech</title>
  <?php $this->load->view('css');?>
 <script type="text/javascript">
var startyear = "1910";
var endyear = "2040";
var dat = new Date();
var curday = dat.getDate();
var curmon = dat.getMonth()+1;
var curyear = dat.getFullYear();
	
	function checkleapyear(datea)
	{
		if(datea.getYear()%4 == 0)
			{
				if(datea.getYear()% 10 != 0)
					{
						return true;
					}
				else
					{
						if(datea.getYear()% 400 == 0)
							return true;
						else
							return false;
					}
			}
		return false; 
	} 

function DaysInMonth(Y, M) 
{
		with (new Date(Y, M, 1, 12)) 
		{
			setDate(0);
			return 
			getDate();
		} 
} 


function datediff(date1, date2) 
{
	var y1 = date1.getFullYear(), m1 = date1.getMonth(), d1 = date1.getDate(),
	y2 = date2.getFullYear(), m2 = date2.getMonth(), d2 = date2.getDate();
		if (d1 < d2) 
		{
			m1--;
			d1 += DaysInMonth(y2, m2);
		}
		if (m1 < m2) 
		{
			y1--;
			m1 += 12;
		}
	return [y1 - y2, m1 - m2, d1 - d2]; 
} 

function daysNoMonth(year,month) 
{
    
    return new Date(year, month, 0).getDate();
}

</script>
<style>
.row 
{
	color: #6c757d!important;
}
</style>
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
</head>
<body>
<div class="div_container">

<?php $this->load->view('navbar2');?>
<?php //$this->load->view('asid_bar');?>
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-center ">
					<p class="header">Patient Registration</p>
			</div>
		</div>
		<div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Input Form</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Patient List</a>
                  </li> -->
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  	<div class="row">
                  		<div class="col-sm-12">
							<form  name="f1" action="<?php  echo site_url('Welcome/insert_patient_master'); ?>"   enctype="multipart/form-data"  method="post" class="bg-white">
								<div class="row" style="padding: 10px;">
									<div class="col-sm-3 form-group text-left ">
						              <label class="control-label">Upload Profile Photo( ) :</label>
						              <input type="file" name="fle_option1" id="fle_option1"  onchange='Test.UpdatePreview(this)' accept="image/*" capture>
						          </div>
									<div class="col-sm-3 form-group text-left">
										<label>First Name</label>
										<input type="text" name="txt_patient_first_name" id="txt_patient_first_name" class="form-control " placeholder="Enter Firsr Name">
									</div>
									<div class="col-sm-3 form-group text-left ">
										<label>Middle Name</label>
										<input type="text" name="txt_patient_middle_name" id="txt_patient_middle_name" class="form-control " placeholder="Enter Middle Name">
									</div>
									<div class="col-sm-3 form-group text-left ">
										<label>Last Name</label>
										<input type="text" name="txt_patient_last_name" id="txt_patient_last_name" class="form-control " placeholder="Enter Last Name">
									</div>
									<div class="col-sm-3 form-group text-left ">
										<label>Mobile No</label>
										<input type="text" name="txt_patient_mobile" id="txt_patient_mobile" class="form-control" placeholder="Enter Mobile Number">
									</div>
									<div class="col-sm-3 form-group text-left ">
										<label>Address</label>
										<textarea name="txt_patient_address" id="txt_patient_address" class="form-control" placeholder="Enter Address"></textarea>
									</div>
									<div class="col-sm-3 form-group text-left ">
										<label>Date of birth</label>
										<input type="date" name="txt_dob" id="txt_dob" class="form-control" onchange="calage()" placeholder="">
									</div>
									<div class="col-sm-1 form-group text-left ">
										<label>Age</label>
										<input type="txet" name="txt_age" id="txt_age" class="form-control" placeholder="">
									</div>
									<div class="col-sm-3 form-group text-left">
										<label>Blood Group</label>
										<select name="sel_bg" id="sel_bg" >
											<option value="">-Select Blood-</option>
											<option value="A+">A+</option>
											<option value="O+">O+</option>
											<option value="B+">B+</option>
											<option value="AB+">AB+</option>
											<option value="A-">A-</option>
											<option value="O-">O-</option>
											<option value="B-">B-</option>
											<option value="AB-">AB-</option>
										</select> 
									</div>
									<div class="col-sm-3 form-group text-left">
										<label>Gender</label>
										<select name="sel_gender" id="sel_gender"  required />
											<option value="">-Select Gender-</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
											
										</select>
									</div>
								</div>
								<div class="row" style="padding: 10px;">
									<div class="col-lg-6  col-md-6 col-xs-6">
										<button type="Submit" class="btn btn-success " >Submit</button>
										<button type="reset" class="btn btn-danger " >Cancel</button>

									</div>
								</div>
							</form>
						</div>
					</div>
				  </div>
				  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
	                  		
              		<div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
              			
                  		<table class="table table-hover text-nowrap">
		                  <thead>
		                    <tr>
		                      <th>ID</th>
		                      <th>Patient Name</th>
                          	  <th>Mobile No</th>
		                      
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody id="tbl_patient_list">
		                      <?php
                          $output="";
                          
                              $res=$this->Inm->get_patient_list_followup();

                              if($res!="")
                              {
                                $count=1;

                                    foreach ($res as $row) 
                                    {
                                       $output.='<tr class="text-success">
                                                <td>'.$count++.'</td>
                                                <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                                                <td>'.$row->p_mobile.'</td>
                                                
                                                <td > 
                                                     
                                                    <a href="#" onclick="getdelpres('.$row->patient_id  .','.$count.')">Genrate OPD <i class="fa fa-plus-circle"></i></a>
                                                    </td>';
                                                
                                            $output.='</tr>';
                                    }
                                    
                               }
                            echo $output;
                         
                          ?>
		                  </tbody>
		                </table>
                  	
              		</div>
                 
                </div>
				</div>
				
			</div>
		</div>
	</div>

</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
function calage() 
{
	var txt_dob=document.getElementById('txt_dob').value;
	var dob = new Date(txt_dob);
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();
    
    //convert the calculated difference in date format
    var age_dt = new Date(month_diff); 
    
    //extract year from date    
    var year = age_dt.getUTCFullYear();
    
    //now calculate the age of the user
    var age = Math.abs(year - 1970);
    
    //display the calculated age
    //document.write("Age of the date entered: " + age + " years");
    $('#txt_age').val(age+" years");
 
}
</script>
</html>
<?php 
?>