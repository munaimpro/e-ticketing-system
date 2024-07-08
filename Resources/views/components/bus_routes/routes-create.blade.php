<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Create route</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="route-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">route Name *</label>
                                <input type="text" class="form-control mb-2" id="route-name">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="createRoute()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Your HTML modal code -->

<script>
    async function createRoute() {
        let routeName = document.getElementById('route-name').value;
        try {
            console.log({
                name: routeName,
            });
            let response = await axios.post('/routes-create', {
                name: routeName,
            });
            if (response.status == 200) {
                document.getElementById('route-form').reset();
                closeModal('exampleModal');
                getrouteList();
                console.alert('Data inserted successfully');
            } else {
                alert('Something went wrong');
            }
        }catch (error) {
            console.log(error);
        }
    }

    function closeModal(modalId) {
        let modalElement = document.getElementById(modalId);
        let modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    }

</script>
