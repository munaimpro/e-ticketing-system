@extends('layouts.app')
<style>
    .purchase-history{
        margin-top: 180px !important;
    }
        .purchase-history-table {
            margin-top: 20px;
        }
        .purchase-history-table th, .purchase-history-table td {
            text-align: center;
            /* background: #02a067; */
        }
        .no-history-message {
            margin-top: 20px;
            text-align: center;
            color: red;
        }
        .purchase-history-table thead  tr th{
            background: #02a067 !important;
            color: #fff;
        }
    </style>
@section('content')
<div class="container">
    <h1 class="purchase-history text-center">Purchase History</h1>
    @if($getTicketInfo->isEmpty())
        <h3 class="no-history-message">You have no purchase history.</h3>
    @else
        <table class="table table-striped table-bordered purchase-history-table">
            <thead class="thead-dark">
                <tr>
                    <th>Ticket ID</th>
                    <th>Bus Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Total Seats</th>
                    <th>Journey Date</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getTicketInfo as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->bus_id }}</td>
                        <td>{{ $ticket->from }}</td>
                        <td>{{ $ticket->to }}</td>
                        <td>{{ $ticket->seat }} {{ $ticket->seats }}</td>
                        <td>{{ \Carbon\Carbon::parse($ticket->doj)->format('Y-m-d') }}</td>
                        <td>{{ $ticket->amount }}</td>
                       <td><button class="download-btn"><a href="{{ route('pdf-generate', ['id' => $ticket->id]) }}">Download</a></button>
                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
<!-- cover section end -->
