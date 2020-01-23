@extends('layouts.app')

@section('content')
<div id="dashboard">
    <div class="container">
        <add-subscriber-form></add-subscriber-form>
        <div class="mt-3">
            <subscriber-list></subscriber-list>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        new window.Vue({
            el: "#dashboard"
        });
    </script>
@endpush
