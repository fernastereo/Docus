@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<div class="card">
				{{-- <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
        			@csrf --}}
					<div class="card-header d-flex justify-content-between">
			          <div><h5>Documento Radicado</h5></div>
			          <a href="{{ route('home') }}" class="btn btn-success btn-sm"><i class="fas fa-home"></i> Regresar</a>
			        </div>
					<div class="card-body">
						@include('partials.success')
	            		@include('partials.errors')					
						<div class="form-row col-md-12">
							<div class="form-group col-md-3">
			                    <label for="codedocument" class="form-control-sm">Radicado:</label>
	        		            <input class="form-control form-control-sm" disabled type="text" id="codedocument" name="codedocument" value="{{ $document->codedocument }}"></input>
	                		</div>
							<div class="form-group col-md-3">
			                    <label for="daterec" class="form-control-sm">Fecha Recepción:</label>
	        		            <input class="form-control form-control-sm" readonly type="text" id="daterec" name="daterec" value="{{ date('d-m-Y', strtotime($document->daterec)) }}"></input>
	                		</div>
						</div>
						<h6 class="mt-3">Información del Documento</h6>
						<div class="form-row col-md-12">
							<div class="form-group col-md-4">
								<label for="datedocument" class="form-control-sm">Fecha Documento:</label>
	        		            <input class="form-control form-control-sm" readonly type="text" id="datedocument" name="datedocument" value="{{ date('d-m-Y', strtotime($document->datedocument)) }}"></input>
							</div>
							<div class="form-group col-md-4">
								<label for="typedocument_id" class="form-control-sm">Tipo:</label>
	        		            <input class="form-control form-control-sm" readonly id="typedocument_id" name="typedocument_id" value="{{ $document->typedocument->name }}">
							</div>
							<div class="form-group col-md-4">
								<label for="subject" class="form-control-sm">Referencia:</label>
	        		            <input class="form-control form-control-sm" readonly type="text" id="subject" name="subject" value="{{ $document->subject }}"></input>
							</div>
						</div>
						<div class="form-row col-md-12">
							<div class="form-group col-md-12">
								<label for="sender" class="form-control-sm">Origen del Documento:</label>
	        		            <input class="form-control form-control-sm" readonly type="text" id="sender" name="sender" value="{{ $document->sender }}"></input>
							</div>
						</div>
						<div class="form-row col-md-12">
							<div class="form-group col-md-2">
								<label for="pages" class="form-control-sm">Folios:</label>
	        		            <input class="form-control form-control-sm" readonly type="text" id="pages" name="pages" value="{{ $document->pages }}"></input>
							</div>
							<div class="form-group col-md-4">
								<label for="project" class="form-control-sm">Proyecto:</label>
	        		            <input class="form-control form-control-sm" readonly type="text" id="project" name="project" value="{{ $document->project }}"></input>
							</div>
							<div class="form-group col-md-6">
								<label for="filename" class="form-control-sm">Archivo:</label>
								<a href="{{ $document->filename }}" target="_blank" onclick="window.open(this.href, this.target, 'width=1200,height=600'); return false;">Ver Archivo Adjunto</a>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-end">
	            		<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-barcode"></i> Imprimir Recibido</button>	
					</div>
				{{-- </form> --}}
			</div>
		</div>
	</div>
</div>
@endsection