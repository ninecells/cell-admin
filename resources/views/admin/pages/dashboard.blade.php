@inject('packages', 'NineCells\Admin\PackageList')

@extends('ncells::admin.app')

@section('content')
<ul>
    @foreach($packages->getPackageList() as $pkg)
    <li><a href="{{ $pkg->getUrl() }}">{{ $pkg->getName() }}</a></li>
    @endforeach
</ul>
@endsection