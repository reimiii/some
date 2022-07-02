@extends('moderator.layout.main')

@section('title', 'Dashboard')

@section('moderator_content')
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-5">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="mx-auto widget-icon bg-light-dark text-dark">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="text-dark mb-1">{{ $moderator->countMod() }}</h3>
                        <p class="text-muted mb-4">Moderator</p>
                        <p class="text-dark mb-0 font-13">
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="mx-auto widget-icon bg-light-dark text-dark">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="text-dark mb-1">{{ $moderator->countGuru() }}</h3>
                        <p class="text-muted mb-4">Guru</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="mx-auto widget-icon bg-light-dark text-dark">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="text-dark mb-1">{{ $moderator->countUser() }}</h3>
                        <p class="text-muted mb-4">User </p>
                        <p class="text-dark mb-0 font-13">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="mx-auto widget-icon bg-light-dark text-dark">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="text-dark mb-1">10</h3>
                        <p class="text-muted mb-4">Kelas </p>
                        <p class="text-dark mb-0 font-13">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="mx-auto widget-icon bg-light-dark text-dark">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="text-dark mb-1">10</h3>
                        <p class="text-muted mb-4">Wali Kelas </p>
                        <p class="text-dark mb-0 font-13">
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!--end row-->
@endsection