import Vue from 'vue'
import Vuex from 'vuex'
import categoriesModule from './modules/categoriesModule'
import slidersModule from './modules/slidersModule'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    categories: categoriesModule,
    sliders: slidersModule
  }
})