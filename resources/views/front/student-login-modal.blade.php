<div class="modal fade" tabindex="1" id="studentLoginForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-info ">
                    <h5 class="modal-title">Student Login form</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" method="POST" action="{{ route('login') }}">
                      @csrf
                        <input type="hidden" name="role" value="student">

                        <div class="form-group">
                            <label class="form-label" for="full-name">স্কুলের নাম</label>
                            <div class="form-control-wrap">
                                <select name="school" class="form-control form-control-lg" required>
                                    <option value="">স্কুলের নাম</option>
                                    @forelse (\App\Models\School::get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="full-name">শ্রেণি</label>
                            <div class="form-control-wrap">
                                <select name="class" class="form-control form-control-lg" required>
                                    <option value="">শ্রেণি</option>
                                    @forelse (\App\Models\ClassName::get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email-address">Roll</label>
                            <div class="form-control-wrap">
                                <input type="text" name="roll" class="form-control @error('password') is-invalid @enderror" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
