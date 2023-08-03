@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex">
        <div class="w-8/12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add new Service</h6>
                        <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data"
                            class="forms-sample">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                <textarea class="form-control" name="description"  rows="10">test</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset('upload/no_image.jpg') }}" alt="" id="showImage"
                                    class="w-20 h-20 overflow-hidden rounded-sm object-fill bg-slate-400">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Create </button>

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
