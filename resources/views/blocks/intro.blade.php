@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- intro --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-intro relative bg-bg -spt -spb {{ $sectionClass }} {{ $section_class }}">
<div class="_wrapper c-main">
		<div class="_content">
		<div class="flex items-center gap-6 mb-6">
			<h3 data-gsap-element="header" class="custom_header">{{ $g_intro['title'] }}</h3>
			</div>
			<div data-gsap-element="text" class="">
				{!! $g_intro['text'] !!}
			</div>
		</div>
	</div>
</section>

