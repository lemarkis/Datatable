<div class="pull-right">
	<ul class="pagination">
		@foreach($elements as $element)
			@if($element->active())
				<li class="active">
					<span>{!! $element->value() !!}</span>
				</li>
			@else
				<li>{!! $element->link() !!}</li>
			@endif
		@endforeach

		<li class="disabled">
			<span>/</span>
			<span>
				<span id="datatable_ttl_elm">{{ $count }}</span> @lang('datatable::datatable.elements')
			</span>
		</li>
	</ul>
</div>