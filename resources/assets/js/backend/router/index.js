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
		    },
		    {
		    	path: 'messages',
		    	component: ParentLayout,
		    	children: [
		    	{path: '/', component: require('../views/message/index.vue')}
		    	]
			},
			{
				path: 'agenda',
				component: ParentLayout,
				children: [
					{path: '/', component: require('../views/agenda/index.vue')},
					{path: 'create-event', component: require('../views/agenda/form.vue')},
					{path: ':id/edit', component: require('../views/agenda/form.vue'), meta: {mode: 'edit'}}
				]
			},
			{
				path: 'formacao',
				component: ParentLayout,
				children: [
					{path: '/', component: require('../views/formacao/index.vue')},
					{path: 'create', component: require('../views/formacao/form.vue')}
				]
			},
			{
				path: 'atividade-cientifica',
				component: ParentLayout,
				children: [
					{path: '/', component: require('../views/atividade-cientifica/index.vue')},
					{path: 'create', component: require('../views/atividade-cientifica/form.vue')},
					{path: ':id/edit', component: require('../views/atividade-cientifica/form.vue')}
				]
			}
		]
	}
	]
})
export default router