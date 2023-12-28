<x-layouts.app>
    <x-sidebar>
    </x-sidebar>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Finds</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Finds</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            <b>N</b>ame
                                        </th>
                                        <th>Email</th>
                                        <th data-type="date">Text</th>
                                        <th>Completion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finds as $find)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $find->user->name }}</td>
                                            <td>{{ $find->user->email }}</td>
                                            <td>{{ $find->text }}</td>
                                            <td>{{ $find->created_at->diffForHumans() }}</td>
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
