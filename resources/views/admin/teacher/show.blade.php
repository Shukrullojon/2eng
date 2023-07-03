@extends('layouts.admin')
@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $teacher->name }}</td>
                                </tr>

                                <tr>
                                    <th>Info</th>
                                    <td>{!! $teacher->info !!}</td>
                                </tr>

                                <tr>
                                    <th>Image</th>
                                    <td>
                                        @if(!empty($teacher->image))
                                            <img src="{{ $teacher->image }}" alt="" width="100" height="200">
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
