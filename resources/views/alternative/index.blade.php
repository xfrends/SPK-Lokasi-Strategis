@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <a href="{{ route('alternative.create') }}" class="btn btn-md btn-success mb-3 float-right">Create</a>
        <div class="table-responsive">
            <table class="table table-bordered mt-1">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->created_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Are you sure ?');" action="{{ route('alternative.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('alternative.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center text-mute" colspan="4">Data alternative tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection