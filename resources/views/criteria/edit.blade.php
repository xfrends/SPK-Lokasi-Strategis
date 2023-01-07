@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <form action="{{ route('criteria.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name', $data->name) }}" required>

                <!-- error message untuk title -->
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-select" aria-label="Default select example">Weight</label>
                <input type="number" class="form-control @error('weight') is-invalid @enderror"
                    name="weight" value="{{ old('weight', $data->weight) }}" required>

                <!-- error message untuk title -->
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Attribute</label>
                {{-- <input type="text" class="form-control form-select @error('attribute') is-invalid @enderror"
                    name="attribute" value="{{ old('attribute', $data->attribute) }}" required> --}}
                <select name="attribute" class="form-control form-select @error('attribute') is-invalid @enderror"
                    aria-label="Select Attribute" required>
                    <option selected>Select Attribute</option>
                    <option value="benefit" @if ($data->attribute == 'benefit') selected @endif>Benefit</option>
                    <option value="cost" @if ($data->attribute == 'cost') selected @endif>Cost</option>
                </select>
                <!-- error message untuk title -->
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-md btn-primary">Update</button>
            <a href="{{ route('criteria.index') }}" class="btn btn-md btn-secondary">back</a>
        </form>
    </div>
</div>
@endsection