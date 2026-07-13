<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-callout -smt relative py-12 md:py-30 overflow-hidden bg-darken' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])
	>
	<!-- callout  -->
	<div class="blur absolute inset-0 bg-brand left-[91px] -top-[888px] w-[1034px] h-[1034px] rounded-full opacity-50 blur-[175px]"></div>
	<img
		class="absolute top-0 left-0 w-18 md:w-26 lg:w-42 z-10 pointer-events-none rotate-90"
		src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="__wrapper c-main grid grid-cols-1 xl:grid-cols-2 items-center gap-10">
		<div class="__content relative flex flex-col justify-center z-20 py-6 md:py-14">
			@if (!empty($callout['header']))
			<h2 data-gsap-element="header" class="text-h1 !text-white mb-6">
				{{ $callout['header'] }}
			</h2>
			@endif
			@if (!empty($callout['txt']))
			<div data-gsap-element="txt" class="text-white mb-6">
				{!! $callout['txt'] !!}
			</div>
			@endif
			<div class="inline-buttons m-btn">
				@if (!empty($callout['button']['url']))
				<x-button
					:href="$callout['button']['url']"
					variant="white"
					data-gsap-element="btn">
					{{ $callout['button']['title'] }}
				</x-button>
				@endif
			</div>
			<div class="block xl:hidden mt-10">
				@if(!empty($callout['image']['url']))
				<img
					src="{{ $callout['image']['url'] }}"
					alt="{{ $callout['image']['alt'] ?? '' }}"
					class="w-full h-auto object-cover" />
				@endif
			</div>
		</div>
		<div data-gsap-element="box" class="__img hidden xl:block absolute inset-y-0 right-0 w-5/12">
			<div class="relative h-full w-full">
				<img
					src="/wp-content/uploads/2026/06/hero-blue.svg"
					class="hero-blue absolute inset-y-0 left-0 z-10"
					alt="" />
				@if(!empty($callout['image']['url']))
				<img
					src="{{ $callout['image']['url'] }}"
					alt="{{ $callout['image']['alt'] ?? '' }}"
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