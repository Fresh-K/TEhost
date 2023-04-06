@extends('layouts.lineinspector')

@section('content')




    <div class="container-fluid">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Validation</h4>
                </div>
                <div class="card-body">

                    <form id="post-form" method="POST" action="{{route('piece-add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
{{--                            <label>choose Po:</label>--}}
{{--                            <select name="po_id" class="form-control default-select">--}}
{{--                                <option value="">Select PO</option>--}}
{{--                                @foreach($po2 as $pos)--}}
{{--                                <option  value="{{$pos->id}}">{{$pos->nom}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
                            <input type="hidden" name="po_id" value="{{$po->id}}">
                        </div>
                        <div class="form-group">
                            <label>Type de validation:</label>
                            <select name="validation_type" class="form-control default-select">
                                @if (App\Models\Piece::where('po_id', $po->id)->where('validation_type', 'First Piece Validation')->exists())
                                    <option value="Last Piece Validation">Validation du dernière pièce</option>
                                    @error('validation_type')
                                    <div class="alert alert-danger alert-dismissible fade show my-2">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        <strong>Error!</strong> {{$message}}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                    @enderror
                                @elseif(App\Models\Piece::where('po_id', $po->id)->where('validation_type', 'Last Piece Validation')->exists())
                                    <option value="First Piece Validation">Validation de la première pièce</option>
                                    @error('validation_type')
                                    <div class="alert alert-danger alert-dismissible fade show my-2">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        <strong>Error!</strong> {{$message}}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                    @enderror
                                @else
                                    <option value="First Piece Validation">Validation de la première pièce</option>
                                    @error('validation_type')
                                    <div class="alert alert-danger alert-dismissible fade show my-2">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        <strong>Error!</strong> {{$message}}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                    @enderror
                                @endif

                            </select>
                        </div>
                        <label>line</label>

                        <input type="text"  class="form-control" name="Line">
                        @error('Line')
                        <div class="alert alert-danger alert-dismissible fade show my-2">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> {{$message}}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-group">
                        <label>Nombre des L</label>

{{--                        <label>--}}
{{--                            <input type="radio" name="radio-options" value="option-1">--}}
{{--                            1--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="radio-options" value="option-2">--}}
{{--                            2--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="radio-options" value="option-3">--}}
{{--                            3--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="radio-options" value="option-4">--}}
{{--                            4--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="radio-options" value="option-5">--}}
{{--                            5--}}
{{--                        </label>--}}
{{--                        <label>--}}
{{--                            <input type="radio" name="radio-options" value="option-6">--}}
{{--                            6--}}
{{--                        </label>--}}
                            @if (!empty($po->pn->l1))
                            <div class="form-row"> <div class="form-group col-md-6"><label>l1 drawing </label><input type="text" step="0.01" class="form-control" id="input1" oninput="compareInputs()" value="{{$po->pn->l1}}" name="l1" disabled></div><div class="form-group col-md-3"><label>Tolerance+</label><input type="text" step="0.01" id="input2" oninput="compareInputs()" class="form-control" name="t1" value="{{$po->pn->t1}}" disabled></div>
                                <div class="form-group col-md-3"><label>Tolerance-</label><input type="text" step="0.01" id="input4" oninput="compareInputs()" class="form-control" value="{{$po->pn->t1m}}" name="t1m" disabled></div></div>
                            <label>l1 measured</label><input type="text" step="0.01" id="input3" oninput="compareInputs()" class="form-control" name="l1m"> <p id="result"></p> <button type="submit" style="display:none" id="myButton11" class="btn btn-primary">add</button>
                            @endif
                            @if (!empty($po->pn->l2))
                                <div class="form-row"> <div class="form-group col-md-6"><label>l2 drawing</label><input type="text" oninput="compareInputs()" id="input2_1" class="form-control" value="{{$po->pn->l2}}" name="l2" disabled></div><div class="form-group col-md-3"><label>Tolerance+</label><input type="text"  id="input2_2" oninput="compareInputs()"class="form-control" value="{{$po->pn->t2}}" name="t2" disabled></div><div class="form-group col-md-3"><label>Tolerance-</label><input type="text" step="0.01" id="input2_4" oninput="compareInputs()" class="form-control" value="{{$po->pn->t2m}}" name="t2m" disabled></div></div><label>l2 measured</label><input type="text"  id="input2_3" oninput="compareInputs()" class="form-control" name="l2m"><p id="result2"></p> <button id="myButton22" style="display:none">My Button</button>
                            @endif
                            @if (!empty($po->pn->l3))
                                <div class="form-row"> <div class="form-group col-md-6"><label>l3 drawing</label><input type="text" id="input3_1"  oninput="compareInputs()" class="form-control" name="l3" value="{{$po->pn->l3}}"  disabled></div>
                                    <div class="form-group col-md-3"><label>Tolerance+</label><input type="text"  id="input3_2"  oninput="compareInputs()" class="form-control" name="t3" value="{{$po->pn->t3}}"  disabled></div>
                                    <div class="form-group col-md-3"><label>Tolerance-</label><input type="text" step="0.01" id="input3_4" oninput="compareInputs()" class="form-control" name="t3m" value="{{$po->pn->t3m}}"  disabled></div></div><label>l3 measured</label><input type="text"  id="input3_3"  oninput="compareInputs()" class="form-control" name="l3m"> <p id="result3"></p>
                            @endif
                            @if (!empty($po->pn->l4))
                                <div class="form-row"> <div class="form-group col-md-6"><label>l4 drawing</label><input type="text" id="input4_1"  oninput="compareInputs()" class="form-control" name="l4" value="{{$po->pn->l4}}"  disabled></div>
                                    <div class="form-group col-md-3"><label>Tolerance+</label><input type="text" id="input4_2"  oninput="compareInputs()" class="form-control" name="t4" value="{{$po->pn->t4}}"  disabled></div><div class="form-group col-md-3"><label>Tolerance-</label><input type="text" step="0.01" id="input4_4" oninput="compareInputs()" class="form-control" name="t4m" value="{{$po->pn->t4m}}"  disabled></div>
                                </div><label>l4 measured</label><input type="text" id="input4_3"  oninput="compareInputs()" class="form-control" name="l4m"> <p id="result4"></p>

                            @endif
                            @if (!empty($po->pn->l5))
                                <div class="form-row"> <div class="form-group col-md-6"><label>l5 drawing</label><input type="text" id="input5_1"  oninput="compareInputs()" class="form-control" name="l5" value="{{$po->pn->l5}}"  disabled></div>
                                    <div class="form-group col-md-3"><label>Tolerance+</label><input type="text"  id="input5_2"  oninput="compareInputs()" class="form-control" name="t5"value="{{$po->pn->t5}}"  disabled></div>
                                    <div class="form-group col-md-3"><label>Tolerance-</label><input type="text" step="0.01" id="input5_4" oninput="compareInputs()" class="form-control" name="t5m" value="{{$po->pn->t5m}}"  disabled></div></div><label>l5 measured</label><input type="text"   id="input5_3"  oninput="compareInputs()" class="form-control" name="l5m"> <p id="result5"></p>

                            @endif

                            @if (!empty($po->pn->l6))
                                <div class="form-row"> <div class="form-group col-md-6"><label>l6 drawing</label><input type="text"  id="input6_1"  oninput="compareInputs()" class="form-control" name="l6" value="{{$po->pn->l6}}"  disabled></div>
                                    <div class="form-group col-md-3"><label>Tolerance+</label><input type="text" id="input6_2"  oninput="compareInputs()" class="form-control" name="t6" value="{{$po->pn->t6}}"  disabled></div>
                                    <div class="form-group col-md-3"><label>Tolerance-</label><input type="text" step="0.01" id="input6_4" oninput="compareInputs()" class="form-control" name="t6m" value="{{$po->pn->t6m}}"  disabled></div></div><label>l6 measured</label><input type="text" id="input6_3"  oninput="compareInputs()"  class="form-control" name="l6m"> <p id="result6"></p> <button type="submit" style="display:none" id="myButton22" class="btn btn-primary">add</button>

                            @endif
                    <div id="fields-container"></div>

                    <script>

                        function compareInputs() {
                            // Input set 1
                            var buttonElement = document.getElementById("myButton");
                            var buttonElement1 = document.getElementById("myButton1");
                            var buttonElement2 = document.getElementById("myButton2");
                            var buttonElement3 = document.getElementById("myButton3");
                            var buttonElement4 = document.getElementById("myButton4");
                            var buttonElement5 = document.getElementById("myButton5");
                            var input1 = parseFloat(document.getElementById("input1").value);
                            var input2 = parseFloat(document.getElementById("input2").value);
                            var input3 = parseFloat(document.getElementById("input3").value);
                            var input4 = parseFloat(document.getElementById("input4").value);
                            var resultElement1 = document.getElementById("result");

                            if (input3 >= input1-input4 &&  input3 <= input2+input1) {
                                resultElement1.innerHTML = '<span style="color: greenyellow;">VALEUR OK.</span>';
                                buttonElement1.style.display = "block";

                            } else {
                                resultElement1.innerHTML = '<span style="color: red;">VALEUR NOK.</span>';
                                buttonElement1.style.display = "none";
                            }

                            // Input set 2

                            var input2_1 = parseFloat(document.getElementById("input2_1").value);
                            var input2_2 = parseFloat(document.getElementById("input2_2").value);
                            var input2_3 = parseFloat(document.getElementById("input2_3").value);
                            var input2_4 = parseFloat(document.getElementById("input2_4").value);
                            var resultElement2 = document.getElementById("result2");

                            if (input2_3 >= input2_1-input2_4 && input2_3 <= input2_1+input2_2) {
                                resultElement2.innerHTML = '<span style="color: greenyellow;">VALEUR OK.</span>';
                            } else if((input3 >= input1 - input4 && input3 <= input2 + input1) &&
                                (input2_3 >= input2_1 - input2_4 && input2_3 <= input2_1 + input2_2)) {
                                buttonElement2.style.display = "block";
                            }
                            else{
                                resultElement2.innerHTML = '<span style="color: red;">VALEUR NOK.</span>';
                                buttonElement1.style.display = "none";
                                buttonElement2.style.display = "none";
                            }




                            // Input set 3
                            var input3_1 = parseFloat(document.getElementById("input3_1").value);
                            var input3_2 = parseFloat(document.getElementById("input3_2").value);
                            var input3_3 = parseFloat(document.getElementById("input3_3").value);
                            var input3_4 = parseFloat(document.getElementById("input3_4").value);
                            var resultElement3 = document.getElementById("result3");

                            if (input3_3 >= input3_1-input3_4 && input3_3 <= input3_1+input3_2) {
                                resultElement3.innerHTML = '<span style="color: greenyellow;">VALEUR OK.</span>';

                            }
                            else if((input3 >= input1 - input4 && input3 <= input2 + input1) &&
                                (input2_3 >= input2_1 - input2_4 && input2_3 <= input2_1 + input2_2)&&
                                (input3_3 >= input3_1 - input3_4 && input3_3 <= input3_1 + input3_2)) {
                                buttonElement3.style.display = "block";
                            }else {
                                resultElement3.innerHTML = '<span style="color: red;">VALEUR NOK.</span>';
                                buttonElement1.style.display = "none";
                                buttonElement2.style.display = "none";
                                buttonElement3.style.display = "none";
                            }

                            // Input set 4
                            var input4_1 = parseFloat(document.getElementById("input4_1").value);
                            var input4_2 = parseFloat(document.getElementById("input4_2").value);
                            var input4_3 = parseFloat(document.getElementById("input4_3").value);
                            var input4_4 = parseFloat(document.getElementById("input4_4").value);
                            var resultElement4 = document.getElementById("result4");

                            if (input4_3 >= input4_1-input4_4 && input4_3 <= input4_1+input4_2) {
                                resultElement4.innerHTML = '<span style="color: greenyellow;">VALEUR OK.</span>';
                            }

                            else if((input3 >= input1 - input4 && input3 <= input2 + input1) &&
                                (input2_3 >= input2_1 - input2_4 && input2_3 <= input2_1 + input2_2)&&
                                (input3_3 >= input3_1 - input3_4 && input3_3 <= input3_1 + input3_2)&&
                                (input4_3 >= input4_1 - input4_4 && input4_3 <= input4_1 + input4_2)) {
                                buttonElement4.style.display = "block";
                            }
                            else {
                                resultElement4.innerHTML = '<span style="color: red;">VALEUR NOK.</span>';
                                buttonElement1.style.display = "none";
                                buttonElement2.style.display = "none";
                                buttonElement3.style.display = "none";
                                buttonElement4.style.display = "none";
                            }

                            // Input set 5
                            var input5_1 = parseFloat(document.getElementById("input5_1").value);
                            var input5_2 = parseFloat(document.getElementById("input5_2").value);
                            var input5_3 = parseFloat(document.getElementById("input5_3").value);
                            var input5_4 =parseFloat(document.getElementById("input5_4").value);
                            var resultElement5 = document.getElementById("result5");

                            if (input5_3 >= input5_1-input5_4 && input5_3 <= input5_1+input5_2) {
                                resultElement5.innerHTML = '<span style="color: greenyellow;">VALEUR OK.</span>';
                            }
                            else if((input3 >= input1 - input4 && input3 <= input2 + input1) &&
                                (input2_3 >= input2_1 - input2_4 && input2_3 <= input2_1 + input2_2)&&
                                (input3_3 >= input3_1 - input3_4 && input3_3 <= input3_1 + input3_2)&&
                                (input4_3 >= input4_1 - input4_4 && input4_3 <= input4_1 + input4_2) &&
                                (input5_3 >= input5_1 - input5_4 && input5_3 <= input5_1 + input5_2)) {
                                buttonElement5.style.display = "block";
                            }
                            else {
                                resultElement5.innerHTML = '<span style="color: red;">VALEUR NOK.</span>';
                                buttonElement1.style.display = "none";
                                buttonElement2.style.display = "none";
                                buttonElement3.style.display = "none";
                                buttonElement4.style.display = "none";
                                buttonElement5.style.display = "none";
                            }

                            // Input set 6
                            var input6_1 = parseFloat(document.getElementById("input6_1").value);
                            var input6_2 = parseFloat(document.getElementById("input6_2").value);
                            var input6_3 = parseFloat(document.getElementById("input6_3").value);
                            var input6_4 =parseFloat(document.getElementById("input6_4").value);
                            var resultElement6 = document.getElementById("result6");

                            if (input6_3 >= input6_1-input6_4 && input6_3 <= input6_1+input6_2) {
                                resultElement6.innerHTML = '<span style="color: greenyellow;">VALEUR OK.</span>';
                            } else {
                                resultElement6.innerHTML = '<span style="color: red;">VALEUR NOK.</span>';
                            }
                            //checking2

                            var allConditionsTrue = (input3 >= input1 - input4 && input3 <= input2 + input1) &&
                                (input2_3 >= input2_1 - input2_4 && input2_3 <= input2_1 + input2_2)&&
                                (input3_3 >= input3_1 - input3_4 && input3_3 <= input3_1 + input3_2) &&
                                (input4_3 >= input4_1 - input4_4 && input4_3 <= input4_1 + input4_2) &&
                                (input5_3 >= input5_1 - input5_4 && input5_3 <= input5_1 + input5_2) &&
                                (input6_3 >= input6_1 - input6_4 && input6_3 <= input6_1 + input6_2);



                            // if (allConditionsTrue) {
                            //     buttonElement.style.display = "block";
                            //     buttonElement1.style.display = "none";
                            //     buttonElement2.style.display = "none";
                            //     buttonElement3.style.display = "none";
                            //     buttonElement4.style.display = "none";
                            //     buttonElement5.style.display = "none";
                            // } else {
                            //     buttonElement.style.display = "none";
                            //     buttonElement1.style.display = "none";
                            //     buttonElement2.style.display = "none";
                            //     buttonElement3.style.display = "none";
                            //     buttonElement4.style.display = "none";
                            //     buttonElement5.style.display = "none";
                            // }

                            if (allConditionsTrue) {
                                buttonElement.style.display = "block";
                                buttonElement1.style.display = "none";
                                buttonElement2.style.display = "none";
                                buttonElement3.style.display = "none";
                                buttonElement4.style.display = "none";
                                buttonElement5.style.display = "none";
                            } else {
                                buttonElement.style.display = "none";
                                buttonElement1.style.display = "none";
                                buttonElement2.style.display = "none";
                                buttonElement3.style.display = "none";
                                buttonElement4.style.display = "none";
                                buttonElement5.style.display = "none";
                            }



                        }


                    </script>
                        <div class="form-row">
                            <label >Vérification visuelle &nbsp;&nbsp;</label>
                            <div class="col-sm-5">
                        <label>
                            OK
                            <input type="radio" name="Visual_check" value="OK">
                            NOK
                            <input type="radio" name="Visual_check" value="NOK">

                        </label>


                            </div>

                        </div>
                        @error('Visual_check')
                        <div class="alert alert-danger alert-dismissible fade show my-2">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> {{$message}}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-row">
                            <label >marquage/étiquettes du test électrique  &nbsp;&nbsp;</label>
                            <div >
                                <label>
                                    OK
                                    <input type="radio" name="marquage_étiquettes" value="OK">
                                    NOK
                                    <input type="radio" name="marquage_étiquettes" value="NOK">

                                </label>


                            </div>
                        </div>
                        @error('marquage_étiquettes')
                        <div class="alert alert-danger alert-dismissible fade show my-2">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> {{$message}}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @enderror
                           <div class="form-row">
                            <label >Validation Selon QIP  &nbsp;&nbsp;</label>
                            <div class="col-sm-5">
                                <label>
                                    OK
                                    <input type="radio" name="qip" value="OK">
                                    NOK
                                    <input type="radio" name="qip" value="NOK">
                                </label>


                            </div>

                        </div>
                        @error('qip')
                        <div class="alert alert-danger alert-dismissible fade show my-2">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> {{$message}}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @enderror
                        <input type="hidden" id="total-time" name="total-time" value="">

{{--                        <input type="file" name="image">--}}
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>

                            </div>
                        </div>
                        @error('image')
                        <div class="alert alert-danger alert-dismissible fade show my-2">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> {{$message}}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @enderror
                        <button type="submit" id="myButton" style="display:none" class="btn btn-primary">Ajouter</button>
                        <button type="submit" id="myButton1" style="display:none" class="btn btn-primary">Ajouter</button>
                        <button type="submit" id="myButton2" style="display:none" class="btn btn-primary">Ajouter</button>
                        <button type="submit" id="myButton3" style="display:none" class="btn btn-primary">Ajouter</button>
                        <button type="submit" id="myButton4" style="display:none" class="btn btn-primary">Ajouter</button>
                        <button type="submit" id="myButton5" style="display:none" class="btn btn-primary">Ajouter</button>
                        <script>
                            var start_time = new Date().getTime();
                            $(document).on('submit', '#post-form', function() {
                                var end_time = new Date().getTime();
                                var total_time = end_time - start_time;
                                $('#total-time').val(total_time);
                            });
                        </script>
                    </form>
                    <div id="container"/>
                </div>
            </div>
        </div>
    </div>


@endsection
