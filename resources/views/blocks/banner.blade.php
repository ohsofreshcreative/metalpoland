<!-- banner -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-banner relative overflow-hidden {{ $sectionClass }} {{ $section_class }}">
	<img class="absolute top-0 left-0 z-30" src="/wp-content/uploads/2026/07/top-left.svg" alt="" />
	<img class="absolute top-0 right-0 z-40 rotate-90" src="/wp-content/uploads/2026/07/top-left.svg" alt="" />
	<img class="absolute bottom-0 left-0 z-30 w-14 md:w-30 lg:w-40" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="absolute inset-0 bg-darken z-20"></div>
	<div class="absolute inset-0 z-25 pointer-events-none">
		<div class="absolute left-[45px] -bottom-[858px] w-[1034px] h-[1034px] rounded-full opacity-50 bg-brand blur-[175px]"></div>
	</div>
	<div class="__wrapper relative z-30">
		<div class="__inside c-main relative">
			<div class="__content py-34 max-md:py-16">
				<div class="__txt w-1/2 max-md:w-full">
					<h1 data-gsap-element="header" class="!text-white m-title">
						{!! $g_banner['header'] !!}
					</h1>
					@if (!empty($g_banner['text']))
					<div data-gsap-element="txt" class="!text-white mb-6">
						{!! $g_banner['text'] !!}
					</div>
					@endif
				</div>
				<!-- mobile img  -->
				<div class="block md:hidden mt-2">
					<img
						src="{{ $g_banner['image']['url'] }}"
						alt="{{ $g_banner['image']['alt'] }}"
						class="w-full h-auto object-cover" />
				</div>
			</div>
		</div>
		<!-- line  -->
		<div data-gsap-element="box" class="__img hidden md:block absolute inset-y-0 right-0 w-[40%] z-30">
			<div class="relative h-full w-full">
				<!-- line  -->
				<img
					class="absolute top-1/2 xl:-left-35  -left-20 z-9 w-auto h-[160%] max-w-none -translate-y-1/2 scale-110"
					src="/wp-content/uploads/2026/07/line.svg"
					alt="" />
				<!-- blue shape  -->
				<div class="absolute inset-y-0 -left-20  xl:-left-25  w-[100vh] z-10">
					<svg
						class="h-full w-auto"
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 901 872"
						fill="none">
						<path
							d="M435.716 0L871.431 435.716L435.716 871.431L0 435.716L435.716 0Z"
							fill="var(--material-color, #2185C7)" />
						<path d="M440.139 0H901V871.476H440.139V0Z" fill="var(--material-color, #2185C7)" />
					</svg>
				</div>
				<!-- banner img  -->
				<img
					src="{{ $g_banner['image']['url'] }}"
					alt="{{ $g_banner['image']['alt'] }}"
					class="mask-img absolute top-0 right-0 h-full max-w-none z-20" />
			</div>
		</div>
	</div>
</section>
<div class="relative w-full h-0 z-10 pointer-events-none">
	<svg class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-20 md:w-26 h-auto object-contain" viewBox="0 0 1058 1058" fill="none" xmlns="http://www.w3.org/2000/svg">
		<rect x="529" width="748.119" height="748.119" transform="rotate(45 529 0)" fill="var(--material-color, #2185C7)"></rect>
	</svg>
</div>