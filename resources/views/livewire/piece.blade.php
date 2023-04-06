@extends('layouts.lineinspector')

@section('content')




    <div class="container-fluid">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> New Production Order</h4>
                </div>
                <div class="card-body">

                    <form>
                        <label>L's number</label>
                        <label>
                            <input type="radio" name="radio-options" value="option-1">
                            1
                        </label>
                        <label>
                            <input type="radio" name="radio-options" value="option-2">
                            2
                        </label>
                        <label>
                            <input type="radio" name="radio-options" value="option-3">
                            3
                        </label>
                        <label>
                            <input type="radio" name="radio-options" value="option-4">
                            4
                        </label>
                        <label>
                            <input type="radio" name="radio-options" value="option-5">
                            5
                        </label>
                        <label>
                            <input type="radio" name="radio-options" value="option-6">
                            6
                        </label>
                    </form>

                    <div id="fields-container"></div>

                    <script>
                        $(document).ready(function() {
                            let fields = {
                                'option-1': '<label>l1</label><input type="text" class="form-control" name="field-1">',
                                'option-2': '<label>l1</label><input type="text"  class="form-control" name="field-3">' +
                                    '<label>l2</label><input type="text"  class="form-control" name="field-2">',
                                'option-3': '<label>l1</label><input type="text"  class="form-control" name="field-3">' +
                                    '<label>l2</label><input type="text"  class="form-control" name="field-2"> <label>l3</label>' +
                                    '<input type="text"  class="form-control" name="field-4">',
                                'option-4': '<label>l1</label><input type="text"  class="form-control" name="field-3">' +
                                    '<label>l2</label><input type="text"  class="form-control" name="field-2"> <label>l3</label>' +
                                    '<input type="text"  class="form-control" name="field-4"><label>l4</label><input type="text"  class="form-control" name="field-3">',
                                'option-5': '<label>l1</label><input type="text"  class="form-control" name="field-3">' +
                                    '<label>l2</label><input type="text"  class="form-control" name="field-2"> <label>l3</label>' +
                                    '<input type="text"  class="form-control" name="field-4"><label>l4</label><input type="text"  class="form-control" name="field-3">' +
                                    '<label>l5</label><input type="text"  class="form-control" name="field-3">',
                                'option-6': '<label>l1</label><input type="text"  class="form-control" name="field-3">' +
                                    '<label>l2</label><input type="text"  class="form-control" name="field-2"> <label>l3</label>' +
                                    '<input type="text"  class="form-control" name="field-4"><label>l4</label><input type="text"  class="form-control" name="field-3">' +
                                    '<label>l5</label><input type="text"  class="form-control" name="field-3"><label>l6</label><input type="text"  class="form-control" name="field-3">'


                            };

                            $('input[name="radio-options"]').change(function() {
                                let radioValue = $('input[name="radio-options"]:checked').val();
                                $('#fields-container').html(fields[radioValue]);
                            });
                        });
                    </script>
                    <div id="container"/>
                </div>
            </div>
        </div>
    </div>


@endsection
