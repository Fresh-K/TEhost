@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <div class="row">
            @foreach( $po as $pos)
                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">PO : {{$pos->nom}}</h5>
                        </div>
                        <div class="card-body">
                            <label>PN:</label>
                            <input type="text"  class="form-control" placeholder="{{$pos->Pn}}" disabled>
                            <label>Revision:</label>
                            <input type="text"  class="form-control" placeholder="{{$pos->revision}}" disabled>
                            <label>created By:</label>
                            <input type="text"  class="form-control" placeholder="{{$pos->inspector->nom}}" disabled>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('/admin/po/edit/'.$pos->id)}}" class="btn btn-primary d-inline">Edit</a>
                            <form method="post" action="{{ route('delete-po',$pos->id) }}" enctype="multipart/form-data" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <a href="{{url('admin/po/'.$pos->id.'/validation')}}" class="btn btn-secondary float-lg-right d-inline">Show validation</a>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </div>

@endsection
