import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		auth_user: window.User,
		url: window.url,
		titleTop: ''
	},
	mutations:{
		title_top_data(state, title){
			state.titleTop = title
		}
	}
})