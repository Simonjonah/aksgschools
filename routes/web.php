<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AcademicsessionController;
use App\Http\Controllers\MainsliderController;
use App\Http\Controllers\AssignsubjectController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DatasubscriptionController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AlmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudycenterController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CableController;
use App\Http\Controllers\ClassactivityController;
use App\Http\Controllers\ClassnameController;
// use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LessonnoteController;
// use App\Http\Controllers\MainsliderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PsycomotorController;
// use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
// use App\Http\Controllers\SchoolfeeController;
use App\Models\Schoolnew;
use App\Http\Controllers\SchoolnewsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentdomainController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherassignController;
use App\Http\Controllers\TeacherdomainController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TestimonyController;
// use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ElectricityController;
use App\Http\Controllers\ScrachcardController;
use App\Http\Controllers\VtuController;
use App\Models\Academicsession;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api', function () {

    Artisan::call('route:list --json');

    $routes = json_decode(Artisan::output(), true);

    $apiRoutes = array_filter($routes, function ($route) {
        return str_starts_with($route['uri'], 'api/');
    });

    return view('api-endpoints', [
        'routes' => $apiRoutes
    ]);

});

Auth::routes();
Route::get('technicalprincipals/{ref_no1}', [UserController::class, 'technicalprincipals'])->name('technicalprincipals');

Route::post('/createteacherpersonal/{ref_no}', [UserController::class, 'createteacherpersonal'])->name('createteacherpersonal');
Route::post('/generateresultPDF', [ResultController::class, 'generateresultPDF'])->name('generateresultPDF');
Route::get('/checkresults', [ResultController::class, 'checkresults'])->name('checkresults');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('schoolsprincipals/{ref_no1}', [UserController::class, 'schoolsprincipals'])->name('schoolsprincipals');
Route::get('schoolsheads/{ref_no1}', [UserController::class, 'schoolsheads'])->name('schoolsheads');
Route::get('registerprincipals/{ref_no1}', [SchoolsController::class, 'registerprincipals'])->name('registerprincipals');
Route::post('creatschools', [SchoolsController::class, 'creatschools'])->name('creatschools');
Route::get('registerteachers/{ref_no}', [UserController::class, 'registerteachers'])->name('registerteachers');

