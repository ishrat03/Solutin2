<!DOCTYPE html>
<html>
<head>
	<title>Solution 2</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

	<div class="container-fluid">
		<div class="card py-2">
			<div class="card-header text-center">
				<h2>Entry Form</h2>
			</div>
			<div class="card-body">
				<form id="solution2" method="post" action="solution2.php">
					<div class="form-group row">
						<label class="col-sm-1 text-right" for="breadQty">Qty of Breads</label>
						<div class="col-sm-3">
							<input type="number" id="breadQty" name="breadQty" class="form-control" placeholder="Bread Qty">
							
						</div>

						<label class="col-sm-1 text-right" for="vadaQty">Qty of Vada</label>
						<div class="col-sm-3">
							<input type="number" id="vadaQty" name="vadaQty" class="form-control" placeholder="Vada Qty">
							
						</div>

						<label class="col-sm-1 text-right" for="samosaQty">Qty of Vada</label>
						<div class="col-sm-3">
							<input type="number" id="samosaQty" name="samosaQty" class="form-control" placeholder="Samosa Qty">
							
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 text-right" for="vadaPrice">Vada Price</label>
						<div class="col-sm-4">
							<input type="number" id="vadaPrice" name="vadaPrice" class="form-control" placeholder="Vada Price">
							
						</div>

						<label class="col-sm-2 text-right" for="samosaPrice">Samosa Price</label>
						<div class="col-sm-4 col-md-4">
							<input type="number" id="samosaPrice" name="samosaPrice" class="form-control" placeholder="Samosa Price">
							
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							
						</div>
						<div class="col-sm-4 col-md-4">
							<input type="submit" name="submit" class="btn btn-sm btn-block btn-primary" value="Submit">
						</div>

						<div class="col-sm-4 col-md-4">
							
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="card py-4" id="resultBox" style="display: none;">
			<div class="card-header text-center">
				<h3>Result</h3>
			</div>

			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Maximum Sold</th>
							<th>Samosa Sold</th>
							<th>Samosa Left</th>
							<th>Vada Sold</th>
							<th>Vada Left</th>
							<th>Bread Left</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="totalPrice"></td>
							<td id="samosaSold"></td>
							<td id="samosaLeft"></td>
							<td id="vadaSold"></td>
							<td id="vadaLeft"></td>
							<td id="breadLeft"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#solution2').submit(function(e)
			{
				e.preventDefault();

				$.ajax(
				{
					url:'calculation.php',
					method:'post',
					data: $('#solution2').serializeArray(),
					dataType: 'json',
					async:false,
					success:function(response)
					{
						$('#totalPrice').html(response.totalPrice);
						$('#samosaSold').html(response.samosaSold);
						$('#samosaLeft').html(response.samosaLeft);
						$('#vadaSold').html(response.vadaSold);
						$('#vadaLeft').html(response.vadaLeft);
						$('#breadLeft').html(response.breadLeft);
						$('#resultBox').show();
					},
					error:function()
					{
						alert('Try Again');
					}
				})
			})
		})
	</script>
</body>
</html>

