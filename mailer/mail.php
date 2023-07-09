<?php
//print_r ($_POST); exit;
 $email = $_POST['email'];
 $msg = $_POST['message'];
 //echo $message;exit;
require("PHPMailerAutoload.php");

	 
$mail = new PHPMailer();
	$message = '
			 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Edvantez </title>
<style>
/* -------------------------------------
		GLOBAL
------------------------------------- */
* {
	margin: 0;
	padding: 0;
	font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	font-size: 100%;
	line-height: 1.6;
}

img {
	max-width: 100%;
}

body {
	-webkit-font-smoothing: antialiased;
	-webkit-text-size-adjust: none;
	width: 100%!important;
	height: 100%;
}


/* -------------------------------------
		ELEMENTS
------------------------------------- */
a {
	color: #348eda;
}

.btn-primary {
	text-decoration: none;
	color: #FFF;
	background-color: #348eda;
	border: solid #348eda;
	border-width: 10px 20px;
	line-height: 2;
	font-weight: bold;
	margin-right: 10px;
	text-align: center;
	cursor: pointer;
	display: inline-block;
	border-radius: 25px;
}

.btn-secondary {
	text-decoration: none;
	color: #FFF;
	background-color: #aaa;
	border: solid #aaa;
	border-width: 10px 20px;
	line-height: 2;
	font-weight: bold;
	margin-right: 10px;
	text-align: center;
	cursor: pointer;
	display: inline-block;
	border-radius: 25px;
}

.last {
	margin-bottom: 0;
}

.first {
	margin-top: 0;
}

.padding {
	padding: 10px 0;
}


/* -------------------------------------
		BODY
------------------------------------- */
table.body-wrap {
	width: 100%;
	padding: 20px;
}

table.body-wrap .container {
	border: 1px solid #f0f0f0;
}


/* -------------------------------------
		FOOTER
------------------------------------- */
table.footer-wrap {
	width: 100%;	
	clear: both!important;
}

.footer-wrap .container p {
	font-size: 12px;
	color: #666;
	
}

table.footer-wrap a {
	color: #999;
}


/* -------------------------------------
		TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	color: #000;
	margin: 40px 0 10px;
	line-height: 1.2;
	font-weight: 200;
}

h1 {
	font-size: 36px;
}
h2 {
	font-size: 28px;
}
h3 {
	font-size: 22px;
}

p, ul, ol {
	margin-bottom: 10px;
	font-weight: normal;
	font-size: 14px;
}

ul li, ol li {
	margin-left: 5px;
	list-style-position: inside;
}
 
 
.container {
	display: block!important;
	max-width: 600px!important;
	margin: 0 auto!important; /* makes it centered */
	clear: both!important;
}
 
.body-wrap .container {
	padding: 20px;
}

 .content {
	max-width: 600px;
	margin: 0 auto;
	display: block;
}
 
.content table {
	width: 100%;
}

</style>
</head>

<body bgcolor="#f6f6f6">
<table class="body-wrap" style="padding:10px;" width="100%" align="center" bgcolor="#f6f6f6">
	<tr>
		<td width="20%"></td>
		<td class="container" bgcolor="#FFFFFF" style="padding:10px;border:1px solid #eee;">

			<!-- content -->
			<div class="content">
			<table width="100%">
				<tr>
					<td> 
						<p>Hello,'.$email.'</p>
						<p>'.$msg.'</p>
						 
						 <p>Test mail</p>
					</td>
				</tr>
			</table>
			</div> 
			
		</td>
		<td width="20%"></td>
	</tr>
</table>
</body>
';
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "ansarimuzammil606@gmail.com";
$mail->Password = "muzammil606";
$mail->setFrom("ansarimuzammil606@gmail.com");
$mail->Subject = "Test";
$mail->Body = "$message";
$mail->AddAddress("$email");

//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
	echo "Failed to connect.";

exit;
} else {

echo "Thank you for connecting us!";
}



?>