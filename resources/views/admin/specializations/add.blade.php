@extends('admin.layouts.app', ['page' => 'specialization'])

@section('title', 'إضافة تخصص جديد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة تخصص جديد</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.specializations.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">إسم التخصص</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="إسم التخصص"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>                 
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.specializations.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
