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
use App\Meaasge as Message;
use App\ITFest5Cover as ITFestCover;
use App\ITFest5Guest as ITFestGuest;


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
        $committees = Committee::where([['status','=','Current'],['committee_type_id','=',$type->id]])->paginate(6);
        return view('user.committee',['committees'=>$committees,'type' => $type]);
    }


    public function showEvents(){
        $events = Events::with('events_image')->orderBy('id','DESC')->paginate(3);
        return view('user.events',['events' => $events]);
    }

    public function showNews(){
        $news = News::with('broadcasts_image')->orderBy('id','DESC')->paginate(3);
        return view('user.news',['news' => $news]);
    }

    public function showNewsDetails(Request $request){
        $news = News::with('broadcasts_image')->find($request->id);
        return view('user.newsDetail',['news' => $news]);
    }

    public function showEventDetails(Request $request){
    $event = Events::with('events_image')->find($request->id);
    //return $event;
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
        $message = new Message();
        $message->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $message->email = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->email)));
        $message->phone = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->phone)));
        $message->message = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->message)));
        $message->save();
        Session::flash('success_msg_send','Thank You. We have got your valuable opinion');
        return redirect()->back();
    }

    public function showItFest5(Request $request){
        $covers = ITFestCover::get();
        $guests = ITFestGuest::get();
        return view('itFest5.home', ['covers' => $covers, 'guests' => $guests]);
    }
}
