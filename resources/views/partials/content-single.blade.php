@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
@endphp

<section data-gsap-anim="section" class="hero-blog bg-darken relative overflow-hidden">
	<div class="absolute left-[45px] bottom-[-938px] w-[1034px] h-[1034px] rounded-full opacity-50 bg-brand blur-[175px]"></div>
	<div class="__wrapper c-main relative z-10 ">
		<div class="__content w-full sm:w-3/4 pt-10  pb-30">
			<div data-gsap-element="bread" class="__breadcrumb">
				<!-- @if (function_exists('woocommerce_breadcrumb'))
                {!! woocommerce_breadcrumb() !!}
                @endif -->
				@if (function_exists('yoast_breadcrumb'))
				{!! yoast_breadcrumb('<div id="breadcrumbs">','</div>', false) !!}
				@endif
			</div>

			<div class="__top mt-20 text-left">
				@if ($category)
				<h1 data-gsap-element="header" class="text-h2 !text-white mt-6">{{ get_the_title() }}</h1>
				@endif
			</div>
		</div>
	</div>
	<div class="__img hidden xl:block absolute inset-y-0 right-0 w-[50%] z-10">
		<div class="relative h-full w-full flex justify-end">
			<img
				class="absolute top-1/2 -right-50 2xl:-right-40 z-9 w-auto -translate-y-1/2 h-[160%] scale-110 max-w-none"
				src="/wp-content/uploads/2026/07/line.svg"
				alt="" />
			<!-- blue shape  -->
			<div class="absolute inset-y-0 2xl:right-0 -right-10 w-full z-10 flex justify-end">
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
		</div>
	</div>
	<img class="absolute bottom-0 left-0 hidden xl:block xl:w-22 xl:h-22 2xl:w-44 2xl:h-44" src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
	<img class="absolute top-0 left-0  " src="/wp-content/uploads/2026/07/top-left.svg" />
	<img class="absolute top-0 right-0 z-40 rotate-90" src="/wp-content/uploads/2026/07/top-left.svg" alt="" />
</section>


<section data-gsap-anim="section">
	<div id="tresc-top" class="__entry relative z-10 -mt-16">
		<div class="c-main grid grid-cols-1 md:grid-cols-[3fr_1fr] gap-10 items-end">

			@if(has_post_thumbnail())
			<div data-gsap-element="image" class="w-full img-2xl overflow-hidden relative">
				{!! get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'w-full h-full object-cover']) !!}
				<img class="absolute bottom-0 left-0 w-20 !h-20 " src="/wp-content/uploads/2026/06/bottom-left-shape.svg" />
			</div>
			@else
			<div></div>
			@endif

			@php
			$author_id = get_the_author_meta('ID');
			$acf_avatar_id = get_field('avatar_acf', 'user_' . $author_id);
			@endphp
			<div class="flex flex-col items-start gap-4 max-md:items-center">
				<div class="relative w-24 h-24 rotate-45 overflow-hidden border-[6px] border-secondary-100 flex items-center justify-center mb-2">

					<div class="-rotate-45 w-[142%] h-[142%] shrink-0 absolute">
						@if(!empty($acf_avatar_id))
						{!! wp_get_attachment_image(
						$acf_avatar_id,
						'thumbnail',
						false,
						[
						'class' => 'w-full h-full object-cover'
						]
						) !!}
						@endif
					</div>

				</div>

				<div class="max-md:text-center">
					<span class="text-h6 block">
						{{ get_the_author() }}
					</span>

					<span class="text-sm text-[#292929] flex items-center gap-2 mt-2 max-md:justify-center">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
							<path d="M0.969 8.279H18.793M14.316 12.185H14.326M9.879 12.185H9.889M5.434 12.185H5.443M14.316 16.071H14.326M9.879 16.071H9.889M5.434 16.071H5.443M13.918 0.875V4.165M5.84 0.875V4.165M14.113 2.455H5.646C2.709 2.455 0.875 4.089 0.875 7.096V16.146C0.875 19.201 2.709 20.875 5.646 20.875H14.104C17.05 20.875 18.875 19.23 18.875 16.222V7.097C18.885 4.09 17.059 2.455 14.113 2.455Z" stroke="#3E87CB" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						{{ get_the_date('d.m.Y') }}
					</span>
				</div>

			</div>

		</div>
	</div>
