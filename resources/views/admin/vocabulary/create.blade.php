@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('global.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vocabularyIndex') }}">Vocabulary</a></li>
                        <li class="breadcrumb-item active">@lang('global.add')</li>
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
                        <h3 class="card-title">@lang('global.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('vocabularyStore') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Day</label>
                                        <label for="*" style="color:red">*</label>
                                        <select name="day_id" id="day_id"
                                                class="form-control select2" {{ $errors->has('day_id') ? "is-invalid":"" }}
                                        ">
                                        @foreach($days as $day)
                                            <option value="{{ $day->id }}">{{ $day->module->name }} {{ $day->name }}</option>
                                            @endforeach
                                            </select>
                                            @if($errors->has('day_id'))
                                                <span
                                                    class="error invalid-feedback">{{ $errors->first('day_id') }}</span>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Word</label>
                                        <input type="text" name="word" id="word"
                                               value="{{ old('word') }}"
                                               class="form-control {{ $errors->has('word') ? "is-invalid":"" }}"
                                               autocomplete="off" required>
                                        @if($errors->has('word'))
                                            <span class="error invalid-feedback">{{ $errors->first('word') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Translate</label>
                                        <input type="text" name="translate" id="word"
                                               value="{{ old('translate') }}"
                                               class="form-control {{ $errors->has('translate') ? "is-invalid":"" }}"
                                               autocomplete="off" required>
                                        @if($errors->has('translate'))
                                            <span class="error invalid-feedback">{{ $errors->first('translate') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Info</label>
                                        <textarea id="summernote" name="info"
                                                  class="{{ $errors->has('info') ? "is-invalid":"" }}">
                                            {{ old('info') }}
                                        </textarea>
                                        @if($errors->has('info'))
                                            <span class="error invalid-feedback">{{ $errors->first('info') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Audio</label>
                                        <input type="file" name="audio" class="form-control"/>
                                        @if($errors->has('audio'))
                                            <span class="error invalid-feedback">{{ $errors->first('audio') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('vocabularyIndex') }}"
                                   class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
