<modal
    :visible="currentModal === 'mainImageSlider'"
    @update:visible="currentModal = ''"
    heading="Edit Main Image Slider">
    <image-form :images="sliders"></image-form>
</modal>

<modal
    :visible="currentModal === 'portfolioAdmin'"
    @update:visible="currentModal = ''"
    heading="Edit Your Portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-2 portfolio-categories-admin">
        <h4>Categories</h4>
        <button class="btn btn-admin">+ Add Category</button>
        <ul>
          <li v-for="category in categories"><a href="">@{{ category.name }}</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <category-form></category-form>
      </div>
    </div>
  </div>

</modal>