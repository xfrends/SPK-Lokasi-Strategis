@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <form action="{{ route('alternative.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required>

                <!-- error message untuk title -->
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-md btn-primary">Create</button>
            <a href="{{ route('alternative.index') }}" class="btn btn-md btn-secondary">back</a>
        </form>
    </div>
</div>
@endsection