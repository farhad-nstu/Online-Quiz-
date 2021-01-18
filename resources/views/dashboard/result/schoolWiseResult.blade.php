<table class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Score</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $result->name }}</td>
                <td>{{ $result->total_score }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
