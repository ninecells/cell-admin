@inject('packages', 'NineCells\Admin\PackageList')

@extends('ncells::admin.app')

@section('page-title', 'Dashboard')
@section('page-description', 'Dashboard for admin users')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cells</h3>
            </div>
            <div class="box-body">
                <ul>
                    @foreach($packages->getPackageList() as $pkg)
                    <li><a href="{{ $pkg->getUrl() }}">{{ $pkg->getName() }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection