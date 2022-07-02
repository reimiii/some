@extends('moderator.layout.main')

@section('title', 'New Moderator')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">Setting</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item">
                    <a href="{{ route('setting.mod') }}">
                        <ion-icon name="home-outline"></ion-icon>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">New</li>
            </ol>
        </nav>
    </div>
@endsection

@section('moderator_content')
    <div class="col-xl-7 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Add New Moderator</h6>
                    <hr>
                    <form action="{{ route('setting.mod.post') }}" method="post" class="row g-3">
                        @csrf
                        @include('moderator.setting.moderator.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
