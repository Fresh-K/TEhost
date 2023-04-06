@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> New LineInspector</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{route('insp-add')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Nom:</label>
                                    <input type="text" class="form-control" name="nom">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Prenom:</label>
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Matricule:</label>
                                    <input type="text" class="form-control" name="matricule">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Status:</label>
                                    <input type="text" class="form-control" name="status">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
