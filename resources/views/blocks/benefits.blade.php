<!--- benefits -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-benefits relative -smt -spt -spb bg-darken' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<img
		class="absolute top-0 right-0 rotate-180 w-18 md:w-34 lg:w-44 z-20"
		src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="__wrapper c-main relative">
		<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20 mb-16 lg:mb-24">
			<div class="{{ $flip ? 'lg:order-2' : 'lg:order-1' }}">
				<div class="header">
					<div class="">
						<h2 data-gsap-element="header" class="text-h3 !text-white">{{ $g_benefits['header'] }}</h2>
						<div data-gsap-element="txt" class="__txt mt-6 !text-white">
							{!! $g_benefits['text'] !!}
						</div>
					</div>
				</div>
			</div>
			@if (!empty($g_benefits['image']))
			<div class="{{ $flip ? 'lg:order-1' : 'lg:order-2' }} flex justify-center lg:justify-end">
				<div data-gsap-element="img" class="relative w-full ">
					<img class="w-full h-auto object-cover" src="{{ $g_benefits['image']['url'] }}" alt="{{ $g_benefits['image']['alt'] ?? '' }}">
				</div>
			</div>
			@endif
		</div>
		@if(!empty($r_benefits))
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
			@foreach($r_benefits as $item)
			<div data-gsap-element="cards" class="flex flex-col items-start text-white border-l border-primary px-6 xl:first:border-l-0 xl:first:pl-0">
				@if(!empty($item['image']))
				<div class="mb-8 w-26 h-26 flex items-center justify-center relative">
					<img class="w-full h-full object-contain relative z-11" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
					<img class="absolute z-10 left-16 w-13 h-13 " src="/wp-content/uploads/2026/06/blue-square.svg" />
				</div>
				@endif
				<h3 class="text-h7  !text-white mb-2">{{ $item['title'] }}</h3>
				@if(!empty($item['desc']))
				<p class=" text-white ">{{ $item['desc'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif
	</div>
</section>