<!-- hero --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-hero bg-darker relative overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class=" __wrapper c-main grid grid-cols-1 md:grid-cols-2 items-center gap-10">
		<div class="__content relative flex flex-col justify-center z-20 py-60">
			<h1 data-gsap-element="header" class="m-header text-white">
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
		</div>

		<div class="__img">
			<img
				src="{{ $g_hero['image']['url'] }}"
				alt="{{ $g_hero['image']['alt'] }}"
				class="mask-img top-1/2 -translate-y-1/2 absolute right-0 z-20 h-full w-5/12 overflow-visible" />

			<img class="absolute -translate-y-1/2 -right-1/12" src="/wp-content/uploads/2026/06/hero-blue.svg" />
		</div>
	</div>
	<img class="absolute bottom-0 left-0" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
</section>