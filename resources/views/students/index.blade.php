@extends('layouts.main')

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Students</h2>
                    <div class="ml-auto">
                      <a href="{{ route('students.create') }}" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Add New
                      </a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Date of Birth</th>
                      <th scope="col">College</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($students->count())
                      @foreach ($students as $index => $student)
                        <tr>
                          <th scope="row">{{ $index + 1 }}</th>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->email }}</td>
                          <td>{{ $student->phone }}</td>
                          <td>{{ $student->dob }}</td>
                          <td>{{ $student->college->name }}</td>
                          <td width="200">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>
                            
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this student?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                              </button>
                            </form>
                          </td>
                        </tr>                        
                      @endforeach
                    @else
                      <tr>
                        <td colspan="7" class="text-center">No students found.</td>
                      </tr>
                    @endif
                  </tbody>
                </table> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
