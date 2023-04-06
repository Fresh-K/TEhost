@extends('layouts.admin')

@section('content')


{{--    <div class="container-fluid">--}}
{{--        <div class="col-xl-6">--}}
{{--            <div class="card text-center">--}}
{{--                <div class="card-header">--}}
{{--                    <h5 class="card-title" >Visualisation</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body custom-tab-1">--}}

{{--                                    <a href="{{url('inspector/'.$inspector->id.'/po/')}}" class="btn btn-primary btn-card">Add validation To PO</a>--}}
{{--                    <a href="/inspector/po/add" class="btn btn-primary btn-card">Ajouter un PO</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-6">--}}
{{--            <div class="card text-center">--}}
{{--                <div class="card-header">--}}
{{--                    <h5 class="card-title" >Modification</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body custom-tab-1">--}}
{{--                    <a href="/admin/inspectors" class="btn btn-primary btn-card">Modifier</a>--}}
{{--                                    <a href="{{url('inspector/'.$inspector->id.'/po/')}}" class="btn btn-primary btn-card">Add validation To PO</a>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


<div class="container-fluid">

<div class="row">


    <div class="col-xl-6">
        <div class="card text-center">
            <div class="card-header text-center">
                <h5 class="card-title text-center"><center>Visualisation</center></h5>
            </div>
            <div class="card-body custom-tab-1">

                <a href="/admin/home" class="btn btn-sm btn-primary btn-card mr-2">Visualiser</a>
                <a href="/chart2" class="btn btn-sm btn-primary btn-card mr-2">Visualiser:PO/LI</a>
                <a href="/chart5" class="btn btn-sm btn-primary btn-card">Visualiser:Validation/LI</a>
            </div>

        </div>
    </div>
    <div class="col-xl-6">
        <div class="card text-center">
            <div class="card-header">
                <h5 class="card-title">Modification</h5>
            </div>
            <div class="card-body custom-tab-1">
                <a href="/admin/inspectors" class="btn btn-primary btn-card">Modifier LI</a>
{{--                <a href="{{url('inspector/'.$inspector->id.'/po/')}}" class="btn btn-primary btn-card">Add validation To PO</a>--}}
                <a href="/admin/pos" class="btn btn-primary btn-card">Modifier PO</a>
            </div>

        </div>
    </div>
</div>

</div>

@endsection
