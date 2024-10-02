@extends('admin.dashboard')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-2">
        <!-- Contact rivew card -->
        <div class="row">
            <div class="col-6">
                <div class="card bg-primary">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">
                                <h2 class="text-white">Total Contact </h2>
                            </div>
                            <div class="stat-digit text-white">  <i class="fa fa-users"></i> {{ $totalContacts }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card bg-info">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">
                                <h2 class="text-white">Today Contact</h2>
                            </div>
                            <div class="stat-digit text-white">  <i class="ti-bookmark-alt"></i> {{ $todayContacts }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped ">
                <thead class="table-primary">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Message</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name}}</td>
                            <td>{{ $contact->email}}</td>
                            <td>{{ $contact->mobile}}</td>
                            <td>{{ $contact->subject}}</td>
                            <td>{{ $contact->message}}</td>
                            <td>
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="ti-trash"></i></button>
                                </form>
                                
                            </td>
                        </tr> 
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>
@endsection