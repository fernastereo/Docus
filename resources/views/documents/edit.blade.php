@extends('layouts.app')
@section('content')
<script src="{{ asset('js/barcode.min.js') }}"></script>
<script src="{{ asset('js/print.min.js') }}"></script>
<script src="{{ asset('js/printlabel.js') }}" defer></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<div class="card">
				<form action="{{ route('documents.update', $document->id) }}" method="post" enctype="multipart/form-data">
					@method('put')
        			@csrf
					<div class="card-header d-flex justify-content-between">
			          <div><h5>Documento Radicado</h5></div>
			          <a href="{{ route('home') }}" class="btn btn-success btn-sm"><i class="fas fa-home"></i> Regresar</a>
			        </div>
					<div class="card-body">
						@include('partials.success')
	            		@include('partials.errors')
									<input type="hidden" id="copies" name="copies" value="2">
									<input type="hidden" id="company" name="company" value="{{ Auth::user()->company->name }}">
						<div class="form-row col-md-12">
							<div class="form-group col-md-3">
			                    <label for="codedocument" class="form-control-sm">Radicado:</label>
	        		            <input class="form-control form-control-sm" disabled type="text" id="codedocument" name="codedocument" value="{{ $document->codedocument }}"></input>
	                		</div>
							<div class="form-group col-md-3">
			                    <label for="daterec" class="form-control-sm">Fecha Recepción:</label>
	        		            <input class="form-control form-control-sm" readonly type="text" id="daterec" name="daterec" value="{{ date('d-m-Y', strtotime($document->daterec)) }}"></input>
	                		</div>
							<div class="form-group col-md-2">
			                    <label for="category_id" class="form-control-sm">Prioridad:</label>
			                    @if($categories!= null)
						          <select id="category_id" class="form-control form-control-sm" name="category_id">
						            
						            @foreach($categories as $category)
						              @if($category->id == $document->category_id)
						                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
						              @else
						                <option value="{{ $category->id }}">{{ $category->name }}</option>
						              @endif
						            @endforeach
						          </select>
						        @endif
	                		</div>
							<div class="form-group col-md-4">
			                    <label for="user_id" class="form-control-sm">Encargado:</label>
	        		            @if($users!= null)
						          <select id="user_id" class="form-control form-control-sm text-uppercase" name="user_id">
						            <option value="0" selected disabled>-- Seleccione --</option>
						            @foreach($users as $user)
						              @if($user->id == $document->user_id)
						                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
						              @else
						                <option value="{{ $user->id }}">{{ $user->name }}</option>
						              @endif
						            @endforeach
						          </select>
						        @endif
	                		</div>
						</div>
						<h6 class="mt-3">Información del Documento</h6>
						<div class="form-row col-md-12">
							<div class="form-group col-md-4">
								<label for="datedocument" class="form-control-sm">Fecha Documento:</label>
	        		            <input class="form-control form-control-sm" readonly  type="text" id="datedocument" name="datedocument" value="{{ date('d-m-Y', strtotime($document->datedocument)) }}"></input>
							</div>
							<div class="form-group col-md-4">
								<label for="typedocument_id" class="form-control-sm">Tipo:</label>
	        		            <input class="form-control form-control-sm" readonly  id="typedocument_id" name="typedocument_id" value="{{ $document->typedocument->name }}">
							</div>
							<div class="form-group col-md-4">
								<label for="subject" class="form-control-sm">Referencia:</label>
	        		            <input class="form-control form-control-sm" readonly  type="text" id="subject" name="subject" value="{{ $document->subject }}"></input>
							</div>
						</div>
						<div class="form-row col-md-12">
							<div class="form-group col-md-12">
								<label for="sender" class="form-control-sm">Origen del Documento:</label>
	        		            <input class="form-control form-control-sm" readonly  type="text" id="sender" name="sender" value="{{ $document->sender }}"></input>
							</div>
						</div>
						<div class="form-row col-md-12">
							<div class="form-group col-md-2">
								<label for="pages" class="form-control-sm">Folios:</label>
	        		            <input class="form-control form-control-sm" readonly  type="text" id="pages" name="pages" value="{{ $document->pages }}"></input>
							</div>
							<div class="form-group col-md-4">
								<label for="project" class="form-control-sm">Proyecto:</label>
	        		            <input class="form-control form-control-sm" readonly  type="text" id="project" name="project" value="{{ $document->project }}"></input>
							</div>
							<div class="form-group col-md-6">
								<label for="filename" class="form-control-sm">Archivo:</label>
								@if($document->filename != '')
									<a href="{{ $document->filename }}" target="_blank" onclick="window.open(this.href, this.target, 'width=1200,height=600'); return false;">Ver Documento Radicado</a>
								@endif
	        		            <input class="form-control form-control-sm" type="file" id="filename" name="filename" value="{{ old('$document->filename') }}"></input>
							</div>
						</div>
						<div class="form-row col-md-12">
							<div class="form-row col-md-12">
							<div class="form-group col-md-12">
								<label for="sender" class="form-control-sm">Observaciones:</label>
	        		            <textarea class="form-control" rows="3" placeholder="Observaciones" id="comments" name="comments">{{ old('comments', $document->comments) }}</textarea>
							</div>
						</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<button id="printButton" class="btn btn-primary btn-sm"><i class="fas fa-barcode"></i> Imprimir Recibido</button>
						<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Guardar Datos</button>
					</div>
				</form>
				<div id="barcodeContainer" style="display: block; width: 45%; position: relative; left: 500px; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;">
					<svg style="width:100px;" id="barcode"></svg>
					<div style="position: relative; top: -25px;">
						<p style="margin: 0;">Remitente: {{ $document->sender }}</p>
						<div style="display: flex; justify-content: flex-start;">
							<p style="margin: 0;">Fecha: {{ date('d-m-Y', strtotime($document->daterec)) }}</p>
							<p style="margin: 0 0 0 20px;">Folios: {{ $document->pages }}</p>
						</div>
						<p style="margin: 0;">Asunto: {{ $document->typedocument->name }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection