@extends('ncells::admin.app')

@section('content')
@inject('packages', 'NineCells\Admin\PackageList')
@foreach($packages->getPackageList() as $package)
{{ $package->getName()."<br/>" }}
@endforeach
@endsection