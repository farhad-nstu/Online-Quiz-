@extends('dashboard.master.app')
@section('title')
    Class List
@endsection
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title text-warning">Class List</h4>
            <div class="nk-block-des">
                <p>all class</p>
            </div>
        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                 <tbody>
                    @forelse ($classes as $class)
                    <tr> 
                        <td>{{$loop->index+1}}</td>
                        <td>{{$class->name}}</td>  
                        <td>
                            <a href="{{route('class.edit',$class->id)}}" class="btn btn-warning"><em class="icon ni ni-edit"></em></a> 
                            <form action="{{route('class.destroy',$class->id)}}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><em class="icon ni ni-trash"></em></button>
                            </form> 
                        </td>  
                    </tr>
                    @empty
                    <h2 class="alert alert-warning">There is no class</h2>
                     @endforelse
                 </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->
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