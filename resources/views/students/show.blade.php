@extends('layouts.main')

@section('content')
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Student Details</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Student Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->name }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->email }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Phone</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->phone }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Date of Birth</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->dob}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">College</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->college->name }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Created At</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->created_at->format('F d, Y h:i A') }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Last Updated</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $student->updated_at->diffForHumans() }}</p>
                    </div>
                  </div>

                  <hr>
                  <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-info">Edit</a>

                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Cancel</a>
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
