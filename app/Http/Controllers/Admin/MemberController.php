<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Member;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Specialization;
use Carbon\Carbon;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::getList();
        $page = 'member';

        return view('admin.members.index',compact('members','page'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function this_month()
    {
        $members = Member::whereBetween('next_pormotion_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->paginate(20);
        $page = 'this_month';
        return view('admin.members.index',compact('members','page'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function this_year()
    {
        $members = Member::whereBetween('next_pormotion_date', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->paginate(20);//->get();
        $page = 'this_year';
        return view('admin.members.index',compact('members','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $specializations = Specialization::all();

        return view('admin.members.add',compact('departments','specializations'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate(Member::validationRules());
        if ($request->hasFile('picture')) {
            $fileName = time().'.'.$request->picture->extension();  

            //$path = Storage::putFile('photos', new File('images'));

            //$request->picture->move(public_path('uploads'), $fileName);
            

            $path = Storage::putFileAs(
                'public/images', $request->file('picture'), $request->n_id. '.' .$request->picture->extension()
            );
            $validatedData['picture'] = $path;
            
            //dd($path);
        }    
        
        
        $member = Member::create($validatedData);
        $member->calculateNextPromotionDate();

        return redirect()->route('admin.members.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
