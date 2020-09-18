<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $course = new Course();
        return view('admin.courses.create',compact('course', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (StoreCourseRequest $request)
    {
        $data = $request->all();
        $slug = Str::slug("$request->name", '-');
        if($request->hasFile('img')) {
            $extension = $request->img->getClientOriginalExtension();
            $namefile = "$slug.{$extension}";
            $request->img->storeAs('public/img',$namefile);
            $data['img'] = $namefile;
        } else {
            unset($data['img']);
        }
        $data['slug'] = $slug;

        Course::create($data);
        return redirect()->route('courses.index')->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.show',compact('course','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.edit',compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $slug = Str::slug("$request->name", '-');
        $data = $request->all();

        if($request->hasFile('img')) {
            $extension = $request->img->getClientOriginalExtension();
            $namefile = "$slug.{$extension}";
            $request->img->storeAs('public/img',$namefile);
            $data['img'] = $namefile;
        } else {
            unset($data['img']);
        }
        $data['slug'] = $slug;
        $course->update($data);

        return redirect()->route('courses.index')->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success',true);
    }
}