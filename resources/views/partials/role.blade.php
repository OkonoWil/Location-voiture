<span class="absolute w-full bottom-10 text-white flex items-center justify-center py-4">
    {{Auth::user()->username}} <span
        class="bg-green-700 ml-2 border rounded-md border-green-600 p-1">{{Auth::user()->role->nomrole}}</span>
</span>