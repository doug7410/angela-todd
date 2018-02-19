<template>
  <div class="carousel-wrapper" :style="{height: carouselHeight + 'px'}">
    <slot></slot>

    <a v-if="!hideArrows" class="left carousel-nav" role="button" @click.prevent="navigatePrev()">
      <img src="img/06_left.png" alt="prev-img">
    </a>
    <a v-if="!hideArrows" class="right carousel-nav" role="button" @click.prevent="navigateNext()">
      <img src="img/05_right.png" alt="next-img">
    </a>

    <ol class="carousel-indicators" v-if="!hideIndicators">
        <li v-for="(slide, index) in slides"
            :class="{'active' : index === currentSlide}"
            @click="navigateToSlide(index)"
        ></li>
    </ol>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        slides: [],
        currentSlide: 0,
        slideWidth: 0,
        transition: '.35s ease-out',
        autoPlayTimer: null,
        windowHeight: null
      }
    },
    props: {
      height: [Number, String],
      hideIndicators: Boolean,
      hideArrows: Boolean
    },
    methods: {
      incrementSlide() {
        this.currentSlide = this.currentlyOnLastSlide ? this.nextSlideIndex : 0
      },
      decrementSlide() {
        this.currentSlide = this.currentlyOnFirstSlide ?  this.lastSlideIndex : this.prevSlideIndex
      },
      slidesFirstPosition(slideIndex) {
        return (slideIndex === this.lastSlideIndex) ? -this.slideWidth : slideIndex * this.slideWidth
      },
      slideIsLeftOfWrapper(slideIndex) {
        return slideIndex === this.prevSlideIndex
      },
      positionSlideLeftOfWrapper() {
        return -1 * this.slideWidth
      },
      positionSlides(slideIndex) {
        if (this.slideIsLeftOfWrapper(slideIndex)) return this.positionSlideLeftOfWrapper()

        if (slideIndex === 0) return (this.slides.length - this.currentSlide) * this.slideWidth

        return (this.currentSlide > slideIndex) ?
          (this.currentSlide - slideIndex) * this.slideWidth :
          (slideIndex - this.currentSlide) * this.slideWidth
      },
      getSlidesLeftPosition(slideIndex) {
        return this.slidesAtStartingPosition ? this.slidesFirstPosition(slideIndex) : this.positionSlides(slideIndex)
      },
      navigateNext() {
        this.stopAutoPlay()
        this.next()
      },
      navigatePrev() {
        this.stopAutoPlay()
        this.prev()
      },
      next() {
        this.incrementSlide()
        this.slides.forEach((slide, slideIndex) => {
          if (slideIndex === this.currentSlide || slideIndex === this.prevSlideIndex) {
            slide.style.transition = this.transition
          } else {
            slide.style.transition = (this.currentSlide === 0 && slideIndex === this.lastSlideIndex) ? this.transition : null
          }
          slide.style.left = `${this.getSlidesLeftPosition(slideIndex)}px`
        })

      },
      prev() {
        this.decrementSlide()
        this.slides.forEach((slide, slideIndex) => {
          if (slideIndex === this.currentSlide || slideIndex === this.currentSlide + 1) {
            slide.style.transition = this.transition
          } else {
            slide.style.transition = (this.currentSlide === this.lastSlideIndex && slideIndex === 0) ? this.transition : null
          }
          slide.style.left = `${this.getSlidesLeftPosition(slideIndex)}px`
        })
      },
      navigateToSlide(slideToNavigateTo) {
        if (slideToNavigateTo === this.currentSlide) return
        this.stopAutoPlay()

        if (slideToNavigateTo > this.currentSlide) {
          const slidesToGo = slideToNavigateTo - this.currentSlide
          _.range(slidesToGo).forEach(slide => {
            setTimeout(this.next, 100)

          })
        } else {
          const slidesAhead = this.currentSlide - slideToNavigateTo

          _.range(slidesAhead).forEach(slide => {
            setTimeout(this.prev, 100)
          })
        }


      },
      autoStart() {
        this.autoPlayTimer = setInterval(() => {
          this.next()
        }, 3000)
      },
      stopAutoPlay() {
        if(this.autoPlayTimer) {
          clearTimeout(this.autoPlayTimer)
          this.autoPlayTimer = null
        }
      }
    },
    computed: {
      slidesAtStartingPosition() {
        return this.currentSlide === 0
      },
      lastSlideIndex() {
        return this.slides.length - 1
      },
      nextSlideIndex() {
        return this.currentSlide + 1
      },
      prevSlideIndex() {
        return this.currentSlide - 1
      },
      currentlyOnFirstSlide() {
        return this.currentSlide === 0
      },
      currentlyOnLastSlide() {
        return this.currentSlide !== this.lastSlideIndex
      },
      carouselHeight() {
        return this.height ? this.height : this.windowHeight
      }
    },
    mounted() {
      setTimeout(() => {
        console.log(this.$el.offsetHeight)

      }, 1000)
      this.slideWidth = this.$el.offsetWidth
      this.windowHeight = window.innerHeight
      this.slides = this.$slots.default
        .filter(slot => slot.elm.nodeName !== '#text')
        .map(slot => slot.elm)

      this.slides.forEach((slide, index) => {
        let left = this.slidesFirstPosition(index)
        slide.style.left = `${left}px`
        slide.style.height = `${this.carouselHeight}px`
      })

      window.addEventListener('resize', () => {
        this.slideWidth = window.innerWidth
        this.slides.forEach(slide => {
          // TODO need to throttle this
          slide.style.height = `${this.carouselHeight}px`
          slide.style.width = `${window.innerWidth}px`
        })
      })

      this.autoStart()
    }
  }
