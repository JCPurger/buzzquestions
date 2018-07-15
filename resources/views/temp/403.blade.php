<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>403</title>

	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	
</head>
<body>

	<div class="jumbotron jumbotron-fluid center">
		<div class="container">
			<h1 class="display-4">Forbidden</h1>
			<p class="lead">{{ $exception->getMessage() }}</p>
			<a class="btn btn-warning btn-lg" href="#" role="button">Página Inicial</a>
		</div>
	</div>

</body>
</html>