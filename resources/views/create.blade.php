<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <div class="container px-10 py-5 mx-auto">
        <div class="flex justify-between px-5 py-2">
        
        <h2 class="text-red-500">Create</h2>
        <a href="/" class="bg-green-600 text-white py-2 px-5 rounded"> Back To Home</a>


        </div>
        <div class="w-1/1 mx-auto">
            <form method="post" action="{{ route('store') }}" enctype="multipart/form-data" class="bg-white p-5 rounded shadow-md">
            @csrf    
            <label for="">Name</label>
                <input type="text" placeholder="Name" name="name" value="{{ old('name')}}" class="border border-gray-300 rounded px-3 py-2 mb-4 w-full">
                @error('name')
                <div class="alert alert-danger bg-red-500">{{ $message }}</div>
                @enderror

                <label for="">Email</label>
                <input type="email" placeholder="Email" name="email"  value="{{ old('email')}}" class="border border-gray-300 rounded px-3 py-2 mb-4 w-full">
                 @error('email')
                 <div class="alert alert-danger bg-red-500">{{ $message }}</div>
                 @enderror

                <label for="">Select Image</label><br>
                <input type="file" name="image" class="border  rounded  py-2 mb-4" >
                <input type="submit" value="Submit" class="bg-blue-500 text-white py-2 px-5 rounded cursor-pointer">
                <div class="flex justify-end mb-4">
                   <a href="{{ route('home') }}" class="bg-gray-600 text-white px-4 py-2 rounded inline-block">Back to Home</a>
               </div>
            </form>
            
        </div>
        
   
    </div>
</body>
</html>