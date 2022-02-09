<?php include 'header.php'; ?>
<title>Confirm Upload | Random Chapter Generator</title>
</head>
<body>
<?php include 'nav.php'; ?>
  <!-- Page Content -->
  <div class="container" style="margin-top: 100px">
	<div class="row">
<?php
//CONFIRM SUBMISSION
if (isset($_POST['submit'])){
	$readyforupload = true;
//CONFIRM UNIQUE DIRECTORY
	$seriesname = $_POST['seriesname'];
	$seriesdescription = $_POST['seriesdescription'];
	$uploaddir = "uploads/" . $seriesname . "/";
if (file_exists($uploaddir)){
	echo "Someone already uploaded series information for '" . $seriesname . "'. Try uploading something else.";
	$uniquedirectory = false;
}
else {
	$uniquedirectory = true;
}
if ($uniquedirectory){
	//CONFIRM SERIES LOGO FILE TYPE AND SAFETY
	if (isset($_FILES['serieslogo'])){
		$errors= array();
		if ($_FILES['serieslogo']['error'] !== UPLOAD_ERR_OK) {
			$errors[] = "Upload failed with error code " . $_FILES['serieslogo']['error'];
		}
		$info = getimagesize($_FILES['serieslogo']['tmp_name']);
		if ($info === FALSE) {
			$errors[] = "Unable to determine image type of uploaded file";
		}
		if (($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
			$errors[] = "Not a jpeg/png";
		}
		if(empty($errors)==true){
		//	echo "The series logo upload looks good.";
		}
		else{
			print_r($errors);
			echo "The series logo upload is wrong.";
			$readyforupload = false;
		}
	}
	else {
		echo "No series logo file upload.";
	}
//CHECK IF BOOKUPLOAD CSV FILE FITS CRITERIA
	if (isset($_FILES['bookinfo'])){
		$errors= array();
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
		if(in_array($_FILES['bookinfo']['type'],$mimes)){
		}
		else {
			$errors[]="The book info needs to be a CSV file.";
		}
		$file_ext=strtolower(end(explode('.',$_FILES['bookinfo']['name'])));
		$extensions= array("csv"); //accepted extensions
		if(in_array($file_ext,$extensions)=== false){
			$errors[]="The book info needs to be a CSV file.";
		}
		if($_FILES['bookinfo']['size'] > 2097152){
			$errors[]='The book info CSV size is too large. It needs to be 2 MB or less.';
		}
		if(empty($errors)==true){
		//	echo "The book info CSV file is the right type of file.";
			$valuestring = file_get_contents($_FILES['bookinfo']['tmp_name'],0,NULL,0,21);			
			if ($valuestring == "Book Number,Book Name"){
		//		echo "The book info CSV file contains the right content.";
				$bookarray = array();
				$tmpname = $_FILES['bookinfo']['tmp_name'];
				$file = fopen($tmpname, 'r');
				while (($result = fgetcsv($file)) !== false)
					$bookarray[] = $result;
				fclose($file);
				/*if(count($bookarray) == count(array_unique($bookarray))){
					echo "The unique count is equal.";
				}
				else {
					echo "The unique count is not equal.";
				}*/
			}
			else {
				$errors[] = "Looks like the book info CSV file isn't formatted correctly.";
				$readyforupload = false;
			}
		}
		else{
			print_r($errors);
			$readyforupload = false;
		}
   }
   else {
	 echo "No book info file upload.";  
   }
//CHECK IF CHAPTERUPLOAD CSV FILE FITS CRITERIA
   	if (isset($_FILES['chapterinfo'])){
		$errors= array();
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
		if(in_array($_FILES['chapterinfo']['type'],$mimes)){
		}
		else {
			$errors[]="The chapter info needs to be a CSV file.";
		}
		$file_ext=strtolower(end(explode('.',$_FILES['chapterinfo']['name'])));
		$extensions= array("csv"); //accepted extensions
		if(in_array($file_ext,$extensions)=== false){
			$errors[]="The chapter info needs to be a CSV file.";
		}
		if($_FILES['chapterinfo']['size'] > 2097152){
			$errors[]='The chapter info CSV size is too large. It needs to be 2 MB or less.';
		}
		if(empty($errors)==true){
	//		echo "The chapter info CSV upload looks good.";
			$valuestring = file_get_contents($_FILES['chapterinfo']['tmp_name'],0,NULL,0,61);
			if ($valuestring == "Total Chapter Number,Book Number,Chapter Number,Chapter Title"){
	//			echo "The chapter info CSV file contains the right content.";
				$chapterarray = array();
				$tmpname = $_FILES['chapterinfo']['tmp_name'];
				$file = fopen($tmpname, 'r');
				while ((($result = fgetcsv($file)) !== false) && ($result[0] != NULL)) {
					$chapterarray[] = $result;
				}
				fclose($file);
			}
			else {
				$errors[]= "Looks like the chapter info CSV file isn't formatted correctly.";
				$readyforupload = false;
			}
		}
		else{
			$readyforupload = false;
		}
   }
   else {
	 echo "No chapter info file upload.";  
   }
   //check that chapter info only contains books in the bookarray
   if ($readyforupload){
	//	$bookcheck = "All the books are in a listed book.";
		for ($i = 1; $i < count($chapterarray); $i++){
			if (array_key_exists($chapterarray[$i][1],$bookarray)){
			}
			else {
				$errors[] = "Oops! Looks like some of the chapters listed aren't in one of the books listed. Either fix the chapter or add another book!";
				$readyforupload = false;
			}
		}
//	echo $bookcheck;
   }
/*   if ($readyforupload) {
	?>
		<h1>Please confirm your information</h1>
		<p>Looks like all of the files are in the right format. Please confirm the information below by pressing the "Finalize" button. Otherwise go back to the upload page.</p>
		<?php
		echo "<h2>Series Name: " . $_POST['seriesname'] . "</h2>";
		echo "<br><p><b>Series Description:</b> " . $_POST['seriesdescription'] . "</p>";
		echo "<table class='table'><thead><th>Book Name</th><th>Chapter Number</th><th>Chapter Name</th></thead><tbody>";
		for ($i=1; $i < count($chapterarray); $i++){
			echo "<tr><td>" . $bookarray[$chapterarray[$i][1]][1] . "</td><td>" . $chapterarray[$i][2] . "</td><td>" .  $chapterarray[$i][3] . "</td></tr>";
		}
		echo "</tbody></table>";?>
		<!--<form method="post">
			<input type="submit" name="infoconfirm" value="Info is Correct"/> 
		</form>
		<a href="upload.php"><button>Info is Wrong. Try Again.</button></a>-->
	<?php
   }
   else {
	   print_r($errors);
    }
}
}*/
//CREATE DIRECTORY AND UPLOAD FILES
	if($readyforupload) {
		echo "<h1>Congratulations! The \"" . $seriesname . "\" series information has been uploaded.</h1>";
		//Create directory
		mkdir($uploaddir);
	//UPLOAD FILES. MAKE SURE TO CHANGE NAMES FOR STANDARDIZATION
		if ($uniquedirectory){
			$ImageFileName = $uploaddir . "serieslogo." . pathinfo($_FILES['serieslogo']['name'], PATHINFO_EXTENSION);
			$serieslogoextension =  pathinfo($_FILES['serieslogo']['name'], PATHINFO_EXTENSION);
			move_uploaded_file($_FILES['serieslogo']['tmp_name'], $ImageFileName);
			$FileName = $uploaddir . "bookupload.csv";
			move_uploaded_file($_FILES['bookinfo']['tmp_name'], $FileName);
			$FileName = $uploaddir . "chapterupload.csv";
			move_uploaded_file($_FILES['chapterinfo']['tmp_name'], $FileName);
		echo "<h1><a href='" . $uploaddir . "index.php'>You can view the created Random " . $seriesname . "Chapter Generator here.</a></h1>";
		}
	}
	else {
		echo "Unknown Error: <a href='upload.php'>Try uploading again.</a>";
	}
//create confirm page with artwork (create is artwork included section).

//CREATE INDEX.PHP FILE USING SERIES NAME AND DESCRIPTION, DRAWING FROM RANDOM_TEMPLATE.PHP
if ($readyforupload){
$FileName = $uploaddir . "index.php";
$content = '<?php $seriesname=\'' . $seriesname . '\';$seriesdescription=\'' . $seriesdescription . '\';$serieslogoextension=\'' . $serieslogoextension . "'; include '../../random_template.php';?>";
file_put_contents($FileName, $content);

//ADD LISTING TO SOME SORT OF ARRAY IN MAIN FOLDER FOR VIEWING ON MAIN PAGE
include 'databaseconnection.php';
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO series (timestamp, seriesname, seriesdescription, seriesurl, imageextension)
VALUES (now(), '$seriesname', '$seriesdescription', '$uploaddir', '$serieslogoextension')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
}
?>
	</div>
  </div>
<?php include 'footer.php'; ?>