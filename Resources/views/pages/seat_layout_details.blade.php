@extends('layouts.app')

@section('content')
<style>
    /* Style the tooltip */
.tooltip .tooltip-inner {
    background-color: #dc3545;
}

/* Style the tooltip arrow */
.tooltip .arrow::before {
    border-top-color: #dc3545;
}

/* Style the background color of booked seats */
.bg-danger {
    background-color: #dc3545 !important;
    color: #fff; /* Change text color to white */
}
</style>
<!-- details-info -->
<section id="details-info" class="mt-5">
    <div class="container m-10" style="min-height: 70vh" >
        <div class="row details-content">

            <div class="col-md-4">
                <h2 class="my-4 mb-5 set-clr">Bus Seat Layout</h2>
                <div class="bus-layout">
                    @php
                        // Define seat layout with the number of seats in each row
                        $seatRows = [
                            'A' => 4, 'B' => 4, 'C' => 4, 'D' => 4,
                            'E' => 4, 'F' => 4, 'G' => 4, 'H' => 5
                        ];
                    @endphp

                    @foreach ($seatRows as $row => $seatCount)
                        @for ($number = 1; $number <= $seatCount; $number++)
                            @php
                                $seatId = $row . $number;
                                $isBooked = in_array($seatId, $sold_seats);
                                $tooltipText = $isBooked ? 'Booked' : 'Available';
                                $bgClass = $isBooked ? 'bg-danger' : '';
                            @endphp

                            <button class="bus-seat {{ $bgClass }}" 
                                    id="{{ $seatId }}" 
                                    value="{{ $seatId }}, {{ $fare }}"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ $tooltipText }}" 
                                    {{ $isBooked ? 'disabled' : '' }}>
                                {{ $seatId }}
                            </button>

                            {{-- Insert divider after every 2 seats, but not after the last seat in the row --}}
                            @if ($number % 2 === 0 && $number < $seatCount) 
                                <div class="items3"></div>
                            @endif
                        @endfor
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="my-4 mb-5 set-clr">Bus Details</h2>


                    <h6 class="bus-details p-2">
                       <span><i class="fa fa-map-marker-alt"></i> Boarding Points :</span>
                       <span id="boarding_point"> {{$boarding_point}} </span>

                    </h6>
                    <h6 class="p-2 bus-details">
                        <span><i class="fa fa-map-marker-alt"></i> Dropping Points :</span>
                       <span id="dropping_point"> {{$dropping_point}} </span>
                    </h6>
                    <h6 class="p-2 bus-details">
                        <span class=""><i class="fa fa-bus"></i>
                            TYPE :</span> <?php echo $type;?>
                    </h6>
                    <h6 class="p-2 bus-details">
                       <span><i class="fa fa-money-bill-alt"></i> Seat Fare :</span>
                       <span id="seat_fare"> {{$fare}} </span>

                    </h6 class="p-2">
                    <h6 class="p-2 bus-details">
                        <span class="wbtm-details-page-list-label"><i class="fa fa-calendar-alt"></i>
                            Jurny Date:</span> <?php echo $new_date ;?>
                    </h6>
                    <!-- <h6 class="mx-10">
                        <strong>34</strong>
                        <span>Seat Available</span>
                    </h6> -->


          </div>

              <div class="col-md-4 booking-details">
                      <h2 class="my-4 mb-5 set-clr">Booking Details</h2>
                      <!-- <h3> Selected Seats (<span id="counter">0</span>):</h3> -->
                      <h3 >Total Selected Seats:<span id="totalSelectedSeat"> 0</span></h3>
                      <table class="w-100" id="resultTable" name="resultTable">
                        <thead>
                            <tr>
                            <th>sl</th>
                            <th>Seat No</th>
                            <th>FARE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="noSeatRow">
                                <td colspan="3">No Seat Selected yet</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total Fare</td>
                                <td id="totalFare" name="total_fare">0</td>
                            </tr>
                        </tfoot>
                      </table>
                      <input type="hidden" name="doj" id="date" value="<?php echo $doj ?>">

                      <div class="text-center search-btn">
                        <!-- <button onclick="checkoutTicket()" name="checkout-button" id="checkout-button">checkout</button> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#checkoutModal">
                            Checkout
                        </button>
                      </div>
              </div>

        </div>
    </div>
