<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">List of Roles</h4>
    @endsection

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="add-new-btn mb-2">
                    <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="ti-plus mr-1"></i>Add new role</a>
                </div>
                 <div class="card">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif

                        <div class="data-tables datatable-primary">
                            <table id="" class="text-center datatable datatable-Roles datatable-normal datatable-with-border">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role )
                                        <tr data-entry-id="{{ $role->id }}">
                                            <td></td>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="text-left p-3" style="width:500px">
                                                @foreach ($role->permissions as $key => $permission)
                                                    <span class="status-primary status-xs bg-info mb-1">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('roles.show',$role->id) }}" class="btn btn-primary-outline btn-xs">View</a>
                                                <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-secondary-outline btn-xs">Edit</a>
                                                <form action="{{ route('roles.delete', $role->id) }}" class="d-initial" method="POST" onsubmit="return deleteForm(this);">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-xs"><i class="ti-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    @section('scripts')
        @parent
        <script>
            $(function(){
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('roles.deleteMany') }}",
                    className: 'btn-danger',
                    action: function (e, dt, node, config) {
                        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{ trans('global.datatables.zero_selected') }}',
                            })

                            return
                        }

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#6a040f',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: { ids: ids, _method: 'DELETE' }
                                })
                                .done(function () {
                                    location.reload()
                                });
                            }
                        });
                    }
                }
                dtButtons.push(deleteButton);

                $.extend(true, $.fn.dataTable.defaults, {
                    order: [[ 1, 'desc' ]],
                    pageLength: 10,
                });

                $('.datatable-Roles:not(.ajaxTable)').DataTable({ buttons: dtButtons });
                // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                //     $($.fn.dataTable.tables(true)).DataTable()
                //         .columns.adjust();
                // });

            });


            function deleteForm(form) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6a040f',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
                return false;
            }

        </script>
    @endsection


</x-layout>
