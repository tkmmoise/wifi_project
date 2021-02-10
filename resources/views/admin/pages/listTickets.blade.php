@extends('admin.adminDash')
@section('admin_content')

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List Tickets</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Remaining List Tickets 
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Login</th>
                            <th scope="col">Password</th>
                            <th scope="col">Type</th>
                            <th scope="col">Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tickets->isNotEmpty())
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td> {{$ticket->login}} </td>
                                    <td> {{$ticket->password}} </td>
                                    <td> {{$ticket->type}} </td>
                                    <td> {{$ticket->heure}} </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"> {{"No tickets"}} </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$tickets->links()}}


    
@endsection