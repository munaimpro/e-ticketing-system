@extends('layouts.admin.sidenav-layout')
@section('content')
<div class="container-fluid">
    <div class="col-12">
        <h1>Dashboard</h1>
        <h5>Welcome {{ Auth::user()->name }}</h5>
    </div>
    <hr>
    <h2 class="text-center">User Information</h2>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-info">
                    <div><i class="fa fa-users fa-5x"></i></div>
                    <h1>{{ $totalCustomer }}</h1>
                </div>
                <div class="bg-info text-white">
                    <p class="fs-4 px-3 py-1 m-0">Customers</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-success">
                    <div><i class="fa fa-user-tie fa-5x"></i></div>
                    <h1>{{ $totalAdmin }}</h1>
                </div>
                <div class="bg-success text-white">
                    <p class="fs-4 px-3 py-1 m-0">Admin</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-info">
                    <div><i class="fa fa-users fa-5x"></i></div>
                    <h1>{{ $totalOperator }}</h1>
                </div>
                <div class="bg-info text-white">
                    <p class="fs-4 px-3 py-1 m-0">Operator</p>
                </div>
            </div>
        </div>

        <hr>
        <h2 class="text-center mt-5 mb-3">Bus Information</h2>
        <hr>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-warning">
                    <div><i class="fas fa-bus fa-5x"></i></div>
                    <h1>{{ $totalBus }}</h1>
                </div>
                <div class="bg-warning text-white">
                    <p class="fs-4 px-3 py-1 m-0">Buses</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <div><i class="fa fa-road fa-5x"></i></div>
                    <h1>{{ $totalRoute }}</h1>
                </div>
                <div class="bg-dark text-white">
                    <p class="fs-4 px-3 py-1 m-0">Routes</p>
                </div>
            </div>
        </div>
        <hr>
        <h2 class="text-center">Seats Information</h2>
        <hr>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-primary">
                    <div><i class="fas fa-chair fa-5x"></i></div>
                    <h1>{{ $totalSeat }}</h1>
                </div>
                <div class="bg-primary text-white">
                    <p class="fs-4 px-3 py-1 m-0">Seats</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-success">
                    <div><i class="fas fa-ticket-alt fa-5x"></i></div>
                    <h1>{{ $totalBooking }}</h1>
                </div>
                <div class="bg-success text-white">
                    <p class="fs-4 px-3 py-1 m-0">Bookings</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-primary">
                    <div><i class="fas fa-chair fa-5x"></i></div>
                    <h1>{{ $availableSeat }}</h1>
                </div>
                <div class="bg-primary text-white">
                    <p class="fs-4 px-3 py-1 m-0">Availability</p>
                </div>
            </div>
        </div>
        <hr>
        <h2 class="text-center">Sales Information</h2>
        <hr>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <i class="fa-solid fa-bangladeshi-taka-sign fa-5x text-info"></i>

                    <h1>{{ $totalSalesThisMonth }}</h1>
                </div>
                <div class="bg-info text-white">
                    <p class="fs-4 px-3 py-1 m-0">This month</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-white">
                    <i class="fa-solid fa-bangladeshi-taka-sign fa-5x text-primary"></i>
                    <h1>{{ $toalSalesThisWeek }}</h1>
                </div>
                <div class="bg-primary text-white">
                    <p class="fs-4 px-3 py-1 m-0">This week</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <i class="fa-solid fa-bangladeshi-taka-sign fa-5x text-success"></i>
                    <h1>{{ $todaysSales }}</h1>
                </div>
                <div class="bg-success text-white">
                    <p class="fs-4 px-3 py-1 m-0">Today</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <i class="fa-solid fa-bangladeshi-taka-sign fa-5x text-dark"></i>
                    <h1>{{ $totalSales }}</h1>
                </div>
                <div class="bg-dark text-white">
                    <p class="fs-4 px-3 py-1 m-0">Total</p>
                </div>
            </div>
        </div>
        <hr>
        <h2 class="text-center ">Revenue Information</h2>
        <hr>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <i class="fa-solid fa-money-bill fa-5x text-success"></i>
                    <h1 style="font-size: 42px">{{ $totalRevenue }}</h1>
                </div>
                <div class="bg-dark text-white">
                    <p class="fs-4 px-3 py-1 m-0">Total</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <i class="fa-solid fa-money-bill fa-5x text-success"></i>
                    <h1 style="font-size: 42px">{{ $revenueThisMonth}}</h1>
                </div>
                <div class="bg-info text-white">
                    <p class="fs-4 px-3 py-1 m-0">This month</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <i class="fa-solid fa-money-bill fa-5x text-success"></i>
                    <h1 style="font-size: 42px">{{$revenueThisWeek}}</h1>
                </div>
                <div class="bg-primary text-white">
                    <p class="fs-4 px-3 py-1 m-0">This week</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center m-1">
            <div class="border">
                <div class="overflow-hidden p-3 text-dark">
                    <i class="fa-solid fa-money-bill fa-5x text-success"></i>
                    <h1 style="font-size: 42px">{{$revenueToday}}</h1>
                </div>
                <div class="bg-success text-white">
                    <p class="fs-4 px-3 py-1 m-0">Today</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
