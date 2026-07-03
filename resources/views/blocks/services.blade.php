@php
$links = $g_services['links'] ?? [];
$isText = !empty($g_services['links_as_text']) || !empty($links_as_text);
@endphp

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-services relative pt-[100px] pb-[120px] md:pt-[300px] lg:pt-[540px] md:pb-[144px] bg-cover bg-no-repeat bg-center py-24 -smt {{ $sectionClass }} {{ $section_class }}"
	@if(!empty($g_services['image']['url']))
	style="background-image: url('{{ $g_services['image']['url'] }}');"
	@endif>
	<div class="absolute inset-0 bg-gradient-darker z-0"></div>
	<img class="absolute bottom-0 left-0 w-26 h-26 lg:w-42 lg:h-42 z-10 pointer-events-none"
		src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="_wrapper c-main relative z-20">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-end">
			<div class="_content !text-white">
				<h2 class="header !text-white text-h3 mb-6">
					{{ $g_services['title'] }}
				</h2>
				@if(!empty($g_services['text']))
				<div class="_txt !text-white">
					{!! $g_services['text'] !!}
				</div>
				@endif
			</div>
			<div>
				@if(!empty($links))
				<ul class="flex flex-col max-w-[400px] lg:ml-auto">
					@foreach ($links as $item)
					@php
					$post = $item['page'] ?? null;
					$label = $item['label'] ?? '';

					if (!$post && empty($label)) {
					continue;
					}

					if (empty($label) && $post) {
					$label = get_the_title($post->ID);
					}

					$url = $post ? get_permalink($post->ID) : '#';
					@endphp

					<li class="border-b border-white/50">
						<div class="flex items-center justify-between py-2 group text-white">
							@if($isText)
							<span class="_s-links text-h7 !text-white">
								{{ $label }}
							</span>
							@else
							<a href="{{ $url }}"
								class="flex items-center gap-3 text-white group-hover:text-primary-300">
								<span class="_s-links text-h7 !text-white">
									{{ $label }}
								</span>
							</a>
							@endif
							<x-icon.arrow-right class="w-3 h-4 transition-transform group-hover:translate-x-1" />
						</div>
					</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
	</div>
</section>