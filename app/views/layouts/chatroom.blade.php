<div id="chat-room-container">
	<div id="chat-room" data-chatroom-url="{{ Request::server('SERVER_NAME'); }}">
		<div id="chat-room-button">按我</div>
		<div class="container">
			<div id="chat-log">
				<div class="chat-row">
					<span class="chat-name"></span>
					<span class="chat-message"></span>
				</div>
			</div>
			<div id="chat-input">
				<form class="form-inline">
					<input type="text" class="input" id="chat-message" placeholder="即時聊天!">
				</form>
			</div>
		</div>
	</div>
<div>