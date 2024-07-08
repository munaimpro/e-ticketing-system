@extends('layouts.admin.sidenav-layout')
@section('content')
@include('components.bus_routes.routes-list')
@include('components.bus_routes.routes-create')
@include('components.bus_routes.routes-update')
@endsection
