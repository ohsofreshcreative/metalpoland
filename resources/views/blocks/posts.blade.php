@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-posts  -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="c-main ">
		<div class="__content mb-14 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
    <h2 data-gsap-element="title" class="header">
        {{ $posts_settings['title'] }}
    </h2>

    @if (!empty($posts_settings['button']))
        <a
            data-gsap-element="btn"
            href="{{ $posts_settings['button']['url'] }}"
            class="inline-flex items-center justify-center px-10 py-4 border border-primary text-primary hover:bg-primary hover:text-white transition-all duration-300 shrink-0"
        >
            {{ $posts_settings['button']['title'] }}
        </a>
    @endif
</div>
<div data-gsap-element="grid-layout" class="__posts-grid relative w-full">
    @if(!empty($posts))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <a
                    href="{{ get_permalink($post->ID) }}"
                    class="group relative flex flex-col"
                >
                    @if($show_image && has_post_thumbnail($post->ID))
                        <div class="w-auto h-[232px] overflow-hidden">
                            <img
                                src="{{ get_the_post_thumbnail_url($post->ID, 'large') }}"
                                alt="{{ get_the_title($post->ID) }}"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                            />
                        </div>
                    @endif

                    <h6 class="mt-4">
                        {{ get_the_title($post->ID) }}
                    </h6>
                </a>
            @endforeach
        </div>
    @else
        <div class="no-posts bg-white p-6 radius text-center text-gray-400 shadow-sm">
            Brak postów do wyświetlenia.
        </div>
    @endif
</div>
	</div>
</div>