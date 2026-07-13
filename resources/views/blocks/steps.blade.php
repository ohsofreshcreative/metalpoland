<!--- steps -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-steps relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="c-wide __wrapper  relative bg-dark -spt -spb">
		<div class="c-main flex flex-col items-center text-center  mx-auto mb-16 lg:mb-20">
			@if (!empty($g_steps['image']))
			<div data-gsap-element="img" class="relative w-8 h-8 mb-6">
				<img class="w-full h-auto object-cover" src="{{ $g_steps['image']['url'] }}" alt="{{ $g_steps['image']['alt'] ?? '' }}">
			</div>
			@endif
			<h2 data-gsap-element="header" class="md:max-w-2xl !text-white">{{ $g_steps['header'] }}</h2>
			@if(!empty($r_steps))
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-10 md:mt-16">
				@foreach($r_steps as $item)
				<div class="bg-white px-8 py-6 flex flex-col items-center text-center relative">
					<div class="absolute -top-7 right-4 w-14 h-14 z-30 flex items-center justify-center">
						<img class="absolute inset-0 w-full h-full object-contain" src="/wp-content/uploads/2026/07/Vector.svg" alt="" />
						<span class="relative z-10 text-brand font-bold text-lg">
							@if($loop->iteration == 1) I
							@elseif($loop->iteration == 2) II
							@elseif($loop->iteration == 3) III
							@elseif($loop->iteration == 4) IV
							@else {{ $loop->iteration }}
							@endif
						</span>
					</div>
					@if(!empty($item['image']))
					<div class="mb-6 w-24 h-24 flex items-center justify-center relative">
						<img class="absolute inset-0 w-full h-full object-contain z-10" src="/wp-content/uploads/2026/06/blue-square.svg" alt="" />
						<img class="w-14 h-14 object-contain relative z-20" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
					</div>
					@endif
					<h3 class="!text-xl">{{ $item['title'] }}</h3>
					@if(!empty($item['desc']))
					<p>{{ $item['desc'] }}</p>
					@endif
				</div>
				@endforeach
			</div>
			@endif
		</div>
		<img class="absolute bottom-0 left-0 lg:w-46 md:w-32 w-18" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
		<img class="absolute top-0 right-0 rotate-180 lg:w-46 md:w-32 w-18" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />

	</div>
</section>