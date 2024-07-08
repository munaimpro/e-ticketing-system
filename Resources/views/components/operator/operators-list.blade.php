
<div class="container pt-5">
    <div class="row"> 
        <div class="col-md-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>
                            Opearators List
                            <a data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-primary float-end">Operator Create</a>
                        </h4>
                    </div>
                </div>
                <hr class="bg-warning"/>
                <div class="card-body">
                    <table id="tableData" class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Operator Name</th>
                                <th scope="col">Email</th>
                                <th scope="col-2">Action</th>
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

    getOpratorList();
    
    async function getOpratorList(){
        try {
            showLoader();
            let response = await axios.get('/operators-all-list');
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            response.data.forEach(function(item, index) {
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.email}</td>
                        <td>
                            <button data-id=${item.id} data-bs-toggle="modal" data-bs-target="#update-modal" class="editBtn btn bg-gradient-success"><i class='fas fa-edit'></i></button>
                            <button data-id=${item.id} data-bs-toggle="modal" data-bs-target="#delete-modal" class="deleteBtn btn bg-gradient-danger"><i class='fas fa-trash'></i></button>
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




    async function onDelete(operatorId) {
        if (confirm("Are you sure you want to delete this bus?")) {
            try {
                let response = await axios.delete('/bus-delete', { data: { id: operatorId } });
                if (response.data.status === 'Success') {
                    alert(response.data.message);
                    // Refresh the list
                    getBusList();
                } else {
                    alert(response.data.message);
                }
            } catch (error) {
                console.error('Error deleting bus:', error);
            }
        }
    }

    getBusList();
</script>





