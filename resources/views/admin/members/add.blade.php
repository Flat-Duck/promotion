@extends('admin.layouts.app', ['page' => 'provider'])

@section('title', 'إضافة عضو هئية تدريس')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة عضو هئية تدريس</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.members.store') }}"  enctype="multipart/form-data">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الأسم رباعي</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="الأسم رباعي"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="n_id">الرقم الوطني </label>
                        <input type="text"
                            class="form-control"
                            name="n_id"
                            required
                            placeholder="الرقم الوطني "
                            value="{{ old('n_id') }}"
                            id="n_id"
                        >
                    </div>

                    <div class="form-group">
                        <label for="employment_date">تاريخ التعيين</label>
                        <input type="date"
                            class="form-control"
                            name="employment_date"
                            required
                            placeholder="تاريخ التعيين"
                            value="{{ old('employment_date') }}"
                            id="employment_date"
                        >
                    </div>
                    <div class="form-group">
                        <label for="departments">القسم</label>
                        <select class="form-control" name="department_id" id="departments" >
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ is_array(old('departments')) && in_array($department->id, old('departments')) ? 'selected' : '' }} >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="specializations">التخصص العام</label>
                        <select class="form-control" name="specialization_id" id="specializations" >
                            @foreach ($specializations as $specialization)
                                <option value="{{ $specialization->id }}"
                                    {{ is_array(old('specializations')) && in_array($specialization->id, old('specializations')) ? 'selected' : '' }} >
                                    {{ $specialization->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="academic_degree">الدرجة العلمية</label>
                        <select class="form-control" name="academic_degree" id="academic_degree" >
                            @foreach (App\Member::academic_degrees as $academic_degree)
                                <option value="{{ $academic_degree }}"
                                    {{ is_array(old('academic_degree')) && in_array(Member::academic_degrees, old('academic_degree')) ? 'selected' : '' }} >{{ $academic_degree }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="degree">الدرجة الاكاديمية</label>
                        <select class="form-control" name="degree" id="degree" >
                            @foreach (App\Member::degrees as $degree)
                                <option value="{{ $degree }}"
                                    {{ is_array(old('degree')) && in_array(Member::degrees, old('degree')) ? 'selected' : '' }} >{{ $degree }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="last_pormotion_date">تاريخ أخر ترقية</label>
                        <input type="date"
                            class="form-control"
                            name="last_pormotion_date"
                            required
                            placeholder=">تاريخ أخر ترقية "
                            value="{{ old('last_pormotion_date') }}"
                            id="last_pormotion_date"
                        >
                    </div>
                    <div class="form-group">
                        <label for="next_pormotion_date">تاريخ إستحقاق الترقية القادمة </label>
                        <input type="date"
                            class="form-control"
                            name="next_pormotion_date"
                            required
                            placeholder=">تاريخ أخر ترقية "
                            value="{{ old('next_pormotion_date') }}"
                            id="next_pormotion_date">
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            required
                            placeholder="رقم الهاتف"
                            value="{{ old('phone') }}"
                            id="phone"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email"
                            class="form-control"
                            name="email"
                            required
                            placeholder="البريد الالكتروني"
                            value="{{ old('email') }}"
                            id="email"
                        >
                    </div>

                    <div class="form-group">
                        <label for="notes">ملاحظات </label>
                        <input type="TextArea"
                            class="form-control"
                            name="notes"
                            required
                            placeholder="ملاحظات "
                            value="{{ old('notes') }}"
                            id="notes"
                        >
                    </div>
                    <div class="form-group">
                        <label for="picture">الصورة الشخصية</label>
                        <input type="file"
                            class="form-control"
                            name="picture"
                            required                            
                            id="picture"
                        >
                    </div>
                    <div class="form-group">
                        <label for="cv">السيرة الذاتية </label>
                        <input type="file"
                            class="form-control"
                            name="cv"
                            required                            
                            id="cv">
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.members.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
