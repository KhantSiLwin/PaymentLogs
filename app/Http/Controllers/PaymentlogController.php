<?php

namespace App\Http\Controllers;

use App\Paymentlog;
use App\User;
use Illuminate\Http\Request;

class PaymentlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $paymentlog = Paymentlog::where('user_id',\Illuminate\Support\Facades\Auth::id())->latest()->get();
        return view("paymentlog.index",compact("paymentlog"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("paymentlog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= User::find(\Illuminate\Support\Facades\Auth::id());
       $request->validate([
            "title"=>"required",
            "amount"=>"required",
            "inout"=>"required",
       ]);

        $user= User::find(\Illuminate\Support\Facades\Auth::id());
        if ($request->inout==0) {
            $user->total_money = $user->total_money + $request->amount;
            $user->update();

        }
        else{
            if($user->total_money<$request->amount){
                return redirect()->route('paymentlog.create')->with("amount-error","Greater than Total");
            }
            else{
             $user->total_money = $user->total_money - $request->amount;
                $user->update();
            }
        }
        $paymentlog = new Paymentlog();
        $paymentlog->title =$request->title;
        $paymentlog->amount =$request->amount;
        $paymentlog->inout =$request->inout;
        $paymentlog->user_id = \Illuminate\Support\Facades\Auth::id();
        $paymentlog->save();
        return redirect()->route('paymentlog.create')->with("toast","<b>$request->title</b> is added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentlog $paymentlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentlog $paymentlog)
    {
        return view("paymentlog.edit",compact('paymentlog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request )
    {
        $request->validate([
            "title"=>"required",
            "amount"=>"required",
            "inout"=>"required",
       ]);

       $paymentlog = paymentlog::find($id);

       $user= User::find(\Illuminate\Support\Facades\Auth::id());
       if ($paymentlog->inout==0) {
          
            if($user->total_money<$paymentlog->amount){
                return redirect()->back()->with("status","Greater than Total");
            }
            else{
                $user->total_money = $user->total_money - $paymentlog->amount;
            }
       }
       else{
           $user->total_money = $user->total_money + $paymentlog->amount;
       }

       if ($request->inout==0) {
        $user->total_money = $user->total_money + $request->amount;
        }
         else{
            if($user->total_money<$request->amount){
                return redirect()->back()->with("status","Greater than Total");
            }
            else{
               $user->total_money = $user->total_money - $request->amount;
            }
            
        }

       $user->update();

       $paymentlog->title =$request->title;
       $paymentlog->amount =$request->amount;
       $paymentlog->inout =$request->inout;
       $paymentlog->user_id = \Illuminate\Support\Facades\Auth::id();
       $paymentlog->update();
       return redirect()->back()->with("status","<b>$request->title</b> is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paymentlog  $paymentlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentlog $paymentlog)
    {
        $title = $paymentlog->title;
        $user= User::find(\Illuminate\Support\Facades\Auth::id());
        if ($paymentlog->inout==0) {

            if($user->total_money<$paymentlog->amount){
                return redirect()->back()->with("status","Greater than Total");
            }
            else{
                $user->total_money = $user->total_money - $paymentlog->amount;
            }
        }
        else{
            $user->total_money = $user->total_money + $paymentlog->amount;
        }
        $user->update();
        $paymentlog->delete();
        return redirect()->back()->with("status","<b>$title</b> is delete");
    }

    public function daily($id,Paymentlog $paymentlog)
    {
        
        $paymentlog = Paymentlog::where('user_id',\Illuminate\Support\Facades\Auth::id())->where('created_at','LIKE',"%$id%")->latest()->get();
        return view("paymentlog.daily",compact('paymentlog'));
    }

    public function dailylog($id,Paymentlog $paymentlog)
    {
        
        $paymentlog = Paymentlog::where('user_id',\Illuminate\Support\Facades\Auth::id())->where('created_at','LIKE',"%$id%")->latest()->get();
        return view("paymentlog.dailylog",compact('paymentlog'));
    }

    public function monthly($id,Paymentlog $paymentlog)
    {
        $paymentlog = Paymentlog::where('user_id',\Illuminate\Support\Facades\Auth::id())->where('created_at','LIKE',"%$id%")->latest()->get();
        return view("paymentlog.monthly",compact('paymentlog'));
    }

    public function monthlylog($id,Paymentlog $paymentlog)
    {
        
        $paymentlog = Paymentlog::where('user_id',\Illuminate\Support\Facades\Auth::id())->where('created_at','LIKE',"%$id%")->latest()->get();
        return view("paymentlog.monthlylog",compact('paymentlog'));
    }

    public function yearly(Paymentlog $paymentlog)
    {
        
        $paymentlog = Paymentlog::where('user_id',\Illuminate\Support\Facades\Auth::id())->latest()->get();
        return view("paymentlog.yearly",compact('paymentlog'));
    }

    public function yearlylog($id,Paymentlog $paymentlog)
    {
        
        $paymentlog = Paymentlog::where('user_id',\Illuminate\Support\Facades\Auth::id())->where('created_at','LIKE',"%$id%")->latest()->get();
        return view("paymentlog.yearlylog",compact('paymentlog'));
    }
}

