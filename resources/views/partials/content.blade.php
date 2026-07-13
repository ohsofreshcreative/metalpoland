<article data-gsap-element="cards" @php(post_class('__card'))>

	<a class="rounded-2xl" href="{{ get_permalink() }}">
		<div class="__content relative ">
			@if (has_post_thumbnail())
			<div class="block  overflow-hidden">
				<img src="{{ get_the_post_thumbnail_url(null, 'large') }}" alt="{{ get_the_title() }}" class="w-full img-s object-cover">
			</div>
			@endif
			<h6 class="mt-6">
				{!! get_the_title() !!}
			</h6>
		
		</div>
	</a>
</article>