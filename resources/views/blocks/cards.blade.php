<!--- cards --->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-cards relative -spt -spb bg-white' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>

    <div class="__wrapper c-main">
        <div class="__top">
            <h2 data-gsap-element="header" class="m-header custom_header">{{ strip_tags($g_cards['header']) }}</h2>
            <p data-gsap-element="text">{{ $g_cards['text'] }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mt-10">
            @foreach ($r_cards as $item)

            <div data-gsap-element="card" class="__card relative bg-bg p-8 overflow-hidden">
                
        <div class="absolute -top-6 -right-6 w-12 h-12 rotate-45 pointer-events-none" style="
          background-color: var(--material-color);
        "></div>

                @if (!empty($item['image']['url']))
                <img class="mb-6 h-16 w-16" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
                @endif

                @if (!empty($item['title']))
                <p class="text-lg font-bold text-dark">{{ $item['title'] }}</p>
                @endif

                @if (!empty($item['text']))
                <p class="mt-2 text-sm text-gray-500">{{ $item['text'] }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>