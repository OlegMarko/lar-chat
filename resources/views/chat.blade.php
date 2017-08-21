<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Laravel Chat</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<style type="text/css">
		.list-group {
			overflow-y: scroll;
			height: 200px;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row" id="app">
			<div class="offset-4 col-4">
				<span class="list-group-item active">Chat Room</span>

				<ul class="list-group" v-chat-scroll>

					<message 
						v-for="item in chat.messages" 
						:key=item.index
						color='success'
					>
						@{{ item }}
					</message>

				</ul>

				<input type="text" class="form-control" placeholder="Type your message here..." v-model="message" @keyup.enter="send">
			</div>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>