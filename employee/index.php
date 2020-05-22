<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Import File</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="container mt-3">
			<h2>Upload File</h2>
			<form action="/ecommerce/employee/Importer.php" method="post" name="import_form" id="import_form" enctype="multipart/form-data">

				<div class="custom-file mb-3">
					<input type="file" class="custom-file-input" id="import_file" name="import_file">
					<label class="custom-file-label" for="customFile">Choose file</label>
				</div>

				<div class="mt-3">
      				<button type="submit" id="submit_data" class="btn btn-primary">Submit</button>
    			</div>

			</form>
		</div>

		<script>
		
		
		$( document ).ready(function() {

			$(".custom-file-input").on("change", function() {
				var fileName = $(this).val().split("\\").pop();
				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});


			$('#submit_data').click( function(e){
				e.preventDefault();
				
				if( document.getElementById("import_file").files.length == 0 ){
				    alert('Please select file');
				    return false;
				}

				$( "#import_form" ).submit();
			})
		});
		</script>


	</body>
</html>
