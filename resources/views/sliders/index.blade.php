@extends('layouts.app')

@section('title')
{{ $title ?? 'Default' }}
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordere">

            </table>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
