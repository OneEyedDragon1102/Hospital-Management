@include('./user.components.header')
@include('./user.components.navbar')

@if(session()->has('message'))
  <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x</button>
      {{session()->get('message')}}
  </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>My Appointments</h4>
                        </div>
                        <div class = "col-md-2">
                            <a class = "btn btn-primary float-end" href="#">Add Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Cancel Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr align = "center">
                                    <td> {{$appointment->doctor}}</td>
                                    <td> {{$appointment->date}}</td>
                                    <td> {{$appointment->message}}</td>
                                    <td>{{$appointment->status}}</td>
                                    <td>
                                        <a href="{{url('cancel_appointment', $appointment->id)}}" onclick = "return confirm('Are you sure to cancel appointment?')" class = "btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

  {{-- footer --}}
  @include('./user.components.footer')