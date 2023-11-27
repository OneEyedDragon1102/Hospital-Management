@include('./doctor.components.header')

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('./doctor.components.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('./doctor.components.navbar')
            <!-- Navbar End -->
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
                            @foreach($appointment as $appoint)
                            <tr>
                              <td>{{$appoint->name}}</td>
                              <td>{{$appoint->email}}</td>
                              <td>{{$appoint->phone}}</td>
                              <td>{{$appoint->doctor}}</td>
                              <td>{{$appoint->date}}</td>
                              <td>{{$appoint->message}}</td>
                              <td>{{$appoint->status}}</td>
                              
                              <td>
                                <a href="{{url('approve_appointment', $appoint->id)}}" class= "btn btn-success">Approve</a>
                              </td>
                              <td>
                                <a href="{{url('cancel_appointment', $appoint->id)}}" class = "btn btn-danger">Cancel</a>
                              </td>
                              <td>
                                <a href="{{url('view_email', $appoint->id)}}" class = "btn btn-primary">Send</a>
                              </td>
                            </tr>
                            @endforeach
                          </table>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            @include('./doctor.components.footer')
            {{-- Footer End --}}