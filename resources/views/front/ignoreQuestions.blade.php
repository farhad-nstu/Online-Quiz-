
<div>
    <h5 class="text-info">{{$questionSi}}.&nbsp;{{ $questionName }}</h5>
    <div class="ans">
      @php 
      $options = App\Models\Option::where('question_id', $questionId)->get();
      @endphp
      @foreach($options as $option)
      <label class="custom-control custom-radio">
        <input
        type="radio"
        name="answers[{{ $questionId }}]"
        value="{{ $option->id }}"
        onclick="count_mark(`{{ $questionId }}`, `{{ $option->id }}`);"
        >
        {{ $option->option_name }}
      </label>
      @endforeach
    </div> 
  </div>
  
  <div>
    {{-- <button class="btn btn-sm btn-primary" onclick="submit_ignore_answer()">সাবমিট কর</button> --}}
    <button class="btn btn-sm btn-primary" onclick="ignore_question()">সাবমিট কর</button>
  </div>

