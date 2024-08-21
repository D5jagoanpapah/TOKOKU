@extends('layouts.admin', ['title' => 'add category'])

@section('content')
        <div class="card">
            <div class="card-header">
                <h4>add category</h4>

            </div>
            <div class="card-body">
                <form action="{{ url('insert-category') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">slug</label>
                            <input type="text" class="form-control" name="slug" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">description</label>
                            <textarea name="description" rows="3" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular" >
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" rows="3" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
@endsection