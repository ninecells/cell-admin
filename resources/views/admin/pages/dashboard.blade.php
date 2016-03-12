@inject('packages', 'NineCells\Admin\PackageList')

@extends('ncells::admin.app')

@section('page-title', 'Cells')
@section('page-description', 'List of cells')

@section('content')
<ul>
    @foreach($packages->getPackageList() as $pkg)
    <li><a href="{{ $pkg->getUrl() }}">{{ $pkg->getName() }}</a></li>
    @endforeach
</ul>
@endsection