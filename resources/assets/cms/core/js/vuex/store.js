import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		auth_user: window.User,
		url: window.url,
		titleTop: '',
		settings: {},
		stats: {},
		pieConsultMF:[],
		pieAdmissionMF: [],
		pieAdminOrigin: [],
		pieConsultOrigin: [],
		graphAdmin: [],
		graphConsult: []
	},
	mutations:{
		title_top_data(state, title){
			state.titleTop = title
		},
		settings_data(state, data){
			state.settings = data
		},
		stats_data(state, data){
			state.stats = data
		},
		pieConsultMF_data(state, data){
			state.pieConsultMF = data
		},
		pieAdmissionMF_data(state, data){
			state.pieAdmissionMF = data
		},
		pieAdminOrigin_data(state, data){
			state.pieAdminOrigin = data
		},
		pieConsultOrigin_data(state, data){
			state.pieConsultOrigin = data
		},
		graphAdmin_data(state, data){
			state.graphAdmin = data
		},
		graphConsult_data(state, data){
			state.graphConsult = data
		}
	}
})