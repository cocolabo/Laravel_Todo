@extends('layouts.app')
@section('title','Laravel Todo App')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        フォーム
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'task']) !!}
                        @csrf
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">タスク追加</label>
                            <div class="col-sm-6">
                                {!!Form::text('task_name', null, [
                                                            'class' => 'form-control' . ( $errors->has('task_name') ? ' is-invalid' : '' ),
                                                            'placeholder'=>'タスク名を入力してください'
                                                             ])!!}

                                @if ($errors->has('task_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('task_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        @if (count($tasks) > 0)
            <div class="row justify-content-md-center mt-5">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header">
                            タスク一覧
                        </div>
                        <div class="card-body">
                            <table class="table table-striped task-table">
                                <thead>
                                <th>タスク名</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">{{ $task->name }}</td>
                                        <td>
                                            {!! Form::open(['url' => url('task/'.$task->id)]) !!}
                                            @csrf
                                            @method('DELETE')
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    @endif
@endsection