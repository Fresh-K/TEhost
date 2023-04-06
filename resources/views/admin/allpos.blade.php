@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

{{--        <div class="row">--}}
{{--            @foreach( $po as $pos)--}}
{{--                <div class="col-xl-6">--}}

{{--                    <div class="card">--}}
{{--                        <div class="card-header border-0 pb-0">--}}
{{--                            <h5 class="card-title">PO : {{$pos->nom}}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <label>PN:</label>--}}
{{--                            <input type="text"  class="form-control" placeholder="{{$pos->Pn}}" disabled>--}}
{{--                            <label>Revision:</label>--}}
{{--                            <input type="text"  class="form-control" placeholder="{{$pos->revision}}" disabled>--}}
{{--                            <label>created By:</label>--}}
{{--                            <input type="text"  class="form-control" placeholder="{{$pos->inspector->nom}}" disabled>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer">--}}
{{--                            <a href="{{url('/admin/po/edit/'.$pos->id)}}" class="btn btn-primary d-inline">Edit</a>--}}
{{--                            <form method="post" action="{{ route('delete-po',$pos->id) }}" enctype="multipart/form-data" class="d-inline">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                            </form>--}}

{{--                            <a href="{{url('admin/po/'.$pos->id.'/validation')}}" class="btn btn-secondary float-lg-right d-inline">Show validation</a>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mes POs</h4>
                </div>
                <div class="card-body">

                    <table class="table table-responsive-md">
                        <thead>
                        <tr>

                            <th><strong>Production Order</strong></th>
                            <th><strong>Pn</strong></th>
                            <th><strong>Revision</strong></th>
                            <th><strong>première Validation</strong></th>
                            <th><strong>dernière validation</strong></th>
                            <th><strong>Cree par</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $po as $pos)
                            <tr>


                                <td><strong>{{$pos->nom}}</strong></td>
                                <td> <span class="w-space-no">{{$pos->Pn}} </span></td>
                                <td>{{$pos->revision}}	</td>
                                <td>@if (App\Models\Piece::where('po_id', $pos->id)->where('validation_type', 'First Piece Validation')->exists())  <span class="text-success">Deja Faite</span>
                                    @else
                                        <span class="text-danger">Pas encore</span>
                                    @endif </td>
                                <td><div class="d-flex align-items-center"> @if (App\Models\Piece::where('po_id', $pos->id)->where('validation_type', 'Last Piece Validation')->exists())  <span class="text-success">Deja Faite</span>
                                        @else
                                            <span class="text-danger">Pas encore</span>
                                        @endif  </div></td>

                                <td> <span class="w-space-no">{{$pos->inspector->nom}} </span></td>
                                <td>



                                        <a href="{{url('/admin/po/edit/'.$pos->id)}}" class="btn btn-primary btn-xs rounded ">Edit</a>

                                        <form method="post" action="{{ route('delete-po',$pos->id) }}" enctype="multipart/form-data" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs rounded">Delete</button>
                                        </form>

                                        <a href="{{url('admin/po/'.$pos->id.'/validation')}}" class="btn btn-secondary btn-xs rounded ">Show validation</a>

                                        {{--                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
                                        {{--                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>--}}

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center pagination pagination-gutter">

                        {{ $po->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
