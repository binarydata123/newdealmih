<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use App\Models\EmailTemplate as ModelsEmailTemplate;
use Illuminate\Http\Request;

class EmailTemplate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $template = ModelsEmailTemplate::get();
       return response()->json([
           'status'=>true,
           'message'=>"template data",
           'data'=>$template
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailTemplateRequest $request)
    {
     
        
        $email = $request->emailData;
        $slug = str_slug($email['title'], '-');
        $template = ModelsEmailTemplate::create([
            'title'=>$email['title'],
            'subject'=>$email['subject'],
            'key'=>$slug,
            'email_body'=>$email['content']
        ]);
        return response()->json([
            'status'=>true,
            'message'=>"you have successffully added"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = ModelsEmailTemplate::where('id',$id)
        ->select('email_templates.id as id','email_templates.title as title',
        'email_templates.subject as subject','email_templates.email_body as content')->first();
        return response()->json([
            'status'=>true,
            'message'=>"edit email template",
            'data'=>$template
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailTemplateRequest $request, $id)
    {
    //    dd($request->all());
    $email = $request->emailData;
    ModelsEmailTemplate::where('id',$id)->update([
        'title'=>$email['title'],
        'subject'=>$email['subject'],
        'email_body'=>$email['content']
    ]);
    return response()->json([
        'status'=>true,
        'message'=>"you have successfully updated",
        
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
