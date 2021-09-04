@extends('layouts.historylog_master')

            @section('historylog_title')
              Yearly logs
             @endsection

            @section('historylog')
                  
                    @php
                        $day=[];
                    @endphp
                    @foreach ($paymentlog as $p)
                       @php
                        if(!in_array($p->created_at->format("Y-m"),$day)){
                              array_push($day,$p->created_at->format("Y-m"));
                          }
                        @endphp
                    @endforeach
                    @foreach ($day as $d)
                        
                   
                        <a href="{{route("paymentlog.daily",$d)}}" class='btn bg-tran-gray my-2 p-3 w-100 text-left'> {{$d}}</a>
                    
                    @endforeach
                    <hr>
                    @php
                    $plus_money=0;
                    $minus_money=0;
  
               @endphp
               @foreach ($paymentlog as $p)
                  @php
                   if ($p->inout==0) {
                       $plus_money=$plus_money+$p->amount;
                   }else {
                       $minus_money=$minus_money+$p->amount;
                   } 
                     
                   @endphp
                  
               @endforeach
              
           @endsection
