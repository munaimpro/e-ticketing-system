@extends('layouts.app')

@section('content')

<!-- details-info -->
<section id="details-info" class="mt-5">
    <div class="container m-10" style="min-height: 70vh" >
        <div class="row details-content">

            <div class="col-md-4">
                <h2 class="my-4 mb-5 set-clr">Bus Seat Layout</h2>

                <div class="bus-layout">

                <!-- Replace this with dynamic seat generation -->
                <button class="bus-seat" id="A1" value="A1, {{$fare}}">A1</button>
                <button class="bus-seat" id="A2" value="A2, {{$fare}}">A2</button>
                <div class="items3"></div>
                <button class="bus-seat" id="A3" value="A3,  {{$fare}}">A3</button>
                <button class="bus-seat" id="A4" value="A4,  {{$fare}}">A4</button>
                <button class="bus-seat" id="B1" value="B1,  {{$fare}}">B1</button>
                <button class="bus-seat" id="B2" value="B2,  {{$fare}}">B2</button>
                <button class="bus-seat" id="B3" value="B3,  {{$fare}}">B3</button>
                <button class="bus-seat" id="B4" value="B4,  {{$fare}}">B4</button>
                <button class="bus-seat" id="C1" value="C1,  {{$fare}}">C1</button>
                <button class="bus-seat" id="C2" value="C2,  {{$fare}}">C2</button>
                <button class="bus-seat" id="C3" value="C3,  {{$fare}}">C3</button>
                <button class="bus-seat" id="C4" value="C4,  {{$fare}}">C4</button>
                <button class="bus-seat" id="D1" value="D1,  {{$fare}}">D1</button>
                <button class="bus-seat" id="D2" value="D2,  {{$fare}}">D2</button>
                <button class="bus-seat" id="D3" value="D3,  {{$fare}}">D3</button>
                <button class="bus-seat" id="D4" value="D4,  {{$fare}}">D4</button>
                <button class="bus-seat" id="D5" value="D5,  {{$fare}}">D5</button>

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
                        <button onclick="checkoutTicket()" name="checkout-button" id="checkout-button">checkout</button>
                      </div>
              </div>

        </div>
    </div>
</section>
<!-- details-info -->
<script>
   let arraydSeats = [];

// Function to handle button click
function handleClick(event) {
    const button = event.target; // Get the clicked button
    const value = button.value; // Get the value of the clicked button

    // Add the value to the arraydSeats array
    arraydSeats.push(value);

    // Optional: Log the array to the console for debugging
    console.log(arraydSeats);
}

// Attach event listeners to all buttons with class "bus-seat"
document.querySelectorAll('.bus-seat').forEach(button => {
    button.addEventListener('click', handleClick);
});
    async function checkoutTicket() {
        try {


            let bus_id = {{ intval($bus_id) }};
            let boarding_point = "{{ $boarding_point }}";
            let dropping_point = "{{ $dropping_point }}";
            let seats_fare = {{ intval($fare) }};
            let seats = document.getElementById('totalSelectedSeat').textContent;
            let total_Fare = document.getElementById('totalFare').textContent; // Access content using textContent
            let doj = "{{ $doj }}";
            alert(total_Fare );
            alert(bus_id);
            let type = document.getElementById('type').value;

            if(total_Fare.length === 0){
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: 'Customer id number required',
                showConfirmButton: false,
                timer: 2000
            });
            } else if(type.length === 0){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Account type required',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else{
                let res = await axios.post("/check_out_ticket",{id:id, type:type},HeaderToken())

                if(res.data['status']==="success"){
                    document.getElementById("save-form").reset();

                    await getList();

                    Swal.fire({
                        icon: 'success',
                        title: res.data['message'],
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: res.data['message'],
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }

        }catch (e) {
            unauthorized(e.res.status)
        }
    }
</script>
@endsection
