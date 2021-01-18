@foreach($options as $option) 
                            <!-- Modal Start -->
                            <div class="modal fade zoom" tabindex="-1" role="dialog" id="details{{$option->id}}">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                  <div class="modal-body modal-body-lg">
                                    <h5 class="title">Details</h5>
                                    <ul class="nk-nav nav nav-tabs">
                                      <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal">Lead Details</a>
                                      </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="tab-content">
                                      <div class="tab-pane active" id="personal">

                                      </div><!-- .tab-pane -->


                                      <form method="POST" action="{{route('options.update', $option->id)}}">
                                        @csrf

                                        <div class="form-group">
                                          <label class="form-label" for="name">Option Title<span style="color: red">*</span></label>
                                          <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ $option->option_name }}" name="name" id="name" required autocomplete="name" autofocus>

                                          @error('name')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>

                                        <div class="form-group">
                                          <button type="submit" class="btn btn-lg btn-primary btn-block">Update Option</button>
                                        </div>
                                      </form>

                                    </div>
                                  </div><!-- .tab-pane -->
                                </div><!-- .tab-content -->
                              </div><!-- .modal-body -->
                            </div><!-- .modal-content -->
                            <!-- Modal End -->


                            <div class="nk-tb-item">

                              <div class="nk-tb-col">
                                <a href="">
                                  <div class="user-card">

                                    <div class="user-info">
                                      <span class="tb-lead">

                                        {{ $option->id }}

                                      <span
                                        class="dot dot-success d-md-none ml-1"></span></span> 
                                    </div>
                                  </div>
                                </a>
                              </div>

                              <div class="nk-tb-col">
                                <a href="">
                                  <div class="user-card">

                                    <div class="user-info">
                                      <span class="tb-lead">

                                        {{ $option->option_name }}

                                      <span
                                        class="dot dot-success d-md-none ml-1"></span></span> 
                                    </div>
                                    </div>
                                  </a>
                                </div>


                                <?php if(empty($option->is_selected)) { ?>
                                <div class="nk-tb-col">
                                  
                                  <a onclick="answer_select(`{{ $question->id }}`, `{{ $option->id }}`)" class="btn btn-sm btn-info">
                                    <span class="tb-lead">
                                         Is_answer
                                    </span> 
                                  </a>
                  
                                </div>
                                <?php } else { ?>
                                <div class="nk-tb-col">
                                  <a class="btn btn-sm btn-info">
                                    <span class="tb-lead">
                                       
                                      selected answer
                                    </span> 
                                  </a>                  
                                </div>
                                <?php } ?>




                            <div class="nk-tb-col tb-col-md">

                              <a data-toggle="modal" data-target="#details{{$option->id}}" class="btn btn-sm btn-success">
                                <span><em class="icon ni ni-pen-fill"></em></span>
                              </a>

                          </div> 
                        </div><!-- .nk-tb-item -->  
                        @endforeach 