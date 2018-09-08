@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>notifications</h1>
            @foreach ($notifications as $notification)
                <div class="alert alert-info">
                    <p>{{ $notification->data['user']['name'] }} Commented on Your article " <a href="# "
                        onclick="
                            document.getElementById('notification-id').value = '{{ $notification->id }}';
                            document.getElementById('redirect').value = '{{ route('article.show', $notification->data['article']['slug']) }}';
                            document.getElementById('read-notification').submit();">
                            {{ $notification->data['article']['title'] }}</a>"</p>
                </div>

                <form action="{{ route('read.notification') }}" style="display:none" id="read-notification" method="post">
                    @csrf
                    <input type="hidden" name="notification_id" id="notification-id" value="">
                    <input type="hidden" name="redirect" id="redirect" value="">
                    <input type="submit" value="Ok">
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection