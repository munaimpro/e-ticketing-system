@extends('layouts.admin.sidenav-layout')
@section('content')

    @include('components.bus.bus-list')
    @include('components.bus.bus-create')
    @include('components.bus.bus-update')
    @include('components.bus.bus-delete')

    
@endsection
