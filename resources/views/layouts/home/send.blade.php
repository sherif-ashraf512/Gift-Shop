<div id="contact" class="container mb-5">
    <div class="card">
      <div class="row g-0">
          <div class="col-md-7">
            <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3430.7937911738536!2d31.092819275417188!3d30.696077474602028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDQxJzQ1LjkiTiAzMcKwMDUnNDMuNCJF!5e0!3m2!1sen!2seg!4v1721680656989!5m2!1sen!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        <div class="col-md-5 text-center p-3">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <form action="{{route('send')}}" method="post">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Name">
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" id="exampleFormControlInput2" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="exampleFormControlInput3" name="phone" placeholder="Phone">
            </div>
            <div class="mb-3">
              <textarea class="form-control" placeholder="Message" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <input class="btn btn-primary px-4 fw-bold" type="submit" value="Send">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
