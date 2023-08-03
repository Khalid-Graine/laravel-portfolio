@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex w-6/12">
        <div class="middle-wrapper ">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add new Blog category</h6>
                        <form method="POST" action="{{ route('blog.category.store') }}" class="forms-sample">
                            @csrf
                            <div class="mb-3">
                                <label for="blog_category_name" class="form-label">blog category</label>
                                <input type="text" name="blog_category_name" class="form-control">
                                <x-error-message name="blog_category_name" />
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Add </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
