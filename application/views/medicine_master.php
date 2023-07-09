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
			<div class="col-sm-12 text-center text-primary">
					<h4 class="header">Medicine Master</h4>
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
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Medicine List</a>
                  </li> -->
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  	<div class="row">
                  		<div class="col-sm-12">
	                  	<form  name="f1" action="<?php  echo site_url('Medicine_controller/insert_medicine'); ?>"   enctype="multipart/form-data"  method="post">

	                  		<div class="row">
	                  			<div class="col-sm-3 form-group">
	                  				<label>Medicine Name :</label>
		                  			<input type="hidden" name="txt_medicine_id" id="txt_medicine_id">
		                  			<input type="text" class="form-control" name="txt_medicine_name" id="txt_medicine_name" placeholder="Medicine Name" required/>
		                  		</div>
		                  		<div class="col-sm-2 form-group">
		                  			<label>Qty :</label>
		                  			<input type="text" name="txt_qty" id="txt_qty" class="form-control" placeholder="Quantity" required />
		                  		</div>
		                  		<div class="col-sm-2 form-group">
		                  			<label>Dose :</label> <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#dose_modal" onclick="all_dose()">Add Dose <i class="fa fa-plus-circle"></i></button>
		                  			<select name="sel_dose_time" id="sel_dose_time"  required>
		                  				<option value="">-select dose-</option>
		                  				<?php foreach ($this->Mnm->get_dose_all() as $row) 
			                            {
			                                echo "<option value='".$row->fld_dose_id."'>".$row->fld_dose."</option>";
			                            } 
			                                                    
			                             ?>
		                  			</select>
		                  		</div>
		                  		<div class="col-sm-3">
		                  			<label>Instruction :</label> <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#instruction_modal" onclick="all_instruction()">Add Instruction <i class="fa fa-plus-circle"></i></button>
		                  			<select name="sel_instruction" id="sel_instruction"  required >
		                  				<option value="">-select instruction-</option>
		                  				<?php foreach ($this->Mnm->get_instruction_all() as $row) 
			                            {
			                                echo "<option value='".$row->instruction_id ."'>".$row->fld_instruction."</option>";
			                            } 
			                                                    
			                             ?>
		                  			</select>
		                  		</div>
		                  		<div class="col-sm-2 form-group">
		                  			<label></label>
		                  			<button class="btn btn-success btn-block" type="submit" style="margin-top: 7px;">Save Medicine <i class="fa fa-plus-circle"></i></button>
		                  		</div>
	                  		</div>

	                  	</form>
	                  </div>
			         </div><hr/>
                     <div class="row">
              			<div class="col-sm-6 form-group">
              				<button class="btn btn-primary btn-block" onclick="showMedicine()">Show Medicine &nbsp;<i id="imgload" style="display: none;" class="fa fa-spinner fa-spin"></i></button>
          				</div>
          				<div class="col-sm-6 form-group">
              				<input type="text" name="txt_serach_medicine" id="txt_serach_medicine" class="form-control" placeholder="search medicine.....">
              			</div>
              		
                  	</div>
                  	<div class="row" style="overflow-x: scroll;overflow-y: scroll;height: 300px;">
                  		<table id="tbl_medicine_master" class="table styled-table">
		                  <thead>
		                    <tr>
		                      <th>ID</th>
		                      <th>Medicine Name</th>
		                      <th>Dose</th>
		                      <th>Instruction</th>
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody id="tbl_medicine_search">
		                    
		                  </tbody>
		                </table>
                  	</div>
                  </div>
	                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
	                  		
	                  		<div class="row">
	                  			
	                  		</div>
	                     
	                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
    </div>
