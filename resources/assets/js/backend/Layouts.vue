<template>
	<div class="wrapper">
		<navbar></navbar>
		<sidebar></sidebar>
		<div class="content-wrapper">
			<section class="content-header"><h1>{{title}}</h1></section>
			<router-view></router-view>
		</div>
		<main-footer></main-footer>
	</div>
</template>

<script>
import Navbar from './Navbar'
import Sidebar from './Sidebar'
import MainFooter from './Footer'
	export default{
		components: {Navbar, Sidebar, MainFooter},
		computed: {
			title(){
				return this.$store.state.titleTop
			}
		},
		beforeMount(){
			this.fectchData()
		},
		methods: {
			fectchData(){
			axios.get('/md-vs2/manage/setting').then(res => {
				this.$store.commit('settings_data', res.data)
			})
		}
		}
	}
</script>