@extends('layouts.main')

@section('content')
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>College Details</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">College Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $college->name }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Address</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $college->address }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Created At</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $college->created_at->format('F d, Y h:i A') }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Last Updated</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $college->updated_at->diffForHumans() }}</p>
                    </div>
                  </div>

                  <hr>
                  <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        <a href="{{ route('colleges.edit', $college) }}" class="btn btn-info">Edit</a>

                        <form action="{{ route('colleges.destroy', $college) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this college?');">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('colleges.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
