<x-layouts.app>
    <x-sidebar>
    </x-sidebar>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Images</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Path
                                        </th>
                                        <th>User</th>
                                        <th>image</th>
                                        <th data-type="date">Publish</th>
                                        <th>Completion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                <a href="{{ Storage::url($image->path) }}"
                                                    target="_blank">{{ $image->name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route("users.show", ["user" => $image->imageable->id])}}">
                                                    {{ $image->imageable->name }}
                                                    {{ $image->imageable->email }}
                                                </a>
                                            </td>
                                            <td><img src="{{ Storage::url($image->path) }}" width="150"
                                                    alt="{{ $image->name }}"></td>
                                            <td>{{ $image->created_at->diffForHumans() }}</td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    class="bg-red-500 p-2 px-4 rounded text-white">Delete</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Delete User</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1 class="text-2xl mb-3">Are you sure you want to
                                                                    delete</h1>
                                                                <form
                                                                    action="{{ route('images.destroy', ['image' => $image->id]) }}"
                                                                    id="exampleModal" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="bg-slate-500 p-2 px-4 rounded text-white"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button
                                                                        class="bg-red-500 p-2 px-4 rounded text-white">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.app>
