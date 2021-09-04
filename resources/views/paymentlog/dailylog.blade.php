@extends('layouts.historylog_master')

            @section('historylog_title')
              Daily logs
             @endsection

            @section('historylog')
                   
                    @foreach ($paymentlog as $p)
                    
                    <div class="row mx-0 bg-tran-gray p-3 historylog-hover b-10 mb-2 align-items-center">
                        <div class="col-4 col-md-6 col-lg-7 p-0">
                            <span>{{$p->title}}</span> 
                        </div>
                        <div class="col-5 col-md-4 col-lg-3 p-0">
                            <a href="{{route("paymentlog.edit",$p->id)}}" class="btn mr-2 btn-sm btn-outline-dark"><i class="feather-edit-2"></i></a>
                            <button form="del{{$p->id}}" class="btn mr-2 btn-sm btn-outline-danger"><i class="feather-trash"></i></button>
                            <form action="{{route("paymentlog.destroy",$p->id)}}" id="del{{$p->id}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                        <div class="col-3 col-md-2 col-lg-2 p-0">
                            @if ($p->inout==0)
                              <span class="text-indigo"> + {{$p->amount}}  </span>
                            @else
                              <span class="text-warning-minus"> - {{$p->amount}}  </span>
                            @endif
                        </div>
                    </div>
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
