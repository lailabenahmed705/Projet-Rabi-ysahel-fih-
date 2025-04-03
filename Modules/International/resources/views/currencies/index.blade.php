@extends('layouts/contentNavbarLayout')

@section('content')
    <div class="row justify-content-center">
         <div class="col-md-12">
              <div class="card">
                    <div class="card-header">Currencies Table</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <a href="{{ route('currencies.create') }}" class="btn btn-primary">Add Currency</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ISO Code</th>
                                    <th>Exchange Rate</th>
                                    <th>Decimals</th>
                                    <th>Status</th>
                                    <th>Symbol</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currencies as $currency)
                                    <tr>
                                        <td>{{ $currency->name }}</td>
                                        <td>{{ $currency->iso_code }}</td>
                                        <td>{{ $currency->exchange_rate }}</td>
                                        <td>{{ $currency->decimals }}</td>
                                        <td>{{ ucfirst($currency->status) }}</td>
                                        <td>{{ $currency->symbol }}</td>
                                        <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                            <div class="dropdown-menu">
                                                    <form action="{{ route('currencies.destroy', $currency->id) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this currency?')"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
