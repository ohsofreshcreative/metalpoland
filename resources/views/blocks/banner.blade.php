@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- banner --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-banner relative bg-darken {{ $sectionClass }} {{ $section_class }}">
	<!-- <div class="blur bg-primary absolute "></div> -->
	<div class=" __wrapper relative ">
		<div class="__inside c-main relative">
			<div class="__content py-34">
				<div>
					<h1 data-gsap-element="header" class=" !text-white">
						{!! $g_banner['header'] !!}
					</h1>
				</div>
				
			</div>
		</div>
		<div class="__img">
					<img
						src="{{ $g_banner['image']['url'] }}"
						alt="{{ $g_banner['image']['alt'] }}"
						class="mask-img top-1/2 -translate-y-1/2 absolute right-0 z-20 h-full w-5/12 overflow-hidden object-cover" />

					<!-- <img class="absolute -translate-y-1/2 -right-1/12 xl:right-1 xl:-translate-y-1/2" src="/wp-content/uploads/2026/06/hero-blue.svg" /> -->
				</div>
		<img class="absolute left-0 bottom-0 w-42 h-42" src="{{ Vite::asset('resources/images/triangle.svg') }}" />

</section>

