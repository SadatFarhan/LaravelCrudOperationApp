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
        
        <h2 class="text-red-500">Hello - {{$post->name}}</h2>
        <a href="/" class="bg-green-600 text-white py-2 px-5 rounded"> Back To Home</a>


        </div>
        @if (session('message'))
       
         <h2> {{ session('message') }}</h2>  
        
        @endif
        <div>
            <div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
         <div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">ID</th>
              <th class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
              <th class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Email</th>
              <th class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Image</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $post->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->email }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                <img src="{{ asset('images/' . $post->image) }}" alt="Image" class="h-16 w-16 object-cover rounded" />
                <div class="text-xs text-gray-400 mt-1">{{ asset('images/' . $post->image) }}</div>
              </td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <a  href="{{route('edit', $post->id)}}" type="button" class=" btn bg-yellow-600 inline-flex items-center gap-x-2  font-semibold rounded border border-transparent text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Edit</a>
               <a  href="{{route('delete', $post->id)}}" type="button" class=" btn bg-red-600 inline-flex items-center gap-x-2  font-semibold rounded  border border-transparent text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</a>             

              </td>
            </tr>
          </tbody>
        </table>
          <div class="flex justify-end mb-4">
          <a href="{{ route('home') }}" class="bg-gray-600 text-white px-4 py-2 rounded inline-block">Back to Home</a>
         </div>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</body>
</html>