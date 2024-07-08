@extends('layouts.admin.sidenav-layout')
@section('content')
@include('components.operator.operators-list')
@include('components.operator.operator-create')
@include('components.operator.operator-update')
@include('components.operator.operator-delete')

@endsection
