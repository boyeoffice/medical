<template>
	<div class="wrapper">
		<navbar></navbar>
		<sidebar></sidebar>
		<div class="content-wrapper">
			<section class="content-header"><h1>Dashboard</h1></section>
			<router-view></router-view>
		</div>
		<main-footer></main-footer>
	</div>
</template>

<script>
import Navbar from './Navbar'
import Sidebar from './Sidebar'
import MainFooter from './Footer'
	export default {
		components: {Navbar, Sidebar, MainFooter},
		mounted(){
			this.fetchData()
		},
		methods: {
			fetchData(){
				axios.get('/pt-v1/manage/setting').then(res => {
					this.$store.commit('settings_data', res.data)
				})
			}
		}
	}
</script>
<style>
	a:focus {
		outline: none;
	}
</style>