</script>

<style lang="scss" scoped>
  .carousel-wrapper {
    position: relative;
    overflow: hidden;
    width: 100%;
    border: 1px solid black;

    .carousel-nav.right, .carousel-nav.left {
      top: 47%;
      background-image: none;
    }

    .carousel-nav {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      width: 15%;
      font-size: 20px;
      color: #fff;
      text-align: center;
      text-shadow: 0 1px 2px rgba(0,0,0,.6);
      opacity: .5;
      z-index: 100;
    }

    .carousel-nav.right {
      right: 0;
      left: auto;
      background-repeat: repeat-x;
    }

    .carousel-nav img {
      vertical-align: middle;
    }

    .carousel-nav:hover,
    .carousel-nav:focus {
      color: #fec503;
      text-decoration: none;
      filter: alpha(opacity=90);
      outline: 0;
      opacity: .9;
    }

    .carousel-indicators {
      position: absolute;
      bottom: 30px;
      left: 50%;
      z-index: 15;
      width: 60%;
      padding-left: 0;
      margin-left: -30%;
      text-align: center;
      list-style: none;
    }

    .carousel-indicators .active {
      width: 30px;
      height: 12px;
      margin: 0;
      background-color: #fec503;
    }

    .carousel-indicators {
      position: absolute;
      bottom: 30px;
      left: 50%;
      z-index: 15;
      width: 60%;
      padding-left: 0;
      margin-left: -30%;
      text-align: center;
      list-style: none;
    }
    .carousel-indicators li {
      display: inline-block;
      width: 30px;
      height: 10px;
      text-indent: -999px;
      cursor: pointer;
      background-color: #000;
      background-color: rgba(0, 0, 0, 0);
      border: 1px solid #fec503;
      border-radius: 0px;
      padding: 0 20px;
    }
  }

  .slide {
    position: absolute;
    width: 100%;
    display: inline-block;
    text-align: center;
    font-size: 40px;
    color: #ffff;
    background-size: cover;
    background-repeat: no-repeat;
  }

  nav {
    margin: 20px auto;
    position: absolute;
    top: 100px;
    width: 100%;
    text-align: center;
  }

  .carousel-caption {
    position: absolute;
    left: 15%;
    right: 15%;
    bottom: 20px;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  }

  .content {
    background: rgba(0, 0, 0, 0.20);
    padding: 40px;
    z-index: -1;
  }

  .text {
    margin-left: 20%;
    margin-right: 20%;
  }

  h1 {
    text-transform: uppercase;
    font-family: Futura, "Trebuchet MS", Arial, sans-serif;
    font-size: 40px;
    letter-spacing: 5px;
    font-weight: 500;
    -webkit-font-smoothing: antialiased !important;
  }
</style>