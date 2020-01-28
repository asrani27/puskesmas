<!DOCTYPE html>
<html lang="en">
	@include('layouts.head')
	<body class="no-skin">
		@include('layouts.navbar')
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
			@if(Auth::user()->hasRole('superadmin'))
			
			@else
				@include('layouts.menu')
			@endif
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						@yield('content')
					</div>
				</div>
			</div>
			@include('layouts.footer')
		</div>
		@include('layouts.filejs')
	</body>
</html>
