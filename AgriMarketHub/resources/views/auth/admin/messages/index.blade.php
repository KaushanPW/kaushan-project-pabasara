@extends('layouts.admin')

@section('content')
<style>
    /* Admin Layout */
    .admin-container {
        display: flex;
        min-height: 100vh;
        background-color: #f8fafc;
    }

    .admin-sidebar {
        width: 250px;
        background-color: #1e293b;
        color: white;
        position: fixed;
        height: 100%;
    }

    .admin-content {
        flex: 1;
        margin-left: 250px;
        padding: 2rem;
    }

    /* Content Header */
    .content-header {
        margin-bottom: 2rem;
    }

    .content-header h2 {
        color: #1e293b;
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0;
    }

    /* Table Styles */
    .table-responsive {
        overflow-x: auto;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table thead {
        background-color: #f1f5f9;
    }

    .data-table th {
        padding: 1rem 1.25rem;
        text-align: left;
        font-weight: 600;
        color: #334155;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid #e2e8f0;
    }

    .data-table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #e2e8f0;
        color: #475569;
        font-size: 0.875rem;
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    .data-table tbody tr:hover {
        background-color: #f8fafc;
    }

    /* Message Column */
    .data-table td:nth-child(5) {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .admin-sidebar {
            width: 100%;
            position: relative;
            height: auto;
        }

        .admin-content {
            margin-left: 0;
            padding: 1rem;
        }

        .data-table th, 
        .data-table td {
            padding: 0.75rem;
        }
    }
</style>

<div class="admin-container">
    <aside class="admin-sidebar">
        @include('admin.partials.sidebar')
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Customer Messages</h2>
        </div>
        
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Received</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ Str::limit($message->message, 50) }}</td>
                        <td>{{ $message->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection