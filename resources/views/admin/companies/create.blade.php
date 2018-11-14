@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Company</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('companies.store') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefixcdocument" class="col-md-4 col-form-label text-md-right">Prefix</label>

                            <div class="col-md-6">
                                <input id="prefixcdocument" type="text" class="form-control{{ $errors->has('prefixcdocument') ? ' is-invalid' : '' }}" name="prefixcdocument" value="{{ old('prefixcdocument') }}" required autofocus>

                                @if ($errors->has('prefixcdocument'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefixcdocument') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="startdate" class="col-md-4 col-form-label text-md-right">Start Date</label>

                            <div class="col-md-6">
                                <input id="startdate" type="date" class="form-control{{ $errors->has('startdate') ? ' is-invalid' : '' }}" name="startdate" value="{{ old('startdate') }}" required autofocus>

                                @if ($errors->has('startdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('startdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bucket" class="col-md-4 col-form-label text-md-right">Bucket</label>

                            <div class="col-md-6">
                                <input id="bucket" type="text" class="form-control{{ $errors->has('bucket') ? ' is-invalid' : '' }}" name="bucket" value="{{ old('bucket') }}" required autofocus>

                                @if ($errors->has('bucket'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bucket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="consecutive" class="col-md-4 col-form-label text-md-right">Consecutive</label>

                            <div class="col-md-6">
                                <input id="consecutive" type="text" class="form-control{{ $errors->has('consecutive') ? ' is-invalid' : '' }}" name="consecutive" value="{{ old('consecutive') }}" required autofocus>

                                @if ($errors->has('consecutive'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('consecutive') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
