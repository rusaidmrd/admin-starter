<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">Permission List</h4>
    @endsection

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                 <div class="card">
                     <div class="add-new-btn">
                         <a href="#" class="btn btn-success">Add Permission</a>
                     </div>
                    <div class="card-body">
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
                                                <button class="btn btn-primary btn-xs">View</button>
                                                <button class="btn btn-secondary btn-xs">Edit</button>
                                                <button class="btn btn-danger btn-xs">Delete</button>
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
