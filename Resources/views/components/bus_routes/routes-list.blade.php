
<div class="route-list p-5">
    <div class="route-create d-flex justify-content-between">
        <h1 class="text-center">Route List</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Route
        </button>
    </div>
    <table class="table border mt-5">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">route Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="route-list">

        </tbody>
    </table>
</div>

<script>
    async function getrouteList() {
        let tableData = document.getElementById('route-list');
        tableData.innerHTML = '';
        try {
            let response = await axios.get('/routes-list');
            let i = 0;
            console.log('response', response.data);
            response.data.forEach(routes => {
                tableData.innerHTML += `<tr>
                     <th scope="row">${++i}</th>
                     <td>${routes.name}</td>
                     <td>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateRouteModal" onclick="getRoute(${routes.id})" class="btn btn-success"><i class="fas fa-edit"></i></button>


                        <button type="button" onclick="deleteroute(${routes.id})" class="btn btn-danger"> <i class="fas fa-trash"></i></button>

                     </td>
                   </tr>`;
            });
        } catch (error) {
            console.log(error);
        }
    }

    async function deleteroute(routeID) {
        if (confirm('Are you sure you want to delete this route?')) {
            try {
                const response = await axios.delete(`/routes/${routeID}`);
                if (response.status === 204) {
                    getrouteList();
                    console.log('route deleted successfully');
                } else {
                    console.error('Error deleting data');
                }
            } catch (error) {
                console.error('Error deleting data', error);
            }
        }
    }


    getrouteList();

    // function abcRoute(button){
    //     let routeID = button.getAttribute('data-id');
    //     let routeName = button.getAttribute('data-name');

    //     document.getElementById('route-id-edit').value = routeID;
    //     document.getElementById('route-name-edit').value = routeName;
    //     $('#exampleModal').modal('show');
    // }


    // <button type="button" onclick="abcRoute(this)" data-id="${routes.id}" data-name="${routes.name}" class="btn btn-success"><i class="fas fa-edit"></i></button>
//  async function abcRoute(button) {
//         try {
//             let routeID = button.getAttribute('data-id');
//         let routeName = button.getAttribute('data-name');
//             $('#route-name-edit').val(routeName);
//             $('#route-id-edit').val(routeID);
//         $('#updateModal').modal('show');

//         } catch (error) {
//             console.log(error);
//         }
//     }
</script>
