import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../Layouts'
import ParentLayout from '../ParentLayout'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
	{
		path: '/backend',
		component: Dashboard,
		children: [
		    {path: '/', component: require('../views')},
		    {
		    	path: 'manage/users',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/users')},
		    	{path: 'create', component: require('../views/users/form')},
		    	{path: 'edit/:id', component: require('../views/users/form'), meta: {mode: 'edit'}}
		    	]
		    },
		    {
		    	path: 'consults',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/consult')},
		    	{path: 'create', component: require('../views/consult/form.vue')}
		    	]
		    },
		    {
		    	path: 'adminssion',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/adminssion')},
		    	{path: 'create', component: require('../views/adminssion/form')}
		    	]
		    },
		    {
		    	path: 'suggestions',
		    	component: ParentLayout,
		    	children: [
		    	{path: 'icd10_group', component: require('../views/suggestions/Icd10group')},
		    	{path: 'icd10_single', component: require('../views/suggestions/Icd10single')},
		    	{path: 'origin_destination', component: require('../views/suggestions/origindestination')},
		    	{path: 'query_techniques', component: require('../views/suggestions/querytechniques')},
		    	{path: 'specialty', component: require('../views/suggestions/specialty')}
		    	]
		    }
		]
	}
	]
})
export default router