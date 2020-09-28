@extends('layouts.app')

@section('content')
		<section>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
				  <a class="navbar-brand" href="#">MN</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav ml-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="index.html">Login <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="register.html">Register</a>
				      </li>
				      <!-- <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Dropdown
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#">Action</a>
				          <a class="dropdown-item" href="#">Another action</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="#">Something else here</a>
				        </div>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				      </li> -->
				    </ul>
				  </div>
				</div>
			</nav>
		</section>

		<section class="section">
			<div class="create-form">
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
					<li class="no-data text-center">
						No notes yet.
					</li>
					@foreach ($notes as $note)
						
					<li class="data-list">
						<div class="data-text">
						<p class="text-class">{{ $note->body }}</p>
							<p class="date">{{ date("M d, Y h:ia", strtotime($note->created_at))	}}</p>
						</div>
						<div class="actions">
							<div class="row">
								<div class="col text-center">
									<a href="#" class="edit">Edit</a>
								</div>
								<div class="col text-center">
									<form action="">
										<a href="#" class="delete">Delete</a>
									</form>
								</div>
							</div>
						</div>
					</li>

					@endforeach
				</ul>
			</div>
		</section>
		<section class="section">
			<div class="paginate">
				<a href="#" class="btn btn-outline-primary">Prev</a>
				<a href="#" class="btn btn-outline-primary">Next</a>
			</div>
		</section>
	
@endsection
	