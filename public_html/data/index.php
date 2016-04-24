<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>sql import manager</title>

<link rel="stylesheet" type="text/css" href="../styles/styles.css" />
<script scr="../../resources/jquery.min.js"></script>
<script src="../javascript/js.js"></script>

</head>

<body style="left: -186px; top: 9px">

<?php
require ('./dirstat.php');
require ('./uploader.php');
?>

<div >
<h1 class="form-container2">SQL file manager</h1>
	
</div>
<a href="../panel.php">go back</a>
<table style="width: 107px; height: 32px">
<tr>
<td>
<div style="text-align:center; width: 75px;"  style="width: 66px">
<a href='#' class='button' onclick="tableshow()">upload</a>
</div>
</td>
</tr>
</table>

<table style="width: 99%; height: 350px">
	<tr>
		<td style="width: 35px">
		</td>
		<td style="width: 200px">
		
		<?php dirstat(); ?>
		</td>
		<td style="width: 21px">&nbsp;</td>
		<td style="width: 100px">
		<?php dirstat2(); ?>
		</td>
		<td style="width: 23px">
		</td>
		<td style="width: 349px">
		<table id="table" style="display:none"><tr><td>
		
		<form enctype="multipart/form-data"  method="POST"  class="form-container" >

			<div class="form-title">Browse file</div>
			<input  type="file" name="uploadedfile" /><br />
						<br />
			<div class="submit-container">
			<input class="submit-button" type="submit" value="upload" />
			<br />
			</div>
		</form>

		</td></tr></table>
						</td>
	</tr>
</table>



</body>

</html>
