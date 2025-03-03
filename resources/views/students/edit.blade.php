@extends('layouts.main')

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
                <div class="card-header card-title">
                  <h2>Edit Student</h2>
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

                  <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                      <label for="name" class="form-label">Student Name</label>
                      <input type="text" name="name" id="name" class="form-control" 
                             value="{{ old('name', $student->name) }}" required>
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" id="email" class="form-control" 
                             value="{{ old('email', $student->email) }}" required>
                    </div>

                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" name="phone" id="phone" class="form-control" 
                             value="{{ old('phone', $student->phone) }}" required>
                    </div>

                    <div class="mb-3">
                      <label for="dob" class="form-label">Date of Birth</label>
                      <input type="date" name="dob" id="dob" class="form-control" 
                             value="{{ old('dob', $student->dob) }}" required>
                    </div>

                    <div class="mb-3">
                      <label for="college_id" class="form-label">College</label>
                      <select name="college_id" id="college_id" class="form-control" required>
                        <option value="">Select College</option>
                        @foreach ($colleges as $college)
                          <option value="{{ $college->id }}" 
                                  {{ old('college_id', $student->college_id) == $college->id ? 'selected' : '' }}>
                            {{ $college->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="d-flex justify-content-between">
                      <button type="submit" class="btn btn-primary">Update Student</button>
                      <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                  </form>

                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
