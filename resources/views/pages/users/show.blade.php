<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">User Details - {{ $user->name }}</h4>
    @endsection

    <div class="main-content-inner">
        <div class="row">
            <div class="col-6 mt-5">
                 <div class="card">
                    <div class="card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="fw-bold">ID</th>
                                            <td>{{ $user->id }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="fw-bold">Name</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bold">Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bold">Email verified at</th>
                                            <td>{{ $user->email_verified_at }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bold">Roles</th>
                                            <td>
                                                @foreach ($user->roles as $key => $role)
                                                    <span class="status-primary bg-primary">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bold">Date Created</th>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary ml-1">Back</a>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    @section('scripts')
        @parent

    @endsection


</x-layout>
