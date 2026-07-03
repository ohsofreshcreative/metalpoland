<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-cta - relative py-16 md:py-32 overflow-hidden bg-darken',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])
>
    <img class="absolute top-0 left-0 w-26 h-26  lg:w-42 lg:h-42 z-10 pointer-events-none rotate-90" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
    <div class="__wrapper c-main grid grid-cols-1 md:grid-cols-2 items-center gap-10">
        <div class="__content relative flex flex-col justify-center z-20 py-16 md:py-32">
            @if (!empty($cta['header']))
            <h2 data-gsap-element="header" class="text-h1 !text-white mb-6">
                {{ $cta['header'] }}
            </h2>
            @endif

            @if (!empty($cta['txt']))
            <div data-gsap-element="txt" class="text-white mb-6">
                {!! $cta['txt'] !!}
            </div>
            @endif

            <div class="inline-buttons m-btn">
    @if (!empty($cta['button']['url']))
        <x-button
            :href="$cta['button']['url']"
            variant="white"
            data-gsap-element="btn">
            {{ $cta['button']['title'] }}
        </x-button>
    @endif
</div>
        </div> 

        <div class="__img">
            @if(!empty($cta['image']['url']))
            <img 
                src="{{ $cta['image']['url'] }}" 
                alt="{{ $cta['image']['alt'] ?? '' }}" 
                class="mask-img top-1/2 -translate-y-1/2 absolute right-0 z-20 h-full w-5/12 overflow-visible object-cover object-center"
            />
				<img class="absolute -translate-y-1/2 -right-6/12  xl:right-1 xl:-translate-y-1/2" src="/wp-content/uploads/2026/06/hero-blue.svg" />
            @endif
        </div>
    </div>
</section>