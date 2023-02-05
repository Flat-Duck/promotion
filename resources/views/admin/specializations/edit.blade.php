@extends('admin.layouts.app', ['page' => 'specialization'])

@section('title', 'تعديل تخصص')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل تخصص</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.specializations.update', ['specialization' => $specialization->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">إسم التخصص</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="إسم التخصص"
                            value="{{ old('name', $specialization->name) }}"
                            id="name"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.specializations.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
