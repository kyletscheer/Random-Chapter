<?php include 'header.php'; ?>
<title>Contact | Random Chapter Generator</title>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!--Prevents submit before recaptcha check -->
	<script>
		function enableBtn(){
			document.getElementById("submit_details").disabled = false;
			document.getElementById("robot_confirm").style.display = "none";
		}
	</script>
</head>
<body>
<?php include 'nav.php'; ?>
<!-- Page Content -->
<div class="container" style="margin-top: 100px">
  	<div class="row">
		<h1>Contact Me</h1>
	</div>
</div>
<?php
if (!$_POST['submit']){?>
<div class="container" id="contactcontainer">
  <form action="contact.php" method="post">

    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" placeholder="Your name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your email address"><br>
    <label for="issue">What's the issue?</label>
    <select id="issue" name="issue">
      <option value="question">I have a question</option>
      <option value="error">I'm reporting an error</option>
      <option value="other">Something else</option>
    </select>

    <label for="Message">Message</label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:200px" required></textarea>
	<div class="g-recaptcha" data-sitekey="6LcOkh8UAAAAAAayj7lw13nhIsNYKho1KGvXHN8n" data-callback="enableBtn"></div>
    <input name="submit" id="submit_details" type="submit" value="Submit" disabled><p id="robot_confirm">Confirm you aren't a robot.</p>


  </form>
</div>
<?php
}
else{
$time = date("l jS \of F Y h:i:s A");
$msg = "Name: " . $_POST['name'] . "   Email: " . $_POST['email'] . "    Issue: " . $_POST['issue'] . "    Message: " . $_POST['message'] . "    Sent: " . $time;
$msg = wordwrap($msg,70);
mail("kyletscheer@gmail.com","New Random Chapter Generator Contact Email",$msg);
echo "<div class='alert alert-success'>
  <strong>Thanks for reaching out!</strong> If you included your email I'll reach back out soon.
</div>";
}
?>
<style>
/* Style inputs with type="text", select elements and textareas */
input[type=text], input[type=email], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
#contactcontainer {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<?php include 'footer.php'; ?>