</div>
<!-- modal -->
<div class="modal" id="dose_modal" aria-modal="true" style="padding-right: 16px;">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Dose Master</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">×</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <div class="row form-group">
	      	<div class="col-sm-12">
	      		<input type="hidden" name="dose_id" id="dose_id">
	      		<input type="text" name="txt_dose_name" id="txt_dose_name" class="form-control" placeholder="enter dose name..">
	      	</div>
	      </div>
	    </div>
	    <div class="modal-body">
	    	<button type="button" class="btn btn-primary swalDefaultSuccess" onclick="getdosesave()">Save changes</button>
	    </div>
	    <div class="modal-body">
	    	<div class="col-sm-12 card card-primary card-outline" style="padding: 5px;">
                <div class="row">
                     <div class="col-sm-12 text-primary text-center">
                      <h4>Content Added to Dose</h4>
                    </div>
                </div><hr/>
                <div class="row">
                    <div class="col-sm-12" style="overflow-y:scroll;height: 250px;border: 1px; ">
                      <table class="table styled-table">
                        <thead>
                          <th>Dose</th>
                          <th>Action</th>
                        </thead>
                        <tbody id="tbl_added_dose">
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- modal -->
<!-- modal -->
<div class="modal" id="instruction_modal" aria-modal="true" style="padding-right: 16px;">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Instruction Master</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">×</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <div class="row form-group">
	      	<div class="col-sm-12">
	      		<input type="hidden" name="instruction_id" id="instruction_id">
	      		<input type="text" name="txt_instruction" id="txt_instruction" class="form-control" placeholder="enter instruction name..">
	      	</div>
	      </div>
	    </div>
	    <div class="modal-body">
	    	<button type="button" class="btn btn-primary swalDefaultSuccess" onclick="getInstructionSave()">Save changes</button>
	    </div>
	    <div class="modal-body">
	    	<div class="col-sm-12 card card-primary card-outline" style="padding: 5px;">
                <div class="row">
                     <div class="col-sm-12 text-primary text-center">
                      <h4>Content Added to Instruction</h4>
                    </div>
                </div><hr/>
                <div class="row">
                    <div class="col-sm-12" style="overflow-y:scroll;height: 250px;border: 1px; ">
                      <table class="table styled-table">
                        <thead>
                          <th>Instruction</th>
                          <th>Action</th>
                        </thead>
                        <tbody id="tbl_added_instruction">
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- modal -->
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#txt_serach_medicine').keyup(function() {
      search_table($(this).val());
    });

    function search_table(value){
      //alert();
      $('#tbl_medicine_master tr').each(function(){
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
    pList();
  });
function getdosesave()
{
  var dose_id=document.getElementById('dose_id').value;
  var txt_dose_name=document.getElementById('txt_dose_name').value;
  if (txt_dose_name=="") 
  {
      alert('enter dose name please');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Medicine_controller/dose_add",
           data:{
                   txt_dose_name:txt_dose_name,
                  
             }              
          }).done(function(message){
          //alert(message);
                document.getElementById('txt_dose_name').value="";
                all_dose()
           });
  }
}
function getInstructionSave()
{
  //var instrucntion_id=document.getElementById('instrucntion_id').value;
  var txt_instruction=document.getElementById('txt_instruction').value;
  if (txt_instruction=="") 
  {
      alert('enter instruction please');
  }
  else
  {
     $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>index.php/Medicine_controller/instruction_add",
           data:{
                   txt_instruction:txt_instruction,
                  
             }              
          }).done(function(message){
          //alert(message);
                document.getElementById('txt_instruction').value="";
                all_instruction()
           });
  }
}
function all_dose()
{
  
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getAllDose",
         data:{
                
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_dose').empty();
        $('#tbl_added_dose').append(message);

         });
}

function all_instruction()
{
  
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getAllInstruction",
         data:{
                
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_added_instruction').empty();
        $('#tbl_added_instruction').append(message);

         });
}
function showMedicine()
{
  $('#imgload').show();
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getAllMedicine",
         data:{
                
                
           }              
        }).done(function(message){
        //alert(message);
        var res=message.split('_|_');
        
        $('#tbl_medicine_search').empty();
        $('#tbl_medicine_search').append(message);
        $('#imgload').hide();

         });
}
function getEditMedicine(id)
{   
   

    $.ajax(
		    {
		      type:"POST",
		      url:"<?php print base_url(); ?>index.php/Medicine_controller/getMedicineEdit",
		      data:{
		              id:id
		            }
		    }).done(function(message){
		      var res=message.split('_|_');
		      
		      if(message!="")
		      {
		      		///$('#txt_medicine_id').val(id);
		      		$('#txt_medicine_id').val(res[0]);
		      		$('#txt_medicine_name').val(res[1]);
		      		$('#txt_qty').val(res[2]);
		      		$('#sel_dose_time').val(res[3]);
		      		$('#sel_instruction').val(res[4]);
		      		$('#txt_medicine_name').focus();

		      }


		    });

}
function getdeldose(chf_id,cnt)
{
  

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getdeladdDose",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_dose();

         });
}
function getdeladInstruction(chf_id,cnt)
{
  

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getdeladInstruction",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        all_instruction();

         });
}
function getdelMedicine(chf_id,cnt)
{
  

   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Medicine_controller/getdelMedicineChk",
         data:{
                chf_id:chf_id,
               
           }              
        }).done(function(message){
        //alert(message);
        showMedicine();
         });
}
</script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

</script>
</html>
<?php 
}
else
{
	redirect('Welcome/index');
}
?>