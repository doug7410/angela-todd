<template>
  <div class="portfolio-modal modal fade @if(Auth::check()) with-admin-bar @endif" id="mainImageSloder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Edit Main Image Slider</h2>
              <p>
                Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!'
              </p>
              <button type="button" class="btn btn-primary" data-dismiss="modal">
                <i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>