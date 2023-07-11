@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('global.edit')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('moduleIndex') }}">Part</a></li>
                        <li class="breadcrumb-item active">@lang('global.edit')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('global.edit')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('partUpdate',$part->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Question</label>
                                        <input type="text" name="question" value="{{ old('question',$part->question) }}" class="form-control"/>
                                        @if($errors->has('question'))
                                            <span class="error invalid-feedback">{{ $errors->first('question') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option(A)</label>
                                        <input type="text" name="option_a" value="{{ old('option_a',$part->option_a) }}" class="form-control"/>
                                        @if($errors->has('option_a'))
                                            <span class="error invalid-feedback">{{ $errors->first('option_a') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option(B)</label>
                                        <input type="text" name="option_b" value="{{ old('option_b',$part->option_b) }}" class="form-control"/>
                                        @if($errors->has('option_b'))
                                            <span class="error invalid-feedback">{{ $errors->first('option_b') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option(C)</label>
                                        <input type="text" name="option_c" value="{{ old('option_c',$part->option_c) }}" class="form-control"/>
                                        @if($errors->has('option_c'))
                                            <span class="error invalid-feedback">{{ $errors->first('option_c') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option(D)</label>
                                        <input type="text" name="option_d" value="{{ old('option_d',$part->option_d) }}" class="form-control"/>
                                        @if($errors->has('option_d'))
                                            <span class="error invalid-feedback">{{ $errors->first('option_d') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Answer</label>
                                        <select class="form-control" name="answer">
                                            <option value="1" @if($part->answer == 1) selected @endif>A</option>
                                            <option value="2" @if($part->answer == 2) selected @endif>B</option>
                                            <option value="3" @if($part->answer == 3) selected @endif>C</option>
                                            <option value="4" @if($part->answer == 4) selected @endif>D</option>
                                        </select>
                                        @if($errors->has('answer'))
                                            <span class="error invalid-feedback">{{ $errors->first('answer') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" @if($part->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($part->status == 0) selected @endif>No Active</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('moduleIndex') }}"
                                   class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
