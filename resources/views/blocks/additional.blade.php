<!--- additional -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-additional relative -smt ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10 lg:gap-20">
			@if (!empty($g_additional['image']))
			<div data-gsap-element="img" class="__img h-full order1 relative">
				<img class="small-diamond absolute z-10" src="/wp-content/uploads/2026/06/small-diamond.svg" />
				<img class="blue-shape absolute z-10" src="/wp-content/uploads/2026/06/shape.svg" />
				<img class="mask-img aspect-square w-full" src="{{ $g_additional['image']['url'] }}" alt="{{ $g_additional['image']['alt'] ?? '' }}">
			</div>
			@endif
			<div class="__content order2">
				<h2 data-gsap-element="header" class="header text-h3">{{ $g_additional['header'] }}</h2>
				<div data-gsap-element="txt" class="__txt mt-4">
					{!! $g_additional['text'] !!}
				</div>
				<div class="inline-buttons m-btn">
					@if (!empty($g_additional['button1']))
					<x-button
						:href="$g_additional['button1']['url']"
						variant="primary"
						class=""
						data-gsap-element="btn">
						{{ $g_additional['button1']['title'] }}
					</x-button>
					@endif

					@if (!empty($g_additional['button2']))
					<x-button
						:href="$g_additional['button2']['url']"
						variant="secondary"
						class=""
						data-gsap-element="btn">
						{{ $g_additional['button2']['title'] }}
					</x-button>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>