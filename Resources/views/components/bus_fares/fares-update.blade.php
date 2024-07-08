

<!-- modal body for insert bus data -->
@php
    $buses = App\Models\Bus::all();
    $routes = App\Models\BusRoute::all();
@endphp
<div class="modal fade" id="update-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Update Bus Fares</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bus-fares-form-update">
                    <div class="mb-3">
                        {{-- <label for="coach_name">Coach Name</label>
                        <input type="text" id="coach_name" class="form-control"> --}}
                        <label for="bus_id_update" class="form-label">Bus Id</label>
                        <select id="bus_id_update" class="form-select">
                            <option selected>Choose...</option>
                            @foreach ($buses as $bus)
                            <option value="{{ $bus->id }}">{{$bus->coach_name}}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="boarding_point_update" class="form-label">Broding Point</label>
                        <select id="boarding_point_update" class="form-select">
                            <option selected>Choose...</option>
                            @foreach ($routes as $route)
                            <option value="{{ $route->name}}">{{ $route->name}}</option>
                            @endforeach

                        </select>
                        {{-- <input type="text" id="boarding_point" class="form-control"> --}}
                    </div>
                    <div class="mb-3">
                        <label for="boarding_time_update">Boarding Time</label>
                        <input type="time" id="boarding_time_update" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="dropping_point_update">Droping Point</label>
                        <select id="dropping_point_update" class="form-select">
                            <option selected>Choose...</option>
                            @foreach ($routes as $route)
                            <option value="{{ $route->name}}">{{ $route->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dropping_time_update">Droping Time</label>
                        <input type="time" id="dropping_time_update" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fare_update">Fare</label>
                        <input type="number" id="fare_update" class="form-control">
                    </div>
                    <input type="hidden" id="busFaresId">
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="BusfaresUpdate()" id="save-btn" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- this script is to bus data  insert -->
<script>
    async function FillUpForm(busFaresId) {
        // console.log(busFaresId);
        try {
           document.getElementById('busFaresId').value = busFaresId;

            let response = await axios.post(`/busFaresData`, {id:busFaresId});
            //console.log(response.data);
            if(response.status === 200){
                showLoader();
                document.getElementById('bus_id_update').value = response.data.busFare.bus_id;
                document.getElementById('boarding_point_update').value = response.data.busFare.boarding_point;
                document.getElementById('boarding_time_update').value = response.data.busFare.boarding_time;
                document.getElementById('dropping_point_update').value = response.data.busFare.dropping_point;
                document.getElementById('dropping_time_update').value = response.data.busFare.dropping_time;
                document.getElementById('fare_update').value = response.data.busFare.fare;
                hideLoader();
            }
        } catch (error) {
            console.error('Error Fetching Bus Fare Data:', error);
        }
    }
    async function BusfaresUpdate() {
        try {
            let busFares_id = document.getElementById('busFaresId').value;
            let busId = document.getElementById('bus_id_update').value;
            let boarding_point = document.getElementById('boarding_point_update').value;
            let boarding_time = document.getElementById('boarding_time_update').value;
            let dropping_point = document.getElementById('dropping_point_update').value;
            let dropping_time = document.getElementById('dropping_time_update').value;
            let fare = document.getElementById('fare_update').value;

            if(busId.length === 0){
                errorToast("Bus Id required");
            } else if(boarding_point.length === 0){
                errorToast("Boarding point required");
            } else if(boarding_time.length === 0){
                errorToast("Boarding time required");
            } else if(dropping_point.length === 0){
                errorToast("Dropping point required");
            }else if(dropping_time.length === 0){
                errorToast("Dropping time required");
            }else if(fare.length === 0){
                errorToast("Fare required");
            }else{
                document.getElementById('update-modal-close').click();

                showLoader();

                let response = await axios.post('/bus-fares-update', {
                    id: busFares_id,
                    bus_id: busId,
                    boarding_point: boarding_point,
                    boarding_time: boarding_time,
                    dropping_point: dropping_point,
                    dropping_time: dropping_time,
                    fare: fare,
                });
                console.log(response.data);
                hideLoader();

                if (response.data['status'] === 'success') {
                    document.getElementById("bus-fares-form-update").reset();

                    await getBusFaresList();

                    successToast(response.data['message']);
                } else {
                    errorToast(response.data['message']);
                }
            }
        } catch (error) {
            console.error('Data Update failed', error.response);
        }
    }
</script>



