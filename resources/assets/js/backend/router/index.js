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
		    {path: '/', component: require('../views/index.vue')},
		    {
		    	path: 'manage/users',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/users')},
		    	{path: 'create', component: require('../views/users/form.vue')},
		    	{path: ':id/edit', component: require('../views/users/form.vue'), meta: {mode: 'edit'}}
		    	]
		    },
		    {
		    	path: 'consults',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/consult')},
		    	{path: 'create', component: require('../views/consult/form.vue')},
		    	{path: ':id/edit', component: require('../views/consult/form.vue'), meta: {mode: 'edit'}}
		    	]
		    },
		    {
		    	path: 'admission',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/admission')},
		    	{path: 'create', component: require('../views/admission/form.vue')},
		    	{path: ':id/edit', component: require('../views/admission/form.vue'), meta: {mode: 'edit'}}
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
		    },
		    {
		    	path: 'settings',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/settings/form.vue')}
		    	]
		    },
		    {
		    	path: 'profile',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/profile/index.vue')}
		    	]
		    },
		    {
		    	path: 'techniques',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/technique/index.vue')}
		    	]
		    }
		]
	}
	]
})
export default router