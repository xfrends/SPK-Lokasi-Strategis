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
                        <th scope="col">S Value</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alternatives as $alternative)
                    <tr>
                        <td>{{ $alternative->name }}</td>
                        @php
                            $total = 1;
                        @endphp
                        @foreach ($criterias as $criteria)
                            @php
                                $empty = true;
                            @endphp
                            @forelse ($alternative->values as $data)
                                @if ($data->criteria_id == $criteria->id)
                                @if ($data->attribute == 'cost')
                                    <td>{{ pow($data->value, ($criteria->weight / $sum_weight * -1)) }}</td>
                                    @php
                                        $total = $total * pow($data->value, ($criteria->weight / $sum_weight * -1));
                                    @endphp
                                @else
                                    <td>{{ pow($data->value, ($criteria->weight / $sum_weight * 1)) }}</td>
                                    @php
                                        $total = $total * pow($data->value, ($criteria->weight / $sum_weight * 1));
                                    @endphp
                                @endif
                                @php
                                    $empty = false;
                                @endphp
                            @endif
                            @empty
                                @php
                                    $total = 0;
                                @endphp
                            @endforelse
                            @if ($empty)
                                <td>0</td>
                            @endif
                        @endforeach
                        <td>{{$total}}</td>
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