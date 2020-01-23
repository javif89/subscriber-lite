@extends('layouts.app')

@section('content')
<div id="dashboard">
    <div class="container">
        <add-subscriber-form @created="addSubscriber"></add-subscriber-form>
        <edit-subscriber-form :subscriber="editableSubscriber" :show="showEditForm" @close="showEditForm=false"></edit-subscriber-form>
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
                                <td>@{{s.state | capitalize}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm mr-2 btn-primary" @click="editSubscriber(s.id)">Edit</button>
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
                subscribers: {!! json_encode(Auth::user()->subscribers) !!},
                editableSubscriber: undefined,
                showEditForm: false
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
                },
                editSubscriber(id) {
                    let subscriber = this.subscribers.find(sub => sub.id == id);
                    this.editableSubscriber = subscriber;
                    this.showEditForm = true;
                }
            },
            filters: {
                capitalize: function (value) {
                    if (!value) return ''
                    value = value.toString()
                    return value.charAt(0).toUpperCase() + value.slice(1)
                }
            }
        });
    </script>
@endpush
