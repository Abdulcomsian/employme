<?php

namespace App\Http\Controllers;
use App\Models\{Conversation, Chat, ChatAttachment};
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use DOMDocument;

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

        $allConversations->when(isset($request->employerId)  && !empty($request->employerId) , function($query) use($request){
            $query->orderByRaw("FIELD(employer_id , $request->employerId) DESC, id");
        });

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
        $allConversations->when(isset($request->candidateId)  && !empty($request->candidateId) , function($query) use($request){
            $query->orderByRaw("FIELD(candidate_id , $request->candidateId) DESC, id");
        });
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
        $html = $message = '';
        if(!$request->haveAttachment){
                $message = $request->message;
                $dom = new DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTML(mb_convert_encoding($message, 'HTML-ENTITIES', 'UTF-8'));
                libxml_clear_errors();
                $images = $dom->getElementsByTagName('img');
                foreach($images as $index => $img)
                {
                    $imageLink = $img->getAttribute('src');
                    $image = explode(',' , $imageLink);
                    $image = base64_decode(str_replace(' ', '' , $image[1]));
                    $imageName = time().$index.'-chat-image.png';
                    $imagePath = public_path('uploads/chat/'.$imageName);
                    file_put_contents($imagePath , $image);
                    $img->setAttribute('src' , asset('uploads/chat/'.$imageName));
                }


                $message = $dom->saveHTML();
            } else {
                $message = "<div class='d-flex'>";
                foreach($request->attachment_file as $file)
                {
                    $fileOriginalName = $file->getClientOriginalName();
                    $filename = time().'-'.$fileOriginalName;
                    $file->move(public_path('uploads/chat') , $filename);
                    $filePath = asset("uploads/chat/$filename");
                    $attachmentIcon = asset("assets/images/assets/attachment.png"); 
                    $message .= "<a href='$filePath' target='_blank' title=''><img src='$attachmentIcon' class='message-attachment' ></a>";
                }
                $message .= "</div>";
            }

                $create = new Chat;
                $create->message = $message;
                $create->conversation_id = $request->conversation_id;
                $create->user_id = \Auth::id();
                $create->save();


                $chatFlag = Chat::where('conversation_id' , $request->conversation_id)->whereDate('created_at' , date('Y-m-d'))->count() > 1 ? false : true;

                // if(isset($request->chat_files))
                // {
                //     foreach($request->chat_files as $index=>$chatFile)
                //     {
                //         $imageName = '';
                //         $imageExt = '';
                //         $file = $chatFile;
                //         $imageExt = $file->getClientOriginalExtension();
                //         $originalName = $file->getClientOriginalName();
                //         $filePath = getChatFilePath();
                //         $imageName = saveFile($filePath, $file,null);
                //         $addAttachment = new ChatAttachment;
                //         $addAttachment->original_name = $originalName;
                //         $addAttachment->file_path = $imageName;
                //         $addAttachment->extension = $imageExt;
                //         $addAttachment->chat_id = $create->id;
                //         $addAttachment->save();
                //     }
                // }
            $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails')->find($request->conversation_id);
            $chatDetails = $conversations->chats()->with('chatFiles')->find($create->id);
            $lastChat = $conversations->lastChat()->with('chatFiles')->find($create->id);
            $type = 0;
            $html =  view('components.chats.employer-sent-message',compact('conversations','chatDetails', 'type','chatFlag'))->render();
            $type = 1;
            $tocandidate = view('components.chats.employer-sent-message',compact('conversations','chatDetails','type', 'chatFlag'))->render();
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
        try{
        $html = $message = '';
        if(!$request->haveAttachment){
        
            $message = $request->message;
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML(mb_convert_encoding($message, 'HTML-ENTITIES', 'UTF-8'));
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach($images as $index => $img)
            {
                $imageLink = $img->getAttribute('src');
                $image = explode(',' , $imageLink);
                $image = base64_decode(str_replace(' ', '' , $image[1]));
                $imageName = time().$index.'-chat-image.png';
                $imagePath = public_path('uploads/chat/'.$imageName);
                file_put_contents($imagePath , $image);
                $img->setAttribute('src' , asset('uploads/chat/'.$imageName));
            }


            $message = $dom->saveHTML();

            

            // if(isset($request->chat_files))
            // {
            //     foreach($request->chat_files as $index=>$chatFile)
            //     {
            //         $imageName = '';
            //         $imageExt = '';
            //         $file = $chatFile;
            //         $imageExt = $file->getClientOriginalExtension();
            //         $originalName = $file->getClientOriginalName();
            //         $filePath = getChatFilePath();
            //         $imageName = saveFile($filePath, $file,null);
            //         $addAttachment = new ChatAttachment;
            //         $addAttachment->original_name = $originalName;
            //         $addAttachment->file_path = $imageName;
            //         $addAttachment->extension = $imageExt;
            //         $addAttachment->chat_id = $create->id;
            //         $addAttachment->save();
            //     }
            // }



            } else {
                $message = "<div class='d-flex'>";
                foreach($request->attachment_file as $file)
                {
                    $fileOriginalName = $file->getClientOriginalName();
                    $filename = time().'-'.$fileOriginalName;
                    $file->move(public_path('uploads/chat') , $filename);
                    $filePath = asset("uploads/chat/$filename");
                    $attachmentIcon = asset("assets/images/assets/attachment.png"); 
                    $message .= "<a href='$filePath' target='_blank' title=''><img src='$attachmentIcon' class='message-attachment' ></a>";
                }
                $message .= "</div>";
            }


            $create = new Chat;
            $create->message = $message;
            $create->conversation_id = $request->conversation_id;
            $create->user_id = \Auth::id();
            $create->save();
            
            $chatFlag = Chat::where('conversation_id' , $request->conversation_id)->whereDate('created_at' , date('Y-m-d'))->count() > 1 ? false : true;


            $conversations = Conversation::with('employer.employerDetails','candidate.candidatePersonalDetails')->find($request->conversation_id);
            $chatDetails = $conversations->chats()->with('chatFiles')->find($create->id);
            $lastChat = $conversations->lastChat()->with('chatFiles')->find($create->id);
            $type = 0;
            $html =  view('components.chats.candidate-sent-message',compact('conversations','chatDetails','type' , 'chatFlag'))->render();
            $type = 1;
            $toemployer = view('components.chats.candidate-sent-message',compact('conversations','chatDetails','type', 'chatFlag'))->render();
            $newcandidate= view('components.chats.new-candidate',compact('lastChat','conversations', 'chatFlag'))->render();
            event(new \App\Events\CandidateEvent($conversations->id,$conversations->employer_id,$toemployer,$newcandidate));

        
        return response()->json([
            "status" => true, 
            "message" => 'message sent successfully',
            'html'=>$html,

        ]);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
