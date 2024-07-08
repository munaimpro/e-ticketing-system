@extends('layouts.app')

@section('content')
<section id="payment-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <div class="payment-content">
                    <h4 class="text-center mb-3">Payment</h4>
                    <p class="text-center mt-2 mb-2"><span>Mobile Banking</span>: +880 123 456 789</p>
                    <p class="text-center mb-5"><span>Visa / Master Card</span>: +880 123 456 789</p>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/bkash.svg') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/nagad-32.png') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/nexus-debit-home.svg') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/rocket-home.svg') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/upay-home.svg') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/visa-home.png') }}" alt=""></label>
                        </div>
                    </div>
                    {{-- transaction id --}}
                    <div class="transaction-id">
                        <label for="">Transaction ID</label>
                        <input type="number" class="form-control mt-2" id="exampleCheck1"
                            placeholder="Enter Transaction ID">
                    </div>

                    <div class="search-btn text-center">
                        <button class="">Submit</button>
                    </div>
                </div>


            </div>
            <div class="col-lg-5">
                {{-- payment instruction --}}
                <div class="payment-instruction">
                    <h4 class="text-center mb-3">Payment Instruction</h4>
                    <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque,
                        quos.</p>
                    <ul>
                        <li class="d-flex justify-between align-items-center"><i class="fas fa-check"></i><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, provident.</span></li>
                        <li class="d-flex justify-between align-items-center"><i class="fas fa-check"></i><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, provident.</span></li>
                        <li class="d-flex justify-between align-items-center"><i class="fas fa-check"></i><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, provident.</span></li>
                        <li class="d-flex justify-between align-items-center"><i class="fas fa-check"></i><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, provident.</span></li>
                        <li class="d-flex justify-between align-items-center"><i class="fas fa-check"></i><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, provident.</span></li>
                        <li class="d-flex justify-between align-items-center"><i class="fas fa-check"></i><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, provident.</span></li>
                        <li class="d-flex justify-between align-items-center"><i class="fas fa-check"></i><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, provident.</span></li>

                    </ul>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection
