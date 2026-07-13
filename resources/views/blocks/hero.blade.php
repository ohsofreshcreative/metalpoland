<!-- hero --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-hero bg-darker relative overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
		<img class="absolute top-0 left-0 z-30" src="/wp-content/uploads/2026/07/top-left.svg" alt="" />
	<img class="absolute top-0 right-0 z-40 rotate-90" src="/wp-content/uploads/2026/07/top-left.svg" alt="" />
	<div class="blur absolute bg-brand left-[45px] bottom-[-943px] w-[1034px] h-[1034px] rounded-[1034px] opacity-50 blur-[175px]"></div>
	<div class=" __wrapper c-main grid grid-cols-1 md:grid-cols-2 items-center gap-10">
		<div class="__content relative flex flex-col justify-center z-20 md:py-60 py-20">
			<h1 data-gsap-element="header" class="m-title !text-white">
				{{ $g_hero['title'] }}
			</h1>
			<div data-gsap-element="text" class="text-white">
				{!! $g_hero['text'] !!}
			</div>
			<div class="inline-buttons m-btn">
				@if (!empty($g_hero['button1']))
				<x-button
					:href="$g_hero['button1']['url']"
					variant="secondary"
					class=""
					data-gsap-element="btn">
					{{ $g_hero['button1']['title'] }}
				</x-button>
				@endif
				@if (!empty($g_hero['button2']))
				<x-button
					:href="$g_hero['button2']['url']"
					variant="white"
					class=""
					data-gsap-element="btn">
					{{ $g_hero['button2']['title'] }}
				</x-button>
				@endif
			</div>
			<div class="block md:hidden mt-10">
				<img
					src="{{ $g_hero['image']['url'] }}"
					alt="{{ $g_hero['image']['alt'] }}"
					class="w-full h-auto object-cover" />
			</div>
		</div>
		<div data-gsap-element="box" class="__img hidden md:block absolute inset-y-0 right-0 w-5/12">
			<div class="relative h-full w-full">
				<img
					src="/wp-content/uploads/2026/06/hero-blue.svg"
					class="hero-blue absolute inset-y-0 left-0 z-10"
					alt="" />
				<img
					src="{{ $g_hero['image']['url'] }}"
					alt="{{ $g_hero['image']['alt'] }}"
					class="mask-img absolute top-0 right-0 h-full w-full object-cover z-20" />
			</div>
		</div>
	</div>
	<img class="absolute bottom-0 left-0  w-14 md:w-30 lg:w-40" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<img class="absolute -left-85 -top-60" src="/wp-content/uploads/2026/07/line.svg" />
</section>
<div class="relative w-full h-0 z-10 pointer-events-none">
	<svg class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-20 md:w-26 h-auto object-contain" viewBox="0 0 1058 1058" fill="none" xmlns="http://www.w3.org/2000/svg">
		<rect x="529" width="748.119" height="748.119" transform="rotate(45 529 0)" fill="var(--material-color, #2185C7)"></rect>
	</svg>
</div>