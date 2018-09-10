    <tr>
        <td>{{ str_limit($notice->author,10) }}</td>
        <td >
            <span class="badge">{{ $notice->is_published ? 'Yes' : 'No' }}</span>
        </td>
        <td> {{ str_limit($notice->date, 14) }}</td>
        <td> {{ str_limit($notice->type, 14) }}</td>
        <td> {{ str_limit($notice->title, 14) }}</td>
        <td> {{ str_limit($notice->content, 14) }}</td>
        <td> {{ str_limit($notice->quote, 14) }}</td>
        <td class="text-center"><span>{{ $notice->view }}</span>
        </td>
        {{--<td class="text-center">--}}
        {{--<span>{{ $notice->content }}</span>--}}
        {{--</td>--}}


        <td class="text-right">
            <a href="{{route('notice.edit', $notice->id)}}" class="btn btn-flat btn-primary btn-xs">
                Edit
            </a>
            <button type="button" data-url="{{route('notice.destroy', $notice->id)}}" class="btn btn-flat btn-primary btn-xs item-delete">
                Delete
            </button>
        </td>
    </tr>