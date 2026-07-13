<!--- table --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-table relative -spt -spb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main">
		<div class="flex flex-col items-start md:flex-row md:justify-between md:items-center gap-8 mb-10">
			<h2 data-gsap-element="header" class="text-h3 custom_header">
				{{ $g_table['header'] }}
			</h2>
			@if(!empty($g_table['text']))
			<div data-gsap-element="text" class="">
				{!! $g_table['text'] !!}
			</div>
			@endif
		</div>
		<div class="table-expand-wrapper relative pb-6">
			<div class="table-scroll-container overflow-hidden overflow-x-auto bg-white shadow-sm relative max-h-[360px] transition-all duration-500">
				<div class="min-w-[768px]">
					<div class="grid grid-cols-5 text-center bg-lighter border-b border-secondary-100">
						<div class="py-3"></div>
						<div class="col-span-2 py-3 ">PN-EN</div>
						<div class="col-span-2 py-3">DIN</div>
					</div>
					<div class="grid grid-cols-5 bg-lighter border-b border-secondary-100">
						<div class="px-4 py-2">PN</div>
						<div class="px-4 py-2">Symbol / Symbol</div>
						<div class="px-4 py-2 ">Numer / Number</div>
						<div class="px-4 py-2">Symbol / Symbol</div>
						<div class="px-4 py-2">Numer / Number</div>
					</div>
					<div>
						@foreach ($r_table as $row)
						<div @class([ 'grid grid-cols-5 border-b border-gray-100' , 'bg-bg'=> $loop->odd
							])>
							<div class="px-4 py-2">{{ $row['pn'] }}</div>
							<div class="px-4 py-2 ">{{ $row['symbol'] }}</div>
							<div class="px-4 py-2 ">{{ $row['number'] }}</div>
							<div class="px-4 py-2 ">{{ $row['symbol2'] }}</div>
							<div class="px-4 py-2 ">{{ $row['number2'] }}</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="table-fade-overlay absolute bottom-6 left-0 right-0 h-16  z-10 transition-opacity duration-300"></div>
			<div class="absolute bottom-[-14px] left-1/2 -translate-x-1/2 z-20 flex justify-center w-full">
				<button type="button" class="table-expand-btn flex items-center gap-2 bg-primary hover:bg-primary-hover text-white font-bold text-base px-8 py-3 rounded-[4px] shadow-lg transition-all duration-300 cursor-pointer">
					<span class="btn-text !text-white">Rozwiń</span>
					<svg class="transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<path d="M6.77138 9.12868L6.77138 4.76837e-06L5.22861 -9.53674e-07L5.22861 9.12868L1.09091 5.10571L0 6.16638L5.99999 12L12 6.16636L10.9091 5.1057 '6.77138 9.12868Z" fill="white" />
					</svg>
				</button>
			</div>
		</div>
	</div>
</section>
<script>
	document.querySelectorAll('.table-expand-wrapper').forEach(wrapper => {
		const btn = wrapper.querySelector('.table-expand-btn');
		const container = wrapper.querySelector('.table-scroll-container');
		const overlay = wrapper.querySelector('.table-fade-overlay');
		const btnText = wrapper.querySelector('.btn-text');
		const arrow = wrapper.querySelector('svg');
		let expanded = false;
		btn.addEventListener('click', () => {
			if (!expanded) {
				container.style.maxHeight = container.scrollHeight + 'px';
				overlay.style.opacity = '0';
				btnText.textContent = 'Zwiń';
				arrow.classList.add('rotate-180');
			} else {
				container.style.maxHeight = '360px';
				overlay.style.opacity = '1';
				btnText.textContent = 'Rozwiń';
				arrow.classList.remove('rotate-180');
			}
			expanded = !expanded;
		});
	});
</script>