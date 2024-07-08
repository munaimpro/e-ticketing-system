
<div class="container pt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>
                            Bus Fares List
                            <a data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-primary float-end">Create Bus Fares</a>
                        </h4>
                    </div>
                </div>
                <hr class="bg-warning"/>
                <div class="card-body">
                    <table id="tableData" class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Coach Name</th>
                                <th scope="col">Boarding Point</th>
                                <th scope="col">Boarding Time</th>
                                <th scope="col">Dropping Point</th>
                                <th scope="col">Dropping Time</th>
                                <th scope="col">Fare</th>
                                {{-- <th scope="col">Payment Status</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList"></tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<script>

getBusFaresList();

    async function getBusFaresList(){
        try {
            showLoader();
            let response = await axios.get('/bus-fares-list');
            console.log(response.data);
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            response.data.forEach(function(item, index) {
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.bus.coach_name}</td>
                        <td>${item.boarding_point}</td>
                        <td>${item.boarding_time}</td>
                        <td>${item.dropping_point}</td>
                        <td>${item.dropping_time}</td>
                        <td>${item.fare}</td>
                        <td>
                            <button data-id=${item.id} data-bs-toggle="modal" data-bs-target="#update-modal" class="editBtn btn bg-gradient-success"><i class='fas fa-edit'></i></button>
                        </td>
                    </tr>`;
                tableList.append(row);
            })

            new DataTable('#tableData');

            $('.editBtn').on('click', async function(){
                let id = $(this).data('id');
                await FillUpForm(id);
            });

            $('.deleteBtn').on('click', async function(){
                let id = $(this).data('id');
                $('#deleteID').val(id);
            });

        } catch (error) {
            console.error('Error fetching bus data:', error);
        }
    }




    async function onDelete(busId) {
        if (confirm("Are you sure you want to delete this bus?")) {
            try {
                let response = await axios.delete('/bus-delete', { data: { id: busId } });
                if (response.data.status === 'Success') {
                    alert(response.data.message);
                    // Refresh the list
                    getBusFaresList();
                } else {
                    alert(response.data.message);
                }
            } catch (error) {
                console.error('Error deleting bus:', error);
            }
        }
    }

    getBusFaresList();
</script>





