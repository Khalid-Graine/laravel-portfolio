@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex">
        <div class="w-8/12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update footer</h6>
                        <form method="POST" action="{{ route('footer.update') }}" enctype="multipart/form-data"
                            class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $footer->id }}">


                            <div class="mb-3">
                                <label for="title" class="form-label">phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $footer->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">address</label>
                                <input type="text" name="address" class="form-control" value="{{ $footer->address }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">mail</label>
                                <input type="text" name="mail" class="form-control" value="{{ $footer->mail }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{ $footer->facebook }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">twitter</label>
                                <input type="text" name="twitter" class="form-control" value="{{ $footer->twitter }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">linkdeen</label>
                                <input type="text" name="linkdeen" class="form-control" value="{{ $footer->linkdeen }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{ $footer->instagram }}">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">update </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
