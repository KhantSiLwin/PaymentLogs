@extends('layouts.historylog_master')

            @section('historylog_title')
              Monthly logs
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
                        
            

              @endsection
