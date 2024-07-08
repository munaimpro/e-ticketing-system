@extends('layouts.admin.sidenav-layout')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Salse History</h4>
                </div>
            </div>
            <hr class="bg-warning"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Coach Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Date of Journey</th>
                    <th>Amount</th>
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
    
    async function getList() {
    
       try {
           showLoader();
           let res = await axios.get("/ticketSalseHistory");
           hideLoader();
    
           let tableList = $("#tableList");
           let tableData = $("#tableData");
    
           tableData.DataTable().destroy();
           tableList.empty();
    
           res.data['sale'].forEach(function (item, index) {
               let row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item['user']['name']}</td>
                        <td>${item['bus']['coach_name']}</td>
                        <td>${item['from']}</td>
                        <td>${item['to']}</td>
                        <td>${item['doj']}</td>
                        <td>${item['amount']}</td>
                     </tr>`;
               tableList.append(row);
           });
    
           new DataTable('#tableData', {
               order: [[0, 'desc']],
               lengthMenu: [5, 10, 15, 20, 30]
           });
    
       } catch (e) {
           console.error(e.getMessage());
       }
    
    }
    
</script>
    

@endsection






