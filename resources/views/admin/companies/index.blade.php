@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div><h5>Companies</h5></div>
          <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm"><i class="far fa-file-alt"></i> New Company</a>
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
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Prefix</th>
                  <th scope="col">Bucket</th>
                  <th scope="col">Consec</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($companies as $company)
                  <tr>
                    <td scope="row">
                        {{ $company->id }}
                    </td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ date('d-m-Y', strtotime($company->startdate)) }}</td>
                    <td>{{ $company->prefixcdocument }}</td>
                    <td>{{ $company->bucket }}</td>
                    <td>{{ $company->consecutive }}</td>
                    <td><a href="{{ route('companies.edit', $company->id) }}" class="btn btn-success btn-sm">Editar</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          {{ $companies->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<script>
@endsection
