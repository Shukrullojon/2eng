@extends('layouts.admin')
@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Speaking Show
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Day</th>
                                    <td>
                                        @if(!empty($speaking->day))
                                            {{ $speaking->day->module->name }},{{ $speaking->day->name }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>Theme</th>
                                    <td>{!! $speaking->theme !!}</td>
                                </tr>

                                <tr>
                                    <th>Example</th>
                                    <td>{!! $speaking->example !!}</td>
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