Route::post('/createprincipals2', [UserController::class, 'createprincipals2'])->name('createprincipals2');




Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {

        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/adminregister','dashboard.admin.adminregister')->name('adminregister');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        // Route::post('/adminregister', [UserController::class, 'adminregister'])->name('adminregister');
        Route::get('/teacher/registerteachers/{ref_no}', [UserController::class, 'registerteachers'])->name('registerteachers');

    });
    
    Route::middleware(['auth:web'])->group(function() {
       

        

       
        Route::get('/schooldelete/{ref_no1}', [SchoolsController::class, 'schooldelete'])->name('schooldelete');
        Route::post('/createschool', [UserController::class, 'createschool'])->name('createschool');
        Route::get('/registerssebandsubeb', [UserController::class, 'registerssebandsubeb'])->name('registerssebandsubeb');
        Route::get('/editschooladmin/{slug}', [SchoolsController::class, 'editschooladmin'])->name('editschooladmin');
        Route::put('/updateschooladmin/{slug}', [SchoolsController::class, 'updateschooladmin'])->name('updateschooladmin');
        Route::get('/editviewresultsad/{id}', [ResultController::class, 'editviewresultsad'])->name('editviewresultsad');
        Route::put('/updateheresultadmin/{id}', [ResultController::class, 'updateheresultadmin'])->name('updateheresultadmin');
        Route::get('/lgastudents', [LgaController::class, 'lgastudents'])->name('lgastudents');
        Route::get('/viewlgastudentsbyadmins/{lga}', [LgaController::class, 'viewlgastudentsbyadmins'])->name('viewlgastudentsbyadmins');
        Route::get('/viewschoolsclassesbyadminstudent/{ref_no1}', [SchoolsController::class, 'viewschoolsclassesbyadminstudent'])->name('viewschoolsclassesbyadminstudent');
        Route::get('/viewassignedteachersubject/{connect}', [SubjectController::class, 'viewassignedteachersubject'])->name('viewassignedteachersubject');
        Route::get('/editassignesubjects/{ref_no1}', [AssignsubjectController::class, 'editassignesubjects'])->name('editassignesubjects');
        Route::put('/updateassignsubject/{ref_no1}', [AssignsubjectController::class, 'updateassignsubject'])->name('updateassignsubject');
        Route::get('/deleteassignsubjects/{ref_no1}', [AssignsubjectController::class, 'deleteassignsubjects'])->name('deleteassignsubjects');
        Route::get('/viewassignsubjectsteachers', [AssignsubjectController::class, 'viewassignsubjectsteachers'])->name('viewassignsubjectsteachers');
        Route::get('/assinjuniorsubjectsview', [SubjectController::class, 'assinjuniorsubjectsview'])->name('assinjuniorsubjectsview');
        
        Route::get('viewtechnicalschools/{lga}', [LgaController::class, 'viewtechnicalschools'])->name('viewtechnicalschools');
        Route::get('addsecondaryClasses', [ClassnameController::class, 'addsecondaryClasses'])->name('addsecondaryClasses');
        Route::get('viewtechprincipal', [UserController::class, 'viewtechprincipal'])->name('viewtechprincipal');
       // Route::get('viewcompetitions', [CompetitionController::class, 'viewcompetitions'])->name('viewcompetitions');
        Route::get('viewschoolnews', [SchoolnewsController::class, 'viewschoolnews'])->name('viewschoolnews');
        Route::get('schoolsuspendinfo/{ref_no}', [SchoolnewsController::class, 'schoolsuspendinfo'])->name('schoolsuspendinfo');
        Route::get('rejectschinfo', [SchoolnewsController::class, 'rejectschinfo'])->name('rejectschinfo');
        Route::get('suspendschinfo', [SchoolnewsController::class, 'suspendschinfo'])->name('suspendschinfo');
        Route::get('addmainslider', [MainsliderController::class, 'addmainslider'])->name('addmainslider');
        Route::post('createteslider', [MainsliderController::class, 'createteslider'])->name('createteslider');
        Route::get('viewmainslider', [MainsliderController::class, 'viewmainslider'])->name('viewmainslider');
        Route::get('slideredit/{ref_no}', [MainsliderController::class, 'slideredit'])->name('slideredit');
        Route::put('updateslider/{ref_no}', [MainsliderController::class, 'updateslider'])->name('updateslider');
        Route::get('slideredelete/{ref_no}', [MainsliderController::class, 'slideredelete'])->name('slideredelete');
        Route::get('technicalteachersbylgaadmin/{lga}', [LgaController::class, 'technicalteachersbylgaadmin'])->name('technicalteachersbylgaadmin');
        Route::get('viewtechnicalschoolsresultsbyadmins/{lga}', [LgaController::class, 'viewtechnicalschoolsresultsbyadmins'])->name('viewtechnicalschoolsresultsbyadmins');
        
      
        Route::get('addtechClasses', [ClassnameController::class, 'addtechClasses'])->name('addtechClasses');
        Route::get('approveschinfo', [SchoolnewsController::class, 'approveschinfo'])->name('approveschinfo');
        Route::get('schoolrejectinfo/{ref_no1}', [SchoolnewsController::class, 'schoolrejectinfo'])->name('schoolrejectinfo');
        Route::get('schoolapproveinfo/{ref_no1}', [SchoolnewsController::class, 'schoolapproveinfo'])->name('schoolapproveinfo');
        Route::put('editschoolnews/{ref_no1}', [SchoolnewsController::class, 'editschoolnews'])->name('editschoolnews');
        Route::get('editschoolinfo/{ref_no1}', [SchoolnewsController::class, 'editschoolinfo'])->name('editschoolinfo');
        Route::get('viewschoolinfo/{ref_no1}', [SchoolnewsController::class, 'viewschoolinfo'])->name('viewschoolinfo');
        Route::get('viewschoolinforeview', [SchoolnewsController::class, 'viewschoolinforeview'])->name('viewschoolinforeview');
        Route::get('viewschoolpins/{user_id}', [ResultController::class, 'viewschoolpins'])->name('viewschoolpins');
        Route::post('searchpins', [ResultController::class, 'searchpins'])->name('searchpins');
        Route::post('searchpinsforclass', [ResultController::class, 'searchpinsforclass'])->name('searchpinsforclass');
        Route::get('viewpins', [ResultController::class, 'viewpins'])->name('viewpins');
        Route::get('adminprogress', [StudentController::class, 'adminprogress'])->name('adminprogress');
        Route::get('viewsuspended', [UserController::class, 'viewsuspended'])->name('viewsuspended');
        Route::get('visitedelete/{id}', [VisitController::class, 'visitedelete'])->name('visitedelete');
        Route::get('viewvisit', [VisitController::class, 'viewvisit'])->name('viewvisit');
        Route::get('addparent', [UserController::class, 'addparent'])->name('addparent');
        Route::get('viewcontact', [ContactController::class, 'viewcontact'])->name('viewcontact');
        Route::get('addlga', [LgaController::class, 'addlga'])->name('addlga');
        Route::post('createlga', [LgaController::class, 'createlga'])->name('createlga');
        Route::put('changgeteacherclass/{id}', [UserController::class, 'changgeteacherclass'])->name('changgeteacherclass');
        Route::get('changeclasses/{ref_no}', [UserController::class, 'changeclasses'])->name('changeclasses');
        Route::get('viewlga', [LgaController::class, 'viewlga'])->name('viewlga');
        Route::get('editlga/{id}', [LgaController::class, 'editlga'])->name('editlga');
        Route::get('deletelga/{id}', [LgaController::class, 'deletelga'])->name('deletelga');
        Route::put('updatelga/{id}', [LgaController::class, 'updatelga'])->name('updatelga');
        Route::get('viewperlgaschools', [LgaController::class, 'viewperlgaschools'])->name('viewperlgaschools');
        Route::get('viewsinglelgasschool/{lga}', [LgaController::class, 'viewsinglelgasschool'])->name('viewsinglelgasschool');
        Route::get('viewprimariesschools/{lga}', [LgaController::class, 'viewprimariesschools'])->name('viewprimariesschools');
        Route::get('viewsecondariesschools/{lga}', [LgaController::class, 'viewsecondariesschools'])->name('viewsecondariesschools');
        Route::get('viewprimaryschoolsresultsbyadmins/{lga}', [LgaController::class, 'viewprimaryschoolsresultsbyadmins'])->name('viewprimaryschoolsresultsbyadmins');
        Route::get('viewsecondaryschoolsresultsbyadmin/{lga}', [LgaController::class, 'viewsecondaryschoolsresultsbyadmin'])->name('viewsecondaryschoolsresultsbyadmin');
        Route::get('sectionboard', [UserController::class, 'sectionboard'])->name('sectionboard');
        Route::get('viewschoolsclassesbyadmin/{ref_no1}', [SchoolsController::class, 'viewschoolsclassesbyadmin'])->name('viewschoolsclassesbyadmin');
        Route::get('viewresultbygenadmin/{classname}/{slug}', [ClassnameController::class, 'viewresultbygenadmin'])->name('viewresultbygenadmin');
        Route::get('viewallstudentsadmin/{classname}/{slug}', [ClassnameController::class, 'viewallstudentsadmin'])->name('viewallstudentsadmin');
        Route::get('viewsrejectedstudentsad/{slug}', [StudentController::class, 'viewsrejectedstudentsad'])->name('viewsrejectedstudentsad');
        Route::get('viewsuspendedstudentsad/{slug}', [StudentController::class, 'viewsuspendedstudentsad'])->name('viewsuspendedstudentsad');
        Route::get('viewschoolsadmittedstudentad/{slug}', [StudentController::class, 'viewschoolsadmittedstudentad'])->name('viewschoolsadmittedstudentad');
        Route::get('analyseresult/{slug}', [ResultController::class, 'analyseresult'])->name('analyseresult');
        
        Route::get('academedelete/{id}', [AcademicsessionController::class, 'academedelete'])->name('academedelete');
        Route::put('updatesession/{id}', [AcademicsessionController::class, 'updatesession'])->name('updatesession');
        Route::get('academedit/{id}', [AcademicsessionController::class, 'academedit'])->name('academedit');
        Route::get('viewsession', [AcademicsessionController::class, 'viewsession'])->name('viewsession');
        Route::post('createsession', [AcademicsessionController::class, 'createsession'])->name('createsession');
        Route::get('addsession', [AcademicsessionController::class, 'addsession'])->name('addsession');
        Route::get('studentsubjects/{ref_no}', [UserController::class, 'studentsubjects'])->name('studentsubjects');
        Route::get('abujateachers', [UserController::class, 'abujateachers'])->name('abujateachers');
        Route::get('uyoteachers', [UserController::class, 'uyoteachers'])->name('uyoteachers');
        Route::get('viewteachersubjects/{user_id}', [TeacherassignController::class, 'viewteachersubjects'])->name('viewteachersubjects');
        Route::get('teachertosubjects', [SubjectController::class, 'teachertosubjects'])->name('teachertosubjects');
        Route::post('assignsubjectstoteacher/{id}', [TeacherassignController::class, 'assignsubjectstoteacher'])->name('assignsubjectstoteacher');
        Route::get('assignsubject/{id}', [SubjectController::class, 'assignsubject'])->name('assignsubject');
        Route::get('deletesubject/{id}', [SubjectController::class, 'deletesubject'])->name('deletesubject');
        Route::put('updatesubject/{id}', [SubjectController::class, 'updatesubject'])->name('updatesubject');
        Route::get('editsubject/{id}', [SubjectController::class, 'editsubject'])->name('editsubject');
        Route::get('viewallstudentsadmin/{slug}', [StudentController::class, 'viewallstudentsadmin'])->name('viewallstudentsadmin');
        Route::get('viewresultbylga', [LgaController::class, 'viewresultbylga'])->name('viewresultbylga');
        Route::get('viewlgaresultsbyadmins/{lga}', [LgaController::class, 'viewlgaresultsbyadmins'])->name('viewlgaresultsbyadmins');
        Route::get('allteachers', [UserController::class, 'allteachers'])->name('allteachers');
        Route::get('sackedteachers', [UserController::class, 'sackedteachers'])->name('sackedteachers');
        Route::get('suspendedteachers', [UserController::class, 'suspendedteachers'])->name('suspendedteachers');
        Route::get('nurserysubjects', [SubjectController::class, 'nurserysubjects'])->name('nurserysubjects');
        Route::get('approveteachers', [UserController::class, 'approveteachers'])->name('approveteachers');
        Route::get('teachersprint', [UserController::class, 'teachersprint'])->name('teachersprint');
        Route::get('teacherquery/{ref_no}', [UserController::class, 'teacherquery'])->name('teacherquery');
        Route::get('teachersacked/{ref_no}', [UserController::class, 'teachersacked'])->name('teachersacked');
        Route::get('teachersuspend/{ref_no}', [UserController::class, 'teachersuspend'])->name('teachersuspend');
        Route::get('teacherapprove/{ref_no}', [UserController::class, 'teacherapprove'])->name('teacherapprove');
        Route::put('teacherupdated/{ref_no}', [UserController::class, 'teacherupdated'])->name('teacherupdated');
        Route::get('editteacher/{ref_no}', [UserController::class, 'editteacher'])->name('editteacher');
        Route::get('viewsingleteacher/{ref_no}', [UserController::class, 'viewsingleteacher'])->name('viewsingleteacher');
        Route::get('viewteachers', [UserController::class, 'viewteachers'])->name('viewteachers');
        Route::put('assignteachertoclass/{ref_no}', [UserController::class, 'assignteachertoclass'])->name('assignteachertoclass');
        Route::get('/assignedteacher/{centername}', [UserController::class, 'assignedteacher'])->name('assignedteacher');
        Route::post('printclasses', [UserController::class, 'printclasses'])->name('printclasses');
        Route::get('viewsubject', [SubjectController::class, 'viewsubject'])->name('viewsubject');
        Route::post('createsubject', [SubjectController::class, 'createsubject'])->name('createsubject');
        Route::get('addsubject', [SubjectController::class, 'addsubject'])->name('addsubject');
        Route::get('/classrooms/{name}', [ClassnameController::class, 'classrooms'])->name('classrooms');
        Route::get('/classesdelete/{ref_no}', [ClassnameController::class, 'classesdelete'])->name('classesdelete');
        Route::put('/updateclass/{ref_no}', [ClassnameController::class, 'updateclass'])->name('updateclass');
        Route::get('/editclasses/{ref_no}', [ClassnameController::class, 'editclasses'])->name('editclasses');
        Route::post('/createclasses', [ClassnameController::class, 'createclasses'])->name('createclasses');
        Route::get('/viewclassestables', [ClassnameController::class, 'viewclassestables'])->name('viewclassestables');
        Route::get('/addclass', [ClassnameController::class, 'addclass'])->name('addclass');
        Route::get('/viewschoolstudent/{slug}', [SchoolsController::class, 'viewschoolstudent'])->name('viewschoolstudent');
        Route::post('/searchclass', [StudentController::class, 'searchclass'])->name('searchclass');
        Route::get('/primaryteachers', [UserController::class, 'primaryteachers'])->name('primaryteachers');
        Route::get('/secondaryteachers', [UserController::class, 'secondaryteachers'])->name('secondaryteachers');
        Route::get('/schoolstudents/{user_id}', [StudentController::class, 'schoolstudents'])->name('schoolstudents');
        Route::get('/schoolstudent/{slug}', [SchoolsController::class, 'schoolstudent'])->name('schoolstudent');
        Route::get('/viewresultbyadmins', [ResultController::class, 'viewresultbyadmins'])->name('viewresultbyadmins');
        Route::post('/searchresults', [ResultController::class, 'searchresults'])->name('searchresults');
        Route::post('/searchresultsforclasses', [ResultController::class, 'searchresultsforclasses'])->name('searchresultsforclasses');
        Route::get('/viewapproveresultsbyad', [ResultController::class, 'viewapproveresultsbyad'])->name('viewapproveresultsbyad');
        Route::get('/approveresults/{id}', [ResultController::class, 'approveresults'])->name('approveresults');
        Route::get('/viewallresults', [ResultController::class, 'viewallresults'])->name('viewallresults');
        Route::get('/viewpsycomotor', [DomainController::class, 'viewpsycomotor'])->name('viewpsycomotor');
        Route::get('/schoolspsyco/{id}', [DomainController::class, 'schoolspsyco'])->name('schoolspsyco');
        Route::post('/searchstudentresults', [ResultController::class, 'searchstudentresults'])->name('searchstudentresults');
        Route::get('/addcommentadmin/{id}', [ResultController::class, 'addcommentadmin'])->name('addcommentadmin');
        Route::put('/addcommentsbyadmin/{id}', [ResultController::class, 'addcommentsbyadmin'])->name('addcommentsbyadmin');
        
       
        Route::post('/createam', [TeamController::class, 'createam'])->name('createam');
        Route::get('/addteam', [TeamController::class, 'addteam'])->name('addteam');
        Route::get('/viewteam', [TeamController::class, 'viewteam'])->name('viewteam');
        Route::get('/viewsingteam/{ref_no}', [TeamController::class, 'viewsingteam'])->name('viewsingteam');
        Route::get('/editteam/{ref_no}', [TeamController::class, 'editteam'])->name('editteam');
        Route::put('/updateteam/{id}', [TeamController::class, 'updateteam'])->name('updateteam');
        Route::get('/teamsuspend/{ref_no}', [TeamController::class, 'teamsuspend'])->name('teamsuspend');
        Route::get('/teamapproved/{ref_no}', [TeamController::class, 'teamapproved'])->name('teamapproved');
        Route::get('/teamsacked/{ref_no}', [TeamController::class, 'teamsacked'])->name('teamsacked');
        Route::get('/staffdelete/{ref_no}', [TeamController::class, 'staffdelete'])->name('staffdelete');
        Route::get('/viewsinglesubjectschool/{user_id}', [SubjectController::class, 'viewsinglesubjectschool'])->name('viewsinglesubjectschool');
        
        Route::put('/createrol/{id}', [UserController::class, 'createrol'])->name('createrol');
        Route::get('/addrole/{ref_no}', [UserController::class, 'addrole'])->name('addrole');
        Route::get('/viewroles', [UserController::class, 'viewroles'])->name('viewroles');
        Route::get('/addevent', [EventController::class, 'addevent'])->name('addevent');
        Route::get('/createteevent', [EventController::class, 'createteevent'])->name('createteevent');
        Route::get('/viewevents', [EventController::class, 'viewevents'])->name('viewevents');
        Route::get('/eventview/{ref_no}', [EventController::class, 'eventview'])->name('eventview');
        Route::get('/eventedit/{ref_no}', [EventController::class, 'eventedit'])->name('eventedit');
        Route::put('/updateevent/{ref_no}', [EventController::class, 'updateevent'])->name('updateevent');
        Route::get('/eventeapproved/{ref_no}', [EventController::class, 'eventeapproved'])->name('eventeapproved');
        Route::get('/eventesuspend/{ref_no}', [EventController::class, 'eventesuspend'])->name('eventesuspend');
        Route::get('/eventedelete/{ref_no}', [EventController::class, 'eventedelete'])->name('eventedelete');
        Route::get('/eventedelete/{ref_no}', [EventController::class, 'eventedelete'])->name('eventedelete');
        Route::get('/addblog', [BlogController::class, 'addblog'])->name('addblog');
        Route::get('/viewblog', [BlogController::class, 'viewblog'])->name('viewblog');
        Route::post('/createblog', [BlogController::class, 'createblog'])->name('createblog');
        Route::get('/blogview/{ref_no}', [BlogController::class, 'blogview'])->name('blogview');
        Route::get('/blogedit/{ref_no}', [BlogController::class, 'blogedit'])->name('blogedit');
        Route::put('/updateblog/{ref_no}', [BlogController::class, 'updateblog'])->name('updateblog');
        Route::get('/blogeapproved/{ref_no}', [BlogController::class, 'blogeapproved'])->name('blogeapproved');
        Route::get('/blogesuspend/{ref_no}', [BlogController::class, 'blogesuspend'])->name('blogesuspend');
        Route::get('/blogedelete/{ref_no}', [BlogController::class, 'blogedelete'])->name('blogedelete');
       
        Route::get('/schoolpdf/{ref_no1}', [SchoolsController::class, 'schoolpdf'])->name('schoolpdf');
        Route::get('/rejectschool/{ref_no1}', [SchoolsController::class, 'rejectschool'])->name('rejectschool');
        Route::get('/suspendschool/{ref_no1}', [SchoolsController::class, 'suspendschool'])->name('suspendschool');
        Route::get('/schoolsaddmit/{ref_no1}', [SchoolsController::class, 'schoolsaddmit'])->name('schoolsaddmit');
        Route::get('/viewschapproved', [SchoolsController::class, 'viewschapproved'])->name('viewschapproved');
        Route::get('/viewschrejected', [SchoolsController::class, 'viewschrejected'])->name('viewschrejected');
        

        Route::get('/viewschreview', [SchoolsController::class, 'viewschreview'])->name('viewschreview');
        Route::get('/viewstudent/{ref_no}', [StudentController::class, 'viewstudent'])->name('viewstudent');
        Route::get('/editstudent/{ref_no}', [StudentController::class, 'editstudent'])->name('editstudent');
        Route::put('/updateadmission/{ref_no}', [StudentController::class, 'updateadmission'])->name('updateadmission');
        Route::get('/rejectstudent/{ref_no}', [StudentController::class, 'rejectstudent'])->name('rejectstudent');
        Route::get('/viewschool/{ref_no}', [SchoolsController::class, 'viewschool'])->name('viewschool');
        
        Route::get('rejectedstudent', [SchoolsController::class, 'rejectedstudent'])->name('rejectedstudent');
        Route::get('studentsapprove/{ref_no}', [StudentController::class, 'studentsapprove'])->name('studentsapprove');
        Route::get('suspendstudent/{ref_no}', [StudentController::class, 'suspendstudent'])->name('suspendstudent');
        Route::get('suspendstudents', [StudentController::class, 'suspendstudents'])->name('suspendstudents');
        Route::get('studentsaddmit/{ref_no}', [StudentController::class, 'studentsaddmit'])->name('studentsaddmit');
        Route::get('admittedstudents', [StudentController::class, 'admittedstudents'])->name('admittedstudents');
        Route::get('allstudents', [StudentController::class, 'allstudents'])->name('allstudents');
        Route::get('deletestudent/{ref_no}', [StudentController::class, 'deletestudent'])->name('deletestudent');
        Route::get('/addregno/{id}', [StudentController::class, 'addregno'])->name('addregno');
        Route::put('/addingregno/{id}', [StudentController::class, 'addingregno'])->name('addingregno');
        Route::get('/studentpdf/{ref_no}', [StudentController::class, 'studentpdf'])->name('studentpdf');
        Route::get('/medicalspdf/{ref_no}', [StudentController::class, 'medicalspdf'])->name('medicalspdf');
        Route::get('/allstudentpdf', [StudentController::class, 'allstudentpdf'])->name('allstudentpdf');
        Route::get('/allcrechepdf', [StudentController::class, 'allcrechepdf'])->name('allcrechepdf');
        Route::get('/allnurserypdf', [StudentController::class, 'allnurserypdf'])->name('allnurserypdf');
        Route::get('/allprimarypdf', [StudentController::class, 'allprimarypdf'])->name('allprimarypdf');
        Route::get('/allhighschpdf', [StudentController::class, 'allhighschpdf'])->name('allhighschpdf');
        Route::get('/viewalluyo', [StudentController::class, 'viewalluyo'])->name('viewalluyo');
        Route::get('/alluyocrechepdf', [StudentController::class, 'alluyocrechepdf'])->name('alluyocrechepdf');
        Route::get('/alluyopreperatorypdf', [StudentController::class, 'alluyopreperatorypdf'])->name('alluyopreperatorypdf');
        Route::get('/allpreschoolpdf', [StudentController::class, 'allpreschoolpdf'])->name('allpreschoolpdf');
        Route::get('/alluyonurserypdf', [StudentController::class, 'alluyonurserypdf'])->name('alluyonurserypdf');
        Route::get('/alluyoprimarypdf', [StudentController::class, 'alluyoprimarypdf'])->name('alluyoprimarypdf');
        Route::get('/alluyohighschpdf', [StudentController::class, 'alluyohighschpdf'])->name('alluyohighschpdf');
        Route::get('/alluyocentpdf', [StudentController::class, 'alluyocentpdf'])->name('alluyocentpdf');
        Route::get('/viewpreparatory', [StudentController::class, 'viewpreparatory'])->name('viewpreparatory');
        Route::get('/viewpreschool', [StudentController::class, 'viewpreschool'])->name('viewpreschool');
        Route::get('/viewnursery', [StudentController::class, 'viewnursery'])->name('viewnursery');
        Route::get('/viewprimary', [StudentController::class, 'viewprimary'])->name('viewprimary');
        Route::get('/viewhighschool', [StudentController::class, 'viewhighschool'])->name('viewhighschool');
        Route::get('/viewallabuja', [StudentController::class, 'viewallabuja'])->name('viewallabuja');
        Route::get('/allabujacrechepdf', [StudentController::class, 'allabujacrechepdf'])->name('allabujacrechepdf');
        Route::get('/allabujapdf', [StudentController::class, 'allabujapdf'])->name('allabujapdf');
        Route::get('/allabujapreperatorypdf', [StudentController::class, 'allabujapreperatorypdf'])->name('allabujapreperatorypdf');
        Route::get('/allabujapreschoolpdf', [StudentController::class, 'allabujapreschoolpdf'])->name('allabujapreschoolpdf');
        Route::get('/allabujanurserypdf', [StudentController::class, 'allabujanurserypdf'])->name('allabujanurserypdf');
        Route::get('/allabujaprimarypdf', [StudentController::class, 'allabujaprimarypdf'])->name('allabujaprimarypdf');
        Route::get('/allabujahighschpdf', [StudentController::class, 'allabujahighschpdf'])->name('allabujahighschpdf');
        Route::get('/viewabujapreparatory', [StudentController::class, 'viewabujapreparatory'])->name('viewabujapreparatory');
        Route::get('/abujapreschool', [StudentController::class, 'abujapreschool'])->name('abujapreschool');
        Route::get('/viewabujanursery', [StudentController::class, 'viewabujanursery'])->name('viewabujanursery');
        Route::get('/viewabujaprimary', [StudentController::class, 'viewabujaprimary'])->name('viewabujaprimary');
        Route::get('/viewabjhighschool', [StudentController::class, 'viewabjhighschool'])->name('viewabjhighschool');
        Route::get('/viewresults', [ResultController::class, 'viewresults'])->name('viewresults');
        Route::get('/viewresult/{id}', [ResultController::class, 'viewresult'])->name('viewresult');
        Route::get('/subdelte/{id}', [SubjectController::class, 'subdelte'])->name('subdelte');
        Route::get('/viewclasses', [ClassnameController::class, 'viewclasses'])->name('viewclasses');
        Route::get('/viewsingleclassschool/{user_id}', [ClassnameController::class, 'viewsingleclassschool'])->name('viewsingleclassschool');
        Route::get('/addnotification', [NotificationController::class, 'addnotification'])->name('addnotification');
        Route::post('/createnotification', [NotificationController::class, 'createnotification'])->name('createnotification');
        Route::get('/viewnotification', [NotificationController::class, 'viewnotification'])->name('viewnotification');
        Route::get('/editnotification/{id}', [NotificationController::class, 'editnotification'])->name('editnotification');
        Route::put('/updatenotification/{id}', [NotificationController::class, 'updatenotification'])->name('updatenotification');
        Route::get('/deletenoti/{id}', [NotificationController::class, 'deletenoti'])->name('deletenoti');
        Route::get('/teacherpsycomotor', [TeacherdomainController::class, 'teacherpsycomotor'])->name('teacherpsycomotor');
        Route::get('/addcode', [CodeController::class, 'addcode'])->name('addcode');
        Route::post('/createcde', [CodeController::class, 'createcde'])->name('createcde');
        Route::get('/viewcode', [CodeController::class, 'viewcode'])->name('viewcode');
        Route::get('/deletecode/{id}', [CodeController::class, 'deletecode'])->name('deletecode');
        
        
        
        
         
        Route::get('/testimonyedelete/{id}', [TestimonyController::class, 'testimonyedelete'])->name('testimonyedelete');
        Route::get('/testimonyesuspend/{id}', [TestimonyController::class, 'testimonyesuspend'])->name('testimonyesuspend');
        Route::get('/testimonyeapproved/{id}', [TestimonyController::class, 'testimonyeapproved'])->name('testimonyeapproved');
        Route::put('/updatetestimony/{id}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        Route::get('/testimonyedit/{id}', [TestimonyController::class, 'testimonyedit'])->name('testimonyedit');
        Route::get('/testimonyview/{id}', [TestimonyController::class, 'testimonyview'])->name('testimonyview');
        Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        Route::get('/allsubjects', [SubjectController::class, 'allsubjects'])->name('allsubjects');
        Route::get('/setsubjectquestions', [SubjectController::class, 'setsubjectquestions'])->name('setsubjectquestions');
        Route::get('/addquestions/{id}', [SubjectController::class, 'addquestions'])->name('addquestions');
        Route::get('/viewprincipalsbylgadmin', [LgaController::class, 'viewprincipalsbylgadmin'])->name('viewprincipalsbylgadmin');
        Route::get('/viewlgaprincipals/{lga}', [LgaController::class, 'viewlgaprincipals'])->name('viewlgaprincipals');
        Route::get('/subebheadmaster/{lga}', [LgaController::class, 'subebheadmaster'])->name('subebheadmaster');
        Route::get('/viewsheadsgas/{slug}', [SchoolsController::class, 'viewsheadsgas'])->name('viewsheadsgas');
        Route::get('/viewschoolsteacheradlgas/{slug}', [UserController::class, 'viewschoolsteacheradlgas'])->name('viewschoolsteacheradlgas');
        Route::get('/editschools/{ref_no}', [SchoolsController::class, 'editschools'])->name('editschools');
        
        Route::get('/princidelete/{ref_no}', [UserController::class, 'princidelete'])->name('princidelete');
        Route::get('/schooldeletes/{ref_no1}', [SchoolsController::class, 'schooldeletes'])->name('schooldeletes');
        Route::get('/suspendschools/{ref_no1}', [SchoolsController::class, 'suspendschools'])->name('suspendschools');
        Route::get('/rejectschools/{ref_no1}', [SchoolsController::class, 'rejectschools'])->name('rejectschools');
        Route::get('/viewschools/{ref_no1}', [SchoolsController::class, 'viewschools'])->name('viewschools');
        Route::get('/viewprincipals', [UserController::class, 'viewprincipals'])->name('viewprincipals');
        Route::get('/viewprinci/{ref_no}', [UserController::class, 'viewprinci'])->name('viewprinci');
        Route::get('/editprinci/{ref_no}', [UserController::class, 'editprinci'])->name('editprinci');
        
        Route::get('/retired/{ref_no}', [UserController::class, 'retired'])->name('retired');
        Route::get('/tranfer/{ref_no}', [UserController::class, 'tranfer'])->name('tranfer');
        Route::get('/suspendprinci/{ref_no}', [UserController::class, 'suspendprinci'])->name('suspendprinci');
        Route::get('/rejectprinci/{ref_no}', [UserController::class, 'rejectprinci'])->name('rejectprinci');
        Route::get('/princisaddmit/{ref_no}', [UserController::class, 'princisaddmit'])->name('princisaddmit');
        Route::get('/viewheadmaster', [UserController::class, 'viewheadmaster'])->name('viewheadmaster');
        
        Route::get('/print1stinglepaymentspdf/{id}', [StudentController::class, 'print1stinglepaymentspdf'])->name('print1stinglepaymentspdf');
        Route::get('/viewallpaymentfirst', [StudentController::class, 'viewallpaymentfirst'])->name('viewallpaymentfirst');
        Route::get('/print1stinglepaymentspdfgf', [StudentController::class, 'print1stinglepaymentspdfgf'])->name('print1stinglepaymentspdfgf');

        Route::post('/createtestimony', [TestimonyController::class, 'createtestimony'])->name('createtestimony');
        Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        Route::get('/viewtestimony', [TestimonyController::class, 'viewtestimony'])->name('viewtestimony');
        Route::get('/testimonyview/{id}', [TestimonyController::class, 'testimonyview'])->name('testimonyview');
        Route::get('/testimonyedit/{id}', [TestimonyController::class, 'testimonyedit'])->name('testimonyedit');
        Route::put('/updatetestimony/{id}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        Route::get('/testimonyeapproved/{id}', [TestimonyController::class, 'testimonyeapproved'])->name('testimonyeapproved');
        Route::get('/testimonyesuspend/{id}', [TestimonyController::class, 'testimonyesuspend'])->name('testimonyesuspend');
        Route::get('/testimonyedelete/{id}', [TestimonyController::class, 'testimonyedelete'])->name('testimonyedelete');
        Route::get('/addevent', [EventController::class, 'addevent'])->name('addevent');
        Route::post('/createteevent', [EventController::class, 'createteevent'])->name('createteevent');
        Route::get('/viewevents', [EventController::class, 'viewevents'])->name('viewevents');
        Route::get('/eventeapproved/{slug}', [EventController::class, 'eventeapproved'])->name('eventeapproved');
        Route::get('/eventesuspend/{slug}', [EventController::class, 'eventesuspend'])->name('eventesuspend');
        
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::get('/addpsychomotors', [DomainController::class, 'addpsychomotors'])->name('addpsychomotors');
        
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::get('viewsfees/{ref_no}', [StudentController::class, 'viewsfees'])->name('viewsfees');

        Route::get('/studentit/{ref_no}', [StudentController::class, 'studentit'])->name('studentit');
        Route::get('/viewstudents/{ref_no}', [StudentController::class, 'viewstudents'])->name('viewstudents');
        Route::post('/reachresultbystudentbyadmin', [SchoolsController::class, 'reachresultbystudentbyadmin'])->name('reachresultbystudentbyadmin');
        Route::get('/teacheretired/{ref_no}', [UserController::class, 'teacheretired'])->name('teacheretired');
        Route::get('/teachertransfer/{ref_no}', [UserController::class, 'teachertransfer'])->name('teachertransfer');
        Route::put('/updatetransfer/{ref_no}', [UserController::class, 'updatetransfer'])->name('updatetransfer');
        Route::get('/viewlgabyteacher', [LgaController::class, 'viewlgabyteacher'])->name('viewlgabyteacher');
        Route::get('/viewsinglelgasteacher/{lga}', [LgaController::class, 'viewsinglelgasteacher'])->name('viewsinglelgasteacher');
        Route::get('/secondaryteachersbylgaadmin/{lga}', [LgaController::class, 'secondaryteachersbylgaadmin'])->name('secondaryteachersbylgaadmin');
        Route::get('/primteachersbylgaadmin/{lga}', [LgaController::class, 'primteachersbylgaadmin'])->name('primteachersbylgaadmin');
        Route::get('/lecturersprint/{ref_no}', [UserController::class, 'lecturersprint'])->name('lecturersprint');
        
        Route::put('/updatetransfersprinc/{ref_no}', [UserController::class, 'updatetransfersprinc'])->name('updatetransfersprinc');
        Route::get('/addresultsad1/{ref_no}', [StudentController::class, 'addresultsad1'])->name('addresultsad1');
        Route::get('approvedstudents', [StudentController::class, 'approvedstudents'])->name('approvedstudents');
        Route::get('/contactdelete/{id}', [ContactController::class, 'contactdelete'])->name('contactdelete');
        Route::get('/legalcontact', [VisitController::class, 'legalcontact'])->name('legalcontact');
        Route::put('/settingsupdate/{id}', [UserController::class, 'settingsupdate'])->name('settingsupdate');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/addalms', [AlmController::class, 'addalms'])->name('addalms');
        Route::post('/createalms', [AlmController::class, 'createalms'])->name('createalms');
        Route::get('/viewallalms', [AlmController::class, 'viewallalms'])->name('viewallalms');
        Route::get('/editalms/{connect}', [AlmController::class, 'editalms'])->name('editalms');
        Route::put('/updatealms/{connect}', [AlmController::class, 'updatealms'])->name('updatealms');

        Route::get('/viewboardmembers', [UserController::class, 'viewboardmembers'])->name('viewboardmembers');
        Route::post('/createboard', [UserController::class, 'createboard'])->name('createboard');
        Route::post('/createschoolboard/{ref_no}', [UserController::class, 'createschoolboard'])->name('createschoolboard');
        Route::get('/profile/{ref_no1}', [UserController::class, 'profile'])->name('profile');
        Route::put('/updateprofileboard/{ref_no1}', [UserController::class, 'updateprofileboard'])->name('updateprofileboard');

        Route::get('/addboardmemebers/{ref_no}', [UserController::class, 'addboardmemebers'])->name('addboardmemebers'); 
        Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 





































        //THE BEGINING ROUTE OF PRINCIPAL AND TEACHERS
// add2imagesw
        Route::put('/updateaddevent1mag/{ref_no}', [EventController::class, 'updateaddevent1mag'])->name('updateaddevent1mag');
        Route::get('/add1stimage/{ref_no}', [EventController::class, 'add1stimage'])->name('add1stimage');
        Route::get('/add2ndimage/{ref_no}', [SchoolnewsController::class, 'add2ndimage'])->name('add2ndimage');
        Route::get('/add2ndimage13/{ref_no1}', [SchoolnewsController::class, 'add2ndimage13'])->name('add2ndimage13');
        Route::get('/add3images23/{ref_no1}', [SchoolnewsController::class, 'add3images23'])->name('add3images23');
        Route::put('/update2ndeschools1/{ref_no1}', [SchoolnewsController::class, 'update2ndeschools1'])->name('update2ndeschools1');
        Route::put('/update2ndeschools2rd/{ref_no1}', [SchoolnewsController::class, 'update2ndeschools2rd'])->name('update2ndeschools2rd');
        Route::put('/update2ndeschools3rd1/{ref_no1}', [SchoolnewsController::class, 'update2ndeschools3rd1'])->name('update2ndeschools3rd1');
        Route::get('/add3images24/{ref_no1}', [SchoolnewsController::class, 'add3images24'])->name('add3images24');
        Route::get('/add4images25/{ref_no1}', [SchoolnewsController::class, 'add4images25'])->name('add4images25');
        Route::put('/update2ndeschools5the/{ref_no1}', [SchoolnewsController::class, 'update2ndeschools5the'])->name('update2ndeschools5the');

        Route::get('/addteacher', [UserController::class, 'addteacher'])->name('addteacher');
        Route::post('/createteacher', [UserController::class, 'createteacher'])->name('createteacher');

         Route::get('/suspendstudentone', [StudentController::class, 'suspendstudentone'])->name('suspendstudentone');
        Route::get('/restatedstudent', [StudentController::class, 'restatedstudent'])->name('restatedstudent');
        Route::get('/deletestudentsc/{ref_no}', [StudentController::class, 'deletestudentsc'])->name('deletestudentsc');
        Route::get('/deletestudentscm/{ref_no}', [StudentController::class, 'deletestudentscm'])->name('deletestudentscm');
        Route::get('/suspendedtudent/{ref_no}', [StudentController::class, 'suspendedtudent'])->name('suspendedtudent');
        Route::put('/updtatetermteacher/{ref_no}', [StudentController::class, 'updtatetermteacher'])->name('updtatetermteacher');
        Route::get('/changeterm/{ref_no}', [StudentController::class, 'changeterm'])->name('changeterm');
        Route::put('/addgregnobyteacher/{ref_no}', [StudentController::class, 'addgregnobyteacher'])->name('addgregnobyteacher');
        Route::get('/addrenumbyteacher/{ref_no}', [StudentController::class, 'addrenumbyteacher'])->name('addrenumbyteacher');
        Route::put('/updatecreatestudent/{ref_no}', [StudentController::class, 'updatecreatestudent'])->name('updatecreatestudent');
        Route::get('/editstudentsm/{ref_no}', [StudentController::class, 'editstudentsm'])->name('editstudentsm');
        Route::get('/viewsudentscm/{ref_no}', [StudentController::class, 'viewsudentscm'])->name('viewsudentscm');
        Route::put('/updatetransferstudent/{ref_no}', [StudentController::class, 'updatetransferstudent'])->name('updatetransferstudent');
        Route::get('/approvestudent/{ref_no}', [StudentController::class, 'approvestudent'])->name('approvestudent');
        Route::get('/transferstudent/{ref_no}', [StudentController::class, 'transferstudent'])->name('transferstudent');
        Route::get('/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
        Route::get('/viewyourteachersby/{classname}', [ClassnameController::class,  'viewyourteachersby'])->name('viewyourteachersby');
        // Route::get('/viewtteachertr/{ref_no}', [TeacherController::class,  'viewtteachertr'])->name('viewtteachertr');
        // Route::get('/approveteacherbytr/{ref_no}', [TeacherController::class,  'approveteacherbytr'])->name('approveteacherbytr');
        Route::post('/createstudent', [StudentController::class, 'createstudent'])->name('createstudent');
        Route::get('/addpsychomotor/{user_id}', [ResultController::class, 'addpsychomotor'])->name('addpsychomotor');
        Route::get('/viewallsubjectsteacher', [Controller::class, 'viewallsubjectsteacher'])->name('viewallsubjectsteacher');
        

        Route::view('/home','dashboard.teacher.home')->name('home');
        Route::get('/home', [UserController::class, 'home'])->name('home');
        // Route::get('/editresultsbyteacher/{id}', [ResultController::class, 'editresultsbyteacher'])->name('editresultsbyteacher');
        Route::put('/updateheresult/{ref_no2}', [ResultController::class, 'updateheresult'])->name('updateheresult');
        Route::get('/addlogotr/{ref_no}', [UserController::class, 'addlogotr'])->name('addlogotr');
        Route::put('/updatelogo/{ref_no}', [UserController::class, 'updatelogo'])->name('updatelogo');
        Route::get('/viewyourstudentsprimary/{classname}', [ClassnameController::class, 'viewyourstudentsprimary'])->name('viewyourstudentsprimary');
        Route::get('/addcommentteacher/{ref_no}', [ResultController::class, 'addcommentteacher'])->name('addcommentteacher');
        Route::post('/approveallprimary', [ResultController::class, 'approveallprimary'])->name('approveallprimary');
        Route::get('/editresultsbyteacher/{ref_no2}', [ResultController::class, 'editresultsbyteacher'])->name('editresultsbyteacher');
        Route::post('/searchforstudentresult', [ResultController::class, 'searchforstudentresult'])->name('searchforstudentresult');
        Route::post('/createpsychomotorom', [StudentdomainController::class, 'createpsychomotorom'])->name('createpsychomotorom');
        Route::get('assignedsubjects/{id}', [SubjectController::class, 'assignedsubjects'])->name('assignedsubjects');
        Route::get('editsubjectscbyprin/{id}', [SubjectController::class, 'editsubjectscbyprin'])->name('editsubjectscbyprin');
        Route::post('assignsubjectstoteacherbysc', [TeacherassignController::class, 'assignsubjectstoteacherbysc'])->name('assignsubjectstoteacherbysc');
        Route::put('updatesubjectscbyhead/{id}', [SubjectController::class, 'updatesubjectscbyhead'])->name('updatesubjectscbyhead');
        Route::get('/subjectsassgned', [SubjectController::class, 'subjectsassgned'])->name('subjectsassgned');
        
        Route::get('/viewclassesbyprinc/{classname}', [ClassnameController::class, 'viewclassesbyprinc'])->name('viewclassesbyprinc');
        Route::get('/tecacherviewresultbysubapproved', [ResultController::class, 'tecacherviewresultbysubapproved'])->name('tecacherviewresultbysubapproved');
        Route::get('/addpsychomotorteacher1/{id}', [ResultController::class, 'addpsychomotorteacher1'])->name('addpsychomotorteacher1');
        Route::post('/createdomain', [TeacherdomainController::class, 'createdomain'])->name('createdomain');
        Route::get('/tecacherdomainadd/{ref_no1}', [UserController::class, 'tecacherdomainadd'])->name('tecacherdomainadd');
        Route::get('addresults/{id}', [StudentController::class, 'addresults'])->name('addresults');
        Route::post('/createresults', [ResultController::class, 'createresults'])->name('createresults');
        Route::get('/firstermresultsbyprinc/{classname}', [ClassnameController::class, 'firstermresultsbyprinc'])->name('firstermresultsbyprinc');
        Route::get('/approveresultbyteacher/{id}', [ResultController::class, 'approveresultbyteacher'])->name('approveresultbyteacher');
        Route::post('/searchfortermbyschresult', [ResultController::class, 'searchfortermbyschresult'])->name('searchfortermbyschresult');
        Route::post('/searchforstudentresult', [ResultController::class, 'searchforstudentresult'])->name('searchforstudentresult');
        Route::put('/updatesignature/{ref_no}', [UserController::class, 'updatesignature'])->name('updatesignature');
        Route::get('/addsignature/{ref_no}', [UserController::class, 'addsignature'])->name('addsignature');
        Route::get('/deletesubjectscs/{id}', [TeacherassignController::class, 'deletesubjectscs'])->name('deletesubjectscs');
        
        Route::post('/searchforstudentresultbysession', [ResultController::class, 'searchforstudentresultbysession'])->name('searchforstudentresultbysession');
        Route::get('/addpayment', [PaymentController::class, 'addpayment'])->name('addpayment');
        Route::post('/createfeeding', [PaymentController::class, 'createfeeding'])->name('createfeeding');
        Route::get('/viewfeedinfees', [PaymentController::class, 'viewfeedinfees'])->name('viewfeedinfees');
        Route::get('/addbuspayment', [PaymentController::class, 'addbuspayment'])->name('addbuspayment');
        Route::get('/viewbusfees', [PaymentController::class, 'viewbusfees'])->name('viewbusfees');
        Route::get('/addpartypayment', [PaymentController::class, 'addpartypayment'])->name('addpartypayment');
        Route::get('/viewpartypayment', [PaymentController::class, 'viewpartypayment'])->name('viewpartypayment');
        // Route::get('/viewallpayment', [TransactionController::class, 'viewallpayment'])->name('viewallpayment');
        // Route::get('/viewsinglepayment/{ref_no}', [TransactionController::class, 'viewsinglepayment'])->name('viewsinglepayment');
        // Route::get('/printsinglepaymentspdfs/{ref_no}', [TransactionController::class, 'printsinglepaymentspdfs'])->name('printsinglepaymentspdfs');
        Route::get('/classpayments/{classname}', [ClassnameController::class, 'classpayments'])->name('classpayments');
        Route::get('/yourclassbyteacher/{classname}', [UserController::class, 'yourclassbyteacher'])->name('yourclassbyteacher');
        Route::get('/addresultsbyteacher/{ref_no}', [StudentController::class, 'addresultsbyteacher'])->name('addresultsbyteacher');
        Route::get('/myteachersubjects', [AssignsubjectController::class, 'myteachersubjects'])->name('myteachersubjects');
        Route::post('/createresultsbyteacter', [ResultController::class, 'createresultsbyteacter'])->name('createresultsbyteacter');
        Route::post('/createpsychomotorobyteacher', [StudentdomainController::class, 'createpsychomotorobyteacher'])->name('createpsychomotorobyteacher');
        Route::get('/teacherviewdomaiin', [DomainController::class, 'teacherviewdomaiin'])->name('teacherviewdomaiin');
        Route::get('myteachers', [UserController::class, 'myteachers'])->name('myteachers');
        Route::get('allresultsprinci', [ResultController::class, 'allresultsprinci'])->name('allresultsprinci');
        Route::get('/addcommentsteachers/{id}', [ResultController::class, 'addcommentsteachers'])->name('addcommentsteachers');
        Route::get('/addheadteachercomment/{ref_no2}', [ResultController::class, 'addheadteachercomment'])->name('addheadteachercomment');
        // Route::put('/addheadcommentbyteachers/{id}', [ResultController::class, 'addheadcommentbyteachers'])->name('addheadcommentbyteachers');
        Route::put('/updateheadteachercommentteacher/{ref_no2}', [ResultController::class, 'updateheadteachercommentteacher'])->name('updateheadteachercommentteacher');
        // Route::put('/addresultcommentbyteachers/{id}', [ResultController::class, 'addresultcommentbyteachers'])->name('addresultcommentbyteachers');
        
        Route::put('/updatepsychomotorom/{ref_no}', [StudentdomainController::class, 'updatepsychomotorom'])->name('updatepsychomotorom');
        Route::get('/editcommentteacher/{ref_no}', [StudentdomainController::class, 'editcommentteacher'])->name('editcommentteacher');
        Route::get('/suspendstudentone', [StudentController::class, 'suspendstudentone'])->name('suspendstudentone');
        Route::get('/restatedstudent', [StudentController::class, 'restatedstudent'])->name('restatedstudent');
        Route::put('/updtatetermteacher/{ref_no}', [StudentController::class, 'updtatetermteacher'])->name('updtatetermteacher');
        Route::get('/changeterm/{ref_no}', [StudentController::class, 'changeterm'])->name('changeterm');
        Route::put('/addgregnobyteacher/{ref_no}', [StudentController::class, 'addgregnobyteacher'])->name('addgregnobyteacher');
        Route::get('/addrenumbyteacher/{ref_no}', [StudentController::class, 'addrenumbyteacher'])->name('addrenumbyteacher');
        Route::put('/updatecreatestudent/{ref_no}', [StudentController::class, 'updatecreatestudent'])->name('updatecreatestudent');
        Route::get('/editstudentsm/{ref_no}', [StudentController::class, 'editstudentsm'])->name('editstudentsm');
        Route::get('/viewsudentscm/{ref_no}', [StudentController::class, 'viewsudentscm'])->name('viewsudentscm');
        Route::put('/updatetransferstudent/{ref_no}', [StudentController::class, 'updatetransferstudent'])->name('updatetransferstudent');
        Route::get('/approvestudent/{ref_no}', [StudentController::class, 'approvestudent'])->name('approvestudent');
        Route::get('/transferstudent/{ref_no}', [StudentController::class, 'transferstudent'])->name('transferstudent');
        Route::get('/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
        Route::get('/viewyourteachersby/{classname}', [ClassnameController::class,  'viewyourteachersby'])->name('viewyourteachersby');
        Route::get('/viewtteachertr/{ref_no}', [UserController::class,  'viewtteachertr'])->name('viewtteachertr');
        Route::get('/approveteacherbytr/{ref_no}', [UserController::class,  'approveteacherbytr'])->name('approveteacherbytr');
        Route::post('/createstudent', [StudentController::class, 'createstudent'])->name('createstudent');
        Route::get('/addpsychomotor/{ref_no2}', [ResultController::class, 'addpsychomotor'])->name('addpsychomotor');
        Route::get('/viewallsubjectsteacher', [AssignsubjectController::class, 'viewallsubjectsteacher'])->name('viewallsubjectsteacher');
        Route::get('/viewsubjectsassignteachers/{ref_no}', [UserController::class, 'viewsubjectsassignteachers'])->name('viewsubjectsassignteachers');
        

        


        Route::get('/responsepageheadteacher', [ResultController::class, 'responsepageheadteacher'])->name('responsepageheadteacher');
        Route::post('/searchforstudentresulthead', [ResultController::class, 'searchforstudentresulthead'])->name('searchforstudentresulthead');
        Route::post('/createpartypayments', [PaymentController::class, 'createpartypayments'])->name('createpartypayments');
        Route::post('/createbuspayments', [PaymentController::class, 'createbuspayments'])->name('createbuspayments');
        Route::post('/createpayments', [PaymentController::class, 'createpayments'])->name('createpayments');
        Route::get('/viewfees', [PaymentController::class, 'viewfees'])->name('viewfees');
        Route::get('/viewfee/{id}', [PaymentController::class, 'viewfee'])->name('viewfee');
        Route::get('/editfee/{id}', [PaymentController::class, 'editfee'])->name('editfee');
        Route::put('/updatepayments/{id}', [PaymentController::class, 'updatepayments'])->name('updatepayments');
        Route::get('/approvedfee/{id}', [PaymentController::class, 'approvedfee'])->name('approvedfee');
        Route::get('/printfee/{id}', [PaymentController::class, 'printfee'])->name('printfee');
        Route::get('/viewallsubjectsbyhead', [SubjectController::class, 'viewallsubjectsbyhead'])->name('viewallsubjectsbyhead');
        Route::get('/deletefee/{id}', [PaymentController::class, 'deletefee'])->name('deletefee');
        Route::get('/profile1/{ref_no}', [UserController::class, 'profile1'])->name('profile1');
        Route::get('/tecacherviewresultbysub', [ResultController::class, 'tecacherviewresultbysub'])->name('tecacherviewresultbysub');
        Route::get('/addpsychomotorteacher/{id}', [ResultController::class, 'addpsychomotorteacher'])->name('addpsychomotorteacher');
        Route::get('/viewyourstudentsprimary/{classname}', [ClassnameController::class, 'viewyourstudentsprimary'])->name('viewyourstudentsprimary');
                
        
        Route::get('/allresultsprinciapproved', [ResultController::class, 'allresultsprinciapproved'])->name('allresultsprinciapproved');
        Route::get('/firstermresultsbyprincapproved/{classname}', [ClassnameController::class, 'firstermresultsbyprincapproved'])->name('firstermresultsbyprincapproved');
        Route::put('/addresultcomment/{id}', [ResultController::class, 'addresultcomment'])->name('addresultcomment');
        Route::get('/addcomment/{id}', [ResultController::class, 'addcomment'])->name('addcomment');
        Route::get('/viewallstudentsbyprinc', [StudentController::class, 'viewallstudentsbyprinc'])->name('viewallstudentsbyprinc');
        Route::post('/searchforstudentinclass', [StudentController::class, 'searchforstudentinclass'])->name('searchforstudentinclass');
        Route::post('/createschoolnews', [SchoolnewsController::class, 'createschoolnews'])->name('createschoolnews');
        Route::get('/viewyouradverts', [SchoolnewsController::class, 'viewyouradverts'])->name('viewyouradverts');
        Route::put('/updatephoto/{ref_no}', [UserController::class, 'updatephoto'])->name('updatephoto');
        Route::get('/deletesadvert/{ref_no}', [SchoolnewsController::class, 'deletesadvert'])->name('deletesadvert');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
        Route::get('/addaverts', [SchoolnewsController::class, 'addaverts'])->name('addaverts');
        Route::get('/rejectadvert/{slug1}', [SchoolnewsController::class, 'rejectadvert'])->name('rejectadvert');
        Route::get('/suspendadvert/{slug1}', [SchoolnewsController::class, 'suspendadvert'])->name('suspendadvert');
        Route::get('/approveadvert/{slug1}', [SchoolnewsController::class, 'approveadvert'])->name('approveadvert');
        Route::put('/updateeadverts/{ref_no1}', [SchoolnewsController::class, 'updateeadverts'])->name('updateeadverts');
        Route::get('/editadvert/{ref_no1}', [SchoolnewsController::class, 'editadvert'])->name('editadvert');
        Route::get('/viewadverts/{slug1}', [SchoolnewsController::class, 'viewadverts'])->name('viewadverts');
        
















        //THE BEGININNG OF SCHOOL BOARD MEMBER SCHOOLS
         Route::get('/home', [UserController::class, 'home'])->name('home');
        // Route::post('/searchteachersbysusb', [TeacherController::class, 'searchteachersbysusb'])->name('searchteachersbysusb');
        // Route::put('/updatetransfer/{ref_no}', [TeacherController::class, 'updatetransfer'])->name('updatetransfer');
        Route::get('/approvedschool/{ref_no1}', [SchoolsController::class, 'approvedschool'])->name('approvedschool');
        Route::get('/schoolsresultsclassbyboard/{slug}', [SchoolsController::class, 'schoolsresultsclassbyboard'])->name('schoolsresultsclassbyboard');
        
        Route::get('/deletesubjectscs/{id}', [TeacherassignController::class, 'deletesubjectscs'])->name('deletesubjectscs');
        Route::get('/approvedresultsc/{id}', [ResultController::class, 'approvedresultsc'])->name('approvedresultsc');
        Route::post('/createsdomains', [DomainController::class, 'createsdomains'])->name('createsdomains');
        Route::get('/viewallpschomotors', [DomainController::class, 'viewallpschomotors'])->name('viewallpschomotors');
        Route::get('/editpsycomotor/{ref_no}', [DomainController::class, 'editpsycomotor'])->name('editpsycomotor');
        Route::put('/updatedomains/{ref_no}', [DomainController::class, 'updatedomains'])->name('updatedomains');
        Route::get('/deletepsycomotor/{ref_no}', [DomainController::class, 'deletepsycomotor'])->name('deletepsycomotor');
        Route::get('/editsection/{connect}', [SectionController::class, 'editsection'])->name('editsection');
        Route::get('/viewyourteachers/{section}', [SectionController::class, 'viewyourteachers'])->name('viewyourteachers');
        Route::get('/edittteachersc/{ref_no}', [UserController::class, 'edittteachersc'])->name('edittteachersc');
        Route::get('/approveteacherbysc/{ref_no}', [UserController::class, 'approveteacherbysc'])->name('approveteacherbysc');
        Route::put('/updatesteacher/{ref_no}', [UserController::class, 'updatesteacher'])->name('updatesteacher');
        Route::get('/viewtteachersc/{ref_no}', [UserController::class, 'viewtteachersc'])->name('viewtteachersc');
        Route::get('/suspendteacherbysc/{ref_no}', [UserController::class, 'suspendteacherbysc'])->name('suspendteacherbysc');
        Route::get('/deleteteachersc/{ref_no}', [UserController::class, 'deleteteachersc'])->name('deleteteachersc');
        Route::get('/retiredprim/{ref_no}', [UserController::class, 'retiredprim'])->name('retiredprim');
        Route::get('/editprim/{ref_no1}', [UserController::class, 'editprim'])->name('editprim');
        Route::put('/updatehm/{ref_no1}', [UserController::class, 'updatehm'])->name('updatehm');
        Route::get('/deleteclass/{connect}', [ClassnameController::class, 'deleteclass'])->name('deleteclass');
        Route::get('/displaymbtlga', [LgaController::class, 'displaymbtlga'])->name('displaymbtlga');
        Route::get('/viewshs/{lga}', [LgaController::class, 'viewshs'])->name('viewshs');
        Route::get('/addsecondarysubjectsadmin', [SubjectController::class, 'addsecondarysubjectsadmin'])->name('addsecondarysubjectsadmin');
        Route::get('/addtechnicalsubjectsadmin', [SubjectController::class, 'addtechnicalsubjectsadmin'])->name('addtechnicalsubjectsadmin');
        
       
        // Route::get('editstudentscby/{ref_no}', [StudentController::class, 'editstudentscby'])->name('editstudentscby');
        
        Route::get('/viewsection/{section}', [SectionController::class, 'viewsection'])->name('viewsection');
        Route::get('/deletesection/{ref_no}', [SectionController::class, 'deletesection'])->name('deletesection');
        Route::put('/updatesection/{ref_no}', [SectionController::class, 'updatesection'])->name('updatesection');
        Route::get('/viewallhm', [UserController::class, 'viewallhm'])->name('viewallhm');
        Route::get('/primsaddmit/{ref_no}', [UserController::class, 'primsaddmit'])->name('primsaddmit');
        Route::get('/rejectprim/{ref_no}', [UserController::class, 'rejectprim'])->name('rejectprim');
        Route::get('/suspendprim/{ref_no}', [UserController::class, 'suspendprim'])->name('suspendprim');
        Route::get('/tranferprim/{ref_no}', [UserController::class, 'tranferprim'])->name('tranferprim');
        Route::get('/viewprim/{ref_no}', [UserController::class, 'viewprim'])->name('viewprim');
        Route::get('/viewyourlgastudents', [LgaController::class, 'viewyourlgastudents'])->name('viewyourlgastudents');
        Route::post('/reachresultbyposition', [ResultController::class, 'reachresultbyposition'])->name('reachresultbyposition');
        
        Route::get('/viewallsection', [SectionController::class, 'viewallsection'])->name('viewallsection');
        Route::post('/createsection', [SectionController::class, 'createsection'])->name('createsection');
        Route::get('/addsection', [SectionController::class, 'addsection'])->name('addsection');
        Route::get('/mysubjectsguestion', [TeacherassignController::class, 'mysubjectsguestion'])->name('mysubjectsguestion');
        
        // Route::get('/editquestion/{id}', [QuestionController::class, 'editquestion'])->name('editquestion');
        Route::get('/addterm', [TermController::class, 'addterm'])->name('addterm');
        Route::post('/createterm', [TermController::class, 'createterm'])->name('createterm');
        
        Route::put('/updatealms/{id}', [AlmController::class, 'updatealms'])->name('updatealms');
        Route::get('/editalms/{id}', [AlmController::class, 'editalms'])->name('editalms');
        Route::get('/viewallalms', [AlmController::class, 'viewallalms'])->name('viewallalms');
        Route::post('/createalms', [AlmController::class, 'createalms'])->name('createalms');
        Route::get('/addalms', [AlmController::class, 'addalms'])->name('addalms');
        Route::get('/viewstudentsinlgas/{lga}', [LgaController::class, 'viewstudentsinlgas'])->name('viewstudentsinlgas');
        
        
       
        Route::post('/createadverts', [BlogController::class, 'createadverts'])->name('createadverts');
        Route::get('/viewclassesbysc/{classname}', [ClassnameController::class, 'viewclassesbysc'])->name('viewclassesbysc');
        Route::get('/viewterm/{term}', [TermController::class, 'viewterm'])->name('viewterm');
        Route::get('/viewalms/{alms}', [AlmController::class, 'viewalms'])->name('viewalms');
        Route::get('/firstermresults/{lga}', [LgaController::class, 'firstermresults'])->name('firstermresults');
        Route::get('/deletestudentsc/{ref_no}', [StudentController::class, 'deletestudentsc'])->name('deletestudentsc');
        Route::post('/reachresultbysc', [ResultController::class, 'reachresultbysc'])->name('reachresultbysc');
        Route::post('/reachresultbystudentsc', [ResultController::class, 'reachresultbystudentsc'])->name('reachresultbystudentsc');
        Route::post('/searchfortermbysch', [ResultController::class, 'searchfortermbysch'])->name('searchfortermbysch');
        
        Route::get('/allresults', [ResultController::class, 'allresults'])->name('allresults');
        Route::get('/viewyourstudentsecondary', [StudentController::class, 'viewyourstudentsecondary'])->name('viewyourstudentsecondary');
        
        Route::put('/updatetransferstudentby/{ref_no}', [StudentController::class, 'updatetransferstudentby'])->name('updatetransferstudentby');
        Route::get('/transferstudentbyhead/{ref_no}', [StudentController::class, 'transferstudentbyhead'])->name('transferstudentbyhead');
        Route::get('/rejectedstudents/{ref_no}', [StudentController::class, 'rejectedstudents'])->name('rejectedstudents');
        Route::get('/addmitstu/{ref_no}', [StudentController::class, 'addmitstu'])->name('addmitstu');
        Route::get('/suspendedstu/{ref_no}', [StudentController::class, 'suspendedstu'])->name('suspendedstu');
        Route::get('/viewstu/{ref_no}', [StudentController::class, 'viewstu'])->name('viewstu');
        Route::put('/updatescstudent/{ref_no}', [StudentController::class, 'updatescstudent'])->name('updatescstudent');
        Route::get('/deletesubjectsc/{connect}', [SubjectController::class, 'deletesubjectsc'])->name('deletesubjectsc');
        Route::put('/updatesubjectsc/{connect}', [SubjectController::class, 'updatesubjectsc'])->name('updatesubjectsc');
        Route::get('/editsubjectsc/{connect}', [SubjectController::class, 'editsubjectsc'])->name('editsubjectsc');
        Route::get('/viewallsubjects', [SubjectController::class, 'viewallsubjects'])->name('viewallsubjects');
        Route::get('/viewallsubjects', [SubjectController::class, 'viewallsubjects'])->name('viewallsubjects');
        Route::post('/createsubjectsc', [SubjectController::class, 'createsubjectsc'])->name('createsubjectsc');
        Route::get('/addsubjectsc', [SubjectController::class, 'addsubjectsc'])->name('addsubjectsc');
        Route::put('/updatecclassessc/{ref_no}', [ClassnameController::class, 'updatecclassessc'])->name('updatecclassessc');
        Route::get('/editclas1/{connect}', [ClassnameController::class, 'editclas1'])->name('editclas1');
        Route::get('/viewallclasses', [ClassnameController::class, 'viewallclasses'])->name('viewallclasses');
        Route::get('/deleteterm/{connect}', [TermController::class, 'deleteterm'])->name('deleteterm');
        Route::put('/updateclassessc/{id}', [TermController::class, 'updateclassessc'])->name('updateclassessc');
        Route::get('/editterm/{id}', [TermController::class, 'editterm'])->name('editterm');
        Route::get('/viewallterm', [TermController::class, 'viewallterm'])->name('viewallterm');
        Route::post('/createclassessc', [ClassnameController::class, 'createclassessc'])->name('createclassessc');
        Route::get('/addclassessc', [ClassnameController::class, 'addclassessc'])->name('addclassessc');
        // Route::post('/createquestion', [QuestionController::class, 'createquestion'])->name('createquestion');
        // Route::get('/setquestion/{id}', [QuestionController::class, 'setquestion'])->name('setquestion');
        // Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        // Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        Route::get('/printresult/{id}', [ResultController::class, 'printresult'])->name('printresult');
        Route::get('/mysubjects', [TeacherassignController::class, 'mysubjects'])->name('mysubjects');
        Route::post('/yourresult', [ResultController::class, 'yourresult'])->name('yourresult');
        Route::get('/checkresult', [ResultController::class, 'checkresult'])->name('checkresult');
        Route::get('/checkresultterminal', [ResultController::class, 'checkresultterminal'])->name('checkresultterminal');
        Route::get('/teacherviewresults3rd/{id}', [ResultController::class, 'teacherviewresults3rd'])->name('teacherviewresults3rd');
        Route::get('/premiumtermresults', [ResultController::class, 'premiumtermresults'])->name('premiumtermresults');
        Route::get('/teacherviewresults2nd/{id}', [ResultController::class, 'teacherviewresults2nd'])->name('teacherviewresults2nd');
        Route::get('/pensulatermresults', [ResultController::class, 'pensulatermresults'])->name('pensulatermresults');
        Route::get('/viewsingleschoolsresult/{slug}', [SchoolsController::class, 'viewsingleschoolsresult'])->name('viewsingleschoolsresult');
        
        Route::get('/assignedsubject/{connect}', [SubjectController::class, 'assignedsubject'])->name('assignedsubject');
        
        Route::post('/createassignsubject', [AssignsubjectController::class, 'createassignsubject'])->name('createassignsubject');
        
        Route::put('/assignstudentclass/{ref_no}', [UserController::class, 'assignstudentclass'])->name('assignstudentclass');
        Route::get('/studenttrash', [StudentController::class, 'studenttrash'])->name('studenttrash');
        Route::get('/restorestudent/{id}', [StudentController::class, 'restorestudent'])->name('restorestudent');
        Route::get('/restoreteacher/{id}', [UserController::class, 'restoreteacher'])->name('restoreteacher');
        Route::get('/teachertrash', [UserController::class, 'teachertrash'])->name('teachertrash');
        Route::get('/deletestudentfully/{ref_no}', [StudentController::class, 'deletestudentfully'])->name('deletestudentfully');
        Route::get('/deleteteacherfully/{ref_no}', [UserController::class, 'deleteteacherfully'])->name('deleteteacherfully');




        


        Route::get('schooltrash', [SchoolsController::class, 'schooltrash'])->name('schooltrash');
        Route::get('restoreschool/{id}', [SchoolsController::class, 'restoreschool'])->name('restoreschool');
        Route::get('deleteschoolforcefully/{ref_no1}', [SchoolsController::class, 'deleteschoolforcefully'])->name('deleteschoolforcefully');
        Route::get('boardmembertrash', [UserController::class, 'boardmembertrash'])->name('boardmembertrash');
        

        Route::get('resultstrash', [ResultController::class, 'resultstrash'])->name('resultstrash');
        Route::get('restoreresult/{id}', [ResultController::class, 'restoreresult'])->name('restoreresult');
        Route::get('deleteresultfully/{ref_no}', [ResultController::class, 'deleteresultfully'])->name('deleteresultfully');

        // Route::get('payment', [SchoolfeeController::class, 'payment'])->name('payment');
        Route::get('/editstudentsc/{ref_no}', [StudentController::class, 'editstudentsc'])->name('editstudentsc');
        Route::post('/reachresultbyteacherschead', [UserController::class, 'reachresultbyteacherschead'])->name('reachresultbyteacherschead');
        Route::post('/reachresultbystudentschead', [StudentController::class, 'reachresultbystudentschead'])->name('reachresultbystudentschead');
        Route::get('/viewyourstudentsinschhol/{classname}', [ClassnameController::class, 'viewyourstudentsinschhol'])->name('viewyourstudentsinschhol');
        Route::get('/viewteacherbylga', [LgaController::class, 'viewteacherbylga'])->name('viewteacherbylga');
        Route::get('/viewteachersinlgas1/{lga}/{schooltype}', [LgaController::class, 'viewteachersinlgas1'])->name('viewteachersinlgas1');
        Route::get('/schoolsteachers/{slug}', [SchoolsController::class, 'schoolsteachers'])->name('schoolsteachers');
        Route::get('/editcenternumber/{ref_no1}', [SchoolsController::class, 'editcenternumber'])->name('editcenternumber');
        Route::put('/updatecenternumber/{ref_no1}', [SchoolsController::class, 'updatecenternumber'])->name('updatecenternumber');
        Route::get('/primdelete/{ref_no}', [UserController::class, 'primdelete'])->name('primdelete');
        
        Route::get('/viewyourschoolsbylgas', [LgaController::class, 'viewyourschoolsbylgas'])->name('viewyourschoolsbylgas');
        Route::get('/viewschoolsinlgas/{lga}', [LgaController::class, 'viewschoolsinlgas'])->name('viewschoolsinlgas');
        Route::get('/schoolsstudents/{classname}/{slug}', [ClassnameController::class, 'schoolsstudents'])->name('schoolsstudents');
        Route::get('/schoolsprinteachers/{slug}', [SchoolsController::class, 'schoolsprinteachers'])->name('schoolsprinteachers');
        Route::get('/viewschool/{ref_no1}', [SchoolsController::class, 'viewschool'])->name('viewschool');
        Route::get('/editschool/{ref_no1}', [SchoolsController::class, 'editschool'])->name('editschool');
        Route::put('/updateschool/{ref_no1}', [SchoolsController::class, 'updateschool'])->name('updateschool');
        Route::get('/schoolelete/{ref_no1}', [SchoolsController::class, 'schoolelete'])->name('schoolelete');
        Route::get('/schoolsresults/{classname}/{slug}', [ClassnameController::class, 'schoolsresults'])->name('schoolsresults');
        Route::get('/allresultsbylga', [LgaController::class, 'allresultsbylga'])->name('allresultsbylga');
        Route::get('/addpsychomotors', [DomainController::class, 'addpsychomotors'])->name('addpsychomotors');
        Route::get('/schoolsstudentsclassbyboard/{slug}', [SchoolsController::class, 'schoolsstudentsclassbyboard'])->name('schoolsstudentsclassbyboard');
        
        // Route::get('/generate-report', 'ReportController@generateReport');
        Route::post('generatePDF', [ResultController::class, 'generatePDF'])->name('generatePDF');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        Route::get('/promotions', [UserController::class, 'promotions'])->name('promotions');
        Route::get('/nurseryschoolheads', [UserController::class, 'nurseryschoolheads'])->name('nurseryschoolheads');
        
        Route::get('/crecheheads', [UserController::class, 'crecheheads'])->name('crecheheads');
        Route::get('/preschoolheads', [UserController::class, 'preschoolheads'])->name('preschoolheads');
        Route::get('/primaryheads', [UserController::class, 'primaryheads'])->name('primaryheads');
        Route::get('/highschools', [UserController::class, 'highschools'])->name('highschools');
        Route::get('/createsection', [UserController::class, 'createsection'])->name('createsection');
        Route::get('/preschoolsection', [UserController::class, 'preschoolsection'])->name('preschoolsection');
        Route::get('/primarysection', [UserController::class, 'primarysection'])->name('primarysection');
        Route::get('/nurserysection', [UserController::class, 'nurserysection'])->name('nurserysection');
        Route::get('/highschoolsection', [UserController::class, 'highschoolsection'])->name('highschoolsection');
        
        Route::get('/classes/{classname}', [ClassnameController::class, 'classes'])->name('classes');
        
        Route::get('/teacherviewresults/{student_id}', [ResultController::class, 'teacherviewresults'])->name('teacherviewresults');
        Route::get('/pioneertermresults', [ResultController::class, 'pioneertermresults'])->name('pioneertermresults');
        Route::get('/premiumterm', [UserController::class, 'premiumterm'])->name('premiumterm');
        Route::get('/pioneerterm', [UserController::class, 'pioneerterm'])->name('pioneerterm');
        Route::get('/penultimateterm', [UserController::class, 'penultimateterm'])->name('penultimateterm');
        Route::get('/profile/{ref_no}', [UserController::class, 'profile'])->name('profile');
        Route::get('/admisionletter', [UserController::class, 'admisionletter'])->name('classesdelete');
        Route::get('assignedstudent/{ref_no}', [UserController::class, 'assignedstudent'])->name('assignedstudent');
        Route::get('/displayschools', [SchoolsController::class, 'displayschools'])->name('displayschools');
        Route::get('/editschoolss/{ref_no1}', [SchoolsController::class, 'editschoolss'])->name('editschoolss');
        Route::put('/updatesch/{ref_no1}', [SchoolsController::class, 'updatesch'])->name('updatesch');
        
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');  
        
    });
});

