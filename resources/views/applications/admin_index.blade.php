@extends('laratrust::panel.layout')
@section('title', 'Applications')
@section('content')

<div class="flex flex-col">
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
          <thead>
            <tr>
              <th class="th">Application Id</th>
              <th class="th">Application Type</th>
              <th class="th">Employee</th>
              <th class="th">Amount of Days</th>
              <th class="th">Status</th>
              <th class="th"></th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($applications as $application)
            <tr>
              <td class="td text-sm leading-5 text-gray-900">
                {{$application->id}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$application->type}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$application->author}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$application->amount}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$application->status}}
              </td>
              <td class="flex justify-end px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                <a class="text-blue-600 hover:text-blue-900" href="{{ route('applications.show',$application->id) }}">Show</a>

                <form action="{{ route('applications.destroy',$application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the course?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
{{ $applications->links('laratrust::panel.pagination') }}
@endsection