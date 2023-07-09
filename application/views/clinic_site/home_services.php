<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>NP Infotech</title>
  <?php $this->load->view('css');?>
</head>
<body>
<div class="wrapper">
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php $this->load->view('navbar');?>
<?php $this->load->view('asid_bar');?>
	<div class="content-wrapper">
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-center text-primary">
					<h4>Slider Master</h4>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
		<!-- section B -->
					<form  name="f1" action="<?php  echo site_url('Welcome/insert_slider'); ?>"    enctype="multipart/form-data"  method="post">
					<div class="row form-group">
						
						<div class="col-sm-12">
							<label class="control-label" style="">Slider Title:</label>
							<input type="hidden" name="sldr_id" id="sldr_id">
							<input name="txt_sldr_title" type="text" id="txt_sldr_title" class="form-control" placeholder="Slider Titlef........"  required />
						</div>
					</div>
					<div class="row form-group">
						
						<div class="col-sm-12">
							<label class="control-label" style="">Slider Description:</label>
							<input name="txt_sldr_desc" type="text" id="txt_sldr_desc" class="form-control" placeholder="Slider Description........"  required />
						</div>
					</div>
					<div class="row form-group">
						
						<div class="col-sm-12">
							<label class="control-label" style=""> Slider Image:</label>
							<input type="hidden" name="txt_sldr_file" id="txt_sldr_file">
							        <input type="file" name="slider_pic" onchange="readURL(this);" required/>

						</div>
					</div>
					<div class="row panel-body">
						
						<div class="col-sm-9">
							<input  type="Submit" class="btn btn-success" value="Submit" align ="center"/>
								<input name="Reset" type="reset" class="btn btn-primary" id="Reset" value="Cancel" align ="center"/>
						</div>
					</div>
					<hr/>
					<div class="col-sm-12 pull-right">
							<button type="button" class="btn btn-success btn-block" onclick="getSliderResult()">Show Result <i class="fa fa-search"></i></button>
					</div><hr/>
					<div class="col-sm-12 panel-body">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txt_slider_search" id="txt_slider_search" placeholder="Search..............">
							</div>
						</div>
					</div>
					<div class="col-sm-12 panel-body">
							<div class="table-responsive" style="height:200px;width:100%;overflow:scroll;overflow-x:scroll;overflow-y:scroll;">
									<table class="table table-hover" id="dwnld_table">
										<thead >
                                          <tr class="" style="width: 100%;">
                                                <th style="color:#000000;width: 10%;">Sr. No.</th>
                                                 <th style="color:#000000;width: 30%;">Title</th>
                                                 
                                               
                                                  <th style="text-align:center; color:#000;width: 10%;">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="tbl_slider">
                                       
                                        </tbody>
									</table>
							</div>
						</div>

				</form>
			</div>
		</div>

	</div>
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#txt_slider_search').keyup(function() {
      search_table($(this).val());
    });

    function search_table(value){
      //alert();
      $('#tbl_slider tr').each(function(){
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
function confirmation_slider(id)
 {
		
		
			if(id!="")
			{
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/del_slider",
					   data:{
							   aid:id,
							  
							 }              
						}).done(function(message){
						//toast();
					//alert(message);
					getSliderResult();

						
					   });
			}
			
		
		
 }	  		
 function getEditSlider(id)
{
		
		
		//alert(category);
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getSliderEdit",
					   data:{
							   id:id,
							 }              
						}).done(function(message){
						var res=message.split('_|_');
					     //alert(message);
					     
					      $('#sldr_id').val(id);
					     $('#txt_sldr_title').val(res[0]);
					      $('#txt_sldr_desc').val(res[1]);
					      $('#txt_sldr_file').val(res[2]);
					      $('[href="#sectionB"]').tab('show');
					      $('#txt_sldr_title').focus();
      
					   });
	
		
 }	
function getSliderResult()
{
		
			 $.ajax({
					  type:"POST",
					  url:"<?php echo base_url();?>index.php/Welcome/getSliderResultTable",
					   data:{
							   
							 }              
						}).done(function(message){
						//toast();
					//alert(message);
					$('#tbl_slider').empty();
					$('#tbl_slider').append(message);
						
					   });
					
}
</script>
</html>
<?php 
?>