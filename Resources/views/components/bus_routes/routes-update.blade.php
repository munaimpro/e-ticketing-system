  <!-- Modal -->
  <div class="modal fade" id="updateRouteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Update route</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="route-form">
                <div class="container">
                  <div class="row">
                    <div class="col-12 p-1">
                      <label class="form-label">Route Name *</label>
                      <input type="text" class="form-control mb-2" id="update_route_name">
                      <input type="hidden" id="routeID">
                    </div>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" onclick="saveUpdateRoute()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    async function getRoute(routeID) {
        try {
            let response = await axios.get(`/routes/${routeID}`);
            console.log(response.data);
            document.getElementById('update_route_name').value = response.data.name;

            document.getElementById('routeID').value = routeID;
        } catch (error) {
            console.error('Error fetching route:', error);
        }
    }

    async function saveUpdateRoute() {
        let routeID = document.getElementById('routeID').value;
        let routeName = document.getElementById('update_route_name').value;

        try {
            let response = await axios.put(`/routes/${routeID}`, {
                name: routeName
            });
            if (response.status == 200) {
                closeModal('updateRouteModal');
                getrouteList();
                console.log('Route updated successfully');
            } else {
                console.error('Failed to update route');
            }
        } catch (error) {
            console.error('Error updating route:', error);
        }
    }

    function closeModal(modalId) {
        let modalElement = document.getElementById(modalId);
        let modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    }
</script>

