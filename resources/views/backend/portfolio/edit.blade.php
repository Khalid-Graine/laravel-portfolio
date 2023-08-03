@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex">
        <div class="w-8/12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update portfolio</h6>
                        <form method="POST" action="{{ route('portfolio.update') }}" enctype="multipart/form-data"
                            class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $Portfolio->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text" name="name" class="form-control" value="{{ $Portfolio->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" name="title" class="form-control" value="{{ $Portfolio->title }}">
                            </div>



                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                <textarea class="form-control" name="description"  rows="10">
                                    {{ $Portfolio->description }}
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset(''.$Portfolio->image) }}" alt="" id="showImage"
                                    class="w-20 h-20 overflow-hidden rounded-sm object-fill bg-slate-400">
                            </div>


                            <button type="submit" class="btn btn-primary me-2">update </button>

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
