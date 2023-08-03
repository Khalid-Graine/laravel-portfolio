@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex">

        <div class="w-8/12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Change About Page</h6>

                        <form method="POST" action="{{ route('about.update') }}" enctype="multipart/form-data"
                            class="forms-sample">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="short_title" class="form-label">short title</label>
                                <input type="text" name="short_title" value="{{ $data->short_title }} "
                                    class="form-control">
                            </div>



                            <div class="mb-3">
                                <label for="short_description" class="form-label">short description</label>
                                <input type="text" name="short_description" class="form-control"
                                    value="{{ $data->short_description }} ">

                            </div>

                            <div class="mb-3">
                                <label for="long_description" class="form-label">long description</label>

                                    <textarea class="form-control" name="long_description"
                                     rows="10"
                                  >{{ $data->long_description }}
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="long_description" class="form-label">about image</label>
                                <input type="file" name="about_image" id="image" class="form-control"
                                    value="{{ $data->about_image }} ">
                            </div>

                            <div class="mb-3">
                                <img src="{{ asset('' . $data->about_image) }}" alt=""
                                    id="showImage" class="w-20 h-20 overflow-hidden rounded-sm object-fill bg-slate-400">
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Update </button>

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
