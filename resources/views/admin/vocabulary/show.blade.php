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
                                        @if(!empty($vocabulary->day))
                                            {{ $vocabulary->day->module->name }},{{ $vocabulary->day->name }}
                                        @endif
                                    </td>
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
                                    <button name="filter" value="1" class="btn btn-primary btn-sm"
                                            data-toggle="modal" data-target="#test-create-modal"><i
                                            class="fas fa-filter"></i>Test Create
                                    </button>

                                    <div class="modal fade" id="test-create-modal" tabindex="-1" role="dialog"
                                         aria-labelledby="filters" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Test Create</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route("partStoreVocabulary",$vocabulary->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <h6>Question</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control form-control-sm"
                                                                       type="text" name="question"
                                                                       autocomplete="off"
                                                                       value="{{ old('question') }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <h6>Option(A)</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control form-control-sm"
                                                                       type="text" autocomplete="off"
                                                                       name="option_a"
                                                                       value="{{ old('option_a') }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <h6>Option(B)</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control form-control-sm"
                                                                       type="text" autocomplete="off"
                                                                       name="option_b"
                                                                       value="{{ old('option_b') }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <h6>Option(C)</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control form-control-sm"
                                                                       type="text" autocomplete="off"
                                                                       name="option_c"
                                                                       value="{{ old('option_c') }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <h6>Option(D)</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control form-control-sm"
                                                                       type="text" autocomplete="off"
                                                                       name="option_d"
                                                                       value="{{ old('option_d') }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <h6>Answer</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <select name="answer" class="form-control">
                                                                    <option value="1">A</option>
                                                                    <option value="2">B</option>
                                                                    <option value="3">C</option>
                                                                    <option value="4">D</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row align-items-center">
                                                            <div class="col-3">
                                                                <h6>Status</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <select name="status" class="form-control">
                                                                    <option value="1">Active</option>
                                                                    <option value="0">No Active</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" name="filter" class="btn btn-primary">
                                                            Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Option(A)</th>
                                    <th>Option(B)</th>
                                    <th>Option(C)</th>
                                    <th>Option(D)</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($parts as $key=>$part)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $part->question }}</td>
                                        <td>{{ $part->option_a }}</td>
                                        <td>{{ $part->option_b }}</td>
                                        <td>{{ $part->option_c }}</td>
                                        <td>{{ $part->option_d }}</td>
                                        <td>{{ $part->answers[$part->answer] }}</td>
                                        <td>{{ $part->st[$part->status] }}</td>
                                        <td>
                                            <form action="{{ route("partDelete", $part->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group ">
                                                    <a href="{{ route('partEdit',$part->id) }}"
                                                       class="btn btn-primary btn-sm"
                                                       style="margin-left: 5px; margin-right: 5px">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Вы уверены?')) { this.form.submit() } ">
                                                        <span class="fa fa-trash"></span></button>
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
                                            {{--{{ $grammers->links() }}--}}
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
