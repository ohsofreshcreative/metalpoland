<!-- highlight -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-highlight relative -spt -spb bg-cover bg-no-repeat bg-center {{ $sectionClass }} {{ $section_class }}"
	@if(!empty($g_highlight['image']['url']))
	style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.60) 0%, rgba(0, 0, 0, 0.40) 100%), url('{{ $g_highlight['image']['url'] }}');"
	@endif>
	<img class="absolute bottom-0 left-0 w-18 md:w-20 lg:w-42" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="_wrapper c-main relative z-10">
		<div class="_content">
			<h2 data-gsap-element="header" class="header !text-white">
				{{ $g_highlight['title'] }}
			</h2>
		</div>
	</div>
</section>