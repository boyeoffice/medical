<template>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default" v-if="inboxList">
			<div class="panel-heading">
				<h3 class="panel-title">Inbox</h3>
				<div class="panel-tools pull-right"><a href="javascript:void(0)" @click="newMessage" class="btn btn-success btn-sm">New</a></div>
			</div>
			<div class="panel-body">
				<ul>
					<li v-for="(data, index) in inbox">
						<a href="javascript:void(0)" @click="directChat(data)" class="message-list hoverList">
						<span class="pull-right timeAgo">{{data.last[0].created_at | moment("from")}}</span>
						<span class="msg-name" v-if="data.last[0].from_user_id == authUser.id && data.last[0].to.id != authUser.id">{{data.last[0].to.name }}</span>
						<span v-else class="pull-left msg-name">{{ data.last[0].from.name }}</span>
						<div class="media-body text-message clearfix pull-left">
							<i class="fa fa-envelope"></i>  {{ data.last[0].message }}
						</div>
					</a>
					</li>
					<hr>
				</ul>
			</div>
		</div>
		<!-- /.panel-default -->
		<div class="panel panel-default"  v-if="memberList">
			<div class="panel-heading">
				<h3 class="panel-title">Member</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th><th>Email</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="data in users">
							<td>{{ data.name}}</td><td>{{ data.email}}</td><td><button @click="clickUser(data)" class="btn btn-primary btn-sm">Message</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.panel-default -->
		<div class="panel panel-default" v-if="chatList">
			<div class="panel-heading">
				<h3 class="panel-title">Direct Chat</h3>
				<div class="pull-right panel-tools">
					<a href="javascript:void(0)" @click="newMessage" tooltip="Contact"><i class="fa fa-comment"></i></a>
					<a href="javascript:void(0)" tooltip="Inbox" @click="clickInbox"><i class="fa fa-envelope"></i></a>
				</div>
			</div>
			<div class="panel-body">
			 <div class="direct-chat-wrapper">
				<div class="direct-chat-message" v-for="(data, index) in chat">
					<div :class="{'direct-chat-msg': true, 'right': data.from_user_id != authUser.id}">
						<div class="direct-chat-info clearfix">
							<span :class="{'direct-chat-name': true, 'pull-right': data.from_user_id != authUser.id}">{{data.from.name}} </span>
							<span :class="{'direct-chat-timestamp': true, 'pull-right': data.from_user_id == authUser.id}"> {{data.created_at | moment("from", "now")}}</span>
						</div>
						<div class="direct-chat-text">
							{{data.message}}
						</div>
					</div>
				</div>
			</div>
		  </div>
		  <div class="panel-footer">
		  	<div class="input-group">
		  		<input type="text" class="form-control" placeholder="Type message..." v-model="form.message">
		  		<span class="input-group-btn">
		  			<button disabled="" v-if="isSending" class="btn btn-warning"><i class="fa fa-spinner fa-spin"></i></button>
		  			<button class="btn btn-warning" v-else @click="send">Send</button>
		  		</span>
		  	</div>
		  </div>
		</div>
	</div>
</template>

<script>
	import Index from './index.js'
	export default Index
</script>

<style>
	body {
		overflow-x: hidden;
	}
	li {
		list-style: none;
	}
	li span.msg-name {
		font-size: 12px;
		font-weight: 600;
		color: #636b6f;
	}
	li span.timeAgo {
		padding-right: 20px;
		font-size: 12px;
		color: #999;
	}
	.panel-tools {
		top: 5px;
		right: 15px;
		padding-right: 18px;
		position: absolute;
	}
	.message-list {
		color: #333;
	}
	.message-list:focus, .message-list:hover {
		color: #333;
		text-transform: none;
		text-decoration: none;
	}
	.text-message {
		color: #444;
	}
	.direct-chat-wrapper {
		transform: translate(0, 0);
		padding: 10px;
		overflow-x: hidden;
		overflow-y: auto;
		height: 250px;
	}
	.direct-chat-info {
		font-size: 12px;
	}
	.direct-chat-name {
		font-weight: 600;
	}
	.direct-chat-timestamp {
		color: #999;
	}
	.direct-chat-text {
    border-radius: 5px;
    position: relative;
    padding: 5px 10px;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    margin: 5px 0 0 50px;
    color: #444;
}
.direct-chat-text {
    color: #444;
}
.direct-chat-text::after, .direct-chat-text::before {
    position: absolute;
    right: 100%;
    top: 15px;
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    width: 0;
    pointer-events: none;
}
.direct-chat-text::before {
    border-width: 6px;
    margin-top: -6px;
}
.right > .direct-chat-text::after, .right > .direct-chat-text::before {
    border-left-color: #f39c12;
}
.right .direct-chat-text {
    margin-right: 50px;
    margin-left: 0;
}
.right > .direct-chat-text {
    background: #f39c12;
    border-color: #f39c12;
    color: #fff;
}
.right .direct-chat-text::after, .right .direct-chat-text::before {
    right: auto;
    left: 100%;
    border-right-color: transparent;
}
</style>
