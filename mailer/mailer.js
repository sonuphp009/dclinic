function send(){
//alert("1");
$('#submit').hide();

	$('#process-btn').show();
	$.ajax({
		type: "POST",
		url: "mail.php",
		data: new FormData($("#mail_form")[0]),
		contentType: false,
        processData: false,		
		dataType: "html",
		success: function(data){
			//alert(data);
		    if(data =='succes'){
				$('#submit').hide();
				$('#submit-button').hide();
	$('#process-btn').hide();
	
	$('#response').show();
	
		setTimeout(function(){ location.reload(); }, 2000);		
				
		}else 
		{
			$('#submit-button').show();
	$('#process-btn').hide();
			
		}
		
        console.log(data);

                    }
 		
		});

}