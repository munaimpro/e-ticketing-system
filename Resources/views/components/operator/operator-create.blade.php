
<!-- modal body for insert bus data -->

<div class="modal fade" id="create-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Create Operator</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="user-form">
                    <div class="mb-3">
                        <label for="operator_name">Operator Name</label>
                        <input type="text" id="operator_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="operator_email">Email</label>
                        <input type="text" id="operator_email" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="operatorRegistration()" id="save-btn" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- this script is to bus data  insert -->
<script>
    async function operatorRegistration() {
        try {
            let operatorName = document.getElementById('operator_name').value;
            let operatorEmail= document.getElementById('operator_email').value;

            if(operatorName.length === 0){
                errorToast("Operator name required");
            } else if(operatorEmail.length === 0){
                errorToast("Operator Emailrequired");
            } else{
                $('#modal-close').click();

                showLoader();
                
                let response = await axios.post('/operator-create', {
                  operatorName: operatorName,
                  operatorEmail: operatorEmail,
                });

                hideLoader();

                if (response.data['status'] === 'success') {
                    document.getElementById("user-form").reset();
                    
                    await getOpratorList();

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



