<?php

namespace App\Http\Controllers;
use App\Models\{Conversation, Chat};
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class MessageController extends Controller
{
    public function getCandidateMessagePage(){
        $allConversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats','lastChat')->where('candidate_id',\Auth::id())->get();
        return view('candidate.message',compact('allConversations'));
    }
    public function getEmployerMessage(){
        $allConversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats')->where('employer_id',\Auth::id())->get();
        return view('employer.employer-dashboard-message',compact('allConversations'));
    }

    public function getEmployerChat($id)
    {
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats')->find($id);
        $html =  view('components.chats.employer-message-body',compact('conversations'))->render();
        return response()->json([
            "status" => true, 
            "html" => $html
        ]);
    }
    public function getCandidateChat($id)
    {
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails','chats')->find($id);
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
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails')->find($request->conversation_id);
        $chatDetails = $conversations->chats()->find($create->id);
        $type = 0;
        $html =  view('components.chats.employer-sent-message',compact('conversations','chatDetails','type'))->render();
        $type = 1;
        $tocandidate = view('components.chats.employer-sent-message',compact('conversations','chatDetails','type'))->render();
        event(new \App\Events\EmployerEvent($conversations->id,$conversations->candidate_id,$tocandidate));
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
        $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails')->find($request->conversation_id);
        $chatDetails = $conversations->chats()->find($create->id);
        $type = 0;
        $html =  view('components.chats.candidate-sent-message',compact('conversations','chatDetails','type'))->render();
        $type = 1;
        $toemployer = view('components.chats.candidate-sent-message',compact('conversations','chatDetails','type'))->render();
        event(new \App\Events\CandidateEvent($conversations->id,$conversations->employer_id,$toemployer));

        return response()->json([
            "status" => true, 
            "message" => 'message sent successfully',
            'html'=>$html,
        ]);
    }
}
