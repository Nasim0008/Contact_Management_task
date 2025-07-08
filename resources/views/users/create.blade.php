<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px;">

    <div style="max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Create a Contact Message</h2>
        <!-- Display All Errors (Optional) -->
    @if($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

     @endif
        <!-- Success Message -->
        @if(session()->has('success'))
            <div style="color: green; font-size: 18px; margin-bottom: 20px; text-align: center; border: 1px solid #c3e6cb; background-color: #d4edda; padding: 10px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contact Form -->
        <form action="{{ route('admin.store') }}" method="post">
            @csrf

            <input type="text" name="name" placeholder="Enter Name" 
                style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
            
            <input type="text" name="email" placeholder="Enter Email" 
                style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
            
            <input type="text" name="subject" placeholder="Enter Subject" 
                style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
            
            <textarea name="message" rows="5" placeholder="Write a message" 
                style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; resize: vertical;"></textarea>
            
            <button type="submit"
                style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Submit
            </button>
        </form>
    </div>

</body>
</html>