<!-- The Modal -->
<div class="modal fade checkoutModal" id="checkoutModal"  tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
                <div class="payment-content">
                    <h4 class="text-center mb-3">Payment</h4>
                    <p class="text-center mt-2 mb-2"><span>Mobile Banking</span>: +880 123 456 789</p>
                    <p class="text-center mb-5"><span>Visa / Master Card</span>: +880 123 456 789</p>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="bkash" name="payment_get" value="bkash">
                            <label class="form-check-label" for="bkash"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/bkash-home.png') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="nagad" name="payment_get" value="nagad"> 
                            <label class="form-check-label" for="nagad"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/nagad-32.png') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="nexus" name="payment_get" value="nexus">
                            <label class="form-check-label" for="nexus"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/nexus-debit-home.svg') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="rocket" name="payment_get" value="rocket">
                            <label class="form-check-label" for="rocket"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/rocket-home.svg') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="upay" name="payment_get" value="upay">
                            <label class="form-check-label" for="upay"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/upay-home.svg') }}" alt=""></label>
                        </div>
                    </div>
                    <div class="payment-img">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="visa" name="payment_get" value="visa">
                            <label class="form-check-label" for="visa"><img class="img-fluid"
                                    src="{{ asset('asset/images/payment/visa-home.png') }}" alt=""></label>
                        </div>
                    </div>
                    {{-- transaction id --}}
                    <p class="mb-2">Total Paid Amount: <span id="modalTotalFare"></span></p>
                    <div class="transaction-id">
                        <label for="transaction-id">Transaction ID</label>
                        <input type="text" class="form-control mt-2" id="transaction-id"
                            placeholder="Enter Transaction ID" required>
                    </div>

                    <div class="search-btn text-center modal-footer">
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="checkoutTicket()">Confirm</button>
                    </div>
                </div>


            </div>
    </div>
  </div>
</div>

</section>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- details-info -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
      $('#checkoutModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        modal.find('#modalTotalFare').text(document.getElementById('totalFare').textContent);
    });

        let arraydSeats = [];

        // Function to handle button click
        function handleClick(event) {
            const button = event.target; // Get the clicked button
            const value = button.id; // Get the value of the clicked button

            // Add the value to the arraydSeats array
            if (!arraydSeats.includes(value)) {
                arraydSeats.push(value);
            }
            // Log the length of arraydSeats to the console
            console.log("Length of arraydSeats:", arraydSeats.length);
        }

        // Attach event listeners to all buttons with class "bus-seat"
        document.querySelectorAll('.bus-seat').forEach(button => {
            button.addEventListener('click', handleClick);
        });

    // checkoutTicket() start from here
    async function checkoutTicket() {

    let bus_id = {{ intval($bus_id) }};
    let boarding_point = "{{ $boarding_point }}";
    let dropping_point = "{{ $dropping_point }}";
    let seats_fare = {{ intval($fare) }};
    let seats = document.getElementById('totalSelectedSeat').textContent;
    let total_Fare = document.getElementById('totalFare').textContent;
    let doj = "{{ $doj }}";
    let type =1;
  
  // Get the selected radio button
        var selectedPayment = document.querySelector('input[name="payment_get"]:checked');
        paymentGet=selectedPayment.value;
        let transaction_id = document.getElementById('transaction-id').value;
        // Check if a radio button is selected
        // if (selectedPayment) {
        //     // Log the value of the selected radio button to the console
        //     console.log("Selected payment method:", selectedPayment.value);
        // } else {
        //     console.log("No payment method selected."); // Log a message if no radio button is selected
        // }

    // Send data to backend using Axios POST request
    try {
        // Send data to backend using Axios POST request
        let response = await axios.post("/checkout-ticket", {
            bus_id: bus_id,
            boarding_point: boarding_point,
            dropping_point: dropping_point,
            seats_fare: seats_fare,
            seats: seats,
            total_fare: total_Fare,
            doj: doj,
            type: type,
            paymentGet:paymentGet,
            arraydSeats:arraydSeats,
            transaction_id:transaction_id,
        });
        if(response.status === 200){
             // Hide the modal
             $('.checkoutModal').modal('hide');
            // Handle response as needed
            console.log(response.data);
             // Redirect to the dashboard and pass a message
            window.location.href = '/purchase_history';
        } else {
                // Handle other response statuses if needed
                console.error("Unexpected response status:", response.status);
            }
           
        } catch (error) {
            // Handle error
            console.error("Error:", error);
        }
    
}
</script>
@endsection
