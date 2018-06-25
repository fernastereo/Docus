@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<div class="card">
				<form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
        			@csrf
					<div class="card-header">
						Nuevo Documento
					</div>
					<div class="card-body">
						@include('partials.success')
	            		@include('partials.errors')					
						<div class="form-row col-md-12">
							<div class="form-group col-md-3">
			                    <label for="codedocument" class="form-control-sm">Radicado:</label>
	        		            <input class="form-control form-control-sm" disabled type="text" id="codedocument" name="codedocument" value="{{ old('codedocument') }}"></input>
	                		</div>
							<div class="form-group col-md-3">
			                    <label for="daterec" class="form-control-sm">Fecha Recepción:</label>
	        		            <input class="form-control form-control-sm" type="date" id="daterec" name="daterec" value="{{ old('daterec') }}"></input>
	                		</div>
						</div>
						<h6 class="mt-3">Información del Documento</h6>
						<div class="form-row col-md-12">
							<div class="form-group col-md-4">
								<label for="datedocument" class="form-control-sm">Fecha Documento:</label>
	        		            <input class="form-control form-control-sm" type="date" id="datedocument" name="datedocument" value="{{ old('datedocument') }}"></input>
							</div>
							<div class="form-group col-md-4">
								<label for="typedocument_id" class="form-control-sm">Tipo:</label>
	        		            @if($typedocuments!= null)
						          <select id="typedocument_id" class="form-control form-control-sm" name="typedocument_id">
						            <option value="0" selected disabled>-- Seleccione --</option>
						            @foreach($typedocuments as $typedocument)
						              @if($typedocument->id == old('typedocument_id'))
						                <option value="{{ $typedocument->id }}" selected>{{ $typedocument->name }}</option>
						              @else
						                <option value="{{ $typedocument->id }}">{{ $typedocument->name }}</option>
						              @endif
						            @endforeach
						          </select>
						        @endif
							</div>
							<div class="form-group col-md-4">
								<label for="subject" class="form-control-sm">Referencia:</label>
	        		            <input class="form-control form-control-sm" type="text" id="subject" name="subject" value="{{ old('subject') }}"></input>
							</div>
						</div>
						<div class="form-row col-md-12">
							<div class="form-group col-md-12">
								<label for="sender" class="form-control-sm">Origen del Documento:</label>
	        		            <input class="form-control form-control-sm" type="text" id="sender" name="sender" value="{{ old('sender') }}"></input>
							</div>
						</div>
						<div class="form-row col-md-12">
							<div class="form-group col-md-2">
								<label for="pages" class="form-control-sm">Folios:</label>
	        		            <input class="form-control form-control-sm" type="number" id="pages" name="pages" value="{{ old('pages') }}"></input>
							</div>
							<div class="form-group col-md-4">
								<label for="project" class="form-control-sm">Proyecto:</label>
	        		            <input class="form-control form-control-sm" type="text" id="project" name="project" value="{{ old('project') }}"></input>
							</div>
							<div class="form-group col-md-6">
								<label for="filename" class="form-control-sm">Archivo:</label>
	        		            <input class="form-control form-control-sm" type="file" id="filename" name="filename" value="{{ old('filename') }}"></input>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-end">
	            		<button type="submit" class="btn btn-primary btn-sm">Guardar Datos</button>	
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection