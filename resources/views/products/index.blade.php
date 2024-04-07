@extends('layouts.app')

@section('content')
  <article>
    {{-- CARESOLE --}}

    @include('layouts.caresole')

    {{-- SERVICES --}}

    @include('layouts.service')

    {{-- CATEGORY --}}

    @include('layouts.category')

    <!--- #PRODUCT-->

    @include('layouts.products')

    {{-- SUBSCRIBE --}}

    @include('layouts.subscribe')

  </article>

  {{-- FOOTER --}}

  @include('layouts.footer')
@endsection
