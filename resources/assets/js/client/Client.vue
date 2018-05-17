<template>
	<div>
		<navbar></navbar>
		<div class="container">
			<router-view></router-view>
		</div>
	</div>
</template>

<script>
import Navbar from './Navbar'
	export default {
		components: {Navbar},
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