<template>
	<div class="content">
		<div class="row">
			<div class="col-md-offset-3 col-md-4">
				<!-- Inbox -->
				<div class="box box-primary" v-if="inboxList">
					<div class="box-header with-border">
						<h3 class="box-title">Messages</h3>
						<div class="box-tools">
							<a href="javascript:void(0)" class="btn btn-success btn-sm" @click="newMessage"><i class="fa fa-plus"></i> New</a>
						</div>
					</div>
					<div class="box-body">
						<li class="li-group-msg hoverList" v-for="(data, index) in inbox">
							<a href="javascript:void(0)" @click="directChat(data)" class="see_msg list-group-item border-group">
								<div class="media" v-if="data.last[0]">
									<div class="pull-left">
										<img :src="url + data.to.avatar" class="border-image-profile-2 media-object img-circle image-dropdown" alt="Image">
									</div>
									<div class="media-body clearfix">
										<div class="pull-right small">
											<span class="timestap timeAgo myicon-right">{{data.last[0].created_at | moment("from")}}</span>
										</div>
										<div class="media-nowrap">
											<strong class="media-heading" v-if="data.last[0].from_user_id == authUser.id && data.last[0].to.id != authUser.id">{{data.last[0].to.name }}</strong>

											<strong class="media-heading" v-else>{{ data.last[0].from.name }}</strong>
										</div>
										<p class="text-col">
											<small>
												<i class="fa fa-envelope-o"></i>
												{{ data.last[0].message }}
											</small>
										</p>
									</div>
								</div>
							</a>
						</li>
					</div>
				</div>
				<!-- User's list -->
				<div class="box box-danger" v-if="memberList">
					<div class="box-header with-border">
						<h3 class="box-title">Member</h3>
						<div class="box-tools pull-right">
							<input type="text" class="form-control input-sm" placeholder="Search">
						</div>
					</div>
					<div class="box-body no-padding">
						<ul class="users-list clearfix">
							<li v-for="(data, index) in model" v-if="data.id != authUser.id">
								<img :src="url + data.avatar" width="50" height="50">
								<a href="javascript:void(0)"  @click="clickUser(data)" class="users-list-name">{{data.username}}</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Direct chat -->
				<div class="box box-warning direct-chat-warning" v-if="chatList">
					<div class="box-header with-border">
							<img :src="url + form.avatar" class="img img-circle" width="25" height="25">
							<small>{{form.name}}</small>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts" @click="newMessage"">
                                 <i class="fa fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Inbox">
                                 <i class="fa fa-envelope"></i>
                                </button>
							</div>
					</div>
					<div class="box-body">
						<div class="direct-chat-messages">
							<div v-for="data in chat">
							<div :class="{'direct-chat-msg': true, 'right': data.from_user_id != authUser.id}">
			                      <div class="direct-chat-info clearfix">
			                        <span :class="{'direct-chat-name': true, 'pull-right': data.from_user_id != authUser.id}">{{data.from.name}}</span>
			                        <span :class="{'direct-chat-timestamp': true, 'pull-right': data.from_user_id == authUser.id}">{{data.created_at | moment("from", "now")}}</span>
			                      </div>
			                      <!-- /.direct-chat-info -->
			                      <img class="direct-chat-img" :src="url + data.from.avatar" alt="image"><!-- /.direct-chat-img -->
			                      <div class="direct-chat-text">
			                        {{data.message}}
			                      </div>
			                      <!-- /.direct-chat-text -->
			                    </div>
			                    <!-- /.direct-chat-msg -->
			                </div>
						</div>
					</div>
					<div class="box-footer">
						<div class="input-group">
							<input type="text" v-model="form.message" class="form-control" placeholder="Type Message...">
							<span class="input-group-btn">
								<button class="btn btn-warning btn-flat" type="button" v-if="! isSending" @click="send">Send</button>
								<button class="btn btn-warning btn-flat" type="button" v-else disabled=""><i class="fa fa-spinner fa-spin"></i></button>
							</span>
						</div>
					</div>
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
	.li-group-msg {
		border-bottom: 1px solid #CFCFCF;
	}
	.image-dropdown {
		height: 40px;
		width: 40px;
	}
	li {
		list-style: none;
	}
	.list-group-item {
		border: none;
	}
	.media-nowrap {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.myicon-right {
    margin-right: 4px;
}
.text-col {
    margin-bottom: 5px !important;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    line-height: 17px;
}
</style>