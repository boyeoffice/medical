import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		settings: {}
	},
	mutations: {
		settings_data(state, data){
			state.settings = data
		}
	}
})