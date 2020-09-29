@extends('layouts.app')

@section('content')

		<section class="section">
			<div class="create-form">
				<h3>Edit Note</h3>
				<form action="{{ route('note.update', $note->id) }}" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
					<textarea name="body" id="" cols="20" rows="3" class="form-control">{{$note->body}}</textarea>
					</div>
					<button class="btn-primary btn float-right" name="submit">Update</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</section>

		
	@endsection