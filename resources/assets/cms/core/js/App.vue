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
import Navbar from '_/inc/navbar'
import Sidebar from '_/inc/sidebar'
import MainFooter from '_/inc/footer'
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

<style>
.form-control {
	border-radius: 4px;
}
.form-control:focus {
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */
.fade {
	transition: opacity .3s ease;
}
.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-content,
.modal-leave-active .modal-content {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
