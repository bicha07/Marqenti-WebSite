@extends('layouts.user_type.auth')

@section('content')

<div>
    <!-- Alert for Add, Edit, Delete -->
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white"><strong>Add, Edit or Delete Users</strong></span>
    </div>

    <!-- User Table -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <!-- Card Header -->
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">User list</h5>
                        </div>
                        <!-- Button trigger modal for adding new user -->
                        <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal">+&nbsp; New User</button>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <!-- Define your table headers -->
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Photo</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Creation Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                <!-- Loop through each user -->
                                @foreach ($users as $user)
                                    <tr>
                                        <!-- User ID -->
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p>
                                        </td>
                                        <!-- User Avatar -->
                                        <td>
                                            <div>
                                                <img src="/assets/img/{{$user->avatar}}" alt="Avatar" class="avatar avatar-sm me-3">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                                                                        <!-- User Name -->
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                        </td>
                                        <!-- User Email -->
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                        </td>
                                        <!-- User Role -->
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->role ?? 'N/A' }}</p>
                                        </td>
                                        <!-- User Creation Date -->
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at->format('d/m/Y') }}</span>
                                        </td>
                                        <!-- Actions -->
                                        <td class="text-center">
                                            <!-- Edit User Button -->
                                                <a  class="mx-3"data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}" type="button" data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <!-- Delete User Button -->
                                            <span data-bs-toggle="tooltip" data-bs-original-title="Delete user">
                                                <i class="cursor-pointer fas fa-trash text-secondary" onclick="confirm('Are you sure you want to delete this user?') ? document.getElementById('delete-user-form-{{ $user->id }}').submit() : ''"></i>
                                                <form id="delete-user-form-{{ $user->id }}" action="{{ route('user-management.destroy', $user->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </span>
                                        </td>
                                        <div class="col-md-4">

    <!-- Modal -->
    <div class="modal fade" id="editUserModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editUserModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit user {{ $user->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('user-management.update', $user->id) }}">
              @csrf
              @method('PUT')
              <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name-{{$user->id}}" name="name" value="{{ $user->name }}" required>
          </div>
          
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email-{{$user->id}}" name="email" value="{{ $user->email }}" required>
          </div>
          
          <div class="form-group">
            <label for="role" class="col-form-label">Role:</label>
            <input type="text" class="form-control" id="role-{{$user->id}}" name="role" value="{{ $user->role }}">
          </div>
          
          <div class="form-group">
            <label for="about" class="col-form-label">About:</label>
            <textarea class="form-control" id="about_me-{{$user->id}}" name="about_me">{{ $user->about_me }}</textarea>
          </div>
                <div class="modal-footer">
        <button type="button" class="
btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn bg-gradient-primary">Save Changes</button>
</div>
        </form>
      </div>

</div>
</div>
</div>

</div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-4">
    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('user-management.store') }}" enctype="multipart/form-data" >
          @csrf

          <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
<input type="text" class="form-control" id="name" name="name" required>
</div>

          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <div class="form-group">
            <label for="role" class="col-form-label">Role:</label>
            <input type="text" class="form-control" id="role" name="role">
          </div>

          <div class="form-group">
            <label for="phone" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
          </div>

          <div class="form-group">
            <label for="location" class="col-form-label">Location:</label>
            <input type="text" class="form-control" id="location" name="location">
          </div>

          <div class="form-group">
            <label for="about_me" class="col-form-label">About:</label>
            <textarea class="form-control" id="about_me" name="about_me"></textarea>
          </div>

          <div class="form-group">
            <label for="avatar" class="col-form-label">Avatar:</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-gradient-primary">Add User</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
