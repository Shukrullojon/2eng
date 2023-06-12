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
                                    <th>Day</th>
                                    <td>@if(!empty($vocabulary->day)){{ $vocabulary->day->name }}@endif</td>
                                </tr>

                                <tr>
                                    <th>Word</th>
                                    <td>{{ $vocabulary->word }}</td>
                                </tr>

                                <tr>
                                    <th>Translate</th>
                                    <td>{{ $vocabulary->translate }}</td>
                                </tr>

                                <tr>
                                    <th>Info</th>
                                    <td>{!! $vocabulary->info !!}</td>
                                </tr>

                                <tr>
                                    <th>Audio</th>
                                    <td>
                                        @if(!empty($vocabulary->audio))
                                            <audio controls>
                                                <source src="{{ asset($vocabulary->audio) }}" type="">
                                            </audio>
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
