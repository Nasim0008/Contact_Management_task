<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Contact Table</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f0f2f5; padding: 40px;">

    <!-- Success Message -->
    @if (session()->has('success'))
        <div
            style="color: green; font-size: 18px; margin-bottom: 20px; text-align: center; border: 1px solid #c3e6cb; background-color: #d4edda; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('admin.logout') }}" method="GET" style="display: inline-block; margin-top: 10px;">
        <button type="submit"
            style="padding: 8px 16px; background-color: #ef4444; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Logout
        </button>
    </form>

    <!-- Search Form -->
    <div style="display: flex; justify-content: flex-end; padding: 20px;">
        <form action="{{ route('admin.search') }}" method="get" style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Search by name"
                style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 200px; font-size: 14px;">
            <button type="submit"
                style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;">
                Search
            </button>
        </form>
    </div>

    <!-- Contact Table -->
    <table border="1" cellpadding="10" cellspacing="0"
        style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <caption style="caption-side: top; font-size: 24px; font-weight: bold; margin-bottom: 20px;">
            Contact Table
        </caption>

        <!-- Table Headers -->
        <tr style="background-color: #007bff; color: white; text-align: center;">
            <th style="padding: 10px;">ID</th>
            <th style="padding: 10px;">Name</th>
            <th style="padding: 10px;">Email</th>
            <th style="padding: 10px;">Subject</th>
            <th style="padding: 10px;">Message</th>
            <th style="padding: 10px;">Status</th>
            <th style="padding: 10px;">Action</th>
        </tr>

        <!-- Table Rows -->
        @foreach ($contacts as $contact)
            <tr style="text-align: center;">
                <td style="padding: 10px;">{{ $contact->id }}</td>
                <td style="padding: 10px;">{{ $contact->name }}</td>
                <td style="padding: 10px;">{{ $contact->email }}</td>
                <td style="padding: 10px;">{{ $contact->subject }}</td>
                <td style="padding: 10px;">{{ \Illuminate\Support\Str::limit($contact->message, 30) }}</td>

                <!-- Status and View Button -->
                <td style="padding: 10px;">
                    @if ($contact->viewed)
                        <span style="color: #6c757d; font-size: 13px; margin-right: 8px;">Viewed</span>
                    @else
                        <span style="color: #28a745; font-weight: bold; font-size: 13px; margin-right: 8px;">New</span>
                    @endif

                    <a href="{{ route('admin.message', $contact->id) }}" style="text-decoration: none;">
                        <button
                            style="padding: 5px 12px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 13px;">
                            View
                        </button>
                    </a>
                </td>

                <!-- Delete Button -->
                <td style="padding: 10px;">
                    <form action="{{ route('admin.delete', $contact->id) }}" method="POST" style="display: inline;"
                        onsubmit="return confirm('Confirm to delete');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="padding: 5px 12px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 13px;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $contacts->links() }}
    </div>

</body>

</html>
