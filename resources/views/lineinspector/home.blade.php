@extends('layouts.lineinspector')

@section('content')
    <div class="container-fluid">
        <div class="row">
    <div class="col-xl-6">
        <div class="card text-center">
            <div class="card-header">
                <h5 class="card-title" >First/Last piece validation</h5>
            </div>
            <div class="card-body custom-tab-1">
              <a href="{{url('inspector/'.$inspector->id.'/po/')}}" class="btn btn-primary btn-card">Voir mes POs</a>
{{--                <a href="{{url('inspector/'.$inspector->id.'/po/')}}" class="btn btn-primary btn-card">Add validation To PO</a>--}}
                <a href="/inspector/po/add" class="btn btn-primary btn-card">Ajouter un PO</a>
            </div>

        </div>

    </div>
            <div class="col-xl-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title" >Plan d'audit</h5>
                    </div>
                    <div class="card-body custom-tab-1">

                        <a href="/inspector/audit/add" class="btn btn-primary btn-card">Ajouter une interaction</a>
                    </div>

                </div>

            </div>
    </div>
    </div>

@endsection
