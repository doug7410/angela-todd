import { mapActions } from 'vuex'

export default {
  name: 'app-init',
  props: {
    sliders: Array
  },
  methods: {
    ...mapActions(['setSliders', 'fetchAllCategories'])
  },
  created() {
    this.setSliders(this.sliders)
    this.fetchAllCategories()
  },
  render() {
    return
  }
}


