<x-layout>

    @section('page-title')
        <h4 class="page-title pull-left">Change Permission Information</h4>
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
                            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name of the permission <span class="required-text ml-1">*</span></label>
                                    <input class="form-control @error('name') invalid-input @enderror" type="text" name="name" placeholder="Eg : Add Product" id="name" value="{{ old('name',$permission->name) }}">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary ml-1">Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
