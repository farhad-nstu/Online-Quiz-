@extends('dashboard.master.app')
@section('title')
    Question List
@endsection
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title text-warning">Qustion List</h4>
            <div class="nk-block-des">
                <p>All Question</p>
            </div>
            <div class="float-right mb-3">
              <a href="{{ route('questions.create') }}" class=" btn btn-icon btn-primary"><em
              class="icon ni ni-plus"></em>
              </a>
            </div>
        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th> 
                        <th>Details</th> 
                        <th>Option</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                 <tbody> 
                     @forelse ($questions as $question)
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
                        <tr> 
                            <td>{{$loop->index + 1}}</td> 
                            <td>
                                <a href="{{ route('questions.show', $question->id) }}">{{ $question->name }}</a>
                            </td> 
                            <td>{{ $question->description }}</td> 
                            <td>
                                <button  data-toggle="modal" data-target="#details{{$question->id}}" class="btn btn-sm btn-warning"><em class="icon ni circle-plus"></em> Add Option</button>
                            </td> 
                            <td>
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
                            </td> 
                        </tr> 
                     @empty
                         
                     @endforelse
                    
                 </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->
<input type="hidden" id="success" value="{{Session::get('success')}}" />
@endsection

@section('scripts')

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

    @if (Session::get('success')) 
    <script>
        var message = $('#success').val();  
        if(message){
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
        });
        e.preventDefault(); 
        }
    </script> 
     
    @endif 
@endsection