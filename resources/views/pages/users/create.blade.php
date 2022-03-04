<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">Add a new user</h4>
    @endsection

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                 <div class="card">
                    <div class="card-body">
                        {{--  <div class="form-title">
                            <h3>The form to create a permission</h3>
                        </div>  --}}
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Sorry!</strong> {{ $message }}
                            </div>
                        @endif
                        <div class="form-wrapper">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="col-form-label">Name of the user <span class="required-text ml-1">*</span></label>
                                    <input class="form-control @error('name') invalid-input @enderror" type="text" name="name" placeholder="Eg : Taylor Otwell" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="col-form-label">Email address <span class="required-text ml-1">*</span></label>
                                    <input class="form-control @error('email') invalid-input @enderror" type="email" name="email" placeholder="Eg : yourname@gmail.com" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="col-form-label">Password <span class="required-text ml-1">*</span></label>
                                    <input class="form-control @error('password') invalid-input @enderror" type="password" name="password" placeholder="*****************" id="password" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="roles" class="col-form-label mb-0">Roles <span class="required-text ml-1">*</span></label>
                                    <div class="select2-btn mb-2">
                                        <span class="btn btn-info btn-xxs select-all">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xxs deselect-all">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select id="roles" class="form-control select2 @error('roles') invalid-input @enderror" name="roles[]" multiple>
                                        @foreach ($roles as $id => $role )
                                            <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary ml-1">Back</a>
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
