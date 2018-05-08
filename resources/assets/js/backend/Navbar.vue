<template>
	<header class="main-header">
		<router-link class="logo" to="/backend">
			<span class="logo-mini">
				<b>H</b>AT
			</span>
			<span class="logo-lg">
				<b>{{settings.site_name}}</b>
			</span>
		</router-link>	
		<nav class="navbar navbar-static-top">
			<a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle Navigation</span>
			</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<router-link to="/backend/messages" tag="li" class="dropdown messages-menu">
						<a>
						<i class="fa fa-envelope-o"></i>
						<span class="label label-success">0</span>
					    </a>
					</router-link>
					<router-link to="/backend/profile" class="dropdown user user-menu" tag="li">
						<a><img v-bind:src="userImage" alt="" class="user-image">
						<span class="hidden-xs">{{currentUser.name}}</span></a>
					</router-link>
					<router-link tag="li" to="/backend/settings"><a><i class="fa fa-gears"></i></a></router-link>
				</ul>
			</div>
		</nav>
	</header>
</template>

<script>
	export default {
		computed: {
			currentUser(){
				return this.$store.state.auth_user
			},
			userImage(){
				return this.$store.state.url + this.$store.state.auth_user.avatar
			},
			settings(){
				return this.$store.state.settings
			}
		}
	}
</script>