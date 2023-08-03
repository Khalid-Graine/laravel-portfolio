@extends('backend.admin_dashboard')
@section('admin')


        <div class="flex gap-4">



            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Change Password</h6>

                            <form method="POST" action="{{ route('slide.update') }}" enctype="multipart/form-data"
                            class="forms-sample">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label">title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                                    @error('title')
                                        <p class="text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="short_title" class="form-label">short title</label>
                                    <input type="text" name="short_title" value="{{ $data->short_title }} " class="form-control"
                                        >
                                    @error('short_title')
                                        <p class="text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="home_slide" class="form-label">slide image</label>
                                    <input type="file" name="home_slide" id="image"  class="form-control" >
                                    @error('home_slide')
                                        <p class="text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset('' . $data->home_slide) }}" alt=""
                                        id="showImage" class="w-20 h-20 overflow-hidden rounded-sm object-fill bg-slate-400">
                                </div>

                                <div class="mb-3">
                                    <label for="video_url" class="form-label">video_url</label>
                                    <input type="text" name="video_url"  class="form-control" value="{{ $data->video_url }} " >
                                    @error('video_url')
                                        <p class="text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
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
