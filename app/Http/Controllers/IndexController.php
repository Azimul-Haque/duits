<?php

namespace App\Http\Controllers;
use App\Committee as Committee;
use App\Broadcast as News;
use App\Event as Events;

use Illuminate\Http\Request;
use App\Student as Student_form;
use Auth;
use App\Notice as Notice;
use Session;
use App\User as User;
use App\Committee_type as Committee_type;
use App\Message as Message;
use App\ITFest5Cover as ITFestCover;
use App\ITFest5Guest as ITFestGuest;
use App\ITFest5Registration as ITFestRegistration;
use App\Advisor;

use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
use Image;

use \Shipu\Aamarpay\Aamarpay;


class IndexController extends Controller
{
    public function activateUser(Request $request){
        $user = User::find(decrypt($request->id));
        $user ->status = 1;
        $user->save();
        $login = Auth::loginUsingId($user->id);
        if($login){
            return redirect('/');
        }
    }

    public function checkEmail(Request $request){
        $check = sizeof(User::where(['email' => $request->email])->get());
        if ($check>0) $check = "false";
        else $check = "true";
        return $check;
    }

    public function showIndex(){

//        $today = date('Y-m-d');
//        $upcomming_events = Events::with('events_image')->where('date','>=',$today)->orderBy('id','DESC')->get();
//        $latest_news = News::with('broadcasts_image')->orderBy('id','DESC')->get();
//        $notice = Notice::orderBy('id','DESC')->get();
        return view('user.index');
    }

    public function showAboutUs(){
        return view('user.aboutUs');
    }

    public function showCommittee(Request $request){
        $type = Committee_type::where('name',$request->name)->first();
        $committees = Committee::where('committee_type_id','=',$type->id)->get();
        return view('user.committee',['committees'=>$committees,'type' => $type]);
    }


    public function showEvents(){
        $events = Events::orderBy('id','DESC')->paginate(3);
        return view('user.events',['events' => $events]);
    }

    public function showNews(){
        $news = News::orderBy('id','DESC')->paginate(3);
        return view('user.news',['news' => $news]);
    }

    public function showNewsDetails(Request $request){
        $news = News::find($request->id);
        return view('user.newsDetail',['news' => $news]);
    }

    public function showEventDetails(Request $request){
        $event = Events::find($request->id);
        return view('user.eventDetail',['event' => $event]);
    }

    public function showNoticeDetails(Request $request){
        $notice =Notice::find($request->id);
        //return $event;
        return view('user.noticeDetail',['notice' => $notice]);
    }

    public function showNotice(Request $request){
        $notice = Notice::orderBy('id','DESC')->paginate(3);
        return view('user.notice',['notice' => $notice]);
    }

    public function showContact(){
        return view('user.contact');
    }

    public function showWhyus(){
        return view('user.whyUs');
    }

    public function showHistory(){
        return view('user.history');
    }

    public function storeMessage(Request $request){
        $this->validate($request,array(
            'name'             => 'required|max:255',
            'phone'              => 'required|max:255',
            'email'           => 'required|max:255',
            'message'           => 'required|max:255'
        ));

        $message = new Message();
        $message->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $message->email = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->email)));
        $message->phone = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->phone)));
        $message->message = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->message)));
        $message->save();
        
        Session::flash('success','Thank You. We have got your valuable opinion');
        return redirect()->back();
    }

    public function getAdvisors(){
        $advisors = Advisor::orderBy('id', 'desc')->get();
        return view('user.advisors',['advisors'=>$advisors]);
    }

    public function showItFest5(Request $request){
        $covers = ITFestCover::get();
        $guests = ITFestGuest::get();
        return view('itFest5.home', ['covers' => $covers, 'guests' => $guests]);
    }

    public function storeItFest5(Request $request){
        
        $this->validate($request,array(
            'event'             => 'required',
            'team'              => 'required|max:255',
            'member1'           => 'sometimes|max:255',
            'member2'           => 'sometimes|max:255',
            'member3'           => 'sometimes|max:255',
            'member4'           => 'sometimes|max:255',
            'institution'       => 'required|max:255',
            'address'           => 'required|max:255',
            'email'            => 'required|email',
            'mobile'            => 'required|numeric',
            'emergencycontact'  => 'required|numeric',
            'image'             => 'required|image|max:300'
        ));

        $registration = new ITFestRegistration();

        $event = explode(',', $request->event);
        $registration->event_id = $event[0];
        $registration->event_name = $event[1];
        
        $registration->team = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->team)));
        $registration->member1 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member1)));
        $registration->member2 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member2)));
        $registration->member3 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member3)));
        $registration->member4 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member4)));
        $registration->institution = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->institution)));
        $registration->class = 'text';
        $registration->address = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->address)));
        $registration->email = $request->email;
        $registration->mobile = $request->mobile;
        $registration->emergencycontact = $request->emergencycontact;
        
        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $nowdatetime = Carbon::now();
            $filename   = str_replace(' ','',$registration->team).$nowdatetime->format('YmdHis') .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/registration/'. $filename);

            Image::make($image)->resize(200, 200)->save($location);
            /*Image::make($image)->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            })->save($location);*/

            $registration->imagepath = $filename;
        }
        
        $length = 6;
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $random_string = substr(str_shuffle(str_repeat($pool, 6)), 0, $length);
        $registration->registration_id = $event[0].$random_string;
        
        // amounts to register
        $amounts=array("1"=>"1500","2"=>"2000","3"=>"200","4"=>"1600","5"=>"300","6"=>"500","7"=>"2000");

        if($amounts[$event[0]]) {
            $registration->amount = $amounts[$event[0]];
        }
        $registration->payment_status = 0;
        $registration->card_type = '';
        //dd($registration);
        $registration->save();

        Session::flash('success','Registration is complete!');
        Session::flash('warning','You need to make the payment');
        return redirect(Route('it.Fest5.payorcheck', $registration->registration_id));
        

    }

    public function payorcheckItFest5($registration_id){
        $registration = ITFestRegistration::where('registration_id', $registration_id)->first();
        return view('itFest5.payment')
                ->withRegistration($registration);
    }

    public function pritntRegistrationReceipt($registration_id){
        $team = ITFestRegistration::where('registration_id', $registration_id)->first();
        return view('itFest5.print')
                ->withTeam($team);
    }

}
