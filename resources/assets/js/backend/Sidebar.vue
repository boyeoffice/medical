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
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<router-link to="/backend" tag="li">
					<a><i class="fa fa-dashboard"></i>
						<span>Dashboard</span></a>
				</router-link>
				<li class="treeview" v-if="authUser.is_admin == 1">
					<a href="javascript:void(0)">
						<i class="fa fa-users"></i>
						<span>Manage Users</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<router-link to="/backend/manage/users" tag="li">
							<a>
								<i class="fa fa-circle-o"></i>
								All Users
							</a>
						</router-link>
					</ul>
				</li>
				<router-link to="/backend/consults" tag="li">
					<a><i class="fa fa-plus-square"></i>
						<span>Consultas</span></a>
				</router-link>
				<router-link to="/backend/admission" tag="li">
					<a><i class="fa fa-medkit"></i>
						<span>Internamento</span></a>
				</router-link>
				<router-link to="/backend/techniques" tag="li">
					<a><i class="fa fa-hospital-o"></i>
						<span>Técnicas</span></a>
				</router-link>
				<li class="treeview" v-if="authUser.is_admin == 1">
					<a href="javascript:void(0)">
						<i class="fa fa-database"></i>
						<span>Gestão de Campos </span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<router-link to="/backend/suggestions/icd10_group" tag="li">
							<a>
								<i class="fa fa-circle-o"></i>
								Grupos ICD 10
							</a>
						</router-link>
						<router-link to="/backend/suggestions/icd10_single" tag="li">
							<a>
								<i class="fa fa-circle-o"></i>
								ICD 10
							</a>
						</router-link>
						<router-link to="/backend/suggestions/origin_destination" tag="li">
							<a>
								<i class="fa fa-circle-o"></i>
								Origem/Destino
							</a>
						</router-link>
						<router-link to="/backend/suggestions/query_techniques" tag="li">
							<a>
								<i class="fa fa-circle-o"></i>
								Técnicas
							</a>
						</router-link>
						<router-link to="/backend/suggestions/specialty" tag="li">
							<a>
								<i class="fa fa-circle-o"></i>
								Especialidade
							</a>
						</router-link>
					</ul>
				</li>
				<router-link to="/backend/atividade-cientifica" tag="li">
				<a>
					<i class="fa fa-user"></i>
					<span>Atividade Cientifica</span>
				</a>
				</router-link>
				<router-link to="/backend/formacao" tag="li">
				<a>
					<i class="fa fa-user"></i>
					<span>Formacao</span>
				</a>
				</router-link>
				<router-link to="/backend/agenda" tag="li">
				<a><i class="fa fa-calendar"></i>
				<span>Agenda</span></a>
				</router-link>
				<router-link v-if="authUser.is_admin == 1" to="/backend/settings" tag="li">
					<a><i class="fa  fa-gears"></i>
						<span>Settings</span></a>
				</router-link>
			</ul>
		</section>
	</aside>
</template>

<script>
	export default {
		data(){
			return{
				authUser: window.User
			}
		},
		computed: {
			currentUser(){
				return this.$store.state.auth_user
			},
			userImage(){
				return this.$store.state.url + this.$store.state.auth_user.avatar
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