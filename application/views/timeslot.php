<?php
	 $p_name = $_POST['p_name'];
	
	
 $booking_start_time          = "09:30";			// The time of the first slot in 24 hour H:M format  
 $booking_end_time            = "19:00"; 			// The time of the last slot in 24 hour H:M format  
 $booking_frequency           = 10;   			// The slot frequency per hour, expressed in minutes.  	

// Day Related Variables

 $day_format					= 1;				// Day format of the table header.  Possible values (1, 2, 3)   
															// 1 = Show First digit, eg: "M"
															// 2 = Show First 3 letters, eg: "Mon"
															// 3 = Full Day, eg: "Monday"
	
 $day_closed					= array("Saturday", "Sunday"); 	// If you don't want any 'closed' days, remove the day so it becomes: = array();
 $day_closed_text				= "CLOSED"; 		// If you don't want any any 'closed' remove the text so it becomes: = "";


echo "
	<div id='outer_booking'><h2>Available Slots</h2>

	<p>
	The following slots are available on  $p_name
	</p>
	
	<table width='400' border='0' cellpadding='2' cellspacing='0' id='booking'>
		<tr>
			<th width='150' align='left'>Start</th>
			<th width='150' align='left'>End</th>
			
			<th width='20' align='left'>Book</th>			
		</tr>
		<tr>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		</tr>";
				

		// Create $slots array of the booking times
		for($i = strtotime($booking_start_time); $i<= strtotime($booking_end_time); $i = $i + $booking_frequency * 60) {
			$slots[] = date("H:i:s", $i);  
		}			
				

		// Loop through $this->bookings array and remove any previously booked slots
		// Close if
		
				
		
		// Loop through the $slots array and create the booking table
		
		foreach($slots as $i => $start) {			

			// Calculate finish time
			$finish_time = strtotime($start) + $booking_frequency * 60; 
		
			echo "
			<tr>\r\n
				<td>" . $start . "</td>\r\n
				<td>" . date("H:i:s", $finish_time) . "</td>\r\n
				
				<td width='110'><input name='time_chk' data-val='" . $start . " - " . date("H:i:s", $finish_time) . "' class='fields' type='checkbox'></td>
			</tr>";
		
		} // Close foreach			
	
		echo "</table></div><!-- Close outer_booking DIV -->";
?>