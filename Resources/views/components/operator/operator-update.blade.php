<!-- Modal body for updating Operator data -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Update Operator Information</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="mb-3">
                        <label for="operator_name_update">Operator Name</label>
                        <input type="text" id="operator_name_update" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="operator_email_update">Coach Type</label>
                        <input type="text" id="operator_email_update" class="form-control">
                    </div>
                    <input type="hidden" id="operatorId">
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="operatorUpdate()" id="save-btn" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Script for updating bus data -->
<script>
    // Function for getting single bus data
    async function FillUpForm(operatorId) {
        try {
            document.getElementById('operatorId').value = operatorId;

            let response = await axios.post(`/operatorData`, {id:operatorId});
console.log(response.data.operator);
            if(response.status === 200){
                showLoader();
                document.getElementById('operator_name_update').value = response.data.operator[0].name;
                document.getElementById('operator_email_update').value = response.data.operator[0].email;
                hideLoader();
            }
        } catch (error) {
            console.error('Error Fetching Bus Data:', error);
        }
    }

    // Function for update bus data
    async function operatorUpdate() {
        try {
            let operatorId = document.getElementById('operatorId').value;
            let operator_name= document.getElementById('operator_name_update').value;
            let operator_email = document.getElementById('operator_email_update').value;

            if(operator_name.length === 0){
                errorToast("Operator name required");
            } else if(operator_email.length === 0){
                errorToast("Email required");
            } else{
                document.getElementById('update-modal-close').click();

                showLoader();

                let response = await axios.post('/operator-update', {
                    id: operatorId,
                    operator_name: operator_name,
                    operator_email: operator_email,
                });

                hideLoader();

                if (response.data['status'] === 'success') {
                    document.getElementById("update-form").reset();
                    
                    await getOpratorList();

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
