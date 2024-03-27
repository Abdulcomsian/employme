<?php

namespace App\Http\Controllers;
use App\Models\{Conversation, Chat, ChatAttachment};
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class MessageController extends Controller
{
    public function getCandidateMessagePage(Request $request){
        $allConversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats','lastChat','lastChat.chatFiles')->where('candidate_id',\Auth::id());
        if(isset($request->searchUser) && $request->searchUser != '')
        {
            $searchUser = $request->searchUser;
            $allConversations = $allConversations->whereHas('employer.employerDetails', function($query) use ($searchUser){
                $query->where('institution','like', '%'.$searchUser.'%');
             });
        }
        $allConversations = $allConversations->get();
        return view('candidate.message',compact('allConversations'));
    }
    public function getEmployerMessage(Request $request){
        $allConversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats','lastChat.chatFiles')->where('employer_id',\Auth::id());
        if(isset($request->searchUser) && $request->searchUser != '')
        {
            $searchUser = $request->searchUser;
            $allConversations = $allConversations->whereHas('candidate.candidatePersonalDetails', function($query) use ($searchUser){
                $query->where('full_name','like', '%'.$searchUser.'%');
             });
        }
        $allConversations = $allConversations->get();
        return view('employer.employer-dashboard-message',compact('allConversations'));
    }

    public function getEmployerChat($id)
    {
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats','chats.chatFiles')->find($id);
        $html =  view('components.chats.employer-message-body',compact('conversations'))->render();
        return response()->json([
            "status" => true, 
            "html" => $html
        ]);
    }
    public function getCandidateChat($id)
    {
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats','chats.chatFiles')->find($id);
        $html =  view('components.chats.candidate-message-body',compact('conversations'))->render();
        return response()->json([
            "status" => true, 
            "html" => $html
        ]);
    }

    public function sendTextToCandidate(Request $request)
    {
        $create = new Chat;
        $create->message = $request->message;
        $create->conversation_id = $request->conversation_id;
        $create->user_id = \Auth::id();
        $create->save();
        if(isset($request->chat_files))
        {
            foreach($request->chat_files as $index=>$chatFile)
            {
                $imageName = '';
                $imageExt = '';
                $file = $chatFile;
                $imageExt = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $filePath = getChatFilePath();
                $imageName = saveFile($filePath, $file,null);
                $addAttachment = new ChatAttachment;
                $addAttachment->original_name = $originalName;
                $addAttachment->file_path = $imageName;
                $addAttachment->extension = $imageExt;
                $addAttachment->chat_id = $create->id;
                $addAttachment->save();
            }
        }
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails')->find($request->conversation_id);
        $chatDetails = $conversations->chats()->with('chatFiles')->find($create->id);
        $lastChat = $conversations->lastChat()->with('chatFiles')->find($create->id);
        $type = 0;
        $html =  view('components.chats.employer-sent-message',compact('conversations','chatDetails','type'))->render();
        $type = 1;
        $tocandidate = view('components.chats.employer-sent-message',compact('conversations','chatDetails','type'))->render();
        $newemployer= view('components.chats.new-employer',compact('lastChat','conversations'))->render();
        event(new \App\Events\EmployerEvent($conversations->id,$conversations->candidate_id,$tocandidate,$newemployer));
        return response()->json([
            "status" => true, 
            "message" => 'message sent successfully',
            'html'=>$html,
        ]);
    }
    public function sendTextToEmployer(Request $request)
    {
        $create = new Chat;
        $create->message = $request->message;
        $create->conversation_id = $request->conversation_id;
        $create->user_id = \Auth::id();
        $create->save();
        if(isset($request->chat_files))
        {
            foreach($request->chat_files as $index=>$chatFile)
            {
                $imageName = '';
                $imageExt = '';
                $file = $chatFile;
                $imageExt = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $filePath = getChatFilePath();
                $imageName = saveFile($filePath, $file,null);
                $addAttachment = new ChatAttachment;
                $addAttachment->original_name = $originalName;
                $addAttachment->file_path = $imageName;
                $addAttachment->extension = $imageExt;
                $addAttachment->chat_id = $create->id;
                $addAttachment->save();
            }
        }
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails')->find($request->conversation_id);
        $chatDetails = $conversations->chats()->with('chatFiles')->find($create->id);
        $lastChat = $conversations->lastChat()->with('chatFiles')->find($create->id);
        $type = 0;
        $html =  view('components.chats.candidate-sent-message',compact('conversations','chatDetails','type'))->render();
        $type = 1;
        $toemployer = view('components.chats.candidate-sent-message',compact('conversations','chatDetails','type'))->render();
        $newcandidate= view('components.chats.new-candidate',compact('lastChat','conversations'))->render();
        event(new \App\Events\CandidateEvent($conversations->id,$conversations->employer_id,$toemployer,$newcandidate));

        return response()->json([
            "status" => true, 
            "message" => 'message sent successfully',
            'html'=>$html,
        ]);
    }
}
