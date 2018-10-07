<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Committee as Committee;
use App\Broadcast as News;
use App\Broadcasts_image as News_image;
use App\Event as Events;
use App\Events_image as Events_image;
use App\Notice as Notices;
use App\Committee_type as Committee_type;
use App\ITFest5Cover as ITFestCover;
use App\ITFest5Guest as ITFestGuest;
use App\ITFest5Registration as ITFestRegistration;

use Carbon\Carbon;
use Session;
use Auth;
use Image;

class AdminController extends Controller
{

    public function checkCommitteeExistence(Request $request){
        if($request->ajax()){
            $RequestedItem =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
            $RegisteredItem = Committee_type::where('name',$RequestedItem)->first();
            $flag = "true";
            if($RegisteredItem) $flag = "false";
            echo $flag;
        }
    }

    public function storeCommittee(Request $request){
        $committee = new Committee_type();
        $committee->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->description = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->description)));
        $committee->save();
        return redirect()->back();
    }

    public function updateCommittee(Request $request){
        $committee = Committee_type::find($request->id);
        $committee->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->description = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->description)));
        $committee->save();
        return redirect()->back();
    }

    public function deleteCommittee(Request $request){
        $committee = Committee_type::find($request->id);
        $committee->delete();
        Session::flash('success','Successfully Deleted');
        return redirect()->back();
    }

    public function ShowDashboard(){
        $news = News::orderBy('id','DESC')->get();
        $events = Events::orderBy('id','DESC')->get();
        $notice = Notices::orderBy('id','DESC')->get();
        $committees = Committee_type::with('committee')->orderBy('id','DESC')->get();
        return view('admin.dashboard',['news' => $news, 'events'=>$events, 'notice'=>$notice, 'committees'=>$committees]);
    }

    public function ShowITFest5(){
        $registrations = ITFestRegistration::get();
        $covers = ITFestCover::get();
        $guests = ITFestGuest::get();
        return view('admin.itFest5', ['covers' => $covers, 'guests' => $guests, 'registrations' => $registrations]);
    }

    public function showAddCommitteeMemberForm(){
        $committee = Committee_type::all();
        return view('admin.addCommitteeForm',['committees' => $committee]);
    }

    public function storeCommitteeMemberForm(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:255',
            'designation' => 'required',
            'status' => 'required',
            'pic' => 'mimes:jpeg,bmp,png,jpg|max:10000'
        ));
        $committee = new Committee();
        $committee->name =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->status = $request->status;
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->designation)));
        $committee->fb = trim($request->fb);
        $committee->g_plus = trim($request->g_plus);
        $committee->twitter = trim($request->twitter);
        $committee->committee_type_id = $request->type;

        if($request->hasFile('pic')){
            $file = $request->file('pic');
            $fileName = time().$request->file('pic')->getClientOriginalName();
            $file->move(public_path('/images/committees'), $fileName);
            $committee->photo = $fileName;
        }
        $committee->save();
        Session::flash('success','Successfully Saved');
        return redirect(Route('admin.dashboard'));
    }

    public function showAddnewsForm(){
        return view('admin.addNewsForm');
    }

    public function storeAddnewsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
            'image' => 'sometimes|image|max:300'
        ));

        $news = new News();
        $news->headline = $request->headline;
        $news->body = $request->body;
        
        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $nowdatetime = Carbon::now();
            $filename   = str_replace(' ','',$news->headline).$nowdatetime->format('YmdHis') .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/news/'. $filename);

            Image::make($image)->resize(500, 333)->save($location);
            /*Image::make($image)->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            })->save($location);*/

            $news->imagepath = $filename;
        }

        $news->save();

        Session::flash('success','Successfully Saved');
        return redirect(Route('admin.dashboard'));
    }

    public function showEditNewsForm(Request $request){
        $news = News::orderBy('id','DESC')->find($request->id);

        return view('admin.edits.EditNewsForm',['news' =>$news]);
    }

    public function EditNewsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,bmp,png,jpg|max:300'
        ));

        $news = News::find($request->id);
        $news->headline = $request->headline;
        $news->body = $request->body;

        // image upload
        if(!$news->imagepath == NULL){
            if($request->hasFile('image')) {
                $image      = $request->file('image');
                $filename   = $news->imagepath;
                $location   = public_path('images/news/'. $filename);
                Image::make($image)->resize(500, 333)->save($location);
                $news->imagepath = $filename;
            }
        } else {
            if($request->hasFile('image')) {
                $image      = $request->file('image');
                $nowdatetime = Carbon::now();
                $filename   = str_replace(' ','',$news->headline).$nowdatetime->format('YmdHis') .'.' . $image->getClientOriginalExtension();
                $location   = public_path('images/news/'. $filename);
                Image::make($image)->resize(500, 333)->save($location);
                $news->imagepath = $filename;
            }
        }
        

        $news->save();

        Session::flash('success','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteNews(Request $request){
        $news = News::find($request->id);
        $news->delete();
        Session::flash('success','Successfully Deleted');
        return redirect()->back();
    }

    public function showEditNoticeForm(Request $request){
        $notice = Notices::find($request->id);
        return view('admin.edits.EditNoticeForm',['notice' =>$notice]);
    }

    public function EditNoticeForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:255',
            'body' => 'required',
        ));

        $notice = Notices::find($request->id);
        $notice->headline = trim($request->headline);
        $notice->body = trim($request->body);
        $notice->save();
        Session::flash('success','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteNotice(Request $request){
        $notice = Notices::find($request->id);
        $notice->delete();
        Session::flash('success','Successfully Deleted');
        return redirect()->back();

    }

    public function showEditCommitteeMemberForm(Request $request){
        $member =Committee ::find($request->id);
        $committee = Committee_type::all();
        return view('admin.edits.editCommitteeForm',['committees' =>$committee,'member' => $member]);
    }

    public function EditCommitteeMemberForm(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:255',
            'designation' => 'required',
            'status' => 'required',
            'pic' => 'mimes:jpeg,bmp,png,jpg|max:10000'
        ));
        $committee =Committee::find($request->id);
        $committee->name =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->status = $request->status;
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->designation)));
        $committee->fb = trim($request->fb);
        $committee->g_plus = trim($request->g_plus);
        $committee->twitter = trim($request->twitter);

        if($request->hasFile('pic')){
            $file = $request->file('pic');
            $fileName = time().$request->file('pic')->getClientOriginalName();
            $file->move(public_path('/uploads/images'), $fileName);
            $committee->photo = $fileName;
        }
        $committee->save();
        Session::flash('success','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteCommitteeMember(Request $request){
        $adm = Administration ::find($request->id);
        $adm->delete();
        Session::flash('success','Successfully Deleted');
        return redirect()->back();

    }

    public function showEditEventsForm(Request $request){
        $event = Events::find($request->id);
        return view('admin.edits.editEventsForm',['event' =>$event]);
    }

    public function EditEventsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
            'date' => 'required',
            'image' => 'sometimes|image|max:300'
        ));

        $event = Events::find($request->id);
        $event->headline = $request->headline;
        $event->body = $request->body;
        $event->date = $request->date;

        // image upload
        if(!$event->imagepath == NULL){
            if($request->hasFile('image')) {
                $image      = $request->file('image');
                $filename   = $event->imagepath;
                $location   = public_path('images/events/'. $filename);
                Image::make($image)->resize(500, 333)->save($location);
                $event->imagepath = $filename;
            }
        } else {
            if($request->hasFile('image')) {
                $image      = $request->file('image');
                $nowdatetime = Carbon::now();
                $filename   = str_replace(' ','',$event->headline).$nowdatetime->format('YmdHis') .'.' . $image->getClientOriginalExtension();
                $location   = public_path('images/events/'. $filename);
                Image::make($image)->resize(500, 333)->save($location);
                $event->imagepath = $filename;
            }
        }
        $event->save();
        Session::flash('success','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteEvents(Request $request){
        $event = Events::find($request->id);
        $event->delete();
        Session::flash('success','Successfully Deleted');
        return redirect()->back();

    }

    public function showAddeventsForm(){
        return view('admin.addEventsForm');
    }

    public function storeEvents(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
            'date' => 'required',
            'image' => 'sometimes|image|max:300'
        ));

        $event = new Events();
        $event->headline = $request->headline;
        $event->body = $request->body;
        $event->date = $request->date;
        
        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $nowdatetime = Carbon::now();
            $filename   = str_replace(' ','',$event->headline).$nowdatetime->format('YmdHis') .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/events/'. $filename);

            Image::make($image)->resize(500, 333)->save($location);
            /*Image::make($image)->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            })->save($location);*/

            $event->imagepath = $filename;
        }

        $event->save();

        Session::flash('success','Successfully Saved');
        return redirect(Route('admin.dashboard'));
    }

    public function showAddNoticeForm(){
        return view('admin.addNoticeForm');
    }

    public function storeAddNoticeForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:255',
            'body' => 'required',
        ));

        $notice = new Notices();
        $notice->headline = trim($request->headline);
        $notice->body = trim($request->body);
        $notice->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.dashboard'));
    }

    public function storeITFestCoverForm(Request $request){
        $this->validate($request,array(
            'title' => 'required|max:500'
        ));

        $cover = new ITFestCover();
        $cover->title = trim($request->title);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $file->move(public_path('/uploads/itFest5/cover/'), $fileName);
            $cover->image = $fileName;
        }
        $cover->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.itFest5'));
    }

    public function storeITFestGuestForm(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:500',
            'designation' => 'required|max:500',
        ));

        $guest = new ITFestGuest();
        $guest->name = trim($request->name);
        $guest->designation = trim($request->designation);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $file->move(public_path('/uploads/itFest5/guest/'), $fileName);
            $guest->photo = $fileName;
        }
        $guest->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.itFest5'));
    }

    public function deleteItFestCover(Request $request){
        $cover = ITFestCover::find($request->id);
        $cover->delete();
        Session::flash('success','Successfully Deleted');
        return redirect(route('admin.itFest5'));
    }

    public function deleteItFestGuest(Request $request){
        $guest = ITFestGuest::find($request->id);
        $guest->delete();
        Session::flash('success','Successfully Deleted');
        return redirect(route('admin.itFest5'));
    }

}
