<carousel hide-indicators>
    <div class="slide"
         v-for="slide in {{ json_encode($sliders->toArray()) }}"
         :style="{backgroundImage: 'url(storage/sliders/'+ slide.image +')'}"
    ></div>
</carousel>