@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex ">
        <div class="middle-wrapper ">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add new Blog category</h6>
                        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="forms-sample">
                            @csrf


                            <div>
                                <select name="blog_category_id" id="">
                                    <option selected value="x">select category</option>
                                    @foreach ($BlogCategory as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->blog_category_name }}
                                        </option>
                                    @endforeach

                                </select>
                                <x-error-message name="blog_category_name" />
                            </div>
                            <div class="i my-2 font-bold text-blue-400 mb-4">
                               <a href="{{ route('blog.category.create') }}">
                                New category
                               </a>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label"> title</label>
                                <input type="text" name="title" class="form-control">
                                <x-error-message name="title" />
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                <textarea class="form-control" name="description"  rows="10">test</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <x-error-message name="image" />
                            </div>

                            <div class="mb-3">
                                <img src="{{ asset('upload/no_image.jpg') }}" alt="" id="showImage"
                                    class="w-20 h-20 overflow-hidden rounded-sm object-fill bg-slate-400">
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Add </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(handleImageChange);
        });

        function handleImageChange(e) {
            var reader = new FileReader();
            reader.onload = handleImageLoad;
            reader.readAsDataURL(e.target.files[0]);
        }

        function handleImageLoad(e) {
            $('#showImage').attr('src', e.target.result);
        }
    </script>
@endsection
