
<!DOCTYPE html>
<html>
<head>
    <title>E-ticket System </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .booking-info h3{
        color: #07af74;
        text-align: center;
    }
    .booking-table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
}

.booking-table th,
.booking-table td {
    padding: 8px;
    border: 1px solid #000;
}

.booking-table th {
    background-color: #f2f2f2;
}

.booking-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.ticket-header {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
}

.ticket-details {
    margin-bottom: 20px;
}

.ticket-details .title {
    font-weight: bold;
}

.ticket-footer {
    text-align: center;
    font-size: 14px;
    margin-top: 20px;
}

.ticket-footer .footer-text {
    font-style: italic;
}


</style>
<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="booking-info">
                    <h3>Booking Info</h3>
                </div>
                <div class="booking-table">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">User_id</th>
                            <th scope="col">Bus_id</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Seats</th>
                            <th scope="col">Fare</th>
                            <th scope="col">Coach Name</th>
                            <th scope="col">Coach Type</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td>{{$ticketSale->user_id}}</td>
                            <td>{{$ticketSale->bus_id}}</td>
                            <td>{{$ticketSale->from}}</td>
                            <td>{{$ticketSale->to}}</td>
                            <td>{{$ticketSale->seats}}</td>
                            <td>{{$ticketSale->fare}}</td>
                            <td>{{$ticketSale->bus->coach_name}}</td>
                            <td>{{$ticketSale->bus->coach_type}}</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
