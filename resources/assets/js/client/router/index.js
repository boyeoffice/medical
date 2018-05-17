import Vue from 'vue'
import VueRouter from 'vue-router'
import Client from '../Client.vue'
import Layouts from '../Layouts'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
	{
		path: '/home',
		component: Client,
		children: [
		{path: '/', component: require('../views/index.vue')},
		{
			path: 'account',
			component: Layouts,
			children: [
			{path: '/', component: require('../views/account/index.vue')}
			]
		},
		{
			path: 'message',
			component: Layouts,
			children: [
			{path: '/', component: require('../views/message/index.vue')}
			]
		}
		]
	}
	]
})
export default router