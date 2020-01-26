@extends('layouts.app')

@section('content')
<div id="dashboard">
    <div class="container">
        <add-subscriber-form @created="addSubscriber"></add-subscriber-form>
        <edit-subscriber-form :subscriber="editableSubscriber" :show="showEditForm" @close="showEditForm=false"></edit-subscriber-form>
        <div class="mt-3">
            <div class="subscriber-list">
                <h3>My Subscribers <span class="badge badge-pill badge-primary">@{{subscriber_list.length}}</span></h3>
                <div class="filter-bar py-3">
                    <div class="row">
                        <div class="col-lg-8">
                            <input v-model="search" type="text" class="form-control" placeholder="Search...">
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-2 verticenter">Status:</div>
                                <div class="col">
                                    <select v-model="selectedState" id="" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="unsubscribed">Unsubscribed</option>
                                        <option value="junk">Junk</option>
                                        <option value="bounced">Bounced</option>
                                        <option value="unconfirmed">Uncomfirmed</option>
                                    </select>
                                </div>
                                <div class="col-2 text-right">
                                    <h3><span class="badge badge-primary">@{{subscribers.length}}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="subscriber" v-for="s in subscribers" :key="s.id">
                        <div class="row">
                            <div class="col-1">
                                <img src="/img/avatar.png" alt="" class="img-fluid">
                            </div>
                            <div class="col verticenter">@{{s.name}}</div>
                            <div class="col verticenter">@{{s.email}}</div>
                            <div class="col verticenter">@{{s.state | capitalize}}</div>
                            <div class="col verticenter">
                                <div class="d-flex">
                                    <button class="btn btn-sm mr-2 btn-primary" @click="editSubscriber(s.id)">Edit</button>
                                    <button class="btn btn-sm btn-danger" @click="deleteSubscriber(s.id)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                subscriber_list: {!! json_encode(Auth::user()->subscribers) !!},
                editableSubscriber: undefined,
                showEditForm: false,
                selectedState: "active",
                search: ""
            },
            computed: {
                subscribers() {
                    let subscribers = [];

                    if(this.search == "") {
                        subscribers = this.subscriber_list.filter(sub => {
                            return sub.state == this.selectedState;
                        });
                    }
                    else {
                        subscribers = this.subscriber_list.filter(sub => {
                            return sub.name.toLowerCase().includes(this.search.toLowerCase()) || sub.email.includes(this.search.toLowerCase());
                        });
                    }

                    return subscribers;
                }
            },
            methods: {
                addSubscriber(data) {
                    this.subscriber_list.push(data);
                },
                deleteSubscriber(id) {
                    let url = route('subscriber.destroy', {subscriber: id});

                    window.axios.delete(url)
                    .then(() => {
                        this.subscriber_list = this.subscriber_list.filter(sub => {
                        return sub.id !== id;
                        });
                    }).catch((response) => {
                        console.log(response.data);
                    });
                },
                editSubscriber(id) {
                    let subscriber = this.subscriber_list.find(sub => sub.id == id);
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
