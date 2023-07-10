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
                                    <th>Info</th>
                                    <td>{!! $info->title !!}</td>
                                </tr>

                                <tr>
                                    <th>Description</th>
                                    <td>{!! $info->description !!}</td>
                                </tr>

                                <tr>
                                    <th>Image</th>
                                    <td>
                                        <img src="{{ $info->image }}" alt="" width="100" height="200">
                                        @if(!empty($info->image))

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
