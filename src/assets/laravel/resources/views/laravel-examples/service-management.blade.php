
@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit or Delete Services</strong>
        </span>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header ">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Services list</h5>
                        </div>

                        <a class="btn bg-gradient-dark btn-sm mb-0"  data-toggle="modal" data-target="#addServiceModal">+&nbsp; New Service</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $service->id }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $service->name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $service->price }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $service->category }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a  class="mx-3"data-bs-toggle="modal" data-bs-target="#exampleModalMessage-{{ $service->id }}" type="button" data-bs-original-title="Edit service">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                                <span data-bs-toggle="tooltip" data-bs-original-title="Delete service">
                                                    <i class="cursor-pointer fas fa-trash text-secondary" onclick="confirmAndDelete('{{ $service->id }}')"></i>
                                                </span>
                                                <form id="delete-service-form-{{ $service->id }}" action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                </span>
                                        </td>
                                    </tr>
                                    <div class="col-md-4">
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalMessage-{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Service Info</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span style="color:grey" aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                 <div class="card">
                                <div class="card-header pb-0 px-3">
                                    <h6 class="mb-0">{{ __('service Information') }}</h6>
                                </div>
                                <div class="card-body pt-4 p-3">
                                    <form method="POST" action="{{ route('services.update', $service->id) }}">
                                        @csrf
                                        @method('PUT')
                
                                        <div class="form-group">
                                            <label for="name">Service Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $service->name }}" required autofocus>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') ?? $service->price }}" required>
                                        </div>
                                            <div class="form-group">
                                                  <label for="choice-button">Category</label>
                                                  <select class="form-control" name="category" id="category" placeholder="Departure">
                                                    <option value="{{ old('name') ?? $service->category }}" selected="">{{ old('name') ?? $service->category }}</option>
                                                      @foreach ($categories as $category)
                                                      @if (old('name', $service->category->name ?? '') != $category->name)
                                                    <option value="{{ $category->name }}" >{{ $category->name }}</option>
                                                    @endif
                                                    @endforeach
                                                  </select>
                                            </div>
                                        <button type="submit" class="btn btn-primary bg-gradient-dark">Update Service</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                </form>
                                    </div>
                                </div>
                                    </div>
                        
                                  </div>
                                </div>
                              </div>
                            </div>
                                @endforeach
                            </tbody>
                        </table>
                        
<!-- Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('services.store') }}" id="addServiceForm">
          @csrf <!-- Include this if you are submitting the form with AJAX -->
          <div class="form-group">
            <label for="serviceName">Service Name</label>
            <input type="text" class="form-control" id="serviceName" name="name" required>
          </div>
          <div class="form-group">
            <label for="servicePrice">Price</label>
            <input type="number" class="form-control" id="servicePrice" name="price" required>
          </div>
          <div class="form-group">
          <label for="choice-button">Category</label>
          <select class="form-control" name="category" id="category" placeholder="Category">
              @foreach ($categories as $category)
            <option value="{{ $category->name }}" >{{ $category->name }}</option>
            @endforeach
          </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
                    <div class="form-group">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="addServiceForm" class="btn btn-primary bg-gradient-dark">Save Service</button></div>
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