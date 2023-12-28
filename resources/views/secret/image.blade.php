<x-layouts.app>
    <x-sidebar>
    </x-sidebar>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('image.index') }}">Images</a></li>
                    <li class="breadcrumb-item active">Image</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <a href="{{ Storage::url($image->path) }}" target="_blank">{{ $image->name }}</a>
                                <img src="{{ Storage::url($image->path) }}" width="150" alt="{{ $image->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
</x-layouts.app>
