import { mapActions } from 'vuex'

export default {
  name: 'app-init',
  props: {
    sliders: Array
  },
  methods: {
    ...mapActions(['setSliders'])
  },
  created() {
    this.setSliders(this.sliders)
  },
  render() {
    return
  }
}


