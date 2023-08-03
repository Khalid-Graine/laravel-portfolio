@extends('backend.admin_dashboard')
@section('admin')

    <div class="card w-7/12">
        <div class="card-body  ">
            <h6 class="card-title">edit a Blog </h6>
            <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data"
                class="forms-sample">
                @csrf



                <div>
                    <select name="blog_category_id" id="">
                        @foreach ($BlogCategory as $item)
                            @if ($item->id == $blog->blog_category_id)
                                {
                                <option selected value="{{ $item->id }}">
                                    {{ $item->blog_category_name }}
                                </option>
                                }
                            @else
                                <option value="{{ $item->id }}">
                                    {{ $item->blog_category_name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <x-error-message name="blog_category_name" />
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label"> title</label>
                    <input type="text" name="title" value="{{ $blog->title }}" class="form-control">
                    <x-error-message name="title" />
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control" name="description" rows="10">
                                    {{ $blog->description }}"
                                </textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <x-error-message name="image" />
                </div>

                <div class="mb-3">
                    <img src="{{ asset('' . $blog->image) }}" alt="" id="showImage"
                        class="w-20 h-20 overflow-hidden object-cover rounded-sm  bg-slate-400">
                </div>

                <button type="submit" class="btn btn-primary me-2">Update </button>
            </form>
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
