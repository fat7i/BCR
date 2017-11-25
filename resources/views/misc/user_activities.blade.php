<div class="app-title">
    <h4>Recent Activities</h4>
    <div class="line"></div>
</div>

<table class="bordered striped" style="text-transform: capitalize;">
    @foreach($activities as $act)
        <tr>
            <td>
                &nbsp;
                @if($act->action=='visit')
                    <i class="fa fa-eye"></i>
                @elseif($act->action=='update')
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                @elseif($act->action=='comment')
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                @elseif($act->action=='add')
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                @else
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                @endif

                &nbsp;

                {{ $act->action }}
                    <a href="{{ action('ProductController@show', ['id' => $act->product->barcode]) }}">
                        <div class="chip">
                            {{ $act->product->title }}
                        </div>
                    </a>
                {{ $act->created_at->diffForHumans(null, false, true) }}
            </td>
        </tr>
    @endforeach
</table>