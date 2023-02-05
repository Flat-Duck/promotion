@extends('admin.layouts.app', ['page' => 'department'])

@section('title', 'تعديل قسم')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل قسم</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.departments.update', ['department' => $department->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">إسم القسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="إسم القسم"
                            value="{{ old('name', $department->name) }}"
                            id="name"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.departments.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
