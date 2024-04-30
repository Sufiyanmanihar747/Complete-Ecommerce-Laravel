<section class="section category pb-1" id="category">
  <div class="container">
    <div id="categoryCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @php $counter = 0; @endphp
        @foreach ($categories as $category)
          @if ($counter % 3 == 0)
            <div class="carousel-item {{ $counter == 0 ? 'active' : '' }}">
              <div class="row category-list">
          @endif
          <div class="col-md-3 col-sm-3 col-3 category-item">
            <figure class="category-banner">
              <div class="image-overlay"></div>
              <img src="{{ url('storage/images/' . $category->image) }}" alt="{{ $category->name }}" loading="lazy"
                class="w-100">
            </figure>
            <a href="{{route('categoryproduct.show',[$category->id])}}" class="btn font-weight-bold d-flex">{{ $category->name }}</a>
          </div>
          @php $counter++; @endphp
          @if ($counter % 3 == 0 || $loop->last)
      </div>
    </div>
    @endif
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#categoryCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#categoryCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  </div>
</section>
