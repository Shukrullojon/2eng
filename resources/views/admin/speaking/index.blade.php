@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Speaking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item active">Speaking</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('error') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <h3 class="card-title">Create</h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('speakingCreate') }}" class="btn btn-sm btn-outline-info">Speaking create</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Day</th>
                                    <th>Theme</th>
                                    <th>Example</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($speaking as $key => $s)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if(!empty($s->day))
                                                {{ $s->day->module->name }},{{ $s->day->name }}
                                            @endif
                                        </td>
                                        <td>{!!  $s->theme !!}</td>
                                        <td>{!!  $s->example !!}</td>
                                        <td>
                                            <form action="{{ route("speakingDelete", $s->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group ">
                                                    <a href="{{ route('speakingShow',$s->id) }}"
                                                       class="btn btn-info btn-sm">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="{{ route('speakingEdit',$s->id) }}"
                                                       class="btn btn-primary btn-sm"
                                                       style="margin-left: 5px; margin-right: 5px">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-trash"></span></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <td colspan="9">
                                            {{ $speaking->links() }}
                                        </td>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script
    </script>
@endsection
