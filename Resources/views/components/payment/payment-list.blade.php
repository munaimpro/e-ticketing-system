
<div class="container pt-5">
    <div class="row"> 
        <div class="col-md-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>
                           Payment History
                        </h4>
                    </div>
                </div>
                <hr class="bg-warning"/>
                <div class="card-body">
                    <table id="tableData" class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Booking Id</th>
                                <th scope="col">Payment Getway</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
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

    getBusList();
    
    async function getBusList(){
        try {
            showLoader();
            let response = await axios.get('/payment-list');
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            response.data.forEach(function(item, index) {
                let statusHtml = item['status'] === 0 ? '<span class="badge bg-danger">Pending</span>' : (item['status'] === 1 ? '<span class="badge bg-success">Verified</span>' : '<span class="badge bg-dark">Closed</span>');
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.booking_id}</td>
                        <td>${item.payment_get}</td>
                        <td>${item.transaction_id}</td>
                        <td>${item.amount}</td>
                        <td class="status">${statusHtml}</td>
                        <td>
                            <button 
                            data-id=${item.booking_id} 
                            data-getway="${item.payment_get}" 
                            data-trxn="${item.transaction_id}"
                            data-amount="${item.amount}" 
                            data-bs-toggle="modal" data-bs-target="#update-modal" class="editBtn btn bg-gradient-success" ${item['status'] === 1 ? 'disabled' : ''}><i class='fas fa-edit'></i></button>
                        </td>
                    </tr>`;
                tableList.append(row);
            })

            new DataTable('#tableData');

            $('.editBtn').on('click', async function(){
                let id = $(this).data('id');

                let getway = $(this).data('getway');
                let trxn = $(this).data('trxn');
                let amount = $(this).data('amount');

                $('#payid').val(id);
                $('#getway').val(getway);
                $('#trxn').val(trxn);
                $('#amount').val(amount);
            });


        } catch (error) {
            console.error('Error fetching bus data:', error);
        }
    }
</script>





