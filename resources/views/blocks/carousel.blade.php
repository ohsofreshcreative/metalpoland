@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $nolist ? ' no-list' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!--- carousel --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-carousel  relative -smt {{ $sectionClass }} {{ $section_class }}">
	@if(!empty($g_carousel['title']) || !empty($g_carousel['text']))
		<img
		class="absolute top-0 left-0 w-18 md:w-26 lg:w-40 z-10 pointer-events-none rotate-90"
		src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<div class="__wrapper c-main  grid grid-cols-1 md:grid-cols-2 gap-10 md:pb-20 pb-10">
		@if(!empty($g_carousel['title']))
		<h2 class="header z-10">{{ $g_carousel['title'] }}</h2>
		@endif
		@if(!empty($g_carousel['text']))
		<div class="">
			{!! $g_carousel['text'] !!}
		</div>
		@endif
	</div>
	@endif
	<div class="swiper carousel !overflow-visible relative z-20 mt-16 c-main">
		<div class="swiper-wrapper">
			@foreach($materials as $material)
			<div data-gsap-element="box" class="swiper-slide">
				@php
				$material_color = get_field('material_color', $material->ID) ?: '#c86a24';
				$material_icon = get_field('material_icon', $material->ID);
				$material_icon_url = $material_icon ? wp_get_attachment_image_url($material_icon, 'full') : '';
				@endphp
				<article class="overflow-visible rounded-[10px] grid md:grid-cols-[50%_1fr] gap-10 min-h-[420px]">
					<div class="__img  relative min-h-[260px] md:min-h-full">
						<img src="/wp-content/uploads/2026/06/blue-corner-t.svg" class="absolute top-3 right-3 z-20" alt="">
						<img src="/wp-content/uploads/2026/06/blue-corner-b.svg" class="absolute bottom-3 left-3 z-20" alt="">
						@if(has_post_thumbnail($material->ID))
						{!! wp_get_attachment_image(
						get_post_thumbnail_id($material->ID),
						'large',
						false,
						[
						'class' => 'mask-image absolute inset-0 h-full w-full object-cover',
						'alt' => get_the_title($material->ID),
						]
						) !!}
						@else
						<div class="absolute inset-0 bg-gray-200"></div>
						@endif
					</div>

					<div class="flex flex-col justify-end">
						@if($material_icon_url)
						<div
							class="w-10 h-10 mb-8"
							style="
            background: {{ $material_color }};
            -webkit-mask: url('{{ $material_icon_url }}') center/contain no-repeat;
            mask: url('{{ $material_icon_url }}') center/contain no-repeat;
        ">
						</div>
						@endif
						<p class="font-header text-h5 text-dark">
							{{ get_the_title($material->ID) }}
						</p>
						@if(!empty(get_the_excerpt($material->ID)))
						<div class="text-lg mt-6">
							{{ get_the_excerpt($material->ID) }}
						</div>
						@endif
						<div class="mt-6">
							<a
								href="{{ get_permalink($material->ID) }}"
								class="btn btn-underline inline-flex">
								Więcej
							</a>
						</div>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		<div class="pointer-events-none absolute top-1/2 left-[calc((100vw-100%)/-2)] z-10 flex w-screen -translate-y-1/2 items-center justify-between">
			<button
				type="button"
				class="__prev pointer-events-auto origin-left cursor-pointer flex h-14 w-14 items-center justify-center transition-transform duration-300 hover:scale-120"
				aria-label="Poprzedni slajd">
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="100" viewBox="0 0 50 100" fill="none">
					<path d="M1.90735e-06 0V100L50 50L1.90735e-06 0Z" fill="white" />
					<path d="M0 2V98L48 50L0 2Z" fill="#2185C7" />
					<path d="M0.000282288 16V83.8822L33.9414 49.9411L0.000282288 16Z" fill="#005C99" />
					<path d="M6.20884 49.5504L11.2019 45.1754C11.3364 45.0616 11.5166 44.9986 11.7036 45C11.8907 45.0014 12.0696 45.0672 12.2018 45.1831C12.3341 45.2989 12.4091 45.4557 12.4107 45.6196C12.4123 45.7834 12.3404 45.9413 12.2105 46.0592L8.43503 49.3673H17.2867C17.4759 49.3673 17.6573 49.4332 17.7911 49.5504C17.9248 49.6676 18 49.8266 18 49.9923C18 50.1581 17.9248 50.3171 17.7911 50.4343C17.6573 50.5515 17.4759 50.6173 17.2867 50.6173H8.43503L12.2105 53.9254C12.2786 53.9831 12.333 54.0521 12.3703 54.1283C12.4077 54.2046 12.4274 54.2866 12.4282 54.3696C12.4291 54.4526 12.411 54.5349 12.3751 54.6117C12.3393 54.6885 12.2863 54.7583 12.2193 54.8169C12.1524 54.8756 12.0727 54.922 11.9851 54.9535C11.8974 54.9849 11.8035 55.0007 11.7088 55C11.6141 54.9993 11.5205 54.982 11.4334 54.9493C11.3464 54.9165 11.2677 54.8689 11.2019 54.8092L6.20884 50.4342C6.07512 50.317 6 50.158 6 49.9923C6 49.8266 6.07512 49.6677 6.20884 49.5504Z" fill="white" />
				</svg>
			</button>
			<button
				type="button"
				class="__next pointer-events-auto origin-right cursor-pointer flex h-14 w-14 items-center justify-center transition-transform duration-300 hover:scale-120"
				aria-label="Następny slajd">
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="100" viewBox="0 0 50 100" fill="none">
					<path d="M50 100L50 0L-4.37114e-06 50L50 100Z" fill="white" />
					<path d="M50 98L50 2L2 50L50 98Z" fill="#2185C7" />
					<path d="M49.9997 84L49.9997 16.1178L16.0586 50.0589L49.9997 84Z" fill="#005C99" />
					<path d="M43.7912 50.4496L38.7981 54.8246C38.6636 54.9384 38.4834 55.0014 38.2964 55C38.1093 54.9986 37.9304 54.9328 37.7982 54.8169C37.6659 54.7011 37.5909 54.5443 37.5893 54.3804C37.5877 54.2166 37.6596 54.0587 37.7895 53.9408L41.565 50.6327L32.7133 50.6327C32.5241 50.6327 32.3427 50.5668 32.2089 50.4496C32.0751 50.3324 32 50.1734 32 50.0077C32 49.8419 32.0751 49.683 32.2089 49.5657C32.3427 49.4485 32.5241 49.3827 32.7133 49.3827L41.565 49.3827L37.7895 46.0746C37.7214 46.0169 37.667 45.9479 37.6296 45.8717C37.5923 45.7954 37.5726 45.7134 37.5718 45.6304C37.5709 45.5474 37.589 45.4651 37.6249 45.3883C37.6607 45.3115 37.7137 45.2417 37.7807 45.1831C37.8476 45.1244 37.9273 45.078 38.0149 45.0465C38.1026 45.0151 38.1965 44.9993 38.2912 45C38.3859 45.0007 38.4795 45.018 38.5666 45.0507C38.6536 45.0835 38.7323 45.1311 38.7981 45.1908L43.7912 49.5658C43.9249 49.683 44 49.842 44 50.0077C44 50.1734 43.9249 50.3324 43.7912 50.4496Z" fill="white" />
				</svg>
			</button>
		</div>
		<div class="swiper-pagination mt-6"></div>
	</div>
	<img
		class="absolute left-1/2 top-1/2 h-[110%] -translate-x-1/2 -translate-y-1/2 opacity-10 hue-rotate-220"
		src="/wp-content/uploads/2026/02/logo-bg.svg"
		alt="" />
</section>