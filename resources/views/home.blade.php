@extends('layouts.app')

@section('content')
<div id="dashboard">
    <div class="container">
        <add-subscriber-form @created="addSubscriber"></add-subscriber-form>
        <div class="mt-3">
            <div class="subscriber-list">
                <h3>My Subscribers</h3>
                <div class="mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>State</td>
                                <td>State</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="s in subscribers" :key="s.id">
                                <td>@{{s.name}}</td>
                                <td>@{{s.email}}</td>
                                <td>@{{s.state}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm mr-2 btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger" @click="deleteSubscriber(s.id)">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
                },
                deleteSubscriber(id) {
                    let url = route('subscriber.destroy', {subscriber: id});

                    window.axios.delete(url)
                    .then(() => {
                        this.subscribers = this.subscribers.filter(sub => {
                        return sub.id !== id;
                        });
                    }).catch((response) => {
                        console.log(response.data);
                    });
                }
            }
        });
    </script>
@endpush
