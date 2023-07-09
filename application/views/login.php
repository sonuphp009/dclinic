<!DOCTYPE html>
<html>
<head>
	<title>NP Infotech</title>
	<?php $this->load->view('css');?>
  <link rel="stylesheet" href="<?php print base_url(); ?>asset/Admin/login.css">
</head>
<body style="background-image: url('<?php echo base_url()."asset/clinic_logo/bKImg2.jpg";?>');background-repeat: no-repeat;height: 100%; background-position: center;
  background-repeat: no-repeat;
  background-size: cover;padding: 10px;" >

  <br/> <br/>
<div class="container">
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar"><img class="img img-circle" src="<?php echo base_url()."asset/clinic_logo/dhan_logo.jfif";?>" style="height: 80px;width: 90px;margin-top: 10px;"></div>
            <div class="form-box">
                <form name="f1" action="<?php  echo site_url('Index_controller/get_login'); ?>" novalidate=""   enctype="multipart/form-data"  method="post">
                  <div class="row form-group">
                    <div class="col-sm-12">

                        <label id="lab_login"></label>
                    </div>  
                    <div class="col-sm-12">
                      <input name="userid" id="userid" type="text" placeholder="username">
                    </div>
                    <div class="col-sm-12">
                      <input type="password" name="password" id="password" placeholder="password">
                    </div>
                    <div class="col-sm-12" style="margin-top: 20px;">
                      <a href="#" onclick="chk_modal()" class="btn btn-info btn-flat"> Sign Up</a>
                      <button class="btn btn-info btn-flat" type="button" onClick="login_profile()" name="save" ><i class="fa fa-user" ></i>&nbsp; Login <i id="imgload" style="display: none;" class="fa fa-spinner fa-spin"></i></button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
        
</div>
<!-- modal -->
<div class="modal" id="modal_signup" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign Up Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row" id="signupdiv" style="background-color: #fff; opacity: 0.9;">
    <div class="col-sm-12 text-center">
      <h1>Sign Up For Free</h1>
    </div>
    <div class="col-sm-12" >
        <form  name="f1" action="<?php  echo site_url('Welcome/insert_patient_new_signup'); ?>"    enctype="multipart/form-data"  method="post">
                                <div class="row">

                                  <div class="col-sm-12 text-center">
                                      <label id="lab_login" ></label>
                                  </div>
                                </div>
                                <div class="row form-group " style="padding: 10px;">
                                    <div class="col-sm-12 form-group text-left ">
                                      <input type="hidden" name="txt_clinic_id" id="txt_clinic_id" value="5">
                                            <label class="control-label">Upload Profile Photo( ) :</label>
                                            <input type="file" name="fle_option1" id="fle_option1" class="form-control" onchange="Test.UpdatePreview(this)" accept="image/*" capture="" required>
                                        </div>
                                    <div class="col-sm-12 form-group text-left">
                                      <label>First Name</label>
                                      <input type="text" name="txt_patient_first_name" id="txt_patient_first_name" class="form-control " placeholder="Enter Firsr Name" onclick="change_lbl()" onblur="chkPatient()" required>
                                    </div>
                                    <div class="col-sm-12 form-group text-left ">
                                      <label>Middle Name</label>
                                      <input type="text" name="txt_patient_middle_name" id="txt_patient_middle_name" class="form-control " placeholder="Enter Middle Name" onblur="chkPatient()" onclick="change_lbl()" required>
                                    </div>
                                    <div class="col-sm-12 form-group text-left ">
                                      <label>Last Name</label>
                                      <input type="text" name="txt_patient_last_name" id="txt_patient_last_name" class="form-control " placeholder="Enter Last Name" onclick="change_lbl()" onblur="chkPatient()" required>
                                    </div>
                                    <div class="col-sm-12 form-group text-left ">
                                      <label>Mobile No</label>
                                      <input type="text" name="txt_patient_mobile" id="txt_patient_mobile" class="form-control" placeholder="Enter Mobile Number" onblur="chkPatient()" required>
                                    </div>
                                    <div class="col-sm-12 form-group text-left "><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                      <label>Address</label>
                                      <textarea name="txt_patient_address" id="txt_patient_address" class="form-control" placeholder="Enter Address" spellcheck="false" required></textarea>
                                    </div>
                                    <div class="col-sm-12 form-group text-left ">
                                      <label>Date of birth</label>
                                      <input type="date" name="txt_dob" id="txt_dob" class="form-control" onchange="calage()" placeholder="" required>
                                    </div>
                                    <div class="col-sm-12 form-group text-left ">
                                      <label>Age</label>
                                      <input type="txet" name="txt_age" id="txt_age" class="form-control" placeholder="" autocomplete="off" required>
                                    </div>
                                    <div class="col-sm-12 form-group text-left">
                                      <label>Blood Group</label>
                                      <select name="sel_bg" id="sel_bg" class="form-control" required>
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
                                  </div>
                                  <div class="row" style="padding: 10px;">
                                    <div class="col-lg-6  col-md-6 col-xs-6">
                                      <button id="btn_signup" type="submit" class="btn btn-success " >Submit</button>
                                      <button type="reset" class="btn btn-danger " >Cancel</button>

                                    </div>
                                  </div>
                               
        </form>

    </div>

