<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Laravel Chat</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

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
			<div class="offset-3 col-6 offset-sm-1 col-sm-10">
				<span class="list-group-item active">Chat Room</span>
                <div class="badge badge-pill badge-primary">@{{ typing }}</div>

				<ul class="list-group" v-chat-scroll>

					<message 
						v-for="(item,index) in chat.messages"
						:key=item.index
						:color=chat.colors[index]
						:user=chat.users[index]
                        :time=chat.times[index]
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