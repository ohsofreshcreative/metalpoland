<!--- certificates -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-certificates relative -spt -spb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20">
			@if (!empty($g_certificates['image']) || !empty($g_certificates['image2']))
			<div data-gsap-element="img" class="__img  h-full w-full order1 grid grid-cols-1 md:grid-cols-2 gap-10. mb-10 lg:mb-0 items-center">
				@if (!empty($g_certificates['image']))
				<img class="mx-auto"
					src="{{ $g_certificates['image']['url'] }}"
					alt="{{ $g_certificates['image']['alt'] ?? '' }}">
				@endif
				@if (!empty($g_certificates['image2']))
				<img class="mx-auto"
					src="{{ $g_certificates['image2']['url'] }}"
					alt="{{ $g_certificates['image2']['alt'] ?? '' }}">
				@endif
			</div>
			@endif
			<div class="__certificates order2">
				@if (!empty($g_certificates['header']))
				<h2 data-gsap-element="header" class="text-h4 custom_header">
					{{ $g_certificates['header'] }}
				</h2>
				@endif

				@if (!empty($g_certificates['text']))
				<div data-gsap-element="txt" class="__txt mt-4">
					{!! $g_certificates['text'] !!}
				</div>
				@endif

				<div class="inline-buttons m-btn">
					@if (!empty($g_certificates['button1']))
					<x-button
						:href="$g_certificates['button1']['url']"
						variant="primary"
						data-gsap-element="btn">
						{{ $g_certificates['button1']['title'] }}
					</x-button>
					@endif

					@if (!empty($g_certificates['button2']))
					<x-button
						:href="$g_certificates['button2']['url']"
						variant="secondary"
						data-gsap-element="btn">
						{{ $g_certificates['button2']['title'] }}
					</x-button>
					@endif
				</div>
			</div>
		</div>
	</div>
	@if (!empty($r_certificates))
	<div class="c-main -smt lg:mt-16">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
			@foreach ($r_certificates as $item)
			@if (!empty($item['image']))
			<div data-gsap-element="img" class="flex items-center justify-center">
				<img
					src="{{ $item['image']['url'] }}"
					alt="{{ $item['image']['alt'] ?? '' }}"
					class="aspect-[42/61] shrink-0 object-contain shadow-[0_4px_4px_rgba(0,0,0,0.25)]">
			</div>
			@endif
			@endforeach
		</div>
	</div>
	@endif
	<img class="absolute bottom-0 left-0 w-18 h-18 md:w-26 md:h-26 lg:w-42 lg:h-42" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<img class="absolute top-0 right-0 w-18 h-18 md:w-26 md:h-26 lg:w-42 lg:h-42 rotate-180" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
</section>