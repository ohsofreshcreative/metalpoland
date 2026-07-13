<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-expertise relative bg-white -spt -spb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main relative">
		<div class="sticky top-20 z-30 bg-darken p-4  mb-10">
			<div class="flex flex-nowrap gap-4 overflow-x-auto">
				@foreach($r_expertise as $item)
				<a
					href="#{{ $item['section_id'] }}"
					class="basis-0 grow min-w-[180px] text-white bg-brand min-h-[52px] flex items-center justify-center text-center px-4 transition hover:opacity-80">
					{{ $item['title'] }}
				</a>
				@endforeach
			</div>
		</div>
		<div>
			@foreach($r_expertise as $index => $item)
			<section
				id="{{ $item['section_id'] }}"
				class="expertise-item scroll-mt-32 bg-bg p-6 mb-10 ">
				<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20">
					<div class="{{ $index % 2 === 1 ? 'lg:order-2' : 'lg:order-1' }}">
						@if(!empty($item['image']))
						<img
							src="{{ $item['image']['url'] }}"
							alt="{{ $item['image']['alt'] ?? $item['header'] }}"
							class="w-full aspect-[344/213] object-cover">
						@endif
					</div>
					<div class="{{ $index % 2 === 1 ? 'lg:order-1' : 'lg:order-2' }} md:w-3/4">
						@if(!empty($item['header']))
						<h2 class="text-h5 !tracking-normal">
							{{ $item['header'] }}
						</h2>
						@endif
						@if(!empty($item['text']))
						<div class="__txt mt-4">
							{!! $item['text'] !!}
						</div>
						@endif
					</div>
				</div>
			</section>
			@endforeach
		</div>
	</div>
</section>