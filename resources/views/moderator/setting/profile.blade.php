@extends('moderator.layout.main')

@section('title', 'New Moderator')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">Moderator</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item">
                    <a href="{{ route('setting.mod') }}">
                        <ion-icon name="home-outline"></ion-icon>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $moderator->email }}</li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
@endsection

@section('moderator_content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card radius-10">
                <div class="card-body">


                    <h5 class="mb-3">Profile {{ $moderator->name }}</h5>
                    @if($message = Session::get('success'))
                        <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-success mb-0">
                            <div class="d-flex align-items-center">
                                <div class="fs-3 text-success">
                                    <ion-icon name="checkmark-circle-sharp" role="img"
                                              class="md hydrated"
                                              aria-label="checkmark circle sharp"></ion-icon>
                                </div>
                                <div class="ms-3">
                                    <div class="text-success">
                                        {{ $message }}
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
                        <div class="user-change-photo shadow">
                            <img src="{{ $moderator->getAvatar() }}" alt="...">
                        </div>
                        <button type="button"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-outline-dark btn-sm radius-30 px-4">
                            <ion-icon name="image-sharp"></ion-icon>
                            Change Photo
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Change Photo
                                        </h5>
                                        <button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        We are using <a href="https://en.gravatar
                                        .com/">Gravatar</a> to store your profile picture. You
                                        can change your profile picture by using your email
                                        address. You can also change your profile picture
                                        by using your <a href="https://en.gravatar
                                        .com/">Gravatar</a> account. <br>
                                        <br>
                                        <a href="https://en.gravatar.com/">Gravatar</a> is a
                                        service that allows you to register an image for a given
                                        email address. This image will be used as your profile
                                        picture.

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('setting.mod.profile.update', $moderator) }}"
                          method="post">
                        @csrf
                        @method('PUT')
                        <h5 class="mb-0 mt-4">Mod Information</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label">Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ $moderator->name
                                }}">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Email address</label>
                                <input type="text"
                                       name="email"
                                       class="form-control"
                                       value="{{ $moderator->email }}">

                                @error('email')
                                <div class="text-danger">
                                    {{ $message  }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                       class="form-control">
                                @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="text-start mt-3">
                                <button type="submit" class="btn btn-dark px-4">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--end row-->
    </div>
@endsection
