<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">Add a new role</h4>
    @endsection

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                 <div class="card">
                    <div class="card-body">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Sorry!</strong> {{ $message }}
                            </div>
                        @endif
                        <div class="form-wrapper">
                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="col-form-label">Name of the role <span class="required-text ml-1">*</span></label>
                                    <input class="form-control @error('name') invalid-input @enderror" type="text" name="name" placeholder="Eg : Manager | Staff" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="permissions" class="col-form-label mb-0">Permissions <span class="required-text ml-1">*</span></label>
                                    <div class="select2-btn mb-2">
                                        <span class="btn btn-info btn-xxs select-all">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xxs deselect-all">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select id="permissions" class="form-control select2 @error('permissions') invalid-input @enderror" name="permissions[]" multiple>
                                        @foreach ($permissions as $id => $permission )
                                            <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary ml-1">Back</a>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    @section('scripts')
        @parent

    @endsection


</x-layout>
