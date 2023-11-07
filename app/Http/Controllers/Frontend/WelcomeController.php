<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\MediaFeed;
use App\Models\Award;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
	private $program;
	private $faculty;
    private $grade;
    private $subject;
	private $partner;
    private $product;
    private $testimonial;
   

    public function __construct(Program $program,Faculty $faculty,Grade $grade,Subject $subject,Partner $partner,Product $product,Testimonial $testimonial)
    {
        $this->program        	= $program;
        $this->faculty        	= $faculty;
        $this->grade        	= $grade;
        $this->subject      	= $subject;
        $this->product      	= $product;
        $this->testimonial      = $testimonial;
    }

    public function index()
    {
		$programs = $this->program->select('id','name','slug','description')->with([
		    'faculties' => function ( $query) {
		    	$query->select('id','program_id','name','slug');
		        $query->where('status', 'APPROVED');
		        $query->with([
				    'grades' => function ( $query) {
				    	$query->select('id','faculty_id','name','slug');
				        $query->where('status', 'APPROVED');
				    }
				]);
		    }
		])
		->where(['status'=>'APPROVED'])
	    ->orderBy('id','DESC')
	    ->get();

		$students = DB::table('users')->count();

		$teachers = DB::table('users')->where('type','Teacher')->count();

		$products = $this->product->whereStatus('APPROVED')->orderBy('order','ASC')->limit(3)->get();

		$testimonials = $this->testimonial->whereStatus('APPROVED')->orderBy('order','ASC')->get();

		$mediaFeeds = MediaFeed::whereStatus('APPROVED')->orderBy('order','ASC')->get();
		// $awards = Award::whereStatus('APPROVED')->orderBy('order','ASC')->get();
		$awards = [];
		$partners = Partner::whereStatus('APPROVED')->orderBy('order','ASC')->get();
		$subjects = $this->subject->whereStatus('APPROVED')->orderBy('order','ASC')->limit(3)->get();

		$faculties  = $this->faculty->where('status','APPROVED')->orderBy('id', 'DESC')->get();

    	return view('frontend.welcome.index',compact('programs','products','testimonials','mediaFeeds','awards','partners','subjects', 'students', 'teachers','faculties'));

    	// return view('frontend.maintenance');
    }

    public function oldIndex()
    {
    	$grades = $this->grade->select('id','program_id','name','slug','description')->with([
		    'subjects' => function ( $query) {
		    	$query->select('id','grade_id','name','slug');
		        $query->where('status', 'APPROVED');
		    }
		])
		->where(['status'=>'APPROVED'])
		->where(function($q) {
	          $q->where('program_id', 1)
	            ->orWhere('program_id', 2);
	    })
	    ->orderBy('order','ASC')
		->limit(5)->get();
    }
}