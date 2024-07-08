



<div class="container pt-5">
    <div class="row"> 
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Customer</h4>
                    </div>
                </div>
                <hr class="bg-warning"/>
                <div class="table-responsive">
                <table class="table" id="tableData">
                    <thead>
                    <tr class="bg-light">
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tableList">
    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    getList();

    async function getList(){
        try {
            showLoader();
            let response = await axios.get('/user-all');
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
                            {{--<button data-id=${item.id} data-bs-toggle="modal" data-bs-target="#update-modal" class="editBtn btn bg-gradient-success"><i class='fas fa-edit'></i></button>--}}
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
            console.error('Error fetching user data:', error);
        }
    }

</script>