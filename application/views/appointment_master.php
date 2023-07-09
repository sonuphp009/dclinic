  <?php $this->load->view('ismobile');?>

<?php
$uname=$this->session->userdata('uname');
$uid=$this->session->userdata('uid');

if(isset($uname))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>NP Infotech</title>
  <?php $this->load->view('css');?>
 <?php 
if(!isMobile())
{ ?>
<style type="text/css">
  /*.nav-link
  {
    color: white;
  }*/

  .div_container{
      width: 95%;
      margin-left: 35px;
    }

</style>
<?php 
}
?>
 <style type="text/css">
    #snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #28a745;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 18px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
  </style>
<script type="text/javascript">
  function toast_chk() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

</head>
<body>
<div class="div_container">

<?php $this->load->view('navbar2');?>
		<div class="row" style="padding: 10px;">
			 <div id="snackbar"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; Save Successfully.....</div>

			<div class="col-sm-12 text-center">
					<h4 class="header">Appointment Schedule</h4>
			</div>
		</div>
		<div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Input Form</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Schedule List</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  		<div class="panel panel-primary">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Schedule</h3>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        	<form  name="f1" action="<?php  echo site_url('Appointment_controller/insert_schedule'); ?>"   enctype="multipart/form-data"  method="post">
	                        	<div class="row ">
	                        		<div class="col-sm-2 form-group">
	                        			<label>From Date :</label>
	                        			<input type="date" name="txt_frm_date" id="txt_frm_date" class="form-control" required>
	                        		</div>
	                        		<div class="col-sm-2 form-group">
	                        			<label>To Date :</label>
	                        			<input type="date" name="txt_to_date" id="txt_to_date" class="form-control" required>
	                        		</div>
	                        		<!-- <div class="col-sm-3 form-group">
	                        			<label>Day :</label>
	                        			<select class="select form-control" id="scheduleday" name="scheduleday" required="">
	                                    <option value="Monday">
	                                     Monday
	                                    </option>
	                                    <option value="Tuesday">
	                                     Tuesday
	                                    </option>
	                                    <option value="Wednesday">
	                                     Wednesday
	                                    </option>
	                                    <option value="Thursday">
	                                     Thursday
	                                    </option>
	                                    <option value="Friday">
	                                     Friday
	                                    </option>
	                                    <option value="Saturday">
	                                     Saturday
	                                    </option>
	                                    <option value="Sunday">
	                                     Sunday
	                                    </option>
	                                   </select>
	                        		</div> -->
	                        		<div class="col-sm-2 form-group">
	                        			<label>Start Time :</label>
	                        			<input type="time" name="txt_start_time" id="txt_start_time" class="form-control" required>
	                        		</div>
	                        		<div class="col-sm-2 form-group">
	                        			<label>End Time :</label>
	                        			<input type="time" name="txt_end_time" id="txt_end_time" class="form-control" required>
	                        		</div>
	                        		<div class="col-sm-2 form-group">
	                        			<label>Deside Time Slot In Minutes:</label>
	                        			<input type="text" name="txt_time_slot" id="txt_time_slot" class="form-control" required>
	                        		</div>
	                        		<div class="col-sm-2 form-group">
	                        			<label></label>
	                        			<button class="btn btn-primary btn-block" type="submit" style="margin-top: 8px;">Schedule Appointment <i class="fa fa-plus-circle"></i></button>
	                        		</div>
	                        		<!-- <div class="col-sm-3 form-group">
	                        			<label>Availablity :</label>
	                        			<select name="sel_availablity" id="sel_availablity" class="form-control">
	                        				<option value="">-Select -</option>
	                        				<option value="Available">Available</option>
	                        				<option value="Not Available">Not Available</option>
	                        			</select>
	                        		</div> -->
	                        	</div>
	                        </form>
                        </div>
                    </div>
                     
                  	
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  		<div class="row ">
                  			<div class="col-sm-4 pull-right">
                  				<input type="text" name="txt_schedule_search" id="txt_schedule_search" class="form-control" placeholder="Search Date.....">

                  			</div>
                  		</div><hr/>
                  		<div class="row form-group">
                  			<div class="col-sm-12" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
		                  		<table class="table styled-table">
				                  <thead>
				                    <tr>
				                      <th>ID</th>
				                      <th>Appointment Date</th>
				                      <th>Day</th>
		                          		<th>Start Time</th>
				                      <th>End Time </th>
				                      
				                      <th>Action</th>
				                    </tr>
				                  </thead>
				                  <tbody id="tbl_schedule">
				                      <?php
		                          $output="";
		                          
		                              $res=$this->Mnm->getSchedule();

		                              if($res!="")
		                              {
		                                $count=1;

		                                    foreach ($res as $row) 
		                                    {
		                                       $output.='<tr class="text-success">
		                                                <td>'.$count++.'</td>
		                                                <td>'.$row->appointment_date.'</td>
		                                                <td>'.$row->day.'</td>
		                                                <td>'.$row->start_time.'</td>
		                                                <td>'.$row->end_time.'</td>
		                                                <td>
		                                                <select name="sel_status'.$count.'" id="sel_status'.$count.'"  onchange="getAvailableStatus('.$count.','.$row->schedule_id.')">
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
		                          
		                          ?>
				                  </tbody>
				                </table>
		                  	</div>
                  		</div>
                     
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
 $(document).ready(function() {
		$('#txt_schedule_search').keyup(function() {
			search_table($(this).val());
		});

		function search_table(value){
			//alert();
			$('#tbl_schedule tr').each(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
					{
						found = 'true';
					}
				});
				if(found == 'true')
				{
					$(this).show();

				}
				else
				{
					$(this).hide();
				}
			});
		}
	});
 function getAvailableStatus(cnt,schedule_id)
{
  //$('#imgload').show();
 
  var sel_status=$('#sel_status'+cnt).val();//document.getElementById('sel_status'+cnt).value;
 //alert(sel_status);
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Appointment_controller/updateAppStatus",
         data:{
                schedule_id:schedule_id,
                sel_status:sel_status
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_schedule').empty();
        $('#tbl_schedule').append(message);
        toast_chk();
        //$('#imgload').hide();

         });
}
</script>
</html>
<?php 
}
else
{
	redirect('Welcome/index');
}
?>