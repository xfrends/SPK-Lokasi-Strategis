@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <a href="{{ url('v-value?rank=true') }}" class="btn btn-md btn-primary mb-3 mx-1 float-right">Order by Rank</a>
        <a href="{{ url('v-value') }}" class="btn btn-md btn-primary mb-3 mx-1 float-right">Order by Default</a>
        <div class="table-responsive">
            <table class="table table-bordered mt-1">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Alternative</th>
                        <th scope="col">S Value</th>
                        <th scope="col">V Value</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @forelse ($alternatives as $alternative)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $alternative->name }}</td>
                        <td>{{ $alternative->svalue}}</td>
                        <td>{{ $alternative->svalue / $sumtotal}}</td>
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