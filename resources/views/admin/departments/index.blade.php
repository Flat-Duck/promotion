@extends('admin.layouts.app', ['page' => 'department'])

@section('title', 'الاقسام')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">الاقسام</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.departments.create') }}">
                    إضافة قسم جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($departments as $k=> $department)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <a href="{{ route('admin.departments.edit', ['department' => $department->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.departments.destroy', ['department' => $department->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $departments->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
