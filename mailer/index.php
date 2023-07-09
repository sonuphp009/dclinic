<form id="mail_form">
    Email Address:<br>
    <input type="text" name="email"><br><br>
    Message:<br>
    <textarea name="message"></textarea><br><br>
    <button type="button" onclick="send()" id="submit">Submit</button>
	<button style="display:none;" type="button" id="process-btn">Proccess</button>
</form>

<script src="mailer.js"></script>
<script src="jquery.min.js"></script>