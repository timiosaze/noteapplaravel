@extends('layouts.app')

@section('content')

		<section class="section">
			<div class="create-form">
				@include('includes.session')
				<h3>New Note</h3>
				<form action="{{ route('note.store') }}" method="POST">
					@csrf
					<div class="form-group">
						<textarea name="body" id="" cols="20" rows="3" class="form-control"></textarea>
					</div>
					<button class="btn-primary btn float-right" name="submit">Create</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</section>

		<section class="section">
			<div class="data">
				<h5>Notes</h5>
				<ul>
					@forelse ($notes as $note)

					<li class="data-list">
						<div class="data-text">
						<p class="text-class">{{ $note->body }}</p>
							<p class="date">{{ date("M d, Y h:ia", strtotime($note->created_at))	}}</p>
						</div>
						<div class="actions">
							<div class="row">
								<div class="col text-center">
									<a href="{{ route('note.edit', $note->id) }}" class="edit">Edit</a>
								</div>
								<div class="col text-center">
									<a href="#" class="delete" data-toggle="modal" data-target="#delete-modal-{{ $note->id }}">Delete</a>
								</div>
							</div>
						</div>
					</li>
					<div class="modal" id="delete-modal-{{ $note->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title">Delete Note</h5>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p>{{ \Illuminate\Support\Str::limit($note->body, 10) }}</p>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<form action="{{ route('note.destroy', $note->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-primary" >Delete</button>
							  </form>
							</div>
						  </div>
						</div>
					</div>
					@empty
					
					<li class="no-data text-center">
						No notes yet.
					</li>

					@endforelse
					
				</ul>
			</div>
		</section>
		
		<section class="section">
			{{ $notes->links() }}
		</section>
	
@endsection
	