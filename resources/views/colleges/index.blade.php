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
                      <a href="{{ route('colleges.create') }}" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Add New
                      </a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                @include('colleges._filter')

                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">College Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Created At</th>
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
                          <td>{{ $college->created_at->format('F d, Y') }}</td>
                          <td width="100">

                            <a href="{{ route('colleges.edit', $college->id) }}" 
                               class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                               <i class="fa fa-edit"></i>
                            </a>
                          </td>
                        </tr>                        
                      @endforeach
                    @else
                      <tr>
                        <td colspan="5" class="text-center">No colleges found.</td>
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