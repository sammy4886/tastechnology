<tr>
    <td>{{++$key}}</td>
    <td>{{ str_limit($documents->title, 47) }}</td>
    <td class="text-center">
        @if($documents->is_published =='1')
            <span class="btn-primary btn-success">{{$documents->is_published ? 'Yes' : 'No'}}</span>
        @elseif($documents->is_published =='0')
            <span class="btn-primary btn-danger">{{$documents->is_published ? 'Yes' : 'No'}}</span>
        @endif
    </td>

    <td class="text-right">
        <a href="{{route('document.edit', $documents->slug)}}" class="btn btn-flat btn-primary btn-xs">
            Edit
        </a>
        <button type="button" data-url="{{ route('document.destroy', $documents->slug) }}"
                class="btn btn-flat btn-primary btn-xs item-delete">
            Delete
        </button>
    </td>

</tr>