@include('./admin.components.header')
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('./admin.components.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('./admin.components.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper p-10">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="card">
                            <div class="row">
                                <div class="card-header col-md-10 mt-3 ml-2">
                                    <h1>Edit Doctor</h1>
                                </div>
                                <div class = "col-md-2 mt-3 ml-2">
                                    <a href = "{{url('/home')}}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                                <hr>
                            <div class="card-body">
                                <form action="{{url('edit_doctor', $doctor->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><strong>Doctor Name</strong></label>
                                        <input type="text" style="color:azure;" class="form-control"
                                            placeholder="Enter name" id="name" name="name" 
                                            value = "{{$doctor->name}}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label"><strong>Doctor Email</strong></label>
                                        <input type="email" class="form-control" placeholder="Enter email"
                                            id="email"  value = "{{$doctor->email}}" name="email" style="color:azure;" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label"><strong>Contact
                                                Details</strong></label>
                                        <input type="number" class="form-control" placeholder="Enter phone number"
                                            id="phone" name="phone" value = "{{$doctor->phone}}" style="color:azure;" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone"
                                            class="form-label"><strong>Specialization</strong></label>
                                            <input type="text" placeholder="Enter Speciality" class = "form-control" id = "specialization" 
                                            name = "specialization" value = "{{$doctor->specialization}}" style = "color: azure;">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label"><strong>City</strong></label>
                                        <input type="text" placeholder="Enter city" class="form-control" id="city"
                                            name="city" value = "{{$doctor->city}}" required style="color: azure;">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label"><strong>Doctor Image</strong></label>
                                        <img src="images/Doctors/{{$doctor->image}}" alt="">
                                        <input type="file" class="form-control" id="image" name="image"
                                            style="color: azure">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label"><strong>Doctor
                                                Description</strong></label>
                                        <textarea name="description" placeholder="Enter description" required
                                            class="form-control" id="description" name="description" cols="30"
                                            rows="10" style="color: azure;" >{{$doctor->description}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success">Update Doctor</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('./admin.components.footer')