

<!-- Modal body for updating bus data -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Update Bus Information</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="mb-3">
                        <label for="coach_name">Coach Name</label>
                        <input type="text" id="coach_name_update" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="coach_type">Coach Type</label>
                        <input type="text" id="coach_type_update" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="total_seats">Total Seats</label>
                        <input type="number" id="total_seats_update" class="form-control">
                    </div>
                    <input type="hidden" id="busId">
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="busUpdate()" id="save-btn" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Script for updating bus data -->
<script>
    // Function for getting single bus data
    async function FillUpForm(busId) {
        try {
            document.getElementById('busId').value = busId;

            let response = await axios.post(`/getBusData`, {id:busId});

            if(response.status === 200){
                showLoader();
                document.getElementById('coach_name_update').value = response.data.bus[0].coach_name;
                document.getElementById('coach_type_update').value = response.data.bus[0].coach_type;
                document.getElementById('total_seats_update').value = response.data.bus[0].total_seats;
                hideLoader();
            }
        } catch (error) {
            console.error('Error Fetching Bus Data:', error);
        }
    }

    // Function for update bus data
    async function busUpdate() {
        try {
            let busId = document.getElementById('busId').value;
            let coachName = document.getElementById('coach_name_update').value;
            let coachType = document.getElementById('coach_type_update').value;
            let totalSeats = document.getElementById('total_seats_update').value;

            if(coachName.length === 0){
                errorToast("Coach name required");
            } else if(coachType.length === 0){
                errorToast("Coach type required");
            } else if(totalSeats.length === 0){
                errorToast("Total seat number required");
            } else{
                document.getElementById('update-modal-close').click();

                showLoader();

                let response = await axios.post('/bus-update', {
                    id: busId,
                    coach_name: coachName,
                    coach_type: coachType,
                    total_seats: totalSeats
                });

                hideLoader();

                if (response.data['status'] === 'success') {
                    document.getElementById("user-form").reset();
                    
                    await getBusList();

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
