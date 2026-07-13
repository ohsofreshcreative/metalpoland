@extends('layouts.app')

@section('content')

@php
$term = get_queried_object();
$categories = get_categories();

$category_header = get_field('category_header', $term);
$category_description = get_field('category_description', $term);
$category_image = get_field('category_image', $term);

$cta = get_field('g_cta_options', 'option') ?: [];

// Wygenerowanie unikalnego ID dla SVG
$unique_id = 'clip_'.uniqid();
@endphp

<div class="hero category-header relative overflow-hidden z-2">
	<div class="absolute inset-0 bg-darken"></div>

<div class="__wrapper c-main relative z-10 pt-34 pb-20">
<div class="absolute left-[45px] bottom-[-845px] w-[1034px] h-[1034px] rounded-full opacity-50 bg-brand blur-[175px]"></div>

	<div class="__content w-full md:w-2/3">
		<h1 class="!text-white m-header">
			{!! $category_header ?: get_the_archive_title() !!}
		</h1>

		@if ($category_description)
			<div class="text-white text-xl md:text-2xl">
				{!! $category_description !!}
			</div>
		@endif
	</div>
	
</div>
	<img class="absolute bottom-0 left-0 hidden xl:block xl:w-22 xl:h-22 2xl:w-44 2xl:h-44" src="/wp-content/uploads/2026/07/bottom-l.svg" />
	<img class="absolute top-0 left-0" src="/wp-content/uploads/2026/07/top-left.svg" />
<img 
	class="absolute w-auto h-[650px] -right-38 -bottom-43 z-10 hidden md:block" 
	src="/wp-content/uploads/2026/06/blue-square.svg" 
	alt="" /> 
	</div>

 
</div>
<div class="relative w-full h-0 z-1 pointer-events-none">
<svg class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-20 md:w-26 h-auto object-contain" viewBox="0 0 1058 1058" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="529" width="748.119" height="748.119" transform="rotate(45 529 0)" fill="var(--material-color, #2185C7)"></rect></svg>
</div>


@if (have_posts())
<div class="__posts c-main -smt  posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
	@while (have_posts()) @php(the_post())

	@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
	@endwhile
</div>

{!! the_posts_pagination() !!}
@else
<div class="mt-20 mb-20">
	<div class="c-main">
		<h3 class="">Brak wpisów w tej kategorii.</h3>
		<a class="main-btn m-btn" href="/wszystkie-wpisy/">Sprawdź wszystkie wpisy</a>
	</div>
</div>
@endif

<!-- cta -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cta -smt relative py-12 md:py-30 overflow-hidden bg-darken' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])
	>
	<div class="blur absolute inset-0 bg-brand left-[91px] -top-[888px] w-[1034px] h-[1034px] rounded-full opacity-50 blur-[175px]"></div>
	<img
		class="absolute top-0 left-0 w-18 md:w-26 lg:w-42 z-10 pointer-events-none rotate-90"
		src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="__wrapper c-main grid grid-cols-1 xl:grid-cols-2 items-center gap-10">
		<div class="__content relative flex flex-col justify-center z-20 py-6 md:py-14">
			@if (!empty($cta['header']))
			<h2 data-gsap-element="header" class="text-h1 !text-white mb-6">
				{{ $cta['header'] }}
			</h2>
			@endif
			@if (!empty($cta['txt']))
			<div data-gsap-element="txt" class="text-white mb-6">
				{!! $cta['txt'] !!}
			</div>
			@endif
			<div class="inline-buttons m-btn">
				@if (!empty($cta['button']['url']))
				<x-button
					:href="$cta['button']['url']"
					variant="white"
					data-gsap-element="btn">
					{{ $cta['button']['title'] }}
				</x-button>
				@endif
			</div>
			<div class="block xl:hidden mt-10">
				@if(!empty($cta['image']['url']))
				<img
					src="{{ $cta['image']['url'] }}"
					alt="{{ $cta['image']['alt'] ?? '' }}"
					class="w-full h-auto object-cover" />
				@endif
			</div>
		</div>
		<div class="__img hidden xl:block absolute inset-y-0 right-0 w-5/12">
			<div class="relative h-full w-full">
				<img
					src="/wp-content/uploads/2026/06/hero-blue.svg"
					class="hero-blue absolute inset-y-0 left-0 z-10"
					alt="" />
				@if(!empty($cta['image']['url']))
				<img
					src="{{ $cta['image']['url'] }}"
					alt="{{ $cta['image']['alt'] ?? '' }}"
					class="mask-img absolute top-0 right-0 h-full w-full object-cover z-20" />
				@endif
			</div>
		</div>
	</div>
	<img
		class="absolute -left-50 xl:-top-80 xl:w-220 xl:h-auto -top-40 w-180 h-auto"
		src="/wp-content/uploads/2026/07/line.svg"
		alt="" />
</section>

@endsection