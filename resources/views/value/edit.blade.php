@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <form action="{{ route('value.update', $alternative->id) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach ($criterias as $key => $criteria)
            <div class="form-group">
                <label for="title">{{$criteria->name}}</label>
                <input type="number" class="form-control @error($criteria->id) is-invalid @enderror"
                    name="{{$criteria->id}}" value="{{ old($criteria->id, $criteria->value) }}">
                <!-- error message untuk title -->
                @error($criteria->id)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @endforeach

            <button type="submit" class="btn btn-md btn-primary">Update</button>
            <a href="{{ route('value.index') }}" class="btn btn-md btn-secondary">back</a>
        </form>
    </div>
</div>
@endsection