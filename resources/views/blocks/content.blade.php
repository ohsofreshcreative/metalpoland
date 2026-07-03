<!--- content -->

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-content relative -spt -spb' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>

    <div class="__wrapper c-main relative">
        <div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20">
            @if (!empty($g_content['image']))
            <div data-gsap-element="img" class="__img h-full order1 relative">
                <img class="" src="{{ $g_content['image']['url'] }}" alt="{{ $g_content['image']['alt'] ?? '' }}">
                
                @php
                  // 1. Sprawdzamy czy w ustawieniach bloku wybrano białe tło sekcji
                  $is_white_bg = ($background === 'section-white');

                  // 2. Jeśli tło jest białe, dodajemy styl filtra, który zamienia niebieski SVG w biały
                  $shape_style = $is_white_bg ? 'filter: brightness(0) invert(1);' : '';

                  // ALTENATYWNIE (jeśli chcesz wgrać osobny biały plik):
                  // $shape_src = $is_white_bg ? '/wp-content/uploads/2026/06/bottom-left-shape-white.svg' : '/wp-content/uploads/2026/06/bottom-left-shape.svg';
                  $shape_src = '/wp-content/uploads/2026/06/bottom-left-shape.svg';
                @endphp

                @if ($flip)
                    <!-- ODWRÓCONA KOLEJNOŚĆ: Narożnik lewy-górny oraz prawy-dolny -->
                    <img class="absolute top-0 left-0 w-20 h-20 rotate-90" src="{{ $shape_src }}" style="{{ $shape_style }}" />
                    <img class="absolute bottom-0 right-0 w-20 h-20 -rotate-90" src="{{ $shape_src }}" style="{{ $shape_style }}" />
                @else
                    <!-- DOMYŚLNY UKŁAD: Narożnik lewy-dolny oraz prawy-górny -->
                    <img class="absolute bottom-0 left-0 w-20 h-20" src="{{ $shape_src }}" style="{{ $shape_style }}" />
                    <img class="absolute right-0 top-0 w-20 h-20 rotate-180" src="{{ $shape_src }}" style="{{ $shape_style }}" />
                @endif

            </div>
            @endif

            <div class="__content order2">
                <h2 data-gsap-element="header" class="text-h4 custom_header">{{ $g_content['header'] }}</h2>

                <div data-gsap-element="txt" class="__txt mt-4">
                    {!! $g_content['text'] !!}
                </div>

                <div class="inline-buttons m-btn">
                    @if (!empty($g_content['button1']))
                    <x-button
                        :href="$g_content['button1']['url']"
                        variant="primary"
                        class=""
                        data-gsap-element="btn">
                        {{ $g_content['button1']['title'] }}
                    </x-button>
                    @endif

                    @if (!empty($g_content['button2']))
                    <x-button
                        :href="$g_content['button2']['url']"
                        variant="secondary"
                        class=""
                        data-gsap-element="btn">
                        {{ $g_content['button2']['title'] }}
                    </x-button>
                    @endif
                </div>

            </div>

        </div>
    </div>

</section>