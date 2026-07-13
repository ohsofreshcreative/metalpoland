<!--- contact --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-contact  -spt -spb relative bg-darken overflow-hidden ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main relative z-2">
		<div class="relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10 z-10">
			<div class="__content flex flex-col justify-between text-white gap-4">
				<div class="header">
					<div class="">
						<h2 data-gsap-element="header" class="!text-white m-title">{!! $g_contact_1['header'] !!}</h2>
						<p data-gsap-element="txt" class="text-h6 !text-white mt-4">{!! $g_contact_1['text'] !!}</p>
						<p data-gsap-element="txt" class="mt-4">{!! $g_contact_1['address'] !!}</p>
						<a data-gsap-element="txt" class="__phone flex items-center mt-4" href="tel:{{ $g_contact_1['phone'] }}">{{ $g_contact_1['phone'] }}</a>
						<a data-gsap-element="txt" class="__mail flex items-center mt-4" href="mailto:{{ $g_contact_1['mail'] }}">{{ $g_contact_1['mail'] }}</a>
						<x-button
							href="#lokalizacje"
							variant=""
							class="mt-10 !inline-flex items-center gap-2 group !p-0"
							data-gsap-element="btn">
							<span>Sprawdź dojazd</span>
							<x-icon.arrow-right class="w-3 h-4 transition-transform group-hover:translate-x-1 text-brand" />
						</x-button>
					</div>
				</div>
			</div>
			<div data-gsap-element="form" class="bg-white  p-10">
				<img class="absolute top-0 right-0 w-14 hidden xl:block" src="/wp-content/uploads/2026/06/blue-corner-t.svg" />
				<h4 class="!text-[#3C3F44] mb-6">{!! $g_contact_2['title'] !!}</h4>
				{!! do_shortcode($g_contact_2['shortcode']) !!}
			</div>
		</div>
	</div>
	<img class="absolute -bottom-20 -right-40 lg:h-[120%]" src="/wp-content/uploads/2026/07/img-blue.png" />
	<div class="absolute left-[45px] bottom-[-845px] w-[1034px] h-[1034px] rounded-full opacity-50 bg-brand blur-[175px]"></div>
	<img class="absolute bottom-0 left-0 lg:w-46 md:w-32 w-18" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
</section>