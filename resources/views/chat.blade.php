<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laravel Chat</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

	<div class="container">
		<div class="row" id="app">
			<ul class="list-group offset-4 col-4">
				<li class="list-group-item active">Chat Room</li>
				<input type="text" class="form-controll" placeholder="Type your message here...">
			</ul>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>