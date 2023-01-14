@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-1">
                <thead>
                    <tr>
                        <th scope="col">Alternative</th>
                        @foreach ($criterias as $criteria)
                        <th scope="col">{{$criteria->name}}</th>
                        @endforeach
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alternatives as $alternative)
                    <tr>
                        <td>{{ $alternative->name }}</td>
                        @foreach ($criterias as $criteria)
                            @php
                                $empty = true;
                            @endphp
                            @foreach ($alternative->values as $data)
                            @if ($data->criteria_id == $criteria->id)
                                <td>{{$data->value}} ^ {{$criteria->weight / $sum_weight * -1}}</td>
                                @php
                                    $empty = false;
                                @endphp
                            @endif
                            @endforeach
                            @if ($empty)
                                <td>0</td>
                            @endif
                        @endforeach
                        <td class="text-center">
                            <a href="{{ route('value.edit', $alternative->id) }}" class="btn btn-sm btn-primary">Edit</a>
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