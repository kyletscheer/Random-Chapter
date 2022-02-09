<?php include 'header.php'; ?>
<title>About | Random Chapter Generator</title>
</head>
<body>
<?php include 'nav.php'; ?>
  <!-- Page Content -->
  <div class="container" style="margin-top: 100px">
  	<div class="row">
		<h1>Random Chapter Generator Guide</h1>
	</div>
    <br />
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        Here is some basic information about the Random Chapter Generator and how to upload your favorite series to our database. 
    </div>
    <br />
    <div class="" id="accordion">
        <div class="faqHeader">General questions</div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What is the purpose of this site?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="card-block">
                   <br> Ever had the urge to just open a favorite book series of yours, turn to a random page, and just dive in? This provides a tool for where to dive in. <br><br> 
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Can I submit my own favorite book series?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="card-block">
                    <br>Yes! Below there is a guide on how to submit your own favorite book series.<br><br>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">The information is wrong. How can I report that?</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="card-block">
                    <br>You can reach out to me via the <a href="contact.php" target="_blank">Contact Page</a> to report an error. Just tell me what page you are on, and what the error is, and I'll try to get that solved.
               <br><br> </div>
            </div>
        </div>
        <div class="faqHeader">Uploading Guide</div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">How can you upload to Random Chapter Generator?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="card-block">
                    <strong>Step 1: Gather Book Series Information</strong>
					<br>
					<p>
					<li>1. Get a list of the books in the series, in order.</li>
					<li>2. Get a list of the chapters in each book.</li>
					<li>3. Get a description/summary of the series. Wikipedia is good for this.</li>
					<li>4. Get an image representing the books for the series logo. Needs to be a JPG or PNG file.</li>
					</p>
					<br>
                    <strong>Step 2: Download template CSV's</strong>
					<br>
					<p><a href="https://www.dropbox.com/sh/yxxx9s8suz0lkw5/AACgvZd67MrwMWYkXn-yiH9Ya?dl=0" target="_blank">Download the bookuploadtemplate.csv and chapteruploadtemplate.csv.</a></p>
					<br>
					<strong>Step 3: Put information in CSV's</strong>
					<p>Put the book information in the bookupload CSV, and the chapter information in the chapterupload CSV. Check out the example CSV's in the <a href="https://www.dropbox.com/sh/yxxx9s8suz0lkw5/AACgvZd67MrwMWYkXn-yiH9Ya?dl=0" target="_blank">Dropbox folder</a> for an example.</p>
					<div class="alert alert-warning">
						<strong>Remember!</strong> Don't include any (") double quotation marks in your CSV file. Instead, use (') single quotation marks.</a>.
					</div>
					<br>
					<strong>Step 4: Save the CSV's</strong>
					<p>Make sure to save them as CSV files.</p>
					<br>
					<strong>Step 5: Go to the <a href="upload.php" target="_blank">upload page</a> and upload the information</strong>
					<p>Once you upload the information, I do some checks on the files to make sure they are looking good, and then the information is formatted and turned into a random chapter generator! If you receive an error, read the error and try to fix the problem with the documents you uploaded. If you are still having trouble, reach out to me on the <a href="contact.php" target="_blank">contact page</a>.</p>
					<br>
					<strong>You're done. Congrats!</strong>
                </div>
            </div>
        </div>
     <!--   <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">I want to sell my items - what are the steps?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="card-block">
                    The steps involved in this process are really simple. All you need to do is:
                    <ul>
                        <li>Register an account</li>
                        <li>Activate your account</li>
                        <li>Go to the <strong>Themes</strong> section and upload your theme</li>
                        <li>The next step is the approval step, which usually takes about 72 hours.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How much do I get from each sale?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="card-block">
                    Here, at <strong>PrepBootstrap</strong>, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.
                    <br />
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="card-block">
                    There are a number of reasons why you should join us:
                    <ul>
                        <li>A great 70% flat rate for your items.</li>
                        <li>Fast response/approval times. Many sites take weeks to process a theme or template. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for a template/theme to get reviewed.</li>
                        <li>We are not an exclusive marketplace. This means that you can sell your items on <strong>PrepBootstrap</strong>, as well as on any other marketplate, and thus increase your earning potential.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="card-block">
                    The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment. 
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="card-block">
                    Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account. 
                    The minimum amount of your balance should be at least 70 USD. 
                </div>
            </div>
        </div>-->
    </div>
</div>

<style>
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "e072"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
	.card-block {
	margin-left: 30px;
	}
</style>

<?php include 'footer.php'; ?>