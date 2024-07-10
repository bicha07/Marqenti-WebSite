
@extends('layouts.user_type.auth')

@section('content')

  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100" id="container">
    <div class="container-fluid">
    <div class="card-header ">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Pack List</h5>
                        </div>

                        <a class="btn bg-gradient-dark btn-sm mb-0" data-toggle="modal" data-target="#addPackModal">+&nbsp; New Pack</a>
                    </div>
                </div>
        <div class="row">
          @foreach($packs as $pack)
                <div class="col-md-3 mb-4">
                        <div class="card card-pricing">
                          <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
                            <div class="z-index-1 position-relative">
                              <h5 class="text-white">{{ $pack->name }}</h5>
                              <h1 class="text-white mt-2 mb-0">
                                {{ $pack->price }}.<small>TND</small></h1>
                              <h6 class="text-white"><span>10%</span> Value</h6>
                            </div>
                          </div>
                          <div class="position-relative mt-n5" style="height: 50px;">
                            <div class="position-absolute w-100">
                              <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                                <defs>
                                  <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                                </defs>
                                <g class="moving-waves">
                                  <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                                  <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                                  <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                                  <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                                  <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                                  <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                                </g>
                              </svg>
                            </div>
                          </div>
                          
                          <div class="card-body text-center">
                            <ul class="list-unstyled max-width-200 mx-auto">
                            @foreach ($pack->services as $service)
                          <li>
                              <b>{{ $loop->iteration }}</b> {{ $service->name }}
                              @if (!$loop->last)
                                  <hr class="horizontal dark">
                              @endif
                          </li>
                      @endforeach
                            </ul>
                            <div class="row justify-content-center">
                              <a data-toggle="modal" data-target="#editPackModal-{{ $pack->id }}" type="button" class="btn bg-gradient-dark w-100 mt-4 mb-0">
                              Edit pack
                            </a>                              
                                <a type="button" class="btn bg-gradient-dark w-100 mt-4 mb-0" onclick="confirmAndDelete('{{ $pack->id }}')">Delete</a>
                                <form id="delete-service-form-{{ $pack->id }}" action="{{ route('packs.destroy', $pack->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="editPackModal-{{ $pack->id }}" tabindex="-1" aria-labelledby="editPackModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="editPackModalLabel">Edit Pack</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="{{ route('packs.update', $pack->id) }}" id="editPackForm-{{$pack->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                          <label for="editPackName">Pack Name</label>
                                          <input type="text" class="form-control" id="editPackName" name="name" value="{{ $pack->name }}" required>
                                        </div>
                                        <div id="edit-services-container-{{$pack->id}}">
                                          @foreach ($pack->services as $PackService)
                                            <div class="form-group d-flex align-items-center">
                                              <select class="form-control margy" name="services[]" id="editServices{{ $pack->id }}">
                                                @foreach ($services as $service)
                                                  <option value="{{ $service->id }}" {{ $PackService->id == $service->id ? 'selected' : '' }}>
                                                    {{ $service->name }}
                                                  </option>
                                                @endforeach
                                              </select>
                                              <button type="button" class="btn btn-secondary btn-sm ml-2 remove-service">remove</button>
                                            </div>
                                          @endforeach
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="add-edit-service-{{$pack->id}}">Add Service</button>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" form="editPackForm-{{$pack->id}}" class="btn btn-primary bg-gradient-dark">Save Changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
          @endforeach
<div class="modal fade" id="addPackModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addServiceModalLabel">Add New Pack</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('packs.store') }}" id="addpackForm">
          @csrf <!-- Include this if you are submitting the form with AJAX -->
          <div class="form-group">
            <label for="serviceName">pack Name</label>
            <input type="text" class="form-control" id="packName" name="name" required>
          </div>
        <div id="services-container">
                <div class="form-group">
                    <label for="services0">Services</label>
                    <select class="form-control margy" name="services[]" id="services0">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="add-service">Add Another Service</button>
            <div class="modal-footer">
        <div class="form-group">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="addpackForm" class="btn btn-primary bg-gradient-dark">Save Pack</button>
      </div>
      </div>
        </form>
      </div>

      </div>
    </div>
  </div>
</div>

      @include('layouts.footers.auth.footer')
    </div>
  </div>
  
  <script>
document.getElementById('add-service').addEventListener('click', function() {
    const container = document.getElementById('services-container');
    const newDiv = document.createElement('div');
    newDiv.className = 'form-group d-flex align-items-center';

    const newSelect = document.getElementById('services0').cloneNode(true);
    newSelect.id = 'services' + container.children.length;
    newSelect.name = 'services[]';

    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.textContent = 'Remove';
    removeButton.className = 'btn btn-secondary btn-sm ml-2';
    removeButton.onclick = function() {
        newDiv.remove();
    };

    newDiv.appendChild(newSelect);
    newDiv.appendChild(removeButton);
    container.appendChild(newDiv);
});
document.addEventListener('DOMContentLoaded', function () {
  // Function to add a new service select
  function addServiceSelect(packId) {
    var serviceSelectHTML = `<div class="form-group d-flex align-items-center">
      <select class="form-control margy" name="services[]" id="editServices${packId}">
      @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach      </select>
      <button type="button" class="btn btn-secondary btn-sm ml-2 remove-service">remove</button>
    </div>`;

    var container = document.getElementById('edit-services-container-' + packId);
    container.insertAdjacentHTML('beforeend', serviceSelectHTML);
    
    // Add remove functionality to new button
    container.lastChild.querySelector('.remove-service').addEventListener('click', function() {
      this.parentElement.remove();
    });
  }

  // Function to initialize event listeners for add and remove
// Function to initialize event listeners for add and remove buttons
function initializeAddRemoveServiceButtons() {
  // Loop through all Add Service buttons and add event listeners
  document.querySelectorAll('[id^="add-edit-service-"]').forEach(function(button) {
    var packId = button.id.split('-').pop();
    button.addEventListener('click', function() {
      addServiceSelect(packId);
    });
  });

  // Add event listeners to all existing remove buttons
  document.querySelectorAll('.remove-service').forEach(function(button) {
    button.addEventListener('click', function() {
      this.parentElement.remove();
    });
  });
}

// Initialize the event listeners upon DOM load
initializeAddRemoveServiceButtons();
});

</script>
@endsection

