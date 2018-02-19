import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    sliders: [],
    categories: [],
    currentModal: ''
  },

  getters: {
    sliders: (state) => state.sliders,
    categories: (state) => state.categories,
  },

  actions: {
    setSliders({commit}, sliders) {
      commit('ADD_SLIDERS', sliders)
    },
    addSlider({commit}, slider) {
      commit('NEW_SLIDER', slider)
    },
    removeSlider({commit}, id) {
      commit('DELETE_SLIDE', id)
    },
    updateOrder({commit}, sliders) {
      axios.post('/sliders/reorder', sliders).then(() => {
        commit('UPDATE_ORDER', sliders)
      }).catch(error => console.log(error))
    },
    fetchAllCategories({commit}) {
      axios.get('/categories').then(response => {
        commit('SET_CATEGORIES', response.data)
      })
    },
    setCategories({commit}, categories) {
      commit('SET_CATEGORIES', categories)
    }
  },

  mutations: {
    ADD_SLIDERS (state, sliders) {
      state.sliders = sliders
    },
    NEW_SLIDER (state, slider) {
      state.sliders.push(slider)
    },
    DELETE_SLIDE (state, id) {
      console.log()
      state.sliders = state.sliders.filter(slide => slide.id !== id)
    },
    UPDATE_ORDER (state, sliders) {
      state.sliders = sliders
    },
    UPDATE_CURRENT_MODAL (state, modalName) {
      state.currentModal = modalName
    },
    SET_CATEGORIES (state, categories) {
      state.categories = categories
    }
  }

})