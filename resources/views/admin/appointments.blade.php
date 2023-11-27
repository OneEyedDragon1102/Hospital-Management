@include('./admin.components.header')

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
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
                <div class="content-wrapper p-10 bg-primary">
                    @if(session()->has('array_msg'))
                        @if(session()->get('array_msg')['message'] == 'appointment approved')
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('array_msg')['message']}}
                            </div>
                        @elseif(session()->get('array_msg')['message'] == 'doctor not available')
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('array_msg')['message']}}
                            </div>
                        @endif
                    @endif
                    <div class="">
                        <div class="d-flex justify-content-between ">
                            <h2>Appointments</h2>
                            <button class="btn btn-primary ">Add Appointment</button>
                        </div>
                        <div class = "mt-5">
                            <table class= "table-bordered text-white overflow-visible bg-black">
                                <tr class = "">
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Doctor</th>
                                  <th>Date</th>
                                  <th class = "" style = "width: 40px, overflow: hidden" >Description</th>
                                  <th>Status</th>
                                  <th>Approve</th>
                                  <th>Cancel</th>
                                  <th>Send Mail</th>
                                </tr>
                                @foreach($appointments as $appointment)
                                <tr>
                                  <td>{{$appointment->name}}</td>
                                  <td>{{$appointment->email}}</td>
                                  <td>{{$appointment->phone}}</td>
                                  <td>{{$appointment->doctor}}</td>
                                  <td>{{$appointment->date}}</td>
                                  <td>{{$appointment->message}}</td>
                                  <td>{{$appointment->status}}</td>
                                  
                                  <td>
                                    <a href="{{url('approve_appointment', $appointment->id)}}" class= "btn btn-success">Approve</a>
                                  </td>
                                  <td>
                                    <a href="{{url('cancel_appointment', $appointment->id)}}" class = "btn btn-danger">Cancel</a>
                                  </td>
                                  <td>
                                    <a href="{{url('view_email', $appointment->id)}}" class = "btn btn-primary">Send</a>
                                  </td>
                                </tr>
                                @endforeach
                              </table>
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