</div>
      </div>
     
    </div>
  </div>
</div>
<!-- modal -->
<?php $this->load->view('javascript');?>
</body>
<script>
/*$(function(){
var textfield = $("input[name=user]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                //little validation just to check username
                if (textfield.val() != "") {
                    //$("body").scrollTo("#output");
                    $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                    $("#output").removeClass(' alert-danger');
                    $("input").css({
                    "height":"0",
                    "padding":"0",
                    "margin":"0",
                    "opacity":"0"
                    });
                    //change button text 
                    $('button[type="submit"]').html("continue")
                    .removeClass("btn-info")
                    .addClass("btn-default").click(function(){
                    $("input").css({
                    "height":"auto",
                    "padding":"10px",
                    "opacity":"1"
                    }).val("");
                    });
                    
                    //show avatar
                    $(".avatar").css({
                        "background-image": "url('http://api.randomuser.me/0.3.2/portraits/women/35.jpg')"
                    });
                } else {
                    //remove success mesage replaced with error message
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
                }
                //console.log(textfield.val());

            });
});*/

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
function readURL(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function chkPatient()
{
  //$('#imgload').show();
 
 
  var txt_patient_first_name=$('#txt_patient_first_name').val();
  var txt_patient_middle_name=$('#txt_patient_middle_name').val();
  var txt_patient_last_name=$('#txt_patient_last_name').val();
  var txt_patient_mobile=$('#txt_patient_mobile').val();
  //document.getElementById('txt_ap_date'+cnt).value;
 //alert(sel_status);
   $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>index.php/Welcome/chkPatientName",
         data:{
                txt_patient_first_name:txt_patient_first_name,
                txt_patient_middle_name:txt_patient_middle_name,
                txt_patient_last_name:txt_patient_last_name,
                txt_patient_mobile:txt_patient_mobile,
           }              
        }).done(function(message){
        //]]alert(message);
        if(message=="chk")
        {
            $('#lab_signup').text("Patient is already exist !");  
            $('#lab_signup').css("color","Red");
            $(':input[type="submit"]').prop('disabled', true);
        }
        else
        {
            $(':input[type="submit"]').prop('disabled', false);
            $('#lab_signup').text("");
        }
        
        //$('#imgload').hide();

         });
}
function change_lbl()
{
  $(':input[type="submit"]').prop('disabled', false);
  $('#lab_signup').text("");
}
function chk_modal()
{
  $('#modal_signup').modal('show');
}
function login_profile()
{
  var userid=document.getElementById("userid").value
  var password=document.getElementById("password").value
  //alert(id);
  //document.getElementById("ch_id").value=id;
  $('#imgload').show();
  if(userid=="")
  {
  		
  		alert('Enter Username Please');
  }
  else if(password=="")
  {
  		
  		alert('Enter Password Please');
  }
  else
  {
  
		  $.ajax(
		    {
		      type:"POST",
		      url:"<?php print base_url(); ?>index.php/Welcome/get_login",
		      data:{
		              userid:userid,
		              password:password
		            }
		    }).done(function(message){
		      var res=message.split('_|_');
		 //alert(message);
		    $('#imgload').hide();
		   if(message!="")
		     {
		         
		         /*if(message=="admin" || message=="user")
		         {*/
              if(message=="admin" || message=="user" || message=="super_admin")
              {
		            window.location = "<?php print base_url(); ?>index.php/Welcome/index2";
		             //window.location("<?php //print base_url(); ?>index.php/Welcome/index2");
              }
              else if(message=="patient")
              {
                window.location = "<?php print base_url(); ?>index.php/Welcome/patient_dashboard";
                 //window.location("<?php //print base_url(); ?>index.php/Welcome/index2");
              }
              else if(message=="Receptionist")
              {
                window.location = "<?php print base_url(); ?>index.php/Welcome/user_dashboard";
                 //window.location("<?php //print base_url(); ?>index.php/Welcome/index2");
              }
              else if(message=="mail_msg")
              {
                $('#lab_login').text("Your Can't Login Anymore Please Renew Package Of Software To This Year !");  
                $('#lab_login').css("color","#17a2b8");
              }
		         /*}
		         else if(message=="student" || message=="demo" || message=="new")
		         {
		             window.location = "<?php //print base_url(); ?>index.php/Welcome/index";
		           //window.location("<?php //print base_url(); ?>index.php/Welcome/index");
		         }
		         else if(message=="entrance")
		         {
		             window.location = "<?php //print base_url(); ?>index.php/Entrance_exam_controller";
		           //window.location("<?php //print base_url(); ?>index.php/Welcome/index");
		         }*/
		    }
		    else
		    {
		      
		        $('#lab_login').text("Invalid username or password");  
		        $('#lab_login').css("color","#17a2b8");
		        //alert("Wrong UserName or Password");
		    }

		    
		     
		      //$('#myModalc').modal('show');
		  });
	}
}
</script>
</html>
