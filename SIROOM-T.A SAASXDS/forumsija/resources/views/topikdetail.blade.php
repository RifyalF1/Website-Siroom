<!DOCTYPE html>
<html lang="en">
    <!--TUGAS AKHIR SAAS X DATA SCIENCE
    - KIKI AHMAD FAUZI
    - SOLIDEO MANUEL HASUGIAN
    - M.RIZA NURDIYANTO
    - DIMAS FIRMANSYAH
    - RIFYAL FADILLATUL ILMI
 -->
<head>
    <x-headapp />
</head>
<body>
    <x-user-navbar />
    <div class="w-full h-auto flex flex-col pt-3" style="background-color: #1E252B">
        <div class="flex flex-col lg:flex-row justify-between xl:mx-12 p-2">
            {{-- left --}}
            <div class="w-full h-auto lg:basis-[60%] lg:flex-grow-0 mr-0 lg:mr-2 mb-2 lg:mb-0">
                <div class="w-full h-full rounded-3xl p-6 mb-2" style="background-color: #424D56">
                    <form action="/topikdetail/edittopik/{{ $topik->id_topik }}" method="POST" enctype="multipart/form-data" class="flex flex-col w-auto p-6 bg-white rounded-2xl">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="flex">
                            <div class="rounded-lg m-1">
                                <img src="{{ url('/image/' . $topik->gambar) }}" id="imagePreview" alt="image" class="rounded-2xl w-36 h-36">
                                <input type="file" name="gambar" class="rounded-lg w-36 @if(Auth::user()->id != $topik->id) hidden @endif" onchange="previewImage(this)">
                            </div>
                            <input type="text" name="judul" class="rounded-2xl w-full m-1 text-white text-2xl font-semibold p-3 flex text-center items-center justify-center bg-gray-700 @if(Auth::user()->id != $topik->id) readonly @endif" 
                            value="{{ $topik->judul }}" @if(Auth::user()->id != $topik->id) readonly @endif>
                        </div>
                        <textarea name="deskripsi" cols="30" rows="33" class="rounded-2xl w-full m-1 text-white text-lg" style="background-color: #424D56"  @if(Auth::user()->id != $topik->id) readonly @endif>{{ $topik->deskripsi }}</textarea>
                        <div class="flex py-1 m-1 text-gray-900 justify-center items-center rounded-2xl" style="background-color: #424D56">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('image/' .$topik->user->profilephoto ) }}"
                                alt="Jese image">
                            <div class="ms-2 flex-col items-center">
                                <div class="font-semibold text-xs text-white mb-0">{{ $topik->user->name }}
                                </div>
                                <div class="font-semibold text-xs text-gray-200 mb-0" data-timestamp="{{ $topik->created_at }}"></div>
                            </div>
                            @if(Auth::user()->id == $topik->id)
                                <button type="submit"
                                    class="w-max-64 flex text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ms-3 me-2">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                    </svg>                                  
                                    Edit
                                </button>
                            @endif
                        </div>
                    </form>                    
                </div>
            </div>
            {{-- right --}}
            <div class="w-auto lg:basis-[40%] ml-0 lg:ml-2">
                <div class="w-full h-full rounded-3xl p-6 mb-2" style="background-color: #424D56">
                    <!-- Chat Start -->
                    <div class="flex flex-col flex-grow w-full h-[500px] md:h-[1200px] bg-white shadow-xl rounded-lg overflow-hidden">
                        <div class="flex flex-col flex-grow h-0 p-4 overflow-auto">
                            @foreach($komen as $k)
                                @if($k->id == Auth::user()->id)
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                                        <a href="/deletekomen/{{ $k->id_komen }}">
                                            <svg class="w-4 h-4 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                              </svg>
                                        </a>
                                        <div>
                                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                                <p class="text-sm">{{ $k->komentar }}</p>
                                                <p class="text-sm text-gray-200">- {{ $k->user->name }}</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">{{ $k->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300">
                                            <img src="{{ url('/image/' . Auth::user()->profilephoto) }}" alt="User Image" class="h-10 w-10 rounded-full object-cover object-center">
                                        </div>
                                    </div>
                                @else
                                    <div class="flex w-full mt-2 space-x-3 max-w-xs">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300">
                                            <img src="{{ url('/image/' . $k->user->profilephoto) }}" alt="User Image" class="h-10 w-10 rounded-full object-cover object-center">
                                        </div>
                                        <div>
                                            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                                <p class="text-sm">{{ $k->komentar }}</p>
                                                <p class="text-sm text-gray-700">- {{ $k->user->name }}</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">{{ $k->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        
                        <div class="bg-gray-300 p-4 flex">
                            <form action="/komen/{{ $topik->id_topik }}" class="flex w-full">
                                <input class="flex-grow h-10 rounded-l px-3 text-sm" name="komentar" type="text" placeholder="Type your message…">
                                <button type="submit" class="w-10 h-10 text-white bg-blue-600 flex justify-center items-center p-1 rounded-tr-lg rounded-br-lg">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="m9 5 7 7-7 7"/>
                                    </svg>
                                </button>
                            </form>
                        </div>                        
                    </div>
	                <!-- Chat End  -->
                </div>
            </div>
        </div>
    </div>

    @if ($massage = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ $massage }}'
            });
        </script>
    @endif
</body>
</html>