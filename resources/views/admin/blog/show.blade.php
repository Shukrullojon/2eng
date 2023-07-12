@extends('layouts.admin')
@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Blog Show
                            <a href="" class="btn btn-sm btn-outline-info float-right">Редактировать</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Day</th>
                                    <td>@if(!empty($blog->day))
                                            {{ $blog->day->module->name }} {{ $blog->day->name }}
                                    @endif</td>
                                </tr>

                                <tr>
                                    <th>Text</th>
                                    <td>{!! $blog->text !!}</td>
                                </tr>

                                <tr>
                                    <th>Translate</th>
                                    <td>{!! $blog->translate !!}</td>
                                </tr>

                                <tr>
                                    <th>Grammer Focus</th>
                                    <td>{!! $blog->grammer_focus !!}</td>
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
