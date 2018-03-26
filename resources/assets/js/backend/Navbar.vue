<template>
	<header class="main-header">
		<router-link class="logo" to="/">
			<span class="logo-mini">
				<b>A</b>LT
			</span>
			<span class="logo-lg">
				<b>Admin</b>LTE
			</span>
		</router-link>	
		<nav class="navbar navbar-static-top">
			<a href="javascript:void(0)" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle Navigation</span>
			</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown message-menu">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i>
							<span class="label label-success">0</span>
						</a>
					</li>
					<li class="dropdown notifications-menu">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">0</span>
						</a>
					</li>
					<li class="dropdown tasks-menu">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-flag-o"></i>
							<span class="label label-danger">0</span>
						</a>
					</li>
					<li class="dropdown user user-menu">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
							<img v-bind:src="userImage" alt="" class="user-image">
							<span class="hidden-xs">{{currentUser.name}}</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)" data-toggle="control-sidebar">
							<i class="fa fa-gears"></i>
						</a>
					</li>
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
			}
		}
	}
</script>