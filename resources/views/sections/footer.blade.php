
@php
$contact = get_field('g_contact_info', 'option');
$socials = get_field('social_media', 'option');
$logo_footer = get_field('logo_footer', 'option');
@endphp

<footer class="footer text-white">
    <div class="c-main px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center py-10 border-b border-secondary-200 gap-6">
            <div>
                @if(!empty($logo_footer))
                <a href="{{ home_url('/') }}" class="inline-block">
                    <img src="{{ $logo_footer['url'] }}" alt="{{ get_bloginfo('name') }}" class="max-w-[240px] h-auto">
                </a>
                @endif
            </div>

            @if(!empty($socials))
            <div class="flex items-center gap-4">
                @foreach($socials as $social)
                <a href="{{ $social['link'] }}" target="_blank" class="hover:opacity-80 transition-opacity">
                    <img src="{{ get_template_directory_uri() }}/resources/images/{{ $social['icon'] }}.svg" alt="{{ $social['icon'] }}" class="w-6 h-6">
                </a>
                @endforeach
            </div>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 md:gap-8 gap-4 py-12">
            <div class="flex flex-col gap-2 text-sm text-gray-400">
             
                 @if(!empty($contact['logoText']))
                <p class="!text-white font-bold text-h6 mb-2">{{ $contact['logoText'] }}</p>
                @endif
                @if(!empty($contact['ts_address']))
                <p class="text-base mb-2">{{ $contact['ts_address'] }}</p>
                @endif
                @if(!empty($contact['postal_code_city']))
                <p class="mb-2">{{ $contact['postal_code_city'] }}</p>
                @endif
                @if(!empty($contact['phone']))
                <a href="tel:{!! str_replace(' ', '', $contact['phone']) !!}" class="!text-secondary-500 hover:underline">{{ $contact['phone'] }}</a>
                @endif
                @if(!empty($contact['mail']))
                <a href="mailto:{{ $contact['mail'] }}" class="!text-secondary-500 hover:underline">{{ $contact['mail'] }}</a>
                @endif
            </div>

            @for ($i = 1; $i <= 3; $i++)
                @if (is_active_sidebar('sidebar-footer-' . $i))
                <div class="footer-widget-container flex flex-col gap-3 text-sm text-gray-400">
                    @php(dynamic_sidebar('sidebar-footer-' . $i))
                </div>
                @endif
            @endfor
        </div>

            <div class="footer-bottom border-t border-secondary-200 w-full">
            <div class=" flex flex-col md:flex-row justify-between gap-6 py-10 ">
        <p class="">Copyright ©{{ date('Y') }} {{ get_bloginfo('name') }}. All Rights Reserved</p>
        <p class="flex gap-2">Designed &amp; Developed by
            <a target="_blank" rel="nofollow" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="{{ get_template_directory_uri() }}/resources/images/ohsofresh.svg"></a>
        </p>
    </div>
    </div>
</footer>
