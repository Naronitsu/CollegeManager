@extends('layouts.main')

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
                <div class="card-header card-title">
                  <h2>Edit College</h2>
                </div>
                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <form action="{{ route('colleges.update', $college->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                      <label for="name" class="form-label">College Name</label>
                      <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $college->name) }}" required>
                    </div>

                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $college->address) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                      <button type="submit" class="btn btn-primary">Update College</button>
                      <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                  </form>

                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
