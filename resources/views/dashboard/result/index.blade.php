@extends('dashboard.master.app')
@section('title')
    Student Result
@endsection
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title text-warning">Student Result</h4>
                <div class="nk-block-des row">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <select name="school" class="form-control form-control-lg"
                                onchange="get_student_result(this.value);">
                                <option value="">Select School</option>
                                @forelse (\App\Models\School::get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="card card-preview">
            <div class="card-inner" id="school">
                @foreach ($schools as $school)
                    <?php $schools = App\Models\School::all(); ?>
                    @foreach ($schools as $scl)
                        @if ($scl->id == $school->school)
                            <h5 class="text-info py-5">{{ $scl->name }}</h5>
                        @endif
                    @endforeach
                    <table class="table datatable-init">
                        <thead>
                          
                        </thead>

                        <?php
                        $min_number = (30 * 120) / 100;
                        $i = 1;
                        $results = App\StudentRegistration::where('school', $school->school)
                        ->where('total_score', '>', $min_number)
                        ->orderBy('total_score', 'desc')
                        ->take(10)
                        ->get();
                        ?>

                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->total_score }}</td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    <script>
        function get_student_result(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: '{{ url('admin/school-result') }}',
                data: {
                    school_id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#school').empty().html(data);
                }
            });
        }

    </script>
@endsection
