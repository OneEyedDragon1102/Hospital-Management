<div class="page-section">
  <div class="container">
    <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

    <form class="main-form" action="{{url('appointment')}}" method="POST">
      @csrf
      <div class="row mt-5 ">
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" class="form-control" name = "name" placeholder="Full name" required>
        </div>
        
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="email" class="form-control" name = "email" placeholder="Email address.." required>
        </div>
        
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <input type="date" class="form-control" name = "date">
        </div>
        
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <select name="doctor" id="departement" class="custom-select">
            <option value="">---Select Doctor---</option>
            @foreach($doctor as $doc)
            <option value="{{$doc->name}}">{{$doc->name}} { {{$doc->specialization}} }</option>
            @endforeach
          </select>
        </div>
        
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" class="form-control" name = "phone" placeholder="Number.." required>
        </div>
        
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" id="message" name = "message" class="form-control" rows="6" placeholder="Enter message.." required></textarea>
        </div>
      
      </div>
      <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
    </form>
  </div>
</div> <!-- .page-section -->