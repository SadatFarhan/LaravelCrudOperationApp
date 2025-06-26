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
        
        <h2 class="text-red-500">Hello Laravel</h2>
        <a href="/create" class="bg-green-600 text-white py-2 px-5 rounded"> Add New</a>


        </div>
        @if (session('message'))
       
         <h2> {{ session('message') }}</h2>  
        
        @endif
        <div>
            <div class="flex flex-col">
     <form action="{{ route('search') }}" method="GET" class="mb-4 flex gap-2">
    <input type="text" name="name" placeholder="Search by name or ID" class="border px-3 py-2 rounded w-64" value="{{ request('query') }}">
    <a href="/"  type="submit" class="bg-blue-600 text-white px-4 py-2 rounded"> Search</a>
   
      </form>
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
              <th scope="col" class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">ID</th>
              <th scope="col" class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
               <th scope="col" class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Email</th>
              <th scope="col" class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Image</th>
              <th scope="col" class="px-6 py-4 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach ($posts as $post)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$post->id}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->email}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                <img src="{{ asset('images/' . $post->image) }}" alt="Image" class="h-16 w-16 object-cover rounded" />
                <div class="text-xs text-gray-400 mt-1">{{ asset('images/' . $post->image) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <a  href="{{route('edit', $post->id)}}" type="button" class=" btn bg-yellow-600 inline-flex items-center gap-x-2  font-semibold rounded border border-transparent text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Edit</a>
               <a  href="{{route('delete', $post->id)}}" type="button" class=" btn bg-red-600 inline-flex items-center gap-x-2  font-semibold rounded  border border-transparent text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</a>             
               <a  href="{{route('view', $post->id)}}" type="button" class=" btn bg-green-600 inline-flex items-center gap-x-2  font-semibold rounded  border border-transparent text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">View</a>             
             
              </td>
            </tr>

            @endforeach
           
         
          </tbody>
        </table>
        <div class="flex justify-end mb-4">
          <a href="{{ route('home') }}" class="bg-gray-600 text-white px-4 py-2 rounded inline-block">Back to Home</a>
         </div>
        
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</body>
</html>