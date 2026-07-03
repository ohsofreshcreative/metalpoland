<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-highlight relative -spt -spb bg-cover  bg-no-repeat {{ $sectionClass }} {{ $section_class }}"
	@if(!empty($g_highlight['image']['url']))
	style="background-image: url('{{ $g_highlight['image']['url'] }}');"
	@endif>
	<!-- highlight  -->
	<div class="absolute inset-0  "></div>
	<img class="absolute bottom-0 left-0. w-42 h-42" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="_wrapper c-main relative z-10">
		<div class="_content">
				<h2 data-gsap-element="header" class="header !text-white">
					{{ $g_highlight['title'] }}
				</h2>
		</div>
	</div>
</section>