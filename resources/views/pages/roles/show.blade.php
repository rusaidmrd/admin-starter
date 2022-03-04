<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">User role details - {{ $role->name }}</h4>
    @endsection

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                 <div class="card">
                    <div class="card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="fw-bold">ID</th>
                                            <td>{{ $role->id }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="fw-bold w-25">Name</th>
                                            <td>{{ $role->name }}</td>
                                        </tr>
                                            <th class="fw-bold w-25">Permissions</th>
                                            <td>
                                                @foreach ($role->permissions as $key => $permission)
                                                    <span class="status-primary status-xs bg-info mb-1">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bold w-25">Date Created</th>
                                            <td>{{ $role->created_at }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary ml-1">Back</a>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    @section('scripts')
        @parent

    @endsection


</x-layout>
