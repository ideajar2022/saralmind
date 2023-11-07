<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

// Route::get('/public/{any}', function ($any) {
//     dd("working");
//     return Redirect::to("/$any", 301);
// })->where('any', '.*');

// Authentication Routes...

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::get('login/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.login');
Route::get('callback/{provider}','Auth\SocialAuthController@handleProviderCallback');

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/public/{any}', function ($any) {
        return Redirect::to("/$any", 301);
    })->where('any', '.*');

    Route::get('/', 'WelcomeController@index')->name('welcome');

    Route::get('/blogs', 'BlogController@index')->name('blog.list');
    Route::get('/blogs/category/{slug}', 'BlogController@category')->name('blog.category');
    Route::get('/blogs/{slug}', 'BlogController@show')->name('blog.show');
    Route::get('/contact-us', 'InquiryController@index')->name('contact-us');
    Route::get('/courses', 'GradeController@index')->name('courseoverview');
    Route::get('/lessons', 'LessonsController@index')->name('lessons');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::post('/contact-us-success', 'InquiryController@store')->name('inquiry.store');
    Route::post('/report', 'BugController@report')->name('bug.report');
    Route::post('/profession', 'UserController@updateProfession')->name('profession.update');



    // Route::get('/profile', 'UserController@profile')->name('user.profile');
    
    Route::get('/profile/{username}', 'UserController@profile')->name('user.profile');
    Route::post('/profile/{username}', 'UserController@profile')->name('user.privacy');  // change user data privacy

    // Premium nursing app routes
    Route::get('/premium-app', 'PremiumAppController@index');
    Route::post('/premium-app', 'PremiumAppController@login')->name('premium-login');

    
    Route::get('/setting', 'UserController@setting')->name('user.setting');
    Route::get('/change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('user.change-password');
    Route::post('/setting', 'UserController@update')->name('user.setting');
    Route::post('/profile/upload', 'UserController@upload')->name('user.upload');

    Route::get('/nnc-exam', 'NNCController@index')->name('nnc-exam-home');
    Route::get('/nnc-exam-guidelines', 'NNCController@showGuidelines')->name('nnc-guidelines');
    Route::post('/nnc-exam-guidelines', 'NNCController@startQuiz')->name('nnc-exam-start');
    Route::post('/nnc-exam-start', 'NNCController@finishQuiz')->name('nnc-exam-finish');
    Route::get('/nnc-exam-result', 'NNCResultController@show_result')->name('nnc-results');
    Route::get('/nnc-detailed-result/{id}', 'NNCResultController@show_answer')->name('nnc-exam-answers');

    // Important questions routes
    Route::get('/important-questions', 'ImportantQuestionsController@getProgram')->name('imp-question-program');

    Route::get('/important-questions/{programSlug}', 'ImportantQuestionsController@getFaculty')->name('imp-question-faculty');

    // Route::get('/important-questions/{programSlug}/{facultySlug}', 'ImportantQuestionsController@getGrade')->name('imp-question-grade');

    // only for nursing
    Route::get('/important-questions/nursing/pcl-nursing', 'ImportantQuestionsController@getGrade')->name('imp-question-grade');
    
    Route::get('/important-questions/{programSlug}/{facultySlug}/{gradeSlug}', 'ImportantQuestionsController@getSubject')->name('imp-question-subject');

    Route::get('/important-questions/{programSlug}/{facultySlug}/{gradeSlug}/{subjectSlug}', 'ImportantQuestionsController@getLesson')->name('imp-question-lesson');

    Route::get('/important-questions/{programSlug}/{facultySlug}/{gradeSlug}/{subjectSlug}/{lessonSlug}', 'ImportantQuestionsController@getSubjectiveQuestion')->name('imp-question');

    
    // Route::get('/login_design',function(){
    // 	return view('frontend.auth.login');
    // });
    // Route::get('/lessons',function(){
    // 	return view('frontend.lessons');
    // });
    // Route::get('/lessons/notes',function(){
    // 	return view('frontend.note');
    // });
    // Route::get('/lessons/notes/note-single',function(){
    // 	return view('frontend.note-single');
    // });

    // Route::get('/classes',function(){
    //     return view('frontend.classes');
    // });

    // Route::get('/search-results',function(){
    //     return view('frontend.search');
    // });

    Route::get('/about',function(){
        return view('frontend.about');
    });

    // Route::get('/profile',function(){
    //     return view('frontend.profile');
    // });

    // Route::get('/setting',function(){
    //     return view('frontend.setting');
    // });

    // Route::get('/profile/connections',function(){
    //     return view('frontend.connections');
    // });

    // Route::get('/blogs-static',function(){
    //     return view('frontend.blogs');
    // });


    // Route::get('/contact-us',function(){
    //     return view('frontend.contact');
    // });

    // Route::get('/error',function(){
    //     return view('frontend.error');
    // });

    // Route::get('/blog-single',function(){
    //     return view('frontend.blog-single');
    // });

    Route::get('/privacy-policy',function(){
        return view('frontend.privacy');
    });

    Route::get('/terms-of-services',function(){
        return view('frontend.terms');
    });


    // Route:: get ('/ads.txt', function () {
    //    return view('frontend.ads');
    // });

    // Route::get('sitemap.xml','SitemapController@index');
    // Route::get('sitemap.xml/grade','SitemapController@grades');
    // Route::get('sitemap.xml/subject','SitemapController@subjects');
    // Route::get('sitemap.xml/lesson','SitemapController@lessons');
    // Route::get('sitemap.xml/note','SitemapController@notes');
    // Route::get('sitemap.xml/blog','SitemapController@blogs');

    Route::post('subscribe','SubscriberController@store')->name('subscribe');
    Route::get('search','SearchController@index')->name('search');

    // Route::get('classes/subjects/{id}','SyllabusController@remapClass');
    // Route::get('classes/subjects/units/lessons/{id}','SyllabusController@remapSubject');
    // Route::get('classes/subjects/units/lessons/notes/{id}','SyllabusController@remapLesson');
    // Route::get('classes/subjects/units/lessons/notes/note-detail/{id}', 'SyllabusController@remapNote');

    // Route::get('classes/subjects/units/lessons/exercises/{id}', 'SyllabusController@remapNoteExercises');
    // Route::get('classes/subjects/units/lessons/practice-tests/{id}', 'SyllabusController@remapNoteQuizs');
    //  Route::get('classes/subjects/units/lessons/videos/{id}', 'SyllabusController@remapNoteVideos');

    Route::get('/pcl-3-rd-year/{subjectSlug}/{lessonSlug}/{noteSlug}', 'SyllabusController@remapNote');
    Route::get('/pcl-2nd-year/{subjectSlug}/{lessonSlug}/{noteSlug}', 'SyllabusController@remapNote');
    Route::get('/pcl-1st-year/{subjectSlug}/{lessonSlug}/{noteSlug}', 'SyllabusController@remapNote');

    Route::get('/class-pcl-3-rd-year/{subjectSlug}/{lessonSlug}/{noteSlug}', 'SyllabusController@remapNote');
    Route::get('/class-pcl-2nd-year/{subjectSlug}/{lessonSlug}/{noteSlug}', 'SyllabusController@remapNote');
    Route::get('/class-pcl-1st-year/{subjectSlug}/{lessonSlug}/{noteSlug}', 'SyllabusController@remapNote');
    // Route::get('/{classSlug}/{subjectSlug}/{lessonSlug}', 'SyllabusController@remapLesson');
    // Route::get('/{classSlug}/{subjectSlug}', 'SyllabusController@remapSubject');

    Route::get('/{programSlug}', 'SyllabusController@getFaculties')->name('program');
    Route::get('/{programSlug}/{facultySlug}', 'SyllabusController@getGrades')->name('faculty');
    Route::get('/{programSlug}/{facultySlug}/{classSlug}', 'SyllabusController@getSubjects')->name('class');

    Route::get('/{programSlug}/{facultySlug}/{classSlug}/{subjectSlug}', 'SyllabusController@getSyllabus')->name('syllabus');


    Route::get('/{programSlug}/{facultySlug}/{classSlug}/{subjectSlug}/{lessonSlug}', 'SyllabusController@getLesson')->name('lesson');

     
    Route::get('/{programSlug}/{facultySlug}/{classSlug}/{subjectSlug}/{lessonSlug}/{noteSlug}', 'SyllabusController@getNote')->name('note');

    // Route::get('/{class}/{subject?}/{unit?}/{lesson?}/{note?}', 'NoteController@index')->name('note');

});