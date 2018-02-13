import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
	state:{	
		payroll:[]	
	},
	
	getters:{
		
		allPays(state){
			return state.payroll
		}
	},
	
	mutations:{
		
		add_pay(state, pay){
			state.posts.push(pay)
		},
		
		
	}.
	actions: {
		buyStock:({commit}, order)=>{
		commit('BUY_STOCKS', order);
	},
		
	
)}