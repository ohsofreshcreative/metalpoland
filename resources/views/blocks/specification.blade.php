<!--- specification --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-specification relative -spt -spb bg-bg' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="_wrapper c-main">
		<div class="_content mb-10">
			<div class="flex items-center m-title">
				<h2 data-gsap-element="header" class="custom_header">
					{{ $g_specification['header'] }}
				</h2>
			</div>

			@if(!empty($g_specification['text']))
			<div data-gsap-element="text" class="max-w-3xl text-secondary-dark">
				{!! $g_specification['text'] !!}
			</div>
			@endif
		</div>
		<div class="border-t border-secondary-100">
			@foreach($r_specification as $row)
			<div @class([ 'grid grid-cols-12 gap-8 border-b border-secondary-100 py-2 text-secondary-dark' , 'bg-white'=> $loop->odd,
				])>

				<div class="col-span-3 px-8">
					{{ $row['title'] }}
				</div>

				<div class="col-span-9 px-4">
					{!! $row['txt'] !!}
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>