@extends('layouts.lineinspector')

@section('content')



            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Audits</h4>
                        </div>
                        <div class="card-body">

                            <table class="table table-responsive-md">
                                <thead>
                                <tr>

                                    <th><strong>ID</strong></th>
                                    <th><strong>SHIFT</strong></th>
                                    <th><strong>MACHINE</strong></th>
                                    <th><strong>ACTION</strong></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $audit as $audits)
                                    <tr>


                                        <td><strong>{{$audits->id}}</strong></td>

                                        <td>{{$audits->shift}}	</td>
                                        <td>{{$audits->machine}}</td>
                                        <td>{{$audits->machine}}</td>



                                    </tr>

                                @endforeach



                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center pagination pagination-gutter">

                                {{ $audit->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
