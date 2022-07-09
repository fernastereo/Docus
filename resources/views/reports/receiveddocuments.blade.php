@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/searchDocuments.css') }}">
<script src="{{ asset('js/print.min.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div><h5>Documentos Recibidos</h5></div>
                    <a href="{{ route('home') }}" class="btn btn-success btn-sm"><i class="fas fa-home"></i> Regresar</a>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    @include('partials.errors')
                    <input type="hidden" id="company" name="company" value="{{ Auth::user()->company->name }}">
                    <input type="hidden" id="companyid" name="companyid" value="{{ Auth::user()->company->id }}">
                    <div class="form-row col-md-12 d-flex justify-content-around">
                        <div class="form-group col-md-3">
                            <label for="fechaini" class="form-control-sm">Desde:</label>
                            <input class="form-control form-control-sm" type="date" id="fechaini" name="fechaini" value=""></input>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fechafin" class="form-control-sm">Hasta:</label>
                            <input class="form-control form-control-sm" type="date" id="fechafin" name="fechafin" value=""></input>
                        </div>
                        <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
                            <button id="searchButton" type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Consultar</button>
                            <button id="printButton" type="submit" class="btn btn-primary btn-sm ml-4"><i class="fas fa-print"></i> Exportar</button>
                        </div>
                    </div>
                    <div id="spinner" class="spinner results"></div>
                    <div id="results">
                        <table id="tableresults" class="table table-sm table-hover results">
                            <thead>
                                <tr>
                                    <th scope="col">Radicado</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Origen</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/searchDocuments.js') }}" defer></script>
@endsection