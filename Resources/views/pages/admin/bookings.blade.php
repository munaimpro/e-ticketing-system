@extends('layouts.admin.sidenav-layout')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Booking List</h4>
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
                    <th>Coach Type</th>
                    <th>Date of Journey</th>
                    <th>Booking ID</th>
                    <th>Status</th>
                    {{-- <th>Action</th> --}}
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
           let res = await axios.get("/bookingsList");
           hideLoader();
    
           let tableList = $("#tableList");
           let tableData = $("#tableData");
    
           tableData.DataTable().destroy();
           tableList.empty();
    
           res.data['bookings'].forEach(function (item, index) {
               let statusHtml = item['status'] === "0" ? '<span class="badge bg-danger">Pending</span>' : (item['status'] === "1" ? '<span class="badge bg-success">Verified</span>' : '<span class="badge bg-dark">Closed</span>');
               let row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item['user']['name']}</td>
                        <td>${item['bus']['coach_name']}</td>
                        <td>${item['bus']['coach_type']}</td>
                        <td>${item['doj']}</td>
                        <td>${item['id']}</td>
                        <td class="status">${statusHtml}</td>
                        {{--<td>
                            <a target="_blank" href="accountDetails/${item['id']}">
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </a>
                        </td>--}}
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






