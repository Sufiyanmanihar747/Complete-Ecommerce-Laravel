<section class="section newsletter p-0">
  <div class="container">

    <div class="newsletter-card" style="background-image: url('{{ asset('images/newsletter-bg.png') }}')">

      <h2 class="card-title">Subscribe Newsletter</h2>

      <p class="card-text">
        Enter your email below to be the first to know about new collections and product launches.
      </p>

      <form action="" class="card-form">
        <div class="input-wrapper">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="emal" placeholder="Enter your email" required class="input-field">
        </div>
        <button type="submit" class="btn btn-outline-dark">
          <span>Subscribe</span>
          {{-- <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon> --}}
        </button>

      </form>

    </div>

  </div>
</section>
