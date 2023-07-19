<?php include 'header.php'; ?>
<title>Home | Random Chapter Generator</title>

</head>

<body>
	<?php include 'nav.php'; ?>
	<!-- Page Content -->
	<div class="container" style="margin-top: 100px">
		<div class="row">
			<h1>Random Chapter Generator</h1>
			<p>Random Chapter Generator is free crowdsourced tool that randomly picks chapters from your favorite books and book series.</p>
			<h1><i>The code here is obviously not valid. That is because it isn't actually connecting to a MySQL database (yet).</i></h1>
		</div>
		<div class="row">
			<h4>Featured book series</h4>
		</div>
		<div class="row">
			<?php
			include 'databaseconnection.php';
			$allseriesarray = array();
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT seriesname, seriesdescription, seriesurl, imageextension FROM series";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					$allseriesarray[] = $row;
				}
			} else {
				echo "0 results";
			}
			$conn->close();
			for ($i = 0; $i < count($allseriesarray); $i++) {
				echo "<div class='col-md-2'><div class='thumbnail'><a href='" .  $allseriesarray[$i][seriesurl] . "index.php'><img src='" . $allseriesarray[$i][seriesurl] . "serieslogo." . $allseriesarray[$i][imageextension] . "' alt='" . $allseriesarray[$i][seriesname] . " series logo' style='width:100px;'><div class='caption'><p>" . $allseriesarray[$i][seriesname] . "</p></div></a></div></div>";
				if (($i % 4) == 0 && $i != 0) {
					echo "</div><div class='row'>";
				}
			}
			?>
		</div>
	</div>
	</div>

	</div>
	<?php include 'footer.php'; ?>