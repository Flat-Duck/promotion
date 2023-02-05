@extends('admin.layouts.app', ['page' => 'department'])

@section('title', 'إضافة قسم جديد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة قسم جديد</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.departments.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">إسم القسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="إسم القسم"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>                 
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.departments.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
