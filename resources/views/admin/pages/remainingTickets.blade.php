@extends('admin.adminDash')
@section('admin_content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Remaining and Sold Tickets</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-ticket-alt mr-1"></i>
        Remaining and Sold Tickets
    </div>
    <div class="card-body">
        <h5 class="card-title">Number of Remaining Tickets : 
            @if ($NumbremainingTickets != 0)
                    {{$NumbremainingTickets}}
            @else
                {{"No tickets, Please Reload Tickets"}}
            @endif
        </h5>
            
        <h5 class="card-title">Number of Sold Tickets : ??</h5>
    </div>
</div>
@endsection