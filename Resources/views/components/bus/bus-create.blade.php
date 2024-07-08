
<!-- modal body for insert bus data -->

<div class="modal fade" id="create-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Create Bus</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="user-form">
                    <div class="mb-3">
                        <label for="coach_name">Coach Name</label>
                        <input type="text" id="coach_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="coach_type">Coach Type</label>
                        <input type="text" id="coach_type" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="total_seats">Total Seats</label>
                        <input type="number" id="total_seats" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="busRegistration()" id="save-btn" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- this script is to bus data  insert -->
<script>
    async function busRegistration() {
        try {
            let coachName = document.getElementById('coach_name').value;
            let coachType = document.getElementById('coach_type').value;
            let totalSeats = document.getElementById('total_seats').value;

            if(coachName.length === 0){
                errorToast("Coach name required");
            } else if(coachType.length === 0){
                errorToast("Coach type required");
            } else if(totalSeats.length === 0){
                errorToast("Total seat number required");
            } else{
                $('#modal-close').click();

                showLoader();

                let response = await axios.post('/bus-create', {
                    coach_name: coachName,
                    coach_type: coachType,
                    total_seats: totalSeats,
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
            // errorToast(response.data['message']);
        }
    }
</script>



