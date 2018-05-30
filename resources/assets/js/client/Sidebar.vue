<template>
	<aside class="main-sidebar">
		<section class="sidebar" style="height: auto;">
			<div class="user-panel">
				<div class="pull-left image">
					<img v-bind:src="userImage" alt="" class="img-circle">
				</div>
				<div class="pull-left info">
				<p>{{currentUser.name}}</p>
				<router-link to="/backend/profile"><i class="fa fa-user text-success"> Profile</i></router-link>
				<a href="javascript:void(0)" @click.stop="logout"><i class="fa fa-power-off text-warning"> Logout</i></a>
			   </div>
			</div>
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<router-link to="/home" tag="li">
					<a><i class="fa fa-dashboard"></i>
						<span>Dashboard</span></a>
				</router-link>
				<router-link to="/home/consults" tag="li">
					<a><i class="fa fa-plus-square"></i>
						<span>Consultas</span></a>
				</router-link>
				<router-link to="/home/admission" tag="li">
					<a><i class="fa fa-medkit"></i>
						<span>Internamento</span></a>
				</router-link>
			</ul>
		</section>
	</aside>
</template>

<script>
	export default {
		computed: {
			currentUser(){
				return window.User
			},
			userImage(){
				return window.url + window.User.avatar
			}
		},
		methods:{
			logout(){
				axios.post('/logout').then(res => {
					window.location = '/login'
				})
			}
		}
	}
</script>