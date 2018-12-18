@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($notes->isEmpty())
                <p>
                    You have not created any notes! <a href="{{ route('notes.create') }}">Create one</a> now.
                </p>
            @else
                @foreach($notes as $note)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $note->title }}</h5>
                                <p class="card-text">{{ $note->body }}</p>
                                <p class="card-text">
                                    <small class="text-muted">{{ $note->updated_at->diffForHumans() }}</small>
                                </p>
                                <a href="{{ route('notes.edit', $note) }}" class="btn btn-primary btn-sm">edit</a>
                                {!! Form::open(['route' => ['notes.destroy', $note]]) !!}
                                    @method('DELETE')
                                    {!! Form::submit('delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
