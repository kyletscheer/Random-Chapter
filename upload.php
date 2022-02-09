<?php include 'header.php'; ?>
<title>Upload | Random Chapter Generator</title>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!--Prevents submit before recaptcha check -->
	<script>
		function enableBtn(){
			document.getElementById("submit_details").disabled = false;
			document.getElementById("robot_confirm").style.display = "none";
		}
	</script>
	<!--Shows image on upload -->
	<script>
	function readURL(input) {
	  if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
		  $('#blah')
			.attr('src', e.target.result)
			.width(150)
			.height(200);
		};
		reader.readAsDataURL(input.files[0]);
	  }
	}
	</script>
</head>
<body>
<?php include 'nav.php'; ?>
  <!-- Page Content -->
  <div class="container" style="margin-top: 100px">
	<div class="row">
		<h1>Upload Your Favorite Series</h1>
		<p>The Random Chapter Generator is a crowdsourced tool, and it relies on users like you to make it what it is. Below you can submit information for your </p>
		<form class="form" action="upload_confirm.php" enctype="multipart/form-data" method="post">
		<!--limit series name to no / or no "-->
		Series Name - <input type="text" maxlength="40" id="seriesname" name="seriesname" placeholder="A Song of Ice and Fire" required/><br><br>
		Series Description - <textarea maxlength="500" name="seriesdescription" id="seriesdescription" cols="40" rows="5" placeholder="A Song of Ice and Fire is a series of epic fantasy novels by the American novelist and screenwriter George R. R. Martin. He began the first volume of the series, A Game of Thrones, in 1991, and it was published in 1996." required></textarea><br>
		Series Logo - <input name="serieslogo" id="serieslogo" type="file" accept=".jpg, .png, .jpeg" onchange="readURL(this);" required/><br><br>
		<img id="blah" src="#" alt="Preview Image Upload Here" /><br><br><br>
		<!--
		Limit to 50 mb and to CSV file type.
		Create guide on format and templates for download.
		
		
		-->
		Book Info CSV- <input type="file" name="bookinfo" id="bookinfo" accept=".csv" required/><br><br>
		Chapter Info CSV- <input type="file" name="chapterinfo" id="chapterinfo" accept=".csv" required/><br><br>
		      <div class="g-recaptcha" data-sitekey="6LcOkh8UAAAAAAayj7lw13nhIsNYKho1KGvXHN8n" data-callback="enableBtn"></div>
		<input type="submit" id="submit_details" name="submit" disabled><p id="robot_confirm">Confirm you aren't a robot.</p>

		</form>
	</div>

  </div>
  	<script>
document.getElementById('seriesname').onkeyup = function(event) {
    this.value = this.value.replace(/[^a-zA-Z\d\s]/, '');
}
	</script>
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