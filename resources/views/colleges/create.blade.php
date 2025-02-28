@extends('layouts.main')

@section('title', 'Add College')

@section('content')
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Add New College</strong>
            </div>           
            <div class="card-body">
              <form action="{{ route('colleges.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                  <label for="name" class="form-label">College Name</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                  @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="d-flex justify-content-between">
                  <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary">Save College</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
