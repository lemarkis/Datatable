<div class="pull-left">
	@if($paginator->lastPage() > 1) 
		<ul class="pagination">
			{!! $presenter->render() !!}
		</ul>
	@endif
</div>