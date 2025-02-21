@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex gap-3 flex-wrap">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Fun Run 7K</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ route('event.detail') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title">Family Run 3K (1 Anak & 1 Dewasa)</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ route('event.detail') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 35rem;">
            <div class="card-body">
                <h5 class="card-title">Family Run 3K (1 Anak & 2 Dewasa / 2 Anak & 1 Dewasa)</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ route('event.detail') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endsection
