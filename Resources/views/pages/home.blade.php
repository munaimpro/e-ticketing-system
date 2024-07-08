@extends('layouts.app')

@section('content')


<!-- cover section start -->
<section id="cover">
    <div class="container ">
        <div class="row">

            <!-- form section for search bus  -->
            <div class="col-lg-12 col-md-12">
                <div class="cover-form">
                    <form class="row g-3" action="/bus-information" method="GET"> @csrf
                        <div class="col-lg-3">
                            <label for="validationDefault01" class="form-label">From :</label>
                            <select class="form-control" name="from" id="from" required>
                                <option value="">Select Boarding Point</option>
                                @foreach($busStops as $stopName)
                                <option value="{{ $stopName }}">{{ $stopName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="validationDefault02" class="form-label">To :</label>
                            <select class="form-control" name="to" id="to" required>
                                <option value="">Select Dropping Point</option>
                                @foreach($busStops as $stopName)
                                <option value="{{ $stopName }}">{{ $stopName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="validationDefault02" class="form-label">Date Of Journey :</label>
                            <input type="date" id="doj" class="form-control" name="doj"
                                placeholder="Select Date Of Journey" required>
                        </div>
                        <div class="col-lg-2">
                            <label for="validationDefault04" class="form-label">Choose a Class :</label>
                            <select class="form-select" id="validationDefault04" required>
                                <option selected value="">Choose a class</option>
                                <option>AC Bus </option>
                                <option>None AC Bus </option>
                            </select>
                        </div>
                        <div class="col-lg-2 search-btn text-center">
                            <button class="btn " type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- right section for view hero benar -->

         
        </div>
    </div>
</section>
<!-- cover section end -->

{{-- about section start --}}
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-header">
                    <h4>About Us</h4>
                    <h2>More Than 25 Years We Provide Bus Charter Service For You</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi </p>
                </div>
                <div class="about-icon">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-icon-inner d-flex ">
                                <div class="icon">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="text">
                                    <h4>Brilient Client Service </h4>
                                </div>
                            </div>
                            <div class="about-icon-inner d-flex ">
                                <div class="icon">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="text">
                                    <h4>24/7 Support </h4>
                                </div>
                            </div>
                            <div class="about-icon-inner d-flex ">
                                <div class="icon">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="text">
                                    <h4>Free Consultations</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-icon-inner d-flex ">
                                <div class="icon">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="text">
                                    <h4>User Experience </h4>
                                </div>
                            </div>
                            <div class="about-icon-inner d-flex ">
                                <div class="icon">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="text">
                                    <h4>Big Data & Analytics</h4>
                                </div>
                            </div>
                            <div class="about-icon-inner d-flex ">
                                <div class="icon">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="text">
                                    <h4>Quick Tips and Advice</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-btn">
                    <button class="btn"> More About Us
                    </button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img">
                    <img class="img-fluid w-100" src="{{ asset('asset/images/about.jpg') }}" alt="">
                </div>
            </div>
        </div>
</section>
{{-- about section start --}}

{{-- why choose us section start --}}
<section id="choose">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="choose-img">
                    <img class="img-fluid w-100" src="{{ asset('asset/images/choose.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-header">
                    <h4>Why Choose Us</h4>
                    <h2>We Are Experts In Bus Charter Service Company Since 1997</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo </p>

                    <div class="choose-icon">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="choose-icon-inner d-flex">
                                    <div class="icon mt-3">
                                        {{-- bus --}}
                                        <i class="fa-solid fa-bus"></i>
                                    </div>
                                    <div class="text">
                                        <h4>25 <span>+</span></h4>
                                        <p>Bus Routes</p>
                                    </div>
                                </div>
                                <div class="choose-icon-inner d-flex ">
                                    <div class="icon mt-3">
                                        <i class="fa-regular fa-face-smile"></i>
                                    </div>
                                    <div class="text">
                                        <h4>1000 <span>+</span></h4>
                                        <p>Satisfied Customer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="choose-icon-inner d-flex ">
                                    <div class="icon mt-3">
                                       <i class="fa-regular fa-thumbs-up"></i>
                                    </div>
                                    <div class="text">
                                        <h4>25 <span>+</span></h4>
                                        <p>Booking Done</p>
                                    </div>
                                </div>
                                <div class="choose-icon-inner d-flex ">
                                    <div class="icon mt-3">
                                        {{-- Professional Team --}}
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div class="text">
                                        <h4>1000 <span>+</span></h4>
                                        <p>Professional Team</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</section>
{{-- why choose us section end --}}

<!-- Processing section start -->
<section id="processing">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="processing-header text-center mb-5">
                    <h4>How It Works</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate porro cupiditate deleniti
                        omnis ducimus expedita dolorum. Ea aut quasi molestiadoloribus blanditiis saepe qui.</p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="processing-inner fast-img text-center">
                    <img src="{{ asset('asset/images/search.svg') }}" alt="">
                    <div class="title">
                        <h3>Search</h3>
                        <p>Choose your origin, destination, journey dates and search for buses. </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="processing-inner text-center">
                    <img class="img-fluid" src="{{ asset('asset/images/select.svg') }}" alt="">
                    <div class="title mt-2">
                        <h3> Select</h3>
                        <p>Select your desired trip and choose your seats.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="processing-inner text-center">
                    <img src="{{ asset('asset/images/pay.svg') }}" alt="">
                    <div class="title">
                        <h3> Pay</h3>
                        <p>Pay for the tickets via Debit / Credit Cards or MFS.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Processing section start -->

<!-- Instruction section start -->
<section id="instruction">

    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-lg-5">
                <div class="inst-img">
                    <img class="img-fluid w-100" src="{{ asset('asset/images/instruction-secion-image.png') }}" alt="">
                </div>
            </div>

            <div class="col-lg-7">
                <h2 class="mb-5 int-head"> Instructions to Purchase Tickets </h2>
                <div class="instruction ">
                    <div class="int-content d-flex mb-3">
                        <div class="int-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="int-text">
                            <p>Tickets can be bought online ten days in advance.</p>
                        </div>

                    </div>
                    <div class="int-content d-flex mb-3">
                        <div class="int-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="int-text">
                            <p>You can pay for the tickets using mobile financial services: Bkash, Nagad, Rocket, Upay
                                or debit/credit cards: Mastercard, Visa, DBBL Nexus. Other payment options will be
                                available soon.</p>
                        </div>

                    </div>
                    <div class="int-content d-flex mb-3">
                        <div class="int-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="int-text">
                            <p>In case of payment or transaction failure, the deducted amount would be refunded by your
                                bank or MFS provider within 8 business days.</p>
                        </div>

                    </div>
                    <div class="int-content d-flex mb-3">
                        <div class="int-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="int-text">
                            <p>In case money has been deducted from your card / mobile wallet but you have not received
                                a ticket confirmation, the deducted amount would be refunded by your bank or MFS
                                provider within 8 business days.</p>
                        </div>

                    </div>
                    <div class="int-content d-flex mb-3">
                        <div class="int-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="int-text">
                            <p>If you have not received your ticket copy in email, kindly check your Spam / Junk folder.
                                You can also download your ticket copy from the purchase history of your account after
                                you login.</p>
                        </div>

                    </div>
                    <div class="int-content d-flex mb-3">
                        <div class="int-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="int-text">
                            <p>Download the official Rail Sheba app published by Bangladesh Railway from Google Play.
                            </p>
                        </div>

                    </div>
                    <div class="int-content d-flex mb-3">
                        <div class="int-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <div class="int-text">
                            <p>In case of passengers downloading fake apps or any other app from Google Play which claim
                                to sell train tickets of Bangladesh Railway, the authorities will not take any
                                liability.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Instruction section end -->


<!-- customer service section end -->
<section id="customer-service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="customer-header text-center mb-5">
                    <h2>Customer Service</h2>
                    <h4>Right Services for Great Customers</h4>
                </div>
            </div>
        </div>
        <div class="customer-service mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="customer-icon text-center">
                        {{-- wifi --}}
                        <i class="fa-solid fa-wifi"></i>
                        <h4>Free Wi-Fi</h4>
                        <p>We provide our guests with free high-speed Wi-Fi connection throughout the whole hotel area.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="customer-icon set-bg text-center">
                        {{-- resturent --}}
                        <i class="fa-solid fa-utensils"></i>
                        <h4>Food Break</h4>
                        <p>We provide our guests with free high-speed Wi-Fi connection throughout the whole hotel area.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="customer-icon text-center">
                        {{-- Prayer break --}}
                        <i class="fa-solid fa-mosque"></i>
                        <h4>Prayer Break</h4>
                        <p>We provide our guests with free high-speed Wi-Fi connection throughout the whole hotel area.
                        </p>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- customer service section end -->

{{-- our bus section start --}}
<section id="our-bus">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="our-bus-header text-center">
                    <h4>Our Bus</h4>
                    <h2>Our Bus Collection</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="bus-img">
                    <img class="img-fluid w-100" src="{{ asset('asset/images/bus1.jpg') }}" alt="">
                <div class="overly text-center">
                    <h2>Volto 403</h2>
                    <h5>$250<span>/day</span></h5>
                    <div class="icon pb-3">
                        {{-- 60 Seat --}}
                        <p><i class="fa-solid fa-users pt-4"></i>60 Seat</p>
                        {{-- 2 Driver Staff --}}
                        <p><i class="fa-solid fa-user"></i>2 Driver Staff</p>
                        {{-- Manual --}}
                        <p><i class="fa-solid fa-gear "></i>Manual</p>
                        {{-- Fully Insured --}}
                        <p><i class="fa-solid fa-shield"></i>Fully Insured</p>

                    <div class="main-btn1 text-center">
                        <button class="btn">Book Now
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bus-img">
                    <img class="img-fluid w-100" src="{{ asset('asset/images/bus2.jpg') }}" alt="">
                <div class="overly text-center">
                    <h2>Volto 403</h2>
                    <h5>$250<span>/day</span></h5>
                    <div class="icon pb-3">
                        {{-- 60 Seat --}}
                        <p><i class="fa-solid fa-users pt-4"></i>60 Seat</p>
                        {{-- 2 Driver Staff --}}
                        <p><i class="fa-solid fa-user"></i>2 Driver Staff</p>
                        {{-- Manual --}}
                        <p><i class="fa-solid fa-gear "></i>Manual</p>
                        {{-- Fully Insured --}}
                        <p><i class="fa-solid fa-shield"></i>Fully Insured</p>

                    <div class="main-btn1 text-center">
                        <button class="btn">Book Now
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bus-img">
                    <img class="img-fluid w-100" src="{{ asset('asset/images/bus3.jpg') }}" alt="">
                <div class="overly text-center">
                    <h2>Volto 403</h2>
                    <h5>$250<span>/day</span></h5>
                    <div class="icon pb-3">
                        {{-- 60 Seat --}}
                        <p><i class="fa-solid fa-users pt-4"></i>60 Seat</p>
                        {{-- 2 Driver Staff --}}
                        <p><i class="fa-solid fa-user"></i>2 Driver Staff</p>
                        {{-- Manual --}}
                        <p><i class="fa-solid fa-gear "></i>Manual</p>
                        {{-- Fully Insured --}}
                        <p><i class="fa-solid fa-shield"></i>Fully Insured</p>

                    <div class="main-btn1 text-center">
                        <button class="btn">Book Now
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- our bus section end --}}

<!-- customer count section end -->
<section id="counter">
    <div class="counter_bg">
        <div class="container px-lg-0">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="wow animate__animated animate__fadeInUp counter_inner">
                        <h4 class="counterr">140</h4>
                        <p>Guest</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="wow animate__animated animate__fadeInUp counter_inner">
                        <h4 class="counterr">1000</h4>
                        <p>Travellers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="wow animate__animated animate__fadeInUp counter_inner">
                        <h4 class="counterr">200</h4>
                        <p>Bus</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="wow animate__animated animate__fadeInUp counter_inner">
                        <h4 class="counterr">4500</h4>
                        <p>Happy Customer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- customer count section end -->

<script>
    $('.counterr').counterUp({
        delay: 10,
        time: 1000
    });

</script>
<!-- JS For From And To Unique Selection -->
<script>
    var fromSelect = document.getElementById("from");
    var toSelect = document.getElementById("to");
    // Add an event listener to the "from" select element
    fromSelect.addEventListener("change", function () {
        // Get the selected option value
        var selectedValue = fromSelect.value;
        // Loop through the "to" select options and hide the selected value
        for (var i = 0; i < toSelect.options.length; i++) {
            if (toSelect.options[i].value === selectedValue) {
                toSelect.options[i].style.display = "none";
            } else {
                toSelect.options[i].style.display = "block";
            }
        }

    });
    toSelect.addEventListener("change", function () {
        // Get the selected option value
        var selectedValue = toSelect.value;
        // Loop through the "from" select options and hide the selected value
        for (var i = 0; i < fromSelect.options.length; i++) {
            if (fromSelect.options[i].value === selectedValue) {
                fromSelect.options[i].style.display = "none";
            } else {
                fromSelect.options[i].style.display = "block";
            }
        }
    });

</script>
<!-- JS For Date Selection -->
<script>
    // Create a Date object with Dhaka's timezone offset (Bangladesh Standard Time: UTC+6)
    var currentDate = new Date();
    currentDate.setHours(currentDate.getHours() + 6);

    // Calculate the date 7 days from now
    var next7Days = new Date(currentDate);
    next7Days.setDate(currentDate.getDate() + 7);

    // Format the dates to "YYYY-MM-DD" format
    var formattedCurrentDate = currentDate.toISOString().slice(0, 10);
    var formattedNext7Days = next7Days.toISOString().slice(0, 10);

    // Set the minimum and maximum date attributes for the input element
    document.getElementById("doj").setAttribute("min", formattedCurrentDate);
    document.getElementById("doj").setAttribute("max", formattedNext7Days);

</script>


@endsection
