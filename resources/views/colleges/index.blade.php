@extends('layouts.main')

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Colleges</h2>
                    <div class="ml-auto">
                      <a href="{{ route('colleges.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($colleges->count())
                      @foreach ($colleges as $index => $college)
                        <tr>
                          <th scope="row">{{ $index + 1 }}</th>
                          <td>{{ $college->name }}</td>
                          <td>{{ $college->address }}</td>
                          <td width="200">
                            <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>
                            
                            <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this college?');">
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
                        <td colspan="4" class="text-center">No colleges found.</td>
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
