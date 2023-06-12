@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- card-body -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                   aria-describedby="dataTable_info">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>@lang('global.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($days as $day)
                                    <tr>
                                        <td>{{ $day->name }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $days->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
