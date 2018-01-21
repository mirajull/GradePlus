<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('startPage');
});

Route::get('/welcome',['middleware' => ['isAdmin'], function () {
    return view('welcome');
}]);

Route::get('/addMembers',['middleware' => ['isAdmin'], function () {
    return view('addMembers');
}]);

Route::get('/addCourses','NewController@addcourse');

Route::POST('/addCourses', 'NewController@courseStore');

Route::get('/about', ['middleware' => ['isAdmin'], function () {
    return view('about');
}]);

Route::get('/contact',['middleware' => ['isAdmin'], function () {
    return view('contact');
}]);

Route::get('/routine',['middleware' => ['isAdmin'], function () {
    return view('routine');
}]);

Route::get('/exam', 'CourseController@manage');


Route::get('/sheet', ['middleware' => ['isAdmin'], function () {
    return view('sheet');
}]);

Route::get('/result', ['middleware' => ['isAdmin'], function () {
    return view('result');
}]);

Route::get('/register', ['middleware' => ['isAdmin'], function () {
    return view('register');
}]);

Route::get('/login', ['middleware' => ['isAdmin'], function () {
    return view('home');
}]);

Route::get('/exam/marks/{cid}/{sid}', 'NewController@courseInfo');

Route::get('/exam/marks/{cid}/{sid}/grade', 'NewController@gradeCalculate');

Route::get('/exam/marks/{cid}/{sid}/instructor', 'NewController@addInstructor');

Route::get('/exam/marks/{cid}/{sid}/addStudent', 'NewController@addStudent');

Route::get('/exam/marks/{cid}/{sid}/addLink', 'NewController@addLink');

Route::POST('/exam/marks/{cid}/{sid}/addStudent/store', 'NewController@addStudentStore');

Route::POST('/exam/marks/{cid}/{sid}/addLink/store', 'NewController@addLinkStore');

Route::POST('/exam/marks/{cid}/{sid}/gradeshow', 'NewController@gradeShow');

Route::get('/exam/marks/{cid}/{sid}/{tid}', 'NewController@markInfo');

Route::POST('/exam/marks/{cid}/{sid}/{tid}/details','NewController@store');

Route::POST('/sheet/gradeshow','NewController@gradeshowstudent');

Route::get('/sheet/gradeshow2/{cid}/{sid}','NewController@gradeshow2student');

Route::POST('/sheet/gpashow','NewController@gpashowstudent');

Route::POST('/addMembers','NewController@playstore');




Route::auth();

Route::get('/home', 'HomeController@index');

//Route::get('/exam/301', 'NewController@studentInfo');
//Route::get('/exam/313', 'NewController@studentInfo1');
//Route::get('/exam/315', 'NewController@studentInfo2');
//Route::get('/exam/317', 'NewController@studentInfo3');
//Route::get('/exam/321', 'NewController@studentInfo4');

//Route::POST('/exam/abc','NewController@store');

Route::POST('/exam','CourseController@store');

Route::POST('/exam/instructor/{cid}/{sid}/zero','InstructorController@store');

Route::POST('/exam/instructor/{cid}/{sid}/more','InstructorMoreController@store');

Route::resource('/new','NewController');

Route::get('/insert', function () {
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Anik Sarker', 1405001]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Md. Masum Mushfiq', 1405002]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Shehab Sarar Ahmed', 1405003]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Tahmid Hasan', 1405004]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Nayeem Hasan Anik', 1405005]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Anindya Biswas', 1405006]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Rifat Rahman', 1405007]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Arup Barua', 1405008]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Makhdum Ahsan Rupak', 1405009]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Farbin Fayza', 1405010]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Aaiyeesha Mostak', 1405011]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Sheikh Abir Hasan', 1405012]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Ali Haisam Muhammad Rafid', 1405013]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Gazi Abdur Rakib', 1405014]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Md. Toufikuzzaman', 1405015]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Sadik Ahammed Siddique', 1405016]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Minhazur Rahman', 1405017]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Md. Farhan Hasin', 1405018]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Zaara Tasnim Rifat', 1405019]);
//    DB::insert('insert into students(student_name,student_id) values (?, ?)', ['Syed Md. Mukit Rashid', 1405020]);
//
//    DB::insert('insert into teachers(teacher_name,teacher_id) values (?, ?)', ['Azad Salam', 1]);
//    DB::insert('insert into teachers(teacher_name,teacher_id) values (?, ?)', ['Adiba Sanjana Semonti', 2]);
//    DB::insert('insert into teachers(teacher_name,teacher_id) values (?, ?)', ['Abu Wasif', 3]);
//    DB::insert('insert into teachers(teacher_name,teacher_id) values (?, ?)', ['Madhusudan Basak', 4]);
//    DB::insert('insert into teachers(teacher_name,teacher_id) values (?, ?)', ['Tarikul Islam Papon', 5]);
//
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [1,'term_final']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [2,'ct']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [3,'online']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [4,'offline']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [5,'lab_performance']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [6,'viva']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [7,'presentation']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [8,'quiz']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [9,'project']);
//    DB::insert('insert into examtype(exam_id,exam_type) values (?, ?)', [10,'attendance']);
//    DB::insert('insert into courses(course_name,course_id,credit) values (?, ?, ?)', ['Concrete Math','CSE301', 3]);
//    DB::insert('insert into courses(course_name,course_id,credit) values (?, ?, ?)', ['Operatting System','CSE313', 3]);
//    DB::insert('insert into courses(course_name,course_id,credit) values (?, ?, ?)', ['Micro processor','CSE315', 3]);
//    DB::insert('insert into courses(course_name,course_id,credit) values (?, ?, ?)', ['Software Development','CSE 324', 0.75]);
//    DB::insert('insert into courses(course_name,course_id,credit) values (?, ?, ?)', ['OS sessional','CSE 314', 1.5]);

//    DB::insert('insert into sessions(session_id,time_span) values (?, ?)', ['2015-01','January 2015']);
//    DB::insert('insert into sessions(session_id,time_span) values (?, ?)', ['2015-02','August 2015']);
//    DB::insert('insert into sessions(session_id,time_span) values (?, ?)', ['2016-01','January 2016']);
//    DB::insert('insert into sessions(session_id,time_span) values (?, ?)', ['2016-02','August 2016']);
//    DB::insert('insert into sessions(session_id,time_span) values (?, ?)', ['2017-01','January 2017']);
//    DB::insert('insert into sessions(session_id,time_span) values (?, ?)', ['2017-02','August 2017']);

//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE301',1]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE301',10]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE301',2]);
//
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE313',1]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE313',10]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE313',2]);
//
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE315',1]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE315',10]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE315',2]);
//
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE324',7]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE324',9]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE324',10]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE324',8]);
//
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE314',3]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE314',4]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE314',8]);
//    DB::insert('insert into coursesExamType(course_id,exam_id) values (?, ?)', ['CSE314',10]);

//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3012017-02', 1405001]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3142017-02', 1405002]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3142017-02', 1405003]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3012017-02', 1405004]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3012017-02', 1405005]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3242017-02', 1405006]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3012017-02', 1405007]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3242017-02', 1405008]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3012017-02', 1405009]);
//    DB::insert('insert into enrollment(offer_id,student_id) values (?, ?)', ['CSE3012017-02', 1405010]);

});



