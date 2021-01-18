@extends('dashboard.master.app')
@section('title')
    YouthFireIT | Dashboard  
@endsection

@section('content')
@if (Session::get('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong class="text-success">Message: {{  Session::get('message')  }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>      
@endif
    <!-- content @s -->
    <div class="nk-content "> 
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body"> 
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Add option for {{ $question->name }}</h5> 
                        </div>
                    </div><!-- .nk-block-head -->

                <form method="POST" action="{{route('options.store', $question->id)}}">
                        @csrf

                        

                        <div class="form-group">
                            <label class="form-label" for="name">Option Title<span style="color: red">*</span></label>
                            <!-- <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus placeholder="Enter Question Title"> -->

                            <textarea type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus placeholder="Enter Question option" rows="8"></textarea>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Save Option</button>
                        </div>
                    </form>
                    <!-- form -->
                      
                </div><!-- .nk-block -->
                 
            </div><!-- nk-split-content -->
           
        </div><!-- nk-split -->
    </div>
    <!-- wrap @e -->
</div>
<!-- content @e -->
@endsection