</section>

@php
$content = apply_filters('the_content', get_the_content());

preg_match_all('/<h([1-4])[^>]*>(.*?)<\/h[1-4]>/', $content, $matches, PREG_SET_ORDER);

		$toc = '<nav class="toc">
			<ul>';
				$used_ids = [];
				foreach ($matches as $match) {
				$level = $match[1];
				$title = strip_tags($match[2]);
				$id = sanitize_title($title);
				$base_id = $id;
				$i = 2;
				while (in_array($id, $used_ids)) {
				$id = $base_id . '-' . $i;
				$i++;
				}
				$used_ids[] = $id;
				$content = preg_replace(
				'/<h' . $level . '[^>]*>' . preg_quote($match[2], '/' ) . '<\/h' . $level . '>/' , '<h' . $level . ' id="' . $id . '">' . $match[2] . '</h' . $level . '>' ,
					$content,
					1
					);
					$toc .='<li class="toc-h' . $level . '"><a href="#' . $id . '">' . $title . '</a></li>' ;
					}
					$toc .='</ul></nav>' ;
					@endphp

					<div class="__content c-main __entry -smt grid grid-cols-1 md:grid-cols-[3fr_1fr] gap-10">



					<div id="tresc" class="__entry">
						{!! $content !!}
					</div>

					<div class="relative md:sticky top-0 md:top-30 h-max">
						<p class="text-h5 !text-brand m-title">Spis treści</p>
						@if(count($matches))
						{!! $toc !!}
						@endif
					</div>

					</div>

					@php
					$current_id = get_the_ID();
					$categories = wp_get_post_categories($current_id);
					$related_args = [
					'category__in' => $categories,
					'post__not_in' => [$current_id],
					'posts_per_page' => 3,
					'ignore_sticky_posts' => 1,
					];
					$related_query = new WP_Query($related_args);
					@endphp

					@if($related_query->have_posts())
					<section class="related-posts -smt pt-20 pb-26 bg-white">
						<div class="c-main">

							<div class="flex items-center justify-between mb-6 max-md:flex-col max-md:items-start max-md:gap-5">
								<h3 class="text-h2 header">
									Podobne wpisy
								</h3>

								<a href="{{ get_category_link(get_category_by_slug('aktualnosci')->term_id) }}" class="m-btn inline-flex items-center justify-center px-10 py-4 border border-brand text-brand hover:bg-brand hover:text-white transition-all duration-300 shrink-0 max-md:w-full">
									Zobacz wszystkie wpisy
								</a>
							</div>

							<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
								@while($related_query->have_posts())
								@php($related_query->the_post())

								<article @php(post_class('flex flex-col'))>
									<header>
										@if(has_post_thumbnail())
										<a href="{{ get_permalink() }}">
											{!! get_the_post_thumbnail(null, 'large', ['class' => 'featured-image object-cover img-m']) !!}
										</a>
										@endif

										<h2 class="entry-title text-h6 mt-4">
											<a href="{{ get_permalink() }}">
												{{ get_the_title() }}
											</a>
										</h2>
									</header>
								</article>

								@endwhile

								@php(wp_reset_postdata())
							</div>

						</div>
					</section>
					@endif


					<script>
						document.addEventListener('DOMContentLoaded', function() {
							const headings = document.querySelectorAll('h1[id], h2[id], h3[id], h4[id]'); // Select all headings with IDs
							const tocLinks = document.querySelectorAll('.toc ul li a'); // Select all links in the TOC

							function updateActiveLink() {
								headings.forEach((heading) => {
									const headingTop = heading.getBoundingClientRect().top;
									const windowHeight = window.innerHeight;

									if (headingTop < windowHeight - 300) {
										// Remove the 'active' class from all TOC links
										tocLinks.forEach((link) => {
											link.parentNode.classList.remove('active');
										});

										// Add the 'active' class to the corresponding TOC link
										const id = heading.id;
										const activeLink = document.querySelector(`.toc ul li a[href="#${id}"]`);
										if (activeLink) {
											activeLink.parentNode.classList.add('active');
										}
									}
								});
							}
							updateActiveLink();

							window.addEventListener('scroll', updateActiveLink);
						});
					</script>