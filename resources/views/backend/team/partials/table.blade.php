<tr>
    <td>{{++$key}}</td>
    <td>{{ str_limit($teams->name, 47) }}</td>
    <td>{{ str_limit($teams->designation, 47) }}</td>
    <td class="text-center">
        @if($teams->is_published =='1')
            <span class="btn-primary btn-success">{{$teams->is_published ? 'Yes' : 'No'}}</span>
        @elseif($teams->is_published =='0')
            <span class="btn-primary btn-danger">{{$teams->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>

    <td class="text-right">
        <a href="{{route('team.edit', $teams->id)}}" class="btn btn-flat btn-primary btn-xs">
            Edit
        </a>
        <button type="button" data-url="{{ route('team.destroy', $teams->id) }}"
                class="btn btn-flat btn-primary btn-xs item-delete">
            Delete
        </button>
    </td>

</tr>