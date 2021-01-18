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
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Questions Lsit</h3>
              <div class="nk-block-des text-soft">
                <?php $total = count($questions); ?>
                <p>Total {{ $total }} Questions.</p>
              </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
              <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                  class="icon ni ni-menu-alt-r"></em></a>
                  <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                      <li class="nk-block-tools-opt">
                        <a href="{{ route('questions.create') }}" class=" btn btn-icon btn-primary"><em
                          class="icon ni ni-plus"></em>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div><!-- .toggle-wrap -->
              </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
          </div><!-- .nk-block-head -->
          <div class="nk-block">
            <div class="card card-bordered card-stretch">
              <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                  <div class="card-title-group">
                    <div class="card-tools">
                      <div class="form-inline flex-nowrap gx-3">

                      </div><!-- .form-inline -->
                    </div><!-- .card-tools -->
                    <div class="card-tools mr-n1">
                      <ul class="btn-toolbar gx-1">
                        <li>
                          <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em
                            class="icon ni ni-search"></em></a>
                          </li><!-- li -->
                          <li class="btn-toolbar-sep"></li><!-- li -->
                          <li>
                            <div class="toggle-wrap">
                              <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em
                                class="icon ni ni-menu-right"></em></a>
                                <div class="toggle-content" data-content="cardTools">
                                  <ul class="btn-toolbar gx-1">
                                    <li class="toggle-close">
                                      <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em
                                        class="icon ni ni-arrow-left"></em></a>
                                      </li><!-- li -->
                                      <li>

                                      </li><!-- li -->
                                    </ul><!-- .btn-toolbar -->
                                  </div><!-- .toggle-content -->
                                </div><!-- .toggle-wrap -->
                              </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                          </div><!-- .card-tools -->
                        </div><!-- .card-title-group -->
                        <div class="card-search search-wrap" data-search="search">
                          <div class="card-body">
                            <div class="search-content">
                              <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                                class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                placeholder="Search by user or email">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                              </div>
                            </div>
                          </div><!-- .card-search -->
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                          <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                              <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                  <input type="checkbox" class="custom-control-input" id="uid">
                                  <label class="custom-control-label" for="uid"></label>
                                </div>
                              </div>
                              <div class="nk-tb-col"><span class="sub-text">Title</span></div>
                              <div class="nk-tb-col tb-col-mb"><span class="sub-text">Details</span></div>

                              <div class="nk-tb-col tb-col-mb"><span class="sub-text">Option</span></div>


                              <div class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></div> 

                            </div><!-- .nk-tb-item -->

                            @foreach ($questions as $question)


                            <!-- Modal Start -->
                            <div class="modal fade zoom" tabindex="-1" role="dialog" id="details{{$question->id}}">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                  <div class="modal-body modal-body-lg">
                                    <!-- <h5 class="title">Details</h5>
                                    <ul class="nk-nav nav nav-tabs">
                                      <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal">Lead Details</a>
                                      </li>
                                    </ul> -->
                                    <div class="tab-content">
                                      <div class="tab-pane active" id="personal">

                                      </div><!-- .tab-pane -->


                                      <form method="POST" action="{{route('options.store', $question->id)}}">
                                        @csrf



                                        <div class="form-group">
                                          <label class="form-label" for="name">Option Title<span style="color: red">*</span></label>
                                          <!-- <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus placeholder="Enter Question Title"> -->

                                          <textarea type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus placeholder="Enter Question option" rows="4"></textarea>

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


                                    </div>
                                  </div><!-- .tab-pane -->
                                </div><!-- .tab-content -->
                              </div><!-- .modal-body -->
                            </div><!-- .modal-content -->
                            <!-- Modal End -->


                            <div class="nk-tb-item">
                              <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                  <input type="checkbox" class="custom-control-input" id="uid1">
                                  <label class="custom-control-label" for="uid1"></label>
                                </div>
                              </div>
                              <div class="nk-tb-col">
                                <a href="{{ route('questions.show', $question->id) }}">
                                  <div class="user-card">

                                    <div class="user-info">
                                      <span class="tb-lead">

                                        {{ $question->name }}

                                      <span
                                        class="dot dot-success d-md-none ml-1"></span></span> 
                                    </div>
                                    </div>
                                  </a>
                                </div>

                                <div class="nk-tb-col tb-col-mb">
                                  <span class="tb-amount">{{ $question->description }}</span>
                                </div>


                                <div class="nk-tb-col tb-col-mb">
                            <!--   <a class="btn btn-sm btn-success" href="{{ route('options.create', $question->id) }}" title="Edit">
                                <span>Add Option</span>
                              </a> -->
                              <!-- <span class="tb-amount">{{ $question->description }}</span> -->

                              <button  data-toggle="modal" data-target="#details{{$question->id}}" class="btn btn-sm btn-warning"><em class="icon ni circle-plus"></em> Add Option</button>

                            </div>

                            <div class="nk-tb-col tb-col-md">

                              <a class="btn btn-sm btn-success" href="{{ route('questions.edit', $question->id) }}" title="Edit">
                                <span><em class="icon ni ni-pen-fill"></em></span>
                              </a>

                              <a class="btn btn-sm btn-info" href="{{ route('questions.show', $question->id) }}" title="Details">
                                <span><em class="icon ni ni-eye-fill"></em></span>
                              </a>

                              <a href="#" class="btn btn-sm btn-danger"
                              onclick="return myConfirm();">
                              <span><em class="icon ni ni-trash"></em></span>
                              </a>

                              <form id="delete-form-{{ $question->id }}" action="{{ route('questions.destroy', $question->id) }}"
                                method="POST" style="display: none;">
                                @csrf @method('delete')
                              </form>

                          </div> 
                        </div><!-- .nk-tb-item -->  
                      </div><!-- .modal-dialog -->
                    </div><!-- .modal -->
                    @endforeach                     
                  </div><!-- .nk-tb-list -->

                  <div>{{ $questions->links() }}</div>
                </div><!-- .card-inner -->

              </div><!-- .card-inner-group -->
            </div><!-- .card -->
          </div><!-- .nk-block -->
        </div>
      </div>
    </div>
  </div>



  <!-- content @e -->

  <script type="text/javascript">
    function myConfirm() {
      var result = confirm("Want to delete?");
      if (result==true) {
        @if(!empty($question->id))
        event.preventDefault(); document.getElementById('delete-form-{{ $question->id }}').submit();
        @endif
      } else {
       return false;
     }
   }
 </script>
 @endsection