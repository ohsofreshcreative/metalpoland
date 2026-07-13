@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
    $sectionClass .= ' ' . $background;
}
@endphp

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-info relative -smt -smb {{ $sectionClass }} {{ $section_class }}">
    <div class="__wrapper c-main relative">
        
     @if(!empty($g_info['header']))
    <h2 class="header mb-8">{{ $g_info['header'] }}</h2>
@endif

       <div class="grid items-center gap-8 md:grid-cols-[300px_1fr] lg:grid-cols-[420px_1fr_1fr_1fr] lg:gap-x-8">

    @if(!empty($g_info['logo']))
        <div>
            <img
                src="{{ $g_info['logo']['url'] }}"
                alt="{{ $g_info['logo']['alt'] ?? '' }}"
                class=" aspect-[32/5] object-contain max-h-13">
        </div>
    @endif

    @if(!empty($g_info['text_address']))
        <div class="flex items-center">
            <div class="mr-8 h-14 w-px bg-brand"></div>

            <div class="leading-6">
                {!! $g_info['text_address'] !!}
            </div>
        </div>
    @endif

    @if(!empty($g_info['text_info']))
        <div class="flex items-center">
            <div class="mr-8 h-14 w-px bg-brand"></div>

            <div class="leading-6">
                {!! $g_info['text_info'] !!}
            </div>
        </div>
    @endif

    @if(!empty($g_info['text']))
        <div class="flex items-center">
            <div class="mr-8 h-14 w-px bg-brand"></div>

            <div class="leading-6">
                {!! $g_info['text'] !!}
            </div>
        </div>
    @endif

</div>
    </div>
</section>