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
                                    <td>@if(!empty($grammer->day)){{ $grammer->day->name }}@endif</td>
                                </tr>

                                <tr>
                                    <th>Text</th>
                                    <td>{!! $grammer->text !!}</td>
                                </tr>


                                <tr>
                                    <th>Video</th>
                                    <td>
                                        @if(!empty($grammer->video))
                                            <video  src="{{ asset($grammer->video) }}" controls>
                                            </video>
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
