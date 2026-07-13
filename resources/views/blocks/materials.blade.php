<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-materials -smt -smb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])
	>
	<!-- materials  --> 
	<div class="c-main pt-10 md:pt-0">
		@if(!empty($materials_settings['title']))
		<h2 class="header mb-16">
			{{ $materials_settings['title'] }}
		</h2>
		@endif
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			@foreach($materials as $material)
			@php
			$thumbnail = get_post_thumbnail_id($material->ID);
			$color = get_field('material_color', $material->ID) ?: '#2185C7';
			@endphp
			<article data-gsap-element="cards" class="group bg-white p-6 relative flex flex-col">
				<img
					class="absolute top-0 left-0 rotate-90 w-20 z-20"
					src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
				<a
					href="{{ get_permalink($material->ID) }}"
					class="absolute inset-0 z-30">
				</a>
				@if($thumbnail)
				<div class="relative w-full h-[240px]" style="height: 240px !important;">
					<div class="clip-corner overflow-hidden w-full h-full relative z-0 ">
						{!! wp_get_attachment_image(
						$thumbnail,
						'large',
						false,
						[
        'class' => 'h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110',
						'style' => 'height: 100% !important; width: 100% !important; object-fit: cover !important;'
						]
						) !!}
						<img
							class="absolute top-0 left-0 z-10"
							src="/wp-content/uploads/2026/07/top-shape.svg" />
					</div>
					<div class="absolute right-1 bottom-0 translate-y-1/2 z-20 pointer-events-none">
						<div class="relative w-20 h-20 flex items-center justify-center">
							<img
								class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10"
								src="/wp-content/uploads/2026/06/custom_vector.svg" />
							<div
								class="w-10 h-10 rotate-45 absolute top-5 left-5 z-20"
								style="background: {{ $color }};"></div>

						</div>
					</div>
				</div>
				@endif
				<div class="p-6 pt-10 flex flex-col flex-grow">
					<h5>
						{{ get_the_title($material->ID) }}
					</h5>
					<div class="mt-4 flex items-center gap-1">
						<a
							href="{{ get_permalink($material->ID) }}"
							class="btn btn-underline inline-flex">
							Więcej
						</a>
					</div>
				</div>
			</article>
			@endforeach
		</div>
	</div>
</section>