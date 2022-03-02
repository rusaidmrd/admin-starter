<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">Permission Information - {{ $permission->name }}</h4>
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
                                            <td>{{ $permission->id }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="fw-bold">Name</th>
                                            <td>{{ $permission->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-bold">Date Created</th>
                                            <td>{{ $permission->updated_at }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary ml-1">Back</a>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    @section('scripts')
        @parent

    @endsection


</x-layout>
