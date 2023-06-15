<?php
 
namespace App\Exceptions;
use App\Http\Requests\StorePostRequest;

use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\DbLog;
use App\User;
class LogData extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report(){
    }
 
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */


    public function render($request, Exception $error){
      $log = new DbLog;
      $log->user_id = Auth::user()->id;
      $log->error = $error;
      $log->line_no = $error->getLine();
      $log->browser = $request->fullUrl();
      $log->function_name = 'function_index';
      $log->save(); 
      // return \Redirect::back()->with('error', 'Something Went Wrong.');
    }
}


 