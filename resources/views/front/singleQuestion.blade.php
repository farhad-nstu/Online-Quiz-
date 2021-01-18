
<div>
  <h5 class="text-info">{{ $si }}.&nbsp;{{ $question->name }}</h5>
  <div class="ans">
    @php 
    $options = App\Models\Option::where('question_id', $question->id)->get();
    @endphp
    @foreach($options as $option)
    <label class="custom-control custom-radio">
      <input
      type="radio"
      name="answers[{{ $question->id }}]"
      value="{{ $option->id }}"
      onclick="count_mark(`{{ $question->id }}`, `{{ $option->id }}`);"
      >
      {{ $option->option_name }}
    </label>
    @endforeach
  </div> 
</div>

<div>
  <button class="btn btn-sm btn-primary" onclick="submit_answer(`{{$question->id}}`)">সাবমিট কর</button>
  @if($question->id != 1)
  <button class="btn btn-sm btn-primary" onclick="skip_now(`{{$question->id}}`, `{{$question->name}}`, `{{$si}}`)">পরে দেব</button>
  @endif
</div>