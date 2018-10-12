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
use App\Message;
use App\Advisor;

use Carbon\Carbon;
use Session;
use Auth;
use Image;
use File;

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
        $messages = Message::orderBy('id','DESC')->get();
        $committees = Committee_type::with('committee')->orderBy('id','DESC')->get();
        return view('admin.dashboard',['messages' => $messages]);
    }

    public function deleteMessage(Request $request){
        $message = Message::find($request->id);
        $message->delete();
        Session::flash('success','Successfully Deleted');
        return redirect()->back();
    }

    public function ShowITFest5(){
        $registrations = ITFestRegistration::get();
        $covers = ITFestCover::get();
        $guests = ITFestGuest::get();
        return view('admin.itFest5', ['covers' => $covers, 'guests' => $guests, 'registrations' => $registrations]);
    }

    public function showAddCommitteeMemberForm(){
        $committees = Committee_type::with('committee')->orderBy('id','DESC')->get();
        $committee = Committee_type::all();
        return view('admin.addCommitteeForm',['committees' => $committee, 'committees' => $committees]);
    }

    public function storeCommitteeMemberForm(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:255',
            'designation' => 'required',
            'status' => 'required',
            'type' => 'required',
            'pic' => 'mimes:jpeg,bmp,png,jpg|max:5000'
        ));
        $committee = new Committee();
        $committee->name =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->status = $request->status;
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->designation)));
        $committee->fb = trim($request->fb);
        $committee->g_plus = trim($request->g_plus);
        $committee->twitter = trim($request->twitter);
        $committee->committee_type_id = $request->type;

        // image upload
        if($request->hasFile('pic')) {
            $image      = $request->file('pic');
            $filename   = str_replace(' ','',$committee->name).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/committees/'. $filename);
            Image::make($image)->resize(200, 200)->save($location);
            $committee->photo = $filename;
        }

        $committee->save();
        Session::flash('success','Member Successfully Saved');
        return redirect()->back();
    }

    public function showAddnewsForm(){
        $news = News::orderBy('id','DESC')->get();
        return view('admin.addNewsForm', ['news' => $news]);
    }

    public function storeAddnewsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:255',
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
        return redirect(Route('admin.news.add'));
    }

    public function showEditNewsForm(Request $request){
        $news = News::orderBy('id','DESC')->find($request->id);

        return view('admin.edits.EditNewsForm',['news' =>$news]);
    }

    public function EditNewsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:255',
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
        return redirect(Route('admin.news.add'));
    }

    public function deleteNews(Request $request){
        $news = News::find($request->id);
        $image_path = public_path('images/news/'. $news->imagepath);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
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
        return redirect(Route('admin.notice.add'));
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
            'type' => 'required',
            'pic' => 'mimes:jpeg,bmp,png,jpg|max:5000'
        ));
        $committee =Committee::find($request->id);
        $committee->name =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->status = $request->status;
        $committee->committee_type_id = $request->type;
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->designation)));
        $committee->fb = trim($request->fb);
        $committee->g_plus = trim($request->g_plus);
        $committee->twitter = trim($request->twitter);

        // image upload
        if($request->hasFile('pic')) {
            $image      = $request->file('pic');
            $nowdatetime = Carbon::now();
            $filename   = str_replace(' ','',$request->name).$nowdatetime->format('YmdHis') .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/committees/'. $filename);
            Image::make($image)->resize(200, 200)->save($location);
            $committee->photo = $filename;
        }

        $committee->save();
        Session::flash('success','Successfully Edited');
        return redirect()->back();
    }

    public function deleteCommitteeMember(Request $request){
        $adm = Committee::find($request->id);
        $image_path = public_path('images/committees/'. $adm->photo);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
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
            'headline' => 'required|max:255',
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
        return redirect(Route('admin.events.add'));
    }

    public function deleteEvents(Request $request){
        $event = Events::find($request->id);
        $image_path = public_path('images/events/'. $event->imagepath);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $event->delete();
        Session::flash('success','Successfully Deleted');
        return redirect()->back();

    }

    public function showAddeventsForm(){
        $events = Events::orderBy('id','DESC')->get();
        return view('admin.addEventsForm', ['events' => $events]);
    }

    public function storeEvents(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:255',
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
        return redirect(Route('admin.events.add'));
    }

    public function showAddNoticeForm(){
        $notice = Notices::orderBy('id','DESC')->get();
        return view('admin.addNoticeForm',['notice' =>$notice]);
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
        return redirect(route('admin.notice.add'));
    }

    public function storeITFestCoverForm(Request $request){
        $this->validate($request,array(
            'title' => 'required|max:255',
            'photo' => 'image|max:5000'
        ));

        $cover = new ITFestCover();
        $cover->title = trim($request->title);
        
        // image upload
        if($request->hasFile('photo')) {
            $image      = $request->file('photo');
            $filename   = str_replace(' ','',$request->title).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/uploads/itFest5/cover/'. $filename);

            Image::make($image)->resize(750, 500, function ($constraint) {
            $constraint->aspectRatio();
            })->save($location);
            $cover->image = $filename;
        }
        $cover->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.itFest5'));
    }

    public function storeITFestGuestForm(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'institution' => 'required|max:255',
            'photo' => 'sometimes|image|max:300'
        ));

        $guest = new ITFestGuest();
        $guest->name = trim($request->name);
        $guest->designation = trim($request->designation);
        $guest->institution = trim($request->institution);

        // image upload
        if($request->hasFile('photo')) {
            $image      = $request->file('photo');
            $filename   = str_replace(' ','',$guest->name).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/uploads/itFest5/guest/'. $filename);
            Image::make($image)->resize(200, 200)->save($location);
            $guest->photo = $filename;
        }
        $guest->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.itFest5'));
    }

    public function updateITFestGuestForm(Request $request){
        $this->validate($request,array(
            'id' => 'required',
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'institution' => 'required|max:255',
            'photo' => 'sometimes|image|max:300'
        ));

        $guest = ITFestGuest::find($request->id);
        $guest->name = trim($request->name);
        $guest->designation = trim($request->designation);
        $guest->institution = trim($request->institution);

        // image upload
        if(!$guest->photo == NULL){
            if($request->hasFile('photo')) {
                $image      = $request->file('photo');
                $filename   = $guest->photo;
                $location   = public_path('/uploads/itFest5/guest/'. $filename);
                Image::make($image)->resize(200, 200)->save($location);
                $guest->photo = $filename;
            }
        } else {
            if($request->hasFile('photo')) {
                $image      = $request->file('photo');
                $filename   = str_replace(' ','',$guest->name).time() .'.' . $image->getClientOriginalExtension();
                $location   = public_path('/uploads/itFest5/guest/'. $filename);
                Image::make($image)->resize(200, 200)->save($location);
                $guest->photo = $filename;
            }
        }

        $guest->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.itFest5'));
    }

    public function deleteItFestCover(Request $request){
        $cover = ITFestCover::find($request->id);
        $image_path = public_path('/uploads/itFest5/cover/'. $cover->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $cover->delete();
        Session::flash('success','Successfully Deleted');
        return redirect(route('admin.itFest5'));
    }

    public function deleteItFestGuest(Request $request){
        $guest = ITFestGuest::find($request->id);
        $image_path = public_path('/uploads/itFest5/guest/'. $guest->photo);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $guest->delete();
        Session::flash('success','Successfully Deleted');
        return redirect(route('admin.itFest5'));
    }

    public function getAdvisors() {
        $advisors = Advisor::orderBy('id', 'desc')->get();

        return view('admin.advisors')->withAdvisors($advisors);
    }

    public function storeAdvisor(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'institution' => 'required|max:255',
            'photo' => 'sometimes|image|max:300'
        ));

        $advisor = new Advisor();
        $advisor->name = trim($request->name);
        $advisor->designation = trim($request->designation);
        $advisor->institution = trim($request->institution);

        // image upload
        if($request->hasFile('photo')) {
            $image      = $request->file('photo');
            $filename   = str_replace(' ','',$advisor->name).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/advisors/'. $filename);
            Image::make($image)->resize(200, 200)->save($location);
            $advisor->photo = $filename;
        }
        $advisor->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.advisors'));
    }

    public function updateAdvisor(Request $request){
        $this->validate($request,array(
            'id' => 'required',
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'institution' => 'required|max:255',
            'photo' => 'sometimes|image|max:300'
        ));

        $advisor = Advisor::find($request->id);
        $advisor->name = trim($request->name);
        $advisor->designation = trim($request->designation);
        $advisor->institution = trim($request->institution);

        // image upload
        if(!$advisor->photo == NULL){
            if($request->hasFile('photo')) {
                $image      = $request->file('photo');
                $filename   = $advisor->photo;
                $location   = public_path('/images/advisors/'. $filename);
                Image::make($image)->resize(200, 200)->save($location);
                $advisor->photo = $filename;
            }
        } else {
            if($request->hasFile('photo')) {
                $image      = $request->file('photo');
                $filename   = str_replace(' ','',$advisor->name).time() .'.' . $image->getClientOriginalExtension();
                $location   = public_path('/images/advisors/'. $filename);
                Image::make($image)->resize(200, 200)->save($location);
                $advisor->photo = $filename;
            }
        }

        $advisor->save();
        Session::flash('success','Successfully Saved');
        return redirect(route('admin.advisors'));
    }

    public function deleteAdvisor(Request $request){
        $advisor = Advisor::find($request->id);
        $image_path = public_path('/images/advisors/'. $advisor->photo);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $advisor->delete();
        Session::flash('success','Successfully Deleted');
        return redirect(route('admin.advisors'));
    }

}
