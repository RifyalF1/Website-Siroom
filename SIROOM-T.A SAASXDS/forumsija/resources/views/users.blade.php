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
<body style="background-color: #1E252B">
    <x-user-navbar />
    <div class="w-full h-auto flex flex-col pt-3">
        <div class="flex w-full justify-center p-2">
            <div class="relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-blue-600">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($user as $u)
                            @php
                                $no++;
                            @endphp
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 text-center">
                                    {{ $no }}
                                </td>
                                <td class="px-6 py-4">
                                    <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ url('/image/' . $u->profilephoto) }}"
                                    alt="Jese image">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $u->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $u->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $u->role }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</body>
</html>