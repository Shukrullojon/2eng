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
                                    <td>
                                        @if(!empty($listening->day))
                                            {{ $listening->day->module->name }},{{ $listening->day->name }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>Text</th>
                                    <td>{!! $listening->text !!}</td>
                                </tr>

                                <tr>
                                    <th>Video</th>
                                    <td>
                                        @if(!empty($listening->video))
                                            <video width="320" height="240" controls>
                                                <source src="{{ asset($listening->video) }}" type="video/mp4">
                                            </video>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>Audio</th>
                                    <td>
                                        @if(!empty($listening->audio))
                                            <audio controls>
                                                <source src="{{ asset($listening->audio) }}" type="">
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
