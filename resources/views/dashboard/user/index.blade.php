@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
  
  {{-- @dd($workorders) --}}
  
  <div class="table-responsive small col-lg-12">
    <a href="/dashboard/user/create" class="btn btn-primary mb-3">Create New User</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">ID Karyawan</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->id }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
          <td>
            {{-- <a href="/dashboard/user/{{ $user->id }}" class="badge bg-info">
              <i class="bi bi-eye-fill" style="font-size: 15px"></i>
            </a> --}}
            {{-- <a href="/dashboard/posts/{{ $workorder }}/edit" class="badge bg-warning">
              <i class="bi bi-pencil-fill"  style="font-size: 15px"></i>
            </a> --}}
            <form action="/dashboard/user/{{ $user->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"> 
              <i class="bi bi-trash-fill"  style="font-size: 15px"></i>
            </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection