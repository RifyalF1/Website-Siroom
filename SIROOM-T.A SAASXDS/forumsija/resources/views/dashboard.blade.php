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

    <div class="w-full h-auto flex flex-col" style="background-color: #1E252B">
        <div class="lg:mx-24 p-2 my-3">
            {{-- NAMA --}}
            <h1 class="text-4xl text-blue-300">Hai {{ Auth::user()->name }},</h1>
            <p class="text-2xl text-blue-300">What do you want to start today?</p>
        </div>
        <div class="flex flex-col lg:flex-row justify-between xl:mx-12 p-2">
            {{-- div kiri --}}
            <div class="w-full h-auto lg:basis-[65%] lg:flex-grow-0 mr-0 lg:mr-2 mb-2 lg:mb-0 overflow-y-auto">
                {{-- create --}}
                <div class="w-full h-auto flex p-4 rounded-3xl mb-5" style="background-color: #424D56">
                    <form action="/tambahtopik" method="POST" enctype="multipart/form-data" class="flex w-full items-center">
                        @csrf
                        <img src="{{ asset('image/Image_Icon.png') }}" id="imagePreview" style="object-fit: cover"
                            alt="image" class="rounded-2xl w-32 h-32">
                        <div class="mx-3 w-full">
                            <input type="text" name="judul"
                                class="rounded-2xl w-full m-1 text-white placeholder-white" value="{{ old('judul') }}"
                                style="background-color: #626B72" placeholder="What Your Title for Discussion?">
                            @if ($errors->has('judul'))
                                <div class="block m-1 w-full text-sm text-red-400" role="alert">
                                    {{ $errors->first('judul') }}
                                </div>
                            @endif
                            <textarea name="deskripsi" class="rounded-2xl w-full m-1 text-white placeholder-white" style="background-color: #626B72"
                                placeholder="Put it here...">{{ old('deskripsi') }}</textarea>
                            @if ($errors->has('deskripsi'))
                                <div class="block m-1 w-full text-sm text-red-400" role="alert">
                                    {{ $errors->first('deskripsi') }}
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col items-center w-48 mt-1 ml-2">
                            <div id="date-container" style="background-color: #626B72"
                                class="w-full rounded-2xl p-1 mb-2 text-xs text-center"></div>
                            <input type="file" name="gambar" onchange="previewImage(this)"
                                class="w-full rounded-2xl mb-2" style="background-color: #626B72">
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Upload</button>
                        </div>
                    </form>
                </div>

                <hr class="mb-5">
                {{-- content --}}
                <div class="block">
                    <div class="flex flex-col h-[880px] overflow-y-auto pr-4">
						@foreach ($topik->sortByDesc('created_at') as $t)
                        <div class="w-full flex flex-col p-4 rounded-3xl mb-5" style="background-color: #424D56">
                            <div class="flex">
                                <img src="{{ url('/image/' . $t->gambar) }}" alt="image"
                                    class="rounded-2xl w-32 h-32 mb-2">
                                <div class="mx-3 w-full">
                                    <div class="rounded-2xl w-full m-1 text-white font-semibold p-3"
                                        style="background-color: #626B72">
                                        {{ $t->judul }}
                                    </div>
                                    <textarea name="" class="rounded-2xl w-full m-1 text-white" style="background-color: #626B72" readonly>{{ $t->deskripsi }}</textarea>
                                </div>
                                <div class="flex flex-col items-center w-48 mt-1 ml-1">
                                    <a href="/suka/{{ $t->id_topik }}" class="mb-1">
                                        <svg class="w-8 h-8 text-gray-800 hover:text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M15.03 9.684h3.965c.322 0 .64.08.925.232.286.153.532.374.717.645a2.109 2.109 0 0 1 .242 1.883l-2.36 7.201c-.288.814-.48 1.355-1.884 1.355-2.072 0-4.276-.677-6.157-1.256-.472-.145-.924-.284-1.348-.404h-.115V9.478a25.485 25.485 0 0 0 4.238-5.514 1.8 1.8 0 0 1 .901-.83 1.74 1.74 0 0 1 1.21-.048c.396.13.736.397.96.757.225.36.32.788.269 1.211l-1.562 4.63ZM4.177 10H7v8a2 2 0 1 1-4 0v-6.823C3 10.527 3.527 10 4.176 10Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="/topikdetail/{{ $t->id_topik }}" class="mb-1">
                                        <svg class="w-8 h-8 text-gray-800 hover:text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M3 5.983C3 4.888 3.895 4 5 4h14c1.105 0 2 .888 2 1.983v8.923a1.992 1.992 0 0 1-2 1.983h-6.6l-2.867 2.7c-.955.899-2.533.228-2.533-1.08v-1.62H5c-1.105 0-2-.888-2-1.983V5.983Zm5.706 3.809a1 1 0 1 0-1.412 1.417 1 1 0 1 0 1.412-1.417Zm2.585.002a1 1 0 1 1 .003 1.414 1 1 0 0 1-.003-1.414Zm5.415-.002a1 1 0 1 0-1.412 1.417 1 1 0 1 0 1.412-1.417Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="/topikdetail/{{ $t->id_topik }}"
                                        class="ml-3 text-white hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                                        style="background-color: #2C343B">Read More</a>
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <div class=" flex py-1 px-2 text-gray-900 rounded-lg">
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('image/' .$t->user->profilephoto ) }}"
                                        alt="Jese image">
                                    <div class="ms-2 flex-col items-center">
                                        <div class="font-semibold text-xs text-white mb-0">{{ $t->user->name }}
                                        </div>
                                        <div class="font-semibold text-xs text-gray-200 mb-0" data-timestamp="{{ $t->created_at }}"></div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-white">{{ $t->suka->count() }} like</p>
                                    <p class="text-white ml-3">{{ $t->komen->count() }} comment</p>
									<a href="/topikdetail/{{ $t->id_topik }}" class="ml-3" @if($t->id !== Auth::id()) hidden @endif>
										<svg class="w-6 h-6 text-yellow-400 hover:text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
											<path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
											<path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
										  </svg>										  
									</a>	
									<a href="/delete/{{ $t->id_topik }}" class="ml-3" @if($t->id !== Auth::id()) hidden @endif>
										<svg class="w-6 h-6 text-red-600 hover:text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
											<path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
										</svg>
									</a>									
                                </div>
                            </div>
                        </div>
						@endforeach
                    </div>
                </div>
            </div>


            {{-- div kanan --}}
            <div class="w-auto lg:basis-[35%] lg:flex-grow-0 ml-0 lg:ml-2" id="graphchart">
                <div class="w-auto h-auto rounded-3xl p-6 mb-2" style="background-color: #424D56">
                    <div class="w-auto p-6 bg-white">
                        <canvas id="chartOne" class="w-auto h-auto"></canvas>
                    </div>
                </div>

                <div class="w-auto h-auto rounded-3xl p-6 mb-2" style="background-color: #424D56">
                    <div class="w-auto p-6 bg-white">
                        <canvas id="chartTwo" class="w-auto h-auto"></canvas>
                    </div>
                </div>

                <div class="w-auto h-auto rounded-3xl p-6 mb-2" style="background-color: #424D56">
                    <div class="w-auto p-6 bg-white">
                        <canvas id="chartThree" class="w-auto h-auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // DATA RANKING

        // Rendering data dari controller ke dalam JavaScript menggunakan Blade directive
    	var data = {!! json_encode($formattedData) !!};

        data.sort(function(a, b) {
            return b.value - a.value;
        });

        var labels = data.map(function(item) {
            return item.label;
        });

        var values = data.map(function(item) {
            return item.value;
        });

        // CHARTONE
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Most Popular Discussion',
                    data: values,
                    backgroundColor: [
                        'rgba(239, 64, 54, 0.2)',
                        'rgba(247, 147, 30, 0.2)',
                        'rgba(139, 198, 62, 0.2)',
                        'rgba(0, 167, 156, 0.2)',
                        'rgba(162, 89, 162, 0.2)',
                        'rgba(46, 77, 155, 0.2)'
                    ],
                    borderColor: [
                        'rgba(239, 64, 54, 1)',
                        'rgba(247, 147, 30, 1)',
                        'rgba(139, 198, 62, 1)',
                        'rgba(0, 167, 156, 1)',
                        'rgba(162, 89, 162, 1)',
                        'rgba(46, 77, 155, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // CHARTTHREE
        var chartThree = document.getElementById('chartThree');
        var myChart = new Chart(chartThree, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Most Popular Discussion',
                    data: values,
                    backgroundColor: [
                        'rgba(239, 64, 54, 0.2)',
                        'rgba(247, 147, 30, 0.2)',
                        'rgba(139, 198, 62, 0.2)',
                        'rgba(0, 167, 156, 0.2)',
                        'rgba(162, 89, 162, 0.2)',
                        'rgba(46, 77, 155, 0.2)'
                    ],
                    borderColor: [
                        'rgba(239, 64, 54, 1)',
                        'rgba(247, 147, 30, 1)',
                        'rgba(139, 198, 62, 1)',
                        'rgba(0, 167, 156, 1)',
                        'rgba(162, 89, 162, 1)',
                        'rgba(46, 77, 155, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        //CHART TWO
        var chartTwo = document.getElementById('chartTwo');
        var myChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Most Popular Discussion',
                    data: values,
                    backgroundColor: [
                        'rgba(239, 64, 54, 0.2)',
                        'rgba(247, 147, 30, 0.2)',
                        'rgba(139, 198, 62, 0.2)',
                        'rgba(0, 167, 156, 0.2)',
                        'rgba(162, 89, 162, 0.2)',
                        'rgba(46, 77, 155, 0.2)'
                    ],
                    borderColor: [
                        'rgba(239, 64, 54, 1)',
                        'rgba(247, 147, 30, 1)',
                        'rgba(139, 198, 62, 1)',
                        'rgba(0, 167, 156, 1)',
                        'rgba(162, 89, 162, 1)',
                        'rgba(46, 77, 155, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

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
