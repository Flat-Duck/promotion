@extends('admin.layouts.app', ['page' => $page])

@section('title', 'أعضاء هيئة التدريس')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">أعضاء هيئة التدريس</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.members.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الدرجة الاكاديمية</th>
                        <th>الدرجة</th>
                        <th>رقم الهاتف</th>
                        <th>تاريخ اخر ترقية</th>
                        <th>تاريخ استحقاق الترقية القادم</th>
                        <th>الصورة الشخصية</th>
                        {{-- <th> البريد الالكتروني</th> --}}
                        {{-- <th>الرقم الوطني</th> --}}
                        <th>العمليات</th>
                    </tr>

                    @forelse ($members as $k=> $member)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->academic_degree }}</td>
                            <td>{{ $member->degree }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->last_pormotion_date }}</td>
                            <td>{{ $member->next_pormotion_date }}</td>
                            <td>
                                @php $src = $member->picture ? \Storage::url($member->picture) : '' @endphp
                                @if($src)                                
                                <img src="{{ $member->picture ? \Storage::url($member->picture) : '' }}" class="border rounded" style="width: 60px; height: 80px; object-fit: cover;">
                                @else <div class="border border-info" style="width: 60px; height: 80px;"></div>
                                @endif
                            </td>
                            {{-- <td>{{ $member->email }}</td> --}}
                            {{-- <td>{{ $member->n_id }}</td>                             --}}
                            <td>
                                <a href="{{ route('admin.members.edit', ['member' => $member->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.members.destroy', ['member' => $member->id]) }}"
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
                            <td colspan="5">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $members->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
