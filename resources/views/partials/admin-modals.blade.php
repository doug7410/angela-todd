<modal
    :visible="currentModal === 'mainImageSlider'"
    @update:visible="currentModal = ''"
    heading="Edit Main Image Slider">
    <carousel-image-form :images="sliders"></carousel-image-form>
</modal>
<modal
    :visible="currentModal === 'portfolioAdmin'"
    @update:visible="currentModal = ''; setCurrentCategoryId(null)"
    heading="Edit Your Portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-2 portfolio-categories__nav">
        <h4>Categories</h4>
        <button class="btn btn-admin" @click="setCurrentCategoryId(null)">+ Add Category</button>
        <ul>
          <li v-for="category in categories">
            <a href="#"
               @click.prevent="setCurrentCategoryId(category.id)"
              :class="{'active': currentCategory && category.id === currentCategory.id}"
            >
              @{{ category.name }}
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-10">
        <category-form v-if="!currentCategory"></category-form>
        <div v-else class="portfolio-category__edit">
          <h4>@{{ currentCategory.name }}</h4>
          <p>@{{ currentCategory.description }}</p>
          <portfolio-image-form :images="currentCategory.images" :category-id="currentCategory.id"></portfolio-image-form>
        </div>
      </div>
    </div>
  </div>

</modal>