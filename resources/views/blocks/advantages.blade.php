<!--- advantages --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-advantages relative -smt -smb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main py-12">
		<div class="grid grid-cols-1 lg:grid-cols-2 items-start gap-12 z-10 relative">
			<div class="__content flex flex-col gap-6 lg:sticky lg:top-36 z-20">
				@if (!empty($g_advantages['title']))
				<h2 data-gsap-element="title" class="header">{{ $g_advantages['title'] }}</h2>
				@endif
				@if (!empty($g_advantages['txt']))
				<div data-gsap-element="txt" class="text-lg ">
					{!! $g_advantages['txt'] !!}
				</div>
				@endif
			</div>
			<div class="w-full z-10 relative flex flex-col gap-6">
				@if(!empty($g_advantages['image']['url']))
				<div class="w-full relative max-h-110">
					<img class="object-cover object-top w-full h-auto max-h-110" src="{{ $g_advantages['image']['url'] }}" alt="{{ $g_advantages['image']['alt'] ?? '' }}" loading="lazy" decoding="async">
					<img class="absolute top-0 left-0 md:w-20 w-14 rotate-90" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
					<img class="absolute bottom-0 right-0 -rotate-90  md:w-20 w-14" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
				</div>
				@endif
				@if(!empty($r_advantages))
				<div class="__cards-repeater flex flex-col gap-6 w-full h-full relative z-10">
					@foreach($r_advantages as $card)
					<div data-gsap-element="stagger" class="flex flex-row items-center gap-6 p-6 bg-white ">
						@if(!empty($card['card_image']))
						<div class="flex-shrink-0 w-24 h-24 flex items-center justify-center relative">
							<img class="absolute inset-0 w-full h-full object-contain z-10" src="/wp-content/uploads/2026/06/blue-square.svg" alt="" />
							<img class="w-14 h-14 object-contain relative z-20" src="{{ $card['card_image']['url'] }}" alt="{{ $card['card_image']['alt'] ?? '' }}">
						</div>
						@endif
						<div class="flex flex-col">
							<h4 class="text-h6 mb-2">
								{{ $card['card_title'] }}
							</h4>
							@if(!empty($card['card_text']))
							<p class="text-lg">
								{{ $card['card_text'] }}
							</p>
							@endif
						</div>
					</div>
					@endforeach
				</div>
				@endif
			</div>
		</div>
	</div>
</section>