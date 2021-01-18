@extends('dashboard.master.app')
@section('title')
    School Edit
@endsection
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">School</h4>
             
        </div>
    </div>
    <div class="row g-gs"> 
        <div class="col-lg-12">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-head">
                        <h5 class="card-title">Add School</h5>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('school.update',$school->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-lg-8">
                            <label class="form-label" for="name">School Name</label>
                            <input type="text" value="{{$school->name}}" required class="form-control" id="name" name="name">

                        </div> 
                        <div class="form-group col-lg-8">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->
<input type="hidden" id="success" value="{{Session::get('success')}}" />
@endsection
@section('scripts')
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