<?php

namespace App\Http\Controllers\Backend;

use App\Models\Program;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Lesson;
use App\Models\Glossary;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function index()
    {
    	return view('backend.cache.index')->with('title','Cache');
    }

    public function setCategoryCache()
    {

    	$categories =  Grade::with([
		    'subjects' => function ( $query) {
		    	$query->select('id','grade_id','name','slug');
		        $query->where('status', 'APPROVED');
		    }
		])
		->whereStatus('APPROVED')->orderBy('order','ASC')->get();
		
		$category_view = view('backend.cache.category',compact('categories'));
		
		$category_view = preg_replace('~>\s+<~', '><', $category_view); //removes whitespace
		Cache::forever( 'categories_view', $category_view );
		echo 1;
    }

    public function setLessonsSidebarCache()
    {

    	$subjects = Subject::with([
		    	'units' => function ( $query) {
			    	$query->select('id','subject_id','name','slug');
			        $query->where('status', 'APPROVED');
			        $query->orderBy('order', 'ASC');
				    $query->with(['lessons' => function ( $query) 
				    	{
					    	$query->select('id','subject_id','unit_id','name','slug');
					        $query->where('status', 'APPROVED');
					        $query->orderBy('order', 'ASC');
					    }
					]);
			    },
			    'lessons' => function ( $query) {
			    	$query->select('id','subject_id','name','slug');
			        $query->where('status', 'APPROVED');
			        $query->orderBy('order', 'ASC');
			    },
			    'grade' => function ( $query){
			    	$query->select('id','name','slug');
			    }
			])
		->whereStatus('APPROVED')
		->orderBy('order','ASC')
		->get();

		// return $subjects;

		foreach ($subjects as $key => $subject) {

			$lesson_sidebar_view = view('backend.cache.lesson-sidebar',compact('subject'));

			$lesson_sidebar_view = preg_replace('~>\s+<~', '><', $lesson_sidebar_view); //removes whitespace

			Cache::forever( $subject->slug.'_lesson_sidebar_view', $lesson_sidebar_view );
		}
		echo 1;
    }

    public function setNotesSidebarCache()
    {

    	$subjects = Subject::with([
    			'units' => function ( $query) {
			    	$query->select('id','subject_id','name','slug');
			        $query->where('status', 'APPROVED');
			        $query->orderBy('order', 'ASC');
				    $query->with(['lessons' => function ( $query) 
				    	{
					    	$query->select('id','subject_id','unit_id','name','slug');
					        $query->where('status', 'APPROVED');
					        $query->orderBy('order', 'ASC');
					        $query->with([
							    'notes' => function ( $query){
							    	$query->select('id','subject_id','lesson_id','title','slug');
							        $query->where(['status'=>'APPROVED']);
							        $query->orderBy('order', 'ASC');
							    }
							]);
					    }
					]);
			    },
		    
			    'lessons' => function ( $query) {
			    	$query->select('id','subject_id','name','slug');
			        $query->where('status', 'APPROVED');
			        $query->orderBy('order', 'ASC');
			        $query->with([
					    'notes' => function ( $query){
					    	$query->select('id','subject_id','lesson_id','title','slug');
					        $query->where(['status'=>'APPROVED']);
					        $query->orderBy('order', 'ASC');
					    }
					]);
			    },
			    'grade' => function ( $query){
			    	$query->select('id','name','slug');
			    }
			])
		->whereStatus('APPROVED')
		->orderBy('order','ASC')
		->get();

	
		foreach ($subjects as $key => $subject) {

			$note_sidebar_view = view('backend.cache.note-sidebar',compact('subject'));

			$note_sidebar_view = preg_replace('~>\s+<~', '><', $note_sidebar_view); //removes whitespace

			Cache::forever( $subject->slug.'_note_sidebar_view', $note_sidebar_view );
		}
		echo 1;
    }

    public function setTooltipCache()
    {
    	$glossaries = Glossary::get();

    	$tooltip_view = view('backend.cache.tooltip',compact('glossaries'));

		$tooltip_view = preg_replace('~>\s+<~', '><', $tooltip_view); //removes whitespace

		Cache::forever( 'tooltip_view', $tooltip_view );
		// return $tooltip_view;
		echo 1;
    }

    public function setProfessionModalCache()
    {
    	$categories =  Grade::select('id','name','slug','description')->with([
		    'subjects' => function ( $query) {
		    	$query->select('id','grade_id','name','slug');
		        $query->where('status', 'APPROVED');
		    }
		])
		->whereStatus('APPROVED')->orderBy('order','ASC')->get();

		$professional_modal_view = view('backend.cache.professional-modal',compact('categories'));

		$professional_modal_view = preg_replace('~>\s+<~', '><', $professional_modal_view); //removes whitespace

		Cache::forever( 'professional_modal_view', $professional_modal_view );
		echo 1;
    }

    public function setBlogCategorySidebarCache()
    {
    	$categories =  BlogCategory::select('id','name','slug')->withCount([
		    'blogs' => function ( $query) {
		        $query->where('status', 'APPROVED');
		    }
		])
		->whereStatus('APPROVED')->orderBy('id','ASC')->get();

		$recentPosts = Blog::select('id','category_id','title','slug','image','created_at')->with([
		    'category' 
		])
		->whereStatus('APPROVED')->orderBy('id','DESC')->limit(5)->get();

		$blog_category_sidebar_view = view('backend.cache.blog-category-sidebar',compact('categories','recentPosts'));

		$blog_category_sidebar_view = preg_replace('~>\s+<~', '><', $blog_category_sidebar_view); //removes whitespace

		Cache::forever( 'blog_category_sidebar_view', $blog_category_sidebar_view );
		echo 1;
    }


    public function setPageNotFoundCache()
    {
    	$grades =  Grade::with([
		    'subjects' => function ( $query) {
		    	$query->select('id','grade_id','name','slug');
		        $query->where('status', 'APPROVED');
		    }
		])
		->whereStatus('APPROVED')->orderBy('order','ASC')->get();

		$page_not_found_view = view('backend.cache.404',compact('grades'));

		$page_not_found_view = preg_replace('~>\s+<~', '><', $page_not_found_view); //removes whitespace

		Cache::forever( 'page_not_found_view', $page_not_found_view );
		echo 1;
    }


}
