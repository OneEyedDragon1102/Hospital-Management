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
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class = "mt-2">Doctor's Data</h4>
                            </div>
                            <div class="col-md-6">
                                <a class = "btn btn-primary float-end mt-2" href="{{url('add_doctors_view')}}">Add Doctor</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Specialization</th>
                                <th>City</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doc)
                            <tr>
                                <td>{{$doc->id}}</td>
                                <td>{{$doc->name}}</td>
                                <td>{{$doc->email}}</td>
                                <td>{{$doc->phone}}</td>
                                <td>{{$doc->specialization}}</td>
                                <td>{{$doc->city}}</td>
                                <td><img src="images/Doctors/{{$doc->image}}" alt=""></td>
                                
                                <td> 
                                    <div class="row">
                                        <a href="{{url('update_doctor', $doc->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('delete_doctor', $doc->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger mt-3">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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