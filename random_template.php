<?php include '../../header.php'; ?>
<title><?php echo $seriesname; ?> | Random Chapter Generator</title>
	<style>
	.advancedbutton {
	  background-color: white;
	  color: #ADADAD;
	  border: 2px solid #E7E7E7;
	}
	@font-face {
		font-family: harryfont;
		src: url(HARRYP.TTF);
	}
	#title {
		font-family: harryfont;
	}
	</style>
</head>
<body>

 <?php include '../../nav.php'; ?>
<?php
//create array of book info upload
$bookarray = array();
$file = fopen('bookupload.csv', 'r');

while (($result = fgetcsv($file)) !== false)
{
    $bookarray[] = $result;
}

fclose($file);

//create array of chapter info upload
$chapterarray = array();
$file = fopen('chapterupload.csv', 'r');

while (($result = fgetcsv($file)) !== false)
{
    $chapterarray[] = $result;
}

fclose($file);
?>
<div class="row">
      <div class="col-lg-12 text-center">
	  		<img height="100px" style="margin-top: 100px;" src="serieslogo.<?php echo $serieslogoextension;?>"></img>
        <h1 class="">Random <?php echo $seriesname;?> Chapter Generator</h1>
		<p><?php echo $seriesdescription;?></p>
		<button class="advancedbutton" onclick="toggleAdvanced()"><i>Advanced Filter</i></button>
		<form action="index.php" method="post">
		<div id="advanced" class="text-center" style="display:none">
		<h5>Get chapters from:</h5>
		<input type="checkbox" id="all" name="all" value="all" <?php if(isset($_POST['all'])) echo "checked='checked'"; ?> />
		<label for="all"> All Books</label><br>
		<?php
		$selectedbooks = array();
		if(isset($_POST['submit'])){
			if(!empty($_POST['books'])) {
				foreach($_POST['books'] as $value){
					array_push($selectedbooks, $value);
				}
			}
		}
		for ($i=1; $i < count($bookarray); $i++){
		?>
			<input type="checkbox" id="<?php echo $bookarray[$i][0];?>" class="checkBoxClass" name="books[]" value="<?php echo $bookarray[$i][0];?>" <?php if(in_array($bookarray[$i][0],$selectedbooks)) echo "checked='checked'"; ?>/>
			<label for="<?php echo $bookarray[$i][0];?>"> <?php echo $bookarray[$i][1];?></label><br>
		<?php }?>
		</div><br>
		<input type="submit" name="submit" value="Random Chapter"/>
		</form>
	</div>
	</div>
	<div class="row">
    <div class="col-lg-12 text-center">
		<?php
		$filter = "You are filtering books.";
		if (!empty($selectedbooks)){
		while (!in_array($chapterarray[$tempchapternumber][1], $selectedbooks)){
			$tempchapternumber = mt_rand(0,199);
			}
		}
		else {
		$tempchapternumber = mt_rand(0,199);
		}
		$chapternumber = $tempchapternumber;
		if ($tempchapternumber){
			echo "<br>";
			if (!empty($_POST['books'])){
				$string = implode(", ", $selectedbooks);
				echo "<i>" . $filter . " Books " . $string . " are selected.</i>";
				echo "<br><br>";
			}
			echo "<div id='title'><h3>Book " . $chapterarray[$chapternumber][1] . ": " . $bookarray[$chapterarray[$chapternumber][1]][1] . "</h3></div>";
			echo "<h1>Chapter " . $chapterarray[$chapternumber][2] . ": " . $chapterarray[$chapternumber][3] . "</h1>";
		//	echo "<img width='200' height='200' src=\"chapterart/" . $chapterarray[$chapternumber][2] . ".jpg\"></img>";
			}
		?>
      </div>
    </div>
	<script>
function toggleAdvanced() {
  var x = document.getElementById("advanced");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
$(document).ready(function () {
    $("#all").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });
});
</script>
<?php include '../../footer.php'; ?>