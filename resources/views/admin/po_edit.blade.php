@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Edit Production Order</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{route('update-po',$po->id)}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Production Order</label>
                                    <input type="text" class="form-control" name="nom" value="{{$po->nom}}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Part number</label>
                                    <select name="pn_id" class="form-control default-select" >
                                        <option  value="{{$pns->id}}">{{$po->pn->nom}}</option>
                                        @foreach($pn as $pns)
                                            <option  value="{{$pns->id}}">{{$pns->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Revision</label>
                                    <input type="text" class="form-control" name="revision" value="{{$po->revision}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Created by:</label>
                                    <select name="inspector_id" class="form-control default-select">
                                        <option value="{{$po->inspector->id}}">{{$po->inspector->nom}}</option>
                                        @foreach($inspector as $inspectors)
                                            <option  value="{{$inspectors->id}}">{{$inspectors->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
