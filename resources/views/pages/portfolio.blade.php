 @extends('layouts.master_home')
 @section('main_content')
    {{-- @section('main_content')

    @endsection --}}
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">
@foreach ($portfolios as $portfolio)
  

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{asset($portfolio->portfolio_image)}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$portfolio->portfolio_name}}</h4>
              <p>App</p>
              <a href="{{asset('frontend/assets/img/portfolio/portfolio-1.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

         @endforeach

          




        
          

          

        </div>

      </div>
    </section><!-- End Portfolio Section -->
    @endsection