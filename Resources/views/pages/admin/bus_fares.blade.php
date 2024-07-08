@extends('layouts.admin.sidenav-layout')
@section('content')
@include('components.bus_fares.fares-list')
@include('components.bus_fares.fares-create')
@include('components.bus_fares.fares-update')
@endsection
