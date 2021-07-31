@extends('layouts.front')

@section('content')
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-dark mb-3 btn-sm" onclick="history.go(-1);">
                <i class="bi bi-arrow-left-short"></i>
                Voltar
            </button>
        </div>
    </div>
@endsection
