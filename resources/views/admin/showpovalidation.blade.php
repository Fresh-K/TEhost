@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="row">
            @foreach( $piece as $pieces)
                <div class="col-xl-6">
                    <div class="card mb-3">
                        <img class="card-img-top img-fluid" src="/storage/images/{{$pieces->image}}" alt="Card image cap">
                        <div class="card-header">
                            <h5 class="card-title">{{$pieces->validation_type}}</h5>
                        </div>
                        <div class="card-body">
                            <label> Line</label>
                            <input type="text"  class="form-control" placeholder="{{$pieces->Line}}" disabled>
                            <label>Visual check:</label>
                            <input type="text"  class="form-control" placeholder="{{$pieces->Visual_check}}" disabled>
                            <label>marquage_étiquettes:</label>
                            <input type="text"  class="form-control" placeholder="{{$pieces->marquage_étiquettes}}" disabled>
                            <label>L1m:</label>
                            <input type="text"  class="form-control" placeholder="{{$pieces->l1m}}" disabled>
                            @if (!empty($pieces->l2m))

                                <label>L2m:</label>
                                <input type="text"  class="form-control" placeholder="{{$pieces->l2m}}" disabled>
                            @endif
                            @if (!empty($pieces->l3m))

                                <label>L3m:</label>
                                <input type="text"  class="form-control" placeholder="{{$pieces->l3m}}" disabled>
                            @endif
                            @if (!empty($pieces->l4m))

                                <label>L4m:</label>
                                <input type="text"  class="form-control" placeholder="{{$pieces->l4m}}" disabled>
                            @endif
                            @if (!empty($pieces->l5m))

                                <label>L5m:</label>
                                <input type="text"  class="form-control" placeholder="{{$pieces->l5m}}" disabled>
                            @endif
                            @if (!empty($pieces->l6m))

                                <label>L6m:</label>
                                <input type="text"  class="form-control" placeholder="{{$pieces->l6m}}" disabled>
                            @endif
                            <label>created at:</label>
                            <input type="text"  class="form-control" placeholder="{{$pieces->created_at}}" disabled>
                            <label>created by:</label>
                            <input type="text"  class="form-control" placeholder="{{$pieces->inspector->nom}}" disabled>
                            <label>time taken:</label>
                            <input type="text"  class="form-control" placeholder="{{$pieces->time/1000}}s" disabled>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('admin/validation/edit/'.$pieces->id) }}" class="btn btn-primary d-inline">Edit</a>
                            <form method="post" action="{{ route('delete-pn',$pieces->id) }}" enctype="multipart/form-data" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
