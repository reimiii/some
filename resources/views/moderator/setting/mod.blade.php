@extends('moderator.layout.main')

@section('title', 'Setting')

@section('breadcrumb')
    <div class="breadcrumb-title pe-3">Setting</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;">
                        <ion-icon name="home-outline"></ion-icon>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('action')
    <div class="btn-group">
        @sMod
        <button type="button" class="btn btn-outline-dark">Action</button>
        <button type="button"
                class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a
                    class="dropdown-item"
                    href="{{ route('setting.mod.new') }}">New Moderator</a>
            {{--            <a class="dropdown-item" href="javascript:;">Another action</a>--}}
            {{--            <a class="dropdown-item" href="javascript:;">Something else here</a>--}}
            {{--            <div class="dropdown-divider"></div>--}}
            {{--            <a class="dropdown-item" href="javascript:;">Separated link</a>--}}
        </div>
        @endsMod
    </div>
@endsection

@section('moderator_content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Moderator List</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                        <ion-icon name="search-sharp"></ion-icon>
                    </div>
                    <input class="form-control ps-5" type="text"
                           id="search"
                           name="search" value="{{ request('search') }}"
                           placeholder="search">
                </form>

            </div>
            @if($message = Session::get('success'))
                <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-success mb-0">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-success">
                            <ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated"
                                      aria-label="checkmark circle sharp"></ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-success">{{ $message }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Status</th>
                        @sMod
                        <th>Actions</th>
                        @endsMod
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($moderator) > 0)
                        @foreach($moderator as $mod)
                            <tr>
                                <td>{{ $loop->iteration  + $moderator->firstItem() - 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 cursor-pointer">
                                        <img src="{{ $mod->getAvatar() }}"
                                             class="rounded-circle" width="44" height="44" alt="">
                                        <div class="">
                                            <p class="mb-0">{{ $mod->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $mod->email }}</td>
                                <td>{{ $mod->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($mod->status == 'active')
                                        <span class="badge bg-light-success text-success
                                    w-100">Active</span>
                                    @else
                                        <span class="badge bg-light-danger text-danger w-100">Inactive</span>
                                    @endif
                                </td>
                                @sMod
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">

                                        <a href="{{ route('setting.mod.edit', $mod) }}"
                                           class="text-warning"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="bottom" title=""
                                           data-bs-original-title="Edit"
                                           aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="{{ route('setting.mod.delete', $mod) }}"
                                           class="btn-delete text-danger"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="bottom" title=""
                                           data-bs-original-title="Delete" aria-label="Delete"><i
                                                    class="bi bi-trash-fill"></i></a>

                                    </div>
                                </td>
                                @endsMod
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">
                                No data found, try to search with another keyword.
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <form id="delete-form"
                      method="POST" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="my-8">
                {{ $moderator->appends(request()->only('search'))->links() }}
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script>
        document.querySelectorAll('.btn-delete').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete this moderator?')) {
                    document.getElementById('delete-form').action = this.href;
                    document.getElementById('delete-form').submit();
                }
            });
        });
    </script>
@endsection