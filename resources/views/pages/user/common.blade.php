<span class="badge badge-danger">{{ $user->is_blocked ? __('common.blocked_user') : '' }}</span>
<a class="btn btn-danger float-left" href="Javascript:void(0)" onclick="document.getElementById('user_block_form').submit()">
    {{ $user->is_blocked ? __('common.unblock_user') : __('common.block_user') }}

</a>

<form id="user_block_form" action="{{route('users.block_toggle', $user->id)}}" method="post">
    @csrf
    @method('patch')
</form>


