<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/tktlist',[TicketController::class,'list'])->name('tickets');
// Route::get('/add',[TicketController::class,'index'])->name('add.tkt');
// Route::post('/addtkt',[TicketController::class,'addtkt'])->name('store.tkt');

// Route::get('/edit/{id}',[TicketController::class,'edit'])->name('edit.tkt');
// Route::post('/update',[TicketController::class,'update'])->name('update.tkt');

// Route::get('/deletetkt/{id}',[TicketController::class,'delete'])->name('delete.category');

//AuthController
// Route::get('/',[AuthController::class,'index'])->name('admin.login');
// Route::post('admin/log',[AuthController::class,'login'])->name('admin.post');
// Route::get('admin/logout',[AuthController::class,'logout'])->name('admin.logout');
// Route::get('admin/registration',[AuthController::class,'adminregistration'])->name('admin.regis');
// Route::post('admin/createRegs',[AuthController::class,'createregs'])->name('create.regs');


//Authentication Controller
Route::get('/',[AuthenticationController::class,'role'])->name('role');
Route::get('/role/{page}',[AuthenticationController::class,'getpage'])->name('load.page');
Route::get('/login',[AuthenticationController::class,'login'])->name('login');
Route::get('/register',[AuthenticationController::class,'register'])->name('register');
Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');
Route::post('/accountantregister',[AuthenticationController::class,'accountantregister'])->name('accountant.register');

//adminlogin,store,register
Route::get('/adminlogin', [AuthenticationController::class, 'adminlogin'])->name('admin.login');
Route::post('/storeadminlogin', [AuthenticationController::class, 'store_admin'])->name('storelogin.admin');
Route::get('/adminregister',[AuthenticationController::class,'adminregister'])->name('admin.register');
Route::post('/parentregister',[AuthenticationController::class,'parentregister'])->name('parent.register');

//InstituteController
//add:
Route::get('/addinstitute/{id}', [InstituteController::class, 'addinstitute'])->name('add.institute');
Route::post('/institutestore', [InstituteController::class, 'institutestore'])->name('store.institute');
Route::get('/indexadmin', [InstituteController::class, 'indexadmin'])->name('index.institute');

//edit,update,delete:
Route::get('/editinstitute/{id}',[InstituteController::class,'editinstitute'])->name('edit.institute');
Route::get('/updateinstitute/{id}',[InstituteController::class,'updateinstitute'])->name('update.institute');
Route::get('/deleteinstitute/{id}',[InstituteController::class,'deleteinstitute'])->name('delete.institute');
Route::get('/instituteview/{id}', [InstituteController::class, 'instituteview'])->name('institute.view');

//teacherlogin,store,register
Route::get('/teacherlogin',[AuthenticationController::class,'teacherlogin'])->name('teacher.login');
Route::post('/teacherstorelogin',[AuthController::class,'teacherstorelogin'])->name('teacherstore.login');
Route::get('/teacherregister',[AuthenticationController::class,'teacherregister'])->name('teacher.register');
//parent login,store,register
Route::post('/parentregister',[AuthenticationController::class,'parentregister'])->name('parent.register');
//librarian login,store,register
Route::post('/librarianregister',[AuthenticationController::class,'librarianregister'])->name('librarian.register');

//dashboards
Route::get('/admin/dashboard/{id}', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
Route::get('/parent/dashboard/{id}', [AuthController::class, 'parentdashboard'])->name('parent.dashboard');
Route::get('/teacher/dashboard/{id}', [AdminController::class, 'teacherdashboard'])->name('teacher.dashboard');
Route::get('/student/dashboard', [StudentController::class, 'studentdashboard'])->name('student.dashboard');
Route::get('/accountant/dashboard/{id}', [AccountantController::class, 'accountantdashboard'])->name('accountant.dashboard');
Route::get('/librarian/dashboard/{id}', [LibrarianController::class, 'librariandashboard'])->name('librarian.dashboard');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//TeacherController
//add:
Route::get('/addteacher/{id?}',[TeacherController::class,'addteacher'])->name('add.teacher');
Route::post('/storeteacher',[TeacherController::class,'storeteacher'])->name('store.teacher');
//list,edit,delete:
Route::get('/indexteacher', [TeacherController::class, 'indexteacher'])->name('index.teacher');
Route::get('/editteacher/{id}',[TeacherController::class,'editteacher'])->name('edit.teacher');
Route::get('/updateteacher/{id}',[TeacherController::class,'updateteacher'])->name('update.teacher');
Route::get('/deleteteacher/{id}',[TeacherController::class,'deleteteacher'])->name('delete.teacher');
Route::get('/teacherview/{id}', [TeacherController::class, 'teacherview'])->name('teacher.view');

//StudentController
//add,login,store forms:
Route::get('/addstudent/{id?}',[StudentController::class,'addstudent'])->name('add.student');
Route::post('/storestudent',[StudentController::class,'studentstore'])->name('store.student');
Route::get('/studentlogin',[StudentController::class,'studentlogin'])->name('student.login');
Route::get('/studentregister',[AuthenticationController::class,'studentregister'])->name('student.register');
Route::post('/store/studentlogin', [StudentController::class, 'storestudentlogin'])->name('store.student.login');
//index,edit,delete forms for student
Route::get('/indexstudent', [StudentController::class, 'indexstudent'])->name('index.student');

//ParentController
Route::get('/parentlogin',[ParentController::class,'parentlogin'])->name('parent.login');
Route::post('/storeparentlogin', [ParentController::class, 'storeparentlogin'])->name('storelogin.parent');
Route::get('/addparent/{id?}',[ParentController::class,'addparent'])->name('add.parent');
Route::post('/storeparent',[ParentController::class,'parentstore'])->name('store.parent');
Route::get('/indexparent', [ParentController::class, 'indexparent'])->name('index.parent');

//AccountantController
Route::get('/accountantlogin',[AccountantController::class,'accountantlogin'])->name('accountant.login');
Route::get('/addaccountant',[AccountantController::class,'addaccountant'])->name('add.accountant');
Route::post('/storeaccountantlogin', [AccountantController::class, 'storeaccountantlogin'])->name('store.accountantlogin');
Route::post('/storeaccountant', [AccountantController::class, 'storeaccountant'])->name('store.accountant');

//LibrarianController
Route::get('/librarianlogin',[LibrarianController::class,'librarianlogin'])->name('librarian.login');
Route::get('/addlibrarian',[LibrarianController::class,'addlibrarian'])->name('add.librarian');
Route::post('/storestudentlogin', [LibrarianController::class, 'storelibrarianlogin'])->name('store.librarianlogin');
Route::post('/storelibrarian', [LibrarianController::class, 'storelibrarian'])->name('store.librarian');

