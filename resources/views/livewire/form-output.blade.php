<div>
    <div class="container w-9/12 m-auto p-12">
        <table>
            @foreach($formOutput as $key => $output)
            @if($key !== 'dob_month' && $key !== 'dob_day' && $key !== 'dob_year' &&
                $key !== 'dom_month' && $key !== 'dom_day' && $key !== 'dom_year')
                <tr>
                    @if($key === 'dob')
                        <th>Date of Birth</th>
                        <td>{{ $output }}</td>
                    @elseif($key === 'dom')
                        <th>Date of Marriage</th>
                        <td>{{ $output }}</td>
                    @else
                        <th>{{ str_replace("_", " ", $key) }}</th>
                        <td>{{ $output }}</td>
                    @endif

                </tr>
            @endif
            @endforeach
        </table>
    </div>

    <style>
        th, td {
            padding: 15px;
            }
    </style>
</div>
