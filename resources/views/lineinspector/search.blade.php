@extends('layouts.lineinspector')

@section('content')

    <div class="container-fluid">

        {{--        <div class="row">--}}
        {{--            @foreach( $po as $pos)--}}
        {{--        <div class="col-xl-6">--}}

        {{--            <div class="card">--}}
        {{--                <div class="card-header border-0 pb-0">--}}
        {{--                    <h5 class="card-title">PO : {{$pos->nom}}</h5>--}}
        {{--                </div>--}}
        {{--                <div class="card-body">--}}
        {{--                   <label>PN:</label>--}}
        {{--                    <input type="text"  class="form-control" placeholder="{{$pos->Pn}}" disabled>--}}
        {{--                    <label>Revision:</label>--}}
        {{--                    <input type="text"  class="form-control" placeholder="{{$pos->revision}}" disabled>--}}
        {{--                </div>--}}
        {{--                <div class="card-footer">--}}
        {{--                    @if(App\Models\Piece::where('po_id', $pos->id)->count()<2)--}}
        {{--                    <a href="{{url('inspector/po/'.$pos->id.'/piece/add')}}" class="card-link float-left">Add validation</a>--}}
        {{--                    <a href="{{url('inspector/po/'.$pos->id.'/validation')}}" class="card-link float-right">Show validation</a>--}}
        {{--                    @else--}}
        {{--                    <a href="{{url('inspector/po/'.$pos->id.'/validation')}}" class="card-link float-right">Show validation</a>--}}
        {{--                    @endif--}}
        {{--                </div>--}}

        {{--            </div>--}}

        {{--        </div>--}}
        {{--            @endforeach--}}
        {{--    </div>--}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Exam Toppers</h4>
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
                            <th><strong>Action</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $po as $pos)
                            <tr>


                                <td><strong>{{$pos->nom}}</strong></td>
                                <td> <span class="w-space-no">{{$pos->Pn}} </span></td>
                                <td>{{$pos->revision}}	</td>
                                <td>@if (App\Models\Piece::where('po_id', $pos->id)->where('validation_type', 'First Piece Validation')->exists()) <span class="text-success">Deja Faite</span>
                                    @else
                                        <span class="text-danger">Pas encore</span>
                                    @endif </td>
                                <td><div class="d-flex align-items-center"> @if (App\Models\Piece::where('po_id', $pos->id)->where('validation_type', 'Last Piece Validation')->exists())  <span class="text-success">Deja Faite</span>
                                        @else
                                            <span class="text-danger">Pas encore</span>
                                        @endif  </div></td>
                                <td>
                                    <div class="d-flex">
                                        @if(App\Models\Piece::where('po_id', $pos->id)->count()<2)
                                            <a href="{{url('inspector/po/'.$pos->id.'/piece/add')}}" class="btn btn-primary btn-sm mr-2">Add validation</a>
                                            <a href="{{url('inspector/po/'.$pos->id.'/validation')}}" class="btn btn-secondary btn-sm mr-2">Show validation</a>
                                        @else
                                            <a href="{{url('inspector/po/'.$pos->id.'/validation')}}" class="btn btn-secondary btn-sm mr-2">Show validation</a>
                                        @endif

                                        {{--                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
                                        {{--                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>--}}
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
