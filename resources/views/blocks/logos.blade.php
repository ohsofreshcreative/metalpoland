
@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp
<!-- logos  -->
<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-logos relative -spt -spb {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative">
		<div class="_content w-full xl:w-1/2 mx-auto text-center">
			@if (!empty($g_logos['image']))
			<div data-gsap-element="img" class="relative w-8 h-8 mb-6 mx-auto">
				<img class="w-full h-auto object-cover" src="{{ $g_logos['image']['url'] }}" alt="{{ $g_logos['image']['alt'] ?? '' }}">
			</div>
			@endif

			@if (!empty($g_logos['header']))
			<h4 data-gsap-element="header" class="">{{ $g_logos['header'] }}</h4>
			@endif

			@if (!empty($g_logos['txt']))
			<div class="w-full mt-4">
				{!! $g_logos['txt'] !!}
			</div>
			@endif
		</div>
	</div>
@if (!empty($g_logos['gallery']))
    <div class="__logos mt-12 md:mt-16">
        <div class="__wrapper ">
            @foreach ($g_logos['gallery'] as $image)
            <div class="__slide bg-white flex items-center justify-center py-4 px-2 min-w-[200px] max-w-[220px] h-[104px] flex-shrink-0">
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}" class="max-w-full max-h-full object-contain w-full h-full pointer-events-none select-none">
            </div>
            @endforeach
            @foreach ($g_logos['gallery'] as $image)
            <div class="__slide bg-white flex items-center justify-center py-4 px-2 min-w-[200px] max-w-[220px] h-[104px] flex-shrink-0">
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}" class="max-w-full max-h-full object-contain w-full h-full pointer-events-none select-none">
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>