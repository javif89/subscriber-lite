@extends('layouts.app')

@section('content')
<div id="dashboard">
    <div class="container">
        <add-subscriber-form @created="addSubscriber"></add-subscriber-form>
        <div class="mt-3">
            <subscriber-list :subscribers="subscribers"></subscriber-list>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        new window.Vue({
            el: "#dashboard",
            data: {
                subscribers: {!! json_encode(Auth::user()->subscribers) !!}
            },
            methods: {
                addSubscriber(data) {
                    this.subscribers.push(data);
                }
            }
        });
    </script>
@endpush
