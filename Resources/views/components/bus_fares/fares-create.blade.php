@php
    $buses = App\Models\Bus::all();
    $routes = App\Models\BusRoute::all();
@endphp
<div class="modal fade" id="create-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Create Bus</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bus-fares-form">
                    <div class="mb-3">
                        {{-- <label for="coach_name">Coach Name</label>
                        <input type="text" id="coach_name" class="form-control"> --}}
                        <label for="bus_id" class="form-label">Bus Id</label>
                        <select id="bus_id" class="form-select">
                            <option selected>Choose...</option>
                            @foreach ($buses as $bus)
                            <option value="{{ $bus->id }}">{{$bus->coach_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="boarding_point" class="form-label">Broding Point</label>
                        <select id="boarding_point" class="form-select">
                            <option selected>Choose...</option>
                            @foreach ($routes as $route)
                            <option value="{{ $route->name}}">{{ $route->name}}</option>
                            @endforeach

                        </select>
                        {{-- <input type="text" id="boarding_point" class="form-control"> --}}
                    </div>
                    <div class="mb-3">
                        <label for="boarding_time">Boarding Time</label>
                        <input type="time" id="boarding_time" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="dropping_point">Droping Point</label>
                        <select id="dropping_point" class="form-select">
                            <option selected>Choose...</option>
                            @foreach ($routes as $route)
                            <option value="{{ $route->name}}">{{ $route->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dropping_time">Droping Time</label>
                        <input type="time" id="dropping_time" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fare">Fare</label>
                        <input type="number" id="fare" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="createBusfares()" id="save-btn" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- this script is to bus data  insert -->
<script>
    async function createBusfares() {
        try {
            let busId = document.getElementById('bus_id').value;
            console.log(busId);
            let boardingPoint = document.getElementById('boarding_point').value;
            let boardingTime = document.getElementById('boarding_time').value;
            let droppingPoint = document.getElementById('dropping_point').value;
            let droppingTime = document.getElementById('dropping_time').value;
            let fare = document.getElementById('fare').value;

            if(boardingPoint.length === 0){
                errorToast("Boarding point required");
            } else if(boardingTime.length === 0){
                errorToast("Boarding time required");
            } else if(droppingPoint.length === 0){
                errorToast("Dropping point required");
            }else if(droppingTime.length === 0){
                errorToast("Dropping time required");
            }else if(fare.length === 0){
                errorToast("Fare required");
            }else{
                $('#modal-close').click();

                showLoader();

                let response = await axios.post('/bus-fares-create', {
                    bus_id: busId,
                    boarding_point: boardingPoint,
                    boarding_time: boardingTime,
                    dropping_point: droppingPoint,
                    dropping_time: droppingTime,
                    fare: fare,
                });

                hideLoader();

                if (response.data['status'] === 'success') {
                    document.getElementById("bus-fares-form").reset();

                    await getBusFaresList();

                    successToast(response.data['message']);
                } else {
                    errorToast(response.data['message']);
                }
            }
        } catch (error) {
            // errorToast(response.data['message']);
        }
    }
</script>



