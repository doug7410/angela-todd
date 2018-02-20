import AppInit from './components/AppInit'
import store from './store/index'
import { mapGetters, mapActions } from 'vuex'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('modal', require('./components/Modal.vue'))
Vue.component('carousel', require('./components/Carousel.vue'))
Vue.component('carousel-image-form', require('./components/CarouselImageForm.vue'))
Vue.component('portfolio-image-form', require('./components/PortfolioImageForm.vue'))
Vue.component('app-init', require('./components/AppInit'))
Vue.component('category-form', require('./components/CategoryForm.vue'))

const app = new Vue({
  el: '#app',
  data: {
    pageScrollPosition: 0,
    currentModal: ''
  },
  store,
  components: { AppInit },
  computed: {
    ...mapGetters([
      'sliders',
      'categories',
      'currentCategory',
    ]),
    navShrinkClass() {
     return this.pageScrollPosition > 200
    }
  },
  methods: {
    ...mapActions([
      'fetchAllCategories',
      'setCurrentCategoryId'
    ]),
    logout() {
      document.getElementById('logout-form').submit()
    }
  },
  mounted() {
    window.addEventListener('scroll', () => {
      this.pageScrollPosition = window.scrollY
    })

    this.fetchAllCategories()

  }
});
