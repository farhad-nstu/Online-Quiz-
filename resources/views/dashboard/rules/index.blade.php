@extends('dashboard.master.app')
@section('title')
    YouthFireIT | exam rules
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

<div class="nk-content">
    <div class="container-fluid" id="viewUserBlad">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">

                    <div class="card card-bordered">

                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">

                                <div class="nk-block-head nk-block-head-lg">


                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            {{-- <h4 class="nk-block-title">Create New Group</h4> --}}
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->

                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <form action="{{ route('examrules.store') }}"  method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="rules_description" class="form-label">Exam Rules</label>
                                                <textarea class="summernote" rows="20" name="rules_description">{{ $allRules->rules_description ?? $allRules->rules_description }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                <!-- .nk-block -->
                            </div>






                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>






@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
