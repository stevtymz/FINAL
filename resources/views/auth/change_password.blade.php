@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header">
	<h3 class="page-title">change password</h3>
  </div>
	@if(session('success'))
		<!-- If password successfully show message -->
		<div class="row">
			<div class="alert alert-success">
				{{ session('success') }}
			</div> 
		</div>
	@else
		{!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
		<!-- If no success message in flash session show change password form  -->
		<div class="panel panel-default">

			<div class="card-body">
				
				<div class="raw">
					<div class="form-group">
						<label class="required" for="new_password">New Password</label>
						{!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('new_password'))
							<p class="help-block">
								{{ $errors->first('new_password') }}
							</p>
						@endif
					</div>
				</div>

				<div class="raw">
					<div class=" form-group">
						<label class="required" for="new_password_confirmation">Confirm Password</label>
						{!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('new_password_confirmation'))
							<p class="help-block">
								{{ $errors->first('new_password_confirmation') }}
							</p>
						@endif
					</div>
				</div>
				<div class="form-group">
				{!! Form::submit(trans('global.save'), ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
				@endif
				</div>
			</div>
		
		
		@stop		
</div>


