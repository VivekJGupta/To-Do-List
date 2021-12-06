<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

	<style>
		@media print
		{
			#print, #back
			{
				visibility: hidden;
			}
		}
	</style>

	<title>Print</title>
</head>
<body>
	<?php
		include 'connection.php';

		$id = $_GET['id'];

		$q = 'select * from task where id='.$id;
		$item = mysqli_query($conn, $q) or die("No Information available!");

		if(mysqli_num_rows($item)>0)
		{
			foreach($item as $note)
			{
	?>


	<div class="container d-flex justify-content-center">
		<div class="row mt-5 col-md-4 rounded d-flex align-middle" class="height:100%">
			<table class="table-borderless">
				<tr>
					<th>Note Date:</th>
					<td><?php echo $note['created_at'] ?></td>
				</tr>
				<tr>
					<th>Note Reminder:</th>
					<td><?php echo $note['reminder'] ?></td>
				</tr>
				<tr>
					<th>Title:</th>
					<td><?php echo $note['title'] ?></td>
				</tr>
				<tr>
					<th>To Do Note:</th>
					<td><?php echo $note['note'] ?></td>
				</tr>
			</table>
		<button id="print" class=" mt-3 btn btn-outline-primary" onclick="window.print(); remove()">PRINT</button>
		<a id="back" href="./" class=" mt-3 btn btn-outline-primary">Back</a>
		</div>
	</div>

	

<?php }} ?>


	<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>