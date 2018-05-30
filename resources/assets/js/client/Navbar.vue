<template>
	<header class="main-header">
		<router-link class="logo" to="/backend">
			<span class="logo-mini">
				<b>H</b>AT
			</span>
			<span class="logo-lg">
				<b>{{setting.site_name}}</b>
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
						<span class="label label-success">{{ newMsgCount }}</span>
					    </a>
					</router-link>
					<router-link to="/backend/profile" class="dropdown user user-menu" tag="li">
						<a><img v-bind:src="uri + currentUser.avatar" alt="" class="user-image">
						<span class="hidden-xs">{{ currentUser.name }}</span></a>
					</router-link>
					<li><a href="javascript:void(0)" data-toggle="logout" title="logout" @click="logout"><i class="fa fa-power-off"></i></a></li>
				</ul>
			</div>
		</nav>
	</header>
</template>

<script>
	export default {
		data(){
			return {
				newMsgCount: '',
				currentUser: window.User,
				uri: window.url
			}
		},
		computed: {
			setting(){
				return this.$store.state.settings
			}
		},
		mounted(){
			axios.get('/md-vs2/manage/messages_count').then(res => {
				this.newMsgCount = res.data
			})
		    },
			methods: {
				logout(){
				axios.post('/logout').then(res => {
					window.location = '/login'
				})
			}
		}
	}
</script>