@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <a href="{{ route('criteria.create') }}" class="btn btn-md btn-success mb-3 float-right">Create</a>
        <div class="table-responsive">
            <table class="table table-bordered mt-1">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Attribute</th>
                        <th scope="col">Normalized Weight</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->weight }}</td>
                        <td>{{ ucwords($data->attribute) }}</td>
                        @if ($data->attribute == 'cost')
                        <td>{{ $data->weight / $sum_weight * -1 }}</td>
                        @else
                        <td>{{ $data->weight / $sum_weight }}</td>
                        @endif
                        <td>{{ $data->created_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Are you sure ?');" action="{{ route('criteria.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('criteria.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center text-mute" colspan="4">Data criteria tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection