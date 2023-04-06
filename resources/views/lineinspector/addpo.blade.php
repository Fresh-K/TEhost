@extends('layouts.lineinspector')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="select2.css">
    <link rel="stylesheet" href="select2-bootstrap.css">

    <div class="container-fluid">
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> New Production Order</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="post" action="{{route('po-add')}}">
          @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Production Order</label>
                            <input type="text" class="form-control" name="nom">
                            @error('nom')
                             <div class="alert alert-danger alert-dismissible fade show my-2">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                <strong>Error!</strong> {{$message}}
                                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                </button>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label>Part number</label>
                            <select id="nameid" name="pn_id" class="form-control default-select" >
                                @foreach($pn as $pns)
                                    <option  value="{{$pns->id}}">{{$pns->nom}}</option>
                                @endforeach
                            </select>
                            @error('Pn')
                            <div class="alert alert-danger alert-dismissible fade show my-2">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                <strong>Error!</strong> {{$message}}
                                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Revision</label>
                            <input type="text" class="form-control" name="revision">
                            @error('revision')
                            <div class="alert alert-danger alert-dismissible fade show my-2">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                <strong>Error!</strong> {{$message}}
                                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                </button>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">add</button>
                </form>
            </div>
        </div>
    </div>
</div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <script type="text/javascript">

            $("#nameid").select2({
                placeholder: "Select a PN",
                allowClear: true,

            });
        </script>

@endsection
