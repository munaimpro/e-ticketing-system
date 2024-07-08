@extends('layouts.app')

@section('content')

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 m-auto cont-info">
                <h1 class="text-center mb-5">Contact</h1>
                <form>
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" placeholder="Enter Your Email">
                    </div>

                    {{-- textarea --}}
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Message</label>
                        <textarea class="form-control" placeholder="Enter Your Message" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <div class="search-btn text-center">
                          <button class="">Submit</button>
                        </div>
                  </form>
            </div>
        </div>
    </div>
</section>

@endsection
