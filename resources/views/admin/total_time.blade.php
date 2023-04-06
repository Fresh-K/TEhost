@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Get Total Time By Inspector') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('total-time') }}">
                            <div class="form-group">
                                <label for="start_date">{{ __('Start Date') }}</label>
                                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus>

                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end_date">{{ __('End Date') }}</label>
                                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date">

                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inspector_id">{{ __('Inspector') }}</label>
                                <select id="inspector_id" class="form-control @error('inspector_id') is-invalid @enderror" name="inspector_id" required>
                                    <option value="">{{ __('Select Inspector') }}</option>
                                    @foreach ($inspectors as $inspector)
                                        <option value="{{ $inspector->id }}" @if(old('inspector_id') == $inspector->id) selected @endif>{{ $inspector->name }}</option>
                                    @endforeach
                                </select>

                                @error('inspector_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Get Total Time') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection








