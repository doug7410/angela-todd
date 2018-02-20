import axios from 'axios'

export default {
  state: {
    categories: [],
    currentCategoryId: null
  },

  getters: {
    categories: (state) => state.categories,
    currentCategory: (state) => state.categories.filter(cat => cat.id === state.currentCategoryId)[0],
  },

  actions: {
    fetchAllCategories({commit}) {
      axios.get('/categories').then(response => {
        commit('SET_CATEGORIES', response.data)
      })
    },
    setCategories({commit}, categories) {
      commit('SET_CATEGORIES', categories)
    },
    setCurrentCategoryId({commit}, id) {
      commit('CURRENT_CATEGORY_ID', id)
    },
    addCategoryImages({commit}, formData) {
      axios.post('/category/images', formData).then((response) => {
        commit('UPDATE_CATEGORIES', response.data)
      }).catch(e => console.log(e))
    }
  },

  mutations: {
    SET_CATEGORIES (state, categories) {
      state.categories = categories
    },
    CURRENT_CATEGORY_ID (state, id) {
      state.currentCategoryId = id
    },
    UPDATE_CATEGORIES (state, updatedCategory) {
      state.categories = state.categories.map(category => {
        return (category.id === updatedCategory.id) ? updatedCategory : category
      })
    }
  }
}