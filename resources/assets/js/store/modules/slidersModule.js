export default {
  state: {
    sliders: []
  },

  getters: {
    sliders: (state) => state.sliders,
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
    }
  }
}