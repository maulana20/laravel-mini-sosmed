<a href="{{ route('user.show', $notif->data['notifier_user_id']) }}">{{ $notif->data['name'] }}</a> {{ $notif->data['message'] }}
<a href="{{ route('post.show', $notif->data['post_id']) }}">post</a>.
<span class="pull-right">{{ $notif->created_at->diffForHumans() }}</span>
