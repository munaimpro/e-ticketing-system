

<!-- Modal body for updating bus data -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Update Payment Status</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                <div class="mb-3">
                        <label for="payid">Booking Id</label>
                        <input type="text" id="payid" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="getway">Payment Gateway Name</label>
                        <input type="text" id="getway" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="trxn">Transaction ID</label>
                        <input type="text" id="trxn" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="amount">Total Amount</label>
                        <input type="number" id="amount" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status_update">Update Status</label>
                        <select id="status_update" class="form-control">
                            <option value="0">Pending</option>
                            <option value="1">Verified</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="paymentUpdate()" id="save-btn" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Script for updating bus data -->
<script>
    // Function for update bus data
    async function paymentUpdate() {
        try {
            let payid = document.getElementById('payid').value;
            let statusUpdate = document.getElementById('status_update').value;

            if(statusUpdate === 0){
                errorToast("status Update required");
            }else{
                document.getElementById('update-modal-close').click();

                showLoader();

                let response = await axios.post('/payment-update', {
                    id: payid,
                    status: statusUpdate,
                });

                hideLoader();

                if (response.data['status'] === 'success') {
                    document.getElementById("update-form").reset();
                    
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
