<div id="chat_room" data-chatroom-url="{{ Request::server('SERVER_NAME'); }}">
	<div class="container">
		<div id="chat_input">
			<form class="form-inline">
				<input type="text" class="input" id="chat-message" placeholder="即時聊天!">
			</form>
		</div>
		<div id="chat-log">
			<div class="chat_row">
				<span class="chat_name"></span>
				<span class="chat_message"></span>
			</div>
		</div>
	</div>
</div>