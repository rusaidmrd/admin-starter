<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">Permission List</h4>
    @endsection

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="add-new-btn mb-2">
                    <a href="{{ route('permissions.create') }}" class="btn btn-success"><i class="ti-plus mr-1"></i>Add Permission</a>
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
                            <table id="dataTable2" class="text-center datatable datatable-Permission datatable-normal">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission )
                                        <tr>
                                            <td></td>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <a href="{{ route('permissions.show',$permission->id) }}" class="btn btn-primary-outline btn-xs">View</a>
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-secondary-outline btn-xs">Edit</a>
                                                <button class="btn btn-danger btn-xs"><i class="ti-trash"></i></button>
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


                // let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                // let deleteButton = {
                //     text: deleteButtonTrans,
                //     url: "",
                //     className: 'btn-danger',
                //     action: function (e, dt, node, config) {
                //     var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                //         return $(entry).data('entry-id')
                //     });

                //     if (ids.length === 0) {
                //         alert('{{ trans('global.datatables.zero_selected') }}')

                //         return
                //     }

                //     if (confirm('{{ trans('global.areYouSure') }}')) {
                //         $.ajax({
                //         headers: {'x-csrf-token': _token},
                //         method: 'POST',
                //         url: config.url,
                //         data: { ids: ids, _method: 'DELETE' }})
                //         .done(function () { location.reload() })
                //     }
                //     }
                // }
                // dtButtons.push(deleteButton);

                $.extend(true, $.fn.dataTable.defaults, {
                    order: [[ 1, 'desc' ]],
                    pageLength: 10,
                });

                $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons });
                // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                //     $($.fn.dataTable.tables(true)).DataTable()
                //         .columns.adjust();
                // });

            });


        </script>
    @endsection


</x-layout>
