@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div><h5>Dashboard</h5></div>
          <a href="{{ route('documents.create') }}" class="btn btn-primary btn-sm"><i class="far fa-file-alt"></i> Nuevo Documento</a>
        </div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class="table-responsive-sm">
            <input type="hidden" id="copies" name="copies" value="1">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Radicado</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Fecha</th>
                  <th scope="col"></th>
                  <th scope="col">Origen</th>
                  <th scope="col">Encargado</th>
                  <th scope="col">Estado</th>
                  <th scope="col" style="width: 50px;"></th>
                  @if(Auth::user()->profile_id == 1)
                    <th scope="col"></th>
                  @endif
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($documents as $document)
                  <tr>
                    <th scope="row">
                      @if(!$document->filename)
                        {{ $document->codedocument }}
                      @else
                        <a href="{{ $document->filename }}" target="_blank" onclick="window.open(this.href, this.target, 'width=1200,height=600'); return false;">{{ $document->codedocument }}</a>
                      @endif
                      <small class="text-capitalize">Radicado Por: {{ $document->reception->user->name }}</small>
                    </th>
                    <td>{{ $document->typedocument->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($document->daterec)) }}</td>
                    <td>
                      <i class="@if($document->category_id == 1)fas fa-exclamation-triangle rojo @elseif($document->category_id == 2)fas fa-check-square amarillo @elseif($document->category_id == 3)fas fa-check-circle verde @endif"></i> 
                    </td>
                    <td>{{ $document->sender}}</td>
                    <td class="text-uppercase">{{ $document->userenc($document->user_id) }}</td>
                    <td>@if($document->state_id == 1)<span class="badge badge-danger">{{ $document->state->name }}</span>
                        @elseif($document->state_id == 2) <span class="badge badge-warning">{{ $document->state->name }}</span>
                        @elseif($document->state_id == 3) <span class="badge badge-success">{{ $document->state->name }}</span>
                        @endif
                    </td>
                    <td>
                      @if(!$document->filename)
                        <a href="{{ route('documents.filename', $document->id) }}" title="Volver a cargar el documento" class="btn btn-warning btn-sm"><i class="far fa-file-alt"></i> </a>
                      @endif
                    </td>
                    @if(Auth::user()->profile_id == 1)
                      <td>
                          @if($document->state_id == 1)
                            <a href="{{ route('documents.edit', $document->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-hand-point-right"></i> Asignar</a>
                          @elseif($document->state_id == 2)
                            <a href="{{ route('documents.edit', $document->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-hand-point-right"></i> Editar</a>
                          @endif
                      </td>
                    @endif
                   <td>@if($document->state_id == 1)
                          <a href="{{ route('documents.response', $document->id) }}" class="btn btn-success btn-sm"><i class="far fa-check-square"></i> Responder</a>
                        @elseif($document->state_id == 2)
                          <a href="{{ route('documents.response', $document->id) }}" class="btn btn-success btn-sm"><i class="far fa-check-square"></i> Responder</a>
                        @elseif($document->state_id == 3)
                          <a href="{{ route('documents.showresponse', $document->id) }}" class="btn btn-success btn-sm"><i class="far fa-check-square"></i> Ver Respuesta</a>
                        @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          {{ $documents->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<script>
@endsection
