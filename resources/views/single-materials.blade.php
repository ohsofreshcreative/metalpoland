@extends('layouts.app') 

@section('content')
  @while(have_posts())
    @php
      the_post();

      // 1. Pobieramy kolor oraz URL ikony
      $color = get_field('material_color', get_the_ID()) ?: '#c86a24';
      $icon_id = get_field('material_icon', get_the_ID());
      $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'full') : '';
    @endphp

    <!-- Przekazujemy do CSS zarówno kolor, jak i adres URL ikony -->
    <div class="single-material-wrapper" style="
      --material-color: {{ $color }};
      @if($icon_url) --material-icon: url('{{ $icon_url }}'); @endif
    ">
      @php(the_content())
    </div>
  @endwhile
@endsection