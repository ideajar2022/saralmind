<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Auth\AdminLoginController@login')->name('admin.login');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::get('/institutions', 'DashboardController@institutions')->name('admin.institutions');
	Route::get('/institutions/add', 'DashboardController@institutionsAdd')->name('admin.institutions.add');
	Route::get('/tinymce', function(){
		return view('backend.tinymce.index');
	});

	Route::get('/ckeditor', function(){
		return view('backend.ckeditor.index');
	});

	Route::any('/upload','UploadsController@upload')->name('upload');
	Route::post('/ckeditor-upload','UploadsController@uploadCkeditor')->name('ckeditor.upload');

	Route::get('/admin-user/trash', 'AdminsController@getSoftDeleted')->name('admin-user.trash');
	Route::patch('/admin-user/{id}/restore', 'AdminsController@restore')->name('admin-user.restore');
	Route::delete('/admin-user/{id}/delete', 'AdminsController@permanentDelete')->name('admin-user.permanent-delete');
	
	Route::get('/front-user/trash', 'UsersController@getSoftDeleted')->name('front-user.trash');
	Route::patch('/front-user/{id}/restore', 'UsersController@restore')->name('front-user.restore');
	Route::delete('/front-user/{id}/delete', 'UsersController@permanentDelete')->name('front-user.permanent-delete');

	Route::get('/premium-users', 'UsersController@showPremiumUsers')->name('view-premium-users');

	Route::get('/module/trash', 'ModulesController@getSoftDeleted')->name('module.trash');
	Route::patch('/module/{id}/restore', 'ModulesController@restore')->name('module.restore');
	Route::delete('/module/{id}/delete', 'ModulesController@permanentDelete')->name('module.permanent-delete');

	Route::get('/permission/trash', 'PermissionsController@getSoftDeleted')->name('permission.trash');
	Route::patch('/permission/{id}/restore', 'PermissionsController@restore')->name('permission.restore');
	Route::delete('/permission/{id}/delete', 'PermissionsController@permanentDelete')->name('permission.permanent-delete');

	Route::get('/role/trash', 'RolesController@getSoftDeleted')->name('role.trash');
	Route::patch('/role/{id}/restore', 'RolesController@restore')->name('role.restore');
	Route::delete('/role/{id}/delete', 'RolesController@permanentDelete')->name('role.permanent-delete');

	Route::get('/course-timeline/trash', 'CourseTimelineController@getSoftDeleted')->name('course-timeline.trash');
	Route::patch('/course-timeline/{id}/restore', 'CourseTimelineController@restore')->name('course-timeline.restore');
	Route::delete('/course-timeline/{id}/delete', 'CourseTimelineController@permanentDelete')->name('course-timeline.permanent-delete');

	Route::get('/course-timeline-child/trash', 'CourseTimelineChildrenController@getSoftDeleted')->name('course-timeline-child.trash');
	Route::patch('/course-timeline-child/{id}/restore', 'CourseTimelineChildrenController@restore')->name('course-timeline-child.restore');
	Route::delete('/course-timeline-child/{id}/delete', 'CourseTimelineChildrenController@permanentDelete')->name('course-timeline-child.permanent-delete');
	
	Route::get('/course-timeline/trash', 'CourseTimelineController@getSoftDeleted')->name('course-timeline.trash');
	Route::patch('/course-timeline/{id}/restore', 'CourseTimelineController@restore')->name('course-timeline.restore');
	Route::delete('/course-timeline/{id}/delete', 'CourseTimelineController@permanentDelete')->name('course-timeline.permanent-delete');

	Route::get('/program/trash', 'ProgramsController@getSoftDeleted')->name('program.trash');
	Route::patch('/program/{id}/restore', 'ProgramsController@restore')->name('program.restore');
	Route::delete('/program/{id}/delete', 'ProgramsController@permanentDelete')->name('program.permanent-delete');

	Route::get('/faculty/trash', 'FacultiesController@getSoftDeleted')->name('faculty.trash');
	Route::patch('/faculty/{id}/restore', 'FacultiesController@restore')->name('faculty.restore');
	Route::delete('/faculty/{id}/delete', 'FacultiesController@permanentDelete')->name('faculty.permanent-delete');

	Route::get('/grade/trash', 'GradesController@getSoftDeleted')->name('grade.trash');
	Route::patch('/grade/{id}/restore', 'GradesController@restore')->name('grade.restore');
	Route::delete('/grade/{id}/delete', 'GradesController@permanentDelete')->name('grade.permanent-delete');

	Route::get('/subject/trash', 'SubjectsController@getSoftDeleted')->name('subject.trash');
	Route::patch('/subject/{id}/restore', 'SubjectsController@restore')->name('subject.restore');
	Route::delete('/subject/{id}/delete', 'SubjectsController@permanentDelete')->name('subject.permanent-delete');
	Route::get('/subject/import', 'SubjectsController@getImport')->name('subject.import');	
	Route::post('/subject/import', 'SubjectsController@import')->name('subject.import');

	Route::get('/unit/trash', 'UnitsController@getSoftDeleted')->name('unit.trash');
	Route::patch('/unit/{id}/restore', 'UnitsController@restore')->name('unit.restore');
	Route::delete('/unit/{id}/delete', 'UnitsController@permanentDelete')->name('unit.permanent-delete');

	Route::get('/lesson/trash', 'LessonsController@getSoftDeleted')->name('lesson.trash');
	Route::patch('/lesson/{id}/restore', 'LessonsController@restore')->name('lesson.restore');
	Route::delete('/lesson/{id}/delete', 'LessonsController@permanentDelete')->name('lesson.permanent-delete');
	Route::get('/lesson/import', 'LessonsController@getImport')->name('lesson.import');
	Route::post('/lesson/import', 'LessonsController@import')->name('lesson.import');

	Route::get('/client/trash', 'CLientsController@getSoftDeleted')->name('client.trash');
	Route::patch('/client/{id}/restore', 'CLientsController@restore')->name('client.restore');
	Route::delete('/client/{id}/delete', 'CLientsController@permanentDelete')->name('client.permanent-delete');	

	Route::get('/advertisement/trash', 'AdvertisementsController@getSoftDeleted')->name('advertisement.trash');
	Route::patch('/advertisement/{id}/restore', 'AdvertisementsController@restore')->name('advertisement.restore');
	Route::delete('/advertisement/{id}/delete', 'AdvertisementsController@permanentDelete')->name('advertisement.permanent-delete');

	Route::get('/note/sync', 'NotesController@sync')->name('note.sync');
	Route::get('/note/trash', 'NotesController@getSoftDeleted')->name('note.trash');
	Route::patch('/note/{id}/restore', 'NotesController@restore')->name('note.restore');
	Route::delete('/note/{id}/delete', 'NotesController@permanentDelete')->name('note.permanent-delete');
	Route::get('/note/import', 'NotesController@getImport')->name('note.import');	
	Route::post('/note/import', 'NotesController@import')->name('note.import');
	Route::get('/note/viewUpdated', 'NotesController@viewUpdated')->name('note.viewUpdated');


	Route::get('/video/trash', 'NoteVideosController@getSoftDeleted')->name('video.trash');
	Route::patch('/video/{id}/restore', 'NoteVideosController@restore')->name('video.restore');
	Route::delete('/video/{id}/delete', 'NoteVideosController@permanentDelete')->name('video.permanent-delete');

	Route::get('/exercise/trash', 'NoteSubjectiveQuestionsController@getSoftDeleted')->name('exercise.trash');
	Route::patch('/exercise/{id}/restore', 'NoteSubjectiveQuestionsController@restore')->name('exercise.restore');
	Route::delete('/exercise/{id}/delete', 'NoteSubjectiveQuestionsController@permanentDelete')->name('exercise.permanent-delete');
	// Route::get('/exercise/import', 'NoteSubjectiveQuestionsController@getImport')->name('exercise.import');
	// Route::post('/exercise/import', 'NoteSubjectiveQuestionsController@import')->name('exercise.import');

	Route::get('/exercise/import', 'NoteSubjectiveQuestionsController@getImport')->name('exercise.import');
	Route::post('/exercise/import', 'NoteSubjectiveQuestionsController@import')->name('exercise.import');
	Route::get('/exercise/viewUpdated', 'NoteSubjectiveQuestionsController@viewUpdated')->name('exercise.viewUpdated');


	Route::get('/mcq/trash', 'NoteObjectiveQuestionsController@getSoftDeleted')->name('mcq.trash');
	Route::patch('/mcq/{id}/restore', 'NoteObjectiveQuestionsController@restore')->name('mcq.restore');
	Route::delete('/mcq/{id}/delete', 'NoteObjectiveQuestionsController@permanentDelete')->name('mcq.permanent-delete');
	Route::get('/mcq/import', 'NoteObjectiveQuestionsController@getImport')->name('mcq.import');
	Route::post('/mcq/import', 'NoteObjectiveQuestionsController@import')->name('mcq.import');


	Route::get('/nnc/trash', 'NNCController@getSoftDeleted')->name('nnc.trash');
	Route::patch('/nnc/{id}/restore', 'NNCController@restore')->name('nnc.restore');
	Route::delete('/nnc/{id}/delete', 'NNCController@permanentDelete')->name('nnc.permanent-delete');
	Route::get('/nnc/import', 'NNCController@getImport')->name('nnc.import');
	Route::post('/nnc/import', 'NNCController@import')->name('nnc.import');

	// Show NNC results in backend from left sidebar menu
	Route::get('/nnc/result', 'NNCController@showResult')->name('nnc.result');
	

	Route::get('/glossary/trash', 'GlossariesController@getSoftDeleted')->name('glossary.trash');
	Route::patch('/glossary/{id}/restore', 'GlossariesController@restore')->name('glossary.restore');
	Route::delete('/glossary/{id}/delete', 'GlossariesController@permanentDelete')->name('glossary.permanent-delete');
	Route::get('/glossary/import', 'GlossariesController@getImport')->name('glossary.import');
	Route::post('/glossary/import', 'GlossariesController@import')->name('glossary.import');

	Route::get('/blog-category/trash', 'BlogCategoriesController@getSoftDeleted')->name('blog-category.trash');
	Route::patch('/blog-category/{id}/restore', 'BlogCategoriesController@restore')->name('blog-category.restore');
	Route::delete('/blog-category/{id}/delete', 'BlogCategoriesController@permanentDelete')->name('blog-category.permanent-delete');

	Route::get('/blog/trash', 'BlogsController@getSoftDeleted')->name('blog.trash');
	Route::patch('/blog/{id}/restore', 'BlogsController@restore')->name('blog.restore');
	Route::delete('/blog/{id}/delete', 'BlogsController@permanentDelete')->name('blog.permanent-delete');


	Route::get('/product/trash', 'ProductsController@getSoftDeleted')->name('product.trash');
	Route::patch('/product/{id}/restore', 'ProductsController@restore')->name('product.restore');
	Route::delete('/product/{id}/delete', 'ProductsController@permanentDelete')->name('product.permanent-delete');

	Route::get('/testimonial/trash', 'TestimonialsController@getSoftDeleted')->name('testimonial.trash');
	Route::patch('/testimonial/{id}/restore', 'TestimonialsController@restore')->name('testimonial.restore');
	Route::delete('/testimonial/{id}/delete', 'TestimonialsController@permanentDelete')->name('testimonial.permanent-delete');

	Route::get('/media-feed/trash', 'MediaFeedsController@getSoftDeleted')->name('media-feed.trash');
	Route::patch('/media-feed/{id}/restore', 'MediaFeedsController@restore')->name('media-feed.restore');
	Route::delete('/media-feed/{id}/delete', 'MediaFeedsController@permanentDelete')->name('media-feed.permanent-delete');

	Route::get('/award/trash', 'AwardsController@getSoftDeleted')->name('award.trash');
	Route::patch('/award/{id}/restore', 'AwardsController@restore')->name('award.restore');
	Route::delete('/award/{id}/delete', 'AwardsController@permanentDelete')->name('award.permanent-delete');

	Route::get('/partner/trash', 'PartnersController@getSoftDeleted')->name('partner.trash');
	Route::patch('/partner/{id}/restore', 'PartnersController@restore')->name('partner.restore');
	Route::delete('/partner/{id}/delete', 'PartnersController@permanentDelete')->name('partner.permanent-delete');

	Route::patch('/note/{id}/auto-save', 'NotesController@autoSave')->name('note.auto-save');
	
	Route::get('/cache/category', 'CacheController@setCategoryCache')->name('cache.category');
	Route::get('/cache/note-sidebar', 'CacheController@setNotesSidebarCache')->name('cache.note-sidebar');
	Route::get('/cache/lesson-sidebar', 'CacheController@setLessonsSidebarCache')->name('cache.lesson-sidebar');
	Route::get('/cache/tooltip', 'CacheController@setTooltipCache')->name('cache.tooltip');
	Route::get('/cache/profession-modal', 'CacheController@setProfessionModalCache')->name('cache.profession-modal');
	Route::get('/cache/blog-category-sidebar', 'CacheController@setBlogCategorySidebarCache')->name('cache.blog-category-sidebar');
	Route::get('/cache/404', 'CacheController@setPageNotFoundCache')->name('cache.page-not-found');
	Route::resources([
		'advertisement' =>'AdvertisementsController',
		'client' 		=>'ClientsController',
		'module' 		=>'ModulesController',
		'permission' 	=>'PermissionsController',
		'role' 			=>'RolesController',
		'course-timeline' 	=>'CourseTimelineController',
		'course-timeline-child' 	=>'CourseTimelineChildrenController',
		'program' 		=>'ProgramsController',
		'faculty' 		=>'FacultiesController',
		'grade' 		=>'GradesController',
		'subject' 		=>'SubjectsController',
		'unit' 			=>'UnitsController',
		'lesson' 		=>'LessonsController',
		'note' 			=>'NotesController',
		'video' 		=>'NoteVideosController',
		'exercise' 		=>'NoteSubjectiveQuestionsController',
		'mcq' 			=>'NoteObjectiveQuestionsController',
		'nnc' 			=>'NNCController',
		'comment' 		=>'NoteCommentsController',
		'glossary' 		=>'GlossariesController',
		'blog-category'	=>'BlogCategoriesController',
		'blog' 			=>'BlogsController',
		'bug' 			=>'BugsController',
		'admin-user' 	=>'AdminsController',
		'front-user' 	=>'UsersController',
		'product' 		=>'ProductsController',
		'testimonial'	=>'TestimonialsController',
		'media-feed'	=>'MediaFeedsController',
		'award'			=>'AwardsController',
		'partner'		=>'PartnersController',
		'search-term'	=>'SearchTermsController',
		'subscriber'	=>'SubscribersController',
		'cache'			=>'CacheController',
	]);

	Route::get('/inquiry', 'InquiriesController@index')->name('inquiry.index');
	
	Route::get('/program/{id}/faculties', 'ProgramsController@getFacultiesByProgram');
	Route::get('/faculty/{id}/grades', 'FacultiesController@getGradesByFaculty');
	Route::get('/grade/{id}/subjects', 'GradesController@getSubjectsByGrade');
	Route::get('/subject/{id}/units', 'SubjectsController@getUnitsBySubject');
	Route::get('/subject/{id}/lessons', 'SubjectsController@getLessonsBySubject');
	Route::get('/unit/{id}/lessons', 'UnitsController@getLessonsByUnit');
	Route::get('/lesson/{id}/notes', 'LessonsController@getNotesByLesson');
	Route::get('/study-period/{id}/children', 'CourseTimelineController@getCourseTimelineChildrenByParent');
	
});










//Route::get('/admin/gereral-fields', 'Admin\DashboardController@general_fields')->name('admin.general_fields');

Route::get('/roles', 'Backend\PermissionsController@index');
