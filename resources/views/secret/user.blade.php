<x-layouts.app>
    <x-sidebar>
    </x-sidebar>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('admin/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $user->name }}</h2>
                            <h3>{{ $user->email }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Finds</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-edit">Images</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Finds</h5>
                                    @foreach ($finds as $find)
                                        <p class="small fst-italic">{{ $find->text }} =>
                                            <span>{{ $find->created_at->diffForHumans() }}</span>
                                        </p>
                                    @endforeach

                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <h5 class="card-title">Images</h5>
                                    @foreach ($images as $image)
                                        <a href="{{ Storage::url($image->path) }}"
                                            target="_blank">{{ $image->name }}</a>
                                        <img src="{{ Storage::url($image->path) }}" width="150"
                                            alt="{{ $image->name }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.app>
