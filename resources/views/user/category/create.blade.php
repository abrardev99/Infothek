<x-app-layout :title="'Create Category'">
    <div class="row">
        <div class="col-12">
            <div class="text-right mb-3">
                <a href="{{ route('category.index') }}" class="btn btn-primary text-white" >Back</a>
            </div>
            <div class="card">
                <div class="card-header"><h3>Create Category</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name<small class="text-danger">*</small></label>
                                    <input name="name" id="name" type="text" value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror" autofocus required>
                                    <small>Name will be unique slug</small>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="category_id">Parent Category</label>
                                    <select name="category_id"
                                            class="select2 form-control @error('category_id') is-invalid @enderror" id="category_id">
                                        <option value="">None</option>
                                        @forelse($categories as $category)
                                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <small>Leave none will make this category as Parent category</small>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input name="description" id="description" type="text" value="{{ old('description') }}"
                                           class="form-control @error('description') is-invalid @enderror">
                                    <small>Max length 200 characters</small>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button name="from" type="submit" value="save" class="btn btn-primary">Save</button>
                        <button name="from" type="submit" value="save_and_create_new" class="btn btn-primary">Save And Create New</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endpush
</x-app-layout>
