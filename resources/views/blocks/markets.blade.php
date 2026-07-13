<!--- markets -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-markets relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="c-wide __wrapper  relative bg-lighter -spt -spb">
		<div class="c-main flex flex-col items-center text-center  mb-16 lg:mb-20">
		<div class="_content xl:w-1/2 ">
			@if (!empty($g_markets['image']))
			<div data-gsap-element="img" class="relative w-8 h-8 mb-6 mx-auto">
				<img class="w-full h-auto object-cover" src="{{ $g_markets['image']['url'] }}" alt="{{ $g_markets['image']['alt'] ?? '' }}">
			</div>
			@endif
			<h2 data-gsap-element="header" class="">{{ $g_markets['header'] }}</h2>
			<div data-gsap-element="txt" class="__txt mt-6">
				{!! $g_markets['text'] !!}
			</div>
</div>
		@if(!empty($r_markets))
		<div class="flex flex-wrap justify-center gap-8 mt-10 md:mt-16">
			@foreach($r_markets as $item)
			<div data-gsap-element="cards" class="bg-white py-6 px-8 flex flex-col items-center text-center w-full sm:w-[calc(50%-16px)] lg:w-[calc(33.333%-21.33px)]">
				@if(!empty($item['image']))
				<div class="mb-6 w-22 h-22 flex items-center justify-center relative">
					<img class="absolute inset-0 w-full h-full object-contain z-10" src="/wp-content/uploads/2026/06/blue-square.svg" alt="" />
					<img class="w-10 h-10 object-contain relative z-20" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
				</div>
				@endif
				<h3 class="text-h5 mb-4">{{ $item['title'] }}</h3>
				@if(!empty($item['desc']))
				<p class="">{{ $item['desc'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif

		</div>
	<img class="absolute bottom-0 left-0 lg:w-46 md:w-32 w-18" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<img class="absolute top-0 right-0 rotate-180 lg:w-46 md:w-32 w-18" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />

	</div>
</section>