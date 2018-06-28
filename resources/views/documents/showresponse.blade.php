@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
          <div><h5>Respuesta Generada (Radicado: {{ $document->codedocument}})</h5></div>
          <a href="{{ route('home') }}" class="btn btn-success btn-sm"><i class="fas fa-home"></i> Regresar</a>
        </div>
				<div class="card-body">
          <div class="table-responsive-sm">
            <table class="table table-striped table-sm">
              <tbody>
                <tr class="miTabla">
                  <th scope="row">Radicado:</th>
                  <td>{{ $document->codedocument }}</td>
                </tr>
                <tr>
                	<th>Fecha de Recibo:</th>
                	<td>{{ date('d-m-Y', strtotime($document->daterec)) }}</td>
                </tr>
                <tr>
                	<th>Tipo de documento:</th>
                	<td>{{ $document->typedocument->name }}</td>
                </tr>
                <tr>
                	<th>Fecha del Documento:</th>
                	<td>{{ date('d-m-Y', strtotime($document->datedocument)) }}</td>
                </tr>
                <tr>
                	<th>Referencia:</th>
                	<td>{{ $document->subject }}</td>
                </tr>
                <tr>
                	<th>Origen:</th>
                	<td>{{ $document->sender }}</td>
                </tr>
                <tr>
                	<th>Número de Folios:</th>
                	<td>{{ $document->pages }}</td>
                </tr>
                <tr>
                	<th>Documento Adjunto:</th>
                	<td><a href="{{ $document->filename }}" target="_blank" onclick="window.open(this.href, this.target, 'width=1200,height=600'); return false;">Ver Documento</a></td>
                </tr>
                <tr>
                	<th>Observaciones:</th>
                	<td>{{ $document->comments }}</td>
                </tr>
                <tr>
                	<th>Encargado:</th>
                	<td class="text-uppercase">{{ $document->user->name }}</td>
                </tr>
                <tr>
                	<th>Prioridad:</th>
                	<td>{{ $document->category->name }} <i class="@if($document->category_id == 1)fas fa-exclamation-triangle rojo @elseif($document->category_id == 2)fas fa-check-square amarillo @elseif($document->category_id == 3)fas fa-check-circle verde @endif"></i></td>
                </tr>
              </tbody>
            </table>
            <h6>Respuesta generada al documento</h6>
            <table class="table table-striped table-sm">
              <tbody>
              	@foreach($document->responses as $response)
                <tr class="miTabla">
                	<th>Respuesta Generada:</th>
                	<td>{{ $response->comments }}</td>
                </tr>
                <tr>
                	<th>Fecha de Respuesta:</th>
                	<td>{{ date('d-m-Y', strtotime($response->date)) }}</td>
                </tr>
                <tr>
                	<th>Código Documento de Respuesta:</th>
                	<td>{{ $response->codedocument }}</td>
                </tr>
                <tr>
                	<th>Documento de Respuesta:</th>
                	<td><a href="{{ $response->filename }}" target="_blank" onclick="window.open(this.href, this.target, 'width=1200,height=600'); return false;">Ver Documento</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
				</div>
				</div>
				<div class="card-footer d-flex justify-content-end">
      		<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Imprimir Resumen</